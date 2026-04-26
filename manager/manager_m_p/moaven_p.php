<?php require_once('moaven_p_navbar.php');?>
<?php require_once('Offcanvas_moaven_p.php');?>
<div class="row m-0 p-0">
	<div class="col-md-3 shadow border d-none d-md-block">
		<?php require('moaven_p_menu.php');?>
	
	</div>
	<div class="col-md-9 min-vh-100">
	<div class="alert-info p-2 rounded"><?=$pageName2?></div>
		<?php
	switch($panel){
	case "dalyList":
	//$pageName="ثبت خبر جدید";
	require('lists/daly_list.php');
	break;
	case "student_list":
	require('lists/student_list.php');	
	//$pageName="خبر های من";
	break;
	case "lossNews":
	require('reporter_lossNews.php');	
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
	//$pageName="اضافه کردن خبرنگار جدید";
	//require('../../admin_add_user.php');
	break;
    default:
};
		?>
	</div>
</div>