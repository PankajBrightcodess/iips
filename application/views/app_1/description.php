<link href="<?php echo file_url('includes/dist/css/vanillaCalendar.css'); ?>" rel="stylesheet">  
<link href="<?php echo file_url('assets/app/css/calendar_style.css');?>" rel='stylesheet'> 
    <section class="FilterBar">
      <div class="container-fluid">
        <div class="row">
          <div class="col-6"><a href="<?php if(!empty($_SERVER['HTTP_REFERER'])){echo $_SERVER['HTTP_REFERER']; }else{echo base_url('/app');}?>" class="back"><i class="fas fa-arrow-left"></i></a> </div>
        </div>
      </div>
    </section>
    <?php //print_r($_SESSION);//unset($_SESSION['cart_session']);?>
    <section class="DescriptionBox">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="categoryItem">              
              <h3><?php echo $productdata['product_name'];?></h3>
              <img src="<?php echo file_url("$productdata[path]");?>" alt="<?php echo $productdata['product_name'];?>" title="<?php echo $productdata['product_name'];?>">
              <div class="text-center mt-2">
                <!-- <p class="ratings"><i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star-half-alt" aria-hidden="true"></i> 4.5 (175)</p> -->
                <?php if($productdata['discount'] != 0){?>
                  <p class="price mb-0 pl-3">
                    <del>₹<?php echo $this->amount->toDecimal($productdata['variant_price']);?></del> <strong> ₹ <span id='firstvalue'><?php echo $this->amount->toDecimal($productdata['variant_offerprice']);?></span> </strong>
                  </p>
                  <?php }else{?>
                  <p class="price mb-0 pl-2">
                    <strong>₹ <span id='firstvalue'><?php echo $this->amount->toDecimal($productdata['variant_offerprice']);?></span></strong>
                  </p>
                <?php } ?>
                <input type='hidden' id='base_price' value='<?php echo $productdata['variant_offerprice'];?>'/>
                <input type='hidden' id='variant_id' value='<?php echo $productdata['variant_id'];?>'/>
                <div class="ItemOptions">
                  <p>Pick an Upgrade</p>
                  <?php if(!empty($variantlist)){ $i = 0;
                    foreach($variantlist as $varier){ $i++;?>
                  <a href="<?php echo base_url("app_product/".md5($varier['id']).'/?subcat='.$subcategory['slug']);?>" class="<?php if($i==1){echo 'selected';}?>">
                    <img src="<?php echo file_url($varier['path']);?>" alt="<?php echo $varier['product_name'];?>" title="<?php echo "$varier[product_name] - $varier[variantname]";?>">
                    <p><?php echo ucwords($varier['variantname']);?></p>
                    <p class="price">₹ <?php echo $this->amount->toDecimal($varier['variant_offerprice']);?></p>
                  </a>
                  <?php }
                  }?>   
                </div>
              <div class="DeliveryLocation p-2">
                <form action="<?php echo base_url('app/addtocart');?>" method="post" onsubmit="return validateform();">
                  <div class="row mt-2">
                    <div class="col-12 ">                     
                      <input type="text" name="pincode" placeholder="Pincode" minlength='6' maxlength='6' id='pincode' class="form-control activeinput"  autocomplete="off" required>
                    </div>
                    <div class="col-12 mt-2 seg seg_disabled">
                      <input type="hidden" name="pid" value='<?php echo $productdata['id'];?>'>                      
                      <!-- <button type='button' class="btn btn-outline-secondary btn-block" id="selectdel" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#exampleModal">Select Delivery Date</button> -->
                      <button type="button" class="btn btn-outline-secondary btn-block" id="selectdel" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#myModal1">Select Delivery Date</button>
                      <div class="btn btn-outline-secondary btn-block disabled mt-0" id="deliverytime" style='color:brown;font-weight:500;display:none;'>
                        <table width='100%'>
                          <tr>
                            <td rowspan="2" id='scar_month_date' style="font-size: 25px;"></td>
                            <!-- <td id='scar_date'></td> -->
                            <td id='scar_slot' style="font-size: 14px;"></td>
                            <td rowspan="2"><span id='remove_delivery_date'><i class='fas fa-trash text-danger'></i></span></td>
                          </tr>
                          <tr>                          
                            <td id='scar_time' style="font-size: 14px;"></td>                            
                          </tr>
                        </table>
                      </div>
                      <input type='text' id='ajaxstore_datetime' name='selected_date' value="" data-prodid="<?php echo $productdata['id'];?>" style='display:none;'>
                      <input type='text' id='selected_slot' name='selected_slot' value="" style='display:none;'>
                      <input type='text' id='delivery_slot' name='slot_id' value="" style='display:none;'>
                      <input type='text' id='delivery_price' name='slot_price' value="" style='display:none;'>
                      <input type='text' id='selected_time' name='selected_time' value="" style='display:none;'>
                      <input type='text' id='selected_name' name='selected_name' value="" style='display:none;'>
                      <span class='text-danger' id='validate_deliverydate' style='display:none;'>Please Select Delivery Time !! </span>
                    </div>                                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-12">
                      <button type='button' class='form-control btn btn-light seg seg_disabled' id='flavor_popup' style='border:1px solid cornflowerblue' data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#flavorModal">Select Falvor</button>
                      <?php echo form_dropdown(array('name'=>'flavor_id','class'=>'form-control d-none','id'=>'flavor_id'),$flavoroption)?>
                      <span class='text-danger' id='validate_flavor' style='display:none;'>Please Select Flavor !! </span>
                    </div>
                    <?php if(!empty($shapeoption)){?>
                    <div class="col-12 mt-2 col-sm-6">
                      <button type='button' class='form-control btn btn-light seg seg_disabled' id='shape_popup' style='border:1px solid black' data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#shapeModal"><i class='fas fa-plus'></i> Add Shape</button>
                      <?php echo form_dropdown(array('name'=>'shape_id','class'=>'form-control d-none','id'=>'shape_id'),$shapeoption)?>
                      
                    </div>
                    <?php } ?>
                    <div class="clearfix"></div>
                  </div>
                  <div class="row"> 
                    <?php if(!empty($creamoption)){?>
                    <div class="col-12 mt-2">
                      <button type='button' class='form-control btn btn-light seg seg_disabled' id='cream_popup' style='border:1px solid orange'  data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#creamModal"><i class='fas fa-plus'></i> Add Cream</button>
                      <?php echo form_dropdown(array('name'=>'cream_id','class'=>'form-control d-none','id'=>'cream_id'),$creamoption)?>                      
                    </div>
                    <?php } ?>
                    <div class="col-12 mt-2 seg seg_disabled">
                      <div class="ItemMessage" id="FullDesc">
                        <textarea name="message" id='message' placeholder="Text Message...(optional)" maxlength='20' class="form-control"></textarea>
                      </div>
                    </div> 
                  </div>
                  <?php if(!empty($productdata['addonname'])){?>
                  <div class='row seg seg_disabled'>                    
                    <div class="col-12 mt-2 text-right">
                      <a data-toggle="collapse" href='#demo'>
                        <p type='button' class='text-success mb-1' >
                          <span class="fas fa-plus"></span> Extra's <!--<span class='fas fa-angle-down'></span>-->
                        </p>
                      </a>                      
                    </div>
                  </div>
                  
                  <div class="row mt-3 seg seg_disabled">
                    <div id="demo" class="col-md-12 collapse mb-2">
                      <div class="owl-carousel owl-theme addon_menu">
                      <?php $addonmenu_data = $productdata['addonname'];
                        foreach($addonmenu_data as $ad_key=>$addonmenu){?>
                        <div class="item p-1"><div style='background-color:white;'>                            
                            <img src="<?php echo file_url("$addonmenu[image]");?>" alt="<?php echo $addonmenu['name'];?>" title="<?php echo $addonmenu['name']; ?>"></a>
                            <div class="itemDesc">
                              <h3 style='font-size:smaller'><?php echo $addonmenu['name'];?></h3>
                              <p class="price mb-0 pl-2">
                                ₹ <?php echo $this->amount->toDecimal($addonmenu['price']);?>
                              </p><hr class='mb-1 mt-1'>
                              <span>
                                <input type='checkbox' class='menucheckbox' name='addonmenu[]' value='<?php echo $ad_key;?>' data-price="<?php echo $addonmenu['price'];?>"/>
                              </span>                              
                            </div>                                      
                        </div>
                        </div>
                      <?php  } ?>
                      </div>
                    </div>
                  </div>
                  </div>
                  <?php } ?>
                  <div class="row descCartBtn seg seg_disabled">
                    <div class="col-12 mt-2"><button type="submit" name='AddToCart' class="btn btn-success btn-block btn-lg"><i class="fas fa-cart-plus"></i> Add to Cart</button></div>
                    <div class="col-12 mt-2"><button type="submit" name='BuyNOW' class="btn btn-warning btn-block btn-lg"><i class="fas fa-shopping-basket"></i> Buy Now </button></div>
                    <div class="clearfix"></div>
                  </div>                  
                </form>
              </div>
            </div>
            <div class="CartDesc">
              <h5>Description</h5>
              <hr>
              <p>
                  <?php if(!empty($productdata['desp'])){
                    echo $productdata['desp'];
                  }else{?>
                Will Be Soon Adding Product Description !!
                  <?php } ?>
              </p>
            </div>
          </div>
        </div>
          
        </div>
      </div>
    </section>
    <?php $this->load->view("app/footer"); ?>
    <?php $this->load->view('app/popup_model');?>    
    <?php $this->load->view('app/main-footer-links');?>  
      
    <script>
      window.addEventListener('load', function () {
        vanillaCalendar.init({
          disablePastDays: true
        });
      })

      function set_datetime(){  
        var selected_date = $('#ajaxstore_datetime').val();      
        var selected_slot = $('#selected_slot').val();      
        var delivery_price = $('#delivery_price').val();      
        var selected_name = $('#selected_name').val();      
        
        
        var date = selected_date.split(' ');
        // var show_date = date[1]+' '+date[2]+','+date[3];
        // console.log(selected_slot,selected_name,delivery_price);
        $('#scar_month').text(date[1]);
        $('#scar_date').text(date[2]);
        $('#scar_month_date').text(date[2]+' '+date[1]);
        
        $('#scar_slot').text(selected_slot);
        $('#scar_time').text('Time : '+selected_name);
        $('#deliverytime').show();
        $('#selectdel').hide();        
        
        var base_price = $('#base_price').val();
        var variant_id = $('#variant_id').val();
        var shape_id = $('#shape_id').val();
        var cream_id = $('#cream_id').val();
        
        var addonprice = 0;        
        // if(delivery_price == ''){
        //   delivery_price = 0;
        // } 
        console.log(delivery_price);
        
      
        if($(this). is(":checked")){              
          $('.menucheckbox').each(function(i,e){
            if($(e).is(":checked")){
              var ind_price = $(e).data('price');                
              addonprice = Number(addonprice)+Number(ind_price);
            }
          });
        }else{              
          $('.menucheckbox').each(function(i,e){
            if($(e).is(":checked")){
              var ind_price = $(e).data('price');
              addonprice = Number(addonprice)+Number(ind_price);
            }
          });
        }

        $.ajax({
          type:"POST",
          url:"<?php echo base_url("website/ajax_gettoppings_price"); ?>",
          data:{shape_id:shape_id,variant_id:variant_id,cream_id:cream_id},
          success: function(data){
              console.log(data);            
              console.log(base_price,data,addonprice,delivery_price);                  
              var newtotal = Number(base_price)+Number(data)+Number(addonprice)+Number(delivery_price);
              if(newtotal > base_price){
                animateValue("firstvalue",base_price,newtotal,3000);
              }
           }
        });

      }

      function resetall(){
        $('#deliverytime').hide();
        $('#selectdel').show(); 
        $('#ajaxstore_datetime').val('');
        $('#selected_slot').val('');  
        $('#delivery_price').val(''); 
        $('#selected_name').val(''); 
        $('#selected_time').val('');
        $('#delivery_slot').val('');
      }

      function checkprice_update(){
        var base_price = $('#base_price').val();
        var variant_id = $('#variant_id').val();
        var shape_id = $('#shape_id').val();
        var cream_id = $('#cream_id').val();
        
        var addonprice = 0;
        var delivery_price = $('#delivery_price').val();
        if(delivery_price == ''){
          delivery_price = 0;
        } 
      
        if($(this). is(":checked")){              
          $('.menucheckbox').each(function(i,e){
            if($(e).is(":checked")){
              var ind_price = $(e).data('price');                
              addonprice = Number(addonprice)+Number(ind_price);
            }
          });
        }else{              
          $('.menucheckbox').each(function(i,e){
            if($(e).is(":checked")){
              var ind_price = $(e).data('price');
              addonprice = Number(addonprice)+Number(ind_price);
            }
          });
        }

        $.ajax({
          type:"POST",
          url:"<?php echo base_url("website/ajax_gettoppings_price"); ?>",
          data:{shape_id:shape_id,variant_id:variant_id,cream_id:cream_id},
          success: function(data){
              console.log(data);                  
              var newtotal = Number(base_price)+Number(data)+Number(addonprice)+Number(delivery_price);                    
              if(newtotal > base_price){
                animateValue("firstvalue",base_price,newtotal,3000);
              }  
          }
        });
      }

      function validateform(){
        var ad = $('#ajaxstore_datetime').val();
        var ss = $('#selected_slot').val();
        var ds = $('#delivery_slot').val();
        var dp = $('#delivery_price').val();
        var st = $('#selected_time').val();
        var sn = $('#selected_name').val();
        var fid = $('#flavor_id').val();
        var flag = false;
        var flag1 = false;
        var flag2 = false;        
        
        if((ad != null && ad != '') && (ss != null && ss != '') && (ds != null && ds != '') && (dp != null && dp != '') && (st != null && st != '') && (sn != null && sn != '')){
          flag1 = true;
        }else{
          $('#validate_deliverydate').addClass('validate_style');         
        }
        if(fid != null && fid!=''){
          flag2 = true;
        }else{
          $('#validate_flavor').addClass('validate_style');
        }
        if(flag1 && flag2){
          flag = true;
        }else{
          flag = false;
        }
        console.log(flag1,flag2,flag);        
        return flag;
      }

      $('document').ready(function(){
        $('body').on('keyup','#pincode',function(){
            var pincode = $(this).val();
            if(pincode != '' && pincode.length <= 6){
              $.ajax({
                type:"POST",
                url:"<?php echo base_url("website/ajax_checkpincode"); ?>",
                data:{pincode:pincode},
                success: function(data){
                  console.log(data);
                  var values = JSON.parse(data);
                  if(values.status == false){
                    $('.seg').each(function(i,e){
                      $(e).addClass('seg_disabled');            
                    });
                    //$('#not_v_pincode').show();                
                  }else{
                    // good to go for adding in cart
                    //$('#not_v_pincode').hide();
                    $('.seg').show();
                    $('.seg').each(function(i,e){
                      if($(e).hasClass('seg_disabled')){
                        $(e).removeClass('seg_disabled');
                      }
                    });
                  } 
                  // reset all the part of add to cart
                  resetall();                       
                }
              });
            }else{
              //alert('Enter Pincode Properly');
              //location.reload();
              $('.seg').each(function(i,e){
                $(e).addClass('seg_disabled');            
              });
            }
        });

        $('body').on('click','#close_date_model',function(){
            $('#pincode').val('');
            $('.seg').addClass('seg_disabled');
            $('#deliverytime').hide();
            $('#selectdel').show(); 
            $('#ajaxstore_datetime').val('');
            $('#selected_slot').val('');  
            $('#delivery_price').val(''); 
            $('#selected_name').val(''); 
            $('#selected_time').val('');
            $('#delivery_slot').val('');
            $('#message').val('');
        });

        $('#ajaxstore_datetime').click(function(){
          var datetime = $(this).val();
          var pid = $(this).data('prodid');
          if(typeof datetime != 'undefined' || datetime != ''){
            $.ajax({
              type:"POST",
              url:"<?php echo base_url("website/ajax_getdeliveryslot"); ?>",
              data:{datetime:datetime,pid:pid},
              success: function(data){
                //console.log(data);   
                $('#myRadios').html(data);           
              }
            });
          }else{
            alert('Please Select Appropriate Date !!');
          }        
        });

        $('body').on('click touch','.myRadios', function () {

          var slotid = $(this).val();
          var slotname = $(this).data('text');
          var slotprice = $(this).data('price');
          
          $('#delivery_slot').val(slotid);
          $('#delivery_price').val(slotprice);
          $('#selected_slot').val(slotname);

          $('#delivery_slot').trigger('click');
          $('.btn-deliverytype').trigger('click');          
        })

        $('body').on('click','#delivery_slot',function(){
          var slotid = $(this).val();
          var datetime = $('#ajaxstore_datetime').val();
          var pid = $('#ajaxstore_datetime').data('prodid');

          if(typeof slotid != 'undefined' || slotid != ''){
            $.ajax({
              type:"POST",
              url:"<?php echo base_url("website/ajax_getdeliverytime"); ?>",
              data:{slotid:slotid,datetime:datetime,pid:pid},
              success: function(data){
                //console.log(data);   
                $('#myRadios1').html(data);           
              }
            });
          }else{
            alert('Please Select Appropriate Date');
          }
        });

        $('body').on('click touch', '.selectedtime', function () {
          var selectedid = $(this).val();
          var selectedname = $(this).data('text');
          $('#selected_time').val(selectedid);
          $('#selected_name').val(selectedname);
          $('.btn-deliverytime').trigger('click');
        });

        $('body').on('click touch','#remove_delivery_date',function(){
            resetall();
            var base_price = $('#base_price').val();
            $('#firstvalue').text(base_price);
        });

        $('body').on('click touch','.falvor_pop_value',function(){
            var key = $(this).val();
            var name = $(this).parent('label').text();
            $('#flavor_id').val(key);
            $('#flavor_popup').text("Flavor : "+name);
            $('#flavor_popup').addClass('text-success');
            $('#flavor_popup').prop('style',"font-weight:600;border:1px solid cornflowerblue");
            $('#falvor_pop_close').click();
        });

        $('body').on('click touch','.shape_pop_value',function(){
            var key = $(this).val();
            var name = $(this).parent('label').text();
            $('#shape_id').val(key);
            $('#shape_popup').text("Shape : "+name);
            $('#shape_popup').addClass('text-success');
            $('#shape_popup').prop('style',"font-weight:600;border:1px solid black");
            $('#shape_pop_close').click();
            checkprice_update();
        });

        $('body').on('click touch','.cream_pop_value',function(){
            var key = $(this).val();
            var name = $(this).parent('label').text();
            $('#cream_id').val(key);
            $('#cream_popup').text("Cream : "+name);
            $('#cream_popup').addClass('text-success');
            $('#cream_popup').prop('style',"font-weight:600;border:1px solid orange");
            $('#cream_pop_close').click();
            checkprice_update();
        });

        $('body').on('click touch','.menucheckbox',function(){
          checkprice_update();
        });

      });
    </script>  
  </body>
</html>