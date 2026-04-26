<?php 
$klas1=$_SESSION['klass1'];
$klas2=$_SESSION['klass2'];
$klas3=$_SESSION['klass3'];
$klas4=$_SESSION['klass4'];
$klas5=$_SESSION['klass5'];
$klas6=$_SESSION['klass6'];

$dars1=$_SESSION['dars1'];
$dars2=$_SESSION['dars2'];
$dars3=$_SESSION['dars3'];
$dars4=$_SESSION['dars4'];
$dars5=$_SESSION['dars5'];
$dars6=$_SESSION['dars6'];

$klas =[
	"klas1"=>$klas1,
	"klas2"=>$klas2,
	"klas3"=>$klas3,
	"klas4"=>$klas4,
	"klas5"=>$klas5,
	"klas6"=>$klas6,
]; 
  
?>
<div class="accordion" id="accordionExample">
	<?php if($klas1!=""){?>
	

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button <?php if($extra!='post') echo 'collapsed';?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" <?php if($extra=='post') echo 'aria-expanded="true"';?> aria-controls="collapseOne">
        <?= $klas1 ?>
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse  collapse <?php if($extra=='post') echo 'show';?>" data-bs-parent="#accordionExample">
      <div class="accordion-body m-0 p-0">
        <div class="list-group list-group-flush p-0 m-0">
			
  <a href="?panel=student_list&class_name5=<?= $klas1 ?>&extra=post" class="list-group-item list-group-item-action <?php if($panel=="student_list" && $class_name5==$klas1) echo "active" ?>">لیست دانش آموزان</a>
			
  <a href="?panel=dalyList&class_name5=<?= $klas1 ?>&dars_name5=<?= $dars1 ?>&extra=post" class="list-group-item list-group-item-action <?php if($panel=="dalyList" && $class_name5==$klas1) echo "active" ?>">لیست روزانه</a>
	

</div>
      </div>
    </div>
  </div>
	<?php }?>
	
	
		<?php if($klas2!=""){?>
	

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button <?php if($extra!='post2') echo 'collapsed';?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" <?php if($extra=='post2') echo 'aria-expanded="true"';?> aria-controls="collapseOne">
        <?= $klas2 ?>
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse  collapse <?php if($extra=='post2') echo 'show';?>" data-bs-parent="#accordionExample">
      <div class="accordion-body m-0 p-0">
        <div class="list-group list-group-flush p-0 m-0">
			
  <a href="?panel=student_list&class_name5=<?= $klas2 ?>&extra=post2" class="list-group-item list-group-item-action <?php if($panel=="student_list" && $class_name5==$klas2) echo "active" ?>">لیست دانش آموزان</a>
			
  <a href="?panel=dalyList&class_name5=<?= $klas2 ?>&dars_name5=<?= $dars2 ?>&extra=post2" class="list-group-item list-group-item-action <?php if($panel=="dalyList" && $class_name5==$klas2) echo "active" ?>">لیست روزانه</a>
	

</div>
      </div>
    </div>
  </div>
	<?php }?>

	
	<?php if($klas3!=""){?>
	

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button <?php if($extra!='post3') echo 'collapsed';?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" <?php if($extra=='post3') echo 'aria-expanded="true"';?> aria-controls="collapseOne">
        <?= $klas3 ?>
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse  collapse <?php if($extra=='post3') echo 'show';?>" data-bs-parent="#accordionExample">
      <div class="accordion-body m-0 p-0">
        <div class="list-group list-group-flush p-0 m-0">
			
  <a href="?panel=student_list&class_name5=<?= $klas3 ?>&extra=post3" class="list-group-item list-group-item-action <?php if($panel=="student_list" && $class_name5==$klas3) echo "active" ?>">لیست دانش آموزان</a>
			
  <a href="?panel=dalyList&class_name5=<?= $klas3 ?>&dars_name5=<?= $dars3 ?>&extra=post3" class="list-group-item list-group-item-action <?php if($panel=="dalyList" && $class_name5==$klas3) echo "active" ?>">لیست روزانه</a>
	

</div>
      </div>
    </div>
  </div>
	<?php }?>
	
	<?php if($klas4!=""){?>
	

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button <?php if($extra!='post4') echo 'collapsed';?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" <?php if($extra=='post3') echo 'aria-expanded="true"';?> aria-controls="collapseOne">
        <?= $klas4 ?>
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse  collapse <?php if($extra=='post4') echo 'show';?>" data-bs-parent="#accordionExample">
      <div class="accordion-body m-0 p-0">
        <div class="list-group list-group-flush p-0 m-0">
			
  <a href="?panel=student_list&class_name5=<?= $klas4 ?>&extra=post4" class="list-group-item list-group-item-action <?php if($panel=="student_list" && $class_name5==$klas4) echo "active" ?>">لیست دانش آموزان</a>
			
  <a href="?panel=dalyList&class_name5=<?= $klas4 ?>&dars_name5=<?= $dars4 ?>&extra=post4" class="list-group-item list-group-item-action <?php if($panel=="dalyList" && $class_name5==$klas4) echo "active" ?>">لیست روزانه</a>
	
			

</div>
      </div>
    </div>
  </div>
	<?php }?>
	
	
	<?php if($klas5!=""){?>
	

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button <?php if($extra!='post5') echo 'collapsed';?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" <?php if($extra=='post5') echo 'aria-expanded="true"';?> aria-controls="collapseOne">
        <?= $klas5 ?>
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse  collapse <?php if($extra=='post5') echo 'show';?>" data-bs-parent="#accordionExample">
      <div class="accordion-body m-0 p-0">
        <div class="list-group list-group-flush p-0 m-0">
			
  <a href="?panel=student_list&class_name5=<?= $klas5 ?>&extra=post5" class="list-group-item list-group-item-action <?php if($panel=="student_list" && $class_name5==$klas5) echo "active" ?>">لیست دانش آموزان</a>
			
  <a href="?panel=dalyList&class_name5=<?= $klas5 ?>&dars_name5=<?= $dars5 ?>&extra=post5" class="list-group-item list-group-item-action <?php if($panel=="dalyList" && $class_name5==$klas5) echo "active" ?>">لیست روزانه</a>
	
			

</div>
      </div>
    </div>
  </div>
	<?php }?>
	
	
	<?php if($klas6!=""){?>
	
	
	

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button <?php if($extra!='post6') echo 'collapsed';?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" <?php if($extra=='post6') echo 'aria-expanded="true"';?> aria-controls="collapseOne">
        <?= $klas6 ?>
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse  collapse <?php if($extra=='post6') echo 'show';?>" data-bs-parent="#accordionExample">
      <div class="accordion-body m-0 p-0">
        <div class="list-group list-group-flush p-0 m-0">
			
  <a href="?panel=student_list&class_name5=<?= $klas6 ?>&extra=post6" class="list-group-item list-group-item-action <?php if($panel=="student_list" && $class_name5==$klas6) echo "active" ?>">لیست دانش آموزان</a>
			
  <a href="?panel=dalyList&class_name5=<?= $klas6 ?>&dars_name5=<?= $dars6 ?>&extra=post6" class="list-group-item list-group-item-action <?php if($panel=="dalyList" && $class_name5==$klas6) echo "active" ?>">لیست روزانه</a>
			
			

</div>
      </div>
    </div>
  </div>
	<?php }?>
	
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button <?php if($extra!='news') echo 'collapsed';?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" <?php if($extra=='news') echo 'aria-expanded="true"';?>  aria-controls="collapseTwo">
       آموزش مجازی 
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse <?php if($extra=='news') echo 'show';?> " data-bs-parent="#accordionExample">
      <div class="accordion-body m-0 p-0">
  <a href="?panel=myNews&extra=news" class="list-group-item list-group-item-action <?php if($panel=="myNews") echo "active" ?>"> محتوا های من</a>
  <a href="?panel=lossNews&extra=news" class="list-group-item list-group-item-action <?php if($panel=="lossNews") echo "active" ?>"> محتوا های ثبت نشده من</a>
      </div>
    </div>
  </div>
</div> 



