<section class="content">
      <div class="container-fluid">
    	<div class="row">
        	<div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4" style='text-align:right;'>
                                <a href='<?php echo base_url('admin/');?>'><button class="btn btn-danger"><i class="right fas fa-angle-left"></i> BACK</button></a>
                            </div>
                        </div>
                    	
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <div class="row">
                    <div class="col-md-12">
                        <table class="table data-table table-bordered">
                           <thead class="flora">
                           <th>#</th>
                           <th>Order No</th>
                           <th>Delivery Date</th>
                           <th>Order Date</th>
                           <th>Time</th>
                           <th>Customer Name</th>
                           <th>Action</th>
             
                          
                           
                           </thead> 
                           <tbody>
                           <?php $i=0; foreach($orderdetails as $list)
						   { ++$i;
						   ?>
                           <tr>
                           <td><?php echo $i;?></td>
                           <td><?php echo $list['order_no']?></td>
                           <td><?php echo $list['delivery_date']?></td>
                           <td><?php echo $list['added_on']?></td>
                          <td><?php echo $list['cur_time']?></td>
                            <td><?php $name=$this->Inv_model->selectbyquery1("gd_customer_detail","`id`='".$list['cust_id']."'");echo $name['name']?></td>
                          <td>
                   			 <a href="<?php echo base_url('admin/sales/orderdetail/').$list['id'];?>" class="btn btn-sm btn-warning" ><i class="fa fa-edit"></i></a>
                              <a href="<?php echo base_url('admin/sales/orderdetail1/').$list['id'];?>" class="btn btn-sm btn-info" ><i class="fa fa-print"></i></a>
                  			 <a class="btn btn-sm btn-danger" id="del_btn" aria-qty="<?php echo $list['id']?>" ><i class="fa fa-trash"></i></a>
                		 </td>
                           </tr>
                           <?php }?>
                           </tbody>
                           
                                <!-- Get table tr for the product -->
                           
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