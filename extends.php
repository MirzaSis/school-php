<?php 

require_once("yaracode_balout.php"); 
# اشیا و کلاس های مورد نیاز سایت خود را در این قسمت تعریف کنید
#مانند کلاس زیر

// توجه نام کلاس با نام دیتا بیس یکی باشد
// بجای rashidi
/*
class rashidi extends BASE{
	public function __construct($conn){
	parent::__construct($conn,'rashidi',["id","name"=>["type"=>"text50","lbl"=>"عنوان خبر"]]);
	}
}

*/

class start extends BASE{
	public function __construct($conn){
	parent::__construct($conn,'start',[
		"id"=>"ردیف",
		"sal_tahsili"=>["type"=>"number","lbl"=>"سال تحصیلی" ],
		"school_name1"=>["type"=>"text100","lbl"=>"نام مدرسه قسمت اول" ],
		"school_name2"=>["type"=>"text100","lbl"=>"نام مدرسه قسمت دوم"],
		"school_big_name"=>["type"=>"text200","lbl"=>"نام کامل مدرسه "],
		"tozih_mazaya"=>["type"=>"text200","lbl"=>"توضیحات مزایای مدرسه"],
		"tozih_online_class"=>["type"=>"text200","lbl"=>"توضیحات کلاس های آنلاین"],
		"tozih_dore"=>["type"=>"text200","lbl"=>"توضیحات برگزاری دوره ها"],
		"mazaya_madrese1"=>["type"=>"text50","lbl"=>"مزایای مدرسه:عنوان اول"],
		"mazaya_madrese_tozih1"=>["type"=>"text_rich","lbl"=>"مزایای مدرسه:توضیحات اول"],
		"mazaya_madrese_aks1"=>["type"=>"img","lbl"=>"مزایای مدرسه:عکس اول"],
		"mazaya_madrese2"=>["type"=>"text50","lbl"=>"مزایای مدرسه:عنوان دوم"],
		"mazaya_madrese_tozih2"=>["type"=>"text_rich","lbl"=>"مزایای مدرسه:توضیحات دوم"],
		"mazaya_madrese_aks2"=>["type"=>"img","lbl"=>"مزایای مدرسه:عکس دوم"],
		"mazaya_madrese3"=>["type"=>"text50","lbl"=>"مزایای مدرسه:عنوان سوم"],
		"mazaya_madrese_tozih3"=>["type"=>"text_rich","lbl"=>"مزایای مدرسه:توضیحات سوم"],
		"mazaya_madrese_aks3"=>["type"=>"img","lbl"=>"مزایای مدرسه:عکس سوم"],
		"best_dore_name"=>["type"=>"text50","lbl"=>"بهترین دوره: نام"],
		"best_dore_teacher_name"=>["type"=>"text50","lbl"=>"بهترین دوره: نام دبیر دوره"],
		"best_dore_time"=>["type"=>"date","lbl"=>"بهترین دوره: زمان"],
		"number_of_teacher"=>["type"=>"number","lbl"=>"تعداد معلمان"],
		"number_of_manager"=>["type"=>"number","lbl"=>"تعداد کادر مدرسه"],
		"number_of_student"=>["type"=>"number","lbl"=>"تعداد دانش آموزان"],
		
									   ]);
	}
}

class dars extends BASE{
	public function __construct($conn){
	parent::__construct($conn,'dars',[
		"id"=>"ردیف",
		"grade"=>["type"=>"select","lbl"=>"پایه ","list"=>["دهم_","یازدهم_","دوازدهم_"]],
		"reshte"=>["type"=>"select","lbl"=>"رشته","list"=>["ریاضی","انسانی","تجربی"]],
		"dars"=>["type"=>"text100","lbl"=>"درس"],
									   
									   ]);
	}
};

