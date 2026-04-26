<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body dir="rtl">
	<div class="px-1 mx-1">
	<div class="row m-0">
    <div class="p-1 col-md-7">
      <h2><?= $_REQUEST['titr'] ?></h2>
      <h5>ایجاد شده در<?= $_REQUEST['tarikh'] ?></h5>
      <img src="<?= $_REQUEST['aks'] ?>" class="w-100 w-md-25">
      <p><?= $_REQUEST['lid'] ?></p>
      <p><?= $_REQUEST['matn'] ?></p>
    </div>
	<div class="col-md-5">
		<h3>آخرین اخبار</h3>
		<div>
	<?php
$sql="SELECT * FROM `school_news` ORDER BY `school_news`.`tarikh` DESC;";
$result= mysqli_query($conn,$sql);
$found= mysqli_num_rows($result);	
if($found){ ?>
	 <?php 
	  while($row=mysqli_fetch_assoc($result)){ ?>
<a href="?reporter_name=<?= $row['reporter_name'] ?>&aks=<?= $row['aks'] ?>&titr=<?= $row['titr'] ?>&lid=<?= $row['lid'] ?>&matn=<?= $row['matn'] ?>&tarikh=<?= $row['tarikh'] ?>&news_page=ok" class="link-dark link-underline-opacity-0" target="_blank">
                     <h5 class="card-title"><?= $row['titr'] ?></h5>
                     <p class="card-text"><?= $row['lid'] ?></p>
			      </a>
			<hr>
<?php 
};
};
?>
 			 
</div>
    </div>
	  </div>
	 </div>
</body>
</html>