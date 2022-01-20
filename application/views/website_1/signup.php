<section class="">
      <div class="container-fluid">
        <div class="row" style='background-color:#f9eeb8;'>
          <div class="col-md-2"></div>
          <div class="col-md-8 p-3">
          <!---------------------------------- Response Msg ------------------------------------------->
          <?php 
                $popup="d-none";
                $msg=$pstatus=$picon='';
                if($this->session->flashdata('request_msg')!==NULL){
                  $msg=$this->session->flashdata('request_msg');
                  $pstatus="success";
                  $picon="check";
                  $popup="";
                }
                if($this->session->flashdata('request_err_msg')!==NULL){
                  $msg=$this->session->flashdata('request_err_msg');
                  $pstatus="danger";
                  $picon="exclamation";
                  $popup="";
                }
            ?>
            <div class="alert alert-<?php echo $pstatus ?> alert-dismissible msg-popup <?php echo $popup ?>">
              <button type="button" id='msgpopup' class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <i class="icon fa fa-<?php echo $picon ?>"></i>
              <?php echo $msg; ?>
            </div>
            <!---------------------------------- End Response Msg ------------------------------------------->
            <h3>Create New Account</h3><hr/>
            <!-- <form action="<?php //echo base_url('website/saveregister');?>" method='POST'>
              <div class="form-group row pl-2 pr-2">
                <div class="col-md-2"></div>
                <label for="first_name" class='col-12 col-md-3'>First Name <span class='text-danger'>*</span></label>
                <input type="text" name="first_name" id="first_name" required='true' placeholder='Enter Your First Name' class='col-12 col-md-5 form-control'>
                <div class="col-md-2"></div>
              </div>
              <div class="form-group row pl-2 pr-2">
                <div class="col-md-2"></div>
                <label for="last_name" class='col-12 col-md-3'>Last Name </label>
                <input type="text" name="last_name" id="last_name" required='true' placeholder='Enter Your Last Name (optional)' class='col-12 col-md-5 form-control'>
                <div class="col-md-2"></div>
              </div>
              <div class="form-group row pl-2 pr-2">
                <div class="col-md-2"></div>
                <label for="email" class='col-12 col-md-3'>Email Id <span class='text-danger'>*</span></label>
                <input type="email" name="email" id="email" required='true' placeholder='Enter Your Mail Id' class='col-12 col-md-5 form-control'>
                <div class="col-md-2"></div>
              </div>
              <div class="form-group row pl-2 pr-2">
                <div class="col-md-2"></div>
                <label for="mobileno" class='col-12 col-md-3'>Mobile No <span class='text-danger'>*</span></label>
                <input type="number" name="mobileno" id="mobileno" required='true' placeholder='Enter Your Mobile No' class='col-12 col-md-5 form-control'>
                <div class="col-md-2"></div>
              </div>
              <div class="form-group row pl-2 pr-2">
                <div class="col-md-2"></div>
                <label for="password" class='col-12 col-md-3'>Password <span class='text-danger'>*</span></label>
                <input type="password" name="password" id="password" required='true' placeholder='Enter Password' class='col-12 col-md-5 form-control'>
                <div class="col-md-2"></div>
              </div>
              <div class="form-group row pl-2 pr-2">  
                <div class="col-md-2"></div>
                <button type="submit" class='col-8 btn btn-success'>Register</button>
                <div class="col-md-2"></div>
              </div>
            </form>  -->

            <section class="login">              
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <div class="login-form">
                      <h4>Register on Bless Fresh</h4>
                      <form action="<?php echo base_url('website/saveregister');?>" method='POST'>
                        <input type="text" name="first_name" class="form-control py-4" placeholder="First Name:" required="">
                        <input type="text" name="last_name" class="form-control py-4" placeholder="Last Name:" required="">
                        <input type="email" name="email" placeholder="Email Address:" class="form-control py-4" required>
                        <input type="number" name="mobileno" placeholder="Mobile No:" class="form-control py-4" required>
                        <input type="password" name="password" placeholder="Password:" class="form-control py-4" required>                        
                        <button type="submit" class="btn btn-danger btn-block py-3">Register</button>
                      </form>
                      <div class="text-center my-2">
                        <a href="<?php echo base_url('/login');?>">Login</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
          <div class="col-md-2"></div>
          
                    
        </div>
      </div>
    </section>

    
    
    <div id="PgFooter"><?php $this->load->view('website/footer');?></div>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
      setTimeout(function() {
		    $('#msgpopup').click();
	    },5000);    
    </script>
  </body>
</html>