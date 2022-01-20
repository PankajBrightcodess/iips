<?php $mainmenulist = maincategory_menu(array('status'=>'1')); //echo PRE;print_r($mainmenulist);die;?>
<section class="CategoryBox">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <button type="button" name="CategoryListIcon" class="btn btn-danger" data-toggle="collapse" data-target="#CategoriesPanel" aria-expanded="false" aria-controls="CategoriesPanel"><img src="<?php echo file_url('assets/website/images/category.svg'); ?>" alt="Category List"> <span>E-Learning</span></button>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="Categories collapse" id="CategoriesPanel">
          
          <ul>
            <li><a href="<?php echo base_url('/');?>">Home</a></li>
            <?php if(!empty($mainmenulist)){
              foreach($mainmenulist as $menulist){
                if(!empty($menulist['subcat'])){                       
              ?>
            <li><a href="<?php echo base_url("/cat/$menulist[slug]");?>"><?php echo $menulist['name'];?> <span><img src="<?php echo file_url('assets/website/images/right-arrow.svg'); ?>" alt="Angle Right"></span></a>
              <ul class="CategoryLevel1">
                <?php $subcatlist = $menulist['subcat'];
                  foreach($subcatlist as $sublist){
                    if(!empty($sublist['lowcat'])){ ?>
                  <li><a href="<?php echo base_url("/subcat/$sublist[slug]");?>"><?php echo $sublist['name'];?> <span><img src="<?php echo file_url('assets/website/images/right-arrow.svg'); ?>" alt="Angle Right"></span></a>
                   <ul class="CategoryLevel2">
                     <?php $lowcatlist = $sublist['lowcat'];
                      foreach($lowcatlist as $lowlist){ ?>
                      <li><a href="<?php echo base_url("/lowcat/$lowlist[slug]");?>"><?php echo $lowlist['name'];?></a></li>
                    <?php } ?>
                   </ul></li>
                    <?php }else{ ?>
                  <li><a href="<?php echo base_url("/subcat/$sublist[slug]");?>"><?php echo $sublist['name'];?></a></li>
                  <?php } } ?>
              </ul>
            </li>
            <?php    }else{  ?>
            <li><a href="<?php echo base_url("/cat/$menulist[slug]");?>"><?php echo $menulist['name'];?></a></li>
            <?php    }
              }
            }?>            
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
