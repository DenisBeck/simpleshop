<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Добавление фильма в каталог</title>
	<link rel="stylesheet" href="../bootstrap.min.css">
</head>
<body>
	<h1>Добавление фильма в каталог</h1>
	<form action="../../controller/savecatalog.php" method="post">
		<div class="form-group">
			<label for="inputTitle" class="control-label col-lg-2">Название</label>
			<div class="col-lg-10">
				<input name="title" type="text" class="form-control" id="inputTitle" placeholder="Название">
			</div>
		</div>
		<div class="form-group">
			<label for="inputGenre" class="control-label col-lg-2">Жанр</label>
			<div class="col-lg-10">
				<input name="genre" type="text" class="form-control" id="inputGenre" placeholder="Жанр">
			</div>
		</div>
		<div class="form-group">
			<label for="inputDuration" class="control-label col-lg-2">Длительность</label>
			<div class="col-lg-10">
				<input name="duration" type="text" class="form-control" id="inputDuration" placeholder="Длительность">
			</div>
		</div>
		<div class="form-group">
			<label for="inputCountry" class="control-label col-lg-2">Страна</label>
			<div class="col-lg-10">
				<input name="country" type="text" class="form-control" id="inputCountry" placeholder="Страна">
			</div>
		</div>
		<div class="form-group">
			<label for="inputReleaseyear" class="control-label col-lg-2">Год выпуска</label>
			<div class="col-lg-10">
				<input name="releaseyear" type="text" class="form-control" id="inputReleaseyear" placeholder="Год выпуска">
			</div>
		</div>
		<div class="form-group">
			<label for="inputDirectedBy" class="control-label col-lg-2">Режиссер</label>
			<div class="col-lg-10">
				<input name="directedBy" type="text" class="form-control" id="inputDirectedBy" placeholder="Режиссер">
			</div>
		</div>
		<div class="form-group">
			<label for="inputPoster" class="control-label col-lg-2">Ссылка на постер</label>
			<div class="col-lg-10">
				<input name="poster" type="text" class="form-control" id="inputPoster" placeholder="Ссылка на постер">
			</div>
		</div>
		<div class="form-group">
			<label for="inputDescription" class="control-label col-lg-2">Описание</label>
			<div class="col-lg-10">
				<input name="description" type="text" class="form-control" id="inputDescription" placeholder="Описание">
			</div>
		</div>
		<div class="form-group">
			<label for="inputPrice" class="control-label col-lg-2">Цена</label>
			<div class="col-lg-10">
				<input name="price" type="text" class="form-control" id="inputPrice" placeholder="Цена">
			</div>
		</div>
		<div class="form-group">
			<label for="inputStoreQuantity" class="control-label col-lg-2">Количество на складе</label>
			<div class="col-lg-10">
				<input name="storeQuantity" type="text" class="form-control" id="inputStoreQuantity" placeholder="Количество на складе">
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-offset-2 col-lg-10">
				<input type="submit" class="btn btn-primary" value="Добавить">
			</div>
		</div>
	</form>
</body>
</html>