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
            <h3>Log In</h3><hr>
            <form action="<?php echo base_url('app/validatelogin');?>" method="post">
              <input type="text" name="username" placeholder="Mobile No:" required class="my-3 form-control">
              <input type="password" name="password" placeholder="Password: " required class="my-3 form-control">              
              <button type="submit" class="btn btn-warning btn-block">Log In</button>
              <p>Don't have an account <a href="<?php echo base_url('app/register');?>">Register Here</a></p>              
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