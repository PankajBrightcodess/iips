    <div class="MainMenu" id="MainMenu" role="navigation" style="display: none">
      <button type="button" class="close" aria-label="Close" onClick="$('#MainMenu').hide();$('body').css('overflow','auto');"><span aria-hidden="true"><i class="fas fa-arrow-left"></i></span></button>
      <div class="profileImg">
        <?php $loginstatus = $this->Master_model->checkcustomer_login();?>
        <div class="row">
          <?php if($loginstatus){ ?>
          <div class="col-4 pr-1"><img src="<?php echo file_url('assets/app/images/profile.jpg');?>" alt="profile"></div>
            <div class="col-8 pl-1 pr-1">
              <h3>Welcome <br/><span><?php $cname = $this->session->name;echo strtoupper($cname);?></span></h3>
              <div class="LogTracBtn">
                <div class="row">
                  
                </div>
              </div>
          </div>
          <?php }else{?>
          <div class="col-4 pr-1"><img src="<?php echo file_url('assets/app/images/profile.jpg');?>" alt="profile"></div>
            <div class="col-8 pl-1 pr-1">
              <h3>Welcome Guest</h3>
              <div class="LogTracBtn">
                <div class="row">                  
                  <div class="col-5 pl-1 pr-1"><a href="<?php echo base_url('app/login');?>" class="btn btn-warning">Log In</a></div>
                  <div class="col-7 pl-1 pr-1"><a href="<?php echo base_url('app/register');?>" class="btn btn-warning">Register</a></div>                  
                </div>
              </div>
          </div>
          <?php }?>          
          <div class="clearfix"></div>
        </div>
      </div>
      <ul>
        <li><a href="<?php echo base_url('/app');?>"><i class="fas fa-home"></i> Home</a></li>
        <li><a href="<?php echo base_url('app/profile');?>"><i class="fas fa-user-circle"></i> Profile</a></li>
        <li><a href="#" role="button" onClick="$('#ShopByCategory').toggle()"><i class="fas fa-list"></i> Shop by Category &nbsp; <i class="fas fa-angle-down"></i></a>
          <ul style="display: none;" id="ShopByCategory">
            <li><a href="<?php echo base_url('app/cat/cakes');?>"><i class="fas fa-birthday-cake"></i> Cakes</a></li>
            <li><a href="<?php echo base_url('app/cat/cookies');?>"><i class="fas fa-cookie"></i> Cookies</a></li>
            <li><a href="<?php echo base_url('app/cat/breads');?>"><i class="fas fa-bread-slice"></i> Breads</a></li>
            <li><a href="<?php echo base_url('app/cat/gift-boxes');?>"><i class="fas fa-gift"></i> Gift Boxes</a></li>
          </ul>
        </li>
        <li><a href="#"><i class="fas fa-shopping-basket"></i> My Orders</a></li>
        <li><a href="#"><i class="fas fa-phone-alt"></i> Contact Us</a></li>
        <li><a href="#"><i class="fas fa-share-alt"></i> Share</a></li>
        <?php if($loginstatus){?>
        <li><a href="<?php echo base_url('app/logout');?>"><i class="fas fa-lock"></i> Log Out</a></li>
        <?php } ?>
      </ul>
    </div>