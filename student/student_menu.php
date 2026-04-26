<?php 
 $klas=$_SESSION['klass1'];
  
?>
<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button <?php if($extra!='post') echo 'collapsed';?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" <?php if($extra=='post') echo 'aria-expanded="true"';?> aria-controls="collapseOne">
          ویژگی ها
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse  collapse <?php if($extra=='post') echo 'show';?>" data-bs-parent="#accordionExample">
      <div class="accordion-body m-0 p-0">
        <div class="list-group list-group-flush p-0 m-0">
	
  <a href="?panel=student_list&class_name5=<?= $klas ?>&extra=post" class="list-group-item list-group-item-action <?php if($panel=="student_list" && $class_name5==$klas) echo "active" ?>"><?= $klas ?></a>
		
			
  <a href="?panel=me&&extra=post" class="list-group-item list-group-item-action <?php if($panel=="me") echo "active" ?>">من</a>
</div>
      </div>
    </div>
  </div>
</div> 



