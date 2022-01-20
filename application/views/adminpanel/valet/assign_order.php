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
                    <form action="<?php echo base_url('adminpanel/valet/assign_valet_op') ;?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">                        	
                      
                        <div class="form-group row">
                            <div class="col-md-1"></div>
                            <label class="col-sm-12 col-md-2 col-form-label">Orders <span class="text-danger">*</span> </label>
                            <div class="col-sm-12 col-md-8">
                                <select name="order_id" id="order_id" class="form-control" required>
                                    <option value="">Select Order</option>
                                    <?php 
                                        if(is_array($orders)){
                                            foreach($orders as $data){
                                        ?>
                                        <option value="<?php echo $data['id'] ;?>"><?php echo $data['order_no'] ;?></option>
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
                                <input type="text" name="pincode" id="valet_zone_id" class="form-control" readonly>
                                   
                                    
                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-1"></div>
                            <label class="col-sm-12 col-md-2 col-form-label">Assign Valet <span class="text-danger">*</span> </label>
                            <div class="col-sm-12 col-md-8">
                                <select name="valet_id" id="staff_id" class="form-control">
                                    <option value="">Select Valet</option>
                                   
                                </select>
                            </div>
                        </div>
                      
                      
                        </div>
                        <div class="row">
                            <div class="col-md-5"></div>
                            
                            <div class="col-sm-2">
                                <input type="submit" name="add_valet" value="Go" class="btn btn-success btn-block btn-sm">
                         
                        </div>
                    </form>   
                    <br><br>                
                </div>
                <div id="mytable"></div>
            </div>
        </div>
    </div>
</section>
<script>
$(document).ready(function(){
    $('#order_id').change(function(){
        var order_id = $(this).val();
		alert(order_id);
		//console.log(staff_id);
        $.ajax({
               url:"<?php echo base_url('adminpanel/valet/get_valet_table')?>",
               method:"POST",
               data:{order_id:order_id},
			  // dataType:"JSON",
               success:function(data){
				   $('#mytable').html(data);
				   //console.log(data);
                    
               }
          });
    });
	 $('#order_id').change(function(){
        var id = $(this).val();
		console.log(id);
        $.ajax({
               url:"<?php echo base_url('adminpanel/valet/get_delivery_pincode')?>",
               method:"POST",
               data:{id:id},
               success:function(data){
				  $('#valet_zone_id').val(data).trigger('change');
				  // console.log(data);
                    
               }
          });
    });

   $('#valet_zone_id').change(function(){
        var pincode = Number($(this).val());
		$.ajax({
			url:"<?php echo base_url('adminpanel/valet/get_valets')?>",
			method:"POST",
			data:{pincode:pincode},
			success: function(data){
				$('#staff_id').html(data);
				}
			
			});
      
    });
});
</script>