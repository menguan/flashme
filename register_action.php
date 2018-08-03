<?php
	session_start();
	$login=$_POST["login"];
	$password =$_POST["password"];
	$username=$_POST["username"];
	$dir="data/user/$login";
	if(is_dir($dir))
	{
		header("Location:error.php?type=userrepeat");
		die();
	}
	mkdir($dir);
	file_put_contents("$dir/info.txt","$username\n$password\n");
	$_SESSION["login"]=$login;
	$_SESSION["password"]=$password;
	$_SESSION["username"]=$username;
	header("Location:index.php");
?>
