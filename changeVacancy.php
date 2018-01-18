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

  function HTTP403(){
    printValue("<br>У вас нет прав для просмотра этой страницы :с");
    echo'<br><div class="grid-x">
             <div style="text-align: center;" class="small-6 small-offset-3 medium-6 medium-offset-3 large-6 large-offset-3 cell"><img src="image/403.png"></div>
             <div style="text-align: center; padding-top:20px;" class="small-6 small-offset-3 medium-6 medium-offset-3 large-6 large-offset-3 cell"><a href="/listVacancies.php" class="bt-1" style="color: blue;" ">Перейти на страницу с вакансиями</a></div>
             </div><br><br>';
  }
  function addedForm($title,$dateStart,$dateFinish,$description,$studentsfor,$place,$idVacancies){
    echo '<form action="changeVacancy.php" method="post">
      <div class="grid-x" style="min-height: 500px; padding-top:20px; padding-bottom: 20px;">
        <div class="small-10 medium-offset-1 medium-10 medium-offset-1 large-10 large-offset-1 cell">
          <div class="registration-block-line"><input class="registration-plchldr" value="',$title,'" name="title" type="text" placeholder="Заголовок" required ></div>
          <div class="registration-block-line"><input class="registration-plchldr" value="',$dateStart,'" name="dateStart" type="text" placeholder="Дата начала" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" required></div>
          <div class="registration-block-line"><input class="registration-plchldr" value="',$dateFinish,'" name="dateFinish" type="text" placeholder="Дата окончания" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" required></div>
          <div class="registration-block-line"><textarea class="registration-plchldr" name="description" placeholder="Описание" required >',$description,'</textarea></div>
          <div class="registration-block-line"><input class="registration-plchldr" value="',$studentsfor,'" name="studentsfor" type="text" placeholder="Для студентов группы" required ></div>
          <div class="registration-block-line"><input class="registration-plchldr" value="',$place,'" name="place" type="text" placeholder="Место проведения" required ></div>
          <div style="text-align: center;"><input type="submit" class="registration-btn" value="Изменить"></div>
          <input type="hidden" name="idVacancies" value="',$idVacancies,'" />
        </div>
      </div>
    </form>';
  }

$idVacancies = 1;
if (!empty($_POST['action'])) {
      $idVacancies = $_POST['id'];
}
if (empty($_SESSION['category'])){
  HTTP403();
} else if ($_SESSION['category']==2) {
  //если post пустой, то выводим форму
  if (empty($_POST)){
    $sql = "SELECT * FROM vacancies WHERE id=?";
    $result = executeRequest($pdo,$sql,[$idVacancies]);
    addedForm($result[0]["title"],$result[0]["dateStart"],$result[0]["dateFinish"],$result[0]["description"],$result[0]["studentsfor"],$result[0]["place"],$idVacancies);
  //если пост не пустой, то то разбираем его выводим сообщение
  } else {
    if (!empty($_POST['action'])) {
      $sql = "SELECT * FROM vacancies WHERE id=?";
      $result = executeRequest($pdo,$sql,[$idVacancies]);
      addedForm($result[0]["title"],$result[0]["dateStart"],$result[0]["dateFinish"],$result[0]["description"],$result[0]["studentsfor"],$result[0]["place"],$idVacancies);
    } else {
      if ($_POST['title'] <> "" && $_POST['dateStart'] <> "" && $_POST['dateFinish'] <> "" && $_POST['description'] <> "" && $_POST['studentsfor'] <> "" && $_POST['place'] <> "") {
        $date = date('Y-m-d', time());
        $title = $_POST['title'];
        $dateStart = $_POST['dateStart'];
        $dateFinish = $_POST['dateFinish'];
        $description = $_POST['description'];
        $studentsfor = $_POST['studentsfor'];
        $place = $_POST['place'];
        $idUser = $_SESSION['id'];
        $idVacancies = $_POST['idVacancies'];
        $idEmployers = queryRequest($pdo, "SELECT `id` FROM `employers_data` WHERE `id_user` = '$idUser'");
        $idEmployers = $idEmployers[0]["id"];

        $sql = "UPDATE vacancies SET title='$title', dateStart='$dateStart', dateFinish='$dateFinish', description='$description', studentsfor='$studentsfor', place='$place' WHERE id='$idVacancies'";
        
        queryRequest($pdo, $sql);

        printValue("<br>Вакансия успешно изменена!");
        echo'<br><div class="grid-x">
               <div style="text-align: center;" class="small-6 small-offset-3 medium-6 medium-offset-3 large-6 large-offset-3 cell"><img src="image/done.png"></div>
               <div style="text-align: center; padding-top:20px;" class="small-6 small-offset-3 medium-6 medium-offset-3 large-6 large-offset-3 cell"><a href="/BPlistVacancies.php" class="bt-1" style="color: blue;" ">Перейти на страницу с вакансиями</a></div>
               </div><br><br>';

      } else {
        printValue("Введите данные во все поля");
        addedForm($_POST['title'],$_POST['dateStart'],$_POST['dateFinish'],$_POST['description'],$_POST['studentsfor'],$_POST['place']);
      }
    }
  }
} else {
  HTTP403();
}
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
