<?php
$file_name=move_image("image");
//چک کردن حساب کاربر
if(isset($_REQUEST['submit666'])){
	
		$titr=isset($_REQUEST['titr'])? $_REQUEST['titr']:"";
        $lid=isset($_REQUEST['lid'])? $_REQUEST['lid']:"";
        $matn=isset($_REQUEST['matn'])? $_REQUEST['matn']:"";
        $type=isset($_REQUEST['type'])? $_REQUEST['type']:"";
        if(isset($_REQUEST['type']) && isset($_REQUEST['lid']) && isset($_REQUEST['matn']) && isset($_REQUEST['titr'])){
	    $sql="SELECT * FROM `news&facts` WHERE `titr`='$titr';";
	    $result= mysqli_query($connect,$sql);
	    $found= mysqli_num_rows($result);
	    if($found){
		echo '<div class="alert alert-danger px-5">این تیتر قبلا در خبری دیگر ثبت  شده است!</div>';
            }else{
	    $sql="INSERT INTO `news&facts`(`titr`, `lid`, `matn`, `type`, `writer`,`file_name`) VALUES ('$titr','$lid','$matn','$type','$user_name','$file_name')";
	    mysqli_query($connect,$sql);
	    echo "<div class='alert alert-success px-5'>خبر جدیدی با موفقیت ارسال شد؛</div>";
};
};
};

//مدیریت تصاویر
//move_image("image1");

?>
<?php if($islogin!='صفحه اصلی'){
	echo '<a class="nav-link active btn btn-primary" aria-current="page" href="?login_name=مدیر&logout2=ok" >خروج</a>';
}
			?>
<div class="row m-0 p-0">
<div class=" m-0 p-0">
<form dir="ltr" class="form-control" method="post" enctype="multipart/form-data">
	<div class="input-group mb-2 shadow">
	<select dir="rtl" name="type" class="form-select">
	<option value="news">خبر</option>
	<option value="fact">اطلاعیه</option>
	</select><label class="input-group-text">نوع مطلب</label>
	</div>
	<div class="input-group mb-2 shadow">
	<input name="user_name" class="form-control" type="text"><label class="input-group-text">نویسند<em></em></label>
	</div>
	 <div class="input-group mb-2 shadow">
	<input name="image" class="form-control" type="file"><label class="input-group-text">تصویر خبر</label>
	</div>
	<div class="input-group mb-2 shadow">
	<input name="titr" class="form-control" type="text"><label class="input-group-text">تیتر خبر</label>
	</div>
	<div class="input-group mb-2 shadow">
	<textarea name="lid" class="form-control"></textarea><label class="input-group-text">لید خبـر</label>
	</div>
    <div dir="rtl" class="input-group mb-2 shadow">
	<label class="input-group-text">متن خبر</label><textarea name="matn" id=editor></textarea>
	</div>
	<div class="input-group mb-2 shadow">
	<input name="submit666" class="form-control btn btn-sm btn-success" type="submit" value="ارسال">
	</div>
</form>
</div>
<div class="col-md-8 m-0 p-0">
</div>
</div>
</div>
<?php
//تابع انتقال فایل ها
function move_image($input_name){
	if(isset($_FILES[$input_name]['tmp_name'])){
	$name="img/move/{$_FILES[$input_name]['name']}";
	$name_result= pathinfo($name);
	//var_dump($name_result);
	$Allowed_extension=["png","jpg","jpeg"];
	$id=1;
	
	//چک کردن حجم فایل
	if($_FILES[$input_name]['size']<=0 or $_FILES[$input_name]['size']>2000000){
	echo "حجم فایل انتخابی نادرست است<br>فایل باید بین 1 بایت تا 2000000 بایت (2 مگابایت) باشد";
	return false;
	};
	
	//چک کردن پسوند فایل
	if(!in_array($name_result['extension'],$Allowed_extension)){
	echo "پسوند فایل انتخابی مجاز نمی باشد.<br>پسوند های مجاز (png - jpg - jpeg)";
	return false;
	};
	
	
	//چک کردن تکراری بودن فایل
	while(file_exists($name)){
		$name= "img/"."move/".$name_result['filename']."($id).".$name_result['extension'];
	    $id++;
	};
	
	//دستور نهایی
	move_uploaded_file($_FILES[$input_name]['tmp_name'],$name);	
return($name);
};
};
?>