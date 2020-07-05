<?php
include('AppRoot/init.inc.php'); 
$title = 'Borrow Details';
if(!isLoggedIn()) :
    redirect('index.php');
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
            <div class="my-title">Help Center</div>
                <div class="contents-manage">
                    <?php if($sessionULe == 'Admin' || $sessionULe == 'Librarian') : ?>
                    <div class="in-content">
                        <span>To borrow a book to user</span>
                        <ul>
                            <li>Click <b>Borrow</b> -> <b>Borrow a Book</b> link</li>
                            <li>Select Books to borrow using check boxes available at the right side of the book catalog</li>
                            <li><b>Note:</b> Maximum of two (2) books per borrower </li>
                            <li><b>Select user/ Borrower</b> on the select box at the top of books catalog</li>
                            <li>Select the due date on the <b>Due Date</b> box then click <b>Borrow Now</b></li>
                        </ul>
                    </div>
                    <div class="in-content">
                        <span>Adding a book</span>
                        <ul>
                            <li>Click <b>Books</b> dropdown list</li>
                            <li>Click Add book</li>
                            <li>Fill all book details</li>
                            <li>Click <b>Add Book </b> button</li>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <div class="in-content">
                        <span>Change Account Password</span>
                        <ul>
                            <li>Click <b>More</b> drop down list on the menu bar</li>
                            <li>Then Click <b>Reset password</b> link </li>
                            <li>Enter Old Password, New password and repeat your new password</li>
                            <li>Click Change password button, You will have to login again</li>
                        </ul>
                    </div>
                    <div class="in-content">
                        <span>View Borrow Details</span>
                        <ul>
                            <li>Click <b>Borrow</b> drop down list on the menu bar</li>
                            <li>Then choose the borrow details category you want to view</li>
                            <li>Example: Returned, Unreturned etc.</li>
                        </ul>
                    </div>
                    <div class="in-content">
                        <span>View Available books</span>
                        <ul>
                            <li>Click <b>Books</b> drop down list on the menu bar</li>
                            <li>Then choose the book category you want to view</li>
                            <li>Example: Normal, Reference etc.</li>
                        </ul>
                    </div>
                    <?php if($sessionULe == 'Admin' || $sessionULe == 'Librarian') : ?>
                    <div class="in-content">
                        <span>Adding a user</span>
                        <ul>
                            <li>Click <b>Users</b> dropdown list</li>
                            <li>Click <b>Add User</b> link</li>
                            <li>Fill all user details</li>
                            <li>Click <b>Add User </b> button</li>
                        </ul>
                    </div>
                    <div class="in-content">
                        <span>View users</span>
                        <ul>
                            <li>Click <b>Users</b> dropdown list</li>
                            <li>Click type of users you want to view</li>
                            <li>Example: Users, Blocked etc if any</li>
                        </ul>
                    </div>
                    <div class="in-content">
                        <span>View Specific user's Information</span>
                        <ul>
                            <li>Click <b>Users</b> dropdown list</li>
                            <li>Click <b>All Users</b> link</li>
                            <li>Click <b>View</b> button next to the user you need much information</li>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <div class="in-content">
                        <span>View your Profile</span>
                        <ul>
                            <li>Click <b>Profile</b> Link on the menu bar</li>
                        </ul>
                    </div>
                    <?php if($sessionULe == 'Admin' || $sessionULe == 'Librarian') : ?>
                    <div class="in-content">
                        <span>Adding Catalog</span>
                        <ul>
                            <li>Click <b>Catalog</b> dropdown list</li>
                            <li>Click <b>Add Catalog</b> button</li>
                            <li>Fill Catalog Details</li>
                            <li>Click <b>Add Catalog </b> button</li>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <div class="in-content">
                        <span>Viewing Book Catalog</span>
                        <ul>
                            <li>Click <b>Catalog</b> dropdown list</li>
                            <li>Click <b>View Catalog</b> link</li>
                        </ul>
                    </div>
                    <?php if($sessionULe == 'Admin' || $sessionULe == 'Librarian') : ?>
                    <div class="in-content">
                        <span>Adding Book Classification</span>
                        <ul>
                            <li>Click <b>Classifications</b> dropdown list</li>
                            <li>Click <b>Add Classification</b> button</li>
                            <li>Fill Classification Details</li>
                            <li>Click <b>Add Classification </b> button</li>
                        </ul>
                    </div>
                    <div class="in-content">
                        <span>Viewing Book Classification</span>
                        <ul>
                            <li>Click <b>Classifications</b> dropdown list</li>
                            <li>Click <b>View Classifications</b> link</li>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <div class="in-content">
                        <span>Logout your account</span>
                        <ul>
                            <li>Click <b>Logout</b> link on the menu bar</li>
                        </ul>
                    </div>
                    <div class="in-content wide-box">
                        <span>Remember: Search box is on every page of data retrieving, to assist you with easy retrieving of your data!</span>
                        <br><span>Thank you for reading, Enjoy!</span>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'AppRoot/Includes/footer.inc'; ?>
<script type="text/javascript">
var picker = new Pikaday({ field: document.getElementById('datepicker') });
</script>
    </body>
</html>