<?php
require '../model/lib.php';
require '../model/config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if($_POST['captcha'] != $_SESSION['randStr']) {
		header("Location: ../view/registration.php");
	}
	$login = clearData($_POST['login'], 'string');
	$password = clearData($_POST['password'], 'string');
	$name = clearData($_POST['name'], 'string');
	$email = clearData($_POST['email'], 'string');
	$phone = clearData($_POST['phone'], 'int');
	$address = clearData($_POST['address'], 'string');
	$dt = time();
}else{
	echo "Ошибка запроса";
	exit;
}

if(userExists($login)) {
	echo "Пользователь с данным логином уже существует";
	header("Location: ../view/registration.php");
	exit;
}

if(!addToUsers($login, $password, $name, $email, $phone, $address, $dt)) {
	echo 'Произошла ошибка при регистрации пользователя';
	echo '<p><a href="../view/catalog.php">Вернуться в каталог товаров</a></p>';
	exit;
} 

$_SESSION['user'] = $login;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Успешная регистрация</title>
</head>
<body>
	<p>Регистрация завершена успешно</p>
	<p><a href="../view/catalog.php">Вернуться в каталог товаров</a></p>
	<p><a href="saveorder/php">Оформить заказ</a></p>
</body>
</html>