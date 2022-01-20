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
            <section class="product-description">
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <div class="description-left">
                      <img src="<?php echo file_url("assets/images/glo.png") ?>" class="img-fluid" alt="delete">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="description-right">
                      <h4>Product Name</h4>
                      <h5 style="margin-top: 15px;">₹ 14400 <sup><del>₹ 16000</del> <span style="color:green;">10% Off</span></sup></h5>
                      <div class="btn-cart">
                        <button class="btn btn-success">Add To Cart</button> &nbsp;&nbsp;<button class="btn btn-warning">Buy Now</button>
                      </div>
                      <h4 style="margin-top: 15px;">Product Description</h4><hr style="margin:0; padding: 0;">
                      <p style="margin-top: 10px;">Product Description Here</p>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="row mt-5">
                  <div class="col-md-12">
                    <h5>Product Description</h5><hr>
                    <p>Description Here</p>
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