<?php
include('AppRoot/init.inc.php'); 
$title = 'Users Details';
 if($sessionULe != 'Admin' && $sessionULe != 'Librarian') : 
     redirect('profile.php');
 endif;
if(isset($_GET['deleteUser'])){
    extract($_GET);
    deleteData('users', 'userID', $deleteUser);
}
if(isset($_POST['unblock'])){
    extract($_POST);
    unblock($id, 'User','UnBlocked');
}
$level='Blocked'; $level1=''; $gender=''; $filter = '';
if(isset($_POST['search'])){
    extract($_POST);
}


include 'AppRoot/Includes/successes.php';
?>

<!DOCTYPE HTML>
<html>
    <?php require_once 'AppRoot/Includes/head.inc';?>
    <body>
      <div id="main">
          <?php include 'AppRoot/Includes/header.inc'; ?>
          <?php include 'AppRoot/Includes/navigation.inc'; ?>
        <div id="site_content">
            <div class="my-title">List of Blocked Users</div>
            <?php include('AppRoot/Includes/searchForm.inc'); ?>
            <div class="contents-manage">
                <table class="data-table">
                    <tr>
                       <th>#</th>
                       <th>User Number</th><th>Username</th><th>Name</th><th>Email</th><th>Gender</th><th>Phone</th><th>Status</th>
                       <!--<th>Address</th><th>Type</th><th>Id Type</th><th>Id Number</th><th>House</th><th>Street</th><th>Country</th>-->
                       <?php if($sessionULe == 'Admin' || $sessionULe == 'Librarian') : ?>
                       <th>View</th>
                       <th>UnBlock</th>
                       <th>Edit</th>
                       <?php if($sessionULe == 'Admin') : ?>
                       <th>Delete</th>
                       <?php endif; ?>
                       <?php endif; ?>
                    </tr>
                        <tbody>
                        <?php 
                        $number = 1;
                        foreach (viewUsers($level, $level1, $gender, $filter) as $user) : 
                            extract($user);
                        ?>
                            <tr>
                                <td><?= $number; ?></td>
                                <td><?= $userNo; ?></td>
                                <td><?= $uName; ?></td>
                                <td><?= $fName ." ". $mName ." ". $sName; ?></td>
                                <td><?= $email; ?></td>
                                <td><?= $gender; ?></td>
                                <td><?= $phone; ?></td>
                                <td><?= $uLevel; ?></td>
                                <!--<td><?= $address; ?></td>
                                <td><?= $type; ?></td>
                                <td><?= $idType; ?></td>
                                <td><?= $idNo; ?></td>
                                <td><?= $street; ?></td>
                                <td><?= $houseNo; ?></td>
                                <td><?= $country; ?></td>-->
                                <td>
                                    <form action="viewUser.php" method="POST">
                                        <input type="submit" class="control-button view" name="viewFullUser" value="View"/>
                                        <input type="hidden" name="id" value="<?= $userID; ?>"/>
                                    </form>
                                </td>
                                <td>
                                    <form action="viewBlockedUsers.php" method="POST">
                                        <input type="submit" class="control-button view" name="unblock" value="Unblock"/>
                                        <input type="hidden" name="id" value="<?= $userID; ?>"/>
                                    </form>
                                </td>
                                <?php if($sessionULe == 'Admin' || $sessionULe == 'Librarian') : ?>
                                <td>
                                    <form action="manageUser.php" method="POST">
                                        <input type="submit" class="control-button edit" name="editUser" value="Edit"/>
                                        <input type="hidden" name="id" value="<?= $userID; ?>"/>
                                    </form>
                                </td>
                                <?php if($sessionULe == 'Admin') : ?>
                                <td>
                                    <a href="viewBlockedUsers.php?deleteUser=<?=$userID ?>" OnClick="return confirm('Are you sure you want to delete user <?= $fName." ". $sName; ?> ?')" class="control-button delete" >Delete</a>
                                </td>
                                <?php endif; ?>
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