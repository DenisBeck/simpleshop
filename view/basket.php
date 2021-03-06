<?php
require '../model/lib.php';
require '../model/config.php';

$goods = getBasket();

$i = 1;
$sum = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Корзина покупок</title>
	<link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
	<h1>Корзина покупок</h1>
<?
	if(!$count) {
		echo "<p>Корзина пуста. Вернитесь <a href='catalog.php'>в каталог!</a></p>";
	} else {
		echo "<p>Хотите что-нибудь добавить? Вернитесь <a href='catalog.php'>в каталог!</a></p>";
	}
?>
	<table class="table table-bordered">
		<th>
			<td><b>Название</b></td>
			<td><b>Жанр</b></td>
			<td><b>Страна</b></td>
			<td><b>Год выпуска</b></td>
			<td><b>Цена</b></td>
			<td><b>Количество</b></td>
			<td><b>Общая стоимость</b></td>
			<td><b>Удалить из корзины</b></td>
		</th>
<?
		if(is_array($goods)) {
			foreach($goods as $item) {
?>
		<tr>
			<td><?= $i++?></td>
			<td><?= $item['title']?></td>
			<td><?= $item['genre']?></td>
			<td><?= $item['country']?></td>
			<td><?= $item['releaseyear']?></td>
			<td><?= $item['price']?></td>
			<td>
				<form method="get" action="../controller/savebasket.php">
					<input type="number" min="1" max="<?= $item['store quantity']?>" name="quantity" value="<?= $item['quantity']?>">
					<input type="hidden" name="id" value="<?=$item['id']?>">
					<input class="btn btn-primary" type="submit" value="Пересчитать">
				</form>
			</td>
			<td><?= $item['price'] * $item['quantity']?></td>
			<td><a href="../controller/delbasket.php?id=<?=$item['id']?>">Удалить</a></td>
		</tr>
<?
				$sum += $item['price'] * $item['quantity'];
			}
		}
?>
	</table>
	<p class="panel">Приобретено товара всего на сумму: <?=$sum?> руб.</p>
	<p class="text-center">
		<a href="<?=$_SESSION['user'] ? '../controller/saveorder.php' : 'registration.php'?>" class="btn btn-primary">Оформить заказ зарегистрированному пользователю</a>
		<a href="order.php" class="btn btn-primary">Оформить заказ без регистрации</a>
	</p>
		
</body>
</html>