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
        <title>Login</title>
    </head>

    <body>
    	<div class="top">
    		<form method="post" action="go.php">
    		<div class="right">
    			<input class="button" type="submit" name="register" value="register" title="register"/>
    			<input class="button" type="submit" name="home" value="home" title="home"/>
    		</div>
    		</form>
    	</div>
    	<div class="form_style">
		<form class="form_style" method="post" action="login_action.php">
	
			<div>Login System</div>
	
			<label for="login">Login</label><input name="login" type="text" required="required"/><br />
			<label for="password">Password</label><input name="password" type="password" required="required"/><br />	
		
			<div class="submit">
				<input class="button" type="submit" value="Login" />
			</div>
	
		</form>

		</div>
    </body>
</html>