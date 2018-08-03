<?php
session_start();
$username;
if(isset($_SESSION["username"])){
    $username=$_SESSION["username"];
    $login=$_SESSION["login"];
}

$time = $_GET["time"];

$setid = $_GET["setid"];

$user_set="data/user/$login/$setid.txt";

$str = "";
$fp = fopen($user_set, "r");
$i = 1;
while(!feof($fp)) {
    $buf = fgets($fp);
    if($i == 1) {
        $buf = $time . "\n";
    }
    $i ++;
    $str .= $buf;
}
$fp2 = fopen($user_set, "w");
fwrite($fp2, $str);
fclose($fp2);
fclose($fp);

header("Location:set.php?setid=".$setid);

?>