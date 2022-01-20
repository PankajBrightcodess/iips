  <main>    
    <div class="mainOverlay">
      <div class="container-fluid">
      <section class="CakeArea">        
        <div class="row mt-3 mb-3">         
          <div class="col-12">
            <div class="Collection">
              <div class="row text-center">
                <?php //$cakesubcat = $categorytree['0']['subcat'];
                  if(!empty($subcategory_list)){$i=0;
                    foreach($subcategory_list as $subcat){$publish_status = $this->Master_model->check_published($subcat['id']);
                    if($publish_status == true){?>
                <div class="col-6 p-2">
                  <div class="PriceDesc">
                  <a href="<?php echo base_url('app/subcat/'.$subcat['slug']);?>">
                    <img src="<?php echo file_url($subcat['image_path']);?>" alt="<?php echo $subcat['name'];?>" class='img-fluid' title="<?php echo $subcat['name'];?>" style='padding:10px'>
                  </a>
                  <div class="itemDesc">
                    <h3 class='font-responsive-2 pt-1 pb-1'><?php echo $subcat['name'];?></h3>                  
                  </div>
                  </div>
                </div> 
                <?php } }
                  }
                ?>
                              
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>        
      </section>
    <?php if(!empty($categorytree)){
      foreach($categorytree as $category){ if(!empty($category['catproducts'])){?>
      <section class="Cakes pb-3">
        <div class="">
          <div class="row">
            <div class="col-8 col-sm-8">
              <h2 style='font-size:20px'><?php echo strtoupper($category['name']);?></h2>
            </div>
            <div class="col-4 col-sm-4 text-right">
              <!-- <a style='text-decoration:none;color:black;' href="<?php //echo base_url("cat/$category[slug]");?>"><span style='font-size:0.8rem;'>View All <i class="fas fa-angle-right"></i></span></a> -->
            </div>          
          </div><hr class='mt-1 mb-3'>
          <div class="row">
            <div class="col-sm-12">
              <div class="owl-carousel owl-theme cat_category">
                <?php if(!empty($category['catproducts'])){ $show_cateproductdata = $category['catproducts'];
                  foreach($show_cateproductdata as $scdata){?>
                <div class="item"><div class="PriceDesc">
                     <?php if($scdata['discount'] != 0){?>
                      <div class="off-tag">
                        <p><?php echo $scdata['discount'];?>% Off</p>
                      </div>
                      <?php } ?>
                    <a href="<?php echo base_url("app_product/").md5($scdata['id']).'?subcat='.$scdata['subcatslug'][0];?>"><img src="<?php echo file_url("$scdata[path]");?>" alt="<?php echo $scdata['product_name'];?>" title="<?php echo $scdata['product_name']; ?>"></a>
                    <div class="itemDesc">
                      <h3 class='font-responsive-2 pt-2'><?php echo $scdata['product_name'];?></h3>
                     <?php if($scdata['discount'] != 0){?>
                      <p class="price mb-0 pl-3">
                        ₹<?php echo $this->amount->toDecimal($scdata['variant_offerprice']);?> <del>₹<?php echo $this->amount->toDecimal($scdata['variant_price']);?></del>
                      </p>
                      <?php }else{?>
                      <p class="price mb-0 pl-2">
                        ₹<?php echo $this->amount->toDecimal($scdata['variant_offerprice']);?>
                      </p>
                      <?php } ?>
                      <p class='m-1 mb-0 pl-2 font-responsive' style='color:grey;letter-spacing:normal'>
                        Can be delivered by
                        <?php 
                          $preptime = $scdata['prep_time'];                          
                          if(empty($scdata['cut_time'])){
                            echo "<span class='text-success'>Today</span>";
                          }else{
                            $cuttime = date('Y-m-d H:i:s',strtotime($scdata['cut_time']));
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
                  </div>             
                </div>
                <?php }
                }?>
                </div>                
            </div>
          </div>
        </div>
      </section>
      <?php if(!empty($category['subcat'])){ 
          $subcategory_data = $category['subcat'];
          foreach($subcategory_data as $subcat_data){ $show_status = $this->Master_model->check_published_subcatproduct($subcat_data['id']);
            if($show_status == true && !empty($subcat_data['products'])){?>
        <section class="Cakes pb-3">
          <div class="">
            <div class="row">
              <div class="col-8 col-sm-8">
                <h2 style='font-size:20px'><?php echo ucfirst($subcat_data['name']);?></h2>
              </div>
              <div class="col-4 col-sm-4 text-right">
              <!-- <a style='text-decoration:none;color:black;' href="<?php //echo base_url("subcat/$subcat_data[slug]");?>"><span style='font-size:0.8rem;'>View All <i class="fas fa-angle-right"></i></span></a> -->
              </div>          
            </div><hr>
            <div class="row">
              <div class="col-sm-12">
                <div class="owl-carousel owl-theme sub_category">
                  <?php if(!empty($subcat_data['products'])){ $subcat_productdata = $subcat_data['products'];
                    foreach($subcat_productdata as $scdata){?>
                  <div class="item"><div class="PriceDesc">
                      <?php if($scdata['discount'] != 0){?>
                      <div class="off-tag">
                        <p><?php echo $scdata['discount'];?>% Off</p>
                      </div>
                      <?php } ?>
                      <a href="<?php echo base_url("app_product/").md5($scdata['id']).'?subcat='.$scdata['subcatslug'][0];?>"><img src="<?php echo file_url("$scdata[path]");?>" alt="<?php echo $scdata['product_name']?>" title="<?php echo $scdata['product_name'];?>"></a>
                      <div class="itemDesc">
                        <h3 class='font-responsive-2'><?php echo $scdata['product_name'];?></h3>
                        <?php if($scdata['discount'] != 0){?>
                        <p class="price mb-0 pl-2">
                          ₹<?php echo $this->amount->toDecimal($scdata['variant_offerprice']);?> <del>₹<?php echo $this->amount->toDecimal($scdata['variant_price']);?></del>
                        </p>
                        <?php }else{?>
                        <p class="price mb-0 pl-2">
                          ₹<?php echo $this->amount->toDecimal($scdata['variant_offerprice']);?>
                        </p>
                        <?php } ?>
                        <p class='m-1 mb-0 pl-2 font-responsive' style='color:grey;letter-spacing:normal'>
                          Can be delivered by
                        <?php 
                          $preptime = $scdata['prep_time'];                          
                          if(empty($scdata['cut_time'])){
                            echo "<span class='text-success'>Today</span>";
                          }else{
                            $cuttime = date('Y-m-d H:i:s',strtotime($scdata['cut_time']));
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
                    </div>             
                  </div>
                  <?php }
                  }?>
                  </div>                
              </div>
            </div>
          </div>
        </section>      

        <?php }
          }
        ?>
        
      <?php }?>

    <?php } } } ?>
      </div> 
    </div>
  </main>
  <?php $this->load->view("app/footer"); ?>
  <?php $this->load->view('app/main-footer-links');?>
  </body>
</html>