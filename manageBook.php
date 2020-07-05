<?php
require_once 'AppRoot/init.inc.php'; 

if($sessionULe != 'Admin' && $sessionULe != 'Librarian' ) :
    redirect('profile.php');
endif;
if(isset($_POST['addBook'])):
    extract($_POST);
    addBook($bookTitle, $author, $bookPub, $pages, $ISBN, $copyrightYear, $dateReceived, $status, $price, $classID);
endif;

if(isset($_POST['editBook'])):
    $update = 1;
    extract($_POST);
    extract(getDataFromTable('books', 'bookID',$id, true));
endif;

$title =  (isset($update))? 'Update Book' : 'Add Book';
if(isset($_POST['updBook'])) :
    extract($_POST);
    updateBook($bookID, $bookTitle, $author, $bookPub, $pages, $ISBN, $copyrightYear, $dateReceived, $status, $price, $classID);
endif;
?>
<!DOCTYPE HTML>
<html>
    <?php require_once 'AppRoot/Includes/head.inc';?>
    <body>
      <div id="main">
          <?php include 'AppRoot/Includes/header.inc'; ?>
          <?php include 'AppRoot/Includes/navigation.inc'; ?>
        <div id="site_content">
              <div class="my-title"><?php echo (isset($update))? 'Update book' : 'Add book'; ?></div>
          <?php include_once 'AppRoot/Includes/profileInfo.inc'; ?>
            <div id="content">
                <div class="form-wrap">
                    <?php if(isset($_POST['addBook']) || isset($_POST['updBook']) ) include 'AppRoot/Includes/errors.php'; ?>
                    
                      <form class="form-input" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" autocomplete="off">
                          <?php if(isset($bookID)) : $update = 1; endif; ?>
                          <input type="text" name="bookID" value="<?php echo (isset($bookID)) ? $bookID : ''; ?>" hidden="hidden">
                          <table>
                              <tr>
                                  <td>Book Title</td>
                                  <td class="second-td"><input type="text" class="input-boxes" placeholder="Book Title" name="bookTitle" value="<?php echo (isset($bookTitle)) ? $bookTitle : ''; ?>"></td>
                                  <td>ISBN</td>
                                  <td class="second-td"><input type="text" class="input-boxes" placeholder="ISBN" name="ISBN" value="<?php echo (isset($pages) ) ? $pages : ''; ?>"></td>
                              </tr>
                              <tr>
                                  <td>Author</td>
                                  <td class="second-td"><input type="text" class="input-boxes" placeholder="Author" name="author" value="<?php echo (isset($author)) ? $author : ''; ?>"></td>
                                  <td>Date Received</td>
                                  <td><input type="text"   id="datepickers" class="input-boxes" placeholder="Date Received" name="dateReceived" value="<?php echo (isset($dateReceived)) ? date('d M Y', strtotime($dateReceived)) : ''; ?>"></td>
                              </tr>
                              <tr>
                                  <td>Book Publisher</td>
                                  <td class="second-td"><input type="text" class="input-boxes" placeholder="Book Publisher" name="bookPub" value="<?php echo (isset($bookPub)) ? $bookPub : ''; ?>"></td>
                                  <td>Status</td>
                                  <td>
                                      <select name="status" class="input-boxes">
                                          <option value="Normal">Normal</option>
                                          <option value="Reference">Reference</option>
                                      </select>
                                  </td>
                              </tr>
                              <tr>
                                  <td>Pages</td>
                                  <td class="second-td"><input type="text" class="input-boxes" placeholder="Pages" name="pages" value="<?php echo (isset($pages) ) ? $pages : ''; ?>"></td>
                                  <td>Price</td>
                                  <td><input type="text" class="input-boxes" placeholder="Price" name="price" value="<?php echo (isset($price)) ? $price : ''; ?>"></td>
                              </tr>
                              <tr>
                                  <td>Copyright Year</td>
                                  <td class="second-td"><input type="text" class="input-boxes" placeholder="Copyright Year" name="copyrightYear" value="<?php echo (isset($copyrightYear)) ? $copyrightYear : ''; ?>"></td>
                                  <td>Classification</td>
                                  <td>
                                      <select name="classID" class="input-boxes">
                                          <?php foreach (getDataFromTable('classification') as $classification) : extract($classification); ?>
                                          <option value="<?php echo $classID; ?>"><?php echo $deweyNo .": ". $className; ?></option>
                                          <?php endforeach; ?>
                                      </select>
                                  </td>
                              </tr>
                              <tr>
                                  <td colspan="4" class="table-button"><input class="form-button" name="<?php echo (isset($update)) ? 'updBook' : 'addBook'; ?>" type="submit" value="<?php echo (isset($update)) ? 'Update Book' : 'Add Book'; ?>"></td>
                              </tr>
                          </table>
                      </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'AppRoot/Includes/footer.inc'; ?>
        <script type="text/javascript">
            var picker = new Pikaday({ field: document.getElementById('datepicker') });
            var pickers = new Pikaday({ field: document.getElementById('datepickers') });
        </script>
    </body>
</html>
