<?
require '../../model/lib.php';
require '../../model/config.php';

$orders = getOrders('../../controller/logs/');

if(!is_array($orders)) {
	header("Location: ".$_SERVER['HTTP_SELF']);
	echo "Ошибка";
	exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Все заказы</title>
	<link rel="stylesheet" href="../bootstrap.min.css">
</head>
<body>
	<h1>Все заказы</h1>
<?
	foreach($orders as $order) {

		$i = 1;
		$sum = 0;

?>
	<hr>
	<h2>Заказ номер: <?=$order['orderid']?></h2>
	<p><b>Заказчик</b>: <?=$order['name']?></p>
	<p><b>Email</b>: <?=$order['email']?></p>
	<p><b>Телефон</b>: <?=$order['phone']?></p>
	<p><b>Адрес доставки</b>: <?=$order['address']?></p>
	<p><b>Дата размещения заказа</b>: <?=date('d-m-Y h:m:s', $order['date'])?></p>

	<h3>Купленные товары:</h3>
	<table class="table table-bordered">
		<tr>
			<th>N п/п</th>
			<th>Название</th>
			<th>Жанр</th>
			<th>Страна</th>
			<th>Год выпуска</th>
			<th>Цена, руб.</th>
			<th>Количество</th>
			<th>Общая стоимость</th>
		</tr>
<?
		foreach($order['goods'] as $item) {
?>
		<tr>
			<td><?= $i++?></td>
			<td><?= $item['title']?></td>
			<td><?= $item['genre']?></td>
			<td><?= $item['country']?></td>
			<td><?= $item['releaseyear']?></td>
			<td><?= $item['price']?></td>
			<td><?= $item['quantity']?></td>
			<td><?= $item['price'] * $item['quantity']?></td>
		</tr>
<?
			$sum += $item['price'] * $item['quantity'];
		}
		echo "</table>";
		echo "<p><b>Всего товаров в заказе на сумму: $sum руб.</b></p>";
	}
?>

</body>
</html>