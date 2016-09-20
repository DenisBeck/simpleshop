<?php
require '../model/lib.php';
require '../model/config.php';

if(isset($_GET['id'])) {
	$id = clearData($_GET['id'], 'int');
	$info = selectDescriptionInCatalog($id);
	$_SESSION['info'] = $info;

	header("Location: ../view/template/product.php");
	exit;
} else {
	echo "Произошла ошибка при добавлении в корзину";
}