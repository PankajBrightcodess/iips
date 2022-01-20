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
                        	<div class="col-md-6">
                                <?php echo form_open_multipart('admin/masterkey/savelowcategory');?>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label">Select Category<span class='text-danger'>*</span></label>
                                    <div class="col-sm-12 col-md-6">
                                        <?php echo form_dropdown(array('name'=>'cat_id','id'=>'maincat_id','class'=>'form-control','required'=>'true'),$catoption); ?>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label">Select Sub-Category<span class='text-danger'>*</span></label>
                                    <div class="col-sm-12 col-md-6">
                                        <?php echo form_dropdown(array('name'=>'subcat_id','id'=>'subcat_id','class'=>'form-control','required'=>'true'),$subcatoption); ?>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label">Low-category Name <span class='text-danger'>*</span></label>
                                    <div class="col-sm-12 col-md-6">
                                        <?php echo form_input(array('type'=>'text','name'=>'name','id'=>'cat_name','class'=>'form-control','placeholder'=>'Enter Sub Category Name','required'=>'true'));?>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label"> Low-category Image <br/><span class='text-danger'>(optional,but image is required to show subcategory in homepage.So,choose wisely)</span></label>
                                    <div class="col-sm-12 col-md-6">
                                        <?php echo form_upload(array('name'=>'image','class'=>'form-control','id'=>'image'));?>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <?php //echo form_hidden('type','simple');?>
                                        <?php echo form_submit(array('name'=>'save_cat','id'=>'save_cat','value'=>'Save Low Category','class'=>'form-control btn btn-success'));?>
                                    </div>
                                    <div class="col-md-4"></div>                                    
                                </div>
                                <?php echo form_close();?>
                            </div>
                        	<div class="col-md-6 table-responsive">
                            	 <table class="table data-table stripe hover nowrap table-bordered"> 
                                     <thead>
                                         <tr>
                                             <th>#</th>
                                             <th class="no-sort">Category</th>
                                             <th class="no-sort">SubCategory</th>
                                             <th class="no-sort">Low-Category</th>
                                             <th class="no-sort">Image</th>
                                             <th class="no-sort">Slug</th>
                                             <th class="no-sort">Action</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php if(!empty($categorylist)){ $i=0;
                                             foreach($categorylist as $list){$i++; ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $list['catname'];?></td>
                                            <td><?php echo $list['subcatname'];?></td>
                                            <td><?php echo $list['name'];?></td>
                                            <td width='20%'><img src="<?php echo file_url($list['image_path']);?>" width='100%' alt='cat_image'/></td>
                                            <td><?php echo $list['slug'];?></td>
                                            <td>
                                            <a href='<?php echo base_url("admin/masterkey/editlowcategory/$list[id]");?>' class='btn btn-info btn-sm hoverable' data-container="body" data-toggle="popover" data-placement="top" data-content="Edit">
                                                <i class='fas fa-edit'></i>
                                            </a>
                                            <a href='#' data-table='lowcategory' data-deleteid='<?php echo $list['id']; ?>' class='btn btn-danger btn-sm hoverable my_delete' data-container="body" data-toggle="popover" data-placement="top" data-content="Delete">
                                                <i class='fas fa-trash'></i>
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

        $('.my_delete').click(function(e) {
            var table = $(this).data('table');
            var id = $(this).data('deleteid');
			//alert(dlt);
			var prompt = confirm("Are you Sure? You want to delete.");
			if(prompt){
				$.ajax({
					url:"<?php echo base_url('admin/masterkey/delete_status') ;?>",
					method:"POST",
					data:{table:table,id:id},
					success:function(data){
						if(data){
                            location.reload();
                        }
					}
				});
			}else{
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

        $('body').on('change','#maincat_id',function(){
            var catid = $(this).val();
            $.ajax({
                url: "<?php echo base_url('admin/product/ajax_getsubcategory');?>",
                method: "POST",
                async:false,
                data: { catid : catid },
                dataType: "json",
                success :function(data){
                    $('#subcat_id').html(data.subcat);                    
                }
            })
        });	
				
    });
</script>