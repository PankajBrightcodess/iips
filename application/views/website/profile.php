<section class="">
      <div class="container-fluid">
        <div class="row" style='background-color:#f9eeb8;'>
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
            <section class="profile">
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <div class="profile-details">
                      <h3>Profile</h3><hr>
                      <div class="row">
                        <div class="col-md-3">
                          <div class="profile-image">
                            <img src="<?php echo file_url($cusdata['cust_image']); ?>" class="img-fluid" alt="profile">
                          </div>
                        </div>
                        <div class="col-md-9 adj-details">
                          <div class="profile-name">
                            <p>Hello,</p>
                            <p><?php echo $cusdata['cust_name'] ?></p>
                          </div>
                          <p style="margin-top: 20px;"><b>Name : </b><?php echo $cusdata['cust_name'] ?></p>
                          <p><b>Email : </b><?php echo $cusdata['cust_email'] ?></p>
                          <p><b>Mobile No. : </b><?php echo $cusdata['cust_mobile'] ?></p>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>

                    
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