<? include "header.php" ?>
<form action="signup.php" method="post">
	<label><strong>Никнейм</strong></label>	
	<br>
	<input type="text" name="name">
	<br>
	<label><strong>Email</strong></label>
	<br>
	<input type="text" name="email">
	<br>
	<label><strong>Пароль</strong></label>
	<br>
	<input type="password" name="password">
	<br>
	<label><strong>Пароль еще раз</strong></label>
	<br>
	<input type="password" name="password2">
	<br><br>
	<button type="submit" type="button">Регистрация</button>
</form>
<? include "footer.php" ?>