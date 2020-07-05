<?php
//Redirection Function
function redirect ($path) {
    if (!empty($path)){
        return header("Location: {$path}");
    }
    return false;
}

function countData ($columnName, $tableName) {
    global $link;
    
    if (empty ($columnName) || empty ($tableName)){
        return false;
    }
    $query        = mysqli_query ($link, "SELECT `{$columnName}`  FROM {$tableName}");
    $result        = mysqli_num_rows ($query);
    return $result;
}
//Check if is admin or Registry or user
function haveAccess ($sessionUserID, $userType) {
    global $link;
    if (empty($userType || $sessionUserID)) {
        return false;
    }
    $usertype   = secureText($userType);
    $snUsID   = secureText($sessionUserID);
    $query       = mysqli_query($link, "SELECT userID, uLevel FROM users WHERE userID = '{$snUsID}' AND uLevel = '{$usertype}'");
    if (mysqli_num_rows($query) == 1){
        return true;
    }
    return false;
}

// Log a user In
function loginUser ($uname, $password) {
    global $link, $errors;
        $username = secureText ($uname);
    if (empty ($username) || empty ($password)) {
        array_push ($errors, 'You must Fill Username and Password!');
        return false;
    }
    $query       = mysqli_query ($link, "SELECT userID, uName, pass, gender, fName, uLevel FROM users WHERE uName = '{$username}' OR email = '{$username}' ");
    $qudata      = mysqli_fetch_assoc ($query);
    $hash_pass  = $qudata['pass'];
        if (password_verify ($password, $hash_pass)){
            $_SESSION['userID'] = $qudata['userID'];
            $_SESSION['fName'] = $qudata['fName'];
            $_SESSION['sName'] = $qudata['sName'];
            $_SESSION['uName'] = $qudata['uName'];
            $_SESSION['gender'] = $qudata['gender'];
            $_SESSION['uLevel'] = $qudata['uLevel'];
            redirect('profile.php');
            return true;
        }
    array_push ($errors, 'Username or Password did not match!');
    return false;
}

function isLoggedIn () {
    if ( isset ($_SESSION['userID']) && !empty ($_SESSION['userID']) && is_numeric ($_SESSION['userID'])) {
        return true;
    }
    return false;
}

//Secure Inputs
function secureText ($text) {
    global $link;
    $string = trim ($text); 
    $securedString = mysqli_real_escape_string ($link, $string);
    return $securedString;
}
function countUserdata($tableName = null, $columnName = null, $value = null, $columnName2 = null, $status = null) {
    global $link;
    if(empty($tableName)){
        return false;
    }
    $query = "SELECT * FROM {$tableName} ";
    
    if(!empty($columnName) && !empty($value)){
        $query .= " WHERE {$columnName} = '$value' ";
    }
    if(!empty($status) && !empty($columnName2) ){
        $query .= " AND {$columnName2} = '{$status}' ";
    }
    $query         = mysqli_query($link, $query);
    $result         = mysqli_num_rows($query);
    return $result;
}

function getDataFromTable($table='', $col='', $value='', $resType = false){
    global $link;
    if(!isset($table)){
        return false;
    }
    $query = "SELECT * FROM {$table} ";
    
    if((isset($col) && !empty($col)) || (isset($value) && !empty($col))){
         $query .= " WHERE {$col} = '{$value}' ";
    }
    $result = mysqli_query($link, $query);
    if($result){
        if($resType){
            return mysqli_fetch_assoc($result);
        }
        return $result;
    }else{
        return false;
    }
}
function getSingleRow($table = '', $col = '', $value = ''){
    global $link;
    $query = "SELECT * FROM {$table} ";
    
    if((isset($col) && !empty($col)) || (isset($value) && !empty($col))){
         $query .= " WHERE {$col} = '{$value}' ";
    }
    $rowData = mysqli_query($link, $query);
    if($rowData){
        $fetched_row = mysqli_fetch_assoc($rowData);
        return $fetched_row;
    }else{
        return false;
    }
}

function getSpentDays($toDate, $fromDate){
    if(empty($toDate) || empty($fromDate)){
        return false;
    }
    if($toDate == '0000-00-00 00:00:00'){
        $toDate = date("Y-m-d h:i:s", time());
    }

    //returns seconds on dateDiff
    $dateDiff = strtotime($toDate) - strtotime($fromDate);

    //Converting seonds to days 60sec * 60min * 24hours 
    $days = floor($dateDiff/(3600*24));
    if($days < 1){
        return 0;
    }
    return $days;
}

function convertDateToMysql($date){
    $date = date("Y-m-d h:i:s", strtotime($date));
    return $date;
}

function checkValue($value, $message){
    global $errors;
    if (!isset($value) or empty($value)){
        array_push($errors, $message);
    }
    return $value;
}
//function checkEquality($value1, $value2, $message){
//    global $errors;
//    if($value1 != $value2){
//        array_push($errors, $message);
//    }
//}
/**
 * Upgrade the top select query
 * 
    if(!empty($filter)){
        $query .= " WHERE branchNo LIKE '%$filter%' OR city LIKE '%$filter%' OR street LIKE '%$filter%' OR postcode LIKE '%$filter%' ";
    }
 */