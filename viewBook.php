<?php
require_once 'AppRoot/init.inc.php'; 

if((!isset($sessionULe) ) || $sessionULe == 'Blocked') :
    redirect('index.php');
endif;
if(isset($_POST['viewFullBook'])):
    extract($_POST);
    extract(getDataFromTable('books', 'bookID',$id, true));
endif;
if(!isset($_POST['id'])){
    redirect('viewBooks.php');
}
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
              <div class="my-title">Book: <?php echo (isset($bookTitle)) ? $bookTitle : ''; ?>, Details </div>
              <?php include('AppRoot/Includes/searchForm.inc'); ?>
          <?php include_once 'AppRoot/Includes/profileInfo.inc'; ?>
            <div id="content">
                <div class="form-wrap">
                    <form class="form-input" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                          <input type="text" name="bookID" value="<?php echo (isset($bookID)) ? $bookID : ''; ?>" hidden="hidden">
                          <table>
                              <tr>
                                  <td>Book Title</td>
                                  <td class="second-td"><input type="text" class="input-boxes" placeholder="Book Title" name="bookTitle" value="<?php echo (isset($bookTitle)) ? $bookTitle : ''; ?>" disabled="disabled"></td>
                                  <td>ISBN</td>
                                  <td class="second-td"><input type="text" class="input-boxes" placeholder="ISBN" name="ISBN" value="<?php echo (isset($ISBN) ) ? $ISBN : ''; ?>" disabled="disabled"></td>
                              </tr>
                              <tr>
                                  <td>Author</td>
                                  <td class="second-td"><input type="text" class="input-boxes" placeholder="Author" name="author" value="<?php echo (isset($author)) ? $author : ''; ?>" disabled="disabled"></td>
                                  <td>Date Received</td>
                                  <td><input type="text" class="input-boxes" placeholder="Date Received" name="dateReceived" value="<?php echo (isset($dateReceived)) ? date('d M Y', strtotime($dateReceived)) : ''; ?>" disabled="disabled"></td>
                              </tr>
                              <tr>
                                  <td>Book Publisher</td>
                                  <td class="second-td"><input type="text" class="input-boxes" placeholder="Book Publisher" name="bookPub" value="<?php echo (isset($bookPub)) ? $bookPub : ''; ?>" disabled="disabled"></td>
                                  <td>Status</td>
                                  <td><input type="text" class="input-boxes" placeholder="Book Publisher" name="status" value="<?php echo (isset($status)) ? $status : ''; ?>" disabled="disabled"></td>
                              </tr>
                              <tr>
                                  <td>Pages</td>
                                  <td class="second-td"><input type="text" class="input-boxes" placeholder="Pages" name="pages" value="<?php echo (isset($pages) ) ? $pages : ''; ?>" disabled="disabled"></td>
                                  <td>Price</td>
                                  <td><input type="text" class="input-boxes" placeholder="Price" name="price" value="<?php echo (isset($price)) ? $price : ''; ?>" disabled="disabled"></td>
                              </tr>
                              <tr>
                                  <td>Copyright Year</td>
                                  <td class="second-td"><input type="text" class="input-boxes" placeholder="Copyright Year" name="copyrightYear" value="<?php echo (isset($copyrightYear)) ? $copyrightYear : ''; ?>" disabled="disabled"></td>
                                  <td>Classification</td>
                                  <td><input type="text" class="input-boxes" placeholder="Copyright Year" name="classID" value="<?php echo (isset($classID)) ? getClassificationFromID($classID) : ''; ?>" disabled="disabled"></td>
                              </tr>
                              <tr>
                                  <td colspan="4" class="table-button"><input class="form-button" name="viewBooks" onclick="window.open('viewBooks.php','_self')" type="button" value="View Books"></td>
                              </tr>
                          </table>
                      </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'AppRoot/Includes/footer.inc'; ?>
    </body>
</html>
