<?php
	if(isset($_POST['button']))
	{
		if($_POST['login']=="Ura_Admin.Z" && $_POST['pass']=="Ura_Adminka_Pass")
		{
			echo '<script>document.location.href="http://localhost/index.php"</script>';
		}
		else
		{
			echo '<script>document.location.href="http://localhost/readqr.php"</script>';
		}
	}
?>


<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>

<center><div style="margin-top: 130px; text-align: center; width: 500px" class="z-depth-2">
<br>
<h3>ADMIN PANEL</h3>
<b><i>log in to continue</b></i>
<br><br>
<form action="" method="POST">
		Login<br>
		<input type="text" name="login" style=" text-align: center; "placeholder="login">
		Password<br>
		<input type="password" name="pass" style=" text-align: center; "placeholder="password">
		
		<input type="submit" name="button" class="waves-effect waves-light btn green" value="LOG IN">
</form>
<br>
<br>
</div></center>