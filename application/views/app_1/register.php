    <section class="FilterBar">
      <div class="container-fluid">
        <div class="row">
          <div class="col-6"><a href="<?php if(!empty($_SERVER['HTTP_REFERER'])){echo $_SERVER['HTTP_REFERER']; }else{echo base_url('/app');}?>" class="back"><i class="fas fa-arrow-left"></i></a> </div>
        </div>
      </div>
    </section>
    <section class="LogInPg">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <h3>Register Here</h3><hr>
            <form action="<?php echo base_url('app/saveregister');?>" method='POST'>
                <input type="text" name="first_name" class="form-control my-3" placeholder="First Name:" required="">
                <input type="text" name="last_name" class="form-control my-3" placeholder="Last Name:" required="">
                <input type="email" name="email" placeholder="Email Address:" class="form-control my-3" required>
                <input type="number" name="mobileno" placeholder="Mobile No:" class="form-control my-3" required>
                <input type="password" name="password" placeholder="Password:" class="form-control my-3" required>                        
                <button type="submit" class="btn btn-warning btn-block my-3">Register</button>
                <p><a href="<?php echo base_url('app/login');?>">Login If Already Registered</a></p>
            </form>
          </div>
        </div>
      </div>
    </section>
    
    <?php $this->load->view("app/footer"); ?>     
    <?php $this->load->view('app/main-footer-links');?> 
    <script>

    </script> 
  </body>
</html>