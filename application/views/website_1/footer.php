    <footer>
      <div class="ftrOverlay">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 col-lg-3">
              <h2>Bless Fresh</h2><hr>
              <!-- <p>Our business is not only to sell delicious cakes but we like to say we're in the business of making lasting memories. We are honored to be a part of our customer's special moments and to thank them we strive to make everything as easy and smooth as possible.</p> -->
            </div>
            <div class="col-md-6 col-lg-3">
              <h2>Categories</h2><hr>
              <ul>
                <li><a href="#"><i class="fas fa-angle-right"></i> Birthday Cake</a></li>
                <li><a href="#"><i class="fas fa-angle-right"></i> Anniversary Cake</a></li>
                <li><a href="#"><i class="fas fa-angle-right"></i> Wedding Cake</a></li>
                <li><a href="#"><i class="fas fa-angle-right"></i> Cookies &amp; Breads</a></li>
                <li><a href="#"><i class="fas fa-angle-right"></i> Gift Boxes</a></li>
              </ul>
            </div>
            <div class="col-md-6 col-lg-3">
              <h2>Useful Links</h2>
              <hr>
              <ul>
                <li><a href="#"><i class="fas fa-angle-right"></i> About Us</a></li>
                <li><a href="#"><i class="fas fa-angle-right"></i> Disclaimer</a></li>
                <li><a href="#"><i class="fas fa-angle-right"></i> Privacy Policy</a></li>
                <li><a href="#"><i class="fas fa-angle-right"></i> Special Offers</a></li>
                <li><a href="#"><i class="fas fa-angle-right"></i> Career</a></li>
              </ul>
            </div>
            <div class="col-md-6 col-lg-3">
              <h2>Contact Us</h2><hr>
              <ul>
                <li><i class="fas fa-map-marker-alt"></i> Beside Aurobindo Ashram <br> Devi Mandap Road <br> Ratu Road, Ranchi</li>
                <li><i class="fas fa-phone-alt"></i> +91 - 7717742618</li>
                <li><i class="fas fa-envelope"></i> anjalibakers@gmail.com</li>
              </ul>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="copyright">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 col-lg-9">
                <p>Copyright &copy; 2020, Bless Fresh, All Rights Reserved.</p>
              </div>

              <div class="col-md-6 col-lg-3">
                <p class="devBy">Developed By : <a href="https://www.brightcodess.com/"><img src="<?php echo file_url('assets/website/images/Brightcode-Software-Services-Pvt-Ltd.png'); ?>" alt="Brightcode Software Services Pvt. Ltd." title="Brightcode Software Services Pvt. Ltd."></a></p>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <script>
    function openNav() {
        if(screen.width > 576){
          document.getElementById("myNav").style.width = "40%";
        }else{
          document.getElementById("myNav").style.width = "65%";
        }
      }

      function closeNav() {
        document.getElementById("myNav").style.width = "0%";
      }
    </script>  
    <?php $this->load->view('website/popup_modals');?>    