<?php
function viewUsers($level='', $level1='', $gender='', $filter = ''){
    global $link;
    $data            = array();
    $query          = "SELECT * FROM users WHERE userID <>'' ";
    if(!empty($level) && $level1 =='' ){
        $query .= " AND uLevel = '{$level}' ";
    }
    if(!empty($level) && !empty($level1) ){
        $query .= " AND (uLevel = '{$level}' OR uLevel = '{$level1}') ";
    }
    if(!empty($gender)){
        $query .= " AND gender = '{$gender}' ";
    }
    if(!empty($filter)){
        $query .= " AND (userNo LIKE '%$filter%' OR uName LIKE '%$filter%' OR email LIKE '%$filter%' OR fName LIKE '%$filter%' OR mName LIKE '%$filter%' OR sName LIKE '%$filter%' OR address LIKE '%$filter%' OR phone LIKE '%$filter%' OR gender LIKE '%$filter%' OR type LIKE '%$filter%' OR idType LIKE '%$filter%' OR idNo LIKE '%$filter%' OR houseNo LIKE '%$filter%' OR country LIKE '%$filter%') ";
    }
    $queryresult = mysqli_query($link, $query);
    return $queryresult;
}
function viewBooks($status = '', $filter = ''){
    global $link;
    $data            = array();
    $query          = "SELECT * FROM books WHERE bookID <> '' ";
    
    if(!empty($status)){
        $query .= " AND status = '{$status}' ";
    }
    if(!empty($filter)){
        $query .= " AND (bookTitle LIKE '%$filter%' OR author LIKE '%$filter%' OR bookPub LIKE '%$filter%' OR pages LIKE '%$filter%' OR ISBN LIKE '%$filter%' OR copyrightYear LIKE '%$filter%' OR dateReceived LIKE '%$filter%' OR dateAdded LIKE '%$filter%' OR status LIKE '%$filter%' OR price LIKE '%$filter%' OR classID LIKE '%$filter%') ";
    }
    $queryresult = mysqli_query($link, $query);
    return $queryresult;
}
function viewClassifications($filter = ''){
    global $link;
    $data            = array();
    $query          = "SELECT * FROM classification ";
    if(!empty($filter)){
        $query .= " WHERE classID LIKE '%$filter%' OR deweyNo LIKE '%$filter%' OR className LIKE '%$filter%' ";
    }
    $queryresult = mysqli_query($link, $query);
    return $queryresult;
}
function viewCatalogs($catStatus = '', $catStatus1 = '', $state = '', $filter = ''){
    global $link;
    /*
    $query          = "SELECT * FROM catalog
                            LEFT JOIN books ON books.bookID = catalog.bookID
                            LEFT JOIN classification ON books.classID = classification.classID WHERE catalog.catalogID <> '' ";
    if(!empty($catStatus) && empty($catStatus1)){
        $query .= " AND catalog.catStatus != '{$catStatus}' ";
    } 
    if(!empty($catStatus) && !empty($catStatus1)){
        $query .= " AND catalog.catStatus != '{$catStatus}' AND catalog.catStatus !='{$catStatus1}' ";
    }
    if( !empty($state)){
        $query .= " AND catalog.state !='{$state}' ";
    }     
    if(!empty($filter)){
        $query .= " AND (books.bookTitle LIKE '%$filter%' OR books.author LIKE '%$filter%' OR books.bookPub LIKE '%$filter%' OR books.pages LIKE '%$filter%' OR books.ISBN LIKE '%$filter%' OR books.copyrightYear LIKE '%$filter%' OR books.dateReceived LIKE '%$filter%' OR books.dateAdded LIKE '%$filter%' OR books.status LIKE '%$filter%' OR books.price LIKE '%$filter%' OR books.classID LIKE '%$filter%'' OR catalog.catalogNo LIKE '%$filter%'' OR classification.className LIKE '%$filter%') ";
    }
    $query .= " ORDER BY catalog.catalogNo ASC";
     */
    $query = "SELECT * FROM catalog
                    LEFT JOIN books ON catalog.bookID = books.bookID
                    LEFT JOIN classification ON books.classID = classification.classID
                    WHERE catalog.catStatus !='Deleted' AND catalog.catStatus !='Lost' AND catalog.state !='0' AND books.status !='Refference' ";
    if(!empty($filter)){
        $query .= " AND (books.bookTitle LIKE '%$filter%' OR books.author LIKE '%$filter%' OR books.bookPub LIKE '%$filter%' OR books.pages LIKE '%$filter%' OR books.ISBN LIKE '%$filter%' OR books.copyrightYear LIKE '%$filter%' OR books.dateReceived LIKE '%$filter%' OR books.dateAdded LIKE '%$filter%' OR books.status LIKE '%$filter%' OR books.price LIKE '%$filter%' OR books.classID LIKE '%$filter%') ";
    }
    $query .= " ORDER BY catalog.catalogNo ASC";
    $queryresult = mysqli_query($link, $query);
    return $queryresult;
}

