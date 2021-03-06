<?php
/*\\\\\\\\\\\\\\\\Работа с базой данных////////////////*/
//Добавление товара в базу данных
function addToCatalog($title, $genre, $duration, $country, $releaseyear, $directedBy, $poster, $description, $price, $storeQuantity) {
	global $link;
	$sql = "INSERT INTO catalog (title, genre, duration, country, releaseyear, directedBy, poster, description, price, `store quantity`) 
			VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	$stmt = mysqli_prepare($link, $sql);
	if(!$stmt) {
		return false;
	}
	mysqli_stmt_bind_param($stmt, 'ssisisssii', $title, $genre, $duration, $country, $releaseyear, $directedBy, $poster, $description, $price, $storeQuantity);
	mysqli_execute($stmt);
	mysqli_stmt_close($stmt);
	return true;
}

//Добавление заказа
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

//Сохранение нового пользователя
function addToUsers($login, $password, $name, $email, $phone, $address, $dt) {
	global $link;
	$hash = getHash($password);
	$sql = "INSERT INTO users (login, hash, name, email, phone, address, datetime) 
			VALUES (?, ?, ?, ?, ?, ?, ?)";
	$stmt = mysqli_prepare($link, $sql);
	if(!$stmt) {
		return false;
	}
	mysqli_stmt_bind_param($stmt, 'ssssisi', $login, $password, $name, $email, $phone, $address, $dt);
	mysqli_execute($stmt);
	mysqli_stmt_close($stmt);
	return true;
}

//Проверка пользователя из базы данных
function userExists($login) {
	global $link;
	$sql = "SELECT login, hash FROM users WHERE login='$login'";
	if(!$result = mysqli_query($link, $sql)) {
		return false;
	}
	$items = mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_free_result($result);
	if(!$items) {
		return false;
	}
	return true;
}

//Выборка каталога из базы данных
function selectInCatalog($title="") {
	global $link;
	$title .= "%";
	$sql = "SELECT id, title, genre, country, releaseyear, price, `store quantity`  
			FROM catalog WHERE title LIKE '{$title}'";
	$result = mysqli_query($link, $sql);
	if(!$result)
		return false;
	$items = mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_free_result($result);
	return $items;
}

function selectDescriptionInCatalog($id, $title="") {
	global $link;
	$title .= "%";
	$sql = "SELECT id, title, genre, duration, country, releaseyear, directedBy, poster, description  
			FROM catalog WHERE id='{$id}'";
	$result = mysqli_query($link, $sql);
	if(!$result)
		return false;
	$items = mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_free_result($result);
	return $items;
}

//Выборка пользователей из базы данных
function selectInUsers($user) {
	global $link;
	$sql = "SELECT name, email, phone, address, datetime 
			FROM users WHERE login='{$user}'";
	$result = mysqli_query($link, $sql);
	if(!$result)
		return false;
	$items = mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_free_result($result);
	return $items[0];
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
//Изменения в записях
function changeStoreQuantity($id, $value) {
	global $link;
	$sql = "UPDATE catalog SET `store quantity`='{$value}' WHERE `id`='{$id}'";
	if(!mysqli_query($link, $sql)) {
		return false;
	}
	mysqli_close($link);
	return true;
}
function getOvercount() {
	global $link;
	$data = selectInCatalog();
	$totals = [];
	foreach($data as $item) {
		$id = $item['id'];
		$quantity = $item['store quantity'];
		$totals[$id] = $quantity;
	}
	return $totals;
}
function updateCount($id, $value=0) {
	global $basket;
	$totals = $basket['totals'];
	$value = clearData($totals[$id], 'int') - $value;
	changeStoreQuantity($id, $value);
}
/*\\\\\\\\\\\\\\\\Работа с базой данных////////////////*/
/*\\\\\\\\\\\\\\\\Работа с корзиной заказов////////////////*/
function initBasket() {
	global $basket, $count;
	if(!isset($_COOKIE['basket'])) {
		$basket['orderid'] = uniqid(); 
		$basket['totals'] = getOvercount();
		saveBasket();
	} else {
		$basket = unserialize(base64_decode($_COOKIE['basket']));
		$count = count($basket) - 2;
	}
}
function saveBasket() {
	global $basket;
	$basket = base64_encode(serialize($basket));
	setcookie('basket', $basket, time()+86400, '/');
}
function addToBasket($id, $q) {
	global $basket, $link;
	$basket[$id] = $q;
	saveBasket();
}
function getBasket() {
	global $link, $basket;
	if(is_array($basket)){
		$goods = array_keys($basket);
		array_shift($goods);
		array_shift($goods);
	}
	if(!$goods) {
		return false;
	}
	$ids = implode(',', $goods);
	$sql = "SELECT id, title, genre, country, releaseyear, price, `store quantity`
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
/*\\\\\\\\\\\\\\\\Безопасность данных////////////////*/
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

/*\\\\\\\\\\\\\\\\Аккаунт////////////////*/

function getHash($password) {
	$hash = password_hash($password, PASSWORD_BCRYPT);
	return $hash;
}

function checkHash($password, $hash) {
	return password_verify($password, $hash);
}

function logout() {
	session_destroy();
}

/*\\\\\\\\\\\\\\\\Аккаунт////////////////*/