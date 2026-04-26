<?php
$type2=$_SESSION['type2'];
$type=explode("\n",$type2);

if(in_array("اختیار تام",$type) or in_array("لیست دانش آموزان",$type)){
	$school_student->editpage();
}else{
	

$classs_name = $_REQUEST['class_name5'];
echo $classs_name;
$sql="SELECT * FROM `school_student` WHERE `klas1`='$classs_name';";
$result= mysqli_query($conn,$sql);
$found= mysqli_num_rows($result);
if($found){
?>
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
<?php }else{
	echo 'مقداری موجود نیست';
}
}
?>
 