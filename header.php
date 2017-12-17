<div class="grid-x header">
	<div class="small-1 large-4 columns site-name">Практикант ДВФУ</div>
	<div class="small-2 large-4 columns"></div>
	<div class="small-1 large-4 columns logo">
		<img src="image/fefu-logo.png" class="fefu-logo">
	</div>
</div>
	  
<?php 
if (empty($_SESSION['category'])){
	include ("login_form.php");
	} 
if ($_SESSION['category']==1){
	include ("login_form_user.php");
} 
if ($_SESSION['category']==2){
	include ("login_form_prof.php");
} 
if ($_SESSION['category']==3){
	include ("login_form_admin.php");
}
?>
      <!-- Конец header`а -->

