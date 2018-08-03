<?php
	session_start();
	$username;
	$islogged=false;
	if(isset($_SESSION["username"])){
		$username=$_SESSION["username"];
		$islogged=true;
	}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Flash Me</title>
        <link href="css/main.css" type="text/css" rel="stylesheet" />
        <link href="css/form.css" type="text/css" rel="stylesheet" />
        <script src="js/index.js"></script>
        <script src="js/showimg.js"></script>

    </head>
    <body>
        <div class="top">
            <!-- <span class="left">Flash Me</span> -->
            <form method="post" action="go.php">
            <div class="right">
            <?php
                if($islogged==true)
                {
                    print "<input class=\"button\" type=\"submit\" name=\"user\" value=\"{$username}\" title=\"user_center\"/>"; 
                    print "<input class=\"button\" type=\"submit\" name=\"logout\" value=\"logout\" title=\"logout\"/> ";
                }
                else
                {
                    print "<input class=\"button\" type=\"submit\" name=\"login\" value=\"login\" title=\"login\"/> ";
                }
            ?>    

            </div>
            </form>
        </div>

        
        <canvas id="cas"></canvas>
        <script src="js/line.js"></script>
        <div class="content">
            <div class="conleft">
                <div id = "slideshow">
                    <img src="images/1.png" alt="image 1" />
                    <img src="images/2.png" alt="image 2" />
                    <img src="images/3.png" alt="image 3" />
                    <img src="images/4.png" alt="image 4" />
                </div>
                <div id = "slidetxt"><p>Everyday learning</p></div>
            </div>

            <div class="conright">
            	<div id="demo">
            		<h2> <a class=link href="set.php?setid=000">Demo</a></h2>
            	</div>
            	<div id="set">
            		<ul>
            		<?php
            			$set = glob("data/set/*");
            			for ($i = 0; $i < count($set); $i++)
        				{
        					$info=file("$set[$i]/info.txt");
        					$setid=explode("/",$set[$i]);

        					print "<li> <a class=\"link\" href=\"set.php?setid=$setid[2]\">$info[0]</a> </li>";
        				}
        			?>
        			</ul>
            	</div>

            	<div id="pic">
            	</div>
        	</div>

        </div>

        <div id="copyright">
            <h2> 411 company 2018-3-6</h2>
        </div>

    </body>
</html>
