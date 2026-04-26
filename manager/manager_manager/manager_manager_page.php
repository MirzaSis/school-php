<?php
$techer_code_meli1=$_SESSION['code_meli'];
$ful_name_manager=$_SESSION['name']." ".$_SESSION['family'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=0.8">
<link href="bootstrap5/css/bootstrap.min.css" rel="stylesheet">
<title>مدیریت</title>
</head>
<body dir="rtl">
<?php require_once('manager_manager_navbar.php');?>
<?php require_once('Offcanvas_manager_manager.php');?>
<div class="row m-0 p-0">
	<div class="col-md-3 shadow border d-none d-md-block">
	<?php require('manager_manager_menu.php');?>
	
	</div>
	<div class="col-md-9 min-vh-100 bg-light">
	<div class="alert-info p-2 rounded"><?=$pageName2?></div>
		<?php
	switch($panel){
	case "student_list":
	//$pageName="ثبت خبر جدید";
	require('lists/all_student.php');
	break;
	case "teacher_list":
	require('lists/teacher_list.php');	
	//$pageName="لیست معلمان";
	break;
	case "moaven_list":
	require('lists/moaven_list.php');
	//$pageName="نام کاربری من";
	break;
	case "class_list":
	require('lists/class_list.php');
	//$pageName2="لیست کلاس ها";
	break;
	case "start_site":
	require('lists/start.php');
	//$pageName2="تنظیمات صفحه اول سایت";
	break;
	case "dore":
	require('lists/dore.php');
	//$pageName2="تنظیمات صفحه اول سایت";
	break;
	case "register_dore":
	require('lists/register_dore2.php');
	//$pageName2="تنظیمات صفحه اول سایت";
	break;
	case "dars_list":
	require('lists/dars_list.php');
	//$pageName2="تنظیمات صفحه اول سایت";
	break;
	case "box":
	$box->editpage();
	break;
	case "daly_list":
	$school_daly_information->editpage();
	break;
	case "news":
	$news->editpage();
	break;
	case "nobat_nomre_manager":
	$school_nobat_nomre->editpage();
	break;
    default:
};
		?>

	</div>
</div>
<script src="~/ckeditor/ckeditor.js"></script>	
<script src="bootstrap5/js/bootstrap.min.js"></script>
</body>
</html>