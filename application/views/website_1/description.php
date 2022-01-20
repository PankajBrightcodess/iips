<link rel="stylesheet" type="text/css" href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1565190284/Scripts/xzoom.css" media="all" />
<link href="<?php echo file_url('includes/dist/css/vanillaCalendar.css'); ?>" rel="stylesheet">  
<link href="<?php echo file_url('assets/website/css/calendar_style.css');?>" rel='stylesheet'> 
<?php //print_r($_SESSION);//unset($_SESSION['cart_session']);?>
    <section class="pages" id="ItemDescPg">
      <div class="container">
          <?php if(!empty($breadcrumb)){?>
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="MyBreadcrumbs">
                  <ul>
                  <?php foreach($breadcrumb as $key=>$crumb){
                    if($key != '0'){?>
                      <li><a href="<?php echo base_url($key);?>"><?php echo $crumb;?></a></li>
                    <?php 
                    }else{ ?>
                      <li><?php echo $crumb;?></li>
                    <?php } } ?>
                    
                  </ul>
                </div>
              </div>
            </div>
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
          <?php } ?>
        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="ProductVisual">
              <div class="d-flex justify-content-center">
                <div id="default" class="padding-top0">
                  <div class="row">
                    <div class="large-5 column">
                      <div class="xzoom-container">
                        <img class="xzoom" id="xzoom-default" title='<?php echo $productdata['product_name'];?>' alt='<?php echo $productdata['product_name'];?>' src="<?php echo file_url($productdata['path']);?>" xoriginal="<?php echo file_url($productdata['path']);?>" />
                        <div class="xzoom-thumbs">
                          <!-- <a href="images/categories/cakes/original/birthday.jpg"><img class="xzoom-gallery" width="80" src="images/categories/cakes/birthday.jpg" xpreview="images/categories/cakes/birthday.jpg"></a>

                          <a href="images/categories/cakes/original/birthday.jpg"><img class="xzoom-gallery" width="80" src="images/categories/cakes/birthday.jpg"></a>

                          <a href="images/categories/cakes/original/birthday.jpg"><img class="xzoom-gallery" width="80" src="images/categories/cakes/birthday.jpg"></a>

                          <a href="images/categories/cakes/original/birthday.jpg"><img class="xzoom-gallery" width="80" src="images/categories/cakes/birthday.jpg"></a>  -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="row Intro">
                <div class="col-3 col-sm-2"><img src="<?php echo file_url('assets/website/images/safety.png');?>" alt="gurantee"></div>
                <div class="col-9 col-sm-10">
                 <p>100% Quality Guaranteed <br> <span>Products - On Time Delivery</span></p>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-12">
                  <hr>
                  <p><i class="fas fa-shield-alt"></i> 100% Safe &amp; Secure Payments.</p>                  
                </div>
              </div>              
            </div>
          </div>          
          <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="ProductDesc">
              <h1><?php echo ucwords($productdata['product_name']); ?> - <?php echo ucwords($productdata['variantname']);?> 
                <!-- <sup><img src='<?php //$img = $productdata['propertyname']['image'];echo file_url("$img");?>' alt='<?php //echo $productdata['propertyname']['name'];?>' width="20px" height="20px"/></sup> -->
              </h1>
              <div class="ItemRating">
                 4.5 <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star" aria-hidden="true"></i> <i class="fas fa-star-half-alt" aria-hidden="true"></i><span> (1205 Reviews)</span>
              </div>
              <?php if($productdata['discount'] != 0){?>
              <div class="ItemPrice">₹ <span id='firstvalue'><?php echo $this->amount->toDecimal($productdata['variant_offerprice']);?></span> <sup><del>₹ <?php echo $this->amount->toDecimal($productdata['variant_price']);?></del> <span><?php echo $productdata['discount'];?>% Off</span></sup></div>
              <?php }else{ ?>
              <div class="ItemPrice">₹ <span id='firstvalue'><?php echo $this->amount->toDecimal($productdata['variant_offerprice']);?></span></div>
              <?php } ?>
              <div class="viewMore"><a href="#FullDesc"><i class="fas fa-angle-down"></i> View More Details</a></div>
              <input type='hidden' id='base_price' value='<?php echo $productdata['variant_offerprice'];?>'/>
              <input type='hidden' id='variant_id' value='<?php echo $productdata['variant_id'];?>'/>
              <div class="ItemOptions">
                <p>Pick an Upgrade</p>

                <?php if(!empty($variantlist)){ $i = 0;
                  foreach($variantlist as $varier){ $i++;?>
                <a href="<?php echo base_url("product/".md5($varier['id']).'/?subcat='.$subcategory['slug']);?>" class="<?php if($i==1){echo 'selected';}?>">
                  <img src="<?php echo file_url($varier['path']);?>" alt="<?php echo $varier['product_name'];?>" title="<?php echo "$varier[product_name] - $varier[variantname]";?>">
                  <p><?php echo ucwords($varier['variantname']);?></p>
                  <p class="price">₹ <?php echo $this->amount->toDecimal($varier['variant_offerprice']);?></p>
                </a>
                <?php }
                }?>   
              </div>
              <div class="DeliveryLocation">
                <form action="<?php echo base_url('website/addtocart');?>" method="post">                  
                  <?php if(!empty($productdata['addonname'])){?>
                  <div class='row seg seg-disabled'>
                    <div class="col-md-6"></div>
                    <div class="col-md-6 text-right">
                      <a data-toggle="collapse" href='#demo'>
                        <p type='button' class='text-success' >
                          <span class="fas fa-plus"></span> EXTRA's <!--<span class='fas fa-angle-down'></span>-->
                        </p>
                      </a>                      
                    </div>
                  </div>
                  
                  <div class="row mt-3 seg seg-disabled">
                    <div id="demo" class="col-md-12 collapse mb-2">
                      <div class="owl-carousel owl-theme addon_menu" style='height:250px;overflow-y:auto'>
                      <?php $addonmenu_data = $productdata['addonname'];
                        foreach($addonmenu_data as $ad_key=>$addonmenu){?>
                        <div class="item p-1"><div class="PriceDesc">                            
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
                      <?php  }
                      ?>
                      </div>
                    </div>
                  </div>
                  </div>
                  <?php } ?>
                  <div class="row descCartBtn seg">
                    <div class="col-sm-6"><button type="submit" name='AddToCart' class="btn btn-success btn-block btn-lg"><i class="fas fa-cart-plus"></i> Add to Cart</button></div>
                    <div class="col-sm-6"><button type="submit" name='BuyNOW' class="btn btn-warning btn-block btn-lg"><i class="fas fa-shopping-basket"></i> Buy Now </button></div>
                    <div class="clearfix"></div>
                  </div>
                  <div id='not_v_pincode' style='display:none;'>
                    <p class='text-danger'><h4>Sorry Right Now We are not delivering in this pincode.</h4></p>
                  </div>
                </form>
              </div>         
              
              
            </div>
          </div>
        </div>
        <div class='row'>
          <div class="col-sm-12 FullDesc" >
                <h3>Description</h3>
                <hr>
                <p><span>Product Details:</span></p>
                <p>
                  <?php if(!empty($productdata['desp'])){
                    echo $productdata['desp'];
                  }else{?>
                <ul>
                  <!-- <li>Cake Flavour- Black Forest</li>
                  <li>Type of Cake - Cream</li>
                  <li>Weight- Half Kg</li>
                  <li>Shape- Rectangular</li>
                  <li>Serves- 4-6 People</li>
                  <li>Size- 10x6 inches</li> -->
                </ul>
                  <?php } ?>
                </p>
                <!-- <p><span>Please Note:</span></p>
                <ul>
                  <li>The cake stand, cutlery &amp; accessories used in the image are only for representation purposes. They are not delivered with the cake.</li>
                  <li>This cake is hand delivered in a good quality cardboard box.</li>
                </ul>
                <h3>Delivery Information</h3>
                <p>Every cake we offer is handcrafted and since each chef has his/her own way of baking and designing a cake, there might be slight variation in the product in terms of design and shape.</p>
                <p>The chosen delivery time is an estimate and depends on the availability of the product and the destination to which you want the product to be delivered.</p>
                <p>Since cakes are perishable in nature, we attempt delivery of your order only once. The delivery cannot be redirected to any other address.</p>
                <p>This product is hand delivered and will not be delivered along with courier products.</p>
                <p>Occasionally, substitutions of flavours/designs is necessary due to temporary and/or regional unavailability issues.</p> -->
                <!-- <h3>Care Instructions</h3>
                <p>Store cream cakes in a refrigerator. Fondant cakes should be stored in an air conditioned environment.</p>
                <p>Slice and serve the cake at room temperature and make sure it is not exposed to heat.</p>
                <p>Use a serrated knife to cut a fondant cake.</p>
                <p>Sculptural elements and figurines may contain wire supports or toothpicks or wooden skewers for support.</p>
                <p>Please check the placement of these items before serving to small children.</p>
                <p>The cake should be consumed within 24 hours.</p>
                <p>Enjoy your cake!</p> -->
                <h3 class='mb-3'>Tags :</h3>
                <?php //echo PRE;print_r($productdata);?>
                <p>
                  <?php if(!empty($productdata['subcatname'])){
                    foreach($productdata['subcatname'] as $key=>$tag){?>
                  <a href='<?php $subcatslug = $productdata['subcatslug'][$key];echo base_url("subcat/$subcatslug");?>'><span class='tag_btn' title="<?php echo $tag;?>"><?php echo $tag;?></span></a>
                  <?php }
                  }?>
                </p>



              </div>
        </div>
      </div>    
    </section>    
    <section class='relatedpages' id='filter'>
       <div class="container">
          <h3>Related Products</h3>
          <div class="row mt-3">
            <?php if(!empty($relatedlist)){
              foreach($relatedlist as $rlist){
            ?>
            <div class="col-sm-6 col-lg-3">
                <div class="FilterContent">
                  <a href="<?php echo base_url("product/".md5($rlist['id']).'/?subcat='.$subcategory['slug']);?>">
                    <img src="<?php echo file_url($rlist['path']); ?>" alt="<?php echo $rlist['product_name'];?>">
                    <div class="ProductInfo" style='background-color:#f9f9f9;'>
                      <h3><?php echo $rlist['product_name'];?></h3>
                      <p class="price mb-0 pl-2">₹<?php echo $rlist['variant_offerprice'];?> <del>₹<?php echo $rlist['variant_price'];?></del> </p>
                    </div>
                  </a>
                </div>
              </div> 
            <?php } }?>                      
          </div>
       </div>             
    </section>
    <a href='#' id='addon_popup' data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" style='display:none;'>a</a>
    
    <div id="PgFooter"><?php $this->load->view('website/footer.php') ; ?></div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- start product zoom Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1565190285/Scripts/xzoom.min.js"></script>
    <!-- <script src="<?php //echo file_url('assets/website/js/hammer.min.js');?>"></script>
    <script src="<?php //echo file_url('assets/website/js/zoom.js');?>"></script> -->
    <!-- end product zoom Script -->
    <script src="<?php echo file_url('includes/dist/js/vanillaCalendar.js'); ?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo file_url('assets/website/js/owl.carousel.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo file_url('assets/website/js/custom-slider.js');?>"></script> 
    <script>
      window.addEventListener('load', function () {
        vanillaCalendar.init({
          disablePastDays: true
        });
      })
      setTimeout(function() {
		    $('#msgpopup').click();
	    },5000);
      $('.btn-deliverydate').hide();
      $('.btn-deliverytype').hide();
      $('.btn-deliverytime').hide();
      var lastSelected;
      

      $(document).on('click', '.myRadios', function () {

          var slotid = $(this).val();
          var slotname = $(this).data('text');
          var slotprice = $(this).data('price');
          
          $('#delivery_slot').val(slotid);
          $('#delivery_price').val(slotprice);
          $('#selected_slot').val(slotname);

          $('#delivery_slot').trigger('click');
          $('.btn-deliverytype').trigger('click');          
      });
      $(document).on('click', '.selectedtime', function () {
          var selectedid = $(this).val();
          var selectedname = $(this).data('text');
          $('#selected_time').val(selectedid);
          $('#selected_name').val(selectedname);
          $('.btn-deliverytime').trigger('click');
      }); 
      function date_convert(str) {
        var date = new Date(str),
          mnth = ("0" + (date.getMonth() + 1)).slice(-2),
          day = ("0" + date.getDate()).slice(-2);
        return [date.getFullYear(), mnth, day].join("-");
      }         
      function set_datetime(){  
        var selected_date = $('#ajaxstore_datetime').val();      
        var selected_slot = $('#selected_slot').val();      
        var delivery_price = $('#delivery_price').val();      
        var selected_name = $('#selected_name').val();      
        
        //var date = date_convert(selected_date);
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

      function takevariant_entry(){

      }
      $('document').ready(function(){
            <?php if($productdata['discount'] != 0){?>
            animateValue("firstvalue",<?php echo $productdata['variant_price']?>,<?php echo $productdata['variant_offerprice']?>,3000); 
            <?php } ?>           
            <?php 
            $cartsession = $this->session->userdata('addon_popup');
            $comeof = $this->session->userdata('comeof');
            
            if(empty($comeof)){$comeof = 'cart';}
              if($cartsession){ ?>
              $('#addon_popup').click();
              $('#comeof').val("<?php echo $comeof;?>");
              //$('#redirect_onclose').text("<?php //echo $redirect_onclose;?>");
            <?php   }  ?>              
              
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
                      $(e).addClass('seg-disabled');            
                    });
                    //$('#not_v_pincode').show();                
                  }else{
                    // good to go for adding in cart
                    //$('#not_v_pincode').hide();
                    $('.seg').show();
                    $('.seg').each(function(i,e){
                      if($(e).hasClass('seg-disabled')){
                        $(e).removeClass('seg-disabled');
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
                $(e).addClass('seg-disabled');            
              });
            }
          });

          $('.minus-btn').on('click', function(e) {
            e.preventDefault();
            var $this = $(this);
            var $input = $this.closest('div').find('input');
            var value = parseInt($input.val());
        
            if (value > 1) {
                value = value - 1;
            } else {
                value = 0;
            }
        
            $input.val(value); 
            if(value != 0){
              var addonprice = 0;
              var base_price = $(this).closest('.row').find('.base_price').val();
              var totalprice = parseFloat(base_price)*parseFloat(value);
              $(this).closest('.row').find('.addoncheckbox').attr('data-price',totalprice);
              $('.addoncheckbox').each(function(i,e){
                if($(e).is(":checked")){
                  var ind_price = $(e).data('price');
                  addonprice = parseInt(addonprice)+parseInt(ind_price);
                }
              });
              $('#addonprice').text(addonprice);
            }
          });

          $('.plus-btn').on('click', function(e) {
            e.preventDefault();
            var $this = $(this);
            var $input = $this.closest('div').find('input');
            var value = parseInt($input.val());
        
            if (value < 100) {
                value = value + 1;
            } else {
                value =100;
            }
        
            $input.val(value);
            if(value != 0){
              alert(value);
              var addonprice = 0;
              var base_price = $(this).closest('.row').find('.base_price').val();
              var totalprice = parseFloat(base_price)*parseFloat(value);
              $(this).closest('.row').find('.addoncheckbox').prop('data-price',totalprice);        
            }
            //$(this).closest('.row').find('.addoncheckbox').prop('checked',true);
            if($(this).closest('.row').find('.addoncheckbox').is(":not(:checked)")){
              $(this).closest('.row').find('.addoncheckbox').trigger('click');
            }
            
          });

          $('body').on('click','.addoncheckbox',function(){
            var prodid = $(this).val();
            var prodprice = $(this).data('price');
            var prodquant = $(this).closest('.row').find('.addonquant').val();
            var addonprice = 0;

            if(prodquant == 0){
              var newprodqunat = 1
            }else{
              var newprodqunat = prodquant;
            }
            if($(this). is(":checked")){
              $(this).closest('.row').find('.addonquant').val(newprodqunat);
              
              $('.addoncheckbox').each(function(i,e){
                if($(e).is(":checked")){
                  var ind_price = $(e).data('price');
                  addonprice = parseInt(addonprice)+parseInt(ind_price);
                }
              });
            }else{
              $(this).closest('.row').find('.addonquant').val(0);
              $('.addoncheckbox').each(function(i,e){
                if($(e).is(":checked")){
                  var ind_price = $(e).data('price');
                  addonprice = parseFloat(addonprice)+parseFloat(ind_price);
                }
              });
            }
            $('#addonprice').text(addonprice);
            var v = $('#variant_price').text();
            var y = $('#addonprice').text();
            var z = $('#shippingcharge').text();       
            
            v = isNaN(v) ? '0.00' : v;       
            y = isNaN(y) ? '0.00' : y;       
            z = isNaN(z) ? '0.00' : z;       
            var total = parseFloat(v)+parseFloat(y)+parseFloat(z);
            $('#totalprice').text(total);
          });

          $('body').on('click','#close_date_model',function(){
              $('#pincode').val('');
              $('.seg').addClass('seg-disabled');
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

          $('body').on('change','#shape_id',function(){
              var base_price = $('#base_price').val();
              var variant_id = $('#variant_id').val();
              var shape_id = $(this).val();
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
             
          });

          $('body').on('change','#cream_id',function(){
              var settedvalue = $('#firstvalue').html();
              var base_price = $('#base_price').val();
              var variant_id = $('#variant_id').val();
              var cream_id = $(this).val();
              var shape_id = $('#shape_id').val();

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
                data:{cream_id:cream_id,variant_id:variant_id,shape_id:shape_id},
                success: function(data){
                    console.log(data);                    
                    var newtotal = Number(base_price)+Number(data)+Number(addonprice)+Number(delivery_price);
                    if(newtotal > base_price){
                      animateValue("firstvalue",base_price,newtotal,3000);
                    }  
                }
              });
              
          });

          $('body').on('click','.menucheckbox',function(){
            var settedvalue = $('#firstvalue').html();
            var base_price = $('#base_price').val();
            var variant_id = $('#variant_id').val();
            var cream_id = $('#cream_id').val();
            var shape_id = $('#shape_id').val();            
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
                data:{cream_id:cream_id,variant_id:variant_id,shape_id:shape_id},
                success: function(data){
                    console.log(data,addonprice);                    
                    var newtotal = Number(base_price)+Number(data)+Number(addonprice)+Number(delivery_price);
                    if(newtotal > base_price){
                      animateValue("firstvalue",base_price,newtotal,3000);
                    }
                }
            });    
            
          });
          
      });
      $('#addon_popup').click(function(){          
        $('#myModal').addClass('show');
        $('#myModal').css({'display': 'block','background-color':'rgba(0, 0, 0, 0.37)'});
        $('body').addClass('modal-open');
      });

      $('#myModalClose').click(function(){
        $('#myModal').removeClass('show');
        $('#myModal').css({'padding-right': '','display': '','background-color':''});
        $('body').removeClass('modal-open');
      });

      $('#myaddonsubmit').click(function(){
        $('#myModal').removeClass('show');
        $('#myModal').css({'padding-right': '','display': '','background-color':''});
        $('body').removeClass('modal-open');
        takevariant_entry();
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
          alert('Please Select Appropriate Date');
        }
        
      });

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
       
    </script>
  </body>
</html>