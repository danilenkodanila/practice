<?php
session_start(); 
include ("bd_PDO_short.php");
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
  </head>
  <body>
  
<?php
include ("header.php"); 
include("bd_PDO.php");
?>

      <?php
        if (!empty($_GET)){

          $sql = "SELECT * FROM vacancies WHERE id=?";
          $result = executeRequest($pdo,$sql,[$_GET["open"]]);
          // var_dump($result);
          // var_dump($result[0][0]);

          $suka=$result[0]['id_employers']; 
          $stmt1 = $pdo->prepare("SELECT name_company FROM employers_data WHERE id=?");
          $stmt1->execute(array($suka));
          $name1 = $stmt1->fetchColumn();

          echo'<!-- Всплывающая форма подробное описание вакансии/оставить заявку -->
     <div id="modal_form">
        
        <div class="grid-x block">
        <div class="small-1 large-1 columns"></div>
        <div class="small-10 large-10 columns bd-pop">

          <div class="grid-x block-line">
            <div class="small-1 large-1 columns"></div>
            <div class="small-10 large-10 columns">
              <div class="bold text-left">'.$result[0]["title"].'</div>
              <div class="bold text-right">'.$name1.'</div>
            </div>
            <div class="small-1 large-1 columns"></div>
          </div>

          <div class="grid-x block-line">
            <div class="small-1 large-1 columns"></div>
            <div class="small-10 large-10 columns">
              '.$result[0]["description"].'
            </div>
            <div class="small-1 large-1 columns"></div>
          </div>

          <div class="grid-x block-line">
            <div class="small-1 large-1 columns"></div>
            <div class="small-10 large-10 columns">
              <div class="bold">Ориентировано на:</div> студентов группы '.$result[0]["studentsfor"].'
            </div>
            <div class="small-1 large-1 columns"></div>
          </div>

          <div class="grid-x block-line">
            <div class="small-1 large-1 columns"></div>
            <div class="small-10 large-10 columns">
              <div class="bold">Дата проведения:</div> с '.$result[0]["dateStart"].' по '.$result[0]["dateFinish"].' 
            </div>
            <div class="small-1 large-1 columns"></div>
          </div>

          <div class="grid-x block-line">
            <div class="small-1 large-1 columns"></div>
            <div class="small-10 large-10 columns">
              <div class="bold">Место проведения:</div> '.$result[0]["place"].'            </div>
            <div class="small-1 large-1 columns"></div>
          </div>

          <div class="grid-x block-line">
            <div class="small-1 large-1 columns"></div>
            <div class="small-10 large-10 columns">
              <div class="bold text-right">'.$result[0]["dateAdd"].'</div>
            </div>
            <div class="small-1 large-1 columns"></div>
          </div>
        </div>';
		
          //если сессия пустая, то пользователь не залогенен, значит делаем кнопку disable
          if (empty($_SESSION['category'])){
            echo '<div class="formbt">
                    <input type="button" class="btnVcnt" disabled value="Оставить заявку">
                  </div>';
          } else {
            //если пользователь вошел под акккаунтом студента, то он может подать заявку
            if ($_SESSION['category']==1) {

              $sql = ("SELECT * FROM notification WHERE status=? AND id_user=?");
            $idUser = $_SESSION['id'];
            $result = executeRequest($pdo,$sql,[3,$idUser]);
            // var_dump($result);
            if (empty($result)) {

              $sql1 = "SELECT * FROM notification WHERE id_vacancy=? AND id_user=?";
              $result1 = executeRequest($pdo,$sql1,[$_GET["open"],$_SESSION['id']]);

              if (empty($result1)) {
                
                
                    echo '
                      <form method="POST">
                      <div class="formbt">
                            <input type="submit" name="send" value="Отправить заявку" />
                      </div>
                      </form>'; 
                    } 
                    else {
                      echo '<div class="small-1 large-1 columns"></div>
                            <div class="small-12 large-12 columns" style="text-align: center;font-weight: bold;">';

                      switch ($result1[0]["status"]) {
                        case 0: 
                          echo 'Заявка рассматривается
                            </div>';
                          break;
                        case 1: 
                          echo 'Заявка принята
                            </div>';
                          break;
                        case 2: 
                          echo 'Заявка отклонена
                            </div>';
                          break;
                        case 3: 
                          echo 'Заявка согласована
                            </div>';
                          break;
                      }

                    }
            } else {
              echo '<div class="small-1 large-1 columns"></div>
                            <div class="small-12 large-12 columns" style="text-align: center;font-weight: bold;">';
                            echo 'Вы уже выбрали место прохождения практики
                            </div>';
            }

                  if( isset( $_POST['send'] ) )
                  {
                  $date = date("Y-m-d");
                  $id_vacancy = $_GET["open"];
                  $id_user = $_SESSION['id'];  

                  
                  $sql2 = "INSERT INTO notification (date, id_vacancy, id_user, status) VALUES ('$date', '$id_vacancy', '$id_user', 0)";

                  $res = pushSQLtoDB($pdo, $sql2);
                  exit("<html><head><meta http-equiv='Refresh' content='0; URL=listVacancies.php'></head></html>");   
                  }
                } 
          }
		
		
       echo ' <div class="small-1 large-1 columns"></div>
        </div>
      </div>
      <div id="overlay"></div>
      <!-- Конец формы -->';
       } 
      ?>


      <!-- Форма авторизации -->
      <div id="modal_formTwo">
        <div class="grid-x search-row">
          <div class="small-0 large-1 columns"></div>
          <div class="small-10 large-10 columns">
            <div class="bold text-left">Авторизация</div>
            <input class="authorization-plchldr" type="text" placeholder="Имя учетной записи">
            <input class="authorization-plchldr" type="text" placeholder="Пароль">
          </div>
          <div class="small-0 large-1 columns"></div>
        </div>
        <div class="grid-x search-row">
          <div class="small-0 large-1 columns"></div>
          <div class="small-10 large-10 columns">
            <input type="checkbox" name="your-group" value="unit-in-group" />   Запомнить меня
            <div class="authorization-block-inside">
              <input type="button" class="authorization-btn" value="Войти">
            </div>
            <div class="authorization-block-inside-two">
              <a href="/registrationPartOne.php" class="authorization-rgstrtn">Зарегистрироваться</a>
            </div>
          </div>
          <div class="small-0 large-1 columns"></div>
        </div>
      </div>
      <div id="overlayTwo"></div>
      <!-- Конец формы авторизации -->
    
