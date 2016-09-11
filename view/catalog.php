<?php
	require '../model/lib.php';
	require '../model/config.php';

	$goods = selectInCatalog();
	$i = 1;
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Каталог фильмов</title>
	<link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
	<h1>Каталог фильмов</h1>
	<p>Число наименований товара <a href="basket.php">в корзине:</a><?=$count?></p>
	<table class="table table-bordered">
		<th>
			<td><b>Название</b></td>
			<td><b>Жанр</b></td>
			<td><b>Страна</b></td>
			<td><b>Год выпуска</b></td>
			<td><b>Цена</b></td>
			<td><b>В корзину</b></td>
		</th>
<?
		foreach($goods as $item) {
?>
		<tr>
			<td><?= $i++?></td>
			<td><?= $item['title']?></td>
			<td><?= $item['genre']?></td>
			<td><?= $item['country']?></td>
			<td><?= $item['releaseyear']?></td>
			<td><?= $item['price']?></td>
			<td><a href="../controller/savebasket.php?id=<?=$item['id']?>">В корзину</a></td>
		</tr>
<?
		}
?>
	</table>
</body>
</html>