class clas extends BASE{
	public function __construct($conn){
  $dars= new dars($conn); 
  $searchOptions1=["grade"=>"دهم_","reshte"=>"ریاضی"];
  $searchOptions2=["grade"=>"دهم_","reshte"=>"انسانی"];
  $searchOptions3=["grade"=>"دهم_","reshte"=>"تجربی"];
  $searchOptions4=["grade"=>"یازدهم_","reshte"=>"ریاضی"];
  $searchOptions5=["grade"=>"یازدهم_","reshte"=>"انسانی"];
  $searchOptions6=["grade"=>"یازدهم_","reshte"=>"تجربی"];
  $searchOptions7=["grade"=>"دوازدهم_","reshte"=>"ریاضی"];
  $searchOptions8=["grade"=>"دوازدهم_","reshte"=>"انسانی"];
  $searchOptions9=["grade"=>"دوازدهم_","reshte"=>"تجربی"];
		
  $klasList1= $dars->search($searchOptions1);  
  $klasList2= $dars->search($searchOptions2);  
  $klasList3= $dars->search($searchOptions3);  
  $klasList4= $dars->search($searchOptions4);  
  $klasList5= $dars->search($searchOptions5);  
  $klasList6= $dars->search($searchOptions6);  
  $klasList7= $dars->search($searchOptions7);  
  $klasList8= $dars->search($searchOptions8);  
  $klasList9= $dars->search($searchOptions9);  
 
  $klasNameList_10th_math=[]; 
  $klasNameList_10th_ens=[]; 
  $klasNameList_10th_taj=[]; 
  $klasNameList_11th_math=[]; 
  $klasNameList_11th_ens=[]; 
  $klasNameList_11th_taj=[]; 
  $klasNameList_12th_math=[]; 
  $klasNameList_12th_ens=[]; 
  $klasNameList_12th_taj=[]; 
		
  foreach($klasList1 as $klasItem1){ 
   $klasNameList_10th_math[]=$klasItem1['dars']; 
  }
  
		foreach($klasList2 as $klasItem2){ 
   $klasNameList_10th_ens[]=$klasItem2['dars']; 
  }
		foreach($klasList3 as $klasItem3){ 
   $klasNameList_10th_taj[]=$klasItem3['dars']; 
  }
		foreach($klasList4 as $klasItem4){ 
   $klasNameList_11th_math[]=$klasItem4['dars']; 
  }
		foreach($klasList5 as $klasItem5){ 
   $klasNameList_11th_ens[]=$klasItem5['dars']; 
  }
		foreach($klasList6 as $klasItem6){ 
   $klasNameList_11th_taj[]=$klasItem6['dars']; 
  }
		foreach($klasList7 as $klasItem7){ 
   $klasNameList_12th_math[]=$klasItem7['dars']; 
  }
		foreach($klasList8 as $klasItem8){ 
   $klasNameList_12th_ens[]=$klasItem8['dars']; 
  }
		foreach($klasList9 as $klasItem9){ 
   $klasNameList_12th_taj[]=$klasItem9['dars']; 
  }
		
  $setonha=[ 
		"id"=>"ردیف",
		"grade"=>["type"=>"select","lbl"=>"پایه ","list"=>["دهم_","یازدهم_","دوازدهم_"]],
		"reshte"=>["type"=>"select","lbl"=>"رشته","list"=>["ریاضی_","انسانی_","تجربی_"]],
		"branch"=>["type"=>"select","lbl"=>"شعبه","list"=>["الف","ب","پ","د","ر"]],
	    "klasNameList_10th_math"=>["type"=>"checkbox","lbl"=>"دروس دهم ریاضی","list"=>$klasNameList_10th_math],
	    "klasNameList_10th_ens"=>["type"=>"checkbox","lbl"=>"دروس دهم انسانی","list"=>$klasNameList_10th_ens],
	    "klasNameList_10th_taj"=>["type"=>"checkbox","lbl"=>"دروس دهم تجربی","list"=>$klasNameList_10th_taj],
	    "klasNameList_11th_math"=>["type"=>"checkbox","lbl"=>"دروس یازدهم ریاضی","list"=>$klasNameList_11th_math],
	    "klasNameList_11th_ens"=>["type"=>"checkbox","lbl"=>"دروس یازدهم انسانی","list"=>$klasNameList_11th_ens],
	    "klasNameList_11th_taj"=>["type"=>"checkbox","lbl"=>"دروس یازدهم تجربی","list"=>$klasNameList_11th_taj],
	    "klasNameList_12th_math"=>["type"=>"checkbox","lbl"=>"دروس دوازدهم ریاضی","list"=>$klasNameList_12th_math],
	    "klasNameList_12th_ens"=>["type"=>"checkbox","lbl"=>"دروس دوازدهم انسانی","list"=>$klasNameList_12th_ens],
	    "klasNameList_12th_taj"=>["type"=>"checkbox","lbl"=>"دروس دوازدهم تجربی","list"=>$klasNameList_12th_taj],
		          ]; 
  ///////////////////////////////// 
 parent::__construct($conn,'clas',$setonha); 
 }
}

