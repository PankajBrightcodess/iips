<section class="content">
      <div class="container-fluid">
    	<div class="row">
        	<div class="col-md-12">
                <div class="card">
                    <div class="card-header row">
                    	<div class="col-md-8"></div>
                    	<div class="col-md-4 text-right">
                            <a href='<?php echo $_SERVER['HTTP_REFERER']; ?>'><button class="btn btn-success"><i class="fas fa-arrow-left"></i> BACK</button></a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <div class="row">
                        	<div class="col-md-6">
                                <?php echo form_open_multipart('admin/masterkey/updateshape');?>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label">Select Category<span class='text-danger'>*</span></label>
                                    <div class="col-sm-12 col-md-6">
                                        <?php echo form_dropdown(array('name'=>'cat_id','class'=>'form-control','required'=>'true'),$catoption,$oneshape['cat_id']); ?>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label">Shape Name<span class='text-danger'>*</span></label>
                                    <div class="col-sm-12 col-md-6">
                                        <?php echo form_input(array('type'=>'text','name'=>'name','id'=>'cat_name','class'=>'form-control','value'=>$oneshape['name'],'placeholder'=>'Shape Name','required'=>'true'));?>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label">Image</label>
                                    <div class="col-sm-12 col-md-6">
                                        <?php echo form_upload(array('name'=>'image','class'=>'form-control','id'=>'image'));?>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label">Price<span class='text-danger'>*</span></label>
                                    <div class="col-sm-12 col-md-6">
                                        <?php echo form_input(array('type'=>'number','step'=>'0.01','name'=>'price','class'=>'form-control','required'=>'true','value'=>$oneshape['price'],'placeholder'=>'Extra Price'));?>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <?php echo form_hidden('edit_id',$oneshape['id']);?>                                        
                                        <?php echo form_submit(array('name'=>'save_shape','id'=>'save_shape','value'=>'Update Shape','class'=>'form-control btn btn-success'));?>
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
                                             <th class="no-sort">Main Category</th>
                                             <th class="no-sort">Text</th>
                                             <th class="no-sort">Image</th>
                                             <th class="no-sort">Price</th>
                                             <th class="no-sort">Action</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php if(!empty($shapelist)){ $i=0;
                                             foreach($shapelist as $list){$i++; ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $list['catname'];?></td>
                                            <td><?php echo $list['name'];?></td>
                                            <td width='20%'><img src="<?php echo file_url($list['path']);?>" width="100%" alt='cat_image'/></td>
                                            <td>Rs.<?php echo $list['price'];?></td>
                                            <td>
                                            <a href='<?php echo base_url("admin/masterkey/edit_shape/$list[id]");?>' class='btn btn-info btn-sm hoverable' data-container="body" data-toggle="popover" data-placement="top" data-content="Edit">
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