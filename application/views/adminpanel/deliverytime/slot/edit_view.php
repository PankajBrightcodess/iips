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
                                <?php echo form_open_multipart('admin/deliverytime/updateslot');?>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label">Select Location<span class='text-danger'>*</span></label>
                                    <div class="col-sm-12 col-md-6">
                                        <?php echo form_dropdown(array('name'=>'location_id','class'=>'form-control','required'=>'true'),$maincatoption,$oneslot['location_id']); ?>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label">Slot Name <span class='text-danger'>*</span></label>
                                    <div class="col-sm-12 col-md-6">
                                        <?php echo form_input(array('type'=>'text','name'=>'name','id'=>'cat_name','class'=>'form-control','value'=>$oneslot['name'],'placeholder'=>'Enter Slot Name','required'=>'true'));?>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div> 
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label">Slot Type<span class='text-danger'>*</span></label>
                                    <div class="col-sm-12 col-md-6">
                                        <?php $typearray = array(''=>'--Select Slot Type--','paid'=>'PAID','free'=>'FREE');?>
                                        <?php echo form_dropdown(array('name'=>'slot_type','class'=>'form-control','required'=>'true'),$typearray,$oneslot['slot_type']);?>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>  
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label">Slot Price<span class='text-danger'>*</span></label>
                                    <div class="col-sm-12 col-md-6">                                        
                                        <?php echo form_input(array('type'=>'number','name'=>'slot_price','class'=>'form-control','value'=>$oneslot['slot_price'],'placeholder'=>'Enter Slot Price','required'=>'true'));?>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>                              
                                <div class="form-group row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">  
                                        <?php echo form_hidden('editid',$editid);?>                                      
                                        <?php echo form_submit(array('name'=>'save_slot','id'=>'save_slot','value'=>'Update Slot','class'=>'form-control btn btn-success'));?>
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
                                             <th class="no-sort">Location</th>
                                             <th class="no-sort">Slot Name</th>
                                             <th class="no-sort">Price</th>
                                             <th class="no-sort">Publish</th>
                                             <th class="no-sort">Action</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php if(!empty($slotlist)){ $i=0;
                                             foreach($slotlist as $list){$i++; ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $list['catname'];?></td>
                                            <td><?php echo $list['name'];?></td>
                                            <td><?php if($list['slot_type'] == 'free'){ echo '0';}else{
                                                echo $list['slot_price'];
                                            }?></td>
                                            <td>
                                            <label class="switch">
                                                <input type="checkbox" class="my_checker check" <?php if($list['publish_status'] == '0'){echo '';}else{echo 'checked';} ?> value="<?php echo $list['id']; ?>">
                                                <span class="slider round"></span>
                                            </label>
                                            </td>
                                            <td>
                                            <a href='<?php echo base_url("admin/deliverytime/editslot/$list[id]");?>' class='btn btn-info btn-sm hoverable' data-container="body" data-toggle="popover" data-placement="top" data-content="Edit">
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
				var prompt = confirm('Please Confirm Do You Really Want to Plublish Delivery Slot');
			}
			else if(status == false){
				var prompt = confirm('Please Confirm Do You Really Want to Unpublish Delivery Slot');
            }
            if(prompt){
                $.ajax({
					url:"<?php echo base_url('admin/deliverytime/publishslot');?>",
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
				
    });
</script>