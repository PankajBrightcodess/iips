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
                            <?php echo form_open_multipart('admin/product/addproducts','id="myform"'); ?>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Product Name<span class="text-danger">*</span> </label>
                                    <div class="col-sm-12 col-md-4">
                                        <?php echo form_input(array('name'=>'product_name','class'=>'form-control','id'=>'product_name','placeholder'=>'Enter Product Name'));?>
                                    </div>
                                    <label class="col-sm-12 col-md-2 col-form-label">Image<span class="text-danger">*</span> </label>
                                    <div class="col-sm-12 col-md-4">
                                        <?php echo form_upload(array('name'=>'variant_image[]','class'=>'form-control'));?>
                                    </div>                                    
								 </div>
                                 <div class="form-group row">                                   
                                    <label class="col-sm-12 col-md-2 col-form-label">Main Category<span class="text-danger">*</span></label>
                                    <div class="col-sm-12 col-md-4">
                                        <?php echo form_dropdown(array('name'=>'cat_id','id'=>'maincat_id','class'=>'form-control'),$maincatoption);?>
                                    </div>
                                    <label class="col-sm-12 col-md-2 col-form-label">Sub Category<span class="text-danger">*</span> </label>
                                    <div class="col-sm-12 col-md-4">
                                        <?php echo form_dropdown(array('name'=>'subcat_id[]','id'=>'subcat_id','class'=>'form-control','multiple'=>'multiple'),$subcatoption);?>
                                    </div>
                                 </div>
                                 <div class="form-group row">                                       
                                    <!-- <label class="col-sm-12 col-md-2 col-form-label">Product Flavour <span class="text-danger">*</span> </label>
                                    <div class="col-sm-12 col-md-4">
                                        <?php //echo form_dropdown(array('name'=>'flavor_id[]','id'=>'flavor_id','class'=>'form-control','multiple'=>'multiple'),$flavoroption);?>
                                    </div>  -->
                                    <label class="col-sm-12 col-md-2 col-form-label">Low Category</label>
                                    <div class="col-sm-12 col-md-4">
                                        <?php echo form_dropdown(array('name'=>'lowcat_id[]','id'=>'lowcat_id','class'=>'form-control','multiple'=>'multiple'),$lowcatoption);?>
                                    </div> 
                                    <label class="col-sm-12 col-md-2 col-form-label">Gst Rate <span class="text-danger">*</span> </label>
                                    <div class="col-sm-12 col-md-4">
                                        <?php echo form_dropdown(array('name'=>'gst_rate','id'=>'gst_rate','class'=>'form-control','required'=>'true'),$gstrateoption);?>
                                    </div>                                 
                                 </div>         
                                 <!-- <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Available In Shape's </label>
                                    <div class="col-sm-12 col-md-4">
                                        <?php //echo form_dropdown(array('name'=>'shape_id[]','id'=>'shape_id','class'=>'form-control','multiple'=>'multiple'),$shapeoption);?>
                                    </div>   
                                    <label class="col-sm-12 col-md-2 col-form-label">Available In Cream's </label>
                                    <div class="col-sm-12 col-md-4">
                                        <?php //echo form_dropdown(array('name'=>'cream_id[]','id'=>'cream_id','class'=>'form-control','multiple'=>'multiple'),$creamoption);?>
                                    </div>                                 
                                 </div>                                 -->
                                 <!-- <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Preparation Time<span class="text-danger">*</span> </label>
                                    <div class="col-sm-12 col-md-4">
                                        <?php //echo form_input(array('type'=>'number','step'=>'1.00','name'=>'prep_time','id'=>'prep_time','min'=>'1','class'=>'','required'=>'true','style'=>'width:80%;height:calc(2.25rem + 2px);padding:.375rem .75rem'));?> Minutes
                                    </div>   
                                    <label class="col-sm-12 col-md-2 col-form-label">CutOFF Time<span class="text-danger">*</span> </label>
                                    <div class="col-sm-12 col-md-4">
                                        <?php //echo form_input(array('type'=>'time','name'=>'cut_time','id'=>'cut_time','class'=>'form-control','required'=>'true'));?>
                                    </div>                                                                      
                                 </div> -->
                                 <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Quantity<span class="text-danger">*</span> </label>
                                    <div class="col-sm-12 col-md-4">
                                        <?php echo form_dropdown(array('name'=>'variant_id[]','id'=>'quantity_id','class'=>'form-control','multiple'=>'multiple'),$quantityoption);?>
                                    </div>  
                                    <!-- <input type='hidden' name='egger_id[]' value='16'/>  -->
                                    <!-- <label class="col-sm-12 col-md-2 col-form-label">Add On Menu </label>
                                    <div class="col-sm-12 col-md-4">
                                        <?php //echo form_dropdown(array('name'=>'addonmenu_id[]','id'=>'addonmenu_id','class'=>'form-control','multiple'=>'multiple'),$addonmenuoption);?>
                                    </div>  -->
                                    <!-- <label class="col-sm-12 col-md-2 col-form-label">Product Property <span class="text-danger">*</span> </label>
                                    <div class="col-sm-12 col-md-4">
                                        <?php echo form_dropdown(array('name'=>'egger_id[]','id'=>'egger_id','class'=>'form-control','required'=>'true'),$eggeroption);?>
                                    </div>  -->                                
                                 </div>                                 
                                 <fieldset class='scheduler-border hidden' id='set_content'>
                                 
                                 </fieldset>
                                 
                                <div class="form-group row">
                                    <div class="col-md-3"></div>
                                    <div class="col-sm-2 col-md-6">
                                        <?php   
                                            echo form_hidden('prodtype','product');                                          
                                            echo form_submit('addproducts', 'Add Product', array('class'=>'btn btn-success btn-sm form-control','id'=>'submit-btn')); 
                                        ?>
                                        <button type="button" class="btn btn-danger btn-sm cancel-edit hidden">Cancel</button>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                            <?php echo form_close();?>
                            <div class="d-none" id='get_content'>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">Product Price<span class="text-danger">*</span> </label>
                                        <div class="col-sm-12 col-md-4">
                                            <?php echo form_input(array('type'=>'number','step'=>'0.01','name'=>'variant_price[]','id'=>'variant_price','min'=>'0.00','value'=>'0.00','class'=>'form-control','required'=>'true'));?>
                                        </div> 
                                        <label class="col-sm-12 col-md-2 col-form-label">Product(Already in stock)<span class="text-danger">*</span> </label>
                                        <div class="col-sm-12 col-md-4">
                                            <?php echo form_input(array('type'=>'number','step'=>'1.00','name'=>'variant_stock_qty[]','id'=>'variant_stock_qty','min'=>'0.00','class'=>'form-control','required'=>'true','value'=>'1'));?>
                                        </div> 
                                    </div>                                 
                                    <!--</div>-->
                                    <!--<div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">Variant Stock Hold Qty<span class="text-danger">*</span> </label>
                                        <div class="col-sm-12 col-md-4">
                                            <?php //echo form_input(array('type'=>'number','step'=>'1.00','name'=>'variant_stockhold_qty[]','id'=>'variant_stockhold_qty','min'=>'0','class'=>'form-control','required'=>'true'));?>
                                        </div> 
                                        <label class="col-sm-12 col-md-2 col-form-label">Varaint in Stock Qty<span class="text-danger">*</span> </label>
                                        <div class="col-sm-12 col-md-4">
                                            <?php //echo form_input(array('type'=>'number','step'=>'1.00','name'=>'variant_stock_qty[]','id'=>'variant_stock_qty','min'=>'0','class'=>'form-control','required'=>'true'));?>
                                        </div>
                                    </div>-->
                                    <div class="form-group row">                                        
                                        <label class="col-sm-12 col-md-2 col-form-label">Product Discount(%)</label>
                                        <div class="col-sm-12 col-md-4">
                                            <?php echo form_input(array('type'=>'number','step'=>'1.00','name'=>'discount[]','id'=>'discount','min'=>'0','max'=>'50','class'=>'form-control','value'=>'0'));?>
                                        </div>                                      
                                    </div>
                                    <div class='row'>
                                        
                                    </div> 
                                    
                                    <br/><hr/>
                                 </div>
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
        $('#lowcat_id').select2({
            placeholder: {
                id: '', // the value of the option
                text: '-- Select Multiple Low Category --'
            }
        });
        $('#subcat_id').select2({
            placeholder: {
                id: '', // the value of the option
                text: '-- Select Multiple Sub Category --'
            }
        });
        // $('#flavor_id').select2({
        //     placeholder: {
        //         id: '', // the value of the option
        //         text: '-- Select Multiple Flavor --'
        //     }
        // });
        $('#quantity_id').select2({
            placeholder: {
                id: '', // the value of the option
                text: '-- Select Multiple Quantity Variant --'
            }
        });
        // $('#shape_id').select2({
        //     placeholder: {
        //         id: '', // the value of the option
        //         text: '-- Select Multiple Available Shapes --'
        //     }
        // });
        // $('#cream_id').select2({
        //     placeholder: {
        //         id: '', // the value of the option
        //         text: '-- Select Multiple Available Cream --'
        //     }
        // }); 
        // $('#addonmenu_id').select2({
        //     placeholder: {
        //         id: '', // the value of the option
        //         text: '-- Select Multiple Add On Menu Option --'
        //     }
        // });
        // $('#egger_id').select2({
        //     placeholder: {
        //         id: '', // the value of the option
        //         text: '-- Select Multiple Product Property --'
        //     }
        // });
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
                    console.log(data);
                    $('#subcat_id').html(data.subcat);
                    //$('#lowcat_id').html(data.lowcat);
                    //$('#flavor_id').html(data.flavor);
                    $('#quantity_id').html(data.quantity);
                    $('#egger_id').html(data.egger);
                    //$('#shape_id').html(data.shape);
                    //$('#cream_id').html(data.cream);
                    //$('#addonmenu_id').html(data.addonmenu);
                }
            })
        });

        $('body').on('change','#subcat_id',function(){
            var catid = $('#maincat_id').val();
            var subcat = $(this).val();
            $.ajax({
                url: "<?php echo base_url('admin/product/ajax_getlowcategory');?>",
                method: "POST",
                async:false,
                data: { subcat:subcat,catid:catid },
                dataType: "json",
                success :function(data){                   
                    $('#lowcat_id').html(data.lowcat);                   
                }
            })
        });

        $('body').on('change','#quantity_id',function(){
            var variant = $(this).val();
            console.log(variant);
            var modelentry = $('#get_content').html();
            $('#set_content').html(''); 
            $.ajax({
                url: "<?php echo base_url('admin/product/ajax_calvariant');?>",
                method: "POST",
                async:false,
                data: { variant:variant },
                dataType: "json",
                success :function(list){                     
                    if(list == 0){
                        $('#set_content').addClass('hidden');
                    }else{
                        for(var i=0;i<list;i++){                
                            $('#set_content').append(modelentry);
                        }                       
                        $('#set_content').removeClass('hidden'); 
                    }                                     
                }                
            })                       
        });	
    });
</script>