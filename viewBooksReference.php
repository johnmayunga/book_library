<?php
include('AppRoot/init.inc.php'); 
$title = 'Books Details';
if((!isset($sessionULe) ) || $sessionULe == 'Blocked') :
    redirect('index.php');
endif;
if(isset($_GET['deleteBook'])){
    extract($_GET);
    deleteData('books', 'bookID', $deleteBook);
}
$filter = ''; $status = 'Reference';
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
            <div class="my-title">Reference Books List</div>
            <?php include('AppRoot/Includes/searchForm.inc'); ?>
            <div class="contents-manage">
                <table class="data-table">
                    <tr>
                       <th>#</th><th>Book Title</th><th>Author</th><th>Publisher</th><th>ISBN</th><!--<th>Pages</th><th>Copyright</th>
                       <th>Date Received</th><th>Date Added</th>--><th>Status</th><th>Price</th><th>Classification</th><th>View</th>
                       <?php if($sessionULe == 'Admin' || $sessionULe == 'Librarian') : ?>
                       <th>Edit</th>
                       <th>Delete</th>
                       <?php endif; ?>
                    </tr>
                        <tbody>
                        <?php 
                        $number = 1;
                        foreach (viewBooks($status, $filter) as $user) : 
                            extract($user);
                        ?>
                            <tr>
                                <td><?= $number; ?></td>
                                <td><?= $bookTitle; ?></td>
                                <td><?= $author; ?></td>
                                <td><?= $bookPub; ?></td>
                                <td><?= $ISBN; ?></td>
                                <!--<td><?= $pages; ?></td>
                                <td><?= $copyrightYear; ?></td>
                                <td><?= date('d M Y', strtotime($dateReceive)); ?></td>
                                <td><?= date('d M Y', strtotime($dateAdded)); ?></td>-->
                                <td><?= $status; ?></td>
                                <td><?= $price; ?></td>
                                <td><?= getClassificationFromID($classID); ?></td>
                                <td>
                                    <form action="viewBook.php" method="POST">
                                        <input type="submit" class="control-button view" name="viewFullBook" value="View"/>
                                        <input type="hidden" name="id" value="<?= $bookID; ?>"/>
                                    </form>
                                </td>
                                <?php if($sessionULe == 'Admin' || $sessionULe == 'Librarian') : ?>
                                <td>
                                    <form action="manageBook.php" method="POST">
                                        <input type="submit" class="control-button edit" name="editBook" value="Edit"/>
                                        <input type="hidden" name="id" value="<?= $bookID; ?>"/>
                                    </form>
                                </td>
                                <td>
                                    <a href="viewBooksReference.php?deleteBook=<?=$bookID ?>" OnClick="return confirm('Are you sure you want to delete this book <?= $bookTitle ;?> ?')" class="control-button delete" >Delete</a>
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