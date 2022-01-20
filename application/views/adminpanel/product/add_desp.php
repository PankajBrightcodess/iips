<section class="content">
      <div class="container-fluid">
    	<div class="row">
        	<div class="col-md-12">
                <div class="card">
                    <!-- <div class="card-header">
                    	<h3 class="card-title"><?php echo $title; ?></h3>
                    </div> -->
                    <!-- /.card-header -->
                    <div class="card-body">
                    <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo base_url('admin/product/save_productdetail');?>" method='post'>  
                        <?php if(!empty($product)){
                            //foreach($productdata as $product){?>
                            <h4><?php echo "$product[product_name]-$product[variantname]";?></h4><hr/>
                            <table class="table table-bordered">
                            <tr>
                                <th>Product Name</th>
                                <th>Product Code</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <!-- <th>Flavour</th> -->
                            </tr>
                            <tr>
                                <td><?php echo $product['product_name'];?></td>
                                <td><?php echo $product['pcode'];?></td>
                                <td><?php echo $product['catname'];?></td>
                                <td><?php echo implode(' , ',$product['subcatname']);?></td>
                                <!-- <td><?php //echo implode(' , ',$product['flavorname']);?></td> -->
                            </tr> 
                            <tr>
                                <th>Image</th>
                                <th>Price</th>
                                <!-- <th>Prepartation Time</th> -->
                            </tr>
                            <tr>
                                <td width='20%'><img src='<?php echo file_url($product['path']);?>' alt='<?php echo $product['product_name'];?>' width="100%"/></td>
                                <td><?php echo 'Rs '.$product['variant_offerprice'];?></td>
                                <!-- <td><?php //echo $product['prep_time'].'(minutes)';?></td> -->
                            </tr>
                            <tr>
                                <th colspan="5">
                                    Product Description
                                </th>
                            </tr>
                            <tr>
                                <td colspan='5'>
                                    <textarea name="desp[<?php echo $product['id'];?>]" id="" class='form-control' cols="30" rows="10" required></textarea>
                                </td>
                            </tr>                   
                           
                        </table><br/><hr/><br/>
                        <?php //}
                        }?>                        
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <button class='btn btn-danger form-control'>Save Product Description</button>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        </form>
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