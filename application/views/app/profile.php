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
            <h3>Profile</h3><hr>
            <div class="row">
                <div class="col-md-12 card p-3">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-12 col-md-6 text-center">
                            <p><?php //echo PRE;echo print_r($customerdata);?>
                                <img src="<?php echo file_url("$customerdata[cust_image]");?>" alt="profile_img" width='150px' height='150px' class='img-fluid rounded-circle'>
                            </p>
                            <h3><?php echo ucwords($customerdata['cust_name']);?></h3>
                            <p class='mb-0' style='font-size:14px'><?php echo $customerdata['cust_email'];?></p>
                            <p class='mb-0' style='font-size:14px'>+91 <?php echo $customerdata['cust_mobile'];?></p>
                        </div>
                        <div class="col-md-3"></div>                        
                    </div>                   
                    
                </div>
            </div>
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