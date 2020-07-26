<?php
	include "header.php";	
	$dbc = mysqli_connect("", "root", "", "testbd");
	mysqli_query ($dbc, "SET NAMES 'utf8'");
	$name= strtolower(htmlspecialchars($_POST[name]));
	$password = htmlspecialchars($_POST[password]);	
	$result = mysqli_fetch_assoc(mysqli_query($dbc, "SELECT * FROM `reglog` WHERE `name` = '$name'"));
	$resultmail = mysqli_fetch_assoc(mysqli_query($dbc, "SELECT * FROM `reglog` WHERE `email` = '$name'"));
	if (isset($result))
	{
		if (md5($password) == $result['password'])
		{
			$_SESSION['logged_user'] = $result;		
		}
		else
		{			
			phpAlert("Неправильный пароль");
			exit("<meta http-equiv='refresh' content='0; url= /loginform.php'>");
		}
	}
	else if (isset($resultmail))
	{
		if (md5($password) == $resultmail['password'])
		{
			$_SESSION['logged_user'] = $resultmail;		
		}
		else
		{			
			phpAlert("Неправильный пароль");
			exit("<meta http-equiv='refresh' content='0; url= /loginform.php'>");
		}
	}
	else
	{
		phpAlert("Неправильный никнейм или Email");
		exit("<meta http-equiv='refresh' content='0; url= /loginform.php'>");
	}
	mysqli_close($dbc);
	exit("<meta http-equiv='refresh' content='0; url= /index.php'>");
	function phpAlert($msg)
	{
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
	}
?>