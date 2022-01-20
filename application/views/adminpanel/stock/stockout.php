<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header with-border bg-primary">
                    <div class="card-title"><?php ?> </div>
                     <div class="pull-right">
                        <a href="<?php echo base_url('admin/stock/stockout_list/');?>" class="pull-right btn btn-sm btn-warning">
                        <i class="fa fa-list"></i> Stock Out List</a> 
                    </div>
                </div>
                <div class="card-body flora">
                    <form action="<?php echo base_url('admin/stock/insertstockout') ;?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">                        	
                        <div class="form-group row">
                            <div class="col-md-2"></div>
                            <label class="col-sm-12 col-md-1 col-form-label">Date <span class="text-danger">*</span> </label>
                            <div class="col-sm-12 col-md-6">
                                <input type="date" name="date" id="date" value="<?php echo date('Y-m-d');?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2"></div>
                            <label class="col-sm-12 col-md-1 col-form-label">Product <span class="text-danger">*</span> </label>
                            <div class="col-sm-12 col-md-6">
                                <select name="product_id" id="product_id" class="form-control">
                                    <option value="">Select Product</option>
                                    <?php 
                                        if(is_array($product)){
                                            foreach($product as $data){
                                        ?>
                                        <option value="<?php echo $data['id'] ;?>"><?php echo $data['product_name'] ;?></option>
                                        <?php 
                                            }
                                        }?>  
                                </select>
                            </div>
                        </div>
                         <div class="form-group row">
                            <div class="col-md-2"></div>
                            <label class="col-sm-12 col-md-1 col-form-label" for="uom"> Select Variant <span class="text-danger">*</span> </label>
                            <div class="col-sm-12 col-md-6">
                                <select name="variant_id" id="variant_id" class="form-control">
                                    <option value="">Select Unit </option>
                                    
                                   
									
                                   
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2"></div>
                            <label class="col-sm-6 col-md-1 col-form-label">Stock Quantity </label>
                            <div class="col-sm-6 col-md-2">
                                <input type="text" name="" value="" id="stockquantity" placeholder="Stock Quantity" class="form-control" readonly style="cursor:not-allowed;">
                            </div>
                          
                            <label class="col-form-label">Purchase Price </label>
                            <div class="col-sm-6 col-md-1">
                                <input type="text" name="rate"  id="price" placeholder="Stock Quantity" class="form-control" readonly style="cursor:not-allowed;">
                            </div>
                             <label class="col-form-label">Pcode </label>
                            <div class="col-sm-6 col-md-2">
                                <input type="text" name="pcode"  id="pcode" placeholder="Stock Quantity" class="form-control" readonly style="cursor:not-allowed;">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2"></div>
                            <label class="col-sm-12 col-md-1 col-form-label">Quantity Out <span class="text-danger">*</span> </label>
                            <div class="col-sm-12 col-md-6">
                                <input type="text" name="quantity" value="" id="quantity" placeholder="Quantity" class="form-control" required>
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <div class="col-md-2"></div>
                            <label class="col-sm-12 col-md-1 col-form-label">Person Name</label>
                            <div class="col-sm-12 col-md-6">
                            <?php $name=$this->Inv_model->selectbyquery1("gd_users","`id`='".$this->session->userdata('role')."'");?>
                                <input type="text" name="person_name" value="<?php echo $name['name'] ?>" id="person_name" placeholder="Person Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2"></div>
                            <label class="col-sm-12 col-md-1 col-form-label">Remark</label>
                            <div class="col-sm-12 col-md-6">
                                <textarea name="remark" cols="40" rows="3" id="remark" placeholder="Remark" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row" style="margin-top:50px;">
                            <div class="col-md-4"></div>
                            <div class="col-sm-2">
                                <input type="submit" name="stockout" value="Stock Out" class="btn btn-danger btn-block btn-sm">
                            </div>
                        </div>
                    </form>                   
                </div>
            </div>
        </div>
    </div>
    <br><br>
</section>
<script>
$(document).ready(function(){
    $('#variant_id').change(function(){
        var variant_id = $(this).val();
		var product_id=$('#product_id').val();
		console.log(product_id);
		        $.ajax({
               url:"<?php echo base_url('admin/stock/stockquantity')?>",
               method:"POST",
               data:{product_id:product_id,variant_id:variant_id},
               success:function(data){
				  $('#stockquantity').val(data);
                   // console.log(data);
				   var qty=data;
				  if(qty=='0' || qty==''){
					  alert('Product stock Not Avialable');
					  qty=0;
					  $('#stockquantity').val(qty);
					  }
					  
					
               }
          });
    });
	
$('#product_id').change(function(e){
		 var product_id=$(this).val();
		 $.ajax({
			 url:"<?php echo base_url('admin/inventory/get_varients')?>",
			 method:"POST",
			 data:{id:product_id},
			 //dataType:"JSON",
			 success: function(data)
			 {
				 $('#variant_id').html(data);
				 }
			 });
		 
		 
		 });
	$('#variant_id').change(function(e){
		var variant_id=$(this).val();
		var pid=$('#product_id').val();
		$.ajax({
			method:'POST',
			url:"<?php echo base_url('admin/stock/get_unit')?>",
			data:{pid:pid,variant_id:variant_id},
			dataType:"JSON",
			success: function(data)
			{
			
			$('#pcode').val(data['pcode']);
			$('#price').val(data['rate']);
			
			console.log(data);		
				}
			
			});
		
		});

    $('#quantity').keyup(function(){
        var quantity = Number($(this).val());
        var stock = Number($('#stockquantity').val());
        if(quantity > stock){
            alert("Out Quantity cannot be more than Stock Quantity!");
            return false;
        }
    });
});
</script>