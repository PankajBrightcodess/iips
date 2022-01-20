  
    <section class="banner">
      <div class="BannerTopStrip"></div>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-pause="false">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active"><a href="#"><img src="<?php echo file_url('assets/website/images/banner/banner1.jpg'); ?>" class="d-block w-100" alt="Banner1"></a></div>
          <div class="carousel-item"><a href="#"><img src="<?php echo file_url('assets/website/images/banner/banner2.jpg'); ?>" class="d-block w-100" alt="Banner2"></a></div>
          <div class="carousel-item"><a href="#"><img src="<?php echo file_url('assets/website/images/banner/banner3.jpg'); ?>" class="d-block w-100" alt="Banner3"></a></div>
          <div class="carousel-item"><a href="#"><img src="<?php echo file_url('assets/website/images/banner/banner4.jpg'); ?>" class="d-block w-100" alt="Banner4"></a></div>
          <div class="carousel-item"><a href="#"><img src="<?php echo file_url('assets/website/images/banner/banner5.jpg'); ?>" class="d-block w-100" alt="Banner5"></a></div>
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
      <div class="BannerBottomStrip"></div>
    </section>
    <section class="Message p-2">
      <!-- <div class="container">
        <div class="row"><div class="col-sm-12">Due to  <a href="https://www.mygov.in/covid-19">COVID-19 Pandemic</a>, you may experience delayed services.</div></div>
      </div> -->
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
    <section class="CakeArea">
      <div class="container-fluid">
        <div class="row">         
          <div class="col-md-12">
            <div class="Collection">
              <div class="row">
                <?php //$cakesubcat = $categorytree['0']['subcat'];
                  if(!empty($subcategory_list)){$i=0;
                    foreach($subcategory_list as $subcat){$publish_status = $this->Master_model->check_published($subcat['id']);
                    if($publish_status == true){?>
                <div class="col-4 col-sm-6 col-md-3 p-1">
                  <div class="PriceDesc">
                  <a href="<?php echo base_url('subcat/'.$subcat['slug']);?>"><img src="<?php echo file_url($subcat['image_path']);?>" alt="Cakes" title="<?php echo $subcat['name'];?>"></a>
                  <div class="itemDesc">
                    <h3 class='font-responsive'><?php echo $subcat['name'];?></h3>                  
                  </div>
                  </div>
                </div> 
                <?php } }
                  }
                ?>
                               
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </section>
    <?php if(!empty($categorytree)){
      foreach($categorytree as $category){ if(!empty($category['catproducts'])){?>
      <section class="Cakes pb-3">
        <div class="container-fluid">
          <div class="row">
            <div class="col-8 col-sm-8">
              <h2><?php echo strtoupper($category['name']);?></h2>
            </div>
            <div class="col-4 col-sm-4 text-right">
            <a style='text-decoration:none;color:black;' href="<?php echo base_url("cat/$category[slug]");?>"><span style='font-size:0.8rem;'>View All <i class="fas fa-angle-right"></i></span></a>
            </div>          
          </div><hr>
          <div class="row">
            <div class="col-sm-12">
              <div class="owl-carousel owl-theme cat_category">
                <?php if(!empty($category['catproducts'])){ $show_cateproductdata = $category['catproducts'];
                  foreach($show_cateproductdata as $scdata){?>
                <div class="item"><div class="PriceDesc">
                     <?php if($scdata['discount'] != 0){?>
                      <div class="off-tag">
                        <p><?php echo $scdata['discount'];?>% Off</p>
                      </div>
                      <?php } ?>
                    <a href="<?php echo base_url("product/").md5($scdata['id']).'?subcat='.$scdata['subcatslug'][0];?>"><img src="<?php echo file_url("$scdata[path]");?>" alt="<?php echo $scdata['product_name'];?>" title="<?php echo $scdata['product_name']; ?>"></a>
                    <div class="itemDesc">
                      <h3 class='font-responsive'><?php echo $scdata['product_name'];?></h3>
                     <?php if($scdata['discount'] != 0){?>
                      <p class="price mb-0 pl-3">
                        ₹<?php echo $this->amount->toDecimal($scdata['variant_offerprice']);?> <del>₹<?php echo $this->amount->toDecimal($scdata['variant_price']);?></del>
                      </p>
                      <?php }else{?>
                      <p class="price mb-0 pl-2">
                        ₹<?php echo $this->amount->toDecimal($scdata['variant_offerprice']);?>
                      </p>
                      <?php } ?>
                      
                    </div>
                  </div>             
                </div>
                <?php }
                }?>
                </div>                
            </div>
          </div>
        </div>
      </section>
      <?php if(!empty($category['subcat'])){ 
          $subcategory_data = $category['subcat'];
          foreach($subcategory_data as $subcat_data){ $show_status = $this->Master_model->check_published_subcatproduct($subcat_data['id']);
            if($show_status == true && !empty($subcat_data['products'])){?>
        <section class="Cakes pb-3">
          <div class="container-fluid">
            <div class="row">
              <div class="col-8 col-sm-8">
                <h2><?php echo ucfirst($subcat_data['name']);?></h2>
              </div>
              <div class="col-4 col-sm-4 text-right">
              <a style='text-decoration:none;color:black;' href="<?php echo base_url("subcat/$subcat_data[slug]");?>"><span style='font-size:0.8rem;'>View All <i class="fas fa-angle-right"></i></span></a>
              </div>          
            </div><hr>
            <div class="row">
              <div class="col-sm-12">
                <div class="owl-carousel owl-theme sub_category">
                  <?php if(!empty($subcat_data['products'])){ $subcat_productdata = $subcat_data['products'];
                    foreach($subcat_productdata as $scdata){?>
                  <div class="item"><div class="PriceDesc">
                      <?php if($scdata['discount'] != 0){?>
                      <div class="off-tag">
                        <p><?php echo $scdata['discount'];?>% Off</p>
                      </div>
                      <?php } ?>
                      <a href="<?php echo base_url("product/").md5($scdata['id']).'?subcat='.$scdata['subcatslug'][0];?>"><img src="<?php echo file_url("$scdata[path]");?>" alt="<?php echo $scdata['product_name']?>" title="<?php echo $scdata['product_name'];?>"></a>
                      <div class="itemDesc">
                        <h3 class='font-responsive'><?php echo $scdata['product_name'];?></h3>
                        <?php if($scdata['discount'] != 0){?>
                        <p class="price mb-0 pl-2">
                          ₹<?php echo $this->amount->toDecimal($scdata['variant_offerprice']);?> <del>₹<?php echo $this->amount->toDecimal($scdata['variant_price']);?></del>
                        </p>
                        <?php }else{?>
                        <p class="price mb-0 pl-2">
                          ₹<?php echo $this->amount->toDecimal($scdata['variant_offerprice']);?>
                        </p>
                        <?php } ?>                        
                      </div>
                    </div>             
                  </div>
                  <?php }
                  }?>
                  </div>                
              </div>
            </div>
          </div>
        </section>      

        <?php }
          }
        ?>
        
      <?php }?>

    <?php } } } ?>

    <!-- <section class="cookiesNbreads">
      <div class="BgOverlay">
        <div class="container-fluid">
          <div class="row"><div class="col-sm-12"><h2>Cookies &amp; Breads</h2><p>Salty, sweet &amp; crispy Cookies and multi grain Bread ranges are available.</p></div></div>
          <div class="row" id="wrap-25">
            <div class="col-sm-6 pr-0"><a href="<?php echo base_url('cat/cookies');?>"><img src="<?php echo file_url('assets/website/images/cookies.jpg'); ?>" alt="cookies"></a></div>
            <div class="col-sm-6 pl-0"><a href="<?php echo base_url('cat/breads');?>"><img src="<?php echo file_url('assets/website/images/breads.jpg'); ?>" alt="Breads"></a></div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </section> -->

    <!-- <section class="GiftSec">
      <div class="BgOverlay">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12"><div class="headingInfo"><h2>Gift Items</h2><p>All types of gifts for every occasion.</p></div></div>
          </div>
          <div class="row">
            <div class="col-sm-8 col-md-8 col-lg-8">
              <div class="row">
              <?php              
                  if(!empty($categorytree['3']['subcat'])){
                    $i=0;$giftsubcat = $categorytree['3']['subcat']; 
                    foreach($giftsubcat as $subcat2){$i++; ?>
                <div class="col-sm-4 col-md-4 col-lg-4">
                  <a href="<?php echo base_url('subcat/'.$subcat2['slug']);?>"><img src="<?php echo file_url($subcat2['image_path']);?>" alt="Birthday Gifts"></a>
                  <h3><?php echo $subcat2['name'];?></h3><br/> -->
                  <!-- <div class="giftBtn"><a href="<?php //echo base_url('filter/');?>" class="btn btn-warning">Gift Now</a></div> -->
                <!-- </div>
              <?php }
                  }?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- <section class="offers">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
            <div class="offersHead"><h2>Exclusive Offers</h2> <p>Avail up to <strong>40%</strong> discount. More offers are comming soon.</p></div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <a href="<?php echo base_url('filter/');?>"><img src="<?php echo file_url('assets/website/images/cupcake.jpg');?>" alt="offers"></a>
            <div class="offersDesc">
              <h3><span>20%</span> Discount on Cupcakes</h3>
              <a href="<?php echo base_url('filter/');?>" class="btn btn-light">Get it Now</a>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row offersRight">
              <div class="col-sm-6 col-md-6 col-lg-6">
                <a href="<?php echo base_url('filter/');?>"><img src="<?php echo file_url('assets/website/images/lollipop.jpg');?>" alt="offers"></a>
                <div class="offersDesc">
                  <h3><span>20%</span> Off on Lollipops</h3>
                  <a href="<?php echo base_url('filter/');?>" class="btn btn-light">Get it Now</a>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6">
                <a href="<?php echo base_url('filter/');?>"><img src="<?php echo file_url('assets/website/images/pastries.jpg');?>" alt="offers"></a>
                <div class="offersDesc">
                  <h3><span>10%</span> Off on Pastries</h3>
                  <a href="<?php echo base_url('filter/');?>" class="btn btn-light">Get it Now</a>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6">
                <a href="<?php echo base_url('filter/');?>"><img src="<?php echo file_url('assets/website/images/cookies-offers.jpg');?>" alt="offers"></a>
                <div class="offersDesc">
                  <h3><span>15%</span> Off on Cookies</h3>
                  <a href="<?php echo base_url('filter/');?>" class="btn btn-light">Get it Now</a>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-6">
                <a href="<?php echo base_url('filter/');?>"><img src="<?php echo file_url('assets/website/images/gift-item-offers.jpg');?>" alt="offers"></a>
                <div class="offersDesc">
                  <h3><span>40%</span> Off on Selected Gifts</h3>
                  <a href="<?php echo base_url('filter/');?>" class="btn btn-light">Get it Now</a>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </section>       -->
    <?php $this->load->view('website/footer');?>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo file_url('assets/website/js/owl.carousel.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo file_url('assets/website/js/custom-slider.js');?>"></script>    
    <script>
      setTimeout(function() {
		    $('#msgpopup').click();
	    },5000);

    <?php   
      $paymentpopup = $this->session->userdata('payment_popup');
      $payurl = base_url('makepayment');
      if($paymentpopup){ ?>
      setTimeout(function() {
		    window.location.href = "<?php echo $payurl;?>";
	    },7000); 
    <?php    }  ?>
         
    </script>
  </body>
</html>