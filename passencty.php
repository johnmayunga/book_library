<?php

$pass = "mayunga";
$passcypt = password_hash($pass, PASSWORD_BCRYPT, array( 'cost'=>12 ));
echo $passcypt;
?>
