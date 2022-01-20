<section class="content">
      <div class="container-fluid">
    	<div class="row">
        	<div class="col-md-12">
                <div class="card">
                    <div class="card-header">
            <div class="row">
                <div class="col-md-8"><?php echo $title?></div>
                <div class="col-md-4"><a href="<?php  echo base_url('/admin/inventory/purchaselist')?>" class="btn btn-primary float-right"> <i class="right fas fa-angle-left" aria-hidden="true"></i> BACK</a></div>
            </div>
        </div> 
                    <!-- /.card-header -->
                    <div class="card-body">
                    <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table class="table data-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Shop Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Gst</th>
                                <th>Address</th>
                                <th>Action</th>
         					</tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($details)){ $i=0;
                                foreach($details as $list){$i++;?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $list['name'];?></td>
                                <td><?php echo $list['shop_name'];?></td>
                                <td><?php echo $list['mobile'];?></td>
                                <td><?php echo $list['email']?></td>
                                 <td><?php echo $list['gst'];?></td>
                                <td><?php echo $list['address'];?></td>
                                <td> &nbsp;<a href="<?php echo base_url('admin/masterkey/edit_supplier/').$list['id'] ?>"><button class="btn btn-sm btn-warning">EDIT</button></a>
                                &nbsp;&nbsp;<a><button class="btn btn-sm btn-danger">Delete</button></a></td>
                               
                                
                            </tr>
                            <?php }
                            }?>
                            
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
        $('.my_checker').change(function(){
            var pid = $(this).val();   
            var status = $(this).is(':checked'); 
            //console.log(status);
            
            if(status == true){
				var prompt = confirm('Please Confirm Do You Really Want to Plublish Product');
			}
			else if(status == false){
				var prompt = confirm('Please Confirm Do You Really Want to Unpublish Product');
            }
            if(prompt){
                $.ajax({
					url:"<?php echo base_url('admin/product/publishproduct');?>",
					method:"POST",
					data:{id:pid,status:status},
					success:function(data){
						location.reload();
					}
				});
            }else{
                if(status){
					$(this).prop('checked',false);	
				}else{
					$(this).prop('checked',true);
				}
				return false;
            }
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