<!doctype html>
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
  
      <!-- header -->
      <div class="grid-x header">
        <div class="small-8 small-offset-1 medium-6 large-6 cell site-name">Практикант ДВФУ</div>
        <div class="small-2 small-offset-1  medium-2 medium-offset-3 large-2 large-offset-3 cell logo">
          <img src="image/fefu-logo.png" class="fefu-logo">
        </div>
      </div>
      <div class="grid-x header-2">
        <div class="small-3 small-offset-1 medium-2 medium-offset-1 large-2 large-offset-1 cell vacancies">
          <a href="/listVacancies.php" class="bt-2">Вакансии</a>
        </div>
        <div class="small-3 small-offset-0 medium-2 medium-offset-0 large-2 large-offset-0 cell employers">
          <a href="/employers-list.php" class="bt-2">Работодатели</a>
        </div>
        <div class="small-3 small-offset-1 medium-2 medium-offset-0 large-2 large-offset-0 cell employers
          "><a href="#" class="bt-1">Приказы</a>
        </div>
        <div class="small-6 small-offset-2 medium-3 medium-offset-1 large-2 large-offset-2 cell logo">
          <div class="lk">
            <img src="image/lk-logo.png" class="lk-logo">
            <a href="#" id="goTwo" class="link">Личный кабинет</a>
          </div>
        </div>
      </div>
      <!-- Конец header`а -->

      

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
            <tr>
              <td>ФИО 1 студента</td>
              <td>Вакансия 1</td>
              <td>Предприятие 1</td>
              <td>1.06.17 - 15.06.17</td>
            </tr>
            <tr>
              <td>ФИО 2 студента</td>
              <td>Вакансия не выбрана</td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td>ФИО 3 студента</td>
              <td>Вакансия 2</td>
              <td>Предприятие 2</td>
              <td>1.06.17 - 15.06.17</td>
            </tr>
            <tr>
              <td>ФИО 4 студента</td>
              <td>Вакансия 3</td>
              <td>Предприятие 1</td>
              <td>1.06.17 - 15.06.17</td>
            </tr>
            <tr>
              <td>ФИО 5 студента</td>
              <td>Вакансия 4</td>
              <td>Предприятие 3</td>
              <td>1.06.17 - 15.06.17</td>
            </tr>
            <tr>
              <td>ФИО 6 студента</td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td>ФИО 7 студента</td>
              <td>Вакансия не выбрана</td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td>ФИО 8 студента</td>
              <td>Вакансия 5</td>
              <td>Предприятие 2</td>
              <td>1.06.17 - 15.06.17</td>
            </tr>
            <tr>
              <td>ФИО 9 студента</td>
              <td>Вакансия 6</td>
              <td>Предприятие 6</td>
              <td>1.06.17 - 15.06.17</td>
            </tr>
            <tr>
              <td>ФИО 9 студента</td>
              <td>Вакансия не выбрана</td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="small-0 large-1 columns"></div>
    </div>
    <!-- Конец блока со ссылками -->




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
