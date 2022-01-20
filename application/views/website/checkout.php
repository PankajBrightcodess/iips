<section class="">  
    <div class="container-fluid">
    <div class="row">
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
                        <?php $total = 0; $getcheckout = true;
                        if(!empty($cartcontentlist)){ $i=0; 
                            foreach($cartcontentlist as $key=>$clist){ $i++;$subtotal = 0;$here = true;//echo PRE;print_r($clist);
                                 $p_price = $clist['productdata']['variant_offerprice'];
                                 $p_qty = $clist['qty'];
                                 $location = $this->session->location_session;
                                 if($clist['location_id'] != $location['id']){
                                     $getcheckout = false;
                                     $here = false;
                                 }
                            ?>
                            <div class="card <?php if(!$here){ echo 'bg-danger';} ?>" >
                            <a class="card-link" data-toggle="collapse" href="#collapse_<?php echo $i;?>" <?php if(!$here){?>style='color:white'<?php } ?>>
                                <div class="card-header">                                    
                                <?php echo $i;?>). <?php echo $clist['productdata']['product_name'].' - '.$clist['productdata']['variantname'];?>
                                    <span class='float-right'>
                                        Total: Rs.<?php echo $this->amount->toDecimal($p_price*$p_qty,false)." <span style='font-size:13px'>($p_price X $p_qty)</span>";?>
                                    </span>
                                </div>
                            </a>
                            <?php if($here){?>
                                <div id="collapse_<?php echo $i;?>" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class='mb-0'>Product Detail</p><hr class='mt-0'>
                                                <div class="row">
                                                    <div class="col-6 col-md-6">
                                                        <img src="<?php $path = $clist['productdata']['path'];echo file_url("$path");?>" width="100px" height="100px" alt="<?php echo $clist['productdata']['product_name']; ?>" title="<?php echo $clist['productdata']['product_name'];?>">
                                                        
                                                    </div>
                                                    <div class="col-6 col-md-6 p-0" style='font-size:0.8rem;'>
                                                        <p class='mb-1'><b><?php echo $clist['productdata']['product_name']; ?></b></p>                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <p class='mb-0'>Price & qty</p><hr class='mt-0'>
                                                <div class="col-md-12" style='font-size:0.8rem;'>
                                                    <p class='mb-1'>Product Price: <b>Rs.<?php echo $this->amount->toDecimal($p_price);?></b></p>                                                    
                                                    <p class='mb-1'>Product qty: <b><?php $subtotal += $p_price*$p_qty; echo $p_qty."(Qty)";?></b></p>                                                    
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-8">
                                            </div>
                                            <div class="col-md-4">
                                                <hr/>
                                                <h5>Total: Rs.<?php $total += $subtotal; echo $this->amount->toDecimal($subtotal,false)."<span style='font-size:13px'>($p_price X $p_qty)</span>";?></h5>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                            <?php }else{?>
                                <div id="collapse_<?php echo $i;?>"  data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class='mb-0'>Product Detail</p><hr class='mt-0'>
                                                <div class="row">
                                                    <div class="col-6 col-md-6">
                                                        <img src="<?php $path = $clist['productdata']['path'];echo file_url("$path");?>" width="100%" alt="<?php echo $clist['productdata']['product_name']; ?>" title="<?php echo $clist['productdata']['product_name'];?>">                                                        
                                                    </div>
                                                    <div class="col-6 col-md-6 p-0" style='font-size:0.8rem;'>
                                                        <p class='mb-1'><h3><?php echo $clist['productdata']['product_name'];?></h3></p>    
                                                        <p class='mb-1'>Product Price: <b>Rs.<?php echo $this->amount->toDecimal($p_price);?></b></p>                                                    
                                                        <p class='mb-1'>Product qty: <b><?php $subtotal += $p_price*$p_qty; echo $p_qty."(Qty)";?></b></p>                                                    
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <h3 style='color:white'>Product Not Available in This Location</h3>
                                                <a href='<?php echo base_url("website/removeprod_cart/$key");?>' class="btn btn-success">
                                                    <img src="<?php echo file_url("assets/images/delete.png") ?>" class="img-fluid" alt="delete" title="Remove Item" width="20px">
                                                    <span style='line-height:20px;'>From Cart</span>
                                                </a>
                                            </div>                                            
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-md-8">
                                            </div>
                                            <div class="col-md-4">
                                                <hr/>
                                                <h5>Total: Rs.<?php echo  $this->amount->toDecimal($subtotal,false)."<span style='font-size:13px'>($p_price X $p_qty)</span>";?></h5>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                            <?php } ?>
                            </div><br/>
                        <?php }
                        }?>    
                            
                        </div>                        
                    </div>
                    <form action='<?php echo base_url('website/placeorder');?>' method="POST">
                        <div class="row mt-3" style='margin-bottom:35px'>
                            <div class="col-md-12">
                                <b><p class='mb-1'>Delivery Schedule <sub style='color:red'>(same day delivery not available)</sub></p></b>
                                <hr class="mt-1">
                            </div>
                            <div class="col-md-10">                         
                                <div class="row" style="font-size: 0.8rem;">
                                    <div class="col-md-6">
                                        <p class='mb-1'>Delivery Date : <span class="text-danger">*</span> </p>
                                        <input type="date" name='delivery_date' id='delivery_date' min="<?php echo date('Y-m-d',strtotime('+1day'));?>" class='form-control' required>
                                    </div>
                                    <div class="col-md-6">
                                        <p class='mb-1'>Delivery Time : <span class="text-danger">*</span> </p>
                                        <input type="time" class='form-control' name='delivery_time' min='09:00' max="17:00" id='delivery_time' required>
                                    </div>
                                </div>                                                               
                            </div>                            
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <b><p class='mb-1'>Delivery Details</p></b>
                                <hr class="mt-1">
                            </div>
                            <div class="col-md-10 near_section">
                                <?php 
                                // if(!empty($customerdata['addresses'])){
                                //     // check does pincode exists in addresses
                                //     $custaddress = array_reverse($customerdata['addresses']);                                                    
                                //     foreach($custaddress as $cadd){
                                //         if($cadd['pincode']){
                                //             $showaddress = $cadd;
                                //             break;
                                //         }else{
                                //             $showaddress = false; 
                                //             continue;
                                //         }                                                                                                               
                                //     }
                                // }else{
                                //     // no address available add new delivery address.
                                //     $showaddress = false;
                                // }                                                
                                ?>
                                
                                <div class="row" style="font-size: 0.8rem;">
                                    <div class="col-md-8">
                                        <p class='mb-1'>Address : <span class="text-danger">*</span></p>
                                        <textarea name="address" class='form-control address' id="address"  placeholder="Enter Delivery Address" required></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <p class='mb-1'>Pincode : <span class="text-danger">*</span></p>
                                        <input type="text" maxlength='6' class='form-control' name='pincode' id='pincode' placeholder="Pincode" required>
                                    </div>
                                </div>
                                <div class="row mt-2" style="font-size: 0.8rem;">                                        
                                    <div class="col-md-6">
                                        <p class='mb-1'>State : <span class="text-danger">*</span></p> 
                                        <?php //echo form_dropdown(array('class'=>'form-control','name'=>'state','id'=>'state','required'=>'true'),$locationoption);?>                                           
                                        <input type="text" class='form-control' name='state' id='state'  value='<?php echo $locationdata['statename']?>' placeholder="Enter State" readonly required>
                                    </div>
                                    <div class="col-md-6">
                                        <p class='mb-1'>Delivery Zone : <span class="text-danger">*</span></p>
                                        <?php //echo form_dropdown(array('class'=>'form-control','name'=>'delivery_zone','id'=>'zone','required'=>'true'),$zoneoption);?>
                                        <input type="text" class='form-control' name='deliveryzone' id='deliveryzone'  value='<?php echo $locationdata['name'];?>' placeholder="Enter Delivery Zone" readonly required>

                                    </div>
                                </div>
                                <div class="row mt-2" style="font-size: 0.8rem;"> 
                                    <div class="col-md-6">
                                        <p class='mb-1'>Landmark :</p> 
                                        <?php echo form_input(array('type'=>'text','class'=>'form-control','name'=>'landmark','id'=>'landmark','placeholder'=>'Enter Landmark'));?>                                           
                                        <!-- <input type="text" class='seg form-control state' name='state' id='state'  value='' placeholder="Enter State" required> -->
                                    </div>
                                    <div class="col-md-6">
                                        <p class='mb-1'>Contact No : </p> 
                                        <?php echo form_input(array('type'=>'text','class'=>'form-control','maxlength'=>'12','name'=>'delivery_mobileno','id'=>'delivery_mobileno','placeholder'=>'Enter Mobile No'));?>                                           
                                        <!-- <input type="text" class='seg form-control state' name='state' id='state'  value='' placeholder="Enter State" required> -->
                                    </div>
                                </div>                                
                            </div>                            
                        </div>
                </div>
                <div class='col-md-3 card p-3 sticky' style="max-height: 250px;">
                    <h3>Grand Total</h3><hr/><br/>
                    <p>Rs.<?php echo $this->amount->toDecimal($total).' + 50.00 <span style="font-size:13px;">(delivery charge)</span>';?></p>
                    <?php if($total !=0 && $getcheckout){?>                    
                        <button class='btn btn-success' type='submit'>CHECKOUT</button>
                    <?php } ?>
                    <!-- <button class='btn btn-danger mt-2' type='button'>PLACE ORDER</button> -->                    
                </div>
                </form>
            </div>        
        </div>
        <div class="col-md-1"></div>
    </div>
    
    </div>
