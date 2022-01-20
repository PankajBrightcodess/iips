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
                    <div class="col-md-12">
                            <?php echo form_open_multipart('admin/addons/save_addons','id="myform"'); ?>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Product Name<span class="text-danger">*</span> </label>
                                    <div class="col-sm-12 col-md-4">
                                        <?php echo form_input(array('name'=>'product_name','class'=>'form-control','id'=>'product_name','placeholder'=>'Enter Product Name'));?>
                                    </div>                                    
								 </div>
                                 <div class="form-group row">                                   
                                    <label class="col-sm-12 col-md-2 col-form-label">Main Category<span class="text-danger">*</span></label>
                                    <div class="col-sm-12 col-md-4">
                                        <?php echo form_dropdown(array('name'=>'cat_id','id'=>'maincat_id','class'=>'form-control'),$maincatoption);?>
                                    </div>
                                    <label class="col-sm-12 col-md-2 col-form-label">Gst Rate <span class="text-danger">*</span> </label>
                                    <div class="col-sm-12 col-md-4">
                                        <?php echo form_dropdown(array('name'=>'gst_rate','id'=>'gst_rate','class'=>'form-control'),$gstrateoption);?>
                                    </div>
                                 </div>                                                 
                                 <div class="form-group row">                                   
                                    <label class="col-sm-12 col-md-2 col-form-label">Product Price<span class="text-danger">*</span></label>
                                    <div class="col-sm-12 col-md-4">
                                        <?php echo form_input(array('name'=>'price','min'=>'1','step'=>'0.01','type'=>'number','class'=>'form-control','placeholder'=>'Enter Product Price'));?>
                                    </div>
                                    <label class="col-sm-12 col-md-2 col-form-label">Product min hold<span class="text-danger">*</span> </label>
                                    <div class="col-sm-12 col-md-4">
                                        <?php echo form_input(array('name'=>'stock_hold','min'=>'1','step'=>'1','type'=>'number','class'=>'form-control','placeholder'=>'Enter Product Stock To Hold'));?>
                                    </div>
                                 </div>
                                 <div class="form-group row">                                   
                                    <label class="col-sm-12 col-md-2 col-form-label">Product Present Stock<span class="text-danger">*</span></label>
                                    <div class="col-sm-12 col-md-4">
                                        <?php echo form_input(array('name'=>'stock_qty','min'=>'1','step'=>'1','type'=>'number','class'=>'form-control','placeholder'=>'Enter Product Qty Present In Stock'));?>
                                    </div>
                                    <label class="col-sm-12 col-md-2 col-form-label">Product Image<span class="text-danger">*</span> </label>
                                    <div class="col-sm-12 col-md-4">
                                        <?php echo form_upload(array('name'=>'image','class'=>'form-control'));?>
                                    </div>
                                 </div> 
                                 
                                 
                                <div class="form-group row">
                                    <div class="col-md-3"></div>
                                    <div class="col-sm-2 col-md-6">
                                        <?php   
                                            echo form_hidden('prodtype','addons');                                          
                                            echo form_submit('addproducts', 'Add Product Addons', array('class'=>'btn btn-success btn-sm form-control','id'=>'submit-btn')); 
                                        ?>
                                        <button type="button" class="btn btn-danger btn-sm cancel-edit hidden">Cancel</button>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                            <?php echo form_close();?>                            
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

        // $('body').on('change','#maincat_id',function(){
        //     var catid = $(this).val();
        //     $.ajax({
        //         url: "<?php echo base_url('admin/product/ajax_getsubcategory');?>",
        //         method: "POST",
        //         async:false,
        //         data: { catid : catid },
        //         dataType: "json",
        //         success :function(data){
        //             $('#subcat_id').html(data.subcat);
        //             $('#flavor_id').html(data.flavor);
        //             $('#quantity_id').html(data.quantity);
        //             $('#egger_id').html(data.egger);
        //         }
        //     })
        // });

        // $('body').on('change','#quantity_id',function(){
        //     var variant = "'"+$(this).val()+"'";
        //     var list = variant.split(',');
        //     var modelentry = $('#get_content').html();
        //     $('#set_content').html('');
        //     //alert(list.length);
        //     for(var i=0;i<list.length;i++){                
        //         $('#set_content').append(modelentry);
        //     }
        //     $('#set_content').removeClass('hidden');
        // });	
    });
</script>