<?php
require '../../model/lib.php';
require '../../model/config.php';

if(isset($_GET['title'])) {
	$title = clearData($_GET['title'], 'string');
	$goods = selectInCatalog($title);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Изменение количества товара на складе</title>
	<link rel="stylesheet" href="../bootstrap.min.css">
</head>
<body>
	<h1>Изменение количества товара на складе</h1>
	<form action="changeQuantity.php" method="get">
		<div class="form-group">
			<label for="inputTitle" class="control-label col-lg-2">Название</label>
			<div class="col-lg-10">
				<input name="title" type="search" class="form-control" id="inputTitle" placeholder="Название">
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-offset-2 col-lg-10">
				<input type="submit" class="btn btn-primary" value="Найти">
			</div>
		</div>
	</form>
	<table class="table table-bordered">
		<tr>
			<td><b>Название</b></td>
			<td><b>Жанр</b></td>
			<td><b>Страна</b></td>
			<td><b>Год выпуска</b></td>
			<td><b>Цена</b></td>
			<td><b>Количество на складе</b></td>
		</tr>
<?
	if(is_array($goods)) {
		foreach($goods as $item) {
?>
		<tr>
			<td><?= $item['title']?></td>
			<td><?= $item['genre']?></td>
			<td><?= $item['country']?></td>
			<td><?= $item['releaseyear']?></td>
			<td><?= $item['price']?></td>
			<td>
				<form action="../../controller/changecatalog.php" method="post">
					<input name="quantity" type="number" value="<?= $item['storeQuantity']?>">
					<input name="id" type="hidden" value="<?= $item['id']?>">
					<input class="btn btn-primary" type="submit" value="Изменить">
			</td>
		</tr>
<?
		}
	}
?>
	</table>

	<p>Вернуться в <a href="../catalog.php">каталог</a></p>
</body>
</html>