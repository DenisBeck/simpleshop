<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Оформление заказа</title>
	<link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
	<h1>Оформление заказа</h1>
	<form action="../controller/saveorder.php" method="post">
		<div class="form-group">
			<label for="inputName" class="control-label col-lg-2">Заказчик</label>
			<div class="col-lg-10">
				<input name="name" type="text" class="form-control" id="inputName" placeholder="Заказчик">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail" class="control-label col-lg-2">Email заказчика</label>
			<div class="col-lg-10">
				<input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email заказчика">
			</div>
		</div>
		<div class="form-group">
			<label for="inputPhone" class="control-label col-lg-2">Телефон для связи</label>
			<div class="col-lg-10">
				<input name="phone" type="text" class="form-control" id="inputPhone" placeholder="Телефон для связи">
			</div>
		</div>
		<div class="form-group">
			<label for="inputAddress" class="control-label col-lg-2">Адрес доставки</label>
			<div class="col-lg-10">
				<input name="address" type="text" class="form-control" id="inputAddress" placeholder="Адрес доставки">
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-offset-2 col-lg-10">
				<button type="submit" class="btn btn-primary">Заказать</button>
			</div>
		</div>
	</form>
</body>
</html>