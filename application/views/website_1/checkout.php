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
            <h3>Checkout</h3><hr/>   
            <div class="row">
                <div class="col-md-9 card p-3">
                    <div class="row">
                        <div class="col-md-10">
                            <h3><?php echo ucwords($customerdata['cust_name']);?></h3>
                            <p class='mb-0' style='font-size:14px'><?php echo $customerdata['cust_email'];?></p>
                            <p class='mb-0' style='font-size:14px'>+91 <?php echo $customerdata['cust_mobile'];?></p>
                        </div>
                        <div class="col-md-2"><i class='fas fa-edit float-right text-secondary btn-lg'></i></div>
                    </div>
                    
                </div>
            </div>   
            <div class="row mt-3">                
                <div class="col-md-9 card p-3">
                    <h3>Products</h3><hr/>
                    <div class="row">
                        <div class="col-md-12" id="accordion">
                        <?php $total = 0; if(!empty($cartcontentlist)){ $i=0; 
                            foreach($cartcontentlist as $key=>$clist){ $i++;$subtotal = 0;//echo PRE;print_r($clist);
                                $check_valid = $this->Website_model->check_valid_deliverytime($clist['time_id'],$clist['productdata']['prep_time'],$clist['delivery_date']);
                            ?>
                            <div class="card <?php if(empty($check_valid)){echo 'seg-disabled';}?>">
                                <div class="card-header">
                                    <a class="card-link" data-toggle="collapse" href="#collapse_<?php echo $i;?>">
                                        <?php echo $i;?>). <?php echo $clist['productdata']['product_name'].' - '.$clist['productdata']['variantname'] ;?>
                                    </a>
                            <?php if(!$check_valid){?><a class='float-right text-danger'>Product Expired</a><?php } ?>
                                </div>
                                <div id="collapse_<?php echo $i;?>" class="collapse <?php if($check_valid){ echo 'show';}?>" data-parent="#accordion">
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
                                        <div class="row mt-1">
                                            <div class="col-md-8">
                                                <?php                                                                   
                                                if(!empty($clist['addondata'])){ ?>
                                                    <p>Addons</p>
                                                    <div class="row" style='font-size:0.8rem;'>
                                                <?php  $addondata = $clist['addondata'];
                                                    foreach($addondata as $addon){?>
                                                <div class="col-md-3" style='text-align:center;'> 
                                                
                                                    <img src="<?php echo file_url($addon['detail']['path']);?>" alt="<?php $name = $addon['detail']['product_name']; echo $name;?>" width="70%" title="">
                                                    <p class='mb-1'><?php echo ucwords($addon['detail']['product_name']);?></p>
                                                    <p class='mb-1'>₹ <?php $addon_price = $addon['detail']['price']; $subtotal += $addon_price;echo $this->amount->toDecimal($addon_price);?></p>
                                                
                                                </div>
                                                <?php } echo '</div>'; } ?> 

                                                <?php                                                                   
                                                if(!empty($clist['addonmenu_data'])){ ?>
                                                    <p>Extra Toppings</p>
                                                    <div class="row" style='font-size:0.8rem;'>
                                                <?php  $addonmenudata = $clist['addonmenu_data'];
                                                    foreach($addonmenudata as $addonmenu){?>
                                                <div class="col-md-3" style='text-align:center;'> 
                                                    <img src='<?php echo file_url($addonmenu['path']);?>' alt="<?php echo $addonmenu['name'];?>" title="<?php echo $addonmenu['name'];?>" />
                                                    <p><?php echo ucwords($addonmenu['name']);?></p>
                                                    <p>₹ <?php if(!empty($clist['productdata']['addonname'][$addonmenu['id']]['price'])){ $addonmenu_price = $clist['productdata']['addonname'][$addonmenu['id']]['price'];}else{ $addonmenu_price = 0;} $subtotal+=$addonmenu_price; echo $this->amount->toDecimal($addonmenu_price);?></p>
                                                </div>
                                                <?php } echo '</div>'; } ?>                                      
                                                
                                            </div>
                                            <div class="col-md-4">
                                                <hr/>
                                                <h5>Total: Rs.<?php if($check_valid){ $total += $subtotal;}echo $this->amount->toDecimal($subtotal);?></h5>
                                            </div>
                                        </div>
                                        <form action='<?php echo base_url('website/placeorder');?>' method="POST">
                                        <div class="row mt-3">
                                            <div class="col-md-10 near_section">
                                                <b><p class='mb-1'>Delivery Address</p></b><hr class="mt-1">
                                                <?php $d_pincode = $clist['pincode'];//echo PRE;print_r($customerdata);
                                                if(!empty($customerdata['addresses'])){
                                                    // check does pincode exists in addresses
                                                    $custaddress = array_reverse($customerdata['addresses']);                                                    
                                                    foreach($custaddress as $cadd){
                                                        if($cadd['pincode'] == $d_pincode){
                                                            $showaddress = $cadd;
                                                            break;
                                                        }else{
                                                            $showaddress = false; 
                                                            continue;
                                                        }                                                                                                               
                                                    }
                                                }else{
                                                    // no address available add new delivery address.
                                                    $showaddress = false;
                                                }                                                
                                                ?>
                                                <?php if($check_valid == true){?>
                                                <?php if(!empty($showaddress)){ ?>
                                                    <div class="row" style="font-size: 0.8rem;">
                                                        <div class="col-md-8">
                                                            <p class='mb-1'>Address :</p>
                                                            <textarea name="address[<?php echo $clist['id'];?>]" class='seg seg-disabled form-control address' id="address_<?php echo $i;?>" data-addresid ="<?php echo $showaddress['id'];?>" placeholder="Enter Delivery Address" readonly required><?php echo $showaddress['address'];?></textarea>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <p class='mb-1'>Pincode :</p>
                                                            <input type="text" class='seg-disabled form-control' name='pincode[<?php echo $clist['id'];?>]' id='pincode_<?php echo $i;?>' value='<?php echo $d_pincode;?>' placeholder="Pincode" readonly required>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2" style="font-size: 0.8rem;">
                                                        <div class="col-md-6">
                                                            <p class='mb-1'>District :</p>
                                                            <input type='text' class="seg seg-disabled form-control district" name='district[<?php echo $clist['id'];?>]' id='district_<?php echo $i;?>' data-addresid ="<?php echo $showaddress['id'];?>"" value='<?php echo $showaddress['district'];?>' placeholder="Enter District" readonly required/>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class='mb-1'>State :</p>
                                                            <input type='hidden' name='cartid[]' value="<?php echo $clist['id'];?>">
                                                            <input type='hidden' name='subtotal[<?php echo $clist['id'];?>]' value="<?php echo $subtotal;?>">
                                                            <input type="text" class='seg seg-disabled form-control state' name='state[<?php echo $clist['id'];?>]' id='state_<?php echo $i;?>' data-addresid ="<?php echo $showaddress['id'];?>" value='<?php echo $showaddress['state'];?>' placeholder="Enter State" readonly required>
                                                        </div>
                                                    </div>
                                                <?php }else{ ?>
                                                    <div class="row" style="font-size: 0.8rem;">
                                                        <div class="col-md-8">
                                                            <p class='mb-1'>Address :</p>
                                                            <textarea name="address[<?php echo $clist['id'];?>]" class='seg form-control address' id="address_<?php echo $i;?>"  placeholder="Enter Delivery Address" required></textarea>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <p class='mb-1'>Pincode :</p>
                                                            <input type="text" class='seg-disabled form-control' name='pincode[<?php echo $clist['id'];?>]' id='pincode_<?php echo $i;?>' value='<?php echo $d_pincode;?>' placeholder="Pincode" readonly required>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2" style="font-size: 0.8rem;">
                                                        <div class="col-md-6">
                                                            <p class='mb-1'>District :</p>
                                                            <input type='text' class="seg form-control district" name='district[<?php echo $clist['id'];?>]' id='district_<?php echo $i;?>'  value='' placeholder="Enter District" required/>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class='mb-1'>State :</p>
                                                            <input type='hidden' name='cartid[]' value="<?php echo $clist['id'];?>">
                                                            <input type='hidden' name='subtotal[<?php echo $clist['id'];?>]' value="<?php echo $subtotal;?>">
                                                            <input type="text" class='seg form-control state' name='state[<?php echo $clist['id'];?>]' id='state_<?php echo $i;?>'  value='' placeholder="Enter State" required>
                                                        </div>
                                                    </div>
                                                <?php }?>
                                            </div>
                                            <div class="col-md-2">
                                            <?php if(!empty($showaddress)){ ?>
                                                <a onclick="address_edit(this);" data-id="<?php echo $i;?>">
                                                    <i class='fas fa-edit float-right text-secondary btn-sm'> edit</i>
                                                </a>
                                            <?php } }?>
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
                <div class='col-md-2 card p-3 ml-1 sticky' style="max-height: 200px;">
                    <h3>Grand Total</h3><hr/><br/>
                    <p>Rs.<?php echo $this->amount->toDecimal($total);?></p>
                    <?php if($total !=0){?>
                    <button class='btn btn-success' type='submit'>CHECKOUT</button>
                    <!-- <button class='btn btn-danger mt-2' type='button'>PLACE ORDER</button> -->
                    <?php } ?>
                </div>
                </form>
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
       setTimeout(function(){
        location.reload();
       },60000); 

       function address_edit(that){
        
        var id = $(that).data('id');
        var add = $("#address_"+id).removeClass('seg-disabled');
        $("#address_"+id).removeAttr('readonly');
        var dist = $("#district_"+id).removeClass('seg-disabled');
        $("#district_"+id).removeAttr('readonly');
        var state = $("#state_"+id).removeClass('seg-disabled'); 
        $("#state_"+id).removeAttr('readonly');       
        
       }
       $('body').on('keyup','.address',function(){
        var column = 'address';
        var id = $(this).data('addresid');
        var value = $(this).val();

        $.ajax({
            type:"POST",
            url:"<?php echo base_url("website/update_address"); ?>",
            data:{column:column,value:value,id:id},
            success: function(data){
                
            }
        });
       });
       $('body').on('keyup','.district',function(){
        var column = 'district';
        var id = $(this).data('addresid');
        var value = $(this).val();

        $.ajax({
            type:"POST",
            url:"<?php echo base_url("website/update_address"); ?>",
            data:{column:column,value:value,id:id},
            success: function(data){
                
            }
        });
       });
       $('body').on('keyup','.state',function(){
        var column = 'state';
        var id = $(this).data('addresid');
        var value = $(this).val();

        $.ajax({
            type:"POST",
            url:"<?php echo base_url("website/update_address"); ?>",
            data:{column:column,value:value,id:id},
            success: function(data){
                
            }
        });
       });
    </script>
  </body>
</html>