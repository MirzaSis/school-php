<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $pageName; ?></title>
<link href="bootstrap5/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="iliya.css" type="text/css" rel="stylesheet">
<script src="ck/build/ckeditor.js"></script>
  </head>
<body class="rang" dir="rtl">
<?php
$name_add_student=isset($_REQUEST['name_add_student'])? $_REQUEST['name_add_student']:"";
$family_add_student=isset($_REQUEST['family_add_student'])? $_REQUEST['family_add_student']:"";
$code_meli_add_student=isset($_REQUEST['code_meli_add_student'])? $_REQUEST['code_meli_add_student']:"";
$password_add_student=isset($_REQUEST['password_add_student'])? $_REQUEST['password_add_student']:"";
$password_repeat_add_student=isset($_REQUEST['password_repeat_add_student'])? $_REQUEST['password_repeat_add_student']:"";
$phone_number_add_student=isset($_REQUEST['phone_number_add_student'])? $_REQUEST['phone_number_add_student']:"";
$fother_name_add_student=isset($_REQUEST['fother_name_add_student'])? $_REQUEST['fother_name_add_student']:"";
$mother_name_add_student=isset($_REQUEST['mother_name_add_student'])? $_REQUEST['mother_name_add_student']:"";
$role_add_student=isset($_REQUEST['role_add_student'])? $_REQUEST['role_add_student']:"";
$birth_add_student=isset($_REQUEST['birth_add_student'])? $_REQUEST['birth_add_student']:"";
$Grade_add_student=isset($_REQUEST['Grade_add_student'])? $_REQUEST['Grade_add_student']:"";
$reshte_add_student=isset($_REQUEST['reshte_add_student'])? $_REQUEST['reshte_add_student']:"";
$address_add_student=isset($_REQUEST['address_add_student'])? $_REQUEST['address_add_student']:"";
if(isset($_REQUEST['add_student_add_student'])=='ارسال'){
	if($password_add_student!=$password_repeat_add_student){
	echo '<div class="alert alert-danger px-5">رمز عبور ها یکسان نیست!</div>';
}else{
	$sql="SELECT * FROM `member` WHERE `code_meli`='$code_meli_add_student';";
	$result= mysqli_query($connect,$sql);
	$found= mysqli_num_rows($result);
	if($found){
		echo '<div class="alert alert-danger px-5">دانش آموز با این کد ملی قبلا ثبت شده است!</div>';
}else{
	$sql="INSERT INTO `member`(`name`, `family`, `code_meli`, `password`, `phone_number`, `fother_name`, `mother_name`, `role`, `birth`, `Grade`, `reshte`, `address`, `Score`) VALUES ('$login_nam','$family_add_student','$code_meli_add_student','$password_add_student','$phone_number_add_student','$fother_name_add_student','$mother_name_add_student','$role_add_student','$birth_add_student','$Grade_add_student','$reshte_add_student','$address_add_student','')";
	mysqli_query($connect,$sql);
	echo "<div class='alert alert-success px-5'>خبر نگار جدید در سایت ثبت شد؛</div>";
};
};
};
?>

<div class="modal fade" id="staticBackdrop_add_student" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">اضافه کردن دانش آموزان</h1>
        <button type="button_add_student" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form dir="ltr" action="?login_name=manager&login_name2=manager_manager&panel=student_list&extra=post" class="form-control">
	<div class="input-group mb-2 shadow">
	<input name="name_add_student" class="form-control" type="text"><label class="input-group-text">نــــــــــــــــــــــــــام</label>
	</div>
	<div class="input-group mb-2 shadow">
	<input name="family_add_student" class="form-control" type="text"><label class="input-group-text">نام خانوادگــی</label>
	</div>
	<div class="input-group mb-2 shadow">
	<input name="code_meli_add_student" class="form-control" type="number"><label class="input-group-text">کد ملی</label>
	</div>
	<div class="input-group mb-2 shadow">
	<input name="password_add_student" class="form-control" type="password"><label class="input-group-text">رمــــــز عبـــــــور</label>
	</div>
	<div class="input-group mb-2 shadow">
	<input name="password_repeat_add_student" class="form-control" type="password"><label class="input-group-text">تکرار رمز عبور</label>
	</div>
	<div class="input-group mb-2 shadow">
	<input name="phone_number_add_student" class="form-control" type="number"><label class="input-group-text">شماره موبایـل</label>
    </div>
	<div class="input-group mb-2 shadow">
	<input name="fother_name_add_student" class="form-control" type="text"><label class="input-group-text">نام پدر</label>
	</div>
	<div class="input-group mb-2 shadow">
	<input name="mother_name_add_student" class="form-control" type="text"><label class="input-group-text">نام مادر</label>
	</div>
	
	<input name="role_add_student" hidden="" type="text" placeholder="student">
	
	<div class="input-group mb-2 shadow">
	<input name="birth_add_student" class="form-control" type="date"><label class="input-group-text">تاریخ تولد</label>
	</div>
	<div class="input-group mb-2 shadow">
	<input name="Grade_add_student" class="form-control" type="text"><label class="input-group-text">پایه تحصیلی</label>
	</div>
	<div class="input-group mb-2 shadow">
	<input name="reshte_add_student" class="form-control" type="text"><label class="input-group-text">رشته تحصیلی</label>
	</div>
	<div class="input-group mb-2 shadow">
	<input name="address_add_student" class="form-control" type="text"><label class="input-group-text">آدرس</label>
	</div>
	<div class="input-group mb-2 shadow">
	<input name="add_student_add_student" class="form-control" type="submit" value="ارسال">
	</div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button_add_student" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
      </div>
    </div>
  </div>
</div>
<?php

$sql="SELECT * FROM `member` WHERE `role`='student';";
$result= mysqli_query($connect,$sql);
$found= mysqli_num_rows($result);
if($found){ ?>
	<?php if($islogin2='manager'){ ?>
		  <!-- Button trigger modal -->
<a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop_add_student">
  اضافه کردن دانش آموزان
</a>
		
	 <?php } ?> 

    <table class="table table-striped table-hover bg-light">
  <thead>
	<tr>
		<th>ردیف</th>
        <th>نام</th>
        <th>نام خانوادگی</th>
        <th>کد ملی</th>
        <th>رشته</th>
        <th>پایه</th>
        <th>عملیات</th>
	</tr>
  </thead>
  <tbody>
	  <tr>
	 <?php }
	  while($row=mysqli_fetch_assoc($result)){ ?>
		  
      <td><?= $row['id'] ?></td>
      <td><?= $row['name'] ?></td>
      <td><?= $row['family'] ?></td>
      <td><?= $row['code_meli'] ?></td>
      <td><?= $row['reshte'] ?></td>
      <td><?= $row['Grade'] ?></td>
      <td>
		  <a href="#" class="btn btn-primary">دیدن</a>
	  </td>
	  </tr>
	
<?php }?>
</tbody>
</table>