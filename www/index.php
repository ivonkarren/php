<? 
	include "header.php" ;
	echo $_SESSION['logged_user']['name'];
	if(!isset($_SESSION['logged_user']))
	{
		echo 
		'<hr><a href="/loginform.php">LOGIN</a>
		<br>
		<a href="/signupform.php">SIGNUP</a>
		<hr>';
	}
	else
	{
		echo "<hr>" . $_SESSION['logged_user']['name'] . ", Вы авторизованны<br>";
		echo '<button onclick="document.location=\'logout.php\'">Выйти</button><hr>' ;
	}
	?>
</body>
</html>
