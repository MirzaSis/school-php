<?php 
require_once('database.php');
require_once('reciver.php') ?>
<?php 
require_once('yaracode_balout.php');
require_once('requires.php');
require_once('extends.php');
$school_managers= new managers($conn);
//$res1=$school_managers->search(['id'=>"!=''"]);
//if(count($res1)<=0){
//mysqli_query($conn,$sql000);
//};
$school_clas= new clas($conn);
//$res2=$school_clas->search(['id'=>"!=''"]);
//if(count($res2)<=0){
////mysqli_query($conn,$sql00);
//};
$school_student= new student($conn);
$school_teacher= new teacher($conn);
$school_start= new start($conn);
$school_parents= new parents($conn);
$school_dore= new dore($conn);
$school_daly_information= new daly_information($conn);
$register_dore= new register_dore($conn);
$school_dars= new dars($conn);
$box= new box($conn);
$news= new news($conn);
$school_nobat_nomre= new nobat_nomre($conn);
?>


<?php
	// یرای مشخص کردن نام صفحه
if($islogin){$pageName= "صفحه $islogin";	}else {$pageName="صفحه اصلی";}
?><head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="google-site-verification" content="cSudAqKVk2jlyC__bIYnZ7gU5ALH4syJ0wOYuDzeUA8" />
<title><?= $pageName; ?></title>
<link href="bootstrap5/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="iliya.css" type="text/css" rel="stylesheet">
<script src="ck/build/ckeditor.js"></script>
</head>
    <?php
if(isset($_REQUEST['register_dore'])){
	require_once('lists/register_dore.php');
}elseif(isset($_REQUEST['news_page'])){
	require_once('lists/news_page.php');
}elseif(isset($_REQUEST['Register_page']) && $_REQUEST['Register_page']=="ok"){
	require_once('register_page.php');
}else{
	

if($islogin!=false){
		switch($_SESSION['role']){
	case "کادر مدرسه":
	require('manager/manager_manager/manager_manager_page.php');
	break;
	case "معلم":
	require_once('Teacher/Teacher_page.php');
	break;
	case "اولیا":
	require_once('parent/parents_page.php');
	break;
	case "دانش آموز":
	require_once('student/student_page.php');
	break;
};
}else{
	require_once('gust/gust_page.php');
};
}
	?>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>	
	
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
	<!--کد مربوط به دکمه پشتیبانی -->
<script type="text/javascript">
	
	
  !function(){var i="z10V9b",a=window,d=document;function g(){var g=d.createElement("script"),s="https://www.goftino.com/widget/"+i,l=localStorage.getItem("goftino_"+i);g.async=!0,g.src=l?s+"?o="+l:s;d.getElementsByTagName("head")[0].appendChild(g);}"complete"===d.readyState?g():a.attachEvent?a.attachEvent("onload",g):a.addEventListener("load",g,!1);}();
</script>
 <script src="bootstrap5/js/bootstrap.min.js"></script>



<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		
      <div class="modal-dialog">
		  
        <div class="modal-content">
			
          <div class="modal-header row m-0">
			<div class="col-1 m-0">
            <button  type="button" class="btn-close col-1" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			  <div class="col-11 m-0">
				  <h5 class="text-end text-dark modal-title">ورود</h5>
			  
			  </div>
          </div>
			
          <div class="modal-body rang">
			  
            <form id="loginformmodal" name="loginformmodal">
					  <select name="type" dir="rtl" class="form-select mb-2">
					      <option value="no_select" selected>انتخاب نقش</option>
					      <option value="school_managers">مدیر</option>
					      <option value="school_teacher">معلم</option>
					      <option value="school_student">دانش آموز</option>
				      </select>
			
					
    	        <div class="form-floating mb-3">
			     
                     <input name="user_name" required type="text" class="form-control" id="floatingInput" placeholder="">
                     <label for="floatingInput">کد ملی</label>
			   		
                </div>
				
                <div class="form-floating">
			   		
                      <input name="user_password" required type="password" class="form-control" id="floatingPassword" placeholder="">
                      <label for="floatingPassword">رمز عبور </label>
					
                </div>  
    		</form>
          </div>
			
          <div dir="ltr" class="modal-footer bg-warning">
			  
            <button type="button" class=" btn btn-outline-dark shadow" data-bs-dismiss="modal">بستن</button>
    		<a class=" btn btn-outline-dark shadow" href="Register_page.php" target="_blank">فراموشی رمز عبور</a>
    		<button type="submit" name="login" form="loginformmodal" class="btn btn-outline-dark shadow">ورود</button>
			  
          </div>
        </div>
      </div>
    </div>
<div id="myModal" class="modal55">
    <div class="modal-content p-5">
        <span onclick="closeModal()" style="float: right; cursor: pointer;">×</span>
		<?php
		if(isset($_REQUEST['register'])){
	$erorrr=$_REQUEST['erorrr'];
}
		?>
        <p><?= $erorrr ?></p>
    </div>
</div>

<script>
    // Function to open the modal
    <?php

	
if(isset($_REQUEST['submit_dore']) or isset($_REQUEST['register'])){

?> 
        document.getElementById("myModal").style.display = "block";
   <?php }?>

    // Function to close the modal
    function closeModal() {
        document.getElementById("myModal").style.display = "none";
    }
</script>
</body>
</html>


