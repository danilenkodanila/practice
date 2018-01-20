<?php
      session_start();
    ?>
    <html class="no-js" lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Практикант ДВФУ - Информация о студенте</title>
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
  if (empty($_SESSION['category'])){
        HTTP403main("/listVacancies.php","Перейти на страницу с вакансиями");
      } else if ($_SESSION['category']==2) {
        if (!empty($_POST)){

          $sql = "SELECT email, telephone FROM user WHERE id=?";
          $result = executeRequest($pdo,$sql,[$_POST['id']]);
          echo '
              <div class="grid-x" style="padding-top: 50px; padding-bottom:50px; min-height: 430px;">
                <div class="small-12 small-offset-1 medium-12 medium-offset-1 large-12 large-offset-1 cell">
                  <div class="block-dan">
                    '.$_POST["name"].' '.$_POST["surname"].' '.$_POST["patronymic"].'
                    <br>
                    Группа: '.$_POST["universityGroup"].'
                    <br>
                    Номер зачетной книжки: '.$_POST["record_book_number"].'
                    <br>
                    <br>
                    Номер телефона: '.$result[0]["email"].' 
                    <br>
                    Электронная почта: '.$result[0]["telephone"].'
                  </div>
                </div>
              </div>';


        } else {
          HTTP404main("/listVacancies.php","Перейти на страницу с вакансиями");
        }
  } else {
        HTTP403main("/listVacancies.php","Перейти на страницу с вакансиями");
      }
      
  include_once("footer.php");
  echoFooter();
?>

 <script type="text/javascript">



      <!-- Cкрипт, который обрабатывает клик по личному кабинету -->  
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

