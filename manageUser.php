<?php
require_once 'AppRoot/init.inc.php'; 
if(isset($_POST['addUser'])) :
    extract($_POST);
    addUser($userNo, $uName, $pass, $rePass, $email, $fName, $mName, $sName, $address, $phone, $gender, $type, $idType, $idNo, $street, $houseNo, $country, $uLevel);
endif;

if((!isset($sessionULe) ) || $sessionULe == 'Blocked') :
    redirect('index.php');
endif;

if(isset($_POST['editUser'])):
    $update = 1;
    extract($_POST);
    extract(getDataFromTable('users', 'userID',$id, true));
endif;

$title =  (isset($update))? 'Update User' : 'Add User';
if(isset($_POST['updUser'])) :
    extract($_POST);
    updateUser($userID, $userNo, $uName, $email, $fName, $mName, $sName, $address, $phone, $gender, $type, $idType, $idNo, $street, $houseNo, $country, $uLevel);
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
              <div class="my-title"><?php echo (isset($update))? 'Update User' : 'Add User'; ?></div>
          <?php include_once 'AppRoot/Includes/profileInfo.inc'; ?>
            <div id="content">
                <div class="form-wrap">
                <?php if(isset($_POST['addUser']) || isset($_POST['updUser'])) : include 'AppRoot/Includes/errors.php'; endif; ?>
                    <form class="form-input" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" autocomplete="off">
                        <?php 
                        if(isset($userID)) : $update = 1; endif; 
                        if($update != 1 && ($uLevel != 'Admin' || $uLevel != 'Librarian' )) :
                            redirect('profile.php');
                        endif;
                        ?>
                        <input type="text" name="userID" value="<?php echo (isset($userID)) ? $userID : ''; ?>" hidden="hidden">
                        <table>
                            <tr>
                                <td>Registration Number</td>
                                <td><input type="text" class="input-boxes" placeholder="Registration Number" name="userNo" value="<?php echo (isset($userNo)) ? $userNo : ''; ?>" <?php if(!empty($userNo) && isset($update) && ($sessionULe != 'Admin' && $sessionULe != 'Librarian')) { echo 'readonly="readonly"'; }?>></td>
                                <td>ID Type</td>
                                <td>
                                    <?php if(isset($idType) && $idType !='') : ?>
                                        <input type="text" class="input-boxes" placeholder="ID Type" name="idType" value="<?php echo (isset($idType)) ? $idType : ''; ?>" <?php if(!empty($idType) && isset($update) && ($sessionULe != 'Admin' && $sessionULe != 'Librarian')) { echo 'readonly="readonly"'; }?>>
                                    <?php else: ?>
                                    <select name="idType" class="input-boxes" <?php if(!empty($idType) && isset($update) && ($sessionULe != 'Admin' && $sessionULe != 'Librarian')) { echo 'readonly="readonly"'; }?>>
                                        <option value="">Choose ID Type</option>
                                        <option value="Vote ID">Vote ID</option>
                                        <option value="National ID">National ID</option>
                                        <option value="School ID">School ID</option>
                                        <option value="Driving Licence">Driving Licence</option>
                                    </select>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>First Name</td>
                                <td><input type="text" class="input-boxes" placeholder="First Name" name="fName" value="<?php echo (isset($fName)) ? $fName : ''; ?>" <?php if(!empty($fName) && isset($update) && ($sessionULe != 'Admin' && $sessionULe != 'Librarian')) { echo 'readonly="readonly"'; }?>></td>
                                <td>ID Number</td>
                                <td><input type="text" class="input-boxes" placeholder="ID Number" name="idNo" value="<?php echo (isset($idNo)) ? $idNo : ''; ?>" <?php if(!empty($idNo) && isset($update) && ($sessionULe != 'Admin' && $sessionULe != 'Librarian')) { echo 'readonly="readonly"'; }?>></td>
                            </tr>
                            <tr>
                                <td>Middle Name</td>
                                <td><input type="text" class="input-boxes" placeholder="Middle Name" name="mName" value="<?php echo (isset($mName)) ? $mName : ''; ?>" <?php if(!empty($mName) && isset($update) && ($sessionULe != 'Admin' && $sessionULe != 'Librarian')) { echo 'readonly="readonly"'; }?>></td>
                                <td>Address</td>
                                <td><input type="text" class="input-boxes" placeholder="Address" name="address" value="<?php echo (isset($address)) ? $address : ''; ?>" <?php if(!empty($address) && isset($update) && ($sessionULe != 'Admin' && $sessionULe != 'Librarian')) { echo 'readonly="readonly"'; }?>></td>
                            </tr>
                            <tr>
                                <td>Surname</td>
                                <td><input type="text" class="input-boxes" placeholder="Surname" name="sName" value="<?php echo (isset($sName)) ? $sName : ''; ?>" <?php if(!empty($sName) && isset($update) && ($sessionULe != 'Admin' && $sessionULe != 'Librarian')) { echo 'readonly="readonly"'; }?>></td>
                                <td>Email</td>
                                <td><input type="text" class="input-boxes" placeholder="Email" name="email" value="<?php echo (isset($email)) ? $email : ''; ?>"  <?php if(!empty($email) && isset($update) && ($sessionULe != 'Admin' && $sessionULe != 'Librarian')) { echo 'readonly="readonly"'; }?>></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>
                                    <?php if(isset($gender) && $gender !='') : ?>
                                        <input type="text" class="input-boxes" placeholder="Gender" name="gender" value="<?php echo (isset($gender)) ? $gender : ''; ?>" <?php if(!empty($gender) && isset($update) && ($sessionULe != 'Admin' && $sessionULe != 'Librarian')) { echo 'readonly="readonly"'; }?>>
                                    <?php else: ?>
                                    <select name="gender" class="input-boxes"  <?php if(!empty($gender) && isset($update) && ($uLevel != 'Admin' && $uLevel != 'Librarian')) { echo 'readonly="readonly"'; }?>>
                                        <option value="">Choose Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <?php endif; ?>
                                </td>
                                <td>Phone Number</td>
                                <td><input type="text" class="input-boxes" placeholder="Phone Number" name="phone" value="<?php echo (isset($phone)) ? $phone : ''; ?>" <?php if(!empty($phone) && isset($update) && ($sessionULe != 'Admin' && $sessionULe != 'Librarian')) { echo 'readonly="readonly"'; }?>></td>
                            </tr>
                            <tr>
                                <td>User Name</td>
                                <td><input type="text" class="input-boxes" placeholder="User Name" name="uName" value="<?php echo (isset($uName)) ? $uName : ''; ?>" <?php if(!empty($uName) && isset($update) && ($sessionULe != 'Admin' && $sessionULe != 'Librarian')) { echo 'readonly="readonly"'; }?>></td>
                                <td>House number</td>
                                <td><input type="text" class="input-boxes" placeholder="House number" name="houseNo" value="<?php echo (isset($houseNo)) ? $houseNo : ''; ?>" <?php if(!empty($houseNo) && isset($update) && ($sessionULe != 'Admin' && $sessionULe != 'Librarian')) { echo 'readonly="readonly"'; }?>></td>
                            </tr>
                            <?php if(!isset($update)) : ?>
                                <tr>
                                <td>Password</td>
                                <td><input type="password" class="input-boxes" placeholder="Password" name="pass" value=""></td>
                                <td>Re-enter password</td>
                                <td><input type="password" class="input-boxes" placeholder="Re-enter password" name="rePass" value=""></td>
                            </tr>
                           <?php endif; ?>
                            <tr>
                                <td>Street</td>
                                <td><input type="text" class="input-boxes" placeholder="Street" name="street" value="<?php echo (isset($street)) ? $street : ''; ?>" <?php if(!empty($street) && isset($update) && ($sessionULe != 'Admin' && $sessionULe != 'Librarian')) { echo 'readonly="readonly"'; }?>></td>
                                <td>Country</td>
                                <td>
                                    <?php if(isset($country) && $country !='') : ?>
                                        <input type="text" class="input-boxes" placeholder="Country" name="country" value="<?php echo (isset($country)) ? $country : ''; ?>" <?php if(!empty($country) && isset($update) && ($sessionULe != 'Admin' && $sessionULe != 'Librarian')) { echo 'readonly="readonly"'; }?>>
                                    <?php else: ?>
                                    <select name="country" class="input-boxes" <?php if(!empty($country) && isset($update) && ($sessionULe != 'Admin' && $sessionULe != 'Librarian')) { echo 'readonly="readonly"'; }?>>
                                        <?php require_once 'AppRoot/Includes/country.inc'; ?>
                                    </select>
                                <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Type</td>
                                <td>
                                    <?php if(isset($type) && $type !='') : ?>
                                        <input type="text" class="input-boxes" placeholder="Type" name="type" value="<?php echo (isset($type)) ? $type : ''; ?>" <?php if(!empty($type) && isset($update) && ($sessionULe != 'Admin' && $sessionULe != 'Librarian')) { echo 'readonly="readonly"'; }?>>
                                    <?php else: ?>
                                    <select name="type" class="input-boxes" <?php if(!empty($type) && isset($update) && ($sessionULe != 'Admin' && $sessionULe != 'Librarian')) { echo 'readonly="readonly"'; }?>>
                                        <option value="">Choose Type</option>
                                        <option value="Employed">Employed</option>
                                        <option value="Student">Student</option>
                                        <option value="School ID">Others</option>
                                    </select>
                                <?php endif; ?>
                                </td>
                                <?php if(isset($update) || ($sessionULe == 'Admin' || $sessionULe == 'Librarian')) :?>
                                <td>User Level</td>
                                <td>
                                    <?php if(isset($uLevel) && $uLevel !='') : ?>
                                        <input type="text" class="input-boxes" placeholder="User Level" name="uLevel" value="<?php echo $uLevel; ?>" <?php if(!empty($uLevel) && isset($update) && ($sessionULe != 'Admin' && $sessionULe != 'Librarian')) { echo 'readonly="readonly"'; }?>>
                                    <?php else: ?>
                                    <select name="uLevel" class="input-boxes" <?php if(!empty($uLevel) && isset($update) && ($sessionULe != 'Admin' && $sessionULe != 'Librarian')) { echo 'readonly="readonly"'; }?>>
                                        <option value="">Choose user level</option>
                                        <option value="Blocked">Blocked</option>
                                        <option value="User">User</option>
                                        <?php if($sessionULe == 'Admin') : ?>
                                        <option value="Librarian">Librarian</option>
                                        <option value="Admin">Admin</option>
                                        <?php endif; ?>
                                    </select>
                                   <?php endif; ?>
                                </td>
                                <?php endif; ?>
                            </tr>
                            <tr>
                                <td colspan="4" class="table-button"><input class="form-button" type="submit" name="<?php echo (isset($update)) ? 'updUser' : 'addUser'; ?>" value="<?php echo (isset($update)) ? 'Update User' : 'Add User'; ?>"></td>
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