<?php
	session_start();
	$type = $_GET["type"];
	if ( $type === "mustlogin" ) {
		$message = "You must login in first.";
		$action = "index.php";
	} elseif ( $type === "loginerror" ) {
		$message = "Wrong login";
		$action = "login.php";
	} elseif ( $type === "passworderror" ) {
		$message = "Wrong password";
		$action = "login.php";
	} elseif ( $type === "userrepeat" ) {
		$message = "Used login";
		$action = "register.php";
	}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>error</title>
    <link href="css/main.css" type="text/css" rel="stylesheet" />
    	<link href="css/form.css" type="text/css" rel="stylesheet" />
    <meta charset="utf-8" />
  </head>
  <body>
  		<div class="form_style">
		<form method="get" action="<?=$action?>">
			<div id="error">
				<div><?= $message ?></div>
				<input class="button" type="submit" value="OK" />
			</div>
		</form>
		</div>
		
  </body>
</html>