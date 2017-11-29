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
        <div class="small-3 medium-4 large-4 columns site-name">Практикант ДВФУ</div>
        <div class="small-2 medium-2 large-4 columns"></div>
        <div class="small-3 medium-4 large-4 columns logo">
          <img src="image/fefu-logo.png" class="fefu-logo">
        </div>
      </div>
      <div class="grid-x header-2">
        <div class="small-1 large-2 columns vacancies">
          <a href="/listVacancies.php" class="bt-2">Вакансии</a>
        </div>
        <div class="small-1 large-2 columns employers">
          <a href="/employers-list.php" class="bt-2">Работодатели</a>
        </div>
        <div class="small-1 large-2 columns employers">
          <!-- <a href="#" class="bt-2">Приказы</a> -->
        </div>
        <div class="small-2 large-2 columns"></div>
        <div class="small-1 large-3 columns logo">
          <div class="lk">
            <img src="image/lk-logo.png" class="lk-logo">
            <a href="#" id="goTwo" class="link">International Brutal Marines</a>
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
    
    <!-- Надпись-->
     <div class="grid-x search-row">
      <div class="small-0 large-1 columns"></div>
      <div class="small-10 large-10 columns">                                                                     
        Личный кабинет                   
      </div>
      <div class="small-0 large-1 columns"></div>
    </div>
    <!-- Конец надписи-->


    <!-- Форма регистрации -->
    <div class="grid-x link-block">
      <div class="small-0 large-1 columns"></div>
      <div class="small-10 large-10 columns">
        
        <div class="line-stroke"></div>
         <ul class="tabs" data-active-collapse="true" data-tabs id="collapsing-tabs">
          <div class="tabs-left"><li class="tabs-title is-active"><a href="#panel1c" aria-selected="true">Персональные данные</a></li></div>
          <div class="tabs-right"><li class="tabs-title tabs"><a href="#panel2c">Информация по вакансиям</a></li></div>
        </ul>
        <div class="line-stroke"></div>

        <div class="tabs-content" data-tabs-content="collapsing-tabs">

          <div class="tabs-panel is-active" id="panel1c">
            <div class="block-dan">
              International Brutal Marines
              <br>
              Адрес: .......
              <br>
              ИНН орнанизации: ......
              <br>
              <br>
              Номер телефона: 8 999 999 99 99  <input class="edt-icon"type="image" src="image/edit-icon.png" />
              <br>
              Электронная почта: mail@mail.ru  <input class="edt-icon"type="image" src="image/edit-icon.png" />
              <br>
              <br>
              <a href="#" class="authorization-rgstrtn">Сменить пароль</a>
            </div>
          </div>

          <div class="tabs-panel" id="panel2c">
          <div class="line-solid">Вакансия 1</div><br>
          <table class="fnt tbl">
          <thead>
            <tr>
              <th width="400">Отозвавшиеся студенты</th>
              <th width="200">Статус</th>
              <th width="100"></th>
              <th width="100"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Студент 1</td>
              <td>Отказано</td>
              <td width="100"><a href="#" class="link-table">Одобрить</a></td>
              <td width="100"><a href="#" class="link-table">Отказать</a></td>
            </tr>
            <tr>
              <td>Студент 2</td>
              <td>Одобрено</td>
              <td width="100"><a href="#" class="link-table">Удалить</a></td>
              <td></td>
            </tr>
            <tr>
              <td>Студент 3</td>
              <td>Согласовано</td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
          </div>
        </div>
        
      </div>
      <div class="small-0 large-1 columns"></div>
    </div>
     <!-- Конец-->

    

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
