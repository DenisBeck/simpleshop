<?php
require '../model/lib.php';
require '../model/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Регистрация</title>
	<link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
	<h1>Регистрация</h1>
	<p>Уже есть аккаунт? Тогда <a href="authorization.php">авторизуйтесь</a></p>
	<form action="../controller/saveuser.php" method="post">
		<div class="form-group">
			<label for="inputLogin" class="control-label col-lg-2">Логин</label>
			<div class="col-lg-10">
				<input name="login" type="text" class="form-control" id="inputLogin" placeholder="Логин">
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword" class="control-label col-lg-2">Пароль</label>
			<div class="col-lg-10">
				<input name="password" type="password" class="form-control" id="inputPassword" placeholder="Пароль">
			</div>
		</div>
		<div class="form-group">
			<label for="inputName" class="control-label col-lg-2">Имя</label>
			<div class="col-lg-10">
				<input name="name" type="text" class="form-control" id="inputName" placeholder="Имя">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail" class="control-label col-lg-2">Email заказчика</label>
			<div class="col-lg-10">
				<input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email заказчика">
			</div>
		</div>
		<div class="form-group">
			<label for="inputPhone" class="control-label col-lg-2">Телефон для связи</label>
			<div class="col-lg-10">
				<input name="phone" type="text" class="form-control" id="inputPhone" placeholder="Телефон для связи">
			</div>
		</div>
		<div class="form-group">
			<label for="inputAddress" class="control-label col-lg-2">Адрес доставки</label>
			<div class="col-lg-10">
				<input name="address" type="text" class="form-control" id="inputAddress" placeholder="Адрес доставки">
			</div>
		</div>
		<div class="form-group">
			<div>
				<img src="../controller/captcha.php">
			</div>
			<label for="inputCaptcha" class="control-label col-lg-2">Введите строку</label>
			<div>
				<input for="inputCaptcha" class="form-control" type="text" name="captcha">
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-offset-2 col-lg-10">
				<button type="submit" class="btn btn-primary">Зарегистрироваться</button>
			</div>
		</div>
	</form>
</body>
</html>