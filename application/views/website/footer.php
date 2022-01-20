    <footer>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <h2>IIPS</h2><hr>
            <ul>
              <li><a href="<?= base_url('website/about'); ?>">About Us</a></li>
<!--              <li><a href="#">Disclaimer</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Terms &amp; Condition</a></li>
              <li><a href="#">Career @ Bless Fresh</a></li>-->
            </ul>
          </div>
          <div class="col-md-6 col-lg-3">
            <h2>Categories</h2><hr>
            <ul>
            <?php $category=$this->Master_model->getall_category(array('status'=>'1')); 
			//echo PRE;print_r($category);die;
			if(!empty($category)){
			$i=0;
			foreach($category as $cat){	
			if($i<=5){	
			?>
            <li><a href="<?php echo base_url("cat/$cat[slug]"); ?>"><?php echo $cat['name'] ?></a></li>
            <?php }$i++; } }?>
            </ul>
          </div>
          <div class="col-md-6 col-lg-3">
            <h2>Help</h2>
            <hr>
            <ul>
              <li><a href="<?= base_url('login'); ?>">Login</a></li>
              <li><a href="<?= base_url('website/profile'); ?>">Account</a></li>
              <li><a href="<?= base_url('website/contact'); ?>">Contact Us</a></li>
            </ul>
          </div>
          <div class="col-md-6 col-lg-3">
            <h2>Download App</h2><hr>
            <div class="app">
              <a href="https://play.google.com/store/apps/details?id=com.egn.blessfresh"><img src="<?php echo file_url('assets/website/images/playstore.png'); ?>" alt="Google Play Store"></a>
              <a href="#"><img src="<?php echo file_url('assets/website/images/app-store.png'); ?>" alt="App Store"></a>
            </div>
            <h2 class="mt-3">Follow Us</h2><hr>
            <div class="socialMedia">
              <a href="https://www.facebook.com/" target="_blank"><img src="<?php echo file_url('assets/website/images/facebook.svg'); ?>" alt="facebook"></a>
              <a href="https://twitter.com/" target="_blank"><img src="<?php echo file_url('assets/website/images/twitter.svg'); ?>" alt="Twitter"></a>
              <a href="https://www.youtube.com/" target="_blank"><img src="<?php echo file_url('assets/website/images/youtube.svg'); ?>" alt="Youtube"></a>
              <a href="https://www.instagram.com/" target="_blank"><img src="<?php echo file_url('assets/website/images/instagram.svg'); ?>" alt="Instagram"></a>
            </div>
          </div>

          <div class="clearfix"></div>
        </div>
      </div>
      <div class="copyright">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 col-lg-9">
              <p>Copyright &copy; 2022, IIPS, All Rights Reserved.</p>
            </div>

            <div class="col-md-6 col-lg-3">
              <p class="devBy">Developed By : <a href="https://www.brightcodess.com/"><img src="<?php echo file_url('assets/website/images/Brightcode-Software-Services-Pvt-Ltd.png'); ?>" alt="Brightcode Software Services Pvt. Ltd." title="Brightcode Software Services Pvt. Ltd."></a></p>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </footer>
