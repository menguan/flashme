<?php
	session_start();
	if(isset($_POST["home"]))
	{
		header("Location:index.php");
		die();
	}
	
	if(isset($_POST["user"]))
	{
		header("Location:user.php");
		die();
	}
	
	if(isset($_POST["login"]))
	{
		header("Location:login.php");
		die();
	}
	
	if(isset($_POST["register"]))
	{
		header("Location:register.php");
		die();
	}

	if(isset($_POST["logout"]))
	{
		header("Location:logout.php");
		die();
	}
?>