<?php
function updatePassword($sessionUserID, $oldPass, $pass, $repass){
    global $link, $errors;

    if (!isLoggedIn()){
            return false;
    }
    if (empty($sessionUserID)){
            array_push($errors,'Your ID was not supplied please contact Admin!');
    }
    if ($pass != $repass){
            array_push($errors,'Your Password does not match');
    }
    if (empty($oldPass)){
            array_push($errors,'Please enter your Old Password!');
    }
    if (empty($pass) || empty($repass)){
            array_push($errors,'You must fill new Password Boxes!');
    }
    if (strlen($pass) < 6){
            array_push($errors,'Password entered is less than six characters!');
    }
    $userPass = mysqli_query($link, "SELECT pass, userID FROM users WHERE userID = '{$sessionUserID}'");

    if (mysqli_num_rows ($userPass) == 1){
        
        $dataPass = mysqli_fetch_assoc($userPass);
        $oldPassHashed = $dataPass['pass'];

        if (password_verify($oldPass, $oldPassHashed) && count($errors) == 0){

            $newPass = password_hash ($pass, PASSWORD_BCRYPT, array( cost => 12 ));
            $userPassUpdate = mysqli_query ($link, "UPDATE users SET pass = '{$newPass}' WHERE userID = '{$sessionUserID}'");
            if ($userPassUpdate){
                array_push ($errors, 'Your Password Has been changed Successfully.');
                array_push ($errors, 'Please login here with your new Password!');
                redirect ('index.php');
                session_unset();
                session_destroy(); 
                return true;
            }
        }
        else{
                array_push($errors,'Old Password Entered did not match the current password!');
        }
    }
    return false;
}
//Update Users table
function updateUser($prim, $userNo, $uName, $Email, $fName, $mName, $sName, $Address, $Phone, $Gender, $type, $idType, $idNo, $Street, $houseNo, $Country, $uLevel){
    global $link, $errors, $successes;
    //Future aligorithm take them to an array then sanitize them in a loop in another function
    $userno      = secureText ($userNo); 
    $uname     = secureText ($uName); 
    $email       = secureText ($Email);
    $fname  = secureText ($fName);
    $mname  = secureText ($mName);
    $sname  = secureText ($sName);
    $address  = secureText ($Address);
    $phone  = secureText ($Phone);
    $gender  = secureText ($Gender);
    $idtype  = secureText ($idType);
    $idno  = secureText ($idNo);
    $street  = secureText ($Street);
    $houseno  = secureText ($houseNo);
    
    if (!isset($userno) or empty($userno)){
        array_push($errors,'User\'s Number is required!');
    }
    if (!isset($uname) or empty($uname)){
        array_push($errors,'User name is required!');
    }
    if (!isset($email) or empty($email)){
        array_push($errors,'Email is required!');
    }
    if (!isset($fname) or empty($fname)){
        array_push($errors,'First name is required!');
    }
    if (!isset($sname) or empty($sname)){
        array_push($errors,'Last name is required!');
    }
    if (!isset($idtype) or empty($idtype)){
        array_push($errors,'ID type is required!');
    }
    if (!isset($idno) or empty($idno)){
        array_push($errors,'ID number is required!');
    }
    if (!isset($gender) or empty($gender)){
        array_push($errors,'Sex is required!');
    }
    if (!isset($type) or empty($type)){
        array_push($errors,'Usertype is required!');
    }
    if (!isset($street) or empty($street)){
        array_push($errors,'Street is required!');
    }
    if (!isset($houseno) or empty($houseno)){
        array_push($errors,'House number is required!');
    }
    if ( strlen($uname) < 4 ){
        array_push($errors,'Username must have more than 6 characters!');
    }
    $unamequery = "SELECT uName FROM users WHERE uName = '{$uname}' AND userID <> '{$prim}'";
    $resultuname = mysqli_query ($link, $unamequery);
    
    if (mysqli_num_rows ($resultuname) > 0){
            array_push($errors,"Sorry! User with username {$uname} is already exist");
    }
    if (count($errors) == 0){
        $query = "UPDATE users SET `userNo` = '{$userNo}', `uName` = '{$uName}', `email` = '{$email}', `fName` = '{$fname}', `mName` = '{$mname}', `sName` = '{$sname}', `address` = '{$address}', `phone` = '{$phone}', `gender` = '{$gender}', `type` = '{$type}', `idType` = '{$idtype}', `idNo` = '{$idno}', `street` = '{$street}', `houseNo` = '{$houseno}', `country` = '{$Country}', `uLevel` = '{$uLevel}' WHERE userID = '{$prim}'";
        $result = mysqli_query($link, $query);
        if($result){
            echo "<script>alert('User details updated successful');</script>";
            ?>
            <meta http-equiv="refresh" content="1; url=viewUsers.php">
            <?php
        }
        else{
            array_push ($errors, 'Sorry requiest Failded!.. Please contact database Admin!');
        }
    }
    return false;
}

