<?php
	//Получение переменных из POST
	$name = $_POST['name'];
	$phone = $_POST['phone'];
		
	// Параметры для подключения
	$server = "localhost"; 
	$user = "root"; // Логин БД
	$pass = ""; // Пароль БД
	$dbname = 'tg_alterra'; // Имя БД
	$db_table = "contacts"; // Имя Таблицы БД
	$datetime = date("yy-m-d H:i:s"); 
	
	// Подключение к базе данных
	$db  =  mysqli_connect( $server,  $user,  $pass,  $dbname  );
	mysqli_set_charset($db, "utf8");
	
	// Если есть ошибка соединения,  убиваем подключение
	if (!$db) die();
		
	//Формирование запроса
	$query   =  "INSERT INTO ".$db_table." (name,phone,datetime) VALUES ('$name','$phone','$datetime')";
	
	
	
	//Отправка запроса в базу на запись и получение ответа
	$success  =  mysqli_query($db,  $query);
	
	//Отправка результата в ajax
	echo $success;
	
	
?>