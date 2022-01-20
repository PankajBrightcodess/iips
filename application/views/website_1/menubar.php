    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="MainMenu">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item active"><a class="nav-link" href="<?php echo base_url('/');?>">Home <span class="sr-only">(current)</span></a></li>
            <!-- <li class="nav-item"><a class="nav-link" href="<?php //echo base_url('subcat/birthday-cake')?>">Birthday Cakes</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php //echo base_url('subcat/anniversary-cake');?>">Anniversary Cakes</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php //echo base_url('subcat/wedding-cake');?>">Wedding Cakes</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php //echo base_url('cat/cookies');?>">Cookies</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php //echo base_url('cat/breads');?>">Breads</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php //echo base_url('subcat/dry-fruit-cake');?>">Dry Fruit Cakes</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php //echo base_url('cat/gift-boxes');?>">Gift Boxes</a></li> -->
            <?php 
              $menu_categorylist = maincategory_menu(array('status'=>'1'));
              if(!empty($menu_categorylist)){
                foreach($menu_categorylist as $mainclist){ ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo base_url("cat/$mainclist[slug]");?>"><?php echo ucfirst($mainclist['name']); ?></a></li>
            <?php  }
              }
            ?>
          </ul>
        </div>
      </div>
    </nav>