function viewBookCount($catStatus = '', $catStatus1 = '', $state = '', $filter = ''){
    global $link;
    
    /*
    $query          = "SELECT *, COUNT(*) AS quantity FROM catalog
                            LEFT JOIN books ON catalog.bookID = books.bookID
                            LEFT JOIN classification ON books.classID = classification.classID WHERE catalog.catalogID <> '' "; 
    if(!empty($catStatus) && empty($catStatus1)){
        $query .= " AND catalog.catStatus <> '{$catStatus}' ";
    } 
    if(!empty($catStatus) && !empty($catStatus1)){
        $query .= " AND catalog.catStatus <> '{$catStatus}' AND catalog.catStatus <>'{$catStatus1}' ";
    }
    if( !empty($state)){
        $query .= " AND catalog.state <> {$state} ";
    }     
    if(!empty($filter)){
        $query .= " AND (bookTitle LIKE '%$filter%' OR author LIKE '%$filter%' OR bookPub LIKE '%$filter%' OR pages LIKE '%$filter%' OR ISBN LIKE '%$filter%' OR copyrightYear LIKE '%$filter%' OR dateReceive LIKE '%$filter%' OR dateAdded LIKE '%$filter%' OR status LIKE '%$filter%' OR price LIKE '%$filter%' OR classID LIKE '%$filter%') ";
    }
    $query .= " GROUP BY catalog.bookID ";
     */
    $query = "SELECT *, COUNT(*) AS quantity FROM catalog
        LEFT JOIN books ON catalog.bookID = books.bookID
        LEFT JOIN classification ON books.classID = classification.classID
        where catalog.catStatus !='Deleted' AND catalog.catStatus !='Lost' AND catalog.state !='0'  ";
    
    if(!empty($filter)){
        $query .= " AND (books.bookTitle LIKE '%$filter%' OR books.author LIKE '%$filter%' OR books.bookPub LIKE '%$filter%' OR books.pages LIKE '%$filter%' OR books.ISBN LIKE '%$filter%' OR books.copyrightYear LIKE '%$filter%' OR books.dateReceived LIKE '%$filter%' OR books.dateAdded LIKE '%$filter%' OR books.status LIKE '%$filter%' OR books.price LIKE '%$filter%' OR books.classID LIKE '%$filter%') ";
    }
    $query .= " GROUP BY catalog.bookID";
    
    $queryresult = mysqli_query($link, $query);
    return $queryresult;
}

function viewBorrowDetails($userID = '', $status = '', $filter = ''){
    global $link;
    
    $query          = "SELECT * FROM borrow
                                LEFT JOIN users ON borrow.userID = users.userID
                                LEFT JOIN borrowdetails ON borrow.borrowID = borrowdetails.borrowID
                                LEFT JOIN catalog on borrowdetails.catalogID =  catalog.catalogID 
                                LEFT JOIN books on catalog.bookID =  books.bookID WHERE users.userID <> '' "; 
    if(!empty($userID)){
        $query .= " AND borrow.userID = '{$userID}' ";
    }
    if(!empty($status)){
        $query .= " AND borrowdetails.borrowStatus = '{$status}' ";
    }
    if(!empty($filter)){
        $query .= " AND (users.phone LIKE '%$filter%' OR users.email LIKE '%$filter%' OR users.mName LIKE '%$filter%' OR users.sName LIKE '%$filter%' OR users.fName LIKE '%$filter%' OR books.bookTitle LIKE '%$filter%' OR books.author LIKE '%$filter%' OR books.bookPub LIKE '%$filter%' OR books.pages LIKE '%$filter%' OR books.ISBN LIKE '%$filter%' OR books.copyrightYear LIKE '%$filter%' OR books.dateReceived LIKE '%$filter%' OR books.dateAdded LIKE '%$filter%' OR books.status LIKE '%$filter%' OR books.price LIKE '%$filter%' OR books.classID LIKE '%$filter%' ) ";
    }
    $query .= "  ORDER BY borrow.borrowID ASC ";
    $queryResult = mysqli_query($link, $query);
    return $queryResult;
}


function getClassificationFromID($classID){
    global $link;
    $classID = secureText(checkValue($classID, 'Classification is empty!'));
    $result = mysqli_query($link, "SELECT * FROM classification where classID = '{$classID}'");
    if($result){
        $row = mysqli_fetch_assoc($result);
        $classification = $row['deweyNo'] . " " . $row['className'];
        return $classification;
    }
}