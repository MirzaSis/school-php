<link href="../bootstrap5/css/bootstrap.min.css" rel="stylesheet">
<nav class="navbar navbar-expand-md bg-primary shadow sticky-md-top" dir="rtl">
  <div class="container-fluid">
	<button class="btn btn-primary d-block d-md-none " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">منو</button>
	  
	<h3 class="ms-3"> صفحه اولیا</h3> 
	  
	<?php if($islogin!='صفحه اصلی'){
	echo '<a class="nav-link active text-white" aria-current="page" href="?logout=ok" >خروج</a>';
}
			?>
  </div>
</nav>