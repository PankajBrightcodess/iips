<?php if(!empty($productlist)){ $locate_session = $this->session->location_session; $someflag = false;
foreach($productlist as $plist){ //print_r($plist);
if(!empty($plist['location_id'])){
$avail_location = json_decode($plist['location_id']);
if(in_array($locate_session['id'],$avail_location)){ $someflag = true;}else{$someflag = false;}
?>               
<div class="col-6 col-md-3 pl-2 pr-2">
<?php if($someflag == true){?>  
<div class="ProductWrap animated bounceInDown">
    <a href="<?php $encodeprodid = md5($plist['id']); echo base_url("/product/$encodeprodid");?>"><img src="<?php echo file_url("$plist[path]"); ?>" alt="<?php echo $plist['product_name'];?>" title='<?php echo $plist['product_name'];?>' height="150px"></a>
    <a href="<?php $encodeprodid = md5($plist['id']); echo base_url("/product/$encodeprodid");?>"><div class="ProductDesc"><?php echo $plist['product_name'];?></div></a>
    <div class="ProductWeight">Quantity : <?php echo $plist['variantname'];?></div>    
    <div class="ProductPrice" style='font-size:0.8rem'>MRP : <s>₹<?php echo $this->amount->toDecimal($plist['variant_price'],true);?></s> ₹<?php echo $this->amount->toDecimal($plist['variant_offerprice'],true);?></div>
    <div class="Availability"><span><img src="<?php echo file_url('assets/website/images/instock.svg'); ?>" alt="instock"> In Stock</span><span>&times; Out of Stock</span></div>
    <div class="AddCart">
    <form action="<?php echo '#';//base_url('website/save_tocart');?>" method="post">
        <div class="input-group">
        <div class="input-group-prepend">
            <button type="button" class="input-group-text">Qty.</button>
        </div>
        <input type="number" name="quantity" placeholder="1" min='1' value='1' max='20' class="QtIn">
        <input type="hidden" name="prodid" class='prodid' value='<?php echo $plist['id'];?>'>
        <input type="hidden" name="variantid" class='variantid' value='<?php echo $plist['variant_id'];?>'>
        <div class="input-group-append">
            <button type="button" class="btn btn-light input-group-text AddCartBtn"><span><img src="<?php echo file_url('assets/website/images/add-cart.svg'); ?>" alt="Add Cart"></span> Add</button>
        </div>
        </div>
    </form>
    </div> 
</div>
<?php }else{?>
<div class="ProductWrap seg-disabled animated wobble">
    <a href="#"><img src="<?php echo file_url("$plist[path]"); ?>" alt="<?php echo $plist['product_name'];?>" title='<?php echo $plist['product_name'];?>' height="150px"></a>
    <a href="#"><div class="ProductDesc"><?php echo $plist['product_name'];?></div></a>
    <div class="ProductWeight">Quantity : <?php echo $plist['variantname'];?></div>
    <div class="ProductPrice" style='font-size:0.8rem'>MRP : <s>₹<?php echo $this->amount->toDecimal($plist['variant_price'],true);?></s> ₹<?php echo $this->amount->toDecimal($plist['variant_offerprice'],true);?></div>
    <div class="Availability"><span><img src="<?php echo file_url('assets/website/images/instock.svg'); ?>" alt="instock"> &times; Out of Stock</span></div>
    <div class="AddCart">
    <p class='mb-1'>Currently Not Available In Your Location !!</p>
    </div>
</div>
<?php } ?>
</div>
<?php  } }

echo form_input(array('type'=>'hidden','id'=>'newpart_url','value'=>"$urlpart"));
echo form_input(array('type'=>'hidden','id'=>'counted','value'=>"$counted"));
}?> 