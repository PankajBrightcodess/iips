<section class="content">
      <div class="container-fluid">
    	<div class="row">
        	<div class="col-md-12">
                <div class="card">   
                   <div class="card-header pull-right bg-primary">
                    	<a href='<?php echo base_url('admin/sales/get_order_details');?>'><span class='btn btn-danger'>BACK</span></a>
                    </div>                 
                    <div class="card-body">
                    <div class="row">
                    <div class="col-md-12 table-responsive"> 
                        <table class="table data-table">
                            <thead>
                            <tr class="flora">
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Order NO</th>
                                <th>Delivery Date</th>
                                <th>Time Slot</th>
                                <th>Delivery Address</th>
                                <th>Pincode</th>
                                <th>Delivery District</th>
                                <th>Delivery State</th>
                                <th>Amount to Pay</th>
                                <th>Payment Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($orderdatalist)){ $i=0;
                                foreach($orderdatalist as $list){$i++;
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo ucfirst($list['custname']);?></td>
                                <td><?php echo $list['order_no'];?></td>
                                <td><?php echo $list['delivery_date'];?></td>
                                <td><?php echo $list['time_slot'];?></td>
                                <td><?php echo $list['delivery_address'];?></td>                                
                                <td><?php echo $list['delivery_pincode'];?></td>                                
                                <td><?php echo $list['delivery_district'];?></td>                                
                                <td><?php echo $list['delivery_state'];?></td>                                
                                <td><?php echo $list['order_total'];?></td>                                
                                <td><?php $pstatus = $list['payment_status']; if($pstatus == 0){?>
                                <span class='text-danger'>Payment Not Made</span><?php }else{ ?><span class='text-success'>Payment Done</span> <?php }?>
                                </td>                                
                                <td>
                                <a href='<?php echo base_url("admin/report/orderdetail/$list[id]");?>' class='btn btn-info btn-sm hoverable' data-container="body" data-toggle="popover" data-placement="top" data-content="View Order Details">
                                    <i class='fas fa-eye'></i>
                                </a>
                                </td>                                
                            </tr>
                            <?php } } ?>
                            </tbody>
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

        $('.hoverable').mouseenter(function(){
            //$('[data-toggle="popover"]').popover();
            $(this).popover('show');                    
        }); 
        $('.hoverable').mouseleave(function(){
            $(this).popover('hide');
        }); 

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