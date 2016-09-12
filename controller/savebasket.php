<?php
require '../model/lib.php';
require '../model/config.php';

if(isset($_GET['quantity'])) {
	$quantity = clearData($_GET['quantity'], 'int');
} else {
	$quantity = 1;
}

if(isset($_GET['id'])) {
	$id = clearData($_GET['id'], 'int');
	updateCount($id, $quantity);
	addToBasket($id, $quantity);

	header("Location: ../view/basket.php");
	exit;
} else {
	echo "Произошла ошибка при добавлении в корзину";
}

