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
                            <table class="table data-table stripe hover nowrap table-bordered"> 
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="no-sort">Main Category</th>
                                        <th class="no-sort">Sub-Category</th>
                                        <th class="no-sort">Image</th>
                                        <!-- <th class="no-sort">Slug</th> -->
                                        <th class="no-sort">Show On Grid</th>
                                        <th class="no-sort">Home Page</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($categorylist)){ $i=0;
                                        foreach($categorylist as $list){$i++; ?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $list['catname'];?></td>
                                    <td><?php echo $list['name'];?></td>
                                    <td width='20%'><img src="<?php echo file_url($list['image_path']);?>" width='100%' alt='cat_image'/></td>
                                    <!-- <td><?php //echo $list['slug'];?></td> -->
                                    <td><?php $id = $list['id'];$publish_status = $this->Master_model->check_published($id);?>
                                    <label class="switch">
                                        <input type="checkbox" class="my_checker check" <?php if($publish_status == false){echo '';}else{echo 'checked';} ?> value="<?php echo $list['id']; ?>">
                                        <span class="slider round"></span>
                                    </label>
                                    </td>
                                    <td><?php $id = $list['id'];$publish_status_2 = $this->Master_model->check_published_subcatproduct($id);?>
                                    <label class="switch">
                                        <input type="checkbox" class="my_checker_2 check" <?php if($publish_status_2 == false){echo '';}else{echo 'checked';} ?> value="<?php echo $list['id']; ?>">
                                        <span class="slider round"></span>
                                    </label>
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
				var prompt = confirm('Please Confirm Do You Really Want to Plublish Category In Grid');
			}
			else if(status == false){
				var prompt = confirm('Please Confirm Do You Really Want to Unpublish Category In Grid');
            }
            if(prompt){
                $.ajax({
					url:"<?php echo base_url('admin/website/publish_categorygrid');?>",
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

        $('.my_checker_2').change(function(){
            var pid = $(this).val();   
            var status = $(this).is(':checked'); 
            //console.log(status);
            
            if(status == true){
				var prompt = confirm('Please Confirm Do You Really Want to Plublish Category Product');
			}
			else if(status == false){
				var prompt = confirm('Please Confirm Do You Really Want to Unpublish Category Product');
            }
            if(prompt){
                $.ajax({
					url:"<?php echo base_url('admin/website/publish_subcatproduct');?>",
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