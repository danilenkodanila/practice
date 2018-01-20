<?php
session_start(); 
?>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Практикант ДВФУ - Личный кабинет</title>
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
      include ("header.php");
      include ("bd_PDO.php");


      if (empty($_SESSION['category'])){
        HTTP403main("/listVacancies.php","Перейти на страницу с вакансиями");
      } else if ($_SESSION['category']==2) {
        $id_user=$_SESSION['id'];
        echo ' <!-- Надпись-->
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
                        <li class="tabs-title is-active">
                          <a class="tabs-a" href="#panel1c" aria-selected="true">Персональные данные</a>
                        </li>
                      </div>
                      <div class="small-10 small-offset-2 large-4 medium-3 medium-offset-2 large-offset-1 cell">
                        <li class="tabs-title tabs">
                          <a class="tabs-a" href="#panel2c">Информация по вакансиям</a>
                        </li>
                      </div>
                    </div>
                  </ul>
                  <div class="line-stroke"></div>
                  <div class="tabs-content" data-tabs-content="collapsing-tabs">
                    <div class="tabs-panel is-active" id="panel1c">
                    <div class="block-dan">';

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
        } 

        if( isset( $_POST['disaccept'] ) ){ 
          $sql = ("UPDATE `notification` SET `status`=2 WHERE id_vacancy=? AND id_user=?");
          $id = $_POST["id"];
          $idUs = $_POST["id1"];
          $result = executeRequest($pdo,$sql,[$id,$idUs]);
          exit("<html><head><meta http-equiv='Refresh' content='0; URL=employers-account.php'></head></html>");
        } 

        $stmt = $pdo->prepare("SELECT name_company,address,inn FROM employers_data WHERE id_user=?");
        $stmt->execute(array($id_user));
        $name = $stmt->fetchAll();

        echo 'Компания: ',$name[0]["name_company"],'
              <br>
              Адрес: ',$name[0]["address"],'
              <br>
              ИНН орнанизации: ',$name[0]["inn"],'';

        $stmt = $pdo->prepare("SELECT telephone, email FROM user WHERE id=?");
        $stmt->execute(array($id_user));
        $name = $stmt->fetchAll();



        echo '<br>
              <br>
              Номер телефона: ',$name[0]["telephone"],'
              <form action="lkChange.php" style="display: inline;" method="post">
                <button type="submit">
                  <image class="edt-icon" src="image/edit-icon.png">
                </button>
                <input type="hidden" name="action" value="phone">
              </form>
              <br>
              Электронная почта: ',$name[0]["email"],'
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
          </div>';

          echo' <div class="tabs-panel" id="panel2c">';

          $stmt = $pdo->prepare("SELECT * FROM employers_data WHERE id_user=?");
          $stmt->execute(array($_SESSION['id']));
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $row = $stmt->fetch();

          $stmt = $pdo->prepare("SELECT * FROM vacancies WHERE id_employers=?");
          $stmt->execute(array($row['id']));
          $stmt->setFetchMode(PDO::FETCH_ASSOC);

          while($row1 = $stmt->fetch()) {
            $stmt2 = $pdo->prepare("SELECT * FROM notification WHERE id_vacancy=?");
            $stmt2->execute(array($row1['id']));
            $stmt2->setFetchMode(PDO::FETCH_ASSOC);
            $row2 = $stmt2->fetchAll();
            // <div class="line-solid">Вакансия: '.$row1["title"].'</div><br>
            if (!empty($row2)) {
              echo '<div class="grid-x">
                      <div class="small-4 medium-8 large-12 cell">
                        <table class="fnt tbl">
                          <thead>
                            <tr>
                              <th width="500">'.$row1["title"].'</th>
                              <th width="300">Статус</th>
                            </tr>
                          </thead>
                        <tbody>';  
            foreach ($row2 as $row => $row2) {
              $stmt3 = $pdo->prepare("SELECT * FROM student_data WHERE id_user=?");
              $stmt3->execute(array($row2['id_user']));
              $stmt3->setFetchMode(PDO::FETCH_ASSOC);
              $row3 = $stmt3->fetch();
              echo('<tr>
                    <td>
                    <form action="/student-info.php" method="POST">

                      <input class="input-button" type="submit" name="accept" value="'.$row3["name"].' '.$row3["surname"].'" />
                      <input type="hidden" name="id" value="'.$row3["id_user"].'"/>
                      <input type="hidden" name="universityGroup" value="'.$row3["universityGroup"].'"/>
                      <input type="hidden" name="record_book_number" value="'.$row3["record_book_number"].'"/>
                      <input type="hidden" name="name" value="'.$row3["name"].'"/>
                      <input type="hidden" name="surname" value="'.$row3["surname"].'"/>
                      <input type="hidden" name="patronymic" value="'.$row3["patronymic"].'"/>
                    </form>
                    </td>');
              switch ($row2["status"]) {
              case 0:
                echo('<td>Рассматривается</td>
                      <td class="delete-border">
                        <div style="overflow: hidden; float: left;">
                          <form action="/employers-account.php" method="POST">
                            <input class="input-button" type="submit" name="accept" value="Одобрить" />
                            <input type="hidden" name="id" value="'.$row2["id_vacancy"].'" />
                            <input type="hidden" name="id1" value="'.$row3["id_user"].'" />
                          </form>
                        </div>
                        <div style="float: right;">
                          <form action="/employers-account.php" method="POST">
                            <input class="input-button" type="submit" name="disaccept" value="Отказать" />
                            <input type="hidden" name="id" value="'.$row2["id_vacancy"].'" />
                            <input type="hidden" name="id1" value="'.$row3["id_user"].'" />
                          </form>
                        </div>
                      </td>');
                break;
                case 1:
                echo('<td>Принят</td>
                      <td class="delete-border">
                      </td>');
                break;
                case 2:
                  echo('<td>Отказано</td>
                        <td class="delete-border">
                          <form action="/employers-account.php" method="POST">
                            <input class="input-button" type="submit" name="delete" value="Удалить" />
                            <input type="hidden" name="id" value="'.$row2["id_vacancy"].'" />
                            <input type="hidden" name="id1" value="'.$row3["id_user"].'" />
                          </form>
                        </td>');
                  break;
                  case 3:
                  echo('<td>Согласован</td>
                        <td class="delete-border">
                          <form action="/employers-account.php" method="POST">
                            <input class="input-button" type="submit" name="disaccept" value="Отказать" />
                            <input type="hidden" name="id" value="'.$row2["id_vacancy"].'" />
                            <input type="hidden" name="id1" value="'.$row3["id_user"].'" />
                          </form>
                        </td>');
                  break;
                }
              }
            }
          } 
          echo '</tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="small-0 large-1 columns"></div>
          </div>
          <!-- Конец-->';



      } else {
        HTTP403main("/listVacancies.php","Перейти на страницу с вакансиями");
      }
      
      include_once("footer.php");
      echoFooter();
    ?>


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
