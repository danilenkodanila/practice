<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
  <head>


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
            <a href="#" id="goTwo" class="link"><?php echo $_SESSION['email']; ?></a>
		    <a href="exit.php" id="go" class="link">Выйти из системы</a>
          </div>
        </div>
      </div>