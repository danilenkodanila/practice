
<?php
		$dbhost = "localhost"; // Имя хоста БД
		$dbusername = "admin"; // Пользователь БД
		$dbpass = "76543210"; // Пароль к базе
		$dbname = "practice"; // Имя базы
		//file_get_contents($query);
		$dbconnect = mysql_connect ($dbhost, $dbusername, $dbpass); 
		if (!$dbconnect) { echo ("Не могу подключиться к серверу базы данных!"); }

		if(@mysql_select_db($dbname)) {}
		else die ("Не могу подключиться к базе данных $dbname!");
?>