// Update Book
function updateBook ($prim, $bookTitle, $Author, $bookPub, $Pages, $ISBN, $copyrightYear, $dateReceive, $status, $Price, $classID){
    global $link, $errors;

    $booktitle  = secureText ($bookTitle);
    $author  = secureText ($Author);
    $bookpub  = secureText ($bookPub);
    $pages  = secureText ($Pages);
    $isbn  = secureText ($ISBN);
    $copyrightyear  = secureText ($copyrightYear);
    $datereceive  = convertDateToMysql(secureText ($dateReceive));
    $price  = secureText ($Price);
    
    if (!isset($booktitle) or empty($booktitle)){
        array_push($errors,'Book title is required!');
    }
    if ( !isset ($author) or empty ($author) ){
        array_push ($errors,'Author Name is necessary! Please fill..');
    }
    if ( !isset($bookpub) or empty($bookpub) ){
        array_push ($errors,'Book publisher is necessary! Please fill..');
    }
    if ( !isset($pages) or empty($pages) ){
        array_push ($errors,'Number of pages are necessary! Please fill..');
    }
    if ( !isset($copyrightyear) or empty($copyrightyear) ){
        array_push ($errors,'Copyright Year is necessary! Please fill..');
    }
    if ( !isset($datereceive) or empty($datereceive) ){
        array_push ($errors,'Date received is necessary! Please fill..');
    }
    if ( !isset($isbn) or empty($isbn) ){
        array_push ($errors,'ISBN number is necessary! Please fill..');
    }
    if ( !isset($price) or empty($price) ){
        array_push ($errors,'Price is necessary! Please fill..');
    }
    if ( !is_numeric($price)){
        array_push ($errors,'Price should be numeric');
    }
    if ( count($errors) == 0 ){
        $query = "UPDATE books SET `bookTitle` = '{$booktitle}', `author` = '{$author}', `bookPub` = '{$bookpub}', `pages` = '{$pages}', `ISBN` = '{$isbn}', `copyrightYear` = '{$copyrightyear}', `dateReceived` = '{$datereceive}', `status` = '{$status}', `price` = '{$price}', `classID` = '{$classID}' WHERE bookID = '{$prim}'";
        $result = mysqli_query($link, $query);
        if($result){
            echo "<script>alert('Book details updated successful');</script>";
            ?>
            <meta http-equiv="refresh" content="1; url=viewBooks.php">
            <?php
        }
        else{
            array_push($errors,'Sorry requiest Failded!.. Please contact database Admin!');
            array_push($errors, mysqli_error($link));
        }
    }
}

// Update Borrow
function updateBorrow($prim, $userID, $dueDate){
    global $link, $errors;
    $duedate    =  secureText ($dueDate); 

    if (!isset($duedate) or empty($duedate)){
        array_push($errors,'Due date is required!');
    }
    if (count($errors) == 0){
        $query = "UPDATE borrow SET userID = '{$userID}', dueDatebranchNo = {$duedate}' WHERE borrowID = '{$prim}'";
        $result = mysqli_query($link, $query);
        if($result){
            echo "<script>alert('Borrow informations Updated successful');</script>";
            ?>
            <meta http-equiv="refresh" content="1; url=viewBranches.php">
            <?php
            }
        }
        else{
              array_push($errors,'Sorry requiest Failded!.. Please contact database Admin!');
       }
}
function unblock($userID, $value, $action){
    global $link, $errors;
    
        $query = "UPDATE users SET uLevel = '{$value}'  WHERE userID = '{$userID}'";
        $result = mysqli_query($link, $query);
        if($result){
            ?>
            <script>alert('User <?=$action; ?> successful');</script>
            <meta http-equiv="refresh" content="1; url=viewUsers.php">
            <?php
            }
        else{
              array_push($errors,'Sorry requiest Failded!.. Please contact database Admin!');
       }
}

