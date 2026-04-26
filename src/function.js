// JavaScript Document
function seperate(Number) {
Number+= '';
Number= Number.replace(',', '');
x = Number.split('.');
y = x[0];
z= x.length > 1 ? '.' + x[1] : '';
var rgx = /(\d+)(\d{3})/;
while (rgx.test(y))
y= y.replace(rgx, '$1' + ',' + '$2');
return y+ z;
}	
class Product {
  constructor(id=null, name=null, description=null, price=null,pic=null,number=0,maxCount,type) {
    this.id = id;
    this.name = name;
    this.description = description;
    this.price = Number(price);
	this.pic=pic;
	this.number=Number(number);
	this.maxCount=Number(maxCount);
	this.type=type;
	
  }
	getName(){
		
		return decodeURI(this.name).replace(/\+/g," ");
	}
	getDescription(){
		return decodeURI(this.description).replace(/\+/g," ");
	}
	getPic(){
		return decodeURI(this.pic).replace(/\+/g," ");
	}
	addCount(Num=1){
		this.number=this.number+Num;
	}
	encodeStrings(){
		this.name= encodeURI(this.name);
		this.description= encodeURI(this.description);
		this.pic= encodeURI(this.pic);
	}
	decodeStrings(){
		this.name= decodeURI(this.name).replace(/\+/g," ");
		this.description= decodeURI(this.description).replace(/\+/g," ");
		this.pic= decodeURI(this.pic).replace(/\+/g," ");
	}
}
class Sabad{
	
