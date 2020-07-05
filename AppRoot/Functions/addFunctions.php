<?php
// Add User
function signUp($uName, $Pass, $rePass, $fName, $sName, $Phone, $Gender){
    global $link, $errors, $successes;
    //Future aligorithm take them to an array then sanitize them in a loop in another function
    //$userno     =  secureText (checkValue($userNo, 'User\'s Number is required!')); 
    $uname     =  secureText (checkValue($uName, 'User name is required!')); 
    $pass         = secureText (checkValue($Pass, 'Password is required!'));
    $repass      = secureText (checkValue($rePass, 'You should Re enter password!'));
    $fname      = secureText (checkValue($fName, 'First name is required!'));
    $sname      = secureText (checkValue($sName, 'Last name is required!'));
    $gender     = secureText (checkValue($Gender,'Gender is required!'));
    $phone      = secureText (checkValue($Phone, 'Phone number is necesary'));
    
    if ( strlen($uname) < 4 ){
        array_push($errors,'Username must have more than 4 characters!');
    }
    if ($pass != $repass){
        array_push($errors,'Sorry!. Password do not match!');
    }
    if (strlen($pass) < 6 ){
        array_push($errors,'Password must have more than 6 characters!');
    }
    $unamequery = "SELECT uName FROM users WHERE uName = '{$uname}'";
    $resultuname = mysqli_query ($link, $unamequery);
    
    if (mysqli_num_rows ($resultuname) > 0){
            array_push($errors,"Sorry! User with username {$uname} is already exist");
    }
    if (count($errors) == 0){
        /*
         * Future emplementation: query udser Number from transaction table if paid
         */
        $passcypt = password_hash($pass, PASSWORD_BCRYPT, array( 'cost'=>12 ));
        $query = "INSERT INTO `users` (`uName`, `pass`, `fName`, `sName`, `phone`, `gender`, `uLevel`) VALUES ('{$uname}', '{$passcypt}', '{$fname}', '{$sname}', '{$phone}', '{$gender}', 'User')";
        $result = mysqli_query($link, $query);
        if($result){
            echo "<script>alert('Successfull Registered.');</script>";
            loginUser ($uname, $pass);
        }
        else{
            array_push($errors,'Sorry requiest Failded!.. Please contact database Admin!');
            array_push($errors, mysqli_error($link));
        }
    }
}
// Add User
function addUser($userNo, $uName, $Pass, $rePass, $Email, $fName, $mName, $sName, $Address, $Phone, $Gender, $type, $idType, $idNo, $Street, $houseNo, $Country, $uLevel){
    global $link, $errors, $successes;
    //Future aligorithm take them to an array then sanitize them in a loop in another function
    $userno      = secureText (checkValue($userNo, 'User\'s Number is required!')); 
    $uname     = secureText (checkValue($uName, 'User name is required!')); 
    $pass      = secureText (checkValue($Pass, 'Password is required!'));
    $repass    = secureText (checkValue($rePass, 'Yous should Re enter password!'));
    $email       = secureText (checkValue($Email, 'Email is required!'));
    $fname  = secureText (checkValue($fName, 'First name is required!'));
    $mname  = secureText ($mName);
    $sname  = secureText (checkValue($sName, 'Last name is required!'));
    $gender  = secureText (checkValue($Gender,'Gender is required!'));
    $address  = secureText (checkValue($Address, 'Address is Required'));
    $phone  = secureText ($Phone);
    $idtype  = secureText (checkValue($idType, 'ID type is required!'));
    $idno  = secureText (checkValue($idNo, 'ID number is required!'));
    $street  = secureText (checkValue($Street, 'Street is required!'));
    $houseno  = secureText (checkValue($houseNo, 'House number is required!'));
    
    if ( strlen($uname) < 4 ){
        array_push($errors,'Username must have more than 6 characters!');
    }
    if ($pass != $repass){
        array_push($errors,'Sorry!.. password do not match!');
    }
    if (strlen($pass) < 6 ){
        array_push($errors,'Password must have more than 6 characters!');
    }
    $unamequery = "SELECT uName FROM users WHERE uName = '{$uname}'";
    $resultuname = mysqli_query ($link, $unamequery);
    
    if (mysqli_num_rows ($resultuname) > 0){
            array_push($errors,"Sorry! User with username {$uname} is already exist");
    }
    if (count($errors) == 0){
        $pass = password_hash($pass, PASSWORD_BCRYPT, array( 'cost'=>12 ));
        $query = "INSERT INTO `users` (`userNo`,`uName`,`pass`,`email`, `fName`, `mName`,`sName`,`address`,`phone`, `gender`,`type`,`idType`,`idNo`,`street`,`houseNo`,`country`,`uLevel`) VALUES ('{$userno}', '{$uname}', '{$pass}','{$email}', '{$fname}','{$mname}', '{$sname}', '{$address}', '{$phone}', '{$gender}', '{$type}', '{$idtype} ', '{$idno}', '{$street}', '{$houseno}', '{$Country}', '{$uLevel}')";
        $result = mysqli_query($link, $query);
        if($result){
            echo "<script>alert('User registered successful');</script>";
            array_push($successes, 'Congratulations!.. User Added Successful!');
            ?>
            <meta http-equiv="refresh" content="1; url=viewUsers.php">
            <?php
        }
        else{
            array_push($errors,'Sorry requiest Failded!.. Please contact database Admin!');
            array_push($errors, mysqli_error($link));
        }
    }
}

