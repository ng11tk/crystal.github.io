# crystal.github.io


<?php
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Player information</title>
	<link rel="stylesheet" href="css/project.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body style="background-image: url('Pic/fifa-18-4k-q4.jpg')">
	<h1 class="h">FIFA Player</h1>
<div class="frame">
    <div class="container1" >
        <form action="includes/log-in.inc.php" method="Post">
			<div class="sign-in">Sign in</div>

			<input type="text" name="mailuid" placeholder="UserId"><br>

			<input type="password" name="password" placeholder="Password"><br>
			<input type="submit" name="login-submit"><br>
			<a class="b1" href="forget_pass">Forget Password</a><br>
			<div class="b1">Or log in with</div>
			<a href="#" class="fa fa-facebook"></a>
			<a href="#" class="fa fa-google"></a><br>
            <a href="sign-up.php" class="b1">Sign up</a>
	   </form>
    </div>
</div>

</body>
</html>
