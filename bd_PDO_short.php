
<?php

		$user = "admin";
		$pass = "76543210";
		//, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
		try {
			$pdo = new PDO('mysql:host=localhost;dbname=practice;charset=utf8', $user, $pass);
		} catch (PDOException $e) {
			die('Подключение не удалось: ' . $e->getMessage());
		}

?>