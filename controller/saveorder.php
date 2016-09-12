<?php
require '../model/lib.php';
require '../model/config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = clearData($_POST['name'], 'string');
	$email = clearData($_POST['email'], 'string');
	$phone = clearData($_POST['phone'], 'string');
	$address = clearData($_POST['address'], 'string');
	if($basket['orderid']) $orderid = $basket['orderid'];
	$dt = time();

	$strOrder = "$name | $email | $phone | $address | $orderid | $dt\n";
}

if($strOrder) {
	file_put_contents('logs/'.ORDER_LOG, $strOrder, FILE_APPEND);
	addToOrders($dt);
} else {
	header("Location: ../view/order.php");
	exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Сохранение заказа</title>
</head>
<body>
	<p>Ваш заказ принят</p>
	<p><a href="../view/catalog.php">Вернуться в каталог товаров</a></p>
</body>
</html>