//Add Book
function addBook ($bookTitle, $Author, $bookPub, $Pages, $ISBN, $copyrightYear, $dateReceived, $status, $Price, $classID){
    global $link, $errors;

    $booktitle  = secureText (checkValue($bookTitle, 'Book title is required!'));
    $author  = secureText (checkValue($Author, 'Author Name is necessary! Please fill..'));
    $bookpub  = secureText (checkValue($bookPub,' Book publisher is necessary! Please fill..'));
    $pages  = secureText (checkValue($Pages, 'Number of pages are necessary! Please fill..'));
    $isbn  = secureText (checkValue($ISBN,'ISBN number is necessary! Please fill..'));
    $copyrightyear  = secureText (checkValue($copyrightYear, 'Copyright Year is necessary! Please fill..'));
    $datereceive  = convertDateToMysql($dateReceived);
    $price  = secureText (checkValue($Price, 'Price is necessary! Please fill..'));
    
    if ( !is_numeric($price)){
        array_push ($errors,'Price should be numeric');
    }
    if ( count ($errors) == 0 ){
    $query = "INSERT INTO `books` (`bookTitle`, `author`, `bookPub`, `pages`, `ISBN`, `copyrightYear`, `dateReceived`, `dateAdded`, `status`, `price`, `classID`) VALUES ('{$booktitle}', '{$author}', '{$bookpub}', '{$pages}', '{$isbn}', '{$copyrightyear}', '{$datereceive}', Now(), '{$status}', '{$price}', '{$classID}')";
    $result = mysqli_query ($link, $query);
        if ($result){
            echo "<script>alert('Book added successful');</script>";
            ?>
            <meta http-equiv="refresh" content="1; url=viewBooks.php">
            <?php
        }
        else{
            array_push ($errors,'Sorry requiest Failded!.. Please contact database Admin');
        }
    }
}

// Add Borrow
function addBorrow($userID, $dueDate){
    global $link, $errors;
    $duedate    =  secureText ($dueDate); 

    if (!isset($duedate) or empty($duedate)){
        array_push($errors,'Due date is required!');
    }
    if (count($errors) == 0){
        $query = "INSERT INTO borrow (userID, dateBorrow, dueDate) VALUES ({$userID}, Now(), '{$dueDate}')";
        $result = mysqli_query($link, $query);
        if ($result){
            return true;
        }
        else{
            array_push ($errors,'Sorry requiest Failded!.. Please contact database Admin!');
        }
    }
}

