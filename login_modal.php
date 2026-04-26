<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
		
      <div class="modal-dialog">
		  
        <div class="modal-content">
			
          <div class="modal-header rang row m-0"> 
            <button  type="button" class="btn-close col-1" data-bs-dismiss="modal" aria-label="Close"></button>
			  <div class="col-11 m-0">
				  <h5 class="text-end modal-title">ورود</h5>
			  
			  </div>
          </div>
			
          <div class="modal-body rang">
			  
            <form id="loginformmodal" name="loginformmodal">
				
                  <input hidden="" name="login_name" type="text" class="form-control">
				
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
			
          <div dir="ltr" class="modal-footer bg-light">
			  
            <button type="button" class=" btn btn-outline-secondary shadow" data-bs-dismiss="modal">بستن</button>
    		<a class=" btn btn-outline-secondary shadow" href="Register_page.php" target="_blank">فراموشی رمز عبور</a>
    		<button type="submit" name="login" form="loginformmodal" class="btn btn-outline-secondary shadow">ورود</button>
			  
          </div>
        </div>
      </div>
    </div>

