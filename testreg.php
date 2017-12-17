<?php
//header('Content-Type: text/html; charset=utf-8', true); 
session_start();// вся процедура работает на сессиях. Именно в ней хранятся данные пользователя, пока он находится на сайте. Очень важно запустить их в самом начале странички!!!
	//заносим введенный пользователем логин в переменную $email, если он пустой,  то уничтожаем переменную
	if    (isset($_POST['email'])) 
	{ 
		$email = str_replace(" ","",$_POST['email']); 
		if ($email == '') 
		{ 
			unset($email);
		}    
	} 
	//заносим введенный пользователем e-mail, если он    пустой, то уничтожаем переменную
	if    (isset($_POST['password'])) 
	{ 
		$password = str_replace(" ","",$_POST['password']);
		if ($password == '') 
		{ 
			unset($password);
		} 
	} 
	//если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
	if (empty($email) or empty($password)) 
	{ //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
		?>
		<script>
			alert("Вы ввели не всю информацию, венитесь назад и заполните все поля!");
		</script>
		<?
		exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
	}
	else
	{
		$dsn = 'mysql:dbname=practice;host=localhost;charset=utf8';
		$opt = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES   => false,
		];
		 
		$pdo = new PDO($dsn, 'newuser', 'newuser', $opt);
		$sql="SELECT * FROM user WHERE email=?";
		
		$stm = $pdo->prepare($sql);
		$stm->execute([$email]);
		$res = $stm->fetch();
		if (!$res)
		{
			?>
			<script>
				alert("Извините, введённый вами email неверный.");
			</script>
			<?
			exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
		} 
		else
		{ //если существует, то сверяем пароли
		
			$password=md5($password);
			if ($res['password']==$password) 
			{
					//если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
					$_SESSION['email']=$res['email']; 
					$_SESSION['password']=$res['password']; 
					$_SESSION['id']=$res['id'];
					$_SESSION['category']=$res['category'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
				
			}
			else 
			{
				?>
				<script>
					alert("Извините, введённый пароль неверный.");
				</script>
				<?
				exit("<html><head><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
			}
		}
	} 
	
?>