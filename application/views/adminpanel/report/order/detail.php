<section class="content">
      <div class="container-fluid">
    	<div class="row">
        	<div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4" style='text-align:right;'>
                                <a href='<?php echo base_url('admin/report/orderlist');?>'><button class="btn btn-danger"><i class="right fas fa-angle-left"></i> BACK</button></a>
                            </div>
                        </div>
                    	
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            
                            <?php if(!empty($orderdetails)){ $i=0;
                               foreach($orderdetails as $o_details){ $i++;?>
                               <?php if($o_details['ptable'] == 'product'){ $varieddata = $this->Master_model->get_product_variant_image($o_details['pid'],$o_details['ptable']);?>
                                <!-- Get table tr for the product -->
                            <tr>
                                <th>#</th>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Product Image</th> 
                                <th>Quantity</th>                            
                            </tr>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $o_details['pcode'];?></td>
                                <td><?php echo ucfirst($o_details['product_name']);?></td>
                                <td><img src='<?php echo file_url("$varieddata[image_path]");?>' width='200px' height="200px" alt='product_image' class="img-fluid">                               	<td><?php echo $o_details['quantity'];?></td>
                            </tr>
                            <tr style='border:0px'>
                                <td colspan="6" style='border:0px'><hr/></td>
                            </tr>
                               <?php }elseif($o_details['p_ptable'] == 'addon_product'){ $varieddata = $this->Master_model->get_product_variant_image($o_details['p_pid'],$o_details['p_ptable']);?>
                               <tr>
                                   <th>#</th>
                                   <th>Product Name</th>
                                   <th>Product Code</th>
                                   <th>Product Quantity</th>
                                   <th>Product Image</th>
                                   <th>Product Price</th>
                               </tr>
                               <tr>
                                   <td><?php echo $i;?></td>
                                   <td><?php echo ucfirst($o_details['p_productname']);?></td>
                                   <td><?php echo $o_details['p_pcode'];?></td>
                                   <td><?php echo $o_details['p_quantity']?></td>
                                   <td><img src="<?php echo file_url("$varieddata[image_path]");?>" width="150px" height="150px" alt='addon_image'/></td>
                                   <td>Rs. <?php echo $o_details['p_price'];?></td>
                               </tr>
                                <?php } ?>
                            <?php   } 
                                ?>
                            <?php } ?>
                        </table>
                    </div>  
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>    
<script>
	
	$(document).ready(function(e) {        
		var table=$('.data-table').DataTable({
			scrollCollapse: true,
			autoWidth: false,
			responsive: true,
			columnDefs: [{
				targets: "no-sort",
				orderable: false,
			}],
			"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"language": {
				"info": "_START_-_END_ of _TOTAL_ entries",
				searchPlaceholder: "Search"
			},
		});	

              
    });
</script>