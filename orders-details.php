<?php
session_start(); ?>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Практикант ДВФУ</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link href="css/foundation-datepicker.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="js/foundation-datepicker.js"></script>

  </head>
  <body>
<?php
include ("header.php"); ?>

    <!-- Блок со ссылками-->
    <div class="grid-x">
      <div class="small-0 large-1 columns"></div>
      <div class="small-10 large-10 columns">
        <div class="line-solid"></div>
        <div class="pdng">
          <div class="bold text-left">&emsp;&emsp;&emsp;Название группы 1</div>
          <div class="text-right">Текущая дата</div>
        </div>
        <table class="fnt">
          <thead>
            <tr>
              <th width="200">ФИО студента</th>
              <th width="200">Наименование вакансии</th>
              <th width="200">Наименование предприятия</th>
              <th width="200">Дата проведения</th>
            </tr>
          </thead>
          <tbody>
		  
          <?php 
		// require_once 'orders.php';
		
		$dbhost = "localhost"; // Имя хоста БД
		$dbusername = "newuser"; // Пользователь БД
		$dbpass = "newuser"; // Пароль к базе
		$dbname = "practice"; // Имя базы

		$dbconnect = mysql_connect ($dbhost, $dbusername, $dbpass); 
		if (!$dbconnect) { echo ("Не могу подключиться к серверу базы данных!"); }

		if(@mysql_select_db($dbname)) {}
		else die ("Не могу подключиться к базе данных $dbname!");
		$group = $_SESSION['universityGroup'];
		
		$sql = "SELECT student_data.universityGroup, vacancies.userAddId, vacancies.dateStart, vacancies.dateFinish, employers_data.name_company, employers_data.id, vacancies.id_employers,vacancies.title, student_data.surname, student_data.patronymic, student_data.id_user, student_data.name FROM student_data, vacancies, employers_data WHERE  vacancies.id_employers = employers_data.id AND vacancies.userAddId = student_data.id_user AND student_data.universityGroup='".$group."'";
		
		$result = mysql_query($sql) or die(mysql_error() ."<br/>". $sql);
		

		 while ($row = mysql_fetch_assoc($result))
		 {
		$table .= "<tr>\n";
		$table .= "<td>".$row['name']." ".$row['patronymic']." ".$row['surname']."</td>\n";
		$table .= "<td>".$row['title']."</td>\n";
		$table .= "<td>".$row['name_company']."</td>\n";
		$table .= "<td>".$row['dateStart']." - ".$row['dateFinish']."</td>\n";
		$table .= "</tr>\n";
		 }
		  $table .= "</table>\n";

 // Выводим заполненую таблицу на экран
 echo $table;?>
		 
          </tbody>
        </table>
      </div>
      <div class="small-0 large-1 columns"></div>
    </div>
    <!-- Конец блока со ссылками -->




    <!-- footer -->               
    <div class="footer">
      <div class="blue"></div>
      <div class="grid-x white">
        <div class="large-4 columns footer-text">
          Контактная информация<br>
          Адреса технической поддержки
        </div>
      </div>
    </div>
    <!-- Конец footer`а --> 

    <!-- Cкрипт, которыQ обрабатывает клик по личному кабинету -->  
    <!-- Сделан просто для примера -->  
    <script type="text/javascript">
      $(document).ready(function() { // вся мaгия пoсле зaгрузки стрaницы
        $('a#goTwo').click( function(event){ // лoвим клик пo ссылки с id="go"
          event.preventDefault(); // выключaем стaндaртную рoль элементa
          $('#overlayTwo').fadeIn(400, // снaчaлa плaвнo пoкaзывaем темную пoдлoжку
            function(){ // пoсле выпoлнения предъидущей aнимaции
              $('#modal_formTwo') 
                .css('display', 'block') // убирaем у мoдaльнoгo oкнa display: none;
                .animate({opacity: 1, top: '50%'}, 200); // плaвнo прибaвляем прoзрaчнoсть oднoвременнo сo съезжaнием вниз
          });
        });
        /* Зaкрытие мoдaльнoгo oкнa, тут делaем тo же сaмoе нo в oбрaтнoм пoрядке */
        $('#modal_close, #overlayTwo').click( function(){ // лoвим клик пo крестику или пoдлoжке
          $('#modal_formTwo')
            .animate({opacity: 0, top: '45%'}, 200,  // плaвнo меняем прoзрaчнoсть нa 0 и oднoвременнo двигaем oкнo вверх
              function(){ // пoсле aнимaции
                $(this).css('display', 'none'); // делaем ему display: none;
                $('#overlayTwo').fadeOut(400); // скрывaем пoдлoжку
              }
            );
        });
      });
    </script>
    <!-- Конец скрипта -->


    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
