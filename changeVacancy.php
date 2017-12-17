<!doctype html>
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
  
      <!-- header -->
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
      <!-- Конец header`а -->

      <div class="grid-x" style="min-height: 500px; padding-top:20px; padding-bottom: 20px;">
        <div class="small-10 medium-offset-1 medium-10 medium-offset-1 large-10 large-offset-1 cell">
          <div class="registration-block-line"><input class="registration-plchldr" value="Заголовок вакансии" type="text" placeholder="Заголовок"></div>
          <div class="registration-block-line"><input class="registration-plchldr" value="22-05-18" type="text" placeholder="Дата начала"></div>
          <div class="registration-block-line"><input class="registration-plchldr" value="04-06-18" type="text" placeholder="Дата окончания"></div>
          <div class="registration-block-line"><textarea class="registration-plchldr" placeholder="Описание">Ищем талантливого программиста в нашу дружную команду. Ты будешь заниматься поддержкой системы баннерной рекламы и доработкой нового функционала, а еще разработкой и поддержкой системы ремаркетинга.</textarea></div>
          <div class="registration-block-line"><input class="registration-plchldr" value="Б8419а" type="text" placeholder="Для студентов группы"></div>
          <div class="registration-block-line"><input class="registration-plchldr" value="Дальзавод" type="text" placeholder="Место проведения"></div>
          <div style="text-align: center;"><input type="button" class="registration-btn" value="Изменить"></div>
        </div>
      </div>



    <!-- footer -->               
    <?php
      include_once("footer.php");
      echoFooter();
    ?>
    <!-- Конец footer`а --> 

    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
