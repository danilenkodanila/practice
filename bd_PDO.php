
<?php

		$user = "admin";
		$pass = "76543210";
		try {
			$pdo = new PDO('mysql:host=localhost;dbname=practice;charset=utf8', $user, $pass);
		} catch (PDOException $e) {
			die('Подключение не удалось: ' . $e->getMessage());
		}
		// $pdo = new PDO($dsn, 'admin', '76543210', $opt);

		function printValue($outputText){
	    	echo'<div class="grid-x">
	         	 <div style="text-align: center;" class="small-6 small-offset-3 medium-6 medium-offset-3 large-6 large-offset-3 cell">',$outputText,'</div>
	         	 </div>';
  		}
	
		function queryRequest($dbh,$sql){
			$sth = $dbh->query($sql);
	        $result = $sth->fetchAll();
	        return $result;
		}
		function executeRequest($dbh,$sql,$array){
	  		$sth = $dbh->prepare($sql);
	        $sth->execute($array);
	        $result = $sth->fetchAll();
	        return $result;
  		}
?>