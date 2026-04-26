<?php require_once('student_navbar.php');?>
<?php require_once('Offcanvas_student.php');?>
<div dir="rtl" class="row m-0 p-0">
	<div class="col-md-3 shadow border d-none d-md-block">
		<?php require('student_menu.php');?>
	
	</div>
	<div class="col-md-9 min-vh-100 bg-light">
	<div class="alert-info p-2 rounded"><?=$pageName2?></div>
		<?php
	switch($panel){
	case "student_list":
	//$pageName="ثبت خبر جدید";
	require('lists/all_student.php');
	break;
	case "me":	
	require('lists/each_student_page.php');
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