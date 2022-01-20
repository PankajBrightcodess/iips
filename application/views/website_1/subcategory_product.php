<section class="pages" id="filter">
      <div class="container-fluid">
      <style>
        .tag_btn{
          border:1px solid grey;
          padding:5px;
          border-radius: 10px;
          text-transform: uppercase;
          font-size: 12px;
          box-shadow: 2px 2px 5px #808080a6;
          background-color: white;
          cursor: pointer;
          margin:5px;
        }
        .tag_btn:hover{
          transition-duration: 0.8s;
          box-shadow: 0px 0px 0px #808080a6;
        }
      </style>
        <div class="row">          
          <div class="col-lg-1"></div>
          <div class="col-sm-10 col-lg-10 FilterRight">
            <?php if(!empty($breadcrumb)){?>
            <div class="row">
              <div class="col-12 col-md-10">
                <div class="MyBreadcrumbs">
                  <ul>
                  <?php foreach($breadcrumb as $key=>$crumb){
                    if($key != '0'){?>
                      <li><a href="<?php echo base_url($key);?>"><?php echo $crumb;?></a></li>
                    <?php 
                    }else{ ?>
                      <li><?php echo $crumb;?></li>
                    <?php } } ?>
                    
                  </ul>
                </div>
              </div>
              <div class="col-6 col-md-2 text-center d-none d-sm-block">
                <img src="<?php echo file_url('assets/website/images/veg.png'); ?>" alt="100% Veg" class='img-fluid' width="45%">
                <img src="<?php echo file_url('assets/website/images/quality.png'); ?>" alt="Best quality" class='img-fluid' width="35%">
              </div>
              <div class="col-6 text-center d-block d-sm-none">
                <img src="<?php echo file_url('assets/website/images/veg.png'); ?>" alt="100% Veg" class='img-fluid' width="100%" height="50%" style='margin-right:30px;'>
              </div>
              <div class="col-6 text-center d-block d-sm-none">
                <img src="<?php echo file_url('assets/website/images/quality.png'); ?>" alt="Best quality" class='img-fluid' width="100%" height="50%">
              </div>              
            </div>
            <?php } ?>
            <div class='row mt-3 mb-3'>
              <div class="col-md-12">                
                <div class="row">
                  <div class="d-none d-lg-block col-lg-2 text-right mt-2" style='line-height:40px'>SORT BY: </div>
                  <?php 
                  if(isset($_GET['size'])){ $value_size = $_GET['size']; }else{ $value_size = 0;}
                  if(isset($_GET['flavor'])){ $value_flavor = $_GET['flavor']; }else{ $value_flavor = 0;}
                  if(!empty($_GET['low_high']) && ($_GET['low_high'] == 'checked')){
                     $low_high = $_GET['low_high']; 
                  }else{
                     $low_high = 'not_checked';
                  }
                  //echo $low_high;
                  if(!empty($_GET['high_low']) && ($_GET['high_low'] == 'checked')){
                    $high_low = $_GET['high_low'];
                  }else{
                    $high_low = 'not_checked';
                  }
                  //echo $high_low;
                  ?>
                  <div class="col-6 col-sm-3 col-md-3 col-lg-2 mt-2">
                    <?php echo form_dropdown(array('id'=>'sort_size','class'=>'btn form-control tag_btn ajax_sort','data-sorttype'=>'size','title'=>'Sort By Size','style'=>"color:black;font-weight:600;"),$allsize_option,$value_size);?>
                  </div>
                  <div class="col-6 col-sm-3 col-md-3 col-lg-2 mt-2">
                    <?php echo form_dropdown(array('id'=>'sort_flavor','class'=>'btn  form-control tag_btn ajax_sort','data-sorttype'=>'flavor','title'=>'Sort By Flavor','style'=>"color:black;font-weight:600;"),$allflavor_option,$value_flavor);?>
                  </div>
                  <div class="col-6 col-sm-3 col-md-3 col-lg-2 mt-2">
                    <button type='button' id='sort_price_low_to_high' value='<?php echo $low_high; ?>' class="btn form-control tag_btn ajax_sort_btn <?php if($low_high == 'checked'){echo 'bg-warning';} ?>" style='color:black;font-weight:600'> <i class="fa fa-arrow-down" aria-hidden="true"></i> Low To High</button>
                  </div>
                  <div class="col-6 col-sm-3 col-md-3 col-lg-2 mt-2">
                    <input type='hidden' id='subcatid' value='<?php echo $subcat_id;?>'/>
                    <button type='button' id='sort_price_high_to_low' value='<?php echo $high_low; ?>' class="btn  form-control tag_btn ajax_sort_btn <?php if($high_low == 'checked'){echo 'bg-warning';} ?>" style='color:black;font-weight:600'> <i class="fa fa-arrow-up" aria-hidden="true"></i> High To Low</button>                  
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-3" id='sortdatashow'>
              <?php if(!empty($productlist)){ 
            foreach($productlist as $plist){ ?>
              <div class="col-6 col-sm-6 col-lg-3 p-0 mt-2">
                <div class="FilterContent p-1">
                    <?php if($plist['discount'] != 0){?>
                        <div class="off-tag">
                        <p><?php echo $plist['discount'];?>% Off</p>
                        </div>
                        <?php } ?>
                    <a href="<?php echo base_url("product/".md5($plist['id']).'/?subcat='.$subcategory['slug']);?>">
                    <img src="<?php echo file_url($plist['path']); ?>" alt="<?php echo $plist['product_name'];?>" title='<?php echo $plist['product_name'];?>'>
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
    </section>


    <div id="PgFooter"><?php $this->load->view('website/footer');?></div>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
      

      $(document).ready(function(){

          function product_sort_ajax(){
            var sortsizeid = $('#sort_size').val();
            var sortflavorid = $('#sort_flavor').val();
            var subcatid = $('#subcatid').val();
            var sort_price_low_to_high = $('#sort_price_low_to_high').prop('value');
            var sort_price_high_to_low = $('#sort_price_high_to_low').prop('value');
            $.ajax({
              type:"GET",
              url:"<?php echo base_url("website/product_sort"); ?>",
              data:{size:sortsizeid,flavor:sortflavorid,low_high:sort_price_low_to_high,high_low:sort_price_high_to_low,subcatid:subcatid},
              success: function(data){
                  $('#sortdatashow').html(data);                  
                  // var parsedata = JSON.parse(data);
                  var prevurl = window.location.pathname;
                  var newpart = $('#newpart_url').val();
                  window.history.replaceState({},null,prevurl+newpart);
                                                    
              }
            });
          }


          $('body').on('change','.ajax_sort',function(){       
                product_sort_ajax();
          });

          $('body').on('click','.ajax_sort_btn',function(){
              $(this).prop('value','checked');
              var thisid = $(this).attr('id');
              $(this).addClass('bg-warning');
              if(thisid == 'sort_price_low_to_high'){
                $('#sort_price_high_to_low').prop('value','not_checked');
                $('#sort_price_high_to_low').removeClass('bg-warning');
              }else{
                $('#sort_price_low_to_high').prop('value','not_checked');
                $('#sort_price_low_to_high').removeClass('bg-warning');
              }
              product_sort_ajax();
          });

      });
    
      
    </script>
  </body>
</html>