class student extends BASE{
	public function __construct($conn){
  $klas= new clas($conn); 
  $searchOptions=["id"=>"!=''"]; // تنظیم دستوران جستجو به صورت آرایه 
  $klasList= $klas->search($searchOptions); // دریافت نتایج جستجو از دیتابیس مربوطه 
  // استخراج اطلاعات کلاس ها 
  $klasNameList=[]; 
  foreach($klasList as $klasItem){ 
   $klasNameList[]=$klasItem['grade'].$klasItem['reshte'].$klasItem['branch'];  // استخراج نام کلاس و ذخیره در آرایه 
  } 
  $setonha=[ 
		"id"=>"ردیف",
		"name"=>["type"=>"text50","lbl"=>"نام"],
		"family"=>["type"=>"text100","lbl"=>"نام خانوادگی"],
		"code_meli"=>["type"=>"text10","lbl"=>"کد ملی"],
		"password"=>["type"=>"pass","lbl"=>"رمز عبور"],
		"fother_name"=>["type"=>"text100","lbl"=>"نام پدر"],
		"mother_name"=>["type"=>"text100","lbl"=>"نام مادر"],
		"grade"=>["type"=>"select","lbl"=>"پایه تحصیلی","list"=>["دهم","یازدهم","دواردهم"]],
		"reshte"=>["type"=>"select","lbl"=>"رشته تحصیلی","list"=>["ریاضی","انسانی","تجربی"]],
		"class_name"=>["type"=>"select","lbl"=>"انتخاب شعبه کلاس","list"=>["الف","ب","پ","د","ر"]],
		"birth"=>["type"=>"date","lbl"=>"تاریخ تولد"],
		"number"=>["type"=>"text20","lbl"=>"شماره موبایل"],
		"type"=>["type"=>"select","lbl"=>"نقش","list"=>["دانش آموز"]],
		"role"=>["type"=>"select","lbl"=>"دسترسی","list"=>["دانش آموز"]],
		"klas1"=>["type"=>"select","lbl"=>"کلاس","list"=>$klasNameList],
		"address"=>["type"=>"text200","lbl"=>"آدرس"],
		          ]; 
  ///////////////////////////////// 
 parent::__construct($conn,'student',$setonha); 
 }
}

class managers extends BASE{
	public function __construct($conn){
	$klas= new clas($conn); 
  $searchOptions=["id"=>"!=''"]; // تنظیم دستوران جستجو به صورت آرایه 
  $klasList= $klas->search($searchOptions); // دریافت نتایج جستجو از دیتابیس مربوطه 
  // استخراج اطلاعات کلاس ها 
  $klasNameList=[]; 
  foreach($klasList as $klasItem){ 
   $klasNameList[]=$klasItem['grade'].$klasItem['reshte'].$klasItem['branch'];  // استخراج نام کلاس و ذخیره در آرایه 
  } 
	 $setonha=[
		"id"=>"ردیف",
		"name"=>["type"=>"text50","lbl"=>"نام"],
		"family"=>["type"=>"text100","lbl"=>"نام خانوادگی"],
		"code_meli"=>["type"=>"text20","lbl"=>"کد ملی"],
		"password"=>["type"=>"pass","lbl"=>"رمز عبور"],
		"madrak"=>["type"=>"text100","lbl"=>"مدرک"],
		"birth"=>["type"=>"date","lbl"=>"تاریخ تولد"],
		"role"=>["type"=>"select","lbl"=>"نوع","list"=>["کادر مدرسه"]],
		"role2"=>["type"=>"select","lbl"=>"نقش","list"=>["مدبر مدرسه","معاون پرورشی","معاون آموزشی","معاون اجرایی","معاون فناوری","مشاور","معلم فعال","دانش آموز فعال","غیره"]],
		"type"=>["type"=>"checkbox","lbl"=>"دسترسی به پنل ها","list"=>["ثبت دوره","ثبت نام افراد در دوره","لیست کارکنان مدرسه","لیست معلمان","لیست دانش آموزان","لیست کلاس ها","لیست درس ها","تنظیمات صفحه اول سایت","اختیار تام","صندوق پیشنهادات و انتقادات","لیست روزانه","ثبت اخبار","نمرات نهایی"]],
									   
		];
		 parent::__construct($conn,'managers',$setonha); 
	}
}

