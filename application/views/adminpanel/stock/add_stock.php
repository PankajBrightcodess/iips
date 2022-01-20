<section class="content">
    <div class="container-fluid">
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
                        <form action="<?php echo base_url('adminpanel/stock/insertstock') ;?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">                        	
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="col-sm-12 col-md-2 col-form-label">Date <span class="text-danger">*</span> </label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="date" name="date" id="date" value="<?php echo date('Y-m-d');?>" class="form-control" required readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="col-sm-12 col-md-2 col-form-label">Product <span class="text-danger">*</span> </label>
                                <div class="col-sm-12 col-md-8">
                                    <select name="pid" id="product_id" class="form-control">
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
                                <div class="col-md-1"></div>
                                <label class="col-sm-12 col-md-2 col-form-label">Stock Quantity </label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="text" name="" value="" id="stockquantity" placeholder="Stock Quantity" class="form-control bg-info" readonly style="cursor:not-allowed;">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="col-sm-12 col-md-2 col-form-label">Quantity <span class="text-danger">*</span> </label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="text" name="quant" value="" id="stock" placeholder="Quantity" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="col-sm-12 col-md-2 col-form-label" for="uom"> Rate <span class="text-danger">*</span> </label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="text" name="rate"  id="rate" class="form-control" placeholder="Enter Rate" required>
                                </div>
                            </div>
                        
                            </div>
                            <div class="row">
                                <div class="col-md-5"></div>
                                
                                <div class="col-sm-2">
                                    <input type="submit" name="add_stock" value="Add Stock" class="btn btn-success btn-block btn-sm">
                            
                            </div>
                        </form>                   
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>
<script>
$(document).ready(function(){
    $('#product_id').change(function(){
        var product_id = $(this).val();
        $.ajax({
               url:"<?php echo base_url('adminpanel/stock/stockquantity')?>",
               method:"POST",
               data:{pid:product_id},
			   dataType:"JSON",
               success:function(data){
				   console.log(data);
                    $('#stockquantity').val(data['stock']);
					 $('#rate').val(data['rate']);
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