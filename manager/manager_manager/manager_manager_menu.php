<?php
$type2=$_SESSION['type2'];
$type=explode("\n",$type2);
?>

<?php
if(in_array("اختیار تام",$type) or in_array("تنظیمات صفحه اول سایت",$type)){?>
<div class="list-group list-group-flush p-0 m-0">
  <a href="?panel=start_site" class="list-group-item list-group-item-action <?php if($panel=="start_site") echo "active" ?>">تنظیمات صفحه اول سایت</a>
</div>
<?php }
?>

<?php
if(in_array("اختیار تام",$type) or in_array("لیست درس ها",$type)){?>
	<div class="list-group list-group-flush p-0 m-0">
  <a href="?panel=dars_list" class="list-group-item list-group-item-action <?php if($panel=="dars_list") echo "active" ?>">لیست درس ها</a>
</div>
<?php }
?>

<?php if(in_array("اختیار تام",$type) or in_array("لیست کلاس ها",$type)){?>
<div class="list-group list-group-flush p-0 m-0">
  <a href="?panel=class_list&extra=post&" class="list-group-item list-group-item-action <?php if($panel=="class_list") echo "active" ?>">لیست کلاس ها</a>
</div>
<?php } ?>


<?php if(in_array("اختیار تام",$type) or in_array("لیست دانش آموزان",$type)){?>
<div class="list-group list-group-flush p-0 m-0">
  <a href="?panel=student_list" class="list-group-item list-group-item-action <?php if($panel=="student_list") echo "active" ?>">لیست دانش آموزان</a>
</div>
<?php } ?>

<?php if(in_array("اختیار تام",$type) or in_array("لیست معلمان",$type)){?>
<div class="list-group list-group-flush p-0 m-0">
  <a href="?panel=teacher_list" class="list-group-item list-group-item-action <?php if($panel=="teacher_list") echo "active" ?>">لیست معلمان</a>
</div>
<?php } ?>

<?php if(in_array("اختیار تام",$type) or in_array("لیست کارکنان مدرسه",$type)){?>
<div class="list-group list-group-flush p-0 m-0">
  <a href="?panel=moaven_list" class="list-group-item list-group-item-action <?php if($panel=="moaven_list") echo "active" ?>">لیست کارکنان مدرسه</a>
</div>
<?php } ?>

<?php if(in_array("اختیار تام",$type) or in_array("ثبت دوره",$type)){?>
<div class="list-group list-group-flush p-0 m-0">
  <a href="?panel=dore" class="list-group-item list-group-item-action <?php if($panel=="dore") echo "active" ?>">ثبت دوره</a>
</div>
<?php } ?>
<?php if(in_array("اختیار تام",$type) or in_array("ثبت نام افراد در دوره",$type)){?>
<div class="list-group list-group-flush p-0 m-0">
  <a href="?panel=register_dore" class="list-group-item list-group-item-action <?php if($panel=="register_dore") echo "active" ?>">ثبت نام افراد در دوره</a>
</div>
<?php } ?>
<?php if(in_array("اختیار تام",$type)){?>
<div class="list-group list-group-flush p-0 m-0">
  <a href="?panel=box" class="list-group-item list-group-item-action <?php if($panel=="box") echo "active" ?>">صندوق پیشنهادات و انتقادات</a>
</div>
<?php } ?>
<?php if(in_array("اختیار تام",$type) or in_array("لیست روزانه",$type)){?>
<div class="list-group list-group-flush p-0 m-0">
  <a href="?panel=daly_list" class="list-group-item list-group-item-action <?php if($panel=="daly_list") echo "active" ?>">لیست روزانه</a>
</div>
<?php } ?>
<?php if(in_array("اختیار تام",$type) or in_array("ثبت اخبار",$type)){?>
<div class="list-group list-group-flush p-0 m-0">
  <a href="?panel=news" class="list-group-item list-group-item-action <?php if($panel=="news") echo "active" ?>">ثبت اخبار</a>
</div>
<?php } ?>
<?php if(in_array("اختیار تام",$type) or in_array("نمرات نهایی",$type)){?>
<div class="list-group list-group-flush p-0 m-0">
  <a href="?panel=nobat_nomre_manager" class="list-group-item list-group-item-action <?php if($panel=="nobat_nomre_manager") echo "active" ?>">نمرات نهایی</a>
</div>
<?php } ?>