<?php
include('AppRoot/init.inc.php'); 
$title = 'Borrow Details';
if((!isset($sessionULe) ) || $sessionULe == 'Blocked') :
    redirect('index.php');
endif;
if(isset($_GET['deleteCatalog'])){
    extract($_GET);
    deleteCatalog('catalog', 'CatalogID', $deleteBook);
}
$filter = ''; $userID = ''; $status = '';
if($sessionULe != 'Admin' && $sessionULe != 'Librarian'){
    $userID = $sessionUID;
}
if(isset($_POST['search'])){
    extract($_POST);
}
if(isset($_POST['returnBook'])){
    extract($_POST);
    returnBook($borrowID, $catalogID);
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
            <div class="my-title">Hello <?php echo $status . " " . $sessionFNa; ?> this are/is book(s) you Borrowed </div>
            <?php include('AppRoot/Includes/searchForm.inc'); ?>
                <?php if(isset($_POST['borrow'])) include 'AppRoot/Includes/errors.php'; ?>
                <div class="contents-manage">
                    <table class="data-table">
                        <tr>
                           <th>Catalog Number</th><th>Book title</th><th>ISBN</th>
                           <?php if($sessionULe == 'Admin' || $sessionULe == 'Librarian') : ?>
                           <th>Full Name</th>
                           <?php endif; ?>
                           <th>Phone</th><th>Email</th><th>Date Borrow</th><th>Due Date</th><th>Borrow Status</th><th>Overdue Days</th>
                           <?php if($sessionULe == 'Admin' || $sessionULe == 'Librarian') : ?>
                           <th>Return Book</th>
                           <?php endif; ?>
                        </tr>
                            <tbody>
                            <?php 
                            $number = 1;
                            foreach (viewBorrowDetails($userID, $status, $filter) as $catalog) : 
                                extract($catalog);
                            ?>
                                <tr>
                                    <td><?= $catalogNo; ?></td>
                                    <td><?= $bookTitle; ?></td>
                                    <td><?= $ISBN; ?></td>
                                    <?php if($sessionULe == 'Admin' || $sessionULe == 'Librarian') : ?>
                                    <td><?= $fName. " ". $mName . " " .$sName; ?></td>
                                    <?php endif; ?>
                                    <td><?= $phone; ?></td>
                                    <td><?= $email; ?></td>
                                    <td><?= date('d M Y', strtotime($dateBorrow)); ?></td>
                                    <td><?= date('d M Y', strtotime($dueDate)); ?></td>
                                    <td><?= $borrowStatus; ?></td>   
                                    <td><?= getSpentDays($dateReturn, $dueDate); ?></td>   
                                    <?php if($sessionULe == 'Admin' || $sessionULe == 'Librarian') : ?>
                                    <td <?php if($borrowStatus == 'Returned') { echo "style='background-color: #82EOAA;'"; } ?>>
                                        <?php if($borrowStatus == 'Pending') : ?>
                                        <form action="viewBorrowDetails.php" method="POST">
                                            <input type="submit" class="control-button view" name="returnBook" value="ReturnBook" onclick="window.confirm('Are you sure you want to return a book?')"/>
                                            <input type="hidden" name="catalogID" value="<?= $catalogID; ?>"/>
                                            <input type="hidden" name="borrowID" value="<?= $borrowID; ?>"/>
                                        </form>
                                        <?php endif; ?> 
                                        <?php if($borrowStatus == 'Returned') : 
                                            echo 'Book Returned';
                                        endif;?>
                                        
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
<script type="text/javascript">
var picker = new Pikaday({ field: document.getElementById('datepicker') });
</script>
    </body>
</html>