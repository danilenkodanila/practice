<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<!--<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>-->

<div class="grid-x header-2">
        <div class="small-1 large-2 columns vacancies">
          <a href="/listVacancies.php" class="bt-2">Вакансии</a>
        </div>
        <div class="small-1 large-2 columns employers">
          <a href="/employers-list.php" class="bt-1">Работодатели</a>
        </div>
        <div class="small-0 large-2 columns"></div>
        <div class="small-1 large-3 columns logo">
          <div class="lk">
            <img src="image/lk-logo.png" class="lk-logo">
		    <a href="#" id="goTwo" class="link">Войти в систему</a>
          </div>
        </div>
      </div>
	  
	   <!-- Форма авторизации -->
<?php
   if (isset($_POST['sub'])) {
       require_once 'testreg.php'; 
   }?>
	   <form action="" method="post" >
      <div id="modal_formTwo">
        <div class="grid-x search-row">
          <div class="small-0 large-1 columns"></div>
          <div class="small-10 large-10 columns">
            <div class="bold text-left">Авторизация</div>
            <input class="authorization-plchldr" type="text" name="email" placeholder="Mail">
            <input class="authorization-plchldr" type="text" name="password" placeholder="Пароль">
          </div>
          <div class="small-0 large-1 columns"></div>
        </div>
        <div class="grid-x search-row">
          <div class="small-0 large-1 columns"></div>
          <div class="small-10 large-10 columns">
            <div class="authorization-block-inside">
              <input type="submit" name="sub" class="authorization-btn" value="Войти">
            </div>
          </div>
          <div class="small-0 large-1 columns"></div>
        </div>
      </div>
      <div id="overlayTwo"></div>
	  </form>
      <!-- Конец формы авторизации -->
	  
	  
