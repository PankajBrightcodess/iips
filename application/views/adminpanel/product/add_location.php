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
                                <?php echo form_open_multipart('admin/product/save_availability');?>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label">Select Product<span class='text-danger'>*</span></label>
                                    <div class="col-sm-12 col-md-6">
                                        <?php echo form_dropdown(array('name'=>'prod_id[]','id'=>'prod_id','class'=>'form-control','required'=>'true','multiple'=>'multiple'),$productoption); ?>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label">Select Location<span class='text-danger'>*<br/>(in which product is available)</span></label>
                                    <div class="col-sm-12 col-md-6">
                                        <?php echo form_dropdown(array('name'=>'location_id[]','id'=>'location_id','class'=>'form-control','multiple'=>'multiple'),$locationoption); ?>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>                                
                                <div class="form-group row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">                                        
                                        <?php echo form_submit(array('name'=>'save_location','id'=>'save_location','value'=>'Save Product Avail. Location','class'=>'form-control btn btn-success'));?>
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
                                             <th class="no-sort">Product Name</th>
                                             <th class="no-sort">Available In Location's</th>                                             
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php if(!empty($availdatalist)){ $i=0;
                                             foreach($availdatalist as $list){$i++; ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $list['product_name'];?></td>
                                            <td><?php echo implode(' , ',$list['location_name']);?></td>                       
                                            
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

        $('#location_id').select2({
            placeholder: {
                id: '', // the value of the option
                text: '-- Select Multiple Location --'
            }
        });

        $('#prod_id').select2({
            placeholder: {
                id: '', // the value of the option
                text: '-- Select Multiple Product --'
            }
        });

       

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