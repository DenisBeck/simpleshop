<?php
	header('Content-type: text/html;charset=utf-8');
	//константы для подключения к базе данных
	define('DB_HOST', 'localhost');
	define('DB_LOGIN', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'movies');
	//константа для логирования заказов
	define('ORDER_LOG', 'orders.log');

	$basket = array();
	$count = 0;

	//Подключение к базе данных
	$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASS, DB_NAME) or die(mysql_error($link));

	//Инициализация кук посетителя
	initBasket();