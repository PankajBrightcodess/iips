<section class="">
  <?php //print_r($_SESSION['cart_session']);/*unset($_SESSION['cart_session'],$_SESSION['buynow_session']);*/?>
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
            <h3>Cart</h3><hr/>
            <?php if(!empty($cartcontentlist)){ $cart_total = 0;
            foreach($cartcontentlist as $key=>$list){ //echo $key;print_r($list);
           
            ?>
            <div class="col-12">
                <div class="row">                    
                    <div class="col-md-10">
                      <div class="row">
                        <div class="col-4 col-md-4">
                          <img src="<?php echo file_url($list['productdata']['path']);?>" width='100%' alt="<?php echo $list['productdata']['product_name'];?>"/>
                        </div>
                        <div class=" col-8 col-md-8">
                          <h5><?php echo $list['productdata']['product_name'].' - '.$list['productdata']['variantname'];?></h5>
                          <p class='mb-0' style='font-size:15px;'>
                          Price :- ₹ <?php 
                          $prodprice = $list['productdata']['variant_offerprice'];
                          if(isset($list['delivery_rate'])){ $delivery_rate = $list['delivery_rate']; }else{ $delivery_rate = 0; };
                          $thisprice = round($prodprice+$delivery_rate,2); $cart_total+=$thisprice; echo $thisprice;
                          ?><span style='font-size:12px'> (Product Rate:₹ <?php echo $prodprice;?> + Delivery charge:₹ <?php echo $delivery_rate;?> )</span></p>
                          
                          <p class='mb-0' style='font-size:15px;'>Delivery Date : <?php if(isset($list['delivery_date'])){echo date('d M Y',strtotime($list['delivery_date']));}else{echo $list['delivery-date'];} ?> (<?php echo $list['time_name'];?>)</p>
                          
                          <p class='mb-0' style='font-size:15px;'>Message: <?php echo $list['message'];?></p>
                          <?php if(!empty($list['shape_id'])){?><p class='mb-0' style='font-size:15px;'>Shape Price : Rs.<?php $shape = $list['productdata']['shapename']; $s_price = $shape[$list['shape_id']]['price']; $cart_total += $s_price; echo $s_price; ?></p><?php } ?> 
                          <?php if(!empty($list['cream_id'])){?><p class='mb-0' style='font-size:15px;'>Cream Price : Rs.<?php $cream = $list['productdata']['creamname']; $c_price = $cream[$list['cream_id']]['price']; $cart_total+= $c_price; echo $c_price;?></p><?php } ?> 
                          <div class="ItemOptions">                        
                          <?php
                          
                          if(!empty($list['addondata'])){
                            echo '<b>Addons</b><br/>';
                            $addon_list = $list['addondata'];
                            foreach($addon_list as $addon){?>
                          <a href="#" class="border">
                            <img src="<?php echo file_url($addon['detail']['path']);?>" alt="<?php $name = $addon['detail']['product_name']; echo $name;?>" title="">
                            <p><?php echo ucwords($addon['detail']['product_name']);?></p>
                            <p>₹ <?php $addon_price = $addon['detail']['price']; $cart_total+=$addon_price; echo $this->amount->toDecimal($addon_price);?></p>
                          </a>
                          <?php }
                          }?> 
                          <hr/>
                          <?php 
                          if(!empty($list['addonmenu_data'])){
                            echo '<b>Extras</b><br/>';
                            $addonmenu_list = $list['addonmenu_data'];
                            foreach($addonmenu_list as $addonmenu){ ?>
                          <a href='#' class='border'>
                            <img src='<?php echo file_url($addonmenu['path']);?>' alt="<?php echo $addonmenu['name'];?>" title="<?php echo $addonmenu['name'];?>" />
                            <p><?php echo ucwords($addonmenu['name']);?></p>
                            <p>₹ <?php if(!empty($list['productdata']['addonname'][$addonmenu['id']]['price'])){ $addonmenu_price = $list['productdata']['addonname'][$addonmenu['id']]['price'];}else{ $addonmenu_price = 0;} $cart_total+=$addonmenu_price; echo $this->amount->toDecimal($addonmenu_price);?></p>

                          </a>
                          <?php }
                          }
                          ?>  
                        </div>
                      </div>                       
                      </div>
                    </div>
                    <div class="col-md-2">
                      <a href='<?php echo base_url("website/removeprod_cart/$key");?>'>
                          <button type='button' class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i></button>
                      </a>
                    </div>      
                </div>
            </div><hr/>         
            <?php } ?>
            <div class="col-12">
              <div class="row">
                <div class="col-md-4">
                  <h5>Cart Total : <span id='cart_total' class='text-danger'>₹ <?php echo $this->amount->toDecimal($cart_total);?></span></h5>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4 text-right">
                  <a href='<?php echo base_url('website/cart_checkout');?>'>
                    <button class='btn btn-success btn-sm p-2' style='text-transform:uppercase'> Proceed To Checkout </button>
                  </a>
                </div>
              </div>
            </div>
              
            <?php }else{ ?>
              <div style='min-height:200px'>
                <img src="<?php echo file_url('assets/website/images/empty-cart.png');?>" class='img-fluid' alt="cart-empty">
              </div>
            <?php }?> 
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