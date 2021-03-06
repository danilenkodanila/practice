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
    
    <!-- Надпись-->
     <div class="grid-x search-row">
      <div class="small-0 large-1 columns"></div>
      <div class="small-10 large-10 columns">                                                                     
        <div class="reg-name">Регистрация</div>                           
      </div>
      <div class="small-0 large-1 columns"></div>
    </div>
    <!-- Конец надписи-->


    <!-- Форма регистрации -->
      <?php 
    if (isset($_POST['reg'])) {
       require_once 'save_user.php'; 
    }?>
  <form action="" method="post">
    <div class="grid-x link-block">
      <div class="small-0 large-1 columns"></div>
      <div class="small-10 large-10 columns">
        <div class="registration-block-line"><input class="registration-plchldr"  pattern="[A-Za-zА-Яа-яЁё]{1,50}" title="Только латинские/русские заглавные/строчные буквы" name="name" type="text" placeholder="Имя"></div>
        <div class="registration-block-line"><input class="registration-plchldr"  title="Только латинские/русские заглавные/строчные буквы" pattern="[A-Za-zА-Яа-яЁё]{1,50}" name="surname" type="text" placeholder="Фамилия"></div>
        <div class="registration-block-line"><input class="registration-plchldr" title="Только латинские/русские заглавные/строчные буквы" pattern="[A-Za-zА-Яа-яЁё]{1,50}" name="patronymic" type="text" placeholder="Отчество"></div>
        <div class="registration-block-line"><input class="registration-plchldr" title="Формат: Б0000x - Одна русская буква, далее 4 цифры и опционально строчная русская буква" type="text" pattern="[А-Яа-яЁё]{1}[0-9]{4}[a-яё]{0,1}" name="universityGroup" type="text" placeholder="Номер группы Б0000х"></div>
        <div class="registration-block-line"><input class="registration-plchldr" type="text" pattern="[0-9]{4}[\-][0-9]{4}" name="record_book_number" type="text" title="Формат 0000-0000 — 4 цифры - дефис - 4 цифры" placeholder="Номер зачетной книжки XXXX-XXXX"></div>
        <div class="line-stroke"></div><br>
        <div class="registration-block-line"><input class="registration-plchldr" type="text" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" name="password" title="Пароль должен содержать заглавные и строчные буквы, а так же цифры" type="text" placeholder="Пароль (заглавные/строчные/цифры)"></div>
        <div class="registration-block-line"><input class="registration-plchldr" type="text" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Пароль должен содержать заглавные и строчные буквы, а так же цифры" name="password1" type="text" placeholder="Повтор пароля"></div>
        <div class="registration-block-line"><input class="registration-plchldr" type="email" name="email" placeholder="Электронная почта"></div>
        <div class="registration-block-line"><input class="registration-plchldr" title="Формат: знак плюса + 11 цифр" pattern="[\+]\d{11}$" name="telephone" type="text" placeholder="Номер телефона (+79999999999)"></div>
        <!-- <div class="registration-block-line"><input type="checkbox" name="your-group" value="unit-in-group">&emsp;&emsp;   Запомнить меня</div>-->
        <div class="authorization-block-inside">
              <input name="reg" type="submit" class="registration-btn"  value="Подтвердить">
            </div>
      </div>
      <div class="small-0 large-1 columns"></div>
    </div>
  </form>
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