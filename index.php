<?php
include('AppRoot/init.inc.php'); 
$title = 'Login Now';

if (isLoggedIn()){
    redirect('profile.php');
}
if(isset($_POST['login'])){
    extract($_POST);
    loginUser($username,$password);
}
?>
<!DOCTYPE html>
<html>
<?php include('AppRoot/Includes/head.inc'); ?>
    <body class="login-page">    
        <div class="user-login">
            <div class="my-title">Library Management System</div>
            <div class="thumbnail"><img src="AppRoot/Assets/Img/default.jpg"/></div>
            <?php if(isset($_POST['login'])) include 'AppRoot/Includes/errors.php'; ?>
            
            <form class="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                  <input type="text" class="input-boxes" name="username" placeholder="Username"/>
                  <input type="password" class="input-boxes" name="password" placeholder="Password"/>
                  <input type="submit" value="Login" class="form-button" name="login">
                  <p class="message">You don't have an account? <a href="signup.php">Sign up here!</a></p>
                  <p class="message">Made by <a href="#">John Mayunga</a> &copy; <?php echo "2018 - " . date("Y"); ?></p>
            </form>
        </div>
    </body>
</html>