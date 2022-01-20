<section class="content">
      <div class="container-fluid">
    	<div class="row">
        	<div class="col-md-12">
                <div class="card">
                     <div class="card-header bg-primary">
                    	<h3 class="card-title"><?php echo $title; ?></h3>
                    </div> 
                    <!-- /.card-header -->
                    <div class="card-body">
                    <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table class="table data-table table-bordered">
                        <thead>
                            <tr class="flora">
                                <th>#</th>
                                <th class="no-sort">Date</th>
                                <th>Supplier Name</th>
                                <th>Shop Name</th>
                                <th>Mobile</th>
                                <th>Invoice</th>
                                <th>Waybill</th>
                                <th>Amount</th>
                                <th>Action</th>
          
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($details)){ $i=0;
                                foreach($details as $list){$i++;?>
                            <tr class="<?php // if($i%2==1){echo 'table-dark';} else echo 'table-warning';?> ">
                                <td><?php echo $i;?></td>
                                <td><?php echo $list['date'];?></td>
                                <td><?php echo $list['supplier'];?></td>
                                <td><?php echo $list['shop'];?></td>
                                <td><?php echo $list['mobile']?></td>
                                <td><?php echo $list['invoice'];?></td>
                                <td><?php echo $list['waybill'];?></td> 
                                <td><?php echo $list['total'];?></td>
                               <td><a href="<?php echo base_url('admin/inventory/get_product/').$list['id']?>"><button class="btn btn-sm btn-warning"><i class="fa fa-info"></i></button></a>
                                <a class="btn btn-sm btn-danger" onClick="myConfirm();" id="del_btn" aria-qty="<?php echo $list['id']?>" ><i class="fa fa-trash"></i></a>
                               </td>
                                
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
		
	function myConfirm() {
  var result = confirm("Want to delete?");
  if (result==true) {
	  return true;
  
  } else {
   return false;
  }
}
		$('body').on('click','#del_btn',function(){
				var id = $(this).attr('aria-qty');
				var table="gd_inventory_purchase";
				console.log(table);
				var check=myConfirm();
				if(check){
				$.ajax({
					type:"POST",
					url:"<?php echo base_url('admin/inventory/delete_rec')?>",
					data:{id:id,table:table},
					success: function(data)
					{
					alert(data);
					}	
					
					});
				}
				
				location.reload();
					
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