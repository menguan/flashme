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
        <title>Add a card</title>
    </head>
    <body>
    <div class="top">
            <!-- <span class="left">Add a card</span> -->
            <form method="post" action="go.php">
            <div class="right">
                <?php print "<input class=\"button\" type=\"submit\" name=\"user\" value=\"{$username}\" title=\"user_center\"/>"; ?>
                <input class="button" type="submit" name="home" value="home" title="home"/>
                <input class="button" type="submit" name="logout" value="logout" title="logout"/>
            </div>
            </form>
        </div>  
    
    <div class="form_style">
    <form class="form_style" method="get" action="addcard_action.php">
        <div>Card information</div>
        <label for="set">Set:</label>

        
        <select name="set" required="required">\
            <?php
                $setinfo = glob("data/set/*/info.txt");
                for($i=0;$i<count($setinfo);$i++){
                    $setname = file($setinfo[$i]);
                    echo "<option>".trim($setname[0]);
                }
            ?>
        </select>
        
        <label for="question">Question:</label>
        <div class="center"><textarea id="question" name="question"  required="required"></textarea></div>
        <label for="answer">Answer:</label>
        <div class="center"><textarea id="answer" name="answer"  required="required"></textarea></div>
        <div class="submit">
                <input class="button" type="submit" value="Submit" />
            </div>
    </form>
    </div>
    
    </body>
</html>