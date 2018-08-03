<?php
session_start();
$username;
if(isset($_SESSION["username"])){
    $username=$_SESSION["username"];
}
$setid=$_GET["setid"];
$set="data/set/$setid";
$info=file("$set/info.txt");

$login=$_SESSION["login"];
$user_set=file("data/user/$login/$setid.txt", FILE_IGNORE_NEW_LINES);
$origin = file_get_contents("data/user/$login/$setid.txt");
$content=file("$set/content.txt", FILE_IGNORE_NEW_LINES);
$time=$user_set[0];

$num = $_GET["num"];

if($num == 0) {
    $arr = [];
    for($i = 1; $i < count($user_set); $i ++) {
        $box = explode(" ", $user_set[$i]);
        $arr[$i-1]["front"] = $content[($i-1)*2];
        $arr[$i-1]["back"] = $content[($i-1)*2+1];
        $arr[$i-1]["card_num"] = $i - 1;
        $arr[$i-1]["box_num"] = $box[0];
        $arr[$i-1]["sort_num"] = $box[1];
        $arr[$i-1]["vis"] = 0;
    }
    $jsonobj = json_encode($arr);  
    echo $jsonobj . " " . $time;  
}

?>