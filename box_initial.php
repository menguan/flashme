<?php
session_start();
$username;
if(isset($_SESSION["username"])){
    $username=$_SESSION["username"];
    $login=$_SESSION["login"];
}

if(isset($_GET["card_num"])) {
    $setid = $_GET["setid"];
    $set = "data/set/$setid";
    $content = file("$set/content.txt", FILE_IGNORE_NEW_LINES);
    $card_num = $_GET["card_num"];
    if($card_num * 2 >= count($content)) {
        echo "0/0";
    } else {
        $front = $content[$card_num * 2];
        $back = $content[$card_num * 2 + 1];
        echo "$front/$back";
    }
}

if(isset($_POST["list"])) {
    $setid = $_POST["setid"];
    if(!file_exists("data/user/$login/$setid.txt")) {
        file_put_contents("data/user/$login/$setid.txt", "1\n");
    } else {
        $user_set=file("data/user/$login/$setid.txt", FILE_IGNORE_NEW_LINES);
        $time = $user_set[0];
        file_put_contents("data/user/$login/$setid.txt", "$time\n");
    }
    $list = json_decode($_POST["list"]);
    $content = array();
	foreach ( $list as $obj ) {
		$content[] = $obj->box_num . " " . $obj->sort_num . "\n";
	}
	file_put_contents("data/user/$login/$setid.txt", $content, FILE_APPEND);
}


?>