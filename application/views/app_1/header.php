<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bless Fresh</title>
    <?php include"main-head-links.php"; ?>
  </head>
  <body>    
    <header>
      <div class="container-fluid">
        <div class="row">
          <div class="col-2 ">
            <div class="menuIcon">
              <button type="button" class="btn btn-block" onclick="$('#MainMenu').show();$('body').css('overflow','hidden');"><i class="fas fa-bars" aria-hidden="true"></i></button>
            </div>
          </div>
          <div class="col-6 pl-0"><div class="brand"><a href="<?php echo base_url('/app');?>"><img src="<?php echo file_url('assets/app/images/logo.png'); ?>" alt="Company Logo"></a></div></div>
          <div class="col-2 pr-1">
            <div class="mic">
              <button type="button" class="btn btn-block"><img src="<?php echo file_url('assets/app/images/mic-black.svg'); ?>" alt="Microphone Icon"></button>
            </div>
          </div>
          <div class="col-2 pl-1">            
            <div class="cart"><?php $cartcount = $this->Master_model->count_itemincart();?>
              <a href='<?php echo base_url('app/cart');?>'>
              <button type="button" class="btn btn-block">
                <img src="<?php echo file_url('assets/app/images/cart-black.svg');?>" alt="Cart Icon">
                <div class="kartItems"><?php echo $cartcount;?></div>
              </button>
              </a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="searchBox">
              <form action="#" method="post">
                <!-- <button type="submit" class="SearchIcn btn"><i class="fas fa-search"></i></button> -->
                <div class="input-group">
                  <input type="text" name="search" placeholder="Search" required class="form-control">
                  <div class="input-group-append"><div class="input-group-text"><i class="fas fa-search"></i></div></div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div id='myloader' style='text-align:center;height: 100vh;width: 100vw;z-index:1001;position: absolute;background-color: #fff0c4;padding: 25%;padding-top: 37%;'>
      <img src='<?php echo file_url('assets/app/images/loader_4.gif');?>' class='img-fluid' alt='loader'/>
    </div>