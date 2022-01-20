
    <section class="banner">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-pause="false">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active"><a href="#"><img src="<?php echo file_url('assets/website/images/banner/01.jpg'); ?>" class="d-block w-100" alt="Slide1"></a></div>
          <div class="carousel-item"><a href="#"><img src="<?php echo file_url('assets/website/images/banner/05.jpg'); ?>" class="d-block w-100" alt="Slide5"></a></div>
          <div class="carousel-item"><a href="#"><img src="<?php echo file_url('assets/website/images/banner/03.jpg'); ?>" class="d-block w-100" alt="Slide3"></a></div>
          <div class="carousel-item"><a href="#"><img src="<?php echo file_url('assets/website/images/banner/06.jpg'); ?>" class="d-block w-100" alt="Slide6"></a></div>
          <div class="carousel-item"><a href="#"><img src="<?php echo file_url('assets/website/images/banner/02.jpg'); ?>" class="d-block w-100" alt="Slide2"></a></div>
          
          <div class="carousel-item"><a href="#"><img src="<?php echo file_url('assets/website/images/banner/04.jpg'); ?>" class="d-block w-100" alt="Slide4"></a></div>

        </div>
        
        </div>
        
          
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </section>
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
    <section class="HomeProducts">
      <div class="container">
      <?php if(!empty($categorytree)){
        foreach($categorytree as $category){ 
        if($category['design_type'] == 'showproducts'){ if(!empty($category['catproducts'])){?>

        <div class="ProdcutSectionWrap">
          <div class="row">
            <div class="col-lg-10"><h2 class="h2align"><?php echo $category['catname'];?></h2></div>
            <div class="col-lg-2"><div class="MoreButton"><a href="<?php echo base_url("/cat/$category[catslug]");?>" class="btn btn-primary">Show More</a></div></div>
            <div class="clearfix"></div>
            <div class="col-lg-12"><hr></div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="owl-carousel owl-theme Boosters FilterProducts">                
                <?php 
                if(!empty($category['catproducts'])){ $locate_session = $this->session->location_session; $someflag = false;                
                $categoryprod = $category['catproducts'];
                foreach($categoryprod as $plist){ 
                  if(!empty($plist['location_id'])){
                  $avail_location = json_decode($plist['location_id']);
                  if(in_array($locate_session['id'],$avail_location)){ $someflag = true;}else{$someflag = false;}
                  $encodeprodid = md5($plist['id']);?>
                <div class="item">
                  <?php if($someflag == true){?>
                  <div class="ProductWrap animated bounceInDown">
                    <a href="<?php $encodeprodid = md5($plist['id']); //echo base_url("/product/$encodeprodid");?>"><img src="<?php echo file_url("$plist[path]"); ?>" alt="<?php echo $plist['product_name'];?>" title='<?php echo $plist['product_name'];?>' height="150px"></a>
                    <a href="<?php $encodeprodid = md5($plist['id']); //echo base_url("/product/$encodeprodid");?>"><div class="ProductDesc"><?php echo $plist['product_name'];?></div></a>
                    <div class="ProductWeight">Quantity : <?php echo $plist['variantname'];?></div>    
                    <div class="ProductPrice" style='font-size:0.8rem'>MRP : <s>₹<?php echo $this->amount->toDecimal($plist['variant_price'],true);?></s> ₹<?php echo $this->amount->toDecimal($plist['variant_offerprice'],true);?></div>
                    <div class="Availability"><span><img src="<?php echo file_url('assets/website/images/instock.svg'); ?>" alt="instock"> In Stock</span><span>&times; Out of Stock</span></div>
                    <div class="AddCart" >
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

                <?php }
                    }
                  } ?>
              </div>
            </div>
          </div><!--NewArrivals Row-->
        </div>

        <?php } }elseif($category['design_type'] == 'show_four_subcat'){ if(!empty($category['subcat'])){?>
           
        <div class="ProdcutSectionWrap" id="FruitsVeg">
          <div class="row">
            <div class="col-lg-12"><h2><?php echo ucwords($category['catname']);?></h2></div>
            <div class="col-lg-12"><hr></div>
          </div>
          <div class="row">
            <?php $cat_subcatlist = $category['subcat']; $i=0;            
            $subcatis = json_decode($category['subcat_id'],true);
            $s_subcat  =  $subcatis[0];
            foreach($cat_subcatlist as $subcatlist){ $i++;
            if(in_array($subcatlist['id'],$s_subcat)){?>
              <div class="col-lg-3">
                <div class="ProductWrap">
                  <div class="ProductImage">
                    <a href="<?php echo base_url("/subcat/$subcatlist[slug]");?>">
                      <img src="<?php echo file_url("$subcatlist[image_path]"); ?>" alt="<?php echo $subcatlist['name']?>" style='height:253px;'>
                    </a>
                  </div>
                  <a href="<?php echo base_url("/subcat/$subcatlist[slug]");?>"><h3><?php echo ucwords($subcatlist['name']);?></h3></a>
                </div>
              </div>
            <?php }} ?>
            
            
          </div>
        </div>

        <?php } }elseif($category['design_type'] == 'show_five_subcat'){ if(!empty($category['subcat'])){ ?>

        <div class="ProdcutSectionWrap" id="Staples">
          <div class="row">
            <div class="col-lg-12"><h2><?php echo $category['catname']; ?></h2></div>
            <div class="col-lg-12"><hr></div>
          </div>
          <div class="row">
            <?php $cat_subcatlist = $category['subcat']; $i=0;
              $ids = array_column($cat_subcatlist,'id');              
              $json = json_decode($category['subcat_id']);
              $s_subcat = $json[0];
              $index = array();
              foreach($s_subcat as $id){
                $index[] = array_search($id,$ids);                
              }              
            ?>
            <div class="col-lg-6 pr-2">
              <?php              
              if(!empty($cat_subcatlist[$index[0]])){
                $subcatdata = $cat_subcatlist[$index[0]];
              ?>
              <div class="ProductWrap">
                <div class="StapleLeft"><a href="<?php echo base_url("/subcat/$subcatdata[slug]");?>"><img src="<?php echo file_url("$subcatdata[image_path]"); ?>" alt="<?php echo $subcatdata['name'];?>"></a></div>
                <a href="<?php echo base_url("/subcat/$subcatdata[slug]");?>"><h3><?php echo strtoupper($subcatdata['name']);?></h3></a>
              </div>
              <?php } ?>
            </div>
            <div class="col-lg-6">
              <div class="row">                
                <div class="col-lg-6 pr-2 pl-2">
                <?php if(!empty($index[1])){ 
                if(!empty($cat_subcatlist[$index[1]])){
                  $subcatdata = $cat_subcatlist[$index[1]];
                ?>
                <div class="ProductWrap">
                  <div class="StapleLeft"><a href="<?php echo base_url("/subcat/$subcatdata[slug]");?>"><img src="<?php echo file_url("$subcatdata[image_path]"); ?>" alt="<?php echo $subcatdata['name'];?>"></a></div>
                  <a href="<?php echo base_url("/subcat/$subcatdata[slug]");?>"><h3><?php echo strtoupper($subcatdata['name']);?></h3></a>
                </div>
                <?php } } ?>

                </div>
                <div class="col-lg-6 pr-2 pl-2">
                  <?php
                  if(!empty($index[2])){ 
                  if(!empty($cat_subcatlist[$index[2]])){
                  $subcatdata = $cat_subcatlist[$index[2]];
                ?>
                  <div class="ProductWrap">
                    <div class="StapleLeft"><a href="<?php echo base_url("/subcat/$subcatdata[slug]");?>"><img src="<?php echo file_url("$subcatdata[image_path]"); ?>" alt="<?php echo $subcatdata['name'];?>"></a></div>
                    <a href="<?php echo base_url("/subcat/$subcatdata[slug]");?>"><h3><?php echo strtoupper($subcatdata['name']);?></h3></a>
                  </div>
                <?php } }?>
                </div>
                <div class="col-lg-6 pr-2 pl-2">
                <?php if(!empty($index[3])){
                  if(!empty($cat_subcatlist[$index[3]])){
                  $subcatdata = $cat_subcatlist[$index[3]];
                ?>
                  <div class="ProductWrap">
                    <div class="StapleLeft"><a href="<?php echo base_url("/subcat/$subcatdata[slug]");?>"><img src="<?php echo file_url("$subcatdata[image_path]"); ?>" alt="<?php echo $subcatdata['name'];?>"></a></div>
                    <a href="<?php echo base_url("/subcat/$subcatdata[slug]");?>"><h3><?php echo strtoupper($subcatdata['name']);?></h3></a>
                  </div>
                <?php } } ?>
                </div>
                <div class="col-lg-6 pr-2 pl-2">
                <?php if(!empty($index[4])){
                  if(!empty($cat_subcatlist[$index[4]])){
                $subcatdata = $cat_subcatlist[$index[4]];
                ?>
                  <div class="ProductWrap">
                    <div class="StapleLeft"><a href="<?php echo base_url("/subcat/$subcatdata[slug]");?>"><img src="<?php echo file_url("$subcatdata[image_path]"); ?>" alt="<?php echo $subcatdata['name'];?>"></a></div>
                    <a href="<?php echo base_url("/subcat/$subcatdata[slug]");?>"><h3><?php echo strtoupper($subcatdata['name']);?></h3></a>
                  </div>
                <?php } } ?>
                </div>
              </div>              
            </div>            
          </div>
        </div>
        <?php } } }

        }  ?>        
      </div>
    </section>
    <?php include 'bottom_section.php' ;?>
    
    <script>
      $('document').ready(function(){
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
