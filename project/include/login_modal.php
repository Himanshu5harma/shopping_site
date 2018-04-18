<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document" >
    <div class="modal-content"  id="modalback">
      <div class="modal-header" id="modalhead">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"  style="color: white;">&times;</span></button>
        <h1 class="modal-title" id="myModalLabel" >Welcome to LookBefore</h1>
      </div>
      <div class="modal-body" >
            <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs nav-justified" >
    
    <li class="active"><a href="#login"  role="tab" data-toggle="tab">Log In</a></li>
    <li ><a href="#signup" role="tab" data-toggle="tab">Sign Up</a></li>
  </ul>


  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="login">
        <form action="index.php" method="post" autocomplete="off">
          

        <div>
            
            <div class="input-group input-group-md col-lg-7 login">
          <span class="input-group-addon" id="sizing-addon1">Phone No*</span>
           <input type="text" class="form-control" placeholder="Phone No*" name="Phone" aria-describedby="sizing-addon1" required>
          </div>
          
          <div class="input-group input-group-md col-lg-7 login">
          <span class="input-group-addon" id="sizing-addon1">password*</span>
           <input type="Password" class="form-control" placeholder="password*" name="pass" required>
          </div>
          

        </div>
         <div style="text-align: right">
            
           <label class="radio-inline"><input type="radio" value="sailer" id="check1" name="check_reg"> Sailer</label>
          
          <label class="radio-inline"><input type="radio" value="customer"  name="check_reg" checked="checked ">customer</label>
          </div>
          
          <p class="forgot login" style="text-align: right"><a href="forgot.php">Forgot Password?</a></p>
          
          
          <div class="modal-footer" style="background:#2D2B2B">
        
        <button type="submit" class="btn btn-primary" name="login">Log In</button>
      </div>
          </form>
    </div>
    <div role="tabpanel" class="tab-pane" id="signup">
      <form action="index.php" method="post" autocomplete="off" id="sign_up_form">
          

        <div>
          
              <div class="input-group input-group-md col-lg-7 login">
          <span class="input-group-addon" id="sizing-addon1" >First Name*</span>
           <input type="text" class="form-control" placeholder="First Name*" name="fname" pattern="[A-Za-z]{2,}" aria-describedby="sizing-addon1" required>
          </div>


            <div class="input-group input-group-md col-lg-7 login">
          <span class="input-group-addon" id="sizing-addon1">Last Name*</span>
           <input type="text" class="form-control" placeholder="Last Name* " name="lname" pattern="[A-Za-z]{2,}" aria-describedby="sizing-addon1" required>
          </div>  
          

            <div class="input-group input-group-md col-lg-7 login">
          <span class="input-group-addon" id="sizing-addon1">Phone No*</span>
           <input type="text" class="form-control" placeholder="Phone No*" name="Phone" aria-describedby="sizing-addon1" required>
          </div>
          
          <div class="input-group input-group-md col-lg-7 login" style="margin-bottom: 20px">
          <span class="input-group-addon" id="sizing-addon1">password*</span>
           <input type="password" class="form-control" placeholder="password*" name="pass" aria-describedby="sizing-addon1" required>
          </div>
        </div>
         <div style="text-align: right; margin-bottom: 10px;" >
            
           <label class="radio-inline"><input type="radio" value="sailer" id="check1" name="check_reg"> Sailer</label>
          
          <label class="radio-inline"><input type="radio" value="customer"  name="check_reg" checked="checked">customer</label>
          </div>
      
          <div class="modal-footer " style="background:#2D2B2B">
               <button type="submit" class="btn btn-primary" name="register">Sign Up</button>
          </div>


      </form>
    </div>
    <?php 
    /*
    if(isset($_SESSION['Phone'] )){
 $_SESSION['Phone']=$_POST['Phone'];
  }*/
?>    
  </div>

</div>
              
      </div>
      
    </div>
  </div>
</div>


