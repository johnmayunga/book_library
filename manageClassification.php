<?php
require_once 'AppRoot/init.inc.php'; 

if($sessionULe != 'Admin' && $sessionULe != 'Librarian' ) :
    redirect('profile.php');
endif;

if(isset($_POST['addClassification'])) :
    extract($_POST);
    addClassification ($deweyNo, $className);
endif;

if(isset($_POST['updClassification'])) :
    extract($_POST);
    updateClassification ($classID, $deweyNo, $className);
endif;

if(isset($_POST['editClassification'])) :
    $update = 1;
    extract($_POST);
    extract(getDataFromTable('classification', 'classID',$id, true));
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
              <div class="my-title"><?php echo (isset($update))? 'Update Classification' : 'Add Classification'; ?></div>
          <?php include_once 'AppRoot/Includes/profileInfo.inc'; ?>
          <div id="content">
                <div class="form-wrap">
                    <?php if(isset($_POST['addClassification']) || isset($_POST['updClassification'])) : include 'AppRoot/Includes/errors.php'; endif; ?>
                    <form class="form-input" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                        <input type="text" name="classID" value="<?php echo (isset($classID)) ? $classID : ''; ?>" hidden="hidden">
                        <?php if(isset($classID)) : $update = 1; endif;?>
                        <table>
                            <tr>
                                <td>Dewey Number</td>
                                <td><input type="text" class="input-boxes" placeholder="Dewey Number" name="deweyNo" value="<?php echo (isset($deweyNo)) ? $deweyNo : ''; ?>"></td>
                            </tr>
                            <tr>
                                <td>Classification Name</td>
                                <td><input type="text" class="input-boxes" placeholder="Classification Name" name="className" value="<?php echo (isset($className)) ? $className : ''; ?>"></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="table-button"><input type="submit" class="form-button"  name="<?php echo (isset($update)) ? 'updClassification' : 'addClassification'; ?>" value="<?php echo (isset($update)) ? 'Update Classification' : 'Add Classification'; ?>"></td>
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