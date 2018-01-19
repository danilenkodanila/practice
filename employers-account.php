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
        
        
              <?php

              if ($_SESSION['category']==2){  
			  
        if( isset( $_POST['delete'] ) ){  
              var_dump($_POST);
               $sql = ("DELETE FROM notification WHERE id_vacancy=? AND id_user=?");
               $id = $_POST["id"];
               $idUs = $_POST["id1"];
               $result = executeRequest($pdo,$sql,[$id,$idUs]);
               exit("<html><head><meta http-equiv='Refresh' content='0; URL=employers-account.php'></head></html>");
          } 
          

          if( isset( $_POST['accept'] ) ){ 
               $sql = ("UPDATE `notification` SET `status`=1 WHERE id_vacancy=? AND id_user=?");
               $id = $_POST["id"];
               $idUs = $_POST["id1"];
               $result = executeRequest($pdo,$sql,[$id,$idUs]);
               exit("<html><head><meta http-equiv='Refresh' content='0; URL=employers-account.php'></head></html>");
              // echo $_GET['open'];
          } 

          if( isset( $_POST['disaccept'] ) ){ 
               $sql = ("UPDATE `notification` SET `status`=2 WHERE id_vacancy=? AND id_user=?");
               $id = $_POST["id"];
               $idUs = $_POST["id1"];
               $result = executeRequest($pdo,$sql,[$id,$idUs]);
               exit("<html><head><meta http-equiv='Refresh' content='0; URL=employers-account.php'></head></html>");
              // echo $_GET['open'];
          } 
              
			 
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
            echo' <div class="tabs-panel" id="panel2c">';
					  $stmt = $pdo->prepare("SELECT * FROM employers_data WHERE id_user=?");
					  $stmt->execute(array($_SESSION['id']));
					  $stmt->setFetchMode(PDO::FETCH_ASSOC);
					  $row = $stmt->fetch();


					
					  $stmt = $pdo->prepare("SELECT * FROM vacancies WHERE id_employers=?");
            $stmt->execute(array($row['id']));
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            while($row1 = $stmt->fetch()) 
					  {
              // <div class="line-solid">Вакансия: '.$row1["title"].'</div><br>
					      echo '
					       
							
              <div class="grid-x">
              <div class="small-4 medium-8 large-10 cell">
							<table class="fnt tbl">
							<thead>
							<tr>
							<th width="200">Отозвавшиеся студенты</th>
							<th width="200">Статус</th>
              <th width="200">Действия</th>
							<!-- <th width="100"></th> -->
							<!-- <th width="100"></th> -->
							</tr>
							</thead>
							<tbody>';  
							$stmt2 = $pdo->prepare("SELECT * FROM notification WHERE id_vacancy=?");
							$stmt2->execute(array($row1['id']));
							$stmt2->setFetchMode(PDO::FETCH_ASSOC);
					    while($row2 = $stmt2->fetch()){
                $stmt3 = $pdo->prepare("SELECT * FROM student_data WHERE id_user=?");
                $stmt3->execute(array($row2['id_user']));
                $stmt3->setFetchMode(PDO::FETCH_ASSOC);
                $row3 = $stmt3->fetch();
                echo("<tr>");
                echo("<td>Студент: ".$row3["name"]." ".$row3["surname"]."</td>");
                switch ($row2["status"])
              {
              case 0:
                printf('<td>Рассматривается</td>');
                echo('
                 <td class="delete-border">
                 <div style="overflow: hidden;white-space: nowrap;">
                  <form action="/employers-account.php" method="POST">
                    <input type="submit" name="disaccept" value="Отказать" />
                    <input type="hidden" name="id" value="'.$row2["id_vacancy"].'" />
                    <input type="hidden" name="id1" value="'.$row3["id_user"].'" />
                  </form>
                  </div>
                  <div style="overflow: hidden;white-space: nowrap;">
                  <form action="/employers-account.php" method="POST">
                    <input type="submit" name="accept" value="Одобрить" />
                    <input type="hidden" name="id" value="'.$row2["id_vacancy"].'" />
                    <input type="hidden" name="id1" value="'.$row3["id_user"].'" />
                  </form>
                  </div>
                </td>
               ');
              break;
              case 3:
                printf('<td>Принят</td>'); 
                echo('
                   <td class="delete-border">
                  </td>
                 ');
              break;
              case 2:
                printf('<td>Отказано</td>');
                echo('
                 <td class="delete-border">
                  <form action="/employers-account.php" method="POST">
                    <input type="submit" name="delete" value="Удалить" />
                    <input type="hidden" name="id" value="'.$row2["id_vacancy"].'" />
                    <input type="hidden" name="id1" value="'.$row3["id_user"].'" />
                  </form>
                </td>
               ');
              break;
              case 1: printf('<td>Согласован</td>'); 
                echo('
                 <td class="delete-border">
                  <form action="/employers-account.php" method="POST">
                    <input type="submit" name="disaccept" value="Отказать" />
                    <input type="hidden" name="id" value="'.$row2["id_vacancy"].'" />
                    <input type="hidden" name="id1" value="'.$row3["id_user"].'" />
                  </form>
                </td>
               ');
              break;
              }
              
							
							
						  
							
							
					  }
					  
				  } 

          echo("</tr>");
                  echo '
                    </tbody>
                </table>
                </div>';
             
		      }?>  

          
              <!-- <div class="small-2 medium-2 large-2 cell">
                <table style="border-collapse: separate;">
                  <thead>
                    <tr class="delete-border">
                      <th class="delete-border" width="50">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                      <th class="delete-border" width="50">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="delete-border">
                      <td class="delete-border"><a href="#" class="link-black-underline">Одобрить</a></td>
                      <td class="delete-border"><a href="#" class="link-black-underline">Отказать</a></td>
                    </tr>
                    <tr class="delete-border">
                      <td class="delete-border">&nbsp;</td>
                    </tr>
                    <tr class="delete-border">
                      <td class="delete-border"><a href="#" class="link-black-underline">Удалить</a></td>
                    </tr>
                  </tbody>
                </table>
              </div> -->
             

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
