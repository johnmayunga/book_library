<?php
require_once 'AppRoot/init.inc.php'; 
if($sessionULe != 'Admin' && $sessionULe != 'Librarian' ) :
    redirect('profile.php');
endif;

if(isset($_POST['addCatalog'])):
    extract($_POST);
    addCatalog ($catalogNo, $catStatus, $bookID);
endif;
if(isset($_POST['updCatalog'])) :
    extract($_POST);
    updateCatalog ($prim, $catalogNo, $catStatus, $State, $bookID);
endif;
if(isset($_POST['editCatalog'])) :
    $update = 1;
    extract($_POST);
    extract(getDataFromTable('catalog', 'catalogID',$id, true));
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
              <div class="my-title"><?php echo (isset($update))? 'Update Catalog' : 'Add Catalog'; ?></div>
          <?php include_once 'AppRoot/Includes/profileInfo.inc'; ?>
          <div id="content">
              <div class="form-wrap">
                <?php if(isset($_POST['addCatalog']) || isset($_POST['updCatalog'])) : include 'AppRoot/Includes/errors.php'; endif; ?>
                <form class="form-input" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                    <input value="<?php echo (isset($catalogID))? $catalogID : ''; ?>" hidden="hidden" name="catslogID" type="text">
                    <?php if(isset($catalogID)) : $update = 1; endif;?>
                    <table>
                        <tr>
                            <td>Catalog Number</td>
                            <td><input type="text" class="input-boxes" placeholder="Catalog Number" name="catalogNo" value="<?php echo (isset($catalogNo)) ? $catalogNo : ''; ?>"></td>
                        </tr>
                        <tr>
                            <td>Catalog Status</td>
                            <td>
                                <select name="catStatus" class="input-boxes">
                                    <option value="New">New</option>
                                    <option value="Old">Old</option>
                                    <option value="Lost">Lost</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Books</td>
                            <td>
                                <select name="bookID" class="input-boxes">
                                    <?php foreach (getDataFromTable('books') as $book) : extract($book); ?>
                                        <option value="<?php echo $bookID; ?>"><?php echo $bookTitle .": ". $author.", ". $ISBN; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="table-button"><input class="form-button" type="submit" name="<?php echo (isset($update)) ? 'updCatalog' : 'addCatalog'; ?>" value="<?php echo (isset($update)) ? 'Update Catalog' : 'Add Catalog'; ?>"></td>
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
