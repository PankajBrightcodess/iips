<header>
  <div class="container">
    <div class="row">
      <div class="col-sm-3 col-md-4 col-lg-3"><div class="logo"><a href="<?php echo base_url('/');?>"><img src="<?php echo file_url('assets/website/images/logo.png'); ?>" alt="Logo"></a></div></div>
      <div class="col-sm-9 col-md-8 col-lg-9">
        <div class="row">
          <div class="col-lg-12">
            <div class="loginLayer">
              <ul>
                <li><a href="#"><img src="<?php echo file_url('assets/website/images/phone.svg'); ?>" alt="Support"> +91-9304548014 (For Support)</a> </li>
                <li>
                  <?php $login_status = $this->Master_model->checkcustomer_login();
                  if($login_status){ ?>
                  <a href="<?php echo base_url('/userlogout');?>"><img src="<?php echo file_url('assets/website/images/logout.svg'); ?>" alt="Login"> Logout</a>
                  <?php }else{?>
                  <a href="<?php echo base_url('/login');?>"><img src="<?php echo file_url('assets/website/images/login.svg'); ?>" alt="Login"> Login / Sign Up</a>
                  <?php } ?>
                </li>
                <li><a href="<?php echo base_url('website/profile') ?>"><img src="<?php echo file_url('assets/website/images/account-fill-black.svg'); ?>" alt="Account"> 
                <?php 
                if($login_status){
                  $username = $this->session->name;
                  echo ucwords($username);                  
                  
                }else{
                  echo 'Account';
                }
                ?>
                </a> </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-sm-10 col-md-11 col-lg-11">
            <div class="searchBox">
              <form action="<?php echo base_url('/search');?>" method="GET">
                <div class="input-group">
                  <!-- <input type="text" name="pincode" maxlength="6" placeholder="Pincode" class="form-control pin"> -->
                  <?php $locationlist = $this->Master_model->getall_location(array('t1.status'=>'1'),'all');?>
                  <select class="form-control city" id="location_city_once">
                    <?php if(!empty($locationlist)){ $i=0;
                      foreach($locationlist as $l_list){ $i++;?>
                    <option value="<?php echo $l_list['id'];?>" 
                      <?php if($i==1){
                        $location_session = array('id'=>"$l_list[id]",'name'=>"$l_list[name] -of- $l_list[statename]");
                        $loc_session = $this->session->location_session;
                        if(empty($loc_session)){ 
                          $this->session->set_userdata('location_session',$location_session);
                        } }
                        if(!empty($loc_session)){
                          $settedid = $loc_session['id'];
                          if($settedid == $l_list['id']){
                            echo 'selected';
                          }
                        }
                       
                        ?>>
                      <?php echo $l_list['name'].' -of- '.$l_list['statename'];?>
                    </option>
                    <?php  }
                    }?>                   
                  </select>
                  <input type="search" name="q" placeholder="Search Here.." value='<?php if(!empty($_GET['q'])){echo $_GET['q']; }?>' class="form-control searchInputArea" required>
                  <div class="input-group-append">
                    <button type="submit" class="input-group-text"> <img src="<?php echo file_url('assets/website/images/search-white.svg'); ?>" alt="search Icon"> </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-12 col-sm-2 col-md-1 col-lg-1">
            <div class="cart">
              <a href="<?php echo base_url('/cart');?>">
                <img src="<?php echo file_url('assets/website/images/shopping-cart.svg'); ?>" alt="cart">
                <div class="cartItem">
                  <?php $cart_count_once = $this->Website_model->get_cartcount();?>
                  <p class="count"><?php echo $cart_count_once;?></p>
                  <p>Cart</p>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</header>
<?php //print_r($_SESSION['location_session']);?>
<?php //unset($_SESSION['location_session']);?>
