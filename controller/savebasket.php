<?php
require '../model/lib.php';
require '../model/config.php';

$quantity = 1;

if($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['id'])) {
	$id = clearData($_GET['id'], 'int');
	addToBasket($id, $quantity);

	header("Location: ../view/catalog.php");
	exit;
} else {
	echo "Произошла ошибка при добавлении в корзину";
}

