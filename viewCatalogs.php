<?php
include('AppRoot/init.inc.php'); 
$title = 'Catalog Details';
if((!isset($sessionULe) ) || $sessionULe == 'Blocked') :
    redirect('index.php');
endif;
if(isset($_GET['deleteCatalog'])){
    extract($_GET);
    deleteData('catalog', 'CatalogID', $deleteCatalog);
}
$catStatus =''; $state = ''; $filter ='';
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
            <div class="my-title">Available Catalogs</div>
            <?php include('AppRoot/Includes/searchForm.inc'); ?>
            <div class="contents-manage">
                <table class="data-table">
                    <tr>
                       <th>#</th>
                       <th>Catalog Number</th><th>Book title</th><th>Publisher</th>
                       <th>Author</th><th>ISBN</th><th>Price</th><th>Classification</th>
                       <?php if($sessionULe == 'Admin' || $sessionULe == 'Librarian') : ?>
                       <th>Catalog Status</th>
                       <th>Edit</th>
                       <th>Delete</th>
                       <?php endif; ?>
                    </tr>
                        <tbody>
                        <?php 
                        $number = 1;
                        foreach (viewCatalogs($catStatus, $state, $filter) as $catalog) : 
                            extract($catalog);
                        ?>
                            <tr>
                                <td><?= $number; ?></td>
                                <td><?= $catalogNo; ?></td>
                                <td><?= $bookTitle; ?></td>
                                <td><?= $bookPub; ?></td>
                                <td><?= $author; ?></td>
                                <td><?= $ISBN; ?></td>
                                <td><?= $price; ?></td>
                                <td><?= getClassificationFromID($classID); ?></td>
                                <?php if($sessionULe == 'Admin' || $sessionULe == 'Librarian') : ?>
                                <td><?= $catStatus; ?></td>
                                <td>
                                    <form action="manageCatalog.php" method="POST">
                                        <input type="submit" class="control-button edit" name="editCatalog" value="Edit"/>
                                        <input type="hidden" name="id" value="<?= $catalogID; ?>"/>
                                    </form>
                                </td>
                                <td>
                                    <a href="viewCatalogs.php?deleteCatalog=<?=$catalogID ?>" OnClick="return confirm('Are you sure you want to delete Catalog <?= $catalogNo; ?> ?')" class="control-button delete" >Delete</a>
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