<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<!--<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>-->

      <div class="grid-x header-2">
        <div class="small-2 small-offset-1 medium-2 medium-offset-1 large-2 large-offset-1 cell vacancies">
          <a href="/listVacancies.php" class="bt-1">Вакансии</a>
        </div>
        <div class="small-2 small-offset-1 medium-2 medium-offset-0 large-2 large-offset-0 cell employers">
          <a href="/employers-list.php" class="bt-2">Работодатели</a>
        </div>
        <div class="small-2 small-offset-3 medium-3 medium-offset-3 large-3 large-offset-3 cell logo">
          <div class="lk">
            <img src="image/lk-logo.png" class="lk-logo-Two">
            <a href="#" id="goTwo" class="link link-lk">Войти в систему</a>
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
	  
	  
