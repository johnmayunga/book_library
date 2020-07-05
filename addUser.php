<?php
require_once 'AppRoot/init.inc.php'; 
if(($sessionULe != 'Admin' && $sessionULe != 'Librarian'  ) || $sessionULe == 'Blocked') :
    redirect('profile.php');
endif;
if(isset($_POST['addUser'])) :
    extract($_POST);
    addUser($userNo, $uName, $pass, $rePass, $email, $fName, $mName, $sName, $address, $phone, $gender, $type, $idType, $idNo, $street, $houseNo, $country, $uLevel);
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
              <div class="my-title">Add User</div>
          <?php include_once 'AppRoot/Includes/profileInfo.inc'; ?>
            <div id="content">
                <div class="form-wrap">
                <?php if(isset($_POST['addUser'])) : include 'AppRoot/Includes/errors.php'; endif; ?>
                    <form class="form-input" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" autocomplete="off">
                        <table>
                            <tr>
                                <td>Registration Number</td>
                                <td><input type="text" class="input-boxes" placeholder="Registration Number" name="userNo" value="<?php echo (isset($userNo)) ? $userNo : ''; ?>" <?php if(!empty($userNo) && isset($update) && ($uLevel != 'Admin' && $uLevel != 'Librarian')) { echo 'hidden="hidden"'; }?>></td>
                                <td>ID Type</td>
                                <td>
                                    <select name="idType" class="input-boxes" >
                                        <option value="">Choose ID Type</option>
                                        <option value="Vote ID">Vote ID</option>
                                        <option value="National ID">National ID</option>
                                        <option value="School ID">School ID</option>
                                        <option value="Driving Licence">Driving Licence</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>First Name</td>
                                <td><input type="text" class="input-boxes" placeholder="First Name" name="fName" ></td>
                                <td>ID Number</td>
                                <td><input type="text" class="input-boxes" placeholder="ID Number" name="idNo"></td>
                            </tr>
                            <tr>
                                <td>Middle Name</td>
                                <td><input type="text" class="input-boxes" placeholder="Middle Name" name="mName"></td>
                                <td>Address</td>
                                <td><input type="text" class="input-boxes" placeholder="Address" name="address"></td>
                            </tr>
                            <tr>
                                <td>Surname</td>
                                <td><input type="text" class="input-boxes" placeholder="Surname" name="sName"></td>
                                <td>Email</td>
                                <td><input type="text" class="input-boxes" placeholder="Email" name="email"></td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>
                                    <select name="gender" class="input-boxes" >
                                        <option value="">Choose Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </td>
                                <td>Phone Number</td>
                                <td><input type="text" class="input-boxes" placeholder="Phone Number" name="phone"></td>
                            </tr>
                            <tr>
                                <td>User Name</td>
                                <td><input type="text" class="input-boxes" placeholder="User Name" name="uName" value="<?php echo (isset($uName)) ? $uName : ''; ?>" <?php if(!empty($uName) && isset($update) && ($uLevel != 'Admin' && $uLevel != 'Librarian')) { echo 'hidden="hidden"'; }?>></td>
                                <td>House number</td>
                                <td><input type="text" class="input-boxes" placeholder="House number" name="houseNo" value="<?php echo (isset($houseNo)) ? $houseNo : ''; ?>" <?php if(!empty($houseNo) && isset($update) && ($uLevel != 'Admin' && $uLevel != 'Librarian')) { echo 'hidden="hidden"'; }?>></td>
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
                                <td><input type="text" class="input-boxes" placeholder="Street" name="street" value="<?php echo (isset($street)) ? $street : ''; ?>" <?php if(!empty($street) && isset($update) && ($uLevel != 'Admin' && $uLevel != 'Librarian')) { echo 'hidden="hidden"'; }?>></td>
                                <td>Country</td>
                                <td>
                                    <select name="country" class="input-boxes" <?php if(!empty($country) && isset($update) && ($uLevel != 'Admin' && $uLevel != 'Librarian')) { echo 'hidden="hidden"'; }?>>
                                        <?php require_once 'AppRoot/Includes/country.inc'; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Type</td>
                                <td>
                                <select name="type" class="input-boxes">
                                        <option value="">Choose Type</option>
                                        <option value="Employed">Employed</option>
                                        <option value="Student">Student</option>
                                        <option value="School ID">Others</option>
                                    </select>
                                </td>
                                <?php if($sessionULe == 'Admin') :?>
                                <td>User Level</td>
                                <td>
                                    <select name="uLevel" class="input-boxes">
                                        <option value="">Choose user level</option>
                                        <option value="Blocked">Blocked</option>
                                        <option value="User">User</option>
                                        <?php if($sessionULe == 'Admin') : ?>
                                        <option value="Librarian">Librarian</option>
                                        <option value="Admin">Admin</option>
                                        <?php endif; ?>
                                    </select>
                                </td>
                                <?php endif; ?>
                            </tr>
                            <tr>
                                <td colspan="4" class="table-button"><input class="form-button" type="submit" name="addUser" value="Add User"></td>
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