 constructor(dataname='sabad') {
   // this.getProducts();
	 this.dataName = dataname;
  }
 getCount(){
	var ss= sessionStorage.getItem(this.dataName);
		var products;
		if(ss){
			products=JSON.parse(ss);
			//products=ss.split(',');
		}else{
			products=[];
			
		}
	var n=0
	 for(var i=0 ; i<products.length ; i++){
		 n+=Number(JSON.parse(products[i]).number);
	 }
		 return n;
}
 getProducts(){
		var ss= sessionStorage.getItem(this.dataName);
		var products;
		if(ss){
			products=JSON.parse(ss);
		}else{
			products=[];
			
		}
		var array_pro=[];
		for (var i = 0; i < products.length; i++) {
			var pro =JSON.parse(products[i]);
			array_pro.push(new Product(pro.id,pro.name,pro.description,pro.price,pro.pic,pro.number,pro.maxCount));
		}
		return array_pro;
}
 getItem(id){
		var ss= sessionStorage.getItem(this.dataName);
		var products;
		if(ss){
			products=JSON.parse(ss);
		}else{
			products=[];
		}
		let finded_pro=new Product();
		for (var i = 0; i < products.length; i++) {
			let pro =JSON.parse(products[i]);
			if(pro.id==id){
				finded_pro=JSON.parse(products[i]);
			}
		}
		return finded_pro;
}
 getTotalAmount(){
	var ss= sessionStorage.getItem(this.dataName);
		var products;
		if(ss){
			//products=ss.split(',');
			products=JSON.parse(ss);
		}else{
			products=[];
			
		}
		this.count=products.length;
		var total=0;
		for (var i = 0; i < products.length; i++) {
			var pro =JSON.parse(products[i]);
			total+=pro.price*pro.number;
			this.checkCount(pro.id);
		}
		return total;
}
 setResults(user_id=-1){
	var total=this.getTotalAmount();
	
	document.getElementById("total_hidden").value=total;
	var ps= this.getProducts();
	var a='';
	  if(ps.length==0){
		   document.getElementById("payButton").setAttribute('disabled','true');
		 a+=' <b> سبد خالی است!</b>';
	 }else{
		  document.getElementById("payButton").removeAttribute('disabled');
	 }
	 var hiddenItem='';
	 a+='<table class="table table-responsive table-hover">'+
	'<thead>'+
	' <tr>  <th >#</th>     <th>نام</th>      <th >تعداد</th>      <th >فی</th>      <th>قیمت</th>      <th></th>    </tr>'+
	'</thead>'+
  '<tbody>';
   
   document.getElementById("sabadFormHiddenItems").innerHTML="";
	for(var ii=0; ii<ps.length ; ii++){
		this.checkCount(ps[ii].id,user_id);
		var num= ii+1;
		a+=' <tr><th>'+num+
			'</th><td><small>'+ps[ii].getName()+'</small>'+
			'</td><td width="5"><input onChange="editInSabad('+ps[ii].id+',this.value)" type="number"  maxlength="5" max="'+ps[ii].maxCount+'" min="1" pattern="^\d+" value="'+ps[ii].number+'">'+
			'</td><td>'+seperate(ps[ii].price)+
			'</td><td>'+seperate(ps[ii].price*ps[ii].number)+
			'</td><td>'+'<a class="btn btn-light"><img onClick="deleteFromSabad('+ps[ii].id+')" src="images/site_images/delete.png" width="15"></a>'+
			'</td></tr>';
		
		//a+=" "+num+"- "+ps[ii].getName();
		
		//a+=" <img src='"+ps[ii].getPic()+"'>";
		//a+=" id:"+ps[ii].id;
		hiddenItem='<input type="hidden" name="'+ps[ii].id+'" value="'+ps[ii].number+'">';
		document.getElementById("sabadFormHiddenItems").innerHTML+=hiddenItem;
		//a+=" <b class='text-danger'>"+ps[ii].number+"</b> عدد<b class='text-danger'> "+seperate(ps[ii].price*ps[ii].number)+"</b> تومان";
	}
	 a+=' </tbody> </table>';
	 a+='کل قیمت: <b>'+seperate(total)+'</b> <span class="text-danger">تومان</span><br> تعداد کل: <b>'+this.getCount()+'</b> عدد';
	document.getElementById("total_price").innerHTML=a;
	 if(ps.length==0){
		
	 }
	
	}
 removeItem(id){
	var ss= sessionStorage.getItem(this.dataName);
		
		var products=[];
		if(ss){
			products=JSON.parse(ss);
			//products=ss.split(',');
		}else{
			products=[];
		}
		//alert(products);
		var array_new= [];
		for (var i = 0; i < products.length; i++) {
			//alert(JSON.parse(products[i]).id);
			if(JSON.parse(products[i]).id!=id){
				array_new.push(products[i]);
			}
			
		}
		
		products=array_new;
		sessionStorage.removeItem(this.dataName);
		sessionStorage.setItem(this.dataName,JSON.stringify(products));
	 	this.checkCount(id);
		this.setResults();
		return true;
}
 addNewItem(product){
	 	
	 	var count_product=0;
		var ss= sessionStorage.getItem(this.dataName);
		var products=[];
		if(ss){
			products=JSON.parse(ss);
			//products=ss.split(',');
		}else{
			products=[];
		}
		//alert(products);
		var array_new= [];
	 	var finded=false;
		for (var i = 0; i < products.length; i++) {
			let product_i=JSON.parse(products[i]);
			//alert(JSON.parse(products[i]).id);
			if(product_i.id==product.id){
				
				finded=true;
				
			if(product.number>0){
				product_i.number=product.number;
			}else{
				product_i.number++;
			}
				if(product_i.number > product_i.maxCount){
					product_i.number = product_i.maxCount
				}
				
				count_product=product_i.number;
			}
			array_new.push(JSON.stringify(product_i));
			 
		}
	 	
		if(array_new.length==0 || !finded){
			// پیدا نشده یا سبد خالی باشد
				
				if(product.number==0){
					product.addCount();	
				}
				if(product.number > product.maxCount){
					product.number = product.maxCount
				}
			
			array_new.push(JSON.stringify(product));
			
			count_product=product.number;
		}
		products=array_new;
		sessionStorage.removeItem(this.dataName);
		sessionStorage.setItem(this.dataName,JSON.stringify(products));
		this.setResults();
	 	
		return count_product;
}
 removeAllItems(){
	var ps= this.getProducts();
	sessionStorage.removeItem(this.dataName);
	for(var ii=0; ii<ps.length ; ii++){
		this.checkCount(ps[ii].id);
	}
	 this.setResults();
}
 checkCount(product_id,user_id=-1){
	// alert(user_id);
	 // تعداد هر سفارش را بررسی و به روز می کند
	var p=this.getItem(product_id);
	document.getElementById("count"+product_id).innerHTML=""+p.number;
	 if(p.number==0){
		 document.getElementById("sabadManager"+product_id).style.display="none";;
		 document.getElementById("addToSabad"+product_id).style.display="";
	 }else{
		 document.getElementById("sabadManager"+product_id).style.display="";;
		 document.getElementById("addToSabad"+product_id).style.display="none";
	 }
	 if(user_id!=-1){
	 	//ajax_post(product_id,p.number,'addToSabad',user_id);
	 }
}
}
function addToSabad(product_id,name,description,price,pic,maxCount,user_id=-1){
	// ممکن است محصول از قبل در سبد نباشد
	p= new Product(product_id,name,description,price,pic,0,maxCount);
	s = new Sabad();
	var count_product=s.addNewItem(p);
	if(user_id!=-1){
		//ajax_post(product_id,count_product,'addToSabad',user_id);
	}
	var name2 = decodeURI(name).replace(/\+/g," ");
	var toastMsg ='تعداد '+count_product+' عدد '+name2 +' به سبد افزوده شد';
	toastMsg+= getSabadButton();
	//setToast(toastMsg,'idman');
}
function editInSabad(product_id,count){
	// حتما از ثبل در سبد موجود است
	count1= Number(count);
	if(count1==0){
		deleteFromSabad(product_id);
		
	}else if(count1>0){
		p= new Product(product_id,"name","description","price","pic",count1);
		s = new Sabad();
		var count_product=s.addNewItem(p);
		if(user_id!=-1){
			//ajax_post(product_id,count_product,'addToSabad',user_id);
		}
		var name2 = decodeURI(name).replace(/\+/g," ");
		var toastMsg ='تعداد '+count_product+' عدد '+name2 +' به سبد افزوده شد';
		toastMsg+= getSabadButton();
		setToast(toastMsg,'idman');
	}else{
		var toastMsg ='تعداد وارد شده نامعتبر است!';
		setToast(toastMsg,'idman');
	}
	
}
function deleteFromSabad(product_id,user_id=-1){
	s = new Sabad;
	s.removeItem(product_id);
	if(user_id!=-1){
		//ajax_post(product_id,0,'deleteFromSabad',user_id);
	}
	var toastMsg ='از سبد حذف شد';
	toastMsg+= getSabadButton();
	setToast(toastMsg,'idman');
}
function loadSabad(user_id=-1){
	s= new Sabad();
	s.setResults(user_id);
}
function deleteSabad(store_id=-1,user_id=-1){
	s= new Sabad();
	s.removeAllItems();
	if(user_id!=-1 && store_id!=-1){
		//ajax_post(store_id,0,'deleteSabad',user_id);
	}
	var toastMsg ='سبد خالی شد';
	toastMsg+= getSabadButton();
	setToast(toastMsg,'idman');
	
}
function getSabadButton(){
	var toastMsg= '<hr><a class="btn " data-bs-toggle="modal" data-bs-target="#sabadModal">'+
		'<img class="bg-light rounded round-5 shadow" width="30" src="images/site_images/sabad.png" >'+
		'<small>مشاهده سبد خرید</small></a>';
	return toastMsg;
}
function ajax_post(pro_id,val,requestType,user_id,store_id){
	  //top.location="niaz.php?school="+school+"&dore="+dore+"&course="+course;
				document.getElementById('ajax_result').innerHTML='در حال بارگذاری..';
				const toast = new bootstrap.Toast(document.getElementById('liveToast'))
    			toast.show()
	 // document.getElementById('ajax_result').innerHTML=m;
	 // move();
	
		if (window.XMLHttpRequest){xmlhttp=new XMLHttpRequest();}else {  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}

	 	xmlhttp.onreadystatechange=function() 
		{ 
		
	 		if (xmlhttp.readyState==4 && xmlhttp.status==200 ) 
			{ 
			//alert(""+xmlhttp.responseText);
				
				//document.getElementById('ajax_result').innerHTML=xmlhttp.responseText;

				setToast(xmlhttp.responseText,'newId');
				
	
			}else{
				document.getElementById('ajax_result').innerHTML=xmlhttp.responseText;;
				const toast = new bootstrap.Toast(document.getElementById('liveToast'))
    			toast.show()
				
				//const toast = new bootstrap.Toast(document.getElementById('liveToast'))
    			//toast.show()
			}
		};
		
	//var data_val=document.getElementById(data_id).value;
	//var data_name=document.getElementById(data_id).name;
	//var data="data_name="+data_name+"&data_val="+data_val+"&state=edit";
	var data=
	'pro_id='+pro_id+
	'&user_id='+user_id+
	'&store_id='+store_id+
	'&val='+val+
	'&requestType='+requestType+
	'&sender=siteuser';
	
		xmlhttp.open("POST","requests.php",true);
		xmlhttp.setRequestHeader( "Content-type" , "application/x-www-form-urlencoded" ) ;
	  	xmlhttp.send(data);
		
		//document.getElementById(ajaxResult).innerHTML=data;
		
	}