<?php 

echo $classs_name;
$sql="SELECT * FROM `school_student` WHERE 1;";
$result= mysqli_query($conn,$sql);
$found= mysqli_num_rows($result);
if($found){
?>
<div class="table">
<table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ردیف</th>
                <th>نام</th>
                <th>نام خانوادگی</th>
				<?php if($_SESSION['type2']!='دانش آموز' && $_SESSION['type2']!='اولیا' && $_SESSION['type2']!='دانش آموز فعال'){?>
                <th>کد ملی</th>
				<?php }?>
                <th>رشته</th>
                <th>پایه</th>
                <th>نام کلاس</th>
				<?php if($_SESSION['type2']!='دانش آموز' && $_SESSION['type2']!='اولیا' && $_SESSION['type2']!='دانش آموز فعال'){?>
                <th>عملیات</th>
				<?php }?>
            </tr>
        </thead>
        <tbody>
			<?php while($row= mysqli_fetch_assoc($result)){ 
			$ful_name=$row['name']." ".$row['family'];
			?>
			<tr>
			<td><?= $row['id'] ?></td>
			<td><?= $row['name'] ?></td>
			<td><?= $row['family'] ?></td>
			<?php if($_SESSION['type2']!='دانش آموز' && $_SESSION['type2']!='اولیا' && $_SESSION['type2']!='دانش آموز فعال'){?>	
			<td><?= $row['code_meli'] ?></td>
			<?php }?>
			<td><?= $row['reshte'] ?></td>
			<td><?= $row['grade'] ?></td>
			<td><?= $row['klas1'] ?></td>
				<?php if($_SESSION['type2']!='دانش آموز' && $_SESSION['type2']!='اولیا' && $_SESSION['type2']!='دانش آموز فعال'){?>
	        <td>
				<a class="btn btn-outline-primary" href="?panel=each_student&code_meli=<?= $row['code_meli'] ?>">بیشتر</a>
				<a class="btn btn-outline-primary" href="?panel=nobat_nomre&student_name=<?= $ful_name ?>&class_name5=<?= $klas1 ?>&dars_name5=<?= $dars1 ?>&student_code_meli=<?= $row['code_meli'] ?>&student_name=<?= $row['name'] ?>&student_family=<?= $row['family'] ?>">نمرات نهایی</a>
		    </td>
<?php }?>
			
			</tr>
			<?php } ?>
        </tbody>
    </table>
	</div>
<?php }else{
	echo 'مقداری موجود نیست';
}





if(isset($_REQUEST['submit_nobat_nomre'])){
if(isset($_REQUEST['up']) && $_REQUEST['up']=='on'){
	
	$klas=$_REQUEST['klas'];
	$ful_anme=$_REQUEST['student_name']." ".$_REQUEST['student_family'];
	$school_nobat_nomre= new nobat_nomre($conn);
	$school_nobat_nomre->klas_name=$_REQUEST['klas'];
	$school_nobat_nomre->dars_name=$_REQUEST['dars'];
	$school_nobat_nomre->student_name=$ful_anme;
	$school_nobat_nomre->student_code_meli=$_REQUEST['student_code_meli'];
	$school_nobat_nomre->mon_1=$_REQUEST['3mon_1'];
	$school_nobat_nomre->mon_2=$_REQUEST['3mon_2'];
	$school_nobat_nomre->mon_3=$_REQUEST['3mon_3'];
	$school_nobat_nomre->nobat_1=$_REQUEST['nobat_1'];
	$school_nobat_nomre->nobat_2=$_REQUEST['nobat_2'];
	$school_nobat_nomre->finaly=$_REQUEST['finaly'];
	$id=$_REQUEST['id'];
    $school_nobat_nomre->update($id);



	
	echo "<div class='alert alert-success px-5'>اطلاعات با موفقیت ارسال شد!</div>";
	echo "<a class='btn btn-outline-success' href='?panel=student_list&class_name5=$klas&extra=post'>ثبت تغییرات</a>";
}else{
		
	$klas=$_REQUEST['klas'];
	$ful_anme=$_REQUEST['student_name']." ".$_REQUEST['student_family'];
	$school_nobat_nomre= new nobat_nomre($conn);
	$school_nobat_nomre->klas_name=$_REQUEST['klas'];
	$school_nobat_nomre->dars_name=$_REQUEST['dars'];
	$school_nobat_nomre->student_name=$ful_anme;
	$school_nobat_nomre->student_code_meli=$_REQUEST['student_code_meli'];
	$school_nobat_nomre->mon_1=$_REQUEST['3mon_1'];
	$school_nobat_nomre->mon_2=$_REQUEST['3mon_2'];
	$school_nobat_nomre->mon_3=$_REQUEST['3mon_3'];
	$school_nobat_nomre->nobat_1=$_REQUEST['nobat_1'];
	$school_nobat_nomre->nobat_2=$_REQUEST['nobat_2'];
	$school_nobat_nomre->finaly=$_REQUEST['finaly'];
		$school_nobat_nomre->insert();



	
	echo "<div class='alert alert-success px-5'>اطلاعات با موفقیت ارسال شد!</div>";
	echo "<a class='btn btn-outline-success' href='?panel=student_list&class_name5=$klas&extra=post'>ثبت تغییرات</a>";
}}



