<?php require_once('parent_navbar.php');?>
<?php require_once('Offcanvas_parent.php');?>
<div class="row m-0 p-0">
	<div class="col-md-3 shadow border d-none d-md-block">
		<?php require('parent_menu.php');?>
	
	</div>
	<div class="col-md-9 min-vh-100">
	<div class="alert-info p-2 rounded"><?=$pageName2?></div>
		<?php
	switch($panel){
	case "mychild":
	//$pageName="ثبت خبر جدید";
	require('lists/each_student_page.php');
	break;
	case "myNews":	
	//$pageName="خبر های من";
	break;
	case "lossNews":
	//$pageName="خبر های تایید نشده من";
	break;
	case "userName":
	//$pageName="نام کاربری من";
	break;
	case "userPass":
	//$pageName="رمز عبور من";
	break;
	case "number":
	//$pageName="شماره موبایل من";
	break;
	case "addReporter":
	break;
    default:
};
		?>
	</div>
</div>