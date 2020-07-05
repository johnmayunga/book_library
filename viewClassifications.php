<?php
include('AppRoot/init.inc.php'); 
$title = 'Books Classification Details';

if($sessionULe != 'Admin' && $sessionULe != 'Librarian' ) :
    redirect('profile.php');
endif;

if(isset($_GET['deleteClassification'])){
    extract($_GET);
    deleteData('classification', 'classID', $deleteClassification);
}
$filter = '';
if(isset($_POST['search'])){
    extract($_POST);
}
?>

<!DOCTYPE HTML>
<html>
    <?php require_once 'AppRoot/Includes/head.inc';?>
    <body>
      <div id="main">
          <?php include 'AppRoot/Includes/header.inc'; ?>
          <?php include 'AppRoot/Includes/navigation.inc'; ?>
        <div id="site_content">
            <div class="my-title">Available Classification</div>
            <?php include('AppRoot/Includes/searchForm.inc'); ?>
            <div class="contents-manage">
                <table class="data-table">
                    <tr>
                       <th>#</th><th>Dewey Number</th><th>Classification</th>
                       <?php if($sessionULe == 'Admin' || $sessionULe == 'Librarian') : ?>
                       <th>Edit</th>
                       <th>Delete</th>
                       <?php endif; ?>
                    </tr>
                        <tbody>
                        <?php 
                        $number = 1;
                        foreach (viewClassifications($filter) as $classification) : 
                            extract($classification);
                        ?>
                            <tr>
                                <td><?= $number; ?></td>
                                <td><?= $deweyNo; ?></td>
                                <td><?= $className; ?></td>
                                <?php if($sessionULe == 'Admin' || $sessionULe == 'Librarian') : ?>
                                <td>
                                    <form action="manageClassification.php" method="POST">
                                        <input type="submit" class="control-button edit" name="editClassification" value="Edit"/>
                                        <input type="hidden" name="id" value="<?= $classID; ?>"/>
                                    </form>
                                </td>
                                <td>
                                    <a href="viewClassifications.php?deleteClassification=<?=$classID ?>" OnClick="return confirm('Are you sure you want to delete Classification <?= $className; ?> ?')" class="control-button delete" >Delete</a>
                                </td>
                                <?php endif; ?>
                            </tr>
                        <?php
                            $number ++;
                            endforeach;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php include 'AppRoot/Includes/footer.inc'; ?>
    </body>
</html>