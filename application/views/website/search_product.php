<!-- this page part -->
  <section class="FilterPage">
    <div class="container">
      <?php 
      include('breadcrumb.php');
      //print_r($_SESSION);//unset($_SESSION['mycart']);unset($_SESSION['added_on'],$_SESSION['order_id']);
      ?>
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
      <div class="row">
        
        <div class="col-lg-9">
          <div class="FilterProducts">
            <div class="row">              
              <!-- <div class="col-lg-3 pl-2 pr-2">
                <select name="productView" class="form-control">
                  <option value="Popularity">Popularity</option>
                  <option value="Price - High to Low">Price - High to Low</option>
                  <option value="Price - Low to High">Price - Low to High</option>
                  <option value="Alphabetical">Alphabetical</option>
                  <option value="Off - High to Low">% Off - High to Low</option>
                </select>
              </div> -->
            </div>
            <div class="row">
              <?php if($searchdata['status'] == false){
                  $msg = $searchdata['msg'];
                  echo $msg;
              }else{
                  $productlist = $searchdata['productlist'];
                  if(!empty($productlist)){ $locate_session = $this->session->location_session; $someflag = false; ?>
              <div class="col-lg-12 pl-2 pr-2"><h2><?php echo "Search Result Of : ".'<span class="text-danger">'.$keyword.'</span>';?> <span id='counted_show'>( <?php echo count($productlist)?></span> <i>products</i>)</h2><hr></div>
                <?php  foreach($productlist as $plist){//print_r($plist);
                    if(!empty($plist['location_id'])){
                        $avail_location = json_decode($plist['location_id']);
                        if(in_array($locate_session['id'],$avail_location)){ $someflag = true;}else{$someflag = false;}
                        ?>               
                <div class="col-6 col-md-3 pl-2 pr-2">
                    <?php if($someflag == true){?>  
                    <div class="ProductWrap animated bounceInDown">
                    <a href="<?php $encodeprodid = md5($plist['id']); echo base_url("/product/$encodeprodid");?>"><img src="<?php echo file_url("$plist[path]"); ?>" alt="<?php echo $plist['product_name'];?>" title='<?php echo $plist['product_name'];?>' height="150px"></a>
                    <a href="<?php $encodeprodid = md5($plist['id']); echo base_url("/product/$encodeprodid");?>"><div class="ProductDesc"><?php echo $plist['product_name'];?></div></a>
                    <div class="ProductWeight">Quantity : <?php echo $plist['variantname'];?></div>    
                    <div class="ProductPrice" style='font-size:0.8rem'>MRP : <s>₹<?php echo $this->amount->toDecimal($plist['variant_price'],true);?></s> ₹<?php echo $this->amount->toDecimal($plist['variant_offerprice'],true);?></div>
                    <div class="Availability"><span><img src="<?php echo file_url('assets/website/images/instock.svg'); ?>" alt="instock"> In Stock</span><span>&times; Out of Stock</span></div>
                    <div class="AddCart">
                        <form action="<?php echo '#';//base_url('website/save_tocart');?>" method="post">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <button type="button" class="input-group-text">Qty.</button>
                            </div>
                            <input type="number" name="quantity" placeholder="1" min='1' value='1' max='20' class="QtIn">
                            <input type="hidden" name="prodid" class='prodid' value='<?php echo $plist['id'];?>'>
                            <input type="hidden" name="variantid" class='variantid' value='<?php echo $plist['variant_id'];?>'>
                            <div class="input-group-append">
                            <button type="button" class="btn btn-light input-group-text AddCartBtn"><span><img src="<?php echo file_url('assets/website/images/add-cart.svg'); ?>" alt="Add Cart"></span> Add</button>
                            </div>
                        </div>
                        </form>
                    </div> 
                    </div>
                    <?php }else{?>
                    <div class="ProductWrap seg-disabled animated wobble">
                    <a href="#"><img src="<?php echo file_url("$plist[path]"); ?>" alt="<?php echo $plist['product_name'];?>" title='<?php echo $plist['product_name'];?>'  height="150px"></a>
                    <a href="#"><div class="ProductDesc"><?php echo $plist['product_name'];?></div></a>
                    <div class="ProductWeight">Quantity : <?php echo $plist['variantname'];?></div>
                    <div class="ProductPrice" style='font-size:0.8rem'>MRP : <s>₹<?php echo $this->amount->toDecimal($plist['variant_price'],false);?></s> ₹<?php echo $this->amount->toDecimal($plist['variant_offerprice'],true);?></div>
                    <div class="Availability"><span><img src="<?php echo file_url('assets/website/images/instock.svg'); ?>" alt="instock"> &times; Out of Stock</span></div>
                    <div class="AddCart">
                        <p class='mb-1'>Currently Not Available In Your Location !!</p>
                    </div>
                    </div>
                    <?php } ?>
                </div>
                <?php  } }
                }?>             
              </div>
              <?php } ?>
            </div>
          </div><!--/-FilterProducts-->
        </div>
      </div>
    </div>
  </section>
<!-- end of this page part -->
  <?php include'bottom_section.php' ; ?>
    <script>
      function filter_func(){
        let pricerange = 0;
        let discount = 0;
        let lang = 'english';
        $('.pricerange').each(function(){
           if( $(this).is(":checked") ){ 
            pricerange = $(this).val();            
          }
        });

        $('.discount').each(function(){
           if( $(this).is(":checked") ){ 
            discount = $(this).val();            
          }
        });

        $('.lang').each(function(){
          if( $(this).is(":checked") ){ 
            lang = $(this).val();            
          }
        });

        var cat_id = $('#cat_id').val();        
        $.ajax({
            type:"GET",
            url:"<?php echo base_url("website/product_filter"); ?>",
            data:{catid:cat_id,lang:lang,discount:discount,pricerange:pricerange},
            success: function(data){
                //console.log(data);
                $('#filterdatashow').html(data);                  
                // var parsedata = JSON.parse(data);
                var prevurl = window.location.pathname;
                var newpart = $('#newpart_url').val();
                var counted = $('#counted').val();
                if(newpart != undefined){
                  window.history.replaceState({},null,prevurl+newpart);
                } 
                if(counted != undefined){
                  $('#counted_show').text('( '+counted); 
                }else{
                  $('#counted_show').text('( 0'); 
                }          
                                                 
            }
          });
      }

       $('document').ready(function(){

         $('body').on('click','.pricerange',function(){
            filter_func();
         });

         $('body').on('click','.discount',function(){
            filter_func();
         });

         $('body').on('click','.lang',function(){
            filter_func();
         });

         $('body').on('click','.AddCartBtn',function(){
           var qty = $(this).closest('.ProductWrap').find('.QtIn').val();
           var prod = $(this).closest('.ProductWrap').find('.prodid').val();
           var variantid = $(this).closest('.ProductWrap').find('.variantid').val();
            
           $.ajax({
              type:"POST",
              url:"<?php echo base_url("website/save_tocart"); ?>",
              data:{qty:qty,prod:prod,vid:variantid},
              success: function(data){
                  if(data){
                    location.reload();
                  }                                              
              }
           });
         });
          
      });
    </script>
  </body>
</html>