<!-- Поиск -->
<div class="grid-x search-row">
<div class="small-0 large-1 columns"></div>
<div class="small-10 large-10 columns" style="position: relative;">
<form action="" style="display: inline;" method="post">
<input class="search-icon" name="search" type="text" placeholder="Поиск">
<button type="submit" style="position: absolute;right: 0;bottom: 50%;" >
<image class="edt-icon-two" src="image/search-icon.png">
</button>
<input type="hidden" name="action" value="phone">
</form>
</div>
<div class="small-0 large-1 columns"></div>
</div>
<!-- Конец поиска-->


    <!-- Первый блок с вакансией -->
    <!-- Этот блок кликабельный -->
	
	<?php
	//echo (). ' ';
      if (empty($_POST['search'])){
        $stmt = $pdo->query("SELECT * FROM vacancies");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
      } else {
        $search=$_POST['search'];
        $stmt = $pdo->query("SELECT * FROM vacancies WHERE title LIKE '%$search%'");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
      }
			while($row = $stmt->fetch())
{
    
	
    printf('<a href="#" id="go" open="'.$row["id"].'" class="block-a">');
    printf('<div class="grid-x block">');
      printf('<div class="small-1 large-1 columns"></div>');
      printf('<div class="small-10 large-10 columns bd">');

        printf('<div class="grid-x block-line">');
          printf('<div class="small-1 large-1 columns"></div>');
          printf('<div class="small-10 large-10 columns">');
		  
		  $suka=$row['title'];
            printf('<div class="bold text-left">'.$suka.'</div>'); //nazvanie
			
		  $suka=$row['id_employers'];	
		  $stmt1 = $pdo->prepare("SELECT name_company FROM employers_data WHERE id=?");
		  $stmt1->execute(array($suka));
		  $name1 = $stmt1->fetchColumn();
			  
            printf('<div class="bold text-right">'.$name1.'</div>'); //rabotodatel
			
         printf('</div>');
          printf('<div class="small-1 large-1 columns"></div>');
        printf('</div>');

        printf('<div class="grid-x block-line">');
          printf('<div class="small-1 large-1 columns"></div>');
          printf('<div class="small-10 large-10 columns">');
		  
		   $suka=$row['description'];
            printf($suka);
			
			
         printf(' </div>');
         printf(' <div class="small-1 large-1 columns"></div>');
       printf(' </div>');

       printf(' <div class="grid-x block-line">');
         printf(' <div class="small-1 large-1 columns"></div>');
         printf(' <div class="small-10 large-10 columns">');
		 
		    $suka=$row['studentsfor'];
            printf('<div class="bold">Ориентировано на:</div> студентов группы '.$suka);
			
         printf(' </div>');
         printf(' <div class="small-1 large-1 columns"></div>');
       printf(' </div>');

       printf(' <div class="grid-x block-line">');
         printf(' <div class="small-1 large-1 columns"></div>');
         printf(' <div class="small-10 large-10 columns">');
		 
		   $suka=$row['dateStart'];
		   $suka2=$row['dateFinish'];
           printf(' <div class="bold">Дата проведения:</div> с '.$suka.' по '.$suka2);
		   
		   
         printf(' </div>');
         printf(' <div class="small-1 large-1 columns"></div>');
       printf(' </div>');

        printf('<div class="grid-x block-line">');
         printf(' <div class="small-1 large-1 columns"></div>');
         printf(' <div class="small-10 large-10 columns">');
		 
		   $suka=$row['place'];
           printf(' <div class="bold">Место проведения:</div> '.$suka);
			
			
			
			
         printf(' </div>');
         printf(' <div class="small-1 large-1 columns"></div>');
        printf('</div>');

        printf('<div class="grid-x block-line">');
          printf('<div class="small-1 large-1 columns"></div>');
          printf('<div class="small-10 large-10 columns">');
		  
		   $suka=$row['dateAdd'];
           printf(' <div class="bold text-right">Дата добавления '. $suka.'</div>');
		   
         printf(' </div>');
         printf(' <div class="small-1 large-1 columns"></div>');
       printf(' </div>');

      printf('</div>');
     printf(' <div class="small-1 large-1 columns"></div>');
   printf(' </div>');
   printf(' </a>');
	
	}
			?>
    <!-- Конец первого блока с вакансией -->



    <!-- footer -->               
    <?php
      include_once("footer.php");
      echoFooter();
    ?>
    <!-- Конец footer`а --> 


   
    <!-- Два одинаковых скрипта, которые обрабатывают клика по первой вакансии и личному кабинету -->  
    <!-- Сделаны просто для примера -->  
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
          insertParam("open",this.getAttribute("open"));


          $('#overlay').fadeIn(400, // снaчaлa плaвнo пoкaзывaем темную пoдлoжку
            function(){ // пoсле выпoлнения предъидущей aнимaции
              $('#modal_form') 
                .css('display', 'block') // убирaем у мoдaльнoгo oкнa display: none;
                .animate({opacity: 1, top: '50%'}, 200); // плaвнo прибaвляем прoзрaчнoсть oднoвременнo сo съезжaнием вниз
          });
        });
        /* Зaкрытие мoдaльнoгo oкнa, тут делaем тo же сaмoе нo в oбрaтнoм пoрядке */
        $('#modal_close, #overlay').click( function(){ // лoвим клик пo крестику или пoдлoжке
          window.history.pushState(null, null, window.location.pathname);
          $('#modal_form')
            .animate({opacity: 0, top: '45%'}, 200,  // плaвнo меняем прoзрaчнoсть нa 0 и oднoвременнo двигaем oкнo вверх
              function(){ // пoсле aнимaции
                $(this).css('display', 'none'); // делaем ему display: none;
                $('#overlay').fadeOut(400); // скрывaем пoдлoжку
              }
            );
        });
      });
    </script>
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
    <!-- Конец скриптов -->  

    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
