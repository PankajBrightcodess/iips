<section class="">  
    <div class="container-fluid">
    <div class="row" style='background-color:#f9eeb8;'>
        <div class="col-md-1"></div>
        <div class="col-md-10 p-3">
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
            <h3>Orders</h3><hr/>   
            
            <div class="row mt-3">                
                <div class="col-md-12 card p-3">
                    <h3>Products</h3><hr/>
                    <div class="row">
                        <div class="col-md-12" id="accordion">
                        <?php $total = 0; if(!empty($cartcontentlist)){ $i=0; 
                            foreach($cartcontentlist as $key=>$clist){ $i++;$subtotal = 0;//echo PRE;print_r($clist);
                                
                            ?>
                            <div class="card">
                                <div class="card-header">
                                    <a class="card-link" data-toggle="collapse" href="#collapse_<?php echo $i;?>">
                                        <?php echo $i;?>). <?php echo $clist['productdata']['product_name'].' - '.$clist['productdata']['variantname'] ;?>
                                    </a>                            
                                </div>
                                <div id="collapse_<?php echo $i;?>" class="collapse show" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p class='mb-0'>Product Detail</p><hr class='mt-0'>
                                                <div class="row">
                                                    <div class="col-6 col-md-6">
                                                        <img src="<?php $path = $clist['productdata']['path'];echo file_url("$path");?>" width="100px" height="100px" alt="<?php echo $clist['productdata']['product_name']; ?>" title="<?php echo $clist['productdata']['product_name'];?>">
                                                        
                                                    </div>
                                                    <div class="col-6 col-md-6 p-0" style='font-size:0.8rem;'>
                                                        <p class='mb-1'><b><?php echo $clist['productdata']['product_name']; ?></b></p>
                                                        <p class='mb-1'>Variant - <?php echo $clist['productdata']['variantname']; ?></p>
                                                        <?php if(!empty($clist['flavor_id'])){?><p class='mb-1'>Flavor - <?php $flv = $clist['productdata']['flvname']; echo $flv[$clist['flavor_id']]['name'];?></p><?php } ?>
                                                        <?php if(!empty($clist['shape_id'])){?><p class='mb-1'>Shape - <?php $shape = $clist['productdata']['shapename']; echo $shape[$clist['shape_id']]['name'];?></p><?php } ?>
                                                        <?php if(!empty($clist['cream_id'])){?><p class='mb-1'>Cream - <?php $cream = $clist['productdata']['creamname']; echo $cream[$clist['cream_id']]['name'];?></p><?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <p class='mb-0'>Delivery Detail's</p><hr class='mt-0'>
                                                <div class="col-md-12" style='font-size:0.8rem;'>
                                                    <p class='mb-1'>Delivery On: <?php echo date('d M Y',strtotime($clist['delivery_date']));?></p>
                                                    <p class='mb-1'>Delivery Time: <?php echo $clist['time_name'].' Hrs';?></p>
                                                    <p class='mb-1'>Delivery Charge: Rs.<?php echo $this->amount->toDecimal($clist['delivery_rate']);?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <p class='mb-0'>Price Distribution</p><hr class='mt-0'>
                                                <div class="col-md-12" style='font-size:0.8rem;'>
                                                    <p class='mb-1'>Product Price: <b>Rs.<?php $p_price = $clist['productdata']['variant_offerprice']; $subtotal += $p_price; echo $this->amount->toDecimal($p_price);?></b></p>
                                                    <p class='mb-1'>Delivery Charge: <b>Rs.<?php $d_price = $clist['delivery_rate']; $subtotal += $d_price; echo $this->amount->toDecimal($d_price);?></b></p>
                                                    <?php if(!empty($clist['shape_id']) || !empty($clist['cream_id'])){?><b>Extras:</b><?php } ?>
                                                    <?php if(!empty($clist['shape_id'])){?><p class='mb-1'>Shape Price : <b>Rs.<?php $shape = $clist['productdata']['shapename']; $s_price = $shape[$clist['shape_id']]['price']; $subtotal += $s_price; echo $s_price; ?></b></p><?php } ?> 
                                                    <?php if(!empty($clist['cream_id'])){?><p class='mb-1'>Cream Price : <b>Rs.<?php $cream = $clist['productdata']['creamname']; $c_price = $cream[$clist['cream_id']]['price']; $subtotal+= $c_price; echo $c_price;?></b></p><?php } ?> 
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <p>Addons</p>
                                                <div class="row" style='font-size:0.8rem;'>
                                                                                              
                                                <?php 
                                                //print_r($clist['addondata']);                    
                                                if(!empty($clist['addondata'])){
                                                    $addondata = $clist['addondata'];
                                                    foreach($addondata as $addon){?>
                                                <div class="col-md-3" style='text-align:center;'> 
                                                
                                                    <img src="<?php echo file_url($addon['detail']['path']);?>" alt="<?php $name = $addon['detail']['product_name']; echo $name;?>" width="70%" title="">
                                                    <p class='mb-1'><?php echo ucwords($addon['detail']['product_name']);?></p>
                                                    <p class='mb-1'>₹ <?php $addon_price = $addon['detail']['price']; $subtotal += $addon_price;echo $this->amount->toDecimal($addon_price);?></p>
                                                
                                                </div>
                                                <?php }
                                                }
                                                ?>
                                                
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <hr/>
                                                <h5>Total: Rs.<?php if($check_valid){ $total += $subtotal;}echo $this->amount->toDecimal($subtotal);?></h5>
                                            </div>
                                        </div>                                      
                                        
                                    </div>
                                </div>
                            </div><br/>
                        <?php }
                        }?>    
                            
                        </div>                        
                    </div>
                    
                </div>
            </div>        
        </div>
        <div class="col-md-1"></div>
    </div>
    
    </div>
</section>

    
    
    <div id="PgFooter"><?php $this->load->view('website/footer');?></div>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
      setTimeout(function() {
		    $('#msgpopup').click();
	    },5000);       
    </script>
  </body>
</html>