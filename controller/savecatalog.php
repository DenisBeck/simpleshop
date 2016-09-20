<?php
require '../model/lib.php';
require '../model/config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$title = clearData($_POST['title'], 'string');
	$genre = clearData($_POST['genre'], 'string');
	$duration = clearData($_POST['duration'], 'int');
	$country = clearData($_POST['country'], 'string');
	$releaseyear = clearData($_POST['releaseyear'], 'int');
	$directedBy = clearData($_POST['directedBy'], 'string');
	$poster = clearData($_POST['poster'], 'string');
	$description = clearData($_POST['description'], 'string');
	$price = clearData($_POST['price'], 'int');
	$storeQuantity = clearData($_POST['storeQuantity'], 'int');
}

if(!addToCatalog($title, $genre, $duration, $country, $releaseyear, $directedBy, $poster, $description, $price, $storeQuantity)) {
	echo 'Произошла ошибка при добавлении товара в каталог';
} else {
	header("Location: ../view/catalog.php");
	exit;
}

	