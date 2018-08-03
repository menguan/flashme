<?php
	session_start();
	if(isset($_SESSION)){
    	session_destroy();
	}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href="css/main.css" type="text/css" rel="stylesheet" />
    	<link href="css/form.css" type="text/css" rel="stylesheet" />
        <title>Register</title>
    </head>

    <body>

    	<div class="top">
    		<form method="post" action="go.php">
    		<div class="right">
    			<input class="button" type="submit" name="login" value="login" title="login"/>
    			<input class="button" type="submit" name="home" value="home" title="home"/>
    		</div>
    		</form>
    	</div>
	<div class="form_style">
 
		<form class="form_style" method="post" action="register_action.php">
			<div>Register System</div>
			<label for="username">Username</label><input name="username" type="text" required="required"/><br />
			<label for="login">Login</label><input name="login" type="text" required="required"/><br />
			<label for="password">Password</label><input name="password" type="password" required="required"/><br />	
	
			<div class="submit">
				<input class="button" type="submit" value="register" />
			</div>
		</form>

	</div>

	</body>
</html>