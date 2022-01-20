<section class="content" style="background-color:#fff">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header with-border">
                    <div class="card-title"><?php echo $title ;?> </div>
                    <!-- <div class="pull-right">
                        <a href="<?php //echo base_url('stock/supplierlist/');?>" class="pull-right btn btn-sm btn-primary">
                        <i class="fa fa-list"></i> Supplier List</a> 
                    </div> -->
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('adminpanel/valet/add_valet_op') ;?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">                        	
                      
                        <div class="form-group row">
                            <div class="col-md-1"></div>
                            <label class="col-sm-12 col-md-2 col-form-label">Add Delivery Valet <span class="text-danger">*</span> </label>
                            <div class="col-sm-12 col-md-8">
                                <select name="staff_id" id="staff_id" class="form-control">
                                    <option value="">Select Valet</option>
                                    <?php 
                                        if(is_array($staff)){
                                            foreach($staff as $data){
                                        ?>
                                        <option value="<?php echo $data['id'] ;?>"><?php echo $data['name'] ;?></option>
                                        <?php 
                                            }
                                        }?>  
                                </select>
                            </div>
                        </div>
                           <div class="form-group row">
                            <div class="col-md-1"></div>
                            <label class="col-sm-12 col-md-2 col-form-label">Delivery Zone <span class="text-danger">*</span> </label>
                            <div class="col-sm-12 col-md-8">
                                <select name="zone_id" id="valet_zone_id" class="form-control">
                                    <option value="">Select Location</option>
                                    <?php 
                                        if(is_array($location)){
                                            foreach($location as $data){
                                        ?>
                                        <option value="<?php echo $data['id'] ;?>"><?php echo $data['name'] ;?></option>
                                        <?php 
                                            }
                                        }?>  
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-1"></div>
                            <label class="col-sm-12 col-md-2 col-form-label">Pincode <span class="text-danger">*</span> </label>
                            <div class="col-sm-12 col-md-8">
                                <input type="text" name="pincode"  id="pincode" placeholder="pincode" class="form-control" required>
                            </div>
                        </div>
                      
                      
                        </div>
                        <div class="row">
                            <div class="col-md-5"></div>
                            
                            <div class="col-sm-2">
                                <input type="submit" name="add_valet" value="Add valet" class="btn btn-success btn-block btn-sm">
                         
                        </div>
                    </form>                   
                </div>
                <div id="mytable"></div>
            </div>
        </div>
    </div>
</section>
<script>
$(document).ready(function(){
    $('#staff_id').change(function(){
        var staff_id = $(this).val();
		//console.log(staff_id);
        $.ajax({
               url:"<?php echo base_url('adminpanel/valet/get_table')?>",
               method:"POST",
               data:{staff_id:staff_id},
			  // dataType:"JSON",
               success:function(data){
				   $('#mytable').html(data);
				   //console.log(data);
                    
               }
          });
    });
	 $('#valet_zone_id').change(function(){
        var id = $(this).val();
		console.log(id);
        $.ajax({
               url:"<?php echo base_url('adminpanel/valet/get_pincode')?>",
               method:"POST",
               data:{id:id},
			  dataType:"JSON",
               success:function(data){
				  $('#pincode').val(data);
				  // console.log(data);
                    
               }
          });
    });

   // $('#quantity').keyup(function(){
//        var quantity = Number($(this).val());
//        var stock = Number($('#stockquantity').val());
//        if(quantity > stock){
//            alert("Out Quantity cannot be more than Stock Quantity!");
//            return false;
//        }
//    });
});
</script>