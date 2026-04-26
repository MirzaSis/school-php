<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button <?php if($extra!='post') echo 'collapsed';?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" <?php if($extra=='post') echo 'aria-expanded="true"';?> aria-controls="collapseOne">
       فرزندان من 
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse  collapse <?php if($extra=='post') echo 'show';?>" data-bs-parent="#accordionExample">
      <div class="accordion-body m-0 p-0">
        <div class="list-group list-group-flush p-0 m-0">
  <a href="../?<?='login_name'.'='.$login_name.'&'?>panel=mychild&extra=post" class="list-group-item list-group-item-action <?php if($panel=="mychild") echo "active" ?>">ایلیا حسینی</a>
</div>
      </div>
    </div>
  </div>
	
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button <?php if($extra!='user') echo 'collapsed';?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" <?php if($extra=='user') echo 'aria-expanded="true"';?>  aria-controls="collapseThree">
        ارتباط با مدرسه
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse <?php if($extra=='user') echo 'show';?> " data-bs-parent="#accordionExample">
      <div class="accordion-body m-0 p-0">
  <a href="../?<?='login_name'.'='.$login_name.'&'?>panel=userName&extra=user" class="list-group-item list-group-item-action <?php if($panel=="userName") echo "active" ?>">اطلاعیه ها</a>
  <a href="../?<?='login_name'.'='.$login_name.'&'?>panel=userPass&extra=user" class="list-group-item list-group-item-action <?php if($panel=="userPass") echo "active" ?>">پیام به مدیریت</a>
  <a href="../?<?='login_name'.'='.$login_name.'&'?>panel=number&extra=user" class="list-group-item list-group-item-action <?php if($panel=="number") echo "active" ?>">مشاور مدرسه</a>
      </div>
    </div>
  </div>
</div>