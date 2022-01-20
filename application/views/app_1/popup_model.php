<div class="modal fade animated" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style='height:inherit;bottom:0;top:inherit'>
  <div class="modal-dialog m-0" role="document">
    <div class="modal-content animate-bottom">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Select Delivery Date</h5>      

        <button type="button" class="close" id='close_date_model' data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <!-- <h4 class="modal-title" id="myModalLabel"> ABOUT </h4> -->
      </div>
      <div class="modal-body calender-pic">
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
      </div> 
        <div class="modal-footer">          
            <button type="button" class="btn btn-secondary btn-deliverydate d-none" data-toggle="modal" data-dismiss="modal" data-backdrop="static" data-keyboard="false" data-target="#secondModal">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </button>
        </div>     
    </div>
  </div>
</div>

<div class="modal fade" id="secondModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style='height:inherit;bottom:0;top:inherit'>
    <div class="modal-dialog m-0" role="document">
        <div class="modal-content animate-bottom2">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Select Delivery Slot</h5>                
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
            <button type="submit" class="btn btn-secondary btn-deliverytype d-none" data-toggle="modal" data-dismiss="modal" data-backdrop="static" data-keyboard="false" data-target="#thirdModal">Next</button>
        </div>
        </div>
    </div>
</div>

<!-- modal third of calendar-->
<div class="modal fade" id="thirdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style='height:inherit;bottom:0;top:inherit'>
    <div class="modal-dialog m-0">
        <div class="modal-content animate-bottom3">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Select Delivery Time</h5>            
        </div>
        <div class="modal-body" style="text-align: center;" id='myRadios1'>
          <img src='<?php echo file_url('assets/images/loader-2.gif');?>' alt='loader gif' width='100%'/>            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-deliverytime d-none" class="close" data-dismiss="modal" onclick="set_datetime();">Submit</button>
        </div>
        </div>
    </div>
</div>
<!-- end od modal third of calendar-->

<!-- modal of flavor-->
<div class="modal fade" id="flavorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style='height:inherit;bottom:0;top:inherit'>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style='background-color:#fff6db'>
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Select Flavor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>            
        </div>
        <div class="modal-body" style="overflow-y:auto">
            <?php if(!empty($flavoroption) && count($flavoroption) >1){
              $new_flavoroption = $flavoroption;
              unset($new_flavoroption['']);
              foreach($new_flavoroption as $key=>$nfo){?>
             <div class="some_class">
                    <label><input type="radio" name='falvor' class='falvor_pop_value' value="<?php echo $key;?>"/> <?php echo $nfo;?> </label><br>
              </div>
            <?php } }else{
              echo "No Flavor Option Available !!";
            } ?>        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success btn-sm d-none" id='falvor_pop_close' class="close" data-dismiss="modal">Save</button>
        </div>
        </div>
    </div>
</div>
<!-- end of flavor modal-->

<?php if(!empty($shapeoption)){?>
<!-- modal of shape-->
<div class="modal fade" id="shapeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style='height:inherit;bottom:0;top:inherit'>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style='background-color:#fff6db'>
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Select Shape</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>            
        </div>
        <div class="modal-body" style="overflow-y:auto">
            <?php if(!empty($shapeoption) && count($shapeoption) >1){
              $new_shapeoption = $shapeoption;
              unset($new_shapeoption['']);
              foreach($new_shapeoption as $key=>$nso){?>
             <div class="some_class">
                    <label><input type="radio" name='shape' class='shape_pop_value' value="<?php echo $key;?>"/> <?php echo $nso;?> </label><br>
              </div>
            <?php } }else{
              echo "No Shape Option Available !!";
            } ?>        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success btn-sm d-none" id='shape_pop_close' class="close" data-dismiss="modal">Save</button>
        </div>
        </div>
    </div>
</div>
<!-- end of shape modal-->
<?php } ?>

<?php if(!empty($creamoption)){?>
<!-- modal of shape-->
<div class="modal fade" id="creamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style='height:inherit;bottom:0;top:inherit'>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style='background-color:#fff6db'>
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Select Cream</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>            
        </div>
        <div class="modal-body" style="overflow-y:auto">
            <?php if(!empty($creamoption) && count($creamoption) >1){
              $new_creamoption = $creamoption;
              unset($new_creamoption['']);
              foreach($new_creamoption as $key=>$nco){?>
             <div class="some_class">
                    <label><input type="radio" name='cream' class='cream_pop_value' value="<?php echo $key;?>"/> <?php echo $nco;?> </label><br>
              </div>
            <?php } }else{
              echo "No Cream Option Available !!";
            } ?>        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success btn-sm d-none" id='cream_pop_close' class="close" data-dismiss="modal">Save</button>
        </div>
        </div>
    </div>
</div>
<!-- end of shape modal-->
<?php } ?>