<?php

/*\\\\\\\\\\\\\\\\Работа с базой данных////////////////*/

//Добавление товара в базу данных
function addToCatalog($title, $genre, $country, $releaseyear, $price) {
	global $link;
	$sql = "INSERT INTO catalog (title, genre, country, releaseyear, price) 
			VALUES (?, ?, ?, ?, ?)";
	$stmt = mysqli_prepare($link, $sql);
	if(!$stmt) 
		return false;
	mysqli_stmt_bind_param($stmt, 'sssii', $title, $genre, $country, $releaseyear, $price);
	mysqli_execute($stmt);
	mysqli_stmt_close($stmt);
	return true;
}

function addToOrders($datetime) {
	global $link, $basket;
	$goods = getBasket();
	$sql = "INSERT INTO orders (title, genre, country, releaseyear, price,
			quantity, orderid, datetime)
			VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

	if(!$stmt = mysqli_prepare($link, $sql)) {
		return false;
	};
	if(!count($goods[0])) {
		echo "<p>Товаров нет</p>";
		header("Location: order.php");
		exit;
	}
	foreach($goods as $item) {
		mysqli_stmt_bind_param($stmt, 'sssiiisi', 
									$item['title'], 
									$item['genre'],
									$item['country'], 
									$item['releaseyear'], 
									$item['price'],
									$item['quantity'],
									$basket['orderid'],
									$datetime);
		mysqli_execute($stmt);
	}
		
	mysqli_stmt_close($stmt);
	setcookie('basket', '', time() - 3600, '/');
	return true;
}

//Выборка каталога из базы данных
function selectInCatalog() {
	global $link;
	$sql = "SELECT id, title, genre, country, releaseyear, price 
			FROM catalog";
	$result = mysqli_query($link, $sql);
	if(!$result)
		return false;
	$items = mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_free_result($result);
	return $items;
}

function getOrders($dirToFile) {
	global $link;
	if(!is_file($dirToFile.ORDER_LOG)) {
		return false;
	}

	$orders = file($dirToFile.ORDER_LOG);

	$allorders = [];
	foreach($orders as $order) {
		list($name, $email, $phone, $address, $orderid, $date) = explode(" | ", $order);
		$orderinfo = [];

		$orderinfo['name'] = $name;
		$orderinfo['email'] = $email;
		$orderinfo['phone'] = $phone;
		$orderinfo['address'] = $address;
		$orderinfo['orderid'] = $orderid;
		$orderinfo['date'] = $date;

		$sql = "SELECT title, genre, country, releaseyear, price, quantity
				FROM orders WHERE orderid='$orderid'";
		if(!$result = mysqli_query($link, $sql)) {
			return false;
		}

		$items = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);

		$orderinfo['goods'] = $items;
		$allorders[] = $orderinfo;
	}
	return $allorders;
}

/*\\\\\\\\\\\\\\\\Работа с базой данных////////////////*/

/*\\\\\\\\\\\\\\\\Работа с корзиной заказов////////////////*/

function initBasket() {
	global $basket, $count;
	if(!isset($_COOKIE['basket'])) {
		$basket['orderid'] = uniqid(); 
		saveBasket();
	} else {
		$basket = unserialize(base64_decode($_COOKIE['basket']));
		$count = count($basket) - 1;
	}
}

function saveBasket() {
	global $basket;
	$basket = base64_encode(serialize($basket));
	setcookie('basket', $basket, time()+86400, '/');
}

function addToBasket($id, $q) {
	global $basket;
	$basket[$id] = $q;
	saveBasket();
}

function getBasket() {
	global $link, $basket;
	$goods = array_keys($basket);
	array_shift($goods);
	if(!$goods) {
		return false;
	}
	$ids = implode(',', $goods);
	$sql = "SELECT id, title, genre, country, releaseyear, price
			FROM catalog WHERE id IN ($ids)";
	if(!$result = mysqli_query($link, $sql)) {
		return false;
	}
	$items = resultToArray($result);
	mysqli_free_result($result);
	return $items;
}

function resultToArray($data) {
	global $basket;
	$arr = [];
	while($row = mysqli_fetch_assoc($data)) {
		$row['quantity'] = $basket[$row['id']];
		$arr[] = $row;
	}
	return $arr;
}

function delFromBasket($id) {
	global $basket;
	unset($basket[$id]);
	saveBasket();
}

/*\\\\\\\\\\\\\\\\Работа с корзиной заказов////////////////*/

/*\\\\\\\\\\\\\\\\Безопасность////////////////*/

//Проверка введенных данных
function clearData($data, $type) {
	global $link;
	switch ($type) {
		case 'string':
			$data = mysqli_real_escape_string($link, trim(strip_tags($data)));
			break;
		case 'int': 
			$data = abs((int)$data);
			break;
	}
	return $data;
}

/*\\\\\\\\\\\\\\\\Безопасность////////////////*/