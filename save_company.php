
<meta http-equiv="Content-Type" content="text/html; Charset=UTF-8"> 
<?php
$bool=true;
if (isset($_POST['name_company'])) { $name_company = str_replace(" ","",$_POST['name_company']);  if ($name_company == '') { unset($name_company);} } 
if (isset($_POST['inn'])) { $inn=$_POST['inn']; if ($inn =='') { unset($inn);} }
if (isset($_POST['address'])) { $address=$_POST['address']; if ($address =='') { unset($address);} }
if (isset($_POST['password'])) { $password = str_replace(" ","",$_POST['password']); if ($password =='') { unset($password);} }
if (isset($_POST['password1'])) { $password1 = str_replace(" ","",$_POST['password1']); if ($password1 =='') { unset($password1);} }
if (isset($_POST['telephone'])) { $telephone=$_POST['telephone']; if ($telephone =='') { unset($telephone);} }
if (isset($_POST['email'])) { $email=$_POST['email']; if ($email =='') { unset($email);} }
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
$category=2;

if (empty($name_company) or empty($inn) or empty($address) or empty($email) or empty($password)or empty($password1) or $password<>$password1){ //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
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
	include ("bd_PDO.php");
	
	$sql="SELECT * FROM employers_data WHERE inn=?";
	
	$stm = $pdo->prepare($sql);
	$stm->execute([$inn]);
	$res = $stm->fetch();
	if ($res) {
		?>
		<script>
			alert("Извините, введённый вами номер инн уже зарегистрирован.");
			javascript:history.back() 
		</script>
		<?
		/*exit("<html><head><meta http-equiv='Refresh' content='0; URL=../registr_form.php'></head></html>");*/
	}
	else 
	{
		
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
			
			
			$sql="SELECT id_user FROM employers_data WHERE inn=?"; 
			$stm = $pdo->prepare($sql);
			$stm->execute([$inn]);
			$myrow_inn = $stm->fetch();
			
			if ($myrow_inn[0] != ""){ //если поле для записи не пустое
				?>
				<script>
					alert("Извините, введённый вами ИНН уже зарегистрирован.");
					javascript:history.back() 
				</script>
				<?
				$bool=false;	
			} 
			else 
			{
				$sql="INSERT INTO employers_data (id_user, name_company,inn,address) VALUES (?,?,?,?)"; 
				$stm = $pdo->prepare($sql);
				$stm->execute(array($id_user, $name_company,$inn,$address));	
			}
		//}
			if ($bool){
			if ($result2=='TRUE') {	
				?>
				<script>
					alert("База практики зарегистрирована.");
				</script>
				<?
				exit("<html><head><meta http-equiv='Refresh' content='0; URL=../listVacancies.php'></head></html>");
			} else {
				?>
				<script>
					alert("Ошибка! База практики не зарегистрирована.");
					javascript:history.back() 
				</script>
				<?
			}
		}
	}
}
?>