class teacher extends BASE{
public function __construct($conn){ 
  /////////////////////////////////////// 
  $klas= new clas($conn); 
  $searchOptions=["id"=>"!=''"]; // تنظیم دستوران جستجو به صورت آرایه 
  $klasList= $klas->search($searchOptions); // دریافت نتایج جستجو از دیتابیس مربوطه 
  // استخراج اطلاعات کلاس ها 
  $klasNameList=[]; 
  foreach($klasList as $klasItem){ 
   $klasNameList[]=$klasItem['grade'].$klasItem['reshte'].$klasItem['branch'];  // استخراج نام کلاس و ذخیره در آرایه 
  }
	
   $dars= new dars($conn); 
   $searchOptions1=["id"=>"!=''"]; 

		
  $klasList1= $dars->search($searchOptions1);  
 
  $klasNameList_10th_math=[]; 

		
  foreach($klasList1 as $klasItem1){ 
   $klasNameL1[]=$klasItem1['dars']; 
  }
	
  $setonha=[ 
  "id"=>"ردیف", 
  "name"=>["type"=>"text50","lbl"=>"نام"], 
  "family"=>["type"=>"text100","lbl"=>"نام خانوادگی"], 
  "code_meli"=>["type"=>"text20","lbl"=>"کد ملی"], 
  "password"=>["type"=>"pass","lbl"=>"رمز عبور"], 
  "madrak"=>["type"=>"text100","lbl"=>"مدرک"], 
  "birth"=>["type"=>"date","lbl"=>"تاریخ تولد"], 
  "type"=>["type"=>"select","lbl"=>"نقش","list"=>["معلم"]], 
  "role"=>["type"=>"select","lbl"=>"دسترسی","list"=>["معلم"]],   
  "klas1"=>["type"=>"select","lbl"=>'کلاس(1)',"list"=>$klasNameList],
  "dars1"=>["type"=>"select","lbl"=>'درس کلاس(1)',"list"=>$klasNameL1],
  "klas2"=>["type"=>"select","lbl"=>'کلاس(2)',"list"=>$klasNameList],  
  "dars2"=>["type"=>"select","lbl"=>'درس کلاس(2)',"list"=>$klasNameL1],
  "klas3"=>["type"=>"select","lbl"=>'کلاس(3)',"list"=>$klasNameList],
  "dars3"=>["type"=>"select","lbl"=>'درس کلاس(3)',"list"=>$klasNameL1],
  "klas4"=>["type"=>"select","lbl"=>'کلاس(4)',"list"=>$klasNameList], 
  "dars4"=>["type"=>"select","lbl"=>'درس کلاس(4)',"list"=>$klasNameL1],
  "klas5"=>["type"=>"select","lbl"=>'کلاس(5)',"list"=>$klasNameList],  
  "dars5"=>["type"=>"select","lbl"=>'درس کلاس(5)',"list"=>$klasNameL1],
  "klas6"=>["type"=>"select","lbl"=>'کلاس(6)',"list"=>$klasNameList],  
  "dars6"=>["type"=>"select","lbl"=>'درس کلاس(6)',"list"=>$klasNameL1],
            ];
  ///////////////////////////////// 
 parent::__construct($conn,'teacher',$setonha); 
 }
}

