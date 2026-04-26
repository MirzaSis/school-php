<?php
$sql0="DELETE FROM `school_daly_information` WHERE `stat`='n';";
	mysqli_query($conn,$sql0);
    $_SESSION['class_name5']=isset($_REQUEST['class_name5'])? $_REQUEST['class_name5']:$_SESSION['class_name5'];
    $class_name5=$_SESSION['class_name5'];
    $_SESSION['dars_name5']=isset($_REQUEST['dars_name5'])? $_REQUEST['dars_name5']:$_SESSION['dars_name5'];
    $dars_name5=$_SESSION['dars_name5'];
    $sql545="SELECT * FROM `school_student` WHERE `klas1`='$class_name5';";
    $result545= mysqli_query($conn,$sql545);
    $found= mysqli_num_rows($result545);
	
if($found){
	if(isset($_REQUEST['submit_daly_information'])){
	while($row2=mysqli_fetch_assoc($result545)){
		
	if(isset($_REQUEST["stat".$row2['code_meli'] ]) && $_REQUEST["stat".$row2['code_meli'] ]=="ghayeb"){
		$stat='غایب';
	}elseif(isset($_REQUEST["stat".$row2['code_meli'] ]) && $_REQUEST["stat".$row2['code_meli'] ]=="movaja"){
		$stat='غیبت موجه';
	}elseif(isset($_REQUEST["stat".$row2['code_meli'] ]) && $_REQUEST["stat".$row2['code_meli'] ]=="hazer"){
		$stat='حاضر';
	};
		
	
	if(isset($_REQUEST["stat".$row2['code_meli'] ])){
		
			
		
    
			}else{
				echo "<div class='alert alert-danger px-5'>وضعیت حضور$student_name با کد ملی $student_code_meli را دوباره وارد کنید. تذکر وضعیت دانش آ»وزان دیگر را دوباره وارد نکنید!</div>";
		        $stat="n";
		}	
	
	$teacher_code_meli=$_REQUEST['techer_code_meli'];
	$student_code_meli=$row2['code_meli'];
	$teacher_name=$_REQUEST['teacher_name'];
	$student_name=$row2['name']." ".$row2['family'];
    $family=$_SESSION['family'];
    $name=$_SESSION['name'];
    $ful_name=$name.$family;
	$daly_nomre=$_REQUEST['daly_nomre'.$row2['code_meli']];
	$tozihat=$_REQUEST['tozihat'.$row2['code_meli']];
	$tarikh=$_REQUEST['day_date'];
	$class_name1=$_SESSION['class_name5'];	
	$dars_name1=$_SESSION['dars_name5'];
	
	
		
		$sql=$row2['code_meli']="INSERT INTO `school_daly_information`(`klas_name`, `dars_name`, `teacher_name`, `teacher_code_meli`, `student_name`, `student_code_meli`, `stat`, `daly_nomre`, `tozihat`, `tarikh`) VALUES ('$class_name1','$dars_name1','$teacher_name','$teacher_code_meli','$student_name','$student_code_meli','$stat','$daly_nomre','$tozihat','$tarikh');";
	mysqli_query($conn,$sql);
	            echo '<div class="alert alert-Success px-5">لیست با موفقیت ارسال شد!</div>';
	            echo '<a href="?panel=dalyList" class="btn btn-primary">تایید</a>';
		        

	}}
?>



<div class="bg-body">
	<form>
	  <h3 class="mb-md-5 mb-2">لیست روزانه دانش آموزان</h3>
	 <?php require_once('taghvim_jalali.php'); ?>
	

		<div class="table-responsive W-100">
		
      <table class="table table-bordered table-hover">
        <tbody>
			
		  <tr>
            <th>ردیف</th>
            <th>نام</th>
            <th>نام خانوادگی</th>
            <th>کدملی</th>
            <th class=" text-center">وضعیت حضور</th>
            <th>نمرات روزانه</th>
            <th>توضیحات بیشتر</th>
          </tr>
			<?php 
      while($row2=mysqli_fetch_assoc($result545)){ ?>
          <tr>
            <th><?= $row2['id'] ?></th>
            <td><?= $row2['name'] ?></td>
            <td><?= $row2['family'] ?></td>
            <td><?= $row2['code_meli'] ?></td>
           <td dir="ltr" class=" text-center">
              <div class="btn-group" role="group" aria-label="Basic radio toggle button group">

              <input type="radio" class="btn-check" name="stat<?= $row2['code_meli'] ?>" value="ghayeb" id="<?= $row2['id'] ?>ghayeb" autocomplete="off">
              <label class="btn btn-outline-danger" for="<?= $row2['id'] ?>ghayeb">غایب</label>

              <input type="radio" class="btn-check btn-md" name="stat<?= $row2['code_meli'] ?>" value="movaja" id="<?= $row2['id'] ?>movaja" autocomplete="off">
              <label class="btn btn-outline-warning" for="<?= $row2['id'] ?>movaja">غیبت موجه</label>

              <input type="radio" class="btn-check mx-1" name="stat<?= $row2['code_meli'] ?>" value="hazer" id="<?= $row2['id'] ?>hazer" autocomplete="off">
              <label class="btn btn-outline-success" for="<?= $row2['id'] ?>hazer">حاضر</label>
            </div>
          </td>
            <td dir="ltr">
              <div class="input-group mb-3">
                <input name="daly_nomre<?= $row2['code_meli'] ?>" type="number" class="form-control" placeholder="">
              </div>
              
            </td>
           
 
            <td>
              <textarea name="tozihat<?=$row2['code_meli']?>" class="form-control" placeholder="..."></textarea>	
		<input name="klas" type="text" value="<?= $class_name5 ?>" hidden="">
		<input name="dars" type="text" value="<?= $dars_name5 ?>" hidden="">
		<input name="teacher_name" type="text" value="<?= $ful_name_teacher ?>" hidden="">
		<input name="techer_code_meli" type="text" value="<?= $techer_code_meli1 ?>" hidden="">
		<input name="student_code_meli" type="text" value="<?= $row2['code_meli'] ?>" hidden="">
		<input name="student_name" type="text" value="<?= $row2['name'] ?>" hidden="">
		<input name="student_family" type="text" value="<?= $row2['family'] ?>" hidden="">
            </td>
          </tr>
			<?php     }?>
   

        </tbody>
      </table>

	</div>
		<input name="submit_daly_information" class="form-control" type="submit" value="ارسال">
	</form>
</div>


<script src="static/js/lib/jquery-3.2.1.min.js"></script>
    <script src="static/js/lib/persian-date.min.js"></script>
    <script src="static/js/lib/persian-datepicker.min.js"></script>
    <script src="static/js/app.js"></script>



<?php }else{
	echo "با خطا روبرو شدیم";
}