?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <link href="../iliya.css" rel="stylesheet">
    <link href="../bootstrap5/css/bootstrap.min.css" rel="stylesheet">
<title>Untitled Document</title>
</head>

<body dir="rtl">
	<?php
	if(!isset($_REQUEST['submit_nobat_nomre'])){?>
		

<div class="container">
<h3>نمرات نهایی <?= $_REQUEST['student_name'] ?></h3>
<div class="table-responsive">
<form>
<table class="table table-bordered table-hover">
	<thead>
	<tr>
		<th>درس/زمان</th>
		<th>سه ماه اول</th>
		<th>سه ماه دوم</th>
		<th>سه ماه سوم</th>
		<th>نوبت اول</th>
		<th>نوبت دوم</th>
		<th>پایان سال</th>
	</tr>
	</thead>
  <tbody>
 
 
	<tr>
<?php
$klas_name=$_REQUEST['class_name5'];
$cod=$_REQUEST['student_code_meli'];
$sql="SELECT * FROM `school_nobat_nomre` WHERE `klas_name`='$klas_name' and `student_code_meli`='$cod' ;";
$result= mysqli_query($conn,$sql);
$found= mysqli_num_rows($result);
if($found){
	$ro=mysqli_fetch_assoc($result);
?>
      <th><?= $_REQUEST['dars_name5'] ?></th>
      <th><input name="3mon_1" type="number" value="<?= $ro['mon_1'] ?>"></th>
      <th><input name="3mon_2" type="number" value="<?= $ro['mon_2'] ?>"></th>
      <th><input name="3mon_3" type="number" value="<?= $ro['mon_3'] ?>"></th>
      <th><input name="nobat_1" type="number" value="<?= $ro['nobat_1'] ?>"></th>
      <th><input name="nobat_2" type="number" value="<?= $ro['nobat_2'] ?>"></th>
      <th><input name="finaly" type="number" value="<?= $ro['finaly'] ?>"></th>
	  <input name="up" type="text" value="on" hidden="">
	  <input name="id" type="text" value="<?= $ro['id'] ?>" hidden="">
	<?php }else{?>
	      <th><?= $_REQUEST['dars_name5'] ?></th>
      <th><input name="3mon_1" type="number" value=""></th>
      <th><input name="3mon_2" type="number" value=""></th>
      <th><input name="3mon_3" type="number" value=""></th>
      <th><input name="nobat_1" type="number" value=""></th>
      <th><input name="nobat_2" type="number" value=""></th>
      <th><input name="finaly" type="number" value=""></th>
	  <input name="up" type="text" value="off" hidden="">
<?php } ?>
    </tr>

  </tbody>
</table>
	<input name="klas" type="text" value="<?= $_REQUEST['class_name5'] ?>" hidden="">
		<input name="dars" type="text" value="<?= $_REQUEST['dars_name5'] ?>" hidden="">
		<input name="student_code_meli" type="text" value="<?= $_REQUEST['student_code_meli'] ?>" hidden="">
		<input name="student_name" type="text" value="<?= $_REQUEST['student_name'] ?>" hidden="">
		<input name="student_family" type="text" value="<?= $_REQUEST['student_family'] ?>" hidden="">
	<input class="btn btn-outline-success" name="submit_nobat_nomre" type="submit" value="ثبت نمرات">
</form>
</div>
</div>
<?php	}
	?>
<script src="../bootstrap5/js/bootstrap.min.js"></script>
</body>
</html>