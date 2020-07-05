<?php
date_default_timezone_set('UTC');
session_start();

$host = 'localhost'; 
$user = 'atchosti_tolms'; 
$password = 'MayungaPassword'; 
$database = 'atchosti_tolms';

$link = mysqli_connect($host, $user, $password, $database );
if (!$link) {
    echo "There is NO connection to a Database".  mysqli_error ($link);
    die();
}
$errors = array ();
$successes = array ();
if(isset($_SESSION['userID'])){
    $sessionUID           = $_SESSION['userID'];
    $sessionUN            = $_SESSION['uName'];
    $sessionGen           = $_SESSION['gender'];
    $sessionULe           = $_SESSION['uLevel'];
    $sessionFNa           = $_SESSION['fName'] ;
    $sessionSNa           = $_SESSION['sName'] ;
    $status = ($sessionGen == 'Male') ? 'Mr. ' : 'Miss. ';
}

require_once ('AppRoot/Functions/functions.php');
require_once ('AppRoot/Functions/addFunctions.php');
require_once ('AppRoot/Functions/updateFunctions.php');
require_once ('AppRoot/Functions/deleteFunctions.php');
require_once ('AppRoot/Functions/viewFunctions.php');
