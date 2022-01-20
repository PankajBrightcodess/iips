    <section class="FilterBar">
      <div class="container-fluid">
        <div class="row">
          <div class="col-6"><a href="<?php if(!empty($_SERVER['HTTP_REFERER'])){echo $_SERVER['HTTP_REFERER']; }else{echo base_url('/app');}?>" class="back"><i class="fas fa-arrow-left"></i></a> </div>
        </div>
      </div>
    </section>
    <section class="">  
        <div class="container-fluid">
            <div class="row" style='background-color:#f9eeb8;height:100vh'>
                
                <div class="col-12 p-3 mb-5">
                <h3>Cart</h3><hr/>
                <?php if(!empty($cartcontentlist)){ $cart_total = 0;
                foreach($cartcontentlist as $key=>$list){ //echo $key;print_r($list);        
                ?>
                <div class="col-12">
                    <div class="row">                    
                        <div class="col-10">
                        <div class="row">
                            <div class="col-4">
                                <img src="<?php echo file_url($list['productdata']['path']);?>" width='100%' alt="<?php echo $list['productdata']['product_name'];?>"/>
                            </div>
                            <div class="col-8 p-1">
                                <h5 style='font-size:17px'><?php echo $list['productdata']['product_name'].'<br/>'.$list['productdata']['variantname'];?></h5>
                            </div>
                        </div>
                        <div class='row mt-2'>
                            <div class='col-12'>
                                <p class='mb-0' style='font-size:15px;'>
                                Price :- ₹ <?php 
                                $prodprice = $list['productdata']['variant_offerprice'];
                                if(isset($list['delivery_rate'])){ $delivery_rate = $list['delivery_rate']; }else{ $delivery_rate = 0; };
                                $thisprice = round($prodprice+$delivery_rate,2); $cart_total+=$thisprice; echo $thisprice;
                                ?><span style='font-size:12px'> (Product Rate: ₹<?php echo $prodprice;?> + Delivery charge: ₹<?php echo $delivery_rate;?> )</span></p>
                                
                                <p class='mb-0' style='font-size:15px;'>Delivery Date : <?php if(isset($list['delivery_date'])){echo date('d M Y',strtotime($list['delivery_date']));}else{echo $list['delivery-date'];} ?> (<?php echo $list['time_name'];?>)</p>
                                
                                <p class='mb-0' style='font-size:15px;'>Message: <?php echo $list['message'];?></p>
                                <?php if(!empty($list['shape_id'])){?><p class='mb-0' style='font-size:15px;'>Shape : <?php $shape = $list['productdata']['shapename']; echo ucwords($shape[$list['shape_id']]['name']);?> ( Rs.<?php $s_price = $shape[$list['shape_id']]['price']; $cart_total += $s_price; echo $s_price; ?>)</p><?php } ?> 
                                <?php if(!empty($list['cream_id'])){?><p class='mb-0' style='font-size:15px;'>Cream : <?php $cream = $list['productdata']['creamname']; echo ucwords($cream[$list['cream_id']]['name']);?> (Rs.<?php $c_price = $cream[$list['cream_id']]['price']; $cart_total+= $c_price; echo $c_price;?>)</p><?php } ?> 
                                <div class="ItemOptions">
                                <?php
                                
                                if(!empty($list['addondata'])){
                                echo '<hr/>';
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
                                
                                <?php 
                                if(!empty($list['addonmenu_data'])){
                                echo '<hr/>';
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
                        <div class="col-2">
                            <a href='<?php echo base_url("website/removeprod_cart/$key");?>'>
                                <button type='button' class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i></button>
                            </a>
                        </div>      
                    </div>
                </div><hr/>         
                <?php } ?>
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <h5>Cart Total : <span id='cart_total' class='text-danger'>₹ <?php echo $this->amount->toDecimal($cart_total);?></span></h5>
                        </div>                    
                        <div class="col-12 text-center">
                            <a href='<?php echo base_url('app/cart_checkout');?>'>
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
                                
            </div>
        </div>
    </section>   
    <?php $this->load->view("app/footer"); ?>
    <?php $this->load->view('app/main-footer-links');?>
    
  </body>
</html>