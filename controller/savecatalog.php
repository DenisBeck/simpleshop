<?php
require '../model/lib.php';
require '../model/config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$title = clearData($_POST['title'], 'string');
	$genre = clearData($_POST['genre'], 'string');
	$country = clearData($_POST['country'], 'string');
	$releaseyear = clearData($_POST['releaseyear'], 'int');
	$price = clearData($_POST['price'], 'int');
}

if(!addToCatalog($title, $genre, $country, $releaseyear, $price)) {
	echo 'Произошла ошибка при добавлении товара в каталог';
} else {
	header("Location: ../view/catalog.php");
	exit;
}

	