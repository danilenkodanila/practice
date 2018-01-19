<?php
session_start(); 
include ("bd_PDO.php");
$id_user=$_SESSION['id'];
?>
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
    
    <!-- Надпись-->
     <div class="grid-x search-row">
      <div class="large-10 large-offset-1 cell">                                                                     
        <div style="text-align: center;">Личный кабинет</div>                   
      </div>
    </div>
    <!-- Конец надписи-->


	 
	
    <!-- Форма с табами -->
    <div class="grid-x link-block" style="min-height: 400px;">
      <div class="small-10 small-offset-1 medium-10 medium-offset-1 large-10 large-offset-1 cell">
        
        <div class="line-stroke"></div>
         <ul class="tabs" data-active-collapse="true" data-tabs id="collapsing-tabs">
          <div class="grid-x">
            <div class="small-10 small-offset-2 large-4 medium-3 medium-offset-2 large-offset-2 cell">
              <li class="tabs-title is-active"><a class="tabs-a" href="#panel1c" aria-selected="true">Персональные данные</a></li>
            </div>
            <div class="small-10 small-offset-2 large-4 medium-3 medium-offset-2 large-offset-1 cell">
              <li class="tabs-title tabs"><a class="tabs-a" href="#panel2c">Информация по вакансиям</a></li>
            </div>
          </div>
        </ul>
        <div class="line-stroke"></div>

        <div class="tabs-content" data-tabs-content="collapsing-tabs">

          <div class="tabs-panel is-active" id="panel1c">
            <div class="block-dan">
  
         <?php      
              if ($_SESSION['category']==1){
        $stmt = $pdo->prepare("SELECT name FROM student_data WHERE id_user=?");
        $stmt->execute(array($id_user));
        $name = $stmt->fetchColumn();
        echo $name;
        echo " ";
        $stmt = $pdo->prepare("SELECT surname FROM student_data WHERE id_user=?");
        $stmt->execute(array($id_user));
        $name = $stmt->fetchColumn();
        echo $name;
        ?>
        
              <br>
              Группа: 
        
        <?php         
        $stmt = $pdo->prepare("SELECT universityGroup FROM student_data WHERE id_user=?");
        $stmt->execute(array($id_user));
        $name = $stmt->fetchColumn();
        echo $name;
        ?>
        
              <br>
              Номер зачетной книжки: 
        
        <?php 
        $stmt = $pdo->prepare("SELECT record_book_number FROM student_data WHERE id_user=?");
        $stmt->execute(array($id_user));
        $name = $stmt->fetchColumn();
        echo $name;
        ?>
        
              <br>
              <br>
              Номер телефона: 
        
        <?php 
        $stmt = $pdo->prepare("SELECT telephone FROM user WHERE id=?");
        $stmt->execute(array($id_user));
        $name = $stmt->fetchColumn();
        echo $name;
        ?>
        
        <form action="lkChange.php" style="display: inline;" method="post">
          <button type="submit">
            <image class="edt-icon" src="image/edit-icon.png">
          </button>
          <input type="hidden" name="action" value="phone">
        </form>
              <br>
              Электронная почта: 
        
        <?php 
        $stmt = $pdo->prepare("SELECT email FROM user WHERE id=?");
        $stmt->execute(array($id_user));
        $name = $stmt->fetchColumn();
        echo $name;
              }
        ?>
        
       <form action="lkChange.php" style="display: inline;" method="post">
          <button type="submit">
            <image class="edt-icon" src="image/edit-icon.png">
          </button>
          <input type="hidden" name="action" value="email">
        </form>
              <br>
              <br>
              <form action="lkChange.php" method="post">
                <input class="authorization-rgstrtn" type="submit" value="Сменить пароль" />
                <input type="hidden" name="action" value="password">
              </form>
            </div>
          </div>

          <div class="tabs-panel" id="panel2c">
            <div class="grid-x">
              <div class="small-0 medium-8 large-10 cell">
                <table class="fnt tbl">
                  <thead>
                    <tr>
                      <th width="400">Наименование вакансии</th>
                      <th width="200">Наименование организации</th>
                      <th width="200">Статус заявки</th>
					  <th width="200">Действия</th>
                    </tr>
                  </thead>
				  <?php
				  {
					/*  $sql = "SELECT * FROM notification WHERE id_user=?";
					  $result = executeRequest($pdo,$sql,$_SESSION['id']]); */
					  $stmt = $pdo->prepare("SELECT * FROM notification WHERE id_user=?");
					  $stmt->execute(array($_SESSION['id']));
					  $stmt->setFetchMode(PDO::FETCH_ASSOC);
					  while($row = $stmt->fetch()) 
					  {
					    $stmt1 = $pdo->prepare("SELECT * FROM vacancies WHERE id=?");
					    $stmt1->execute(array($row["id_vacancy"]));
					    $stmt1->setFetchMode(PDO::FETCH_ASSOC);
						$row1 = $stmt1->fetch();						
					    printf('<tbody>');
                        printf('<tr>');
                        printf('<td><a href="#" class="link-table-two">'.$row1["title"].'</a></td>');
						
						$stmt1 = $pdo->prepare("SELECT * FROM employers_data WHERE id=?");
					    $stmt1->execute(array($row1["id_employers"]));
					    $stmt1->setFetchMode(PDO::FETCH_ASSOC);
						$row2 = $stmt1->fetch(); 
                        printf('<td>'.$row2["name_company"].'</td>');
						
						switch ($row["status"])
						{
							case 0: 
							
							  printf('<td>Рассматривается</td>'); 
							  echo('
							     <td class="delete-border">
									<form action="/student-account.php" method="POST">
									<input type="submit" name="dec" value="Отклонить (доступно в течении 6 часов)" />
									<input type="hidden" name="id" value="'.$row["id_vacancy"].'" />
									<input type="hidden" name="action" value="form1" />
									</form>
									</td>
							     ');
							  break;	
							case 1:
							  $stmt11 = $pdo->prepare("SELECT * FROM notification WHERE id_vacancy=?");
							  $stmt11->execute(array($_POST["id"]));
							  $stmt11->setFetchMode(PDO::FETCH_ASSOC);
					          $row11 = $stmt11->fetch();
							  date_default_timezone_set('Europe/Moscow');
							  $date1=$row11["date"];
							  $date2=date("Y-m-d h:m:s");
							  $diff = strtotime($date2) - strtotime($date1);
							  $diff=abs($diff);	
							 // echo $date2.' '.$date1;
							  printf('<td>Принята</td>');  
						//	  if ($diff<21600){			    
							    echo('
							        <td class="delete-border">
									<form action="/student-account.php" method="POST">
									<input type="submit" name="dec" value="Отклонить (доступно в течении 6 часов)" />
									<input type="hidden" name="id" value="'.$row["id_vacancy"].'" />
									<input type="hidden" name="action" value="form1" />
									</form>
									</td>
							  '); //	} else printf('<td class="delete-border">Нет доступных действий</td>');
							  break;
							  
							case 2: 
							  printf('<td>Отклонена</td>'); 
							  echo('
							     <td class="delete-border">
                                 <form action="/student-account.php" method="POST">
								<input type="submit" name="delete" value="Удалить" />
								<input type="hidden" name="id" value="'.$row["id_vacancy"].'" />
								<input type="hidden" name="action" value="form1" />
								</form>
								</td>
							     ');
							  break;
							 case 3:
							   printf('<td>Принята</td>');      
							   printf('<td class="delete-border">Нет доступных действий</td>');
							   break;
						}
						
					    printf('</tr>');
						
					  }
						if( isset( $_POST['delete'] ) )
						{	  
							//var_dump($_POST);
							//var_dump($_POST["id"]);
							$id=$_POST["id"];			   
							$sql = "DELETE FROM notification WHERE id_vacancy='$id'";
							pushSQLtoDB($pdo, $sql);  
							echo'<meta http-equiv="refresh" content="0;student-account.php">';
						} 
						
						if( isset( $_POST['dec'] ) )
						{	  
							$id_vacancy = $_POST["id"];
							$sql = "UPDATE notification set status = 2 where id_vacancy='$id_vacancy'";
							pushSQLtoDB($pdo, $sql);
							echo'<meta http-equiv="refresh" content="0;student-account.php">';
						}
						}?>

               <!--  <tbody>
                    <tr>
                      <td><a href="#" class="link-table-two">Вакансия 1</a></td>
                      <td>International Brutal Marines</td>
                      <td>Рассматривается</td>
                    </tr>

                    <tr>
                      <td><a href="#" class="link-table-two">Вакансия 2</a></td>
                      <td>Color Dream</td>
                      <td>Отклонена</td>
                    </tr>
                    <tr>
                      <td><a href="#" class="link-table-two">Вакансия 3</a></td>
                      <td>Ростовский Дон</td>
                      <td>Подтверждена</td>
                    </tr>
                  </tbody> -->
			
			
                </table>
              </div>

            </div>
          
          </div>
        </div>
        
      </div>
      <div class="small-0 large-1 columns"></div>
    </div>
     <!-- Конец-->

    <!-- footer -->               
    <?php
      include_once("footer.php");
      echoFooter();
    ?>
    <!-- Конец footer`а --> 

    <!-- Cкрипт, которыQ обрабатывает клик по личному кабинету -->  
    <!-- Сделан просто для примера -->  
    <script type="text/javascript">
	
	function insertParam(key, value){
        key = encodeURI(key); value = encodeURI(value);
        var kvp = document.location.search.substr(1).split('&');

        var i=kvp.length; var x; while(i--) {
            x = kvp[i].split('=');

            if (x[0]==key){
                x[1] = value;
                kvp[i] = x.join('=');
                break;
            }
        }
          if(i<0) {kvp[kvp.length] = [key,value].join('=');}

          //this will reload the page, it's likely better to store this until finished
          document.location.search = kvp.join('&'); 
      }
	
	 $(document).ready(function() { // вся мaгия пoсле зaгрузки стрaницы
        $('a#go').click( function(event){ // лoвим клик пo ссылки с id="go"
          event.preventDefault(); // выключaем стaндaртную рoль элементa
          console.log(this.getAttribute("open"));
          // insertParam("open",this.getAttribute("open"));


          $('#overlay').fadeIn(400, // снaчaлa плaвнo пoкaзывaем темную пoдлoжку
            function(){ // пoсле выпoлнения предъидущей aнимaции
              $('#modal_form') 
                .css('display', 'block') // убирaем у мoдaльнoгo oкнa display: none;
                .animate({opacity: 1, top: '50%'}, 200); // плaвнo прибaвляем прoзрaчнoсть oднoвременнo сo съезжaнием вниз
          });
        });
        /* Зaкрытие мoдaльнoгo oкнa, тут делaем тo же сaмoе нo в oбрaтнoм пoрядке */
        $('#modal_close, #overlay').click( function(){ // лoвим клик пo крестику или пoдлoжке
          $('#modal_form')
            .animate({opacity: 0, top: '45%'}, 200,  // плaвнo меняем прoзрaчнoсть нa 0 и oднoвременнo двигaем oкнo вверх
              function(){ // пoсле aнимaции
                $(this).css('display', 'none'); // делaем ему display: none;
                $('#overlay').fadeOut(400); // скрывaем пoдлoжку
              }
            );
        });
      });
	
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
