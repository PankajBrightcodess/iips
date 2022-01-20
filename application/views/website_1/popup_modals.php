    <!-- modal to show addons -->
    <div id='myModal' class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="AreaLocationLabel">Add on something to make it extra special!</h6>
            <!-- <button type="button" id='myModalClose' class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button> -->
          </div>
          <div class='modal-body'>
            <div class='conatiner-fluid'>
                <div class="row">
                    <div class="col-md-12 addonsborder">
                    <form action="<?php echo base_url('website/save_addons');?>" method='POST'>
                        <div class="row">                          
                        <?php if(!empty($addonslist)){ $i=0;
                            foreach($addonslist as $addons){$i++;    
                        ?>
                            <div class="col-5 col-sm-4 col-lg-3 col-xl-2 m-1 addons">
                                <img src="<?php echo file_url($addons['path']);?>" alt="<?php echo $addons['product_name'];?>">
                                <u><?php echo $addons['product_name'];?></u>
                                <p class='text-danger mb-1'>₹ <?php echo $addons['price'];?></p>                                
                                <hr class='mt-1'>
                                <div class='row'>
                                    <div class="col-4 col-md-4">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type='hidden' name='base_price[]' class='base_price' value='<?php echo $addons['price'];?>'/> 
                                            <input type="checkbox" name='checkup[]' class="custom-control-input addoncheckbox" value='<?php echo $addons['id'];?>' data-price='<?php echo $addons['price'];?>' id="customCheck<?php echo $i;?>">
                                            <label class="custom-control-label" for="customCheck<?php echo $i;?>"></label>
                                        </div>
                                    </div>
                                    <div class="col-8 col-md-8">
                                        <div class="quantity" style='display:none;'>
                                            <button class="plus-btn" type="button" name="button">
                                                <i class='fas fa-plus' style='font-size:10px'></i>
                                            </button>
                                            <input type="text" name="quantity[]" class='addonquant' value="1" readonly>
                                            <button class="minus-btn" type="button" name="button">
                                                <i class='fas fa-minus' style='font-size:10px'></i>
                                            </button>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        <?php } }else{?>
                            <center>Sorry No Product Available</center>
                        <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-12 priceaddons">
                        <div class="row">
                            
                            <div class="col-12 col-sm-12 col-lg-8">
                                <span>₹&nbsp;<span id='variant_price'>
                                  <?php if(isset($productdata['variant_offerprice'])){$vprice = $productdata['variant_offerprice'];}else{$vprice=0;} echo $vprice;?>
                                </span>(Cake Price) + ₹&nbsp;<span id='addonprice'>0</span>(Addons Price) + ₹&nbsp;<span id='shippingcharge'>
                                  <?php $charge = $this->session->userdata('ship_charge'); if(!empty($charge)){echo $charge;}else{echo 0;}?>
                                </span>(Shipping Charges) = ₹&nbsp;<span id='totalprice'><?php echo $tprice = $vprice+(int)$charge;?></span>(Total Price)</span>
                                <span class='d-lg-none'><hr class='mb-0'/></span>  
                            </div>
                            <div class="col-12 col-sm-12 col-lg-4">
                                <!-- <button class='btn btn-success btn-sm'>Add</button> -->
                                <?php $redirect_onclose = $this->session->userdata('redirect_onclose');?>                               
                                <?php if(!empty($redirect_onclose)){?>
                                  <a href='<?php echo base_url("$redirect_onclose");?>'>
                                    <button type='button' class='btn btn-warning btn-sm ' id='myModalClose' data-dismiss="modal" aria-label="Close">Without Addons <i class='fa fa-arrow-circle-right'></i></button>
                                  </a>
                                <?php }else{?>
                                    <button type='button' class='btn btn-warning btn-sm ' id='myModalClose' data-dismiss="modal" aria-label="Close">Without Addons <i class='fa fa-arrow-circle-right'></i></button>
                                <?php } ?>  
                                  <input type="hidden" value='cart' name='comingfrom' id='comeof'>                                  
                                  <button type='submit' class='btn btn-success btn-sm' id='myaddonsubmit' data-dismiss="modal" aria-label="Close">With Addons</button>
                                <!-- </a> -->
                            </div>
                        </div>
                    </div>                    
                </div>
                </form>
            </div>
                
          </div>
        </div>
      </div>
    </div>
    <!-- End of modal to show addons -->

    <!-- modal to show calendar -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background: #ff8da7;">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Select Delivery Date</h5>
            <button type="button" class="close" id='close_date_model' data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body calender-pic" style="text-align: center!important;">
        <div id="v-cal">
          <div class="vcal-header">
            <button class="vcal-btn" data-calendar-toggle="previous">
              <svg height="24" version="1.1" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path>
              </svg>
            </button>

            <div class="vcal-header__label" data-calendar-label="month">
              March 2017
            </div>


            <button class="vcal-btn" data-calendar-toggle="next">
              <svg height="24" version="1.1" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
              </svg>
            </button>
          </div>
          <div class="vcal-week">
            <span>Mon</span>
            <span>Tue</span>
            <span>Wed</span>
            <span>Thu</span>
            <span>Fri</span>
            <span>Sat</span>
            <span>Sun</span>
          </div>
          <div class="vcal-body" data-calendar-area="month"></div>
        </div>

        <p class="demo-picked">
          <!-- Date picked:
          <span data-calendar-label="picked"></span> -->
        </p>
          </div>
          <div class="modal-footer">          
            <button type="button" class="btn btn-secondary btn-deliverydate" data-toggle="modal" data-dismiss="modal" data-backdrop="static" data-keyboard="false" data-target="#secondModal">Next</button>
          </div>
        </div>
      </div>
    </div>
    <!-- end of modal to show calendar -->

    <!-- modal second of calendar -->
    <div class="modal fade" id="secondModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background: #ff8da7;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Select Delivery Slot</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body" id="myRadios">
                <img src='<?php echo file_url('assets/images/loader-2.gif');?>' alt='loader gif' width='100%'/>
                <!-- <form>
                <div class="abc">
                    <label><input type="radio" name="myRadios" value="Morning Delivery Rs. 200"/> Morning Delivery Rs. 200</label><br>
                </div>
                <div class="abc">
                    <input type="radio" name="myRadios" value="Free Delivery Rs. 0" /> Free Delivery Rs. 0<br>
                </div>
                <div class="abc">
                    <input type="radio" name="myRadios" value="Fixed Time Delivery Rs. 200" /> Fixed Time Delivery Rs. 200<br>
                </div>
                    <div class="abc">
                    <input type="radio" name="myRadios" value="Mid Night Delivery Rs. 250" /> Mid Night Delivery Rs. 250<br>
                </div> -->
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary btn-deliverytype" data-toggle="modal" data-dismiss="modal" data-backdrop="static" data-keyboard="false" data-target="#thirdModal">Next</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    <!-- end of modal second of calendar -->

    <!-- modal third of calendar-->
    <div class="modal fade" id="thirdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background: #ff8da7;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Select Delivery Time</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body" style="text-align: center;" id='myRadios1'>
              <img src='<?php echo file_url('assets/images/loader-2.gif');?>' alt='loader gif' width='100%'/>
                <!-- <form>
                <div class="abc">
                    <input type="radio" name="myRadios1" value="06:00 -  09:00 hrs" /> 06:00 -  09:00 hrs<br>
                </div>
                <div class="abc">
                    <input type="radio" name="myRadios1" value="09:00 -  12:00 hrs" /> 09:00 -  12:00 hrs<br>
                </div>
                <div class="abc">
                    <input type="radio" name="myRadios1" value="03:00 - 06:00 hrs" /> 03:00 - 06:00 hrs<br>
                </div>
                    <input type="radio" name="myRadios" value="Mid Night Delivery Rs. 250" /> Mid Night Delivery Rs. 250<br>
                </form> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-deliverytime" class="close" data-dismiss="modal" onclick="set_datetime();">Submit</button>
            </div>
            </div>
        </div>
    </div>
    <!-- end od modal third of calendar-->