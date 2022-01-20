<?php  $subcategory = $subcategorydata[0];
if(!empty($productlist)){ $this->load->helper('slug');
        foreach($productlist as $plist){ ?>
            <div class="col-6 col-sm-6 col-lg-3 p-0 mt-2">
            <div class="FilterContent p-1">
                <?php if($plist['discount'] != 0){?>
                    <div class="off-tag">
                    <p><?php echo $plist['discount'];?>% Off</p>
                    </div>
                    <?php } ?>
                <a href="<?php echo base_url("product/".md5($plist['id']).'/?subcat='.$subcategory['slug']);?>">
                <img src="<?php echo file_url($plist['path']); ?>" alt="<?php echo generate_slug($plist['product_name']);?>" title='<?php echo $plist['product_name'];?>'>
                <div class="ProductInfo">
                    <h3 class='font-responsive pb-1'><?php echo $plist['product_name'];?></h3>
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
    echo form_input(array('type'=>'hidden','id'=>'newpart_url','value'=>"$urlpart"));
    }?>