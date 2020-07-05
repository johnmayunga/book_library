<?php
require_once 'AppRoot/init.inc.php'; 

if(!isset($sessionULe)) :
    redirect('profile.php');
endif;

if(isset($_POST['changePass'])) :
    extract($_POST);
    updatePassword ($sessionUID, $pass, $newPass, $reNewPass);
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
              <div class="my-title">Change Password</div>
          <?php include_once 'AppRoot/Includes/profileInfo.inc'; ?>
          <div id="content">
                <div class="form-wrap">
                    <?php if(isset($_POST['changePass'])) : include 'AppRoot/Includes/errors.php'; endif; ?>
                    <form class="form-input" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                        <input type="text" name="classID" value="<?php echo (isset($classID)) ? $classID : ''; ?>" hidden="hidden">
                        <?php if(isset($classID)) : $update = 1; endif;?>
                        <table>
                            <tr>
                                <td>Password</td>
                                <td><input type="password" class="input-boxes" placeholder="Password" name="pass" ></td>
                            </tr>
                            <tr>
                                <td>New Password</td>
                                <td><input type="password" class="input-boxes" placeholder="New Password" name="newPass"></td>
                            </tr>
                            <tr>
                                <td>Repeat Password</td>
                                <td><input type="password" class="input-boxes" placeholder="Repeat new Password" name="reNewPass" ></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="table-button"><input type="submit" class="form-button"  name="changePass" value='Change Password'></td>
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