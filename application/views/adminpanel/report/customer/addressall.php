<section class="content">
      <div class="container-fluid">
    	<div class="row">
        	<div class="col-md-12">
                <div class="card">   
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-4" style='text-align:right;'>
                                <a href='<?php echo base_url('admin/report/userlist');?>'><span class='btn btn-danger'><i class="right fas fa-angle-left"></i> BACK</span></a>
                            </div>
                        </div>
                    </div>                 
                    <div class="card-body">
                    <div class="row">
                    <div class="col-md-12 table-responsive"> 
                        <table class="table data-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Address</th>
                                <th>Pincode</th>
                                <th>District</th>
                                <th>State</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($addresslist)){ $i=0;
                                foreach($addresslist as $list){$i++;
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo ucfirst($list['name']);?></td>
                                <td><?php echo $list['address'];?></td>
                                <td><?php echo $list['pincode'];?></td>
                                <td><?php echo $list['district'];?></td>
                                <td><?php echo $list['state'];?></td>                                
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