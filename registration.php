<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
	   <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>  
<meta name="viewport" content="width=device-width, initial-scale=1">	   
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">   
	
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
		
		 $first_name = stripslashes($_REQUEST['first_name']);
        $first_name = mysqli_real_escape_string($con, $first_name);
		
		 $last_name = stripslashes($_REQUEST['last_name']);
        $last_name = mysqli_real_escape_string($con, $last_name);
		
		$contact = stripslashes($_REQUEST['contact']);
        $contact = mysqli_real_escape_string($con, $contact);
		
		
       
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
		
		
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
		
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
		
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (first_name, last_name, contact, username, password, email, create_datetime)
                     VALUES ('$first_name', '$last_name', '$contact', '$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>




<header class="header">
  <div class="container">
    <div class="header-content">
      <div class="logo">Logo</div>
      <div class="icons">
        <i class="fa fa-bars"></i> &nbsp;&nbsp;&nbsp;
        <i class="fa fa-user"></i>
      </div>
    </div>
  </div>
</header>



    <form class="form" action="" method="post">
        <h3 style="font-weight: 600;
    font-size: 24px;
    line-height: 33px;
    color: #202124;
    margin-bottom: 32px;text-align:left">Create Your Account</h3>
	
	
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
		<input type="text" class="login-input" name="first_name" placeholder="First Name" required />
		</div>
		
		<div class="col-lg-6 col-md-6">
		<input type="text" class="login-input" name="last_name" placeholder="Last Name" required />
		</div>
		
		<div class="col-lg-6 col-md-6">
		<input type="text" class="login-input" name="contact" placeholder="Contact" required />
		</div>
		
		 <div class="col-lg-6">
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
		</div>
		
		 <div class="col-lg-6 col-md-6">
		<input type="text" class="login-input" name="username" placeholder="Username" required />
		</div>
		
		<div class="col-lg-6">
        <input type="password" class="login-input" name="password" placeholder="Password">
		</div>
		
		 
		
		
        <input type="submit" name="submit" value="Register" class="login-button">
       
		</div>
		
		
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
</body>
<script>
const menuIcon = document.getElementById('menu-icon');
const popupMenu = document.getElementById('popup-menu');

menuIcon.addEventListener('click', function() {
  popupMenu.classList.toggle('show-popup');
});

</script>

</html>
