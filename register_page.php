<?php
require_once('database.php');
require_once('yaracode_balout.php');
require('extends.php');


if(isset($_REQUEST['register'])){
	
if($_REQUEST['name']!="" && $_REQUEST['family']!="" && $_REQUEST['code_meli']!="" && $_REQUEST['fother_name']!="" && $_REQUEST['paye']!="" && $_REQUEST['reshte']!=""){
$name=$_REQUEST['name'];
$family=$_REQUEST['family'];
$code_meli=$_REQUEST['code_meli'];
$fother_name=$_REQUEST['fother_name'];
$paye=$_REQUEST['paye'];
$reshte=$_REQUEST['reshte'];
	

$school_student= new student($conn);
$sql535="select * from `school_student` where `name` = '$name' and `family` = '$family' and `code_meli` = '$code_meli' and `fother_name` = '$fother_name' and `grade` = '$paye' and `reshte` = '$reshte';";
$result535= mysqli_query($conn,$sql535);
$found= mysqli_num_rows($result535);
if($found){
$row=mysqli_fetch_assoc($result535);
$id=$row['id'];
$new_ramz=generatePassword(6);
$sql="UPDATE `school_student` SET `password`='$new_ramz' WHERE `id`='$id';";
mysqli_query($conn,$sql);

echo "<span class='alert-info p-2'>عملیات با موفقیت انجام شد<br><br>رمز جدید:$new_ramz .</span>";
}else{
	echo "<span class='alert-info p-2'>اطلاعات وارد شده صحیح نمی باشد!</span>";
}
}else{
	echo "<span class='alert-info p-2'>از کامل کردن تمامی موارد اطمینان حاصل کنید.</span>";
}
}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="bootstrap5/css/bootstrap.min.css" type="text/css" rel="stylesheet">
</head>

<body dir="rtl">
	<div class="p-5">
		<span class="alert-info p-2">تمامی موارد را به دقت وارد کنید.</span>
		<br>
<br>

		<form>
		
کد ملی:	<input type="text" name="code_meli">
		
نــام:	<input type="text" name="name">
		
نام خانوادگی:	<input type="text" name="family">
		<br>
		<br>
نام پــدر: <input type="text" name="fother_name">
		
 پایه:	<input type="text" name="paye">
		
 رشـــــــــتــــــــــه:	<input type="text" name="reshte">

			<br>
			<br>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="register" value="ارسال">
		</form>
    </div>
</body>
</html>

<?php

function generatePassword($length = 8) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    return substr(str_shuffle($chars), 0, $length);
}

// مثال استفاده از تابع
//$randomPassword = generatePassword(12); // تولید یک رمز عبور 12 کاراکتری
//echo "رمز عبور تصادفی: " . $randomPassword;

?>