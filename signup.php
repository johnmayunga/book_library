<?php
include('AppRoot/init.inc.php'); 
$title = 'Signup Now';

if (isLoggedIn()){
    redirect('profile.php');
}
if(isset($_POST['signup'])){
    extract($_POST);
    signUp($uName, $Pass, $rePass, $fName, $sName, $Phone, $Gender);
}
?>
<!DOCTYPE html>
<html>
<?php include('AppRoot/Includes/head.inc'); ?>
    <body class="login-page">    
        <div class="user-login">
            <div class="my-title">Create an account</div>
            <?php if(isset($_POST['signup'])) include 'AppRoot/Includes/errors.php'; ?>
            
            <form class="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                  <input type="text" class="input-boxes" name="uName" placeholder="Username"/>
                  <input type="password" class="input-boxes" name="Pass" placeholder="Password"/>
                  <input type="password" class="input-boxes" name="rePass" placeholder="Re-enter Password"/>
                  <input type="text" class="input-boxes" name="fName" placeholder="First Name"/>
                  <input type="text" class="input-boxes" name="sName" placeholder="Surname"/>
                  <input type="text" class="input-boxes" name="Phone" placeholder="Phone number"/>
                  <input type="text" class="input-boxes" name="transaction" placeholder="Payment Transaction ID"/>
                  <select name="Gender" class="input-boxes">
                      <option value="">Choose gender</option>
                      <option value="Female">Female</option>
                      <option value="Male">Male</option>
                  </select>
                  <input type="submit" value="Sign Up" class="form-button" name="signup">
                  <p class="message">You have an account? <a href="index.php">Login here!</a></p>
                  <p class="message">Made by <a href="#">John Mayunga</a> &copy; <?php echo "2018 - " . date("Y"); ?></p>
            </form>
        </div>
    </body>
</html>