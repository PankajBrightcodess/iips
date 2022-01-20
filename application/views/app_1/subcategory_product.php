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
            <div class="row">          
          <div class="col-lg-1"></div>
          <div class="col-sm-10 col-lg-10 FilterRight">
            
            <div class="row mt-2 mb-5" id='sortdatashow'>
              <?php if(!empty($productlist)){ 
            foreach($productlist as $plist){ ?>
              <div class="col-6 col-sm-6 col-lg-3 p-0 mt-2">
                <div class="FilterContent p-1">
                    <?php if($plist['discount'] != 0){?>
                        <div class="off-tag">
                        <p><?php echo $plist['discount'];?>% Off</p>
                        </div>
                        <?php } ?>
                    <a href="<?php echo base_url("app_product/".md5($plist['id']).'/?subcat='.$subcategory['slug']);?>">
                    <img src="<?php echo file_url($plist['path']); ?>" alt="<?php echo $plist['product_name'];?>" title='<?php echo $plist['product_name'];?>'>
                    <div class="ProductInfo">
                        <h3 class='font-responsive-2 pt-1 pb-1'><?php echo $plist['product_name'];?></h3>
                        <?php if($plist['discount'] != 0){?>
                        <p class="price font-responsive mb-0 pl-2 pb-0">
                        ₹<?php echo $this->amount->toDecimal($plist['variant_offerprice']);?> <del>₹<?php echo $this->amount->toDecimal($plist['variant_price']);?></del>
                        </p>
                        <?php }else{?>
                        <p class="price font-responsive mb-0 pl-2 pb-0">
                        ₹<?php echo $this->amount->toDecimal($plist['variant_offerprice']);?>
                        </p>
                        <?php } ?>
                        <p class='m-1 mb-0 pl-2 pb-1 font-responsive' style='color:grey;letter-spacing:normal'>
                        Can be delivered by
                        <?php 
                          $preptime = $plist['prep_time'];                          
                          if(empty($plist['cut_time'])){
                            echo "<span class='text-success'>Today</span>";
                          }else{
                            $cuttime = date('Y-m-d H:i:s',strtotime($plist['cut_time']));
                            $prep_finaltime = date('Y-m-d H:i:s',strtotime("+$preptime minutes"));
                            if(strtotime($prep_finaltime) <= strtotime($cuttime)){
                              // today
                              echo "<span class='text-success'>Today</span>";
                            }else{
                              // tomorrow
                              echo "<span class='text-danger'>Tomorrow</span>";
                            }
                          }
                        ?>
                        </p>
                    </div>
                    </a>
                </div>
              </div>
          <?php  }
              }?>
            </div>
          </div><!-- /-FilterRight-->
          <div class="col-lg-1"></div>
          <div class="clearfix"></div>
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