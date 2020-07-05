<div id="navigation_wrap">
    <ul class="rad_top">
      <li class="rad_lt"><a href="profile.php">Profile</a></li>
       <?php if($sessionULe != 'Blocked') : ?>
      <li><a href="#">Books</a>
        <ul>
            <?php if($sessionULe == 'Admin' || $sessionULe == 'Librarian') : ?>
            <li><a href="manageBook.php">Add Books</a></li>
            <?php endif; ?>
          <li><a href="viewBooks.php">View All Books</a></li>
          <li><a href="viewBooksAvailable.php">View Available Books</a></li>
          
          <li><a href="viewBooksNormal.php">View Normal Books</a></li>
          <li><a href="viewBooksReference.php">View Reference Books</a></li>
        </ul>
      </li>
      <?php if($sessionULe == 'Admin' || $sessionULe == 'Librarian') : ?>
        <li><a href="#">Users</a>
            <ul>
                <li><a href="addUser.php">Add User</a></li>
                <li><a href="viewUsers.php">View All Users</a></li>
                <li><a href="viewUserUsers.php">View Users</a></li>
                <li><a href="viewBlockedUsers.php">View Blocked Users</a></li>
              <?php if($sessionULe == 'Admin') :  ?>
                <li><a href="viewLibrarianUsers.php">View Librarians</a></li>
                <li><a href="viewAdminUsers.php">View Admins</a></li>
             <?php endif; ?>
            </ul>
        </li>
      <?php endif; ?>
      <li><a href="#">Borrow</a>
        <ul>
            <?php if($sessionULe == 'Admin' || $sessionULe == 'Librarian') : ?>
            <li><a href="borrowBook.php">Borrow a Book</a></li>
            <?php endif; ?>
            <li><a href="viewBorrowDetails.php">Borrow Details</a></li>
            <li><a href="viewBorrowPending.php">Pending Details</a></li>
            <li><a href="viewBorrowReturned.php">Returned Details</a></li>
        </ul>
      </li>
      <li><a href="#">Catalog</a>
        <ul>
            <?php if($sessionULe == 'Admin' || $sessionULe == 'Librarian') : ?>
            <li><a href="manageCatalog.php">Add Catalog</a></li>
            <?php endif; ?>
            <li><a href="viewCatalogs.php">View Catalog</a></li>
        </ul>
      </li>
      <?php if($sessionULe == 'Admin' || $sessionULe == 'Librarian') : ?>
      <li><a href="#">Classification</a>
        <ul>
          <li><a href="manageClassification.php">Add Book classification</a></li>
          <li><a href="viewClassifications.php">View Book Classifications</a></li>
        </ul>
      </li>
      <?php endif; ?>
      <?php endif; ?>
      <li><a href="#">More</a>
        <ul>
          <li><a href="help.php">Help</a></li>
          <li><a href="changePass.php">Reset Password</a></li>
        </ul>
      </li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
</div>