class parents extends BASE{
	public function __construct($conn){
	parent::__construct($conn,'parents',[
		"id"=>"ردیف",
		"name"=>["type"=>"text50","lbl"=>"نام"],
		"family"=>["type"=>"text100","lbl"=>"نام خانوادگی"],
		"code_meli"=>["type"=>"code","lbl"=>"کد ملی"],
		"password"=>["type"=>"pass","lbl"=>"رمز عبور"],
		"madrak"=>["type"=>"text100","lbl"=>"مدرک"],
		"dars"=>["type"=>"date","lbl"=>"درس تخصصی"],
		"type"=>["type"=>"select","lbl"=>"نقش","list"=>["معلم","معلم فعال"]],
		"role"=>["type"=>"select","lbl"=>"دسترسی","list"=>["معلم"]],
		
									   
									   ]);
	}
}

class daly_list extends BASE{
	public function __construct($conn){
	parent::__construct($conn,'daly_list',[
		"id"=>"ردیف",
		"school_name1"=>["type"=>"text100","lbl"=>"نام مدرسه قسمت اول" ],
		"school_name2"=>["type"=>"text100","lbl"=>"نام مدرسه قسمت دوم"],
		"school_big_name"=>["type"=>"text200","lbl"=>"نام کامل مدرسه "],
		"tozih_mazaya"=>["type"=>"text200","lbl"=>"توضیحات مزایای مدرسه"],
		"tozih_online_class"=>["type"=>"text200","lbl"=>"توضیحات کلاس های آنلاین"],
		"tozih_dore"=>["type"=>"text200","lbl"=>"توضیحات برگزاری دوره ها"],
		"mazaya_madrese1"=>["type"=>"text50","lbl"=>"مزایای مدرسه:عنوان اول"],
		"mazaya_madrese_tozih1"=>["type"=>"text_rich","lbl"=>"مزایای مدرسه:توضیحات اول"],
		"mazaya_madrese_aks1"=>["type"=>"img","lbl"=>"مزایای مدرسه:عکس اول"],
		"mazaya_madrese2"=>["type"=>"text50","lbl"=>"مزایای مدرسه:عنوان دوم"],
		"mazaya_madrese_tozih2"=>["type"=>"text_rich","lbl"=>"مزایای مدرسه:توضیحات دوم"],
		"mazaya_madrese_aks2"=>["type"=>"img","lbl"=>"مزایای مدرسه:عکس دوم"],
		"mazaya_madrese3"=>["type"=>"text50","lbl"=>"مزایای مدرسه:عنوان سوم"],
		"mazaya_madrese_tozih3"=>["type"=>"text_rich","lbl"=>"مزایای مدرسه:توضیحات سوم"],
		"mazaya_madrese_aks3"=>["type"=>"img","lbl"=>"مزایای مدرسه:عکس سوم"],
		
									   ]);
	}
}

class dore extends BASE{
	public function __construct($conn){
	parent::__construct($conn,'dore',[
		"id"=>"ردیف",
		"dore_name"=>["type"=>"text100","lbl"=>"نام دوره" ],
		"dore_lid"=>["type"=>"text400","lbl"=>"توضیحات دوره"],
		"dore_image"=>["type"=>"img","lbl"=>"تصویر دوره"],
		"dore_teacher_name"=>["type"=>"text100","lbl"=>"نام معلم دوره" ],
		"teacher_image"=>["type"=>"img","lbl"=>"تصویر معلم دوره"],
		
									   ]);
	}
}

