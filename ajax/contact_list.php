<?php
	// Параметры для подключения
	$server = "localhost"; 
	$user = "root"; // Логин БД
	$pass = ""; // Пароль БД
	$dbname = 'dbname'; // Имя БД
	$db_table = "contacts"; // Имя Таблицы БД

	// Подключение к базе данных
	$db  =  mysqli_connect( $server,  $user,  $pass,  $dbname  );
	mysqli_set_charset($db, "utf8");
	
	// Если есть ошибка соединения,  убиваем подключение
	if (!$db) die();
		
	//Формирование запроса
	$query   =  "SELECT * FROM ".$db_table." ORDER BY id DESC";// best	
	
	//Отправка запроса в базу на получение ответа
	$result  =  mysqli_query($db,  $query);
	
	mysqli_close( $db );
	$i=0;
	//echo "<thead><tr><th scope='col'>#</th><th scope='col'>Имя</th><th scope='col'>Телефон</th><th>scope='col'>Дата/Время</th></tr></thead><tbody>";
	echo "<tr><th>№</th><th>Имя</th><th>Телефон</th><th>Дата\Время</th></tr>";
	while (  $row  =  mysqli_fetch_row($result)  )
	{
		$i++;
		echo "<tr><td>".$i."</td><td>".$row[1]."</td><td>"
		.$row[2]."</td><td>".$row[3]."</td></tr>";
	}
	//echo "</tbody>";
?>