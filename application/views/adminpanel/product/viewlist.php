<section class="content">
      <div class="container-fluid">
    	<div class="row">
        	<div class="col-md-12">
                <div class="card">                    
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
                                <th>Product Sub. Cate</th>
                                <th>Product Low Cate</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Image</th>
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
                                <td><?php echo implode(' , ',$list['subcatname']);?></td>
                                <td><?php echo implode(' , ',$list['lowcatname']);?></td>
                                <td><?php echo $list['variant_price'];?></td>
                                <td><?php echo $list['discount'].'%';?></td>
                                <td><img src="<?php echo file_url($list['path']);?>" alt='product_img' width='50px' height='50px'/></td>
                                <td>
                                    <label class="switch">
                                        <input type="checkbox" class="my_checker check" <?php if($list['publish_status'] == '0'){echo '';}else{echo 'checked';} ?> value="<?php echo $list['id']; ?>">
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                <td width='10%'><?php $checkdetailpresent = $this->Master_model->check_detailpresent($list['id']);?>
                                <?php if($checkdetailpresent==false){ ?>    
                                <a href='<?php echo base_url("admin/product/productdetail/$list[id]");?>' class='btn btn-success btn-sm hoverable' data-container="body" data-toggle="popover" data-placement="top" data-content="Add More Details">
                                    <i class='fas fa-plus'></i>
                                </a>
                                <?php } ?>
                                <a href='<?php echo base_url("admin/product/editproduct/$list[id]");?>' class='btn btn-info btn-sm hoverable' data-container="body" data-toggle="popover" data-placement="top" data-content="Edit">
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