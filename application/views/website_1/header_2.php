<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title;?></title>
    <?php $this->load->view('website/main-head-links');?>
  </head>
  <body> 
<header>
  <div class="container">
    <div class="row">
      <div class="col-6 col-sm-2 col-md-2 col-lg-2"><div class="Logo">
        <a href="<?php echo base_url('/');?>">
          <img src="<?php echo file_url('assets/website/images/logo.png'); ?>" alt="Logo" class='img-fluid'>
        </a>
      </div></div>
      <!--<div class="col-6 col-sm-2 col-md-2 col-lg-2">
         <div class="Categories">
          <a href="#CategoryItems" class="btn btn-outline-light navbar-toggler" data-toggle="collapse" aria-controls="CategoryItems" aria-expanded="false" aria-label="Toggle navigation"><img src="<?php echo file_url('assets/website/images/bars.png'); ?>" alt="Brand"> &nbsp; Category</a>
          <div class="CategoryItems collapse" id="CategoryItems">
            <ul>
              <li><a href="<?php //echo base_url('filter/');?>">Birthday Cakes</a></li>
              <li><a href="<?php //echo base_url('filter/');?>">Anniversary Cakes</a></li>
              <li><a href="<?php //echo base_url('filter/');?>">Wedding Cakes</a></li>
              <li><a href="<?php //echo base_url('filter/');?>">Cookies</a></li>
              <li><a href="<?php //echo base_url('filter/');?>">Breads</a></li>
              <li><a href="<?php //echo base_url('filter/');?>">Dry Fruit Cakes</a></li>
              <li><a href="<?php //echo base_url('filter/');?>">Gift Boxes</a></li>
            </ul>
          </div>
        </div> 
      </div>-->
      <div class="col-7 col-sm-8 col-md-8 col-lg-8">
        <div class="searchBox"
          <form action="#" method="post">
            <div class="input-group"><input type="text" name="search" placeholder="Search" required><button type="submit" class="btn"><i class="fas fa-search"></i></button></div>
          </form>
        </div>
      </div>
      <div class="col-2 col-sm-1 col-md-1 col-lg-1">
        <div class="kart">
          <a href='<?php echo base_url('/cart');?>'>
            <button type="button" class="btn"><img src="<?php echo file_url('assets/website/images/cart.png'); ?>" alt="cart" class="img-fluid"></button>
          </a>
          <?php $cartcount = $this->Master_model->count_itemincart();?>
          <div class="kartItems"><?php echo $cartcount;?></div>
        </div>
      </div>
      <div class="col-2 col-sm-1 col-md-1 col-lg-1">
        <div class="UserAccount"><button type="button" class="btn" data-toggle="collapse" href="#AccountDetails" role="button" aria-expanded="false" aria-controls="AccountDetails"><img src="<?php echo file_url('assets/website/images/user.png');?>" class="img-fluid" alt="images"></button></div>
        
        <div class="collapse AcoountDetails" id="AccountDetails">
          <ul>
            
            <?php 
            $sessionset = $this->Master_model->checkcustomer_login();
            if($sessionset){?>
            <li><a href="#"><i class="fas fa-user"></i> My Profile</a></li>
            <li><a href="#"><i class="fas fa-shopping-basket"></i> Orders</a></li>
            <li><a href="<?php echo base_url('/userlogout');?>"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            <?php }else{
            ?>
            <li><a href="<?php echo base_url('/login');?>"><i class="fas fa-lock"></i> Login</a></li>
            <li><a href="<?php echo base_url('/signup');?>">New User <span>Sign Up</span></a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>
<section class="mobile-menu">
      <div class="container">
        <div class="row">
          <div class="col-1">
            <!-- <a href="#CategoryItems1" data-toggle="collapse" aria-controls="CategoryItems" aria-expanded="false" aria-label="Toggle navigation" style="color:#000;"><p style="margin-top: 15px;"><i class="fas fa-bars"></i></p></a> -->
            <div class="nav-menu"><p style="margin-top: 15px; cursor:pointer;" onclick="openNav()"><i class="fas fa-bars"></i></p></div>
            <!-- <div class="nav-menu"><p style="cursor:pointer;" onclick="openNav()">&#9776;</p></div> -->
          </div>
          <div class="col-4 mob-logo" style="text-align: left;">
            <a href="index.php"><img src="<?php echo file_url("assets/website/images/logo.png"); ?>" alt="Brand"></a>
          </div>
          <div class="col-4 mob-cart" style="text-align: right;">
            <a href="cart.php"><img src="<?php echo file_url("assets/website/images/cart.png"); ?>" alt="cart" class="img-fluid"></a>
          </div>
          <div class="col-2" style="text-align: right;">
            <div class="UserAccount"><button type="button" class="btn" data-toggle="collapse" href="#AccountDetails" role="button" aria-expanded="false" aria-controls="AccountDetails"><img src="<?php echo file_url("assets/website/images/user.png"); ?>" class="img-fluid" alt="images"></button></div>
            
            <div class="collapse AcoountDetails" id="AccountDetails">
              <ul>
                <li><a href="login.php"><i class="fas fa-lock"></i> Login</a></li>
                <li><a href="register.php">New User <span>Sign Up</span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-12 mt-1">
            <div class="searchBx">
              <form action="#" method="post">
                <!-- <button type="submit" class="SearchIcn btn"><i class="fas fa-search" aria-hidden="true"></i></button> -->
                <div class="input-group">
                  <input type="text" name="search" placeholder="Search" required="" class="form-control">
                  <div class="input-group-append"><div class="input-group-text"><i class="fas fa-camera" aria-hidden="true"></i></div></div>
                </div>
              </form>
            </div>
          </div>
           <!-- <div class="CategoryItems collapse" id="CategoryItems1">
                <ul>
                  <li><a href="filter.php">Birthday Cakes</a></li>
                  <li><a href="filter.php">Anniversary Cakes</a></li>
                  <li><a href="filter.php">Wedding Cakes</a></li>
                  <li><a href="filter.php">Cookies</a></li>
                  <li><a href="filter.php">Breads</a></li>
                  <li><a href="filter.php">Dry Fruit Cakes</a></li>
                  <li><a href="filter.php">Gift Boxes</a></li>
                  <li><a href="login.php">Login</a></li>
                </ul>
              </div> -->
              <div id="myNav" class="overlay5">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
              <div class="overlay-content5">
                <div class="mob-menu-top">
                  <div class="row">
                    <div class="col-4">
                      <div class="mobile-profile">
                        <img src="<?php echo file_url("assets/website/images/mob-pro.png"); ?>" class="img-fluid" alt="image">
                      </div>
                    </div>
                    <div class="col-8">
                      <p>Welcome Gest</p>
                      <div class="row">
                        <div class="col-5 login-order">
                          <p><a href="login.php">Login</a></p>
                        </div>
                        <div class="col-7 login-order">
                          <p>Track Order</p>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
                <a href="filter.php">Birthday Cakes</a>
                <a href="filter.php">Anniversary Cakes</a>
                <a href="filter.php">Wedding Cakes</a>
                <a href="filter.php">Cookies</a>
                <a href="filter.php">Breads</a>
                <a href="filter.php">Dry Fruit Cakes</a>
                <a href="filter.php">Gift Boxes</a>
                <!-- <a href="login.php">Login</a> -->
              </div>
            </div>

        </div>
      </div>
    </section>