// Add Borrow Details
function addBorrowDetails($catalogID, $borrowID, $borrowStatus){
    global $link, $errors;
    
    if (!isset($catalogID) or empty($catalogID)){
        array_push($errors,'Catalog is required!');
    }
    if (!isset($borrowID) or empty($borrowID)){
        array_push($errors,'User is required!');
    }
    if (count($errors) == 0){
        $query = "INSERT INTO borrowdetails (catalogID, borrowID, borrowStatus, dateReturn) VALUES ('{$catalogID}', '{$borrowID}', '{$borrowStatus}', '')";
        $result = mysqli_query($link, $query);
        if ($result){
            return true;
        }
        else{
            array_push ($errors,'Sorry requiest Failded!.. Please contact database Admin!');
            array_push($errors, mysqli_error($link));
        }
    }
}

function borrowBook($userID, $dueDate, $id = array()){
    global $link, $errors;
    $userid  = (int) secureText(checkValue($userID, 'User Must be selected'));
    
    $result = mysqli_query($link,"SELECT * FROM borrow LEFT JOIN borrowdetails ON borrow.borrowID = borrowdetails.borrowID WHERE borrow.userID='$userid' AND borrowdetails.borrowStatus = 'Pending'");
    $numRows = mysqli_num_rows($result);
    
    checkValue($id, 'Sorry no book selected');
    
    if($numRows >= 2){
        array_push($errors, 'User have more than one unreturned books');
    }
    else if($numRows >= 1 && count($id)>= 2){
        array_push($errors, 'User is allowed to borrow the maxmum of one book because he has one book unreturned');
    }
    if(count($errors) == 0){
        $duedate = convertDateToMysql($dueDate);
        if(addBorrow($userid, $duedate)){
            $query = mysqli_query($link,"select * from borrow order by borrowID DESC");
            if(!$query){
                array_push($errors, 'Faild to add borrow details');
            }else{
                $row = mysqli_fetch_array($query);
                $borrowID  = $row['borrowID']; 
                $number = count($id);
                for($i=0; $i < $number; $i++){
                    $idnum = $id[$i];
                    $addBorrow = addBorrowDetails($idnum, $borrowID, 'Pending');
                    $updateDetails = mysqli_query($link,"update catalog set state = '0' where catalogID = $id[$i]");
                }
                if($addBorrow && $updateDetails){
                    redirect('viewBorrowDetails.php');
                }
            }
            
        }
    }
}

// Add Catalog
function addCatalog ($catalogNo, $catStatus, $bookID){
    global $link, $errors;
    $catalogno  = secureText(checkValue($catalogNo, 'Catalog Number is required!'));
    $catstatus     = secureText(checkValue($catStatus, 'Catalog status is required!')); 
    $bookid   = secureText(checkValue($bookID, 'Book is required!'));
    
    if ( count($errors) == 0 ){
        $query = "INSERT INTO catalog (catalogNo, catStatus, state, bookID) VALUES ('{$catalogno}', '{$catstatus}', 1, '{$bookid}')";
        $result = mysqli_query($link, $query);
        if($result){
            echo "<script>alert('Catalog registered successful');</script>";
            ?>
            <meta http-equiv="refresh" content="1; url=viewCatalogs.php">
            <?php
        }
        else{
            array_push($errors,'Sorry requiest Failded!.. Please contact database Admin!');
        }
    }
}

// Add Borrow Details
function addClassification($deweyNo, $className){
    global $link, $errors;
    $deweyno = checkValue($deweyNo, 'Dewey Number is required!');
    $classname = secureText(checkValue($className, 'Classification is required!'));
    if (count($errors) == 0){
        $query = "INSERT INTO classification (deweyNo, className) VALUES ('{$deweyno}', '{$classname}')";
        $result = mysqli_query($link, $query);
        if ($result){
            echo "<script>alert('Classifications added successful');</script>";
        ?>
        <meta http-equiv="refresh" content="1; url=viewClassifications.php">
        <?php
        }
        else{
            array_push ($errors,'Sorry requiest Failded!.. Please contact database Admin!');
        }
    }
}