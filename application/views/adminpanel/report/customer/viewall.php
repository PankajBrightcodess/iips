<section class="content">
      <div class="container-fluid">
    	<div class="row">
        	<div class="col-md-12">
                <div class="card">                    
                    <div class="card-body">
                    <div class="row">
                    <div class="col-md-12 table-responsive"> 
                        <table class="table data-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Email Id</th>
                                <th>Mobile No</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($customerlist)){ $i=0;
                                foreach($customerlist as $cust){$i++;
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo ucfirst($cust['name']);?></td>
                                <td><?php echo $cust['email'];?></td>
                                <td><?php echo $cust['mobile_no'];?></td>
                                <td><?php echo $cust['vp'];?></td>
                                <td>
                                <a href='<?php echo base_url("admin/report/addresslist/$cust[id]");?>' class='btn btn-info btn-sm hoverable' data-container="body" data-toggle="popover" data-placement="top" data-content="View Address">
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