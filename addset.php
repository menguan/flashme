<?php
	session_start();
	$username=$_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href="css/main.css" type="text/css" rel="stylesheet" />
        <link href="css/form.css" type="text/css" rel="stylesheet" />
        <title>Add card set</title>
    </head>

    <body>
    	<div class="top">
            <!-- <span class="left">Add card set</span> -->
            <form method="post" action="go.php">
            <div class="right">
                <?php print "<input class=\"button\" type=\"submit\" name=\"user\" value=\"{$username}\" title=\"user_center\"/>"; ?>
                <input class="button" type="submit" name="home" value="home" title="home"/>
                <input class="button" type="submit" name="logout" value="logout" title="logout"/>
            </div>
            </form>
        </div>  
    	<div class="form_style">
 
			<form class="form_style" method="post" action="addset_action.php">
			<div>Card set information</div>
			<label for="title">Title:</label><input name="title" type="text" required="required"/><br />
			<label for="info">Info:</label>
			<div class="center"><textarea  name="info"  required="required"></textarea></div>

			<label for="filepath">Filepath:</label><input id="filepath" name="filepath" type="file" accept=".txt" /><br />

			<div class="submit">
                <input class="button" type="submit" value="Submit" />
            </div>
			</form>

		</div>
    </body>
</html>