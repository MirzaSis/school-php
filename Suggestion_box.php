<?php
require_once('reciver.php');
if(isset($_REQUEST['submit_Suggestion'])){
	
		$name_for_Suggestion=isset($_REQUEST['name_for_Suggestion'])? $_REQUEST['name_for_Suggestion']:"";
        $family_for_Suggestion=isset($_REQUEST['family_for_Suggestion'])? $_REQUEST['family_for_Suggestion']:"";
        $Suggestion_subject=isset($_REQUEST['Suggestion_subject'])? $_REQUEST['Suggestion_subject']:"";
        $Suggestion=isset($_REQUEST['Suggestion'])? $_REQUEST['Suggestion']:"";

        if(isset($_REQUEST['Suggestion'])){
	  
	    $sql="INSERT INTO `suggestions_box`(`name`, `family`, `Subject`, `suggest`) VALUES ('$name_for_Suggestion','$family_for_Suggestion','$Suggestion_subject','$Suggestion')";
	    mysqli_query($connect,$sql);
	    echo "<div class='alert alert-success px-5'>پیشنهاد شما با موفقیت ثبت شد؛</div>";
};
};
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>صندوق پیشنهادات</title>
<link href="bootstrap5/css/bootstrap.min.css" type="text/css" rel="stylesheet">
</head>

<body dir="rtl">
	
	<div class="container mt-5">
		<div class="row m-0">
			<div class="col-8">
				<h2>صندوق پیشنهادات</h2>
			</div>
			<div class="col-4">
				<div class="text-start">
					<img src="img/amozeshi.png" class="w-100" alt="تصویر صنذوق پیشنهادات">
				</div>
			</div>
		</div>
		<div class="row m-0">
			<form class="form-control">
				<div dir="ltr" class="input-group mb-2 shadow">
	                <input dir="rtl" name="name_for_Suggestion" class="form-control" type="text">
				    <label class="input-group-text">نـــــــــــــــــــــــــام</label>
	            </div>
				<div dir="ltr" class="input-group mb-2 shadow">
	                <input dir="rtl" name="family_for_Suggestion" class="form-control" type="text">
				    <label class="input-group-text">نـام خانوادگی</label>
	            </div>
				
				<div dir="ltr" class="input-group shadow">
	                <input dir="rtl" name="Suggestion_subject" class="form-control" type="text">
				    <label class="input-group-text">موضوع</label>
	            </div>
				<div class="input-group mb-3 shadow">
	                <textarea class="form-control" name="Suggestion" placeholder="پیشنهاد شما..."></textarea>
	            </div>
				
				<div class="col-sm-3">
				<input class="form-control shadow" type="submit" name="submit_Suggestion" value="ارسال">
				</div>
				
			</form>
		</div>
	</div>
	
<script src="bootstrap5/js/bootstrap.min.js"></script>
</body>
</html>