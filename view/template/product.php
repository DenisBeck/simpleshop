<?php
require '../../model/lib.php';
require '../../model/config.php';

$info = $_SESSION['info'][0];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Карточка фильма</h1>

	<h2>Постер</h2>
	<div>
		<img src="<?=$info['poster']?>" alt="">
	</div>
	<h2>Описание</h2>
	<div>
		<p>Жанр: <?=$info['genre']?></p>
		<p>Продолжительность фильма: <?=$info['duration']?> мин</p>
		<p>Режиссер фильма: <?=$info['directedBy']?></p>
		<p>Страна: <?=$info['country']?></p>
		<p>Год выпуска: <?=$info['releaseyear']?></p>
		<p>Описание: <?=$info['description']?></p>
	</div>
</body>
</html>