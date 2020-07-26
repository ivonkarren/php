<?php
	include "header.php";
	$dbc = mysqli_connect("", "root", "", "testbd");
	mysqli_query ($dbc, "SET NAMES 'utf8'");
	$name= strtolower(htmlspecialchars($_POST[name]));
	$email = strtolower(htmlspecialchars($_POST[email]));
	$password = htmlspecialchars($_POST[password]);
	$password2 = htmlspecialchars($_POST[password2]);
	
	if($password != $password2)
	{
		phpAlert("Пароли не совпадают");
		exit("<meta http-equiv='refresh' content='0; url= /signupform.php'>");
		mysqli_close($dbc);
	}
	else if ($name == '' OR strlen($name)<5 OR strlen($name)>29)
	{
		phpAlert("Ошибка в никнейме");
		exit("<meta http-equiv='refresh' content='0; url= /signupform.php'>");
		mysqli_close($dbc);
	}
	else if($email == '' OR strpos($email, '@')<1 OR strpos($email, '.') === false)
	{
		phpAlert("Ошибка в Email");
		exit("<meta http-equiv='refresh' content='0; url= /signupform.php'>");
		mysqli_close($dbc);
	}
	else if($password == '' OR strlen($password)<8 OR strlen($password)>29)
	{
		phpAlert("Ошибка в пароле");
		exit("<meta http-equiv='refresh' content='0; url= /signupform.php'>");
		mysqli_close($dbc);
	}
	else
	{//все ок, работаем дальше
		$password = md5($password);
		mysqli_query($dbc, "INSERT INTO `reglog` (`name`, `email`, `password`) VALUES ('$name', '$email', '$password')");		
		mysqli_close($dbc);
		exit("<meta http-equiv='refresh' content='0; url= /index.php'>");
	}
	mysqli_close($dbc);
	function phpAlert($msg)
	{
		echo '<script type="text/javascript">alert("' . $msg . '")</script>';
	}
?>