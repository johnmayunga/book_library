<?php
require_once 'AppRoot/init.inc.php';
$title = 'Your Profile';
if(!isLoggedIn()) :
    redirect('index.php');
endif;
extract(getDataFromTable('users', 'userID', $sessionUID, true));
?>
<!DOCTYPE HTML>
<html>
    <?php require_once 'AppRoot/Includes/head.inc';?>
    <body>
      <div id="main">
          <?php include 'AppRoot/Includes/header.inc'; ?>
          <?php include 'AppRoot/Includes/navigation.inc'; ?>
        <div id="site_content">
              <div class="my-title">This is your profile information <?php echo (isset($status)) ? $status : ''; echo (isset($fName)) ? $fName : ''; ?></div>
          <?php include_once 'AppRoot/Includes/profileInfo.inc'; ?>
          <div id="content">
              <?php if(empty($mName) || empty($idType) || empty($idNo) || empty($address) || empty($email) || empty($houseNo) || empty($country) || empty($type) || $sessionULe == 'Blocked') : ?>
              <div class="top-borrow">
                    <table  class="form-wrap">
                        <tr>
                            <td>
                                <?php if($sessionULe == 'Blocked') : ?>
                                    Sorry! We feel sad to inform you that...
                                    <?php else: ?>
                                    Some of important informations are missing!
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php if($sessionULe == 'Blocked') : ?>
                                    <input type="button" value="You are account is disabled Contact Libralians" class="control-button delete" name="editUser">
                                <?php else: ?>
                                <form action="manageUser.php" method="POST">
                                    <input type="text" name="id" value="<?php echo (isset($sessionUID)) ? $sessionUID : '';?>" hidden="hidden">
                                    <input type="submit" value="Update them now" class="form-button" name="editUser">
                                </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </div>
              <?php endif; ?>
                <div class="form-wrap">
                    <form class="form-input" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <table>
                            <tr>
                                <td>Registration Number</td>
                                <td><input type="text" class="input-boxes" disabled="disabled" name="userNo" value="<?php echo (isset($userNo)) ? $userNo : ''; ?>"></td>
                                <td>ID Type</td>
                                <td><input type="text" class="input-boxes" disabled="disabled" name="idType" value="<?php echo (isset($idType)) ? $idType : ''; ?>"></td>
                            </tr>
                            <tr>
                                <td>First Name</td>
                                <td><input type="text" class="input-boxes" disabled="disabled" name="fName" value="<?php echo (isset($fName)) ? $fName : ''; ?>"></td>
                                <td>ID Number</td>
                                <td><input type="text" class="input-boxes" disabled="disabled" name="idNo" value="<?php echo (isset($idNo)) ? $idNo : ''; ?>"></td>
                            </tr>
                            <tr>
                                <td>Middle Name</td>
                                <td><input type="text" class="input-boxes" disabled="disabled" name="mName" value="<?php echo (isset($mName)) ? $mName : ''; ?>"></td>
                                <td>Address</td>
                                <td><input type="text" class="input-boxes" disabled="disabled" name="address" value="<?php echo (isset($address)) ? $address : ''; ?>"></td>
                            </tr>
                            <tr>
                                <td>Surname</td>
                                <td><input type="text" class="input-boxes" disabled="disabled" name="sName" value="<?php echo (isset($sName)) ? $sName : ''; ?>"></td>
                                <td>Email</td>
                                <td><input type="text" class="input-boxes" disabled="disabled" name="email" value="<?php echo (isset($email)) ? $email : ''; ?>"></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td><input type="text" class="input-boxes" disabled="disabled" name="gender" value="<?php echo (isset($gender)) ? $gender : ''; ?>"></td>
                                <td>Phone Number</td>
                                <td><input type="text" class="input-boxes" disabled="disabled" name="phone" value="<?php echo (isset($phone)) ? $phone : ''; ?>"></td>
                            </tr>
                            <tr>
                                <td>User Name</td>
                                <td><input type="text" class="input-boxes" disabled="disabled" name="uName" value="<?php echo (isset($uName)) ? $uName : ''; ?>"></td>
                                <td>House number</td>
                                <td><input type="text" class="input-boxes" disabled="disabled" name="houseNo" value="<?php echo (isset($houseNo)) ? $houseNo : ''; ?>"></td>
                            </tr>
                            <tr>
                                <td>Street</td>
                                <td><input type="text" class="input-boxes" disabled="disabled" name="street" value="<?php echo (isset($street)) ? $street : ''; ?>"></td>
                                <td>Country</td>
                                <td><input type="text" class="input-boxes" disabled="disabled" name="country" value="<?php echo (isset($country)) ? $country : ''; ?>"></td>
                            </tr>
                            <tr>
                                <td>Type</td>
                                <td><input type="text" class="input-boxes" disabled="disabled" name="type" value="<?php echo (isset($type)) ? $type : ''; ?>"></td>
                                <td>User Level</td>
                                <td><input type="text" class="input-boxes" disabled="disabled" name="type" value="<?php echo (isset($uLevel)) ? $uLevel : ''; ?>"></td>
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