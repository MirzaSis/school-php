<?php
$techer_code_meli1=$_SESSION['code_meli'];
$ful_name_teacher=$_SESSION['name']." ".$_SESSION['family'];
require_once('Teacher_navbar.php');?>
<?php require_once('Offcanvas_Teacher.php');?>
<div dir="rtl" class="row m-0 p-0">
	<div class="col-md-3 shadow border d-none d-md-block">
		<?php require('Teacher_menu.php');?>
	
	</div>
	<div class="col-md-9 min-vh-100 bg-light">
	<div class="alert-info p-2 rounded"><?=$pageName2?></div>
		<?php
	switch($panel){
	case "student_list":
	//$pageName="ثبت خبر جدید";
	require('lists/all_student.php');
	break;
	case "dalyList":	
	require('lists/daly_list.php');
	//$pageName="خبر های من";
	break;
	case "each_student":
	require('lists/each_student_page.php');
	//$pageName="خبر های تایید نشده من";
	break;
	case "nobat_nomre":
	require('lists/nobat_nomre.php');
	//$pageName="خبر های تایید نشده من";
	break;
    default:
};
		?>
	</div>
</div>