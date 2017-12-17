<?php
session_start();
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
      <div class="grid-x header">
        <div class="small-8 small-offset-1 medium-6 large-6 cell site-name">Практикант ДВФУ</div>
        <div class="small-2 small-offset-1  medium-2 medium-offset-3 large-2 large-offset-3 cell logo">
          <img src="image/fefu-logo.png" class="fefu-logo">
        </div>
      </div>
      <div class="grid-x header-2">
        <div class="small-2 small-offset-1 medium-2 medium-offset-1 large-2 large-offset-1 cell vacancies">
          <a href="/BPlistVacancies.php" class="bt-1">Вакансии</a>
        </div>
        <div class="small-2 small-offset-1 medium-2 medium-offset-0 large-2 large-offset-0 cell employers">
          <a href="/employers-list.php" class="bt-2">Работодатели</a>
        </div>
        <div class="small-2 small-offset-3 medium-3 medium-offset-3 large-3 large-offset-3 cell logo">
          <div class="lk">
            <img src="image/lk-logo.png" class="lk-logo">
            <a href="#" class="link">farpost</a>
          </div>
        </div>
      </div>

    
     <div class="grid-x search-row">
      <div class="small-10 small-offset-1 medium-10 medium-offset-1 large-10 large-offset-1 cell">
        <input class="search-icon" type="text" placeholder="Поиск">
      </div>
    </div>



    <div class="grid-x">
      <div class="small-10 small-offset-1 medium-10 medium-offset-1 large-10 large-offset-1 cell">
        <a href="/addingNewVacancy.php"><input type="button" class="btnAdd" value="   Добавить вакансию"></a>


      </div>
    </div>

<div id="modal_form">
      <div class="grid-x block">
      <div class="small-1 large-1 columns"></div>
      <div class="small-10 large-10 columns bd-pop">

        <div class="grid-x block-line">
          <div class="small-1 large-1 columns"></div>
          <div class="small-10 large-10 columns">
            <div class="bold text-left">Заголовок</div>
            <div class="bold text-right">Работодатель</div>
          </div>
          <div class="small-1 large-1 columns"></div>
        </div>

        <div class="grid-x block-line">
          <div class="small-1 large-1 columns"></div>
          <div class="small-10 large-10 columns">
            &emsp;&emsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non metus a quam dapibus ullamcorper non consequat ex. Aenean porta iaculis dui, et vestibulum magna ultricies a. Nulla id semper libero. In quis est non tellus pharetra imperdiet nec et risus. Nunc pretium auctor mi vitae fringilla. Proin porttitor faucibus justo, ac convallis purus euismod vitae. Donec non ipsum arcu. Proin consequat tortor nunc, sit amet viverra velit accumsan eu.
            <br>&emsp;&emsp;Vivamus consectetur sapien at malesuada semper. Suspendisse potenti. Cras in scelerisque velit. Aliquam dignissim, justo nec maximus facilisis, arcu neque fermentum mi, consequat ultricies justo nulla sed enim. Ut in magna eget turpis maximus rhoncus. Vivamus aliquet et metus at sollicitudin. Phasellus id suscipit magna.
          </div>
          <div class="small-1 large-1 columns"></div>
        </div>

        <div class="grid-x block-line">
          <div class="small-1 large-1 columns"></div>
          <div class="small-10 large-10 columns">
            <div class="bold">Ориентировано на:</div> студентов группы ...
          </div>
          <div class="small-1 large-1 columns"></div>
        </div>

        <div class="grid-x block-line">
          <div class="small-1 large-1 columns"></div>
          <div class="small-10 large-10 columns">
            <div class="bold">Дата проведения:</div> с ... по ... 
          </div>
          <div class="small-1 large-1 columns"></div>
        </div>

        <div class="grid-x block-line">
          <div class="small-1 large-1 columns"></div>
          <div class="small-10 large-10 columns">
            <div class="bold">Место проведения:</div> ул. ..., ООО ....
          </div>
          <div class="small-1 large-1 columns"></div>
        </div>

        <div class="grid-x block-line">
          <div class="small-1 large-1 columns"></div>
          <div class="small-10 large-10 columns">
            <div class="bold text-right">Дата добавления</div>
          </div>
          <div class="small-1 large-1 columns"></div>
        </div>

      </div>

      <div class="formbt">
        <a href="/addingNewVacancy.php"><input type="button" class="btnVcntPict" value="   Редактировать"></a>
      </div>

      <div class="small-1 large-1 columns"></div>
    </div>
      </div>
      <div id="overlay">sadas</div><!-- Пoдлoжкa -->

