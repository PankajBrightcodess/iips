<section class="">
      <div class="container-fluid">
        <div class="row">
        <?php //echo PRE;print_r($_SESSION);//unset($_SESSION['mycart']);?>          
            <section class="cart-page">
              <div class="container">
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
                <!-------------------------------------End Of Response Msg --------------------------------------->
                <div class="row">
                  <div class="col-md-12">
                  <div class="card-items">
                    <div class="row">
                      <div class="col-md-9">
                        <div class="item-part">
                          <h5>My Cart(<?php echo $cart_total;?>)</h5><hr>
                          <?php $paytotal = 0; $pricetotal = 0;?>
                          <?php if(!empty($cartcontentlist)){
                            foreach($cartcontentlist as $key=>$clist){ 
                              $productdata = $clist['productdata'];
                              ?>
                          <div class="row">
                            <div class="col-md-3 mt-4">
                              <div class="pro-img">
                                
                                <img src="<?php echo file_url("$productdata[path]") ?>" class="img-fluid" alt="product-image">
                              </div>
                                 <p style="text-align: center;">Quantity : <?php echo $clist['qty'];?> </p>
                            </div>
                            <div class="col-md-4 mt-4 text-center">
                              <p><b><?php echo $productdata['product_name']; ?></b></p>
                                <p style="margin-top: 30px;"><b><s class='text-danger'>₹<?php echo $this->amount->toDecimal($productdata['variant_price']);?></s> <span class="text-success">₹<?php echo $this->amount->toDecimal($productdata['variant_offerprice']);?></span></b></p>
                                <?php 
                                $pricetotal += $productdata['variant_price']*$clist['qty'];
                                $paytotal += $productdata['variant_offerprice']*$clist['qty'];
                                ?>                                
                            </div>
                            <div class="col-md-5 mt-4">
                              <h6><b>Product Description</b></h6><hr style="margin: 0; padding: 0;">
                              <p class="mt-1 mb-1"><?php echo $productdata['product_name'].' - '.$productdata['variantname']?></p>
                              <?php if(!empty($productdata['desp'])){?>
                              <p class="mt-1"><?php word_limiter($productdata['desp'],50,'...');?></p>
                              <?php } ?>
                              <div class="trash-icon">
                                <a href='<?php echo base_url("website/removeprod_cart/$key");?>'>
                                  <img src="<?php echo file_url("assets/images/delete.png") ?>" class="img-fluid" alt="delete" title="Remove Item">
                                </a>
                              </div>
                            </div>
                            <div class="clearfix"></div>
                          </div><hr style="margin-top: 10px;">
                          <?php }
                          }else{
                            echo 'Cart is Empty';
                          }?>
                          
                          

                          <div class="row mt-2">
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6 adj-order-btn">
                              <a href='<?php echo base_url('/');?>'><button class="btn btn-warning">Continue Shoping</button></a>
                              <a href='<?php echo base_url('website/cart_checkout');?>'>
                                <button class='btn btn-success'> Proceed To Checkout </button>
                              </a>
                            </div>
                            <div class="clearfix"></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="price-part">
                          <h5>Price Details</h5><hr>
                          <div class="row">
                            <div class="col-7">
                              <p class="adj-font">Price (<?php echo $cart_total;?> Items)</p>
                            </div>
                            <div class="col-5">
                              <p class="adj-font" style="text-align: right;">₹<?php echo $this->amount->toDecimal($pricetotal);?></p>
                            </div>
                            <div class="clearfix"></div>
                          </div><hr>
                          <div class="row">
                            <div class="col-7">
                              <p class="adj-font">Saving Amount</p>
                            </div>
                            <div class="col-5">
                              <p class="adj-font text-danger" style="text-align:right;font-weight:400">
                              <?php $diff_total = $pricetotal-$paytotal;?>
                              ₹<?php echo $this->amount->toDecimal($diff_total);?> </p>
                            </div>
                            <div class="clearfix"></div>
                          </div><hr>
                          <div class="row">
                            <div class="col-7">
                              <p class="adj-font">Pay Amount</p>
                            </div>
                            <div class="col-5">
                              <p class="adj-font text-success" style="text-align:right;font-weight:400">₹<?php echo $this->amount->toDecimal($paytotal);?></p>
                            </div> 
                            <div class="clearfix"></div>
                          </div><hr>
                        </div>
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