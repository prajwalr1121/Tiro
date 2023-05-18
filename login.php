<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
	 <link rel="stylesheet" href="style.css"/>
	   <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>  
<meta name="viewport" content="width=device-width, initial-scale=1">	   
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
</head>
<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: candidate-dashboard.html");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>


<header class="header">
  <div class="container">
    <div class="header-content">
      <div class="logo">Logo</div>
      <div class="icons">
        <i class="fa fa-bars" id="menu-icon"></i>&nbsp;&nbsp;&nbsp;
        <i class="fa fa-user"></i>
      </div>
    </div>
  </div>
</header>

<div class="popup-menu" id="popup-menu">
  <ul>
    <li>Menu Item 1</li>
    <li>Menu Item 2</li>
    <li>Menu Item 3</li>
  </ul>
</div>




    <form class="form" method="post" name="login">
       <h3 style="font-weight: 600;
    font-size: 24px;
    line-height: 33px;
    color: #202124;
    margin-bottom: 32px;text-align:left">Login Your Account</h3>
	
	
	<div class="row" style="background-color: #34A853;border-radius:8px;    padding: 0px;">
	
        <div class="" style="
       text-align: center;
    color: #ffffff;
    line-height: 20px;
    border-radius: 8px;
    font-weight: 400;
    padding: 15px 35px;
    margin: auto;"><i class="fa fa-user"></i> Candidate </div>
                  </div><br>
		
		<div class="row">
		
		<div class="col-lg-6 col-md-6">
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
		</div>
		
		<div class="col-lg-6 col-md-6">
        <input type="password" class="login-input" name="password" placeholder="Password"/>
		</div>
		
        <input type="submit" value="Login" name="submit" class="login-button"/>
		</div>
		<br><br>
        <p class="link">Don't have an account? <a href="registration.php">Registration Now</a></p>
		
		
		
		<div class="container" style=" display: flex;
  align-items: center;
  justify-content: center;margin-top:20px; margin-bottom:20px;">
  <div class="divider"></div>
  <div class="or">or</div>
  <div class="divider"></div>
</div>


          <div class="row">
		  
  <div class="col-md-6" style="padding-bottom: 20px;"><a href="" class="facebook-button">
    <i class="fa fa-facebook-f"></i>
    <span>Facebook</span>
  </a></div>
  
  <div class="col-md-6">
  <a href="#" class="google-button">
    <i class="fa fa-google"></i>
    <span>Google</span>
  </a></div>
</div>
		
		
  </form>
  
  
  
  
<?php
    }
?>

<script>
const menuIcon = document.getElementById('menu-icon');
const popupMenu = document.getElementById('popup-menu');

menuIcon.addEventListener('click', function() {
  popupMenu.classList.toggle('show-popup');
});

</script>


</body>
</html>
