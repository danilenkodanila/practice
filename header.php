<div class="grid-x header">
        <div class="small-8 small-offset-1 medium-6 large-6 cell site-name">Практикант ДВФУ</div>
        <div class="small-2 small-offset-1  medium-2 medium-offset-3 large-2 large-offset-3 cell logo">
          <img src="image/fefu-logo.png" class="fefu-logo">
        </div>
      </div>
	  
<?php 

// if (!empty($_SESSION['category'])){
// 	switch ($_SESSION['category']) {
// 	    case 1:
// 	    	include ("login_form_user.php");
// 	        break;
// 	    case 2:
// 	    	include ("login_form_prof.php");
// 	        break;
// 	    case 3:
// 	    	include ("login_form_admin.php");
// 	        break;
// 	}
// } else {
// 	include ("login_form.php");
// }

if (empty($_SESSION['category'])){
	include ("login_form.php");
} else if ($_SESSION['category']==1) {
	include ("login_form_user.php");
} else if ($_SESSION['category']==2) {
	include ("login_form_prof.php");
} else if ($_SESSION['category']==3){
	include ("login_form_admin.php");
}

// if ($_SESSION['category']==1){
// 	include ("login_form_user.php");
// } 
// if ($_SESSION['category']==2){
// 	include ("login_form_prof.php");
// } 
// if ($_SESSION['category']==3){
// 	include ("login_form_admin.php");
// }
?>
    

