<?php
require '../model/lib.php';
require '../model/config.php';

if(!$_SERVER['REQUEST_METHOD']) {
	echo "Произошла ошибка";
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$quantity = clearData($_POST['quantity'], 'int');
	$id = clearData($_POST['id'], 'int');
	changeStoreQuantity($id, $quantity);

	header("Location: ../view/admin/changeQuantity.php");
	exit;
} 

if($_SERVER['REQUEST_METHOD'] == 'GET') {
	$quantity = clearData($_GET['quantity'], 'int');
	$id = clearData($_GET['id'], 'int');
	changeStoreQuantity($id, $quantity);
} 