class daly_information extends BASE{
public function __construct($conn){ 
  /////////////////////////////////////// 

  $setonha=[ 
  "id"=>"ردیف",
  "klas_name"=>["type"=>"text50","lbl"=>"نام کلاس"],
  "dars_name"=>["type"=>"text50","lbl"=>"نام درس"],
  "teacher_name"=>["type"=>"text50","lbl"=>"نام معلم"],
  "teacher_code_meli"=>["type"=>"text50","lbl"=>"کد ملی معلم"],
  "student_name"=>["type"=>"text50","lbl"=>"نام دانش آموز"],
  "student_code_meli"=>["type"=>"text50","lbl"=>"کد ملی دانش آموز"],
  "stat"=>["type"=>"radio","lbl"=>"وضعیت حضور","list"=>["حاضر","غایب","غیبت موجه"]],
  "daly_nomre"=>["type"=>"number","lbl"=>"نمره روزانه","list"=>[0,20]],
  "tozihat"=>["type"=>"text50","lbl"=>"توضیحات"],
  "tarikh"=>["type"=>"text50","lbl"=>"تاریخ"],
  "date"=>["type"=>"timestamp","lbl"=>"ثبت"],
  "last_update"=>["type"=>"last_timestamp","lbl"=>"ویرایش"],
   // ثبت کلاسها برای معلم    
            ]; 
  ///////////////////////////////// 
 parent::__construct($conn,'daly_information',$setonha); 
 }
}

class register_dore extends BASE{
	public function __construct($conn){
	parent::__construct($conn,'register_dore',[
		"id"=>"ردیف",
		"ful_name"=>["type"=>"text100","lbl"=>"نام کامل" ],
		"number"=>["type"=>"text20","lbl"=>"شماره موبایل"],
		"dore_name"=>["type"=>"text100","lbl"=>"نام دوره"],
		"confinm"=>["type"=>"checkbox","list"=>["تایید"],"lbl"=>"تایید نهایی"],
									   ]);
	}
}

class box extends BASE{
	public function __construct($conn){
	parent::__construct($conn,'box',[
		"id"=>"ردیف",
		"ful_name_sug"=>["type"=>"text100","lbl"=>"نام کامل","val"=>"ناشناس"],
		"number_sug"=>["type"=>"text20","lbl"=>"شماره موبایل","val"=>"ناشناس"],
		"payam"=>["type"=>"text400","lbl"=>"متن پیام"],
		"tarikh"=>["type"=>"timestamp","lbl"=>"زمان ارسال"],
									   ]);
	}
}

class news extends BASE{
	public function __construct($conn){
	parent::__construct($conn,'news',[
		"id"=>"ردیف",
		"reporter_name"=>["type"=>"text100","lbl"=>"نام خبرنگار"],
		"aks"=>["type"=>"img","lbl"=>"تصویر خبر"],
		"titr"=>["type"=>"text100","lbl"=>"تیتر"],
		"lid"=>["type"=>"text200","lbl"=>"لید"],
		"matn"=>["type"=>"text_rich","lbl"=>"متن خبر"],
		"tarikh"=>["type"=>"timestamp","lbl"=>"زمان ثبت"],
									   ]);
	}
}

class nobat_nomre extends BASE{
	public function __construct($conn){
	parent::__construct($conn,'nobat_nomre',[
  "id"=>"ردیف",
  "klas_name"=>["type"=>"text50","lbl"=>"نام کلاس"],
  "dars_name"=>["type"=>"text50","lbl"=>"نام درس"],
  "student_name"=>["type"=>"text50","lbl"=>"نام دانش آموز"],
  "student_code_meli"=>["type"=>"text50","lbl"=>"کد ملی دانش آموز"],
  "mon_1"=>["type"=>"number","lbl"=>"نمره سه ماهه اول","list"=>[0,20]],
  "mon_2"=>["type"=>"number","lbl"=>"نمره سه ماهه دوم","list"=>[0,20]],
  "mon_3"=>["type"=>"number","lbl"=>"نمره سه ماهه سوم","list"=>[0,20]],
  "nobat_1"=>["type"=>"number","lbl"=>"نمره نوبت اول","list"=>[0,20]],
  "nobat_2"=>["type"=>"number","lbl"=>"نمره نوبت دوم","list"=>[0,20]],
  "finaly"=>["type"=>"number","lbl"=>"نمره نهایی","list"=>[0,20]],
  "date"=>["type"=>"timestamp","lbl"=>"ثبت"],
  "last_update"=>["type"=>"last_timestamp","lbl"=>"ویرایش"],
									   ]);
	}
}