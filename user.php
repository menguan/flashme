<?php
	session_start();
	$login=$_SESSION["login"];
	$username=$_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href="css/main.css" type="text/css" rel="stylesheet" />
        <link href="css/form.css" type="text/css" rel="stylesheet" />
        <?php print "<title>$username</title>"; ?>
    </head>

    <body>
    	<div class="top">
            <form method="post" action="go.php">
            <div class="right">
                <input class="button" type="submit" name="home" value="home" title="home"/>
                <input class="button" type="submit" name="logout" value="logout" title="logout"/>
            </div>
            </form>
            <span class="right"><?=$username?>'s personal center</span>
        </div>
        <div class="content">
        <div class="conleft">
    	<div id="usedset">
            <div id="set">
    		<h2>used set</h2>
    		<ul>
    		<?php
    			$file=glob("data/user/$login/*.txt");
    			for ($i = 0; $i < count($file); $i++)
				{
					$filename=explode("/",$file[$i]);
					if($filename[3]=="info.txt")
					{
						continue;
					}
					$setname=explode(".",$filename[3]);
					$setinfo=file("data/set/$setname[0]/info.txt");
					print "<h3>$setinfo[0]</h3>";
				}
			?>
			</ul>
            </div>
    	</div>
        </div>
        <div class="conright">
    	<div id="function">
    		<a class="link" href="addset.php">Add card set</a>
			<a class="link" href="addcard.php">Add card</a>
    	</div>
        </div>
        </div>
    </body>
</html>