/*
 <th class=" text-center">وضعیت حضور</th>
 
  <td dir="ltr" class=" text-center">
              <div class="btn-group" role="group" aria-label="Basic radio toggle button group">

              <input type="checkbox" class="btn-check" name="ghayeb" id="<?= $row2['id'] ?>ghayeb" autocomplete="off">
              <label class="btn btn-outline-danger" for="<?= $row2['id'] ?>ghayeb">غایب</label>

              <input type="checkbox" class="btn-check btn-md" name="movaja" id="<?= $row2['id'] ?>movaja" autocomplete="off">
              <label class="btn btn-outline-warning" for="<?= $row2['id'] ?>movaja">غیبت موجه</label>

              <input type="checkbox" class="btn-check mx-1" name="hazer" id="<?= $row2['id'] ?>hazer" autocomplete="off">
              <label class="btn btn-outline-success" for="<?= $row2['id'] ?>hazer">حاضر</label>
            </div>
          </td>
 
 
$row1=mysqli_fetch_assoc($result545);
	$teacher_code_meli=$_SESSION['cod_meli'];
	$student_code_meli=$_REQUEST['student_code_meli'];
	$teacher_name=$_REQUEST['teacher_name'];
	if($_REQUEST["ghayeb"]=="on"){
		$stat='ghayeb';
	}elseif($_REQUEST["movaja"]=="on"){
		$stat='movaja';
	}elseif($_REQUEST["hazer"]=="on"){
		$stat='hazer';
	};
    $family=$_SESSION['family'];
    $name=$_SESSION['name'];
    $ful_name=$name.$family;
	$daly_nomre=$_REQUEST['daly_nomre'];
	$tozihat=$_REQUEST['tozihat'];
	$tarikh=$_REQUEST['day_date'];
	$class_name5=isset($_REQUEST['class_name5'])? $_REQUEST['class_name5']:"";
	$_SESSION['class_name5']=$class_name5;
	$class_name5=$_SESSION['class_name5'];

	$sql="INSERT INTO `school_daly_information`(`teacher_code_meli`, `teacher_name`, `student_code_meli`, `stat`, `daly_nomre`, `tozihat`, `tarikh`) VALUES ('$teacher_code_meli','$teacher_name','$student_code_meli','$stat','$daly_nomre','$tozihat','$tarikh')";
	//mysqli_query($conn,$sql);
?>*/