// Update Client
function updateBorrowDetails($Prim, $catalogID, $borrowID, $borrowStatus, $dateReturn){
    global $link, $errors;
    
    if (!isset($catalogID) or empty($catalogID)){
        array_push($errors,'Catalog is required!');
    }
    if (!isset($borrowID) or empty($borrowID)){
        array_push($errors,'User is required!');
    }
    if (!isset($dateReturn) or empty($dateReturn)){
        array_push($errors,'Return Date is required!');
    }
    if (count($errors) == 0){
        if($result){
            $query = "UPDATE borrowdetails SET catalogID = '{$catalogID}', borrowID = '{$borrowID}', borrowStatus = '{$borrowStatus}', dateReturn = '{$datereturn}') WHERE borrowDetailsNo = '{$prim}'";
            $result = mysqli_query($link, $query);
            if($result){
                echo "<script>alert('Borrow details Updated successful successful');</script>";
                ?>
            <meta http-equiv="refresh" content="1; url=viewBorrowDetails.php">
            <?php
            }
        }
    }
    else{
        array_push($errors,'Sorry requiest Failded!.. Please contact database Admin!');
    }
}

function updateCatalog ($prim, $catalogNo, $catStatus, $State, $bookID){
    global $link, $errors;
    $catalogno  = secureText ($catalogNo);
    $catstatus     = secureText ($catStatus); 
    $state     = secureText ($State);
    $bookid   = secureText ($bookID);

    if ( !isset ($catalogno) or empty ($catalogno) ){
        array_push($errors,'Catalog Number is required!');
    }
    if ( !isset ($catstatus) or empty ($catstatus) ){
        array_push($errors,'Catalog status is required!');
    }
    if ( !isset ($state) or empty ($state) ){
        array_push($errors,'State is required!');
    }
    if ( !isset ($bookid) or empty ($bookid) ){
        array_push($errors,'Book is required!');
    }
    if (count($errors) == 0){
        
        $query = "UPDATE privateowner SET catalogNo = '{$catalogno}', catStatus = '{$catstatus}', state = '{$state}', bookID = '{$bookid}' WHERE catalogID = '{$prim}'";
        $result = mysqli_query($link, $query);
        
        if($result){
            echo "<script>alert('Comment updated successful');</script>";
            ?>
            <meta http-equiv="refresh" content="1; url=viewComments.php">
            <?php
        }
        else{
            array_push($errors,'Sorry requiest Failded!.. Please contact database Admin!');
        }
    }
}
function updateClassification($prim, $deweyNo, $className){
    global $link, $errors;
    
    if (!isset($deweyNo) or empty($deweyNo)){
        array_push($errors,'Dewey Number is required!');
    }
    if (!isset($className) or empty($className)){
        array_push($errors,'Classification is required!');
    }
    if (count($errors) == 0){
        
        $query = "UPDATE classification SET deweyNo = '{$deweyNo}', className = '{$className}'  WHERE classID = '{$prim}'";
        $result = mysqli_query($link, $query);
        
        if($result){
            echo "<script>alert('Classification updated successful');</script>";
            ?>
            <meta http-equiv="refresh" content="1; url=viewClassifications.php">
            <?php
        }
        else{
            array_push($errors,'Sorry requiest Failded!.. Please contact database Admin!');
        }
    }
}
function returnBook($borrowID, $catalogID){
    global $link;
    $borrowid = (int) secureText($borrowID);
    $catalogid = (int) secureText($catalogID);
    $result = mysqli_query($link, "UPDATE borrow LEFT JOIN borrowDetails on borrow.borrowID = borrowdetails.borrowID SET borrowStatus='Returned', dateReturn= NOW() WHERE borrow.borrowID='{$borrowid}' and borrowDetails.catalogID = '{$catalogid}'");
    $result1 = mysqli_query($link, "UPDATE catalog SET state = '1' where catalogID = '{$catalogid}'");
    if($result && $result1){
        header('location: viewBorrowDetails.php');
    }else{
        array_push($errors,'Sorry requiest Failded!.. Please contact database Admin!');
    }
}