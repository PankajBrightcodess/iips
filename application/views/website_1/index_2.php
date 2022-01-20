   
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
    <section class="Message">
      <div class="container">
        <div class="row"><div class="col-sm-12">Due to  <a href="https://www.mygov.in/covid-19">COVID-19 Pandemic</a>, you may experience delayed services.</div></div>
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
    <section class="CakeArea">
      <div class="container-fluid">
        <div class="row">
          <div class="d-none d-sm-block col-sm-4 col-md-4 col-lg-4">
            <a href='<?php echo base_url('cat/cakes');?>'>
              <div class="Heading">
                <div><img src="<?php echo file_url('assets/website/images/cake-title.jpg'); ?>" alt="heading Image"></div>
                <h2>Cakes</h2>
              </div>
            </a>
          </div>
          <div class="col-sm-8 col-md-8 col-lg-8">
              <!-- <div class="Collection">
                <div class="row">
                  <?php $cakesubcat = $categorytree['0']['subcat'];
                    if(!empty($cakesubcat)){$i=0;
                      foreach($cakesubcat as $subcat){$i++; ?>
                  <div class="col-sm-6 col-md-4">
                    <a href="<?php echo base_url('subcat/'.$subcat['slug']);?>"><img src="<?php echo file_url($subcat['image_path']);?>" alt="Cakes"></a>
                    <div class="itemDesc">
                      <h3><?php echo $subcat['name'];?></h3><br/>                    
                    </div>
                  </div> 
                  <?php }
                    }
                  ?>
                                
                </div>
              </div> -->
              <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2 text-right">
                  <a style='text-decoration:none;color:black;' href="<?php echo base_url('cat/cakes');?>"><span style='font-size:0.8rem;'>View All <i class="fas fa-angle-right"></i></span></a>
                </div>
              </div>
              <div class="owl-carousel owl-theme" id="Cakes">
                <?php if(!empty($showcakedata)){
                  foreach($showcakedata as $scdata){ //echo PRE;print_r($scdata);?>
                <div class="item"><div class="PriceDesc">
                    <a href="<?php echo base_url("product/").md5($scdata['id']).'?subcat='.$scdata['subcatslug'][0];?>"><img src="<?php echo file_url("$scdata[path]");?>" alt="Cakes"></a>
                    <div class="itemDesc">
                      <h3 style='font-size:1rem'><?php echo $scdata['product_name'];?></h3>
                      <p></p>
                    </div>
                  </div>             
                </div>
                <?php }
                }?>
              </div>
              <div class='owl-carousel owl-theme' id='CakeSubcat'>
                <?php $cakesubcat = $categorytree['0']['subcat'];
                    if(!empty($cakesubcat)){$i=0;
                      foreach($cakesubcat as $subcat){$i++; ?>
                <div class="item">
                  <a href="<?php echo base_url('subcat/'.$subcat['slug']);?>"><img src="<?php echo file_url($subcat['image_path']);?>" alt="Cakes"></a>
                  <div class="itemDesc text-center">
                    <h3 style='font-size:1rem'><?php echo $subcat['name'];?></h3><br/>                    
                  </div>                  
                </div>
                <?php }
                    }
                  ?>
              </div>              
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </section>
    <!-- <section class="Cakes">
      <div class="container-fluid">
        <div class="row mt-2"><div class="col-sm-12"><h2>Cakes</h2><hr></div></div>
        <div class="row">
          <div class="col-sm-12">
            <div class="owl-carousel owl-theme" id="Cakes">
              <?php if(!empty($showcakedata)){
                foreach($showcakedata as $scdata){ //echo PRE;print_r($scdata);?>
              <div class="item"><div class="PriceDesc">
                  <a href="<?php echo base_url("product/").md5($scdata['id']).'?subcat='.$scdata['subcatslug'][0];?>"><img src="<?php echo file_url("$scdata[path]");?>" alt="Cakes"></a>
                  <div class="itemDesc">
                    <h3 style='font-size:1rem'><?php echo $scdata['product_name'];?></h3>
                    <p></p>
                  </div>
                </div>             
              </div>
              <?php }
              }?>
              </div>
              <div class="view-button mt-3" style="text-align: right;">
                <a href="<?php echo base_url('cat/cakes');?>" class="btn btn-warning">View All</a>
              </div><hr>
            </div>
        </div>
      </div>
    </section> -->
    <section class="Bread">
      <div class="container-fluid">
        <div class="row"><div class="col-sm-12"><h2>Bread</h2><hr></div></div>
        <div class="row">
          <div class="col-sm-12">
            <div class="owl-carousel owl-theme" id="Bread">
              <?php if(!empty($showbreadata)){
                foreach($showbreadata as $scdata){ //echo PRE;print_r($scdata);?>
              <div class="item"><div class="PriceDesc">
                  <a href="<?php echo base_url("product/").md5($scdata['id']).'?subcat='.$scdata['subcatslug'][0];?>"><img src="<?php echo file_url("$scdata[path]");?>" alt="Cakes"></a>
                  <div class="itemDesc">
                    <h3 style='font-size:1rem'><?php echo $scdata['product_name'];?></h3>
                    <p></p>
                  </div>
                </div>             
              </div>
              <?php }
              }?>
              </div>
              <div class="view-button mt-3" style="text-align: right;">
                <a href="<?php echo base_url('cat/breads');?>" class="btn btn-warning">View All</a>
              </div><hr>
          </div>
        </div>
      </div>
    </section>
    <section class="cookiesNbreads">
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
    </section>
    <section class="GiftSec">
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
                  <h3><?php echo $subcat2['name'];?></h3><br/>
                  <!-- <div class="giftBtn"><a href="<?php //echo base_url('filter/');?>" class="btn btn-warning">Gift Now</a></div> -->
                </div>
              <?php }
                  }?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="offers">
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
    </section>
    <section class="subscribe">
      <form action="#" method="post">
        <h2>Newsletter</h2><hr>
        <h3>Subscribe &amp; stay updated with our new offers</h3>
        <input type="text" name="name" placeholder="Name :" required class="form-control">
        <input type="email" name="email" placeholder="Email :" required class="form-control">
        <button type="submit" class="btn btn-success btn-block">Subscribe</button>
        <div class="socialMedia">
          <a>Follow Us : </a>
          <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
          <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a>
          <a href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube" aria-hidden="true"></i></a>
          <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram" aria-hidden="true"></i></a>
        </div>
      </form>
    </section>
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
    </script>
  </body>
</html>