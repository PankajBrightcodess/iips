    <section class="FilterBar">
      <div class="container-fluid">
        <div class="row">
          <div class="col-6"><a href="<?php if(!empty($_SERVER['HTTP_REFERER'])){echo $_SERVER['HTTP_REFERER']; }else{echo base_url('/app');}?>" class="back"><i class="fas fa-arrow-left"></i></a> </div>
        </div>
      </div>
    </section>
    <section class="LogInPg">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- <h3>Log In</h3><hr> -->
            <div class="row mt-2 mb-5">
              <?php if(!empty($subcategory_list)){ $this->load->helper('slug');
                foreach($subcategory_list as $slist){ ?>
              <div class="col-6 col-sm-6 col-lg-3 mt-2 p-0">
                <div class="FilterContent p-1" style='box-shadow:0px 10px 10px #ece8dc'>
                  <a href="<?php echo base_url("app/subcat/$slist[slug]");?>">
                    <img src="<?php echo file_url($slist['image_path']); ?>" alt="<?php echo generate_slug($slist['name']);?>" title="<?php echo $slist['name'];?>">
                    <div class="ProductInfo">
                      <h3 class='font-responsive'><?php echo $slist['name'];?></h3>
                    </div>
                  </a>
                </div>
              </div>
              <?php  }
              }?>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <?php $this->load->view("app/footer"); ?>     
    <?php $this->load->view('app/main-footer-links');?> 
    <script>

    </script> 
  </body>
</html>