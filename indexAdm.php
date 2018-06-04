<?php
if(isset($_COOKIE[login])&&isset($_COOKIE[password])){
     header("Location: /user.php");
}

?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title> Login Page</title>
  
  
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>

      <link rel="stylesheet" href="main.css">
    <script src="jquery.min.js"></script>
    <script src="script.js"></script>

  
</head>

<body>

  <div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
			<form id="sign-in-htm" action="user.php" method="post">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input name="login" id="user" type="text" class="input">
                    
				</div>
              
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input name="password"id="pass" type="password" class="input" data-type="password">
				</div>
				
				<div class="group">
					<input type="submit" class="button" value="Sign In">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#">Welcome </a>
				</div>
			</form>
			<form id="sign-up-htm" action="registration.php" method="post" >
				<div class="group">
					<label for="user" class="label">Username</label>
					<input name="login" id="user" type="text" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input name="password1" id="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Repeat Password</label>
					<input name="password2" id="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Email Address</label>
					<input  name="email"id="pass" type="email" class="input">
				</div>
				<div class="group">
					<input  type="submit" class="button" value="Sign Up">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Already Member?</label>
				</div>
			</form>
		</div>
	</div>
</div>
  
  

</body>

</html>

