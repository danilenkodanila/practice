
<?php

$user = "newuser"; // Пользователь БД
$pass = "newuser"; // Пароль к базе

		try {
			$dbh = new PDO('mysql:host=localhost;dbname=practice;charset=utf8', $user, $pass);
		} catch (PDOException $e) {
			die('Подключение не удалось: ' . $e->getMessage());
		}

?>