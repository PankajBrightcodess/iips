<section class="content">
      <div class="container-fluid">
    	<div class="row">
        	<div class="col-md-12">
                <div class="card">                    
                    <div class="card-body">
                    <div class="row">
                    <div class="col-md-12"> 
                        <div class="row">                        
                        <div class="col-md-3 card bg-danger p-2 m-2">
                        <a href='<?php echo base_url('admin/report/userlist');?>'>
                            <div style='text-align:right'>
                                <h3>Users</h3><hr/>
                            </div>
                            <span>
                            <div class='row'>
                                <div class="col-md-8"  style='text-align:left'><h3><?php echo $usercount;?></h3></div>
                                <div class="col-md-4"  style='text-align:right'><h3><i class='fas fa-users'></i></h3></div>
                            </div>    
                            </span>
                        </a>
                        </div>   
                       
                        <div class="col-md-3 card bg-info p-2 m-2">
                        <a href='<?php echo base_url('admin/report/orderlist');?>'>
                            <div style='text-align:right'>
                                <h3>Orders</h3><hr/>
                            </div>                            
                            <span>
                            <div class='row'>
                                <div class="col-md-8"  style='text-align:left'><h3><?php echo $ordercount;?></h3></div>
                                <div class="col-md-4"  style='text-align:right'><h3><i class='fas fa-shopping-cart'></i></h3></div>
                            </div>    
                            </span>
                        </a> 
                        </div>
                        
                        </div>                        
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