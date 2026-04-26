
<?php
if($_SESSION['role']!='دانش آموز'){
    $code_meli=isset($_REQUEST['code_meli'])? $_REQUEST['code_meli']:"";
}else{
	$code_meli=isset($_SESSION['code_meli'])? $_SESSION['code_meli']:"";
};
$sql="SELECT * FROM `school_student` WHERE `code_meli`='$code_meli';";
$result= mysqli_query($conn,$sql);
$found= mysqli_num_rows($result);
if($found){ 
$row=mysqli_fetch_assoc($result);
?>
<div class="rang p-1" dir="rtl">
	<a class="btn btn-primary" href="?">برگشت</a>
    <div class="m-md-3">
	<div class="row m-0">
		
		<div class="col-md-7">
			<div class="shadow-sm rounded-top mx-md-2  bg-light pb-2">
			    <img class="shadow rounded-circle p-0 text-center text-md-end m-2 
				border border-2 border-dark w-25" src="img/my.jpg" alt="تصویر پروفایل">
			    
			    <span class="fs-1">
					<span><?= $row['name']." ".$row['family'] ?></span>
				</span>
			</div>
		</div>
		<div class="col-md-5">
			<div class="shadow-sm rounded-3 mt-md-2 my-2 bg-light">
				<h4 class="text-center">تاریخ تولد</h4>
				<p class="text-center fs-5">
					<?= $row['birth'] ?>
				</p>
			</div>
			<div class="shadow-sm rounded-3 bg-light">
				<h4 class="text-center">کد ملی</h4>
				<p class="text-center fs-5">
					<?= $row['code_meli'] ?>
				</p>
			</div>
		</div>
		<div class="">
			<div class="bg-light mx-md-2 rounded-bottom rounded-start">
				<div class="row p-2">
				    <span class="col-md-4 col-sm-6 mb-3">پایه: <?= $row['grade'] ?></span>
					<hr class="d-block d-sm-none">
				    <span class="col-md-4 col-sm-6 mb-3">رشته: <?= $row['reshte'] ?></span>
					<hr class="d-block d-md-none">
				    <span class="col-md-4 col-sm-6 mb-3">کلاس: ریاضی الف</span>
					<hr class="d-block d-sm-none d-md-block">
				    <span class="col-md-4 col-sm-6 mb-3">شماره دانش آموزی:454456448484</span>
					<hr class="d-block d-md-none">
					<span class="col-md-4 col-sm-6 mb-3">شماره موبایل: <?= $row['number'] ?></span>
					<hr class="d-block d-sm-none">
					<span class="col-md-4 col-sm-6 mb-3">نام پدر: <?= $row['fother_name'] ?></span>
					<hr class="d-block d-md-block">
					<span class="col-md-4 col-sm-6 mb-3">نام مادر: <?= $row['mother_name'] ?></span>
					<hr class="d-block d-sm-none">
					<span class="col-md-4 col-sm-6 mb-3">شماره موبایل اولیا: 09173435869</span>
					<hr class="d-block d-md-block">
					<span class="col-md-12 col-sm-12 mb-3">آدرس: <?= $row['address'] ?></span>
				</div>
			</div>
		</div>
		
		<div class="col-md-7">
			<h3 class="text-center text-light my-2">لیست نمرات</h3>
			<div class="shadow-sm rounded-3 m-md-2 my-2 bg-light pb-2">
				
				<div class="row">

					<div class="col-md-4"></div>
					<div class="col-md-4 text-center mt-2">

					</div>
				</div>
				<hr>
				<div class="table-responsive px-3">
					
                        
	
	<table class="table table-bordered table-hover text-center fs-6">
		
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


$sql="SELECT * FROM `school_nobat_nomre` WHERE  `student_code_meli`='$code_meli' ;";
$result= mysqli_query($conn,$sql);
$found= mysqli_num_rows($result);
if($found){
	while($ro=mysqli_fetch_assoc($result)){
		
	
?><tr>
      <th><?= $ro['dars_name'] ?></th>
      <th><?= $ro['mon_1'] ?></th>
      <th><?= $ro['mon_2'] ?></th>
      <th><?= $ro['mon_3'] ?></th>
      <th><?= $ro['nobat_1'] ?></th>
      <th><?= $ro['nobat_2'] ?></th>
      <th><?= $ro['finaly'] ?></th>
	  </tr>
	<?php } }else{?>
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

		
<?php
	//echo '<div class="alert alert-danger px-5">این بخش همچنان کامل نشده است!</div>'; 
	/*
	$swich="";	
	$option=$_REQUEST['hafte'];
		$daily='<tr>
							<th>درس/روز</th>
                            <th>شنبه</th>
                            <th>یکشنبه</th>
                            <th>دوشنبه</th>
                            <th>سه شنبه</th>
                            <th>چهارشنبه</th>
                          </tr>
                          <tr>
                            <th>ریاضی</th>
                            <td>
							<input name="math_sanbe" type="number">  
							</td>
							 <td>
							<input name="math_yek_sanbe" type="number">  
							</td>
							 <td>
							<input name="math_do_sanbe" type="number">  
							</td>
							 <td>
							<input name="math_se_sanbe" type="number">  
							</td>
							 <td>
							<input name="math_chahar_sanbe" type="number">  
							</td>
                          </tr>';
		
		$weekly='<tr>
							<th>درس/هفته</th>
                            <th>هفته اول</th>
                            <th>هفته دوم</th>
                            <th>هفته سوم</th>
                            <th>هفته چهارم</th>
                            <th>هفته پنجم</th>
                          </tr>
                          <tr>
                            <th>ریاضی</th>
                            <td>
							<input name="math_week_1" type="number">  
							</td>
							<td>
							<input name="math_week_2" type="number">  
							</td>
							<td>
							<input name="math_week_3" type="number">  
							</td>
							<td>
							<input name="math_week_4" type="number">  
							</td>
							<td>
							<input name="math_week_5" type="number">  
							</td>

                          </tr>';
		
		$monthly_3=[
			
			'پاییز'=>'<tr>
							<th>درس/ماه</th>
                            <th>مهر</th>
                            <th>آبان</th>
                            <th>آذز</th>
                          </tr>
                          <tr>
                            <th>ریاضی</th>
                            <td>
							<input name="math_mehr" type="number">  
							</td>
							<td>
							<input name="math_aban" type="number">  
							</td>
							<td>
							<input name="math_azar" type="number">  
							</td>
                          </tr>',
			'زمستون'=>'<tr>
							<th>درس/ماه</th>
                            <th>دی</th>
                            <th>بهمن</th>
                            <th>اسفند</th>
                          </tr>
                          <tr>
                            <th>ریاضی</th>
                            <td>
							<input name="math_dey" type="number">  
							</td>
							<td>
							<input name="math_bahman" type="number">  
							</td>
							<td>
							<input name="math_esfand" type="number">  
							</td>
                          </tr>',
			'بهار'=>'<tr>
							<th>درس/ماه</th>
                            <th>فروردین</th>
                            <th>اردیبهشت</th>
                            <th>خرداد</th>
                          </tr>
                          <tr>
                            <th>ریاضی</th>
                            <td>
							<input name="math_farvardin" type="number">  
							</td>
							<td>
							<input name="math_ordibehesht" type="number">  
							</td>
							<td>
							<input name="math_khordad" type="number">  
							</td>
                          </tr>',
				   ];
		$monthly_3_help='
		<select name="hafte_help">
	<option value="پاییز">پاییز</option>
	<option value="زمستون">زمستون</option>
	<option value="بهار">بهار</option>
	</select>
	<input name="final" type="submit" value="ارسال نهایی">
		';
		
	if(isset($_REQUEST['start'])){
				switch($option){
                           case "daily":
                           $swich=$daily;
                           break;
                           case "weekly":
                           $swich=$weekly;	
                           break;
                           case "monthly_3":
                           $swich=$monthly_3_help;
                           break;
						};

		
	
	}elseif(isset($_REQUEST['final'])){
		$option2=$_REQUEST['hafte_help'];
		$swich=$monthly_3[$option2];
	};
	echo '<table class="table table-bordered table-hover text-center fs-6">
                        <tbody>'.$swich
                        .'</tbody>
                      </table>
	<input name="nim" type="submit" value="ارسال">';*/
?>
		</table>	
					
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<h3 class="text-center text-light my-2">لیست حضور و غیاب</h3>
			<div class="table-responsive shadow-sm rounded-3 m-md-2 my-2 bg-light pb-2">
				<table class="table table-hover table-bordered text-center">
					<thead>
						<tr>
							<th>ناریخ</th>
							<th>وضعیت</th>
							<th>نمره</th>
							<th>توضیحات</th>
						</tr>
					</thead>
					<tbody>
		  <?php
$sql2="SELECT * FROM `school_daly_information` WHERE `student_code_meli`='$code_meli';";
$result2= mysqli_query($conn,$sql2);
$found2= mysqli_num_rows($result2);
if($found2){ 
      
      while($row2=mysqli_fetch_assoc($result2)){ ?>				
	
						<tr>
							<td><?= $row2['tarikh'] ?></td>
							<td><?= $row2['stat'] ?></td>
							<td><?= $row2['daly_nomre'] ?></td>
							<td><?= $row2['tozihat'] ?></td>
						</tr>
						<?php }?>				
					</tbody>
				</table>			
			</div>
		</div>
	</div>
    </div>
</div>
<?php
}};
?>