</section>

    
    
    <div id="PgFooter"><?php $this->load->view('website/bottom_section');?></div>    
    <script>
      setTimeout(function() {
		    $('#msgpopup').click();
	    },5000);
    //    setTimeout(function(){
    //     location.reload();
    //    },60000); 

       function address_edit(that){
        
        var id = $(that).data('id');
        var add = $("#address_"+id).removeClass('seg-disabled');
        $("#address_"+id).removeAttr('readonly');
        // var dist = $("#district_"+id).removeClass('seg-disabled');
        // $("#district_"+id).removeAttr('readonly');
        // var state = $("#state_"+id).removeClass('seg-disabled'); 
        // $("#state_"+id).removeAttr('readonly');       
        
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
    //    $('body').on('keyup','.district',function(){
    //     var column = 'district';
    //     var id = $(this).data('addresid');
    //     var value = $(this).val();

    //     $.ajax({
    //         type:"POST",
    //         url:"<?php echo base_url("website/update_address"); ?>",
    //         data:{column:column,value:value,id:id},
    //         success: function(data){
                
    //         }
    //     });
    //   });
       $('body').on('change','#state',function(){  
           var state = $(this).val();    
        $.ajax({
            type:"POST",
            url:"<?php echo base_url("website/getall_zoneoption"); ?>",
            data:{state:state},
            success: function(data){
                $('#zone').html(data);
            }
        });
       });
    </script>
  </body>
</html>