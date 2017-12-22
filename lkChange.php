<?php
      session_start();
    ?>
    <html class="no-js" lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Практикант ДВФУ - Добавление новой вакансии</title>
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

  //выводит 403 ошибку — досуп запрещен
  function HTTP403(){
    printValue("<br>У вас нет прав для просмотра этой страницы :с");
    echo'<br><div class="grid-x">
             <div style="text-align: center;" class="small-6 small-offset-3 medium-6 medium-offset-3 large-6 large-offset-3 cell"><img src="image/403.png"></div>
             <div style="text-align: center; padding-top:20px;" class="small-6 small-offset-3 medium-6 medium-offset-3 large-6 large-offset-3 cell"><a href="/listVacancies.php" class="bt-1" style="color: blue;" ">Перейти на страницу с вакансиями</a></div>
             </div><br><br>';
  }

  //выводит информация после обновления вакансии
  function refresh(){
    echo'<br><div class="grid-x">
             <div style="text-align: center;" class="small-6 small-offset-3 medium-6 medium-offset-3 large-6 large-offset-3 cell"><img src="image/done.png"></div>
             <div style="text-align: center; padding-top:20px;" class="small-6 small-offset-3 medium-6 medium-offset-3 large-6 large-offset-3 cell"><a href="';
      if ($_SESSION['category']==1) {
        echo "/student-account.php";
      }
      if ($_SESSION['category']==2) {
        echo "/employers-account.php";
      }
      echo'" class="bt-1" style="color: blue;" ">Перейти в личный кабинет</a></div>
             </div><br><br>';
  }
  //добавляет форму
  function addedForm($placeholder,$name){
    echo '<form action="lkChange.php" method="post">
      <div class="grid-x" style="min-height: 500px; padding-top:20px; padding-bottom: 20px;">
        <div class="small-10 medium-offset-1 medium-10 medium-offset-1 large-10 large-offset-1 cell">
          <div class="registration-block-line"><input class="registration-plchldr" value="" name="',$name,'" type="text" ';
    //юзаем паттерны, если телефон и почта
    if ($name == "telephone") {
      echo 'pattern="[\+]\d{11}$"';
    }
    if ($name == "email") {
      echo 'pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"';
    }
    echo 'placeholder="',$placeholder,'" required ></div>
          <div style="text-align: center;"><input type="submit" class="registration-btn" value="Изменить"></div>
          <input type="hidden" name="action" value="change">
          <input type="hidden" name="update" value="',$name,'">
        </div>
      </div>
    </form>';
  }

//проверяем доступ
if (empty($_SESSION['category'])){
  HTTP403();
} else if ( ($_SESSION['category']==1) || ($_SESSION['category']==2) ) {
  //проверяем на пустой пост
  if (empty($_POST)){
    printValue("Что-то пошло не так");
  } else {
    //проверяем что нужно вывести — формы или отправить пост с изменениями
    if ($_POST['action'] == 'phone') {
      addedForm("Телефон","telephone");
    }
    if ($_POST['action'] == 'password') {
      addedForm("Пароль","password");
    }
    if ($_POST['action'] == 'email') {
      addedForm("Почта","email");
    }
    if ($_POST['action'] == 'change') {
      $update = $_POST['update'];
      $value = $_POST[$update];
      $id = $_SESSION['id'];
      if ($update == "telephone") {$sql = "UPDATE user SET telephone='$value' WHERE id='$id'";}
      if ($update == "password") {$value = md5($value); $sql = "UPDATE user SET password='$value' WHERE id='$id'";}
      if ($update == "email") {$_SESSION['email']=$value;$sql = "UPDATE user SET email='$value' WHERE id='$id'";}
      queryRequest($pdo, $sql);
      printValue("<br>Данные успешно обновлены");
      refresh();
    }
  }
} else {
  HTTP403();
}


    // var_dump($_SESSION['id']);
    ?>


    <!-- footer -->               
    <?php
      include_once("footer.php");
      echoFooter();
    ?>
    <!-- Конец footer`а --> 

 <script type="text/javascript">



      $(document).ready(function() { // вся мaгия пoсле зaгрузки стрaницы
        $('a#go').click( function(event){ // лoвим клик пo ссылки с id="go"
          event.preventDefault(); // выключaем стaндaртную рoль элементa
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