<a href="#" id="go" class="block-a">
    <div class="grid-x block">
      <div class="small-1 large-1 columns"></div>
      <div class="small-10 large-10 columns bd">

        <div class="grid-x block-line">
          <div class="small-1 large-1 columns"></div>
          <div class="small-10 large-10 columns">
            <div class="bold text-left">Заголовок</div>
            <div class="bold text-right">Работодатель</div>
          </div>
          <div class="small-1 large-1 columns"></div>
        </div>

        <div class="grid-x block-line">
          <div class="small-1 large-1 columns"></div>
          <div class="small-10 large-10 columns">
            &emsp;&emsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam non metus a quam dapibus ullamcorper non consequat ex. Aenean porta iaculis dui, et vestibulum magna ultricies a. Nulla id semper libero. In quis est non tellus pharetra imperdiet nec et risus. Nunc pretium auctor mi vitae fringilla. Proin porttitor faucibus justo, ac convallis purus euismod vitae. Donec non ipsum arcu. Proin consequat tortor nunc, sit amet viverra velit accumsan eu.
            <br>&emsp;&emsp;Vivamus consectetur sapien at malesuada semper. Suspendisse potenti. Cras in scelerisque velit. Aliquam dignissim, justo nec maximus facilisis, arcu neque fermentum mi, consequat ultricies justo nulla sed enim. Ut in magna eget turpis maximus rhoncus. Vivamus aliquet et metus at sollicitudin. Phasellus id suscipit magna.
          </div>
          <div class="small-1 large-1 columns"></div>
        </div>

        <div class="grid-x block-line">
          <div class="small-1 large-1 columns"></div>
          <div class="small-10 large-10 columns">
            <div class="bold">Ориентировано на:</div> студентов группы ...
          </div>
          <div class="small-1 large-1 columns"></div>
        </div>

        <div class="grid-x block-line">
          <div class="small-1 large-1 columns"></div>
          <div class="small-10 large-10 columns">
            <div class="bold">Дата проведения:</div> с ... по ... 
          </div>
          <div class="small-1 large-1 columns"></div>
        </div>

        <div class="grid-x block-line">
          <div class="small-1 large-1 columns"></div>
          <div class="small-10 large-10 columns">
            <div class="bold">Место проведения:</div> ул. ..., ООО ....
          </div>
          <div class="small-1 large-1 columns"></div>
        </div>

        <div class="grid-x block-line">
          <div class="small-1 large-1 columns"></div>
          <div class="small-10 large-10 columns">
            <div class="bold text-right">Дата добавления</div>
          </div>
          <div class="small-1 large-1 columns"></div>
        </div>

      </div>
      <div class="small-1 large-1 columns"></div>
    </div>

  </a>
    
    <div class="grid-x block">
      <div class="small-1 large-1 columns"></div>
      <div class="small-10 large-10 columns bd">

        <div class="grid-x block-line">
          <div class="small-1 large-1 columns"></div>
          <div class="small-10 large-10 columns">
            <div class="bold text-left">Заголовок</div>
            <div class="bold text-right">Работодатель</div>
          </div>
          <div class="small-1 large-1 columns"></div>
        </div>

        <div class="grid-x block-line">
          <div class="small-1 large-1 columns"></div>
          <div class="small-10 large-10 columns">
            &emsp;&emsp;А тут короткое описание
          </div>
          <div class="small-1 large-1 columns"></div>
        </div>

        <div class="grid-x block-line">
          <div class="small-1 large-1 columns"></div>
          <div class="small-10 large-10 columns">
            <div class="bold">Ориентировано на:</div> студентов группы ...
          </div>
          <div class="small-1 large-1 columns"></div>
        </div>

        <div class="grid-x block-line">
          <div class="small-1 large-1 columns"></div>
          <div class="small-10 large-10 columns">
            <div class="bold">Дата проведения:</div> с ... по ... 
          </div>
          <div class="small-1 large-1 columns"></div>
        </div>

        <div class="grid-x block-line">
          <div class="small-1 large-1 columns"></div>
          <div class="small-10 large-10 columns">
            <div class="bold">Место проведения:</div> ул. ..., ООО ....
          </div>
          <div class="small-1 large-1 columns"></div>
        </div>

        <div class="grid-x block-line">
          <div class="small-1 large-1 columns"></div>
          <div class="small-10 large-10 columns">
            <div class="bold text-right">Дата добавления</div>
          </div>
          <div class="small-1 large-1 columns"></div>
        </div>

      </div>
      <div class="small-1 large-1 columns"></div>
    </div>

                   
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
    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
