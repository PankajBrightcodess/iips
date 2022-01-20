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
                    <div class="col-md-12 table-responsive">
                        <table class="table data-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="no-sort">Product Name</th>
                                <th>Product Category</th>                                
                                <th>Image</th>
                                <th>Product Price</th>
                                <th>Publish</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($productlist)){ $i=0;
                                foreach($productlist as $list){$i++;?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $list['product_name'];?></td>
                                <td><?php echo $list['catname'];?></td>                               
                                <td><img src="<?php echo file_url($list['path']);?>" alt='product_img' width='50px' height='50px'/></td>
                                <td><?php echo 'Rs. '.$list['price'];?></td>         
                                <td>
                                    <label class="switch">
                                        <input type="checkbox" class="my_checker check" <?php if($list['publish_status'] == '0'){echo '';}else{echo 'checked';} ?> value="<?php echo $list['id']; ?>">
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                <td>
                                <a href='<?php echo base_url("admin/addons/editaddons/$list[id]");?>' class='btn btn-info btn-sm hoverable' data-container="body" data-toggle="popover" data-placement="top" data-content="Edit Product">
                                    <i class='fas fa-edit'></i>
                                </a>
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
					url:"<?php echo base_url('admin/addons/publishproduct');?>",
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