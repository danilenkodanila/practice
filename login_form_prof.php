<link rel="stylesheet" type="text/css" href="style.css" media="screen" />

	  
	        <div class="grid-x header-2">
        <div class="small-2 small-offset-1 medium-2 medium-offset-1 large-2 large-offset-1 cell vacancies">
          <a href="BPlistVacancies.php" class="bt-2">Вакансии</a>
        </div>
        <div class="small-2 small-offset-1 medium-2 medium-offset-0 large-2 large-offset-0 cell employers">
          <a href="employers-list.php" class="bt-2">Работодатели</a>
        </div>
        <div class="small-2 small-offset-3 medium-3 medium-offset-3 large-3 large-offset-3 cell logo">
          <div class="lk">
            <img src="image/lk-logo.png" class="lk-logo-Two">
            <a href="employers-account.php"  class="link"><?php echo $_SESSION['email']; ?></a>
		    <a href="exit.php"  class="link">Выйти из системы</a>
          </div>
        </div>
      </div>