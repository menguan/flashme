<?php
	session_start();
	$username;
	$islogged=false;
	if(isset($_SESSION["username"])){
		$username=$_SESSION["username"];
		$islogged=true;
	}
	$setid=$_GET["setid"];
	if($islogged==false && $setid != "000")
	{
		header("Location:error.php?type=mustlogin");
		die();
	}

	if($setid == "000") {
		$flag = 2;
		$info[0] = "Demo";
		$info[1] = "A demo for nologin";
		$info[2] = "Admin";
	} else {
		$login=$_SESSION["login"];
		$user_set="data/user/$login/$setid.txt";
		$set="data/set/$setid";
		$info=file("$set/info.txt");
		if(!file_exists("$user_set")) {
			$flag = 0;
		} else {
			$flag = 1;
		}
	}
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
		<script type="text/javascript" src="js/simpleajax.js"></script>
		<script type="text/javascript" src="js/set.js"></script>
		<link href="css/main.css" type="text/css" rel="stylesheet" />
        <link href="css/form.css" type="text/css" rel="stylesheet" />
        <?php print "<title>$info[0]</title>"; ?>
    </head>

    <body>
		<div class="top">
			<!-- <span class="left"><?=$info[0]?></span> -->
            <form method="post" action="go.php">
            <div class="right">
				<?php if($flag != 2) {
						print "<input class=\"button\" type=\"submit\" name=\"user\" value=\"{$username}\" title=\"user_center\"/>";
					} ?>
            	<input class="button" type="submit" name="home" value="home" title="home"/>
				<?php if($flag != 2) {
						print "<input class=\"button\" type=\"submit\" name=\"logout\" value=\"logout\" title=\"logout\"/>";   
					} ?> 
            </div>
            </form>
        </div>

		<canvas id="cas"></canvas>
        <script src="js/line.js"></script>
		<div class="content">
			<div class="conleft">
				<div id="card" setid="<?= $setid ?>"><p></p><button>Right</button><button>Wrong</button></div>
				<div id="cards">
					<h3>The card is:</h3>
					<div id="front"></div>
					<div id="back"></div>
				</div>
				<p id="message"></p>
            </div>

            <div class="conright">
				<div id="introdution">
					<p>Theme: <?=$info[0]?></p>
					<p>Introdution: <?=$info[1]?></p>
					<p>Author: <?=$info[2]?></p>
				</div>
				<button id="start_button" flag="<?= $flag ?>">STRAT</button>
				<div id="set_box_num">
					<h3>Enter the card's initial box number:</h3>
					<input id="box_num" type="text" />
					<button id="set_box">OK</button>
				</div>

				<div id="set_time">
					<form class="form_style" method="get" action="set_time.php">
						<h3>Enter the test time:</h3>
						<input type="text" name="time"  required="required"/>
						<input type="hidden" name="setid" value="<?= $setid ?>"/> 
						<input class="button" type="submit" name="ok" value="OK" title="OK"/>
					</form>
				</div>
        	</div>
		</div>
    	

    </body>
</html>