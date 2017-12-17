
<meta http-equiv="Content-Type" content="text/html; Charset=UTF-8"> 
<?php
$bool=true;
if (isset($_POST['name'])) { $name = str_replace(" ","",$_POST['name']);  if ($name == '') { unset($name);} } 
if (isset($_POST['surname'])) { $surname=$_POST['surname']; if ($surname =='') { unset($surname);} }
if (isset($_POST['patronymic'])) { $patronymic=$_POST['patronymic']; if ($patronymic =='') { unset($patronymic);} }
if (isset($_POST['universityGroup'])) { $universityGroup=$_POST['universityGroup']; if ($universityGroup =='') { unset($universityGroup);} }
if (isset($_POST['record_book_number'])) { $record_book_number=$_POST['record_book_number']; if ($record_book_number =='') { unset($record_book_number);} }
if (isset($_POST['password'])) { $password = str_replace(" ","",$_POST['password']); if ($password =='') { unset($password);} }
if (isset($_POST['password1'])) { $password1 = str_replace(" ","",$_POST['password1']); if ($password1 =='') { unset($password1);} }
if (isset($_POST['telephone'])) { $telephone=$_POST['telephone']; if ($telephone =='') { unset($telephone);} }
if (isset($_POST['email'])) { $email=$_POST['email']; if ($email =='') { unset($email);} }
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную


if (empty($name) or empty($surname) or empty($patronymic) or empty($universityGroup) or empty($record_book_number) or empty($email) or empty($password)or empty($password1)){ //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
	?>
	<script>
		alert("Вы ввели не всю информацию, венитесь назад и заполните все поля!");

	</script>
	<?
	exit("<html><head><meta http-equiv='Refresh' content='0; URL=../registrationStident.php'></head></html>");
	
}
if ($password<>$password1){ 
	?>
	<script>
		alert("Вы неправильно повторили пароль");
		javascript:history.back() 
	</script>
	<?
	
	exit("<html><head><meta http-equiv='Refresh' content='0; URL=../registrationStident.php'></head></html>");
}
else{
	
	$password = md5($password);
//если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
	$dsn = 'mysql:dbname=practice;host=localhost;charset=utf8';
	$opt = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES   => false,
	];
	 
	$pdo = new PDO($dsn, 'newuser', 'newuser', $opt);
	
	$sql="SELECT * FROM student_data WHERE record_book_number=?";
	
	$stm = $pdo->prepare($sql);
	$stm->execute([$record_book_number]);
	$res = $stm->fetch();
	if ($res) {
		?>
		<script>
			alert("Извините, введённый вами номер зачетной книжки уже зарегистрирован.");
			javascript:history.back() 
		</script>
		<?
		/*exit("<html><head><meta http-equiv='Refresh' content='0; URL=../registr_form.php'></head></html>");*/
	}
	else 
	{
		$act=-1;
		// если такого нет, то сохраняем данные 
		$stmt = $pdo->prepare("INSERT INTO user (email,password, telephone, category) VALUES (?,?,?,?)");	
		$stmt->execute(Array($email, $password, $telephone, $category));//поставить конкретную категорию
		$result2=true;

		
		//If ($select_status=="1"){//поменять статус можно тут 
			$sql="SELECT id FROM user WHERE telephone=?";
			$stm = $pdo->prepare($sql);
			$stm->execute([$telephone]);
			$id_user = $stm->fetch();
			$id_user=$id_user['id'];
			
			
			$sql="SELECT id_user FROM student_data WHERE record_book_number=?"; 
			$stm = $pdo->prepare($sql);
			$stm->execute([$telephone]);
			$myrow_book = $stm->fetch();
			
			if ($myrow_book[0] != ""){ //если поле для записи не пустое
				?>
				<script>
					alert("Извините, введённая вами книжка уже зарегистрирована.");
					javascript:history.back() 
				</script>
				<?
				$bool=false;	
			} 
			else 
			{
				$sql="INSERT INTO student_data (id_user, universityGroup,record_book_number,name,surname,patronymic) VALUES (?,?,?,?,?,?)"; 
				$stm = $pdo->prepare($sql);
				$stm->execute(array($id_user, $universityGroup,$record_book_number,$name, $surname, $patronymic));	
			}
		//}
			if ($bool){
			if ($result2=='TRUE') {	
				?>
				<script>
					alert("Студент зарегистрирован");
				</script>
				<?
				exit("<html><head><meta http-equiv='Refresh' content='0; URL=../listVacancies.php'></head></html>");
			} else {
				?>
				<script>
					alert("Ошибка! Студент не зарегистрирован.");
					javascript:history.back() 
				</script>
				<?
			}
		}
	}	
}
?>
