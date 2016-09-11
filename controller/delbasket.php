<?php
require '../model/lib.php';
require '../model/config.php';

if(isset($_GET['id']) and $_SERVER['REQUEST_METHOD'] == 'GET') {
	$id = clearData($_GET['id'], 'int');
	delFromBasket($id);

	header("Location: ../view/basket.php");
	exit;
}