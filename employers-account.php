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


    <!-- Форма -->
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
        
        
              <?php if ($_SESSION['category']==2){  
			  
              
			 
			 echo ("Компания:");
       
       $stmt = $pdo->prepare("SELECT name_company FROM employers_data WHERE id_user=?");
       $stmt->execute(array($id_user));
       $name = $stmt->fetchColumn();
       echo $name;
        ?>
              <br>
        
              Адрес:
        <?php 
        $stmt = $pdo->prepare("SELECT address FROM employers_data WHERE id_user=?");
        $stmt->execute(array($id_user));
        $name = $stmt->fetchColumn();
        echo $name;
        ?>
              <br>
        
              ИНН орнанизации: 
        <?php 
        $stmt = $pdo->prepare("SELECT inn FROM employers_data WHERE id_user=?");
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

		  
		    <?php
				  { 

					   $stmt = $pdo->prepare("SELECT employers_data.id_user as id_user, vacancies.title as title, vacancies.id as id_vac, student_data.name as name, student_data.surname as surname, notification.status as status_employer, notification.id_user as id_us  
					   FROM employers_data 
					  left join vacancies on employers_data.id=vacancies.id_employers
					  left join notification on vacancies.id=notification.id_vacancy
					  left join student_data on notification.id_user=student_data.id_user");
					  $stmt->execute(/*array(':id'=>$_SESSION['id'])*/);
					  //$stmt->setFetchMode(PDO::FETCH_ASSOC);
					  //$row = $stmt->fetch();
					 
					
					  /*$stmt1 = $pdo->prepare("SELECT * FROM vacancies WHERE id_employers=?");
					  $stmt1->execute(array($row['id']));
					  $stmt1->setFetchMode(PDO::FETCH_ASSOC);
					  $row1 = $stmt1->fetch();
					  
					  $stmt2 = $pdo->prepare("SELECT * FROM notification WHERE id_vacancy=?");
					  $stmt2->execute(array($row1['id']));
					  $stmt2->setFetchMode(PDO::FETCH_ASSOC);
					  $row2 = $stmt2->fetch();
					  
					  $stmt3 = $pdo->prepare("SELECT * FROM student_data");
					  $stmt3->execute(array($row2['id_user']));
					  $stmt3->setFetchMode(PDO::FETCH_ASSOC);
					  $row3 = $stmt3->fetch();*/
					  
					  echo '<div class="tabs-panel" id="panel2c">';
					  while($row = $stmt->fetch()) {
						 if (($row['id_user'] == $_SESSION['id']) and ($row['name'] != '') ){
						//while($row2 = $stmt2->fetch()) {  
						//while($row2 = $stmt3->fetch()) {
	
					  
			
						
					  
					      echo '
							
							<div class="line-solid">Вакансия: '.$row['title'].'</div><br>
							<div class="grid-x">
							<div class="small-4 medium-8 large-10 cell">
							<table class="fnt tbl">
							<thead>
							<tr>
							<th width=auto>Отозвавшиеся студенты</th>
							<th width=auto>Статус</th>
							<th width=auto>Возможные действия</th>
							<!-- <th width="100"></th> -->
							<!-- <th width="100"></th> -->
							</tr>
							</thead>
							<tbody>';  
							
							
							
						  
							echo("<tr>");
							echo("<td>
							<form action='/student-detail.php' method='POST'>
							<a href='student-detail.php?id=".$row["id_us"]."' class='link-table-two'>Студент: ".$row['name']." ".$row['surname']."</a>
							<input type='hidden' name='id' value=".$row["id_us"]."/>
							</form>
							</td>");
							switch ($row["status_employer"])
							{
							case 0: 
							  printf('<td>Рассматривается</td>'); 
							  echo('
							        <td class="delete-border">
									<form action="/employers-account.php" method="POST">
									
									<input type="submit" name="acc" value="Подтвердить" />
									<input type="hidden" name="id" value="'.$row["id_vac"].'" />
									
									<input type="submit" name="decline" value="Отклонить" />			
									<input type="hidden" name="id" value="'.$row["id_vac"].'" />
									
									<input type="hidden" name="action" value="form1" />
									</form>
									</td>
							  '); 	
							 	
							  break;
							case 1: 
							  printf('<td>Принят</td>');
							  printf('<td class="delete-border">Нет доступных действий</td>');		
							  break;
							case 2: 
							  printf('<td>Отказано</td>'); 
							  printf('<td class="delete-border">Нет доступных действий</td>');	
							  break;
							case 3: 
							  printf('<td>Подтверждено</td>'); 
							  printf('<td class="delete-border">Нет доступных действий</td>');	
							  break;
							}
							echo("</tr>");
					        echo '
					          </tbody>
							  </table>';
							  
					  }}//}
					  if( isset( $_POST['acc'] ) )
						{	  
							//var_dump($_POST);
							//var_dump($_POST["id"]);
							$id_vacancy = $_POST["id"];			   
							$sql = "UPDATE notification set status = 1 where id_vacancy='$id_vacancy'";
							pushSQLtoDB($pdo, $sql);
							echo'<meta http-equiv="refresh" content="0;employers-account.php">';
						} 
						
						if( isset( $_POST['decline'] ) )
						{	  
							$id_vacancy = $_POST["id"];
							$sql = "UPDATE notification set status = 2 where id_vacancy='$id_vacancy'";
							pushSQLtoDB($pdo, $sql);
							echo'<meta http-equiv="refresh" content="0;employers-account.php">';
						}
					 echo '</div>'; 
				  } ?>
		  

          
              <div class="small-2 medium-2 large-2 cell">
                <table style="border-collapse: separate;">
                  <thead>
                    <tr class="delete-border">
                      <th class="delete-border" width="50">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                      <th class="delete-border" width="50">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
            <!--        <tr class="delete-border">
                      <td class="delete-border"><a href="#" class="link-black-underline">Одобрить</a></td>
                      <td class="delete-border"><a href="#" class="link-black-underline">Отказать</a></td>
                    </tr>
                    <tr class="delete-border">
                      <td class="delete-border">&nbsp;</td>
                    </tr>
                    <tr class="delete-border">
                      <td class="delete-border"><a href="#" class="link-black-underline">Удалить</a></td> -->
                    </tr>
                  </tbody>
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
