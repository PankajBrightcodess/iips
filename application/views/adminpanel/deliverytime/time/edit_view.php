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
                                <?php echo form_open_multipart('admin/deliverytime/updatetime');?>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label">Select Category<span class='text-danger'>*</span></label>
                                    <div class="col-sm-12 col-md-6">
                                        <?php echo form_dropdown(array('name'=>'cat_id','id'=>'cat_id','class'=>'form-control','required'=>'true'),$maincatoption,$onetime['cat_id']); ?>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label">Select Delivery Slot <span class='text-danger'>*</span></label>
                                    <div class="col-sm-12 col-md-6">
                                        <?php echo form_dropdown(array('name'=>'slot_id','id'=>'slot_id','class'=>'form-control','required'=>'true'),$slotlistarray);?>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div> 
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label">Time From<span class='text-danger'>*</span></label>
                                    <div class="col-sm-12 col-md-6"><?php $from_values = explode(':',$onetime['time_from']);?>                                        
                                        <input type="number" min="0" max="23" name='time_from[]' value='<?php echo $from_values[0];?>' placeholder="23">:
                                        <input type="number" min="0" max="59" name='time_from[]' value='<?php echo $from_values[1];?>' placeholder="00"> Hours(24 hours)
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>  
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label">Time To<span class='text-danger'>*</span></label>
                                    <div class="col-sm-12 col-md-6">  <?php $to_values = explode(':',$onetime['time_to']);?>                                       
                                        <input type="number" min="0" max="23" name='time_to[]' value='<?php echo $to_values[0];?>' placeholder="23">:
                                        <input type="number" min="0" max="59" name='time_to[]' value='<?php echo $to_values[1];?>' placeholder="00"> Hours(24 hours)
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>                              
                                <div class="form-group row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"> 
                                        <?php echo form_hidden('editid',$editid);?>                                       
                                        <?php echo form_submit(array('name'=>'save_time','id'=>'save_time','value'=>'Update Delivery Time','class'=>'form-control btn btn-success'));?>
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
                                             <th class="no-sort">Slot Name</th>
                                             <th class="no-sort">Delivery Time</th>
                                             <th class="no-sort">Publish</th>
                                             <th class="no-sort">Action</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php if(!empty($deliverytimelist)){ $i=0;
                                             foreach($deliverytimelist as $list){$i++; ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $list['catname'];?></td>
                                            <td><?php echo $list['slotname'];?></td>
                                            <td><?php echo $list['name']."<br/>(24-hours)";?></td>
                                            <td>
                                            <label class="switch">
                                                <input type="checkbox" class="my_checker check" <?php if($list['publish_status'] == '0'){echo '';}else{echo 'checked';} ?> value="<?php echo $list['id']; ?>">
                                                <span class="slider round"></span>
                                            </label>
                                            </td>
                                            <td>
                                            <a href='<?php echo base_url("admin/deliverytime/edit_time/$list[id]");?>' class='btn btn-info btn-sm hoverable' data-container="body" data-toggle="popover" data-placement="top" data-content="Edit">
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

        $('.my_checker').change(function(){
            var pid = $(this).val();   
            var status = $(this).is(':checked'); 
            //console.log(status);
            
            if(status == true){
				var prompt = confirm('Please Confirm Do You Really Want to Plublish Delivery Time');
			}
			else if(status == false){
				var prompt = confirm('Please Confirm Do You Really Want to Unpublish Delivery Time');
            }
            if(prompt){
                $.ajax({
					url:"<?php echo base_url('admin/deliverytime/publishtime');?>",
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
        
        $('body').on('change','#cat_id',function(){
            var catid = $(this).val();
            $.ajax({
                url: "<?php echo base_url('admin/deliverytime/ajax_getslot');?>",
                method: "POST",
                async:false,
                data: { catid : catid },
                dataType: "json",
                success :function(data){
                    $('#slot_id').html(data.slot);                    
                }
            })
        });	
        $('#cat_id').trigger('change');
        $('#slot_id').val(<?php echo $onetime['slot_id'];?>);	
    });
</script>