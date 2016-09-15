<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Авторизация</title>
	<link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
	<h1>Авторизация</h1>
	<p>Еще нет аккаунта? Тогда <a href="registration.php">зарегистрируйтесь</a></p>
	<form action="../controller/saveorder.php" method="post">
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
			<div class="col-lg-offset-2 col-lg-10">
				<button type="submit" class="btn btn-primary">Авторизоваться</button>
			</div>
		</div>
	</form>
</body>
</html>