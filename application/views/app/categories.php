
    <section class="FilterBar">
      <div class="container-fluid">
        <div class="row">
          <div class="col-6"><a href="<?php if(!empty($_SERVER['HTTP_REFERER'])){echo $_SERVER['HTTP_REFERER']; }else{echo base_url('/app');}?>" class="back"><i class="fas fa-arrow-left"></i></a> </div>
        </div>
      </div>
    </section>
    <section class="categoryPage">
      <div class='container-fluid'>
      <div class="row">
        <div class="col-12">
          <?php if(!empty($categorytree)){
            foreach($categorytree as $category){ if(!empty($category['subcat'])){?>
            <section class="Cakes pb-3">
              <div class="row">
                <div class="col-8 col-sm-8">
                  <h2 style='font-size:16px'><?php echo strtoupper($category['name']);?></h2>
                </div>
                <div class="col-4 col-sm-4 text-right">
                <!-- <a style='text-decoration:none;color:black;' href="<?php echo base_url("app/cat/$category[slug]");?>"><span style='font-size:0.8rem;'>View All <i class="fas fa-angle-right"></i></span></a> -->
                </div>          
              </div><hr class='mt-1 mb-2'>
              <div class="row">
                <div class="col-sm-12">
                  <div class="row mt-2 mb-5">
                    <?php if(!empty($category['subcat'])){ $subcategory_data = $category['subcat'];
                      foreach($subcategory_data as $slist){?>
                    <div class="col-6 col-sm-6 col-lg-3 mt-2 p-0">
                      <div class="FilterContent p-1" style='box-shadow:0px 10px 10px #ece8dc'>
                        <a href="<?php echo base_url("app/subcat/$slist[slug]");?>">
                          <img src="<?php echo file_url($slist['image_path']); ?>" alt="<?php echo $slist['name'];?>" title="<?php echo $slist['name'];?>">
                          <div class="ProductInfo">
                            <h3 class='font-responsive'><?php echo $slist['name'];?></h3>
                          </div>
                        </a>
                      </div>
                    </div>
                    <?php }
                    }?>
                    </div>                
                </div>
              </div>
              
            </section>
          <?php } }
          }?>
        </div>
      </div>
      </div>
    </section>
    <?php $this->load->view("app/footer"); ?>
    <?php $this->load->view('app/main-footer-links');?>
  </body>
</html>