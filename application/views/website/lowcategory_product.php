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
        <div class="col-lg-3">
          <div class="FilterOptions">
            <div class="filterCategories">
              <h3>Category</h3> <hr>
              <?php 
              $sidemenulist = maincategory_menu();              
              if(!empty($sidemenulist)){
                  foreach($sidemenulist as $s_menu){
                      if($s_menu['id'] == $lowcategory['cat_id']){ ?>
                <p><a href="<?php echo base_url("cat/$s_menu[slug]");?>" class="text"><?php echo $s_menu['name'];?></a></p>    
              <?php       
                  if(!empty($s_menu['subcat'])){
                    $submenulist = $s_menu['subcat'];
                    echo '<ul class="full_space">';
                    foreach($submenulist as $sub_menu){ ?>
                  <li><a href="<?php echo base_url("subcat/$sub_menu[slug]"); ?>"><?php echo $sub_menu['name'];?></a></li>  
                  <?php if(!empty($sub_menu['lowcat'])){
                    $lowmenulist = $sub_menu['lowcat'];
                    echo '<ul class="last_category">';
                    foreach($lowmenulist as $l_list){ ?>
                  <li><a href="<?php echo base_url("lowcat/$l_list[slug]"); ?>" <?php if($l_list['id'] == $lowcategory['id']){ echo "class='ActiveList'";}?>><?php echo $l_list['name'];?></a></li>  
                  <?php }
                    echo '</ul>';
                  }?>                      
              <?php   } 
                  echo '</ul>';
                          }
                      }
                  }
              }
              ?>       
            </div><!--/-filterCategories-->
            <?php if(!empty($brandlist)){ ?>
            <div class="Classwise">
              <hr><h3>Brands</h3>
              <hr>
              <?php foreach($brandlist as $blist){?>
              <label for="<?php echo $blist['name'];?>"><input type="radio" class="brand" value="<?php echo $blist['id'];?>"> <?php echo $blist['name'];?></label>  
              <?php } ?>            
            </div>
            <?php }?>
            
            
            <div class="PriceRange">
              <hr><h3>Price Range</h3><hr>
              <input type='hidden' id='cat_id' value='<?php echo $lowcategory['cat_id'];?>'/>
              <input type='hidden' id='subcat_id' value='<?php echo $subcat_id;?>'/>
              <input type='hidden' id='lowcat_id' value='<?php echo $lowcategory['id'];?>'/>
              <label for="pricerange_1"><input type="radio" class="pricerange" id='pricerange_1' name='pricerange' value="0-50" 
              <?php if(isset($_GET['pricerange']) && $_GET['pricerange'] == '0-50'){echo 'checked';}?> > Less than Rs 50 </label>
              <label for="pricerange_2"><input type="radio" class="pricerange"  id='pricerange_2' name='pricerange' value="51-100" 
              <?php if(isset($_GET['pricerange']) && $_GET['pricerange'] == '51-100'){echo 'checked';}?> > Rs 51 to Rs 100 </label>
              <label for="pricerange_3"><input type="radio" class="pricerange" id='pricerange_3' name='pricerange' value="101-200" 
              <?php if(isset($_GET['pricerange']) && $_GET['pricerange'] == '101-200'){echo 'checked';}?> > Rs 101 to Rs 200 </label>
              <label for="pricerange_4"><input type="radio" class="pricerange" id='pricerange_4' name='pricerange' value="201-500" 
              <?php if(isset($_GET['pricerange']) && $_GET['pricerange'] == '201-500'){echo 'checked';}?> > Rs 201 to Rs 500 </label>
              <label for="pricerange_5"><input type="radio" class="pricerange" id='pricerange_5' name='pricerange' value="501-1000" 
              <?php if(isset($_GET['pricerange']) && $_GET['pricerange'] == '501-1000'){echo 'checked';}?> > Rs 501 to Rs 1000 </label>
              <label for="pricerange_6"><input type="radio" class="pricerange" id='pricerange_6' name='pricerange' value="1001-1500" 
              <?php if(isset($_GET['pricerange']) && $_GET['pricerange'] == '1001-1500'){echo 'checked';}?> > Rs 1001 to Rs 1500 </label>
              <label for="pricerange_7"><input type="radio" class="pricerange" id='pricerange_7' name='pricerange' value="1500-10000" 
              <?php if(isset($_GET['pricerange']) && $_GET['pricerange'] == '1500-10000'){echo 'checked';}?> > More than Rs 1500 </label>
              <label for="pricerange_8"><input type="radio" class="pricerange" id='pricerange_8' name='pricerange' value="0" 
              <?php if(isset($_GET['pricerange']) && $_GET['pricerange'] == '0'){echo 'checked';}?> > View All </label>
            </div>
            <div class="Discount">
              <hr><h3>Discount</h3><hr>
              <label for="discount_1"><input type="radio" class="discount" id='discount_1' name='discount' value="0-5" 
              <?php if(isset($_GET['discount']) && $_GET['discount'] == '0-5'){echo 'checked';}?> > Upto 5% </label>
              <label for="discount_2"><input type="radio" class="discount" id='discount_2' name='discount' value="5-15" 
              <?php if(isset($_GET['discount']) && $_GET['discount'] == '5-15'){echo 'checked';}?> > 5% - 15% </label>
              <label for="discount_3"><input type="radio" class="discount" id='discount_3' name='discount' value="15-30" 
              <?php if(isset($_GET['discount']) && $_GET['discount'] == '15-30'){echo 'checked';}?> > 15% - 30% </label>
              <label for="discount_4"><input type="radio" class="discount" id='discount_4' name='discount' value="30-60" 
              <?php if(isset($_GET['discount']) && $_GET['discount'] == '30-60'){echo 'checked';}?> > 30% - 60% </label>
              <label for="discount_5"><input type="radio" class="discount" id='discount_5' name='discount' value="60-100" 
              <?php if(isset($_GET['discount']) && $_GET['discount'] == '60-100'){echo 'checked';}?> > More than 60% </label>
              <label for="discount_6"><input type="radio" class="discount" id='discount_6' name='discount' value="0" 
              <?php if(isset($_GET['discount']) && $_GET['discount'] == '0'){echo 'checked';}?> > View All </label>
            </div>          
             <?php if(!empty($quantitylist)){ ?>
            <div class="Classwise">
              <hr><h3>Pack Size</h3>
              <hr>
              <?php foreach($quantitylist as $qlist){?>
              <label for="<?php echo $qlist['id'];?>"><input type="radio" class="quantity" name='quantity' id='<?php echo $qlist['id'];?>' value="<?php echo $qlist['id'];?>" 
              <?php if(isset($_GET['quantity']) && $_GET['quantity'] == $qlist['id']){echo 'checked';}?>> <?php echo $qlist['quant_text'];?></label>  
              <?php } ?>            
            </div>
            <?php }?>
          </div><!--/-FilterOptions-->
        </div>
        <div class="col-lg-9">
          <div class="FilterProducts">
            <div class="row">
              <div class="col-lg-9 pl-2 pr-2"><h2><?php echo strtoupper($lowcategory['name']);?> <span id='counted_show'>( <?php echo count($productlist)?></span> <i>products</i>)</h2><hr></div>
              <div class="col-lg-3 pl-2 pr-2">
                <select name="productView" class="form-control" id='prod_order'> 
                  <option value="low_to_high" <?php if(!isset($_GET['prod_order'])){ echo 'selected';}?><?php if(isset($_GET['prod_order']) && $_GET['prod_order'] == 'low_to_high'){echo 'selected';}?>>Price - Low to High</option>                 
                  <option value="high_to_low" <?php if(isset($_GET['prod_order']) && $_GET['prod_order'] == 'high_to_low'){echo 'selected';}?>>Price - High to Low</option>                  
                  <option value="alphabetical" <?php if(isset($_GET['prod_order']) && $_GET['prod_order'] == 'alphabetical'){echo 'selected';}?>>Alphabetical</option>                  
                </select>
              </div>
            </div>
            <div class="row" id='filterdatashow'>
              <?php if(!empty($productlist)){ $locate_session = $this->session->location_session; $someflag = false;
                  foreach($productlist as $plist){ //print_r($plist);
                  if(!empty($plist['location_id'])){
                    $avail_location = json_decode($plist['location_id']);
                    if(in_array($locate_session['id'],$avail_location)){ $someflag = true;}else{$someflag = false;}
                    ?>               
              <div class="col-6 col-md-3 pl-2 pr-2">
                <?php if($someflag == true){?>  
                <div class="ProductWrap animated bounceInDown">
                  <a href="<?php $encodeprodid = md5($plist['id']); //echo base_url("/product/$encodeprodid");?>"><img src="<?php echo file_url("$plist[path]"); ?>" alt="<?php echo $plist['product_name'];?>" title='<?php echo $plist['product_name'];?>' height="150px"></a>
                  <a href="<?php $encodeprodid = md5($plist['id']); //echo base_url("/product/$encodeprodid");?>"><div class="ProductDesc"><?php echo $plist['product_name'];?></div></a>
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
                    <p>Currently Not Available In Your Location !!</p>
                  </div>
                </div>
                <?php } ?>
              </div>
              <?php  } }
              }?>             
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
        let prod_order = 'low_to_high';
        let quantity = 0;
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

        $('.quantity').each(function(){
          if( $(this).is(":checked") ){ 
            quantity = $(this).val();            
          }
        });

        $('#prod_order').each(function(){
            prod_order = $(this).val();
        })

        var cat_id = $('#cat_id').val();        
        var subcat_id = $('#subcat_id').val();        
        var lowcat_id = $('#lowcat_id').val();        
        $.ajax({
            type:"GET",
            url:"<?php echo base_url("website/product_filter"); ?>",
            data:{catid:cat_id,subcatid:subcat_id,lowcatid:lowcat_id,discount:discount,pricerange:pricerange,quantity:quantity,prod_order:prod_order},
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

        $('body').on('click','.quantity',function(){
            filter_func();
        });

        $('body').on('change','#prod_order',function(){
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
