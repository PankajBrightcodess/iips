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
                        <form action="<?php echo base_url('admin/product/update_product');?>" method='post'> 
                        <h4><?php echo $productdata[0]['product_name'];?></h4><hr/>
                        <table class="table table-bordered">
                            <tr>
                                <th>Product Name</th>
                                <th>Product Code</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>LowCategory</th>
                            </tr>
                            <tr>
                                <td width='25%'>
                                    <?php echo form_input(array('name'=>'product_name','class'=>'form-control','id'=>'product_name','value'=>$productdata[0]['product_name'],'placeholder'=>'Enter Product Name'));?>
                                </td>
                                <td><?php echo $productdata[0]['pcode'];?></td>
                                <td>
                                <?php echo form_dropdown(array('name'=>'cat_id','id'=>"maincat_id",'class'=>'maincat_id form-control'),$maincatoption,$productdata[0]['cat_id']);?>
                                </td>
                                <td>
                                <?php echo form_dropdown(array('name'=>"subcat_id[]",'id'=>"subcat_id",'class'=>'form-control','multiple'=>'multiple'),$subcatoption);?>
                                </td>
                                <td>
                                <?php echo form_dropdown(array('name'=>"lowcat_id[]",'id'=>"lowcat_id",'class'=>'form-control','multiple'=>'multiple'),$lowcatoption);?>
                                </td>
                            </tr> 
                            <tr>
                                <th>Image</th> 
                                <th colspan="4">
                                    Product Description
                                </th>                                                              
                            </tr>
                            <tr>
                                <td width='20%'>
                                    <img src='<?php echo file_url($productdata[0]['path']);?>' alt='<?php echo $productdata[0]['product_name'];?>' width="100%"/>
                                    <?php echo form_upload(array('name'=>"variant_image[]",'class'=>'form-control'));?>
                                </td>
                                <td colspan='5'>                                    
                                    <?php $t = json_decode($productdata[0]['property_id'],true);echo form_hidden("egger_id[]",$t[0]);?>
                                    <?php echo form_hidden('pid',$productdata[0]['id']);?>
                                    <textarea name="desp" id="" class='form-control' cols="30" rows="10" required><?php echo $productdata[0]['desp'];?></textarea>
                                </td>                               
                            </tr> 
                             <?php if(!empty($productdata)){ $productid=0;
                            foreach($productdata as $product){ $productid++;?>
                            <tr>
                                <th>Variant Name</th>                                
                                <th>Variant Price</th>                                
                                <th>Variant Discount (%)</th>                                
                                <th>Variant OfferPrice</th>                                
                            </tr>
                            <tr>
                                <td><h4><?php echo $product['product_name'].' - '.$product['variantname'];?></h4></td>
                                <td>
                                <?php echo form_input(array('type'=>'number','step'=>'0.01','name'=>"variant_price[]",'id'=>'variant_price','min'=>'0.00','class'=>'form-control','value'=>$product['variant_price'],'required'=>'true'));?>
                                </td>
                                <td>
                                <?php echo form_input(array('type'=>'number','step'=>'1.00','name'=>"discount[]",'id'=>'prep_time','min'=>'1','class'=>'form-control','value'=>$product['discount'],'required'=>'true'));?>
                                </td>
                                <td>
                                <?php echo form_hidden('variant_id[]',$product['variant_id']);?>
                                <?php echo form_input(array('type'=>'number','step'=>'1.00','name'=>"variant_offerprice[]",'id'=>'prep_time','min'=>'1','class'=>'form-control','value'=>$product['variant_offerprice'],'required'=>'true','readonly'=>'true'));?>
                                </td>
                            </tr>
                                                                         
                            <?php }
                            }?>                                 
                            
                        </table> 
                        </br>        
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <button class='btn btn-danger form-control'>Update Product</button>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        </form>
                    </div>  
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section> 
    <script>	
    $(document).ready(function(e) {  
        
        $('#subcat_id').select2({
            placeholder: {
                id: '', // the value of the option
                text: '-- Select Multiple Sub Category --'
            }
        });
        $('#lowcat_id').select2({
            placeholder: {
                id: '', // the value of the option
                text: '-- Select Multiple Low Category --'
            }
        });     

        // $('#addonmenu_id_<?php //echo $product['id'];?>').select2({
        //     placeholder: {
        //         id: '', // the value of the option
        //         text: '-- Select Multiple Toppings --'
        //     }
        // });

        $('body').on('change','#maincat_id',function(){
            var catid = $(this).val();
            $.ajax({
                url: "<?php echo base_url('admin/product/ajax_getsubcategory');?>",
                method: "POST",
                async:false,
                data: { catid : catid },
                dataType: "json",
                success :function(data){
                    //console.log(data);
                    
                    $('#subcat_id').html(data.subcat);
                                    
                    //$('#addonmenu_id_<?php echo $product['id'];?>').html(data.addonmenu);                    
                }
            })
        });       	

        $('#maincat_id').trigger('change');
        var subcat = new Array();
        <?php $subcat = json_decode($productdata[0]['subcat_id']);
            if(!empty($subcat)){
                foreach($subcat as $key=>$s){?>
        subcat[<?php echo $key?>] = <?php echo $s; ?>;
        <?php    }
            }
        ?>        

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
        
        $('#subcat_id').val(subcat).trigger('change');
        var lowcat = new Array();
        <?php $lowcat = json_decode($productdata[0]['lowcat_id']);
            if(!empty($lowcat)){
                foreach($lowcat as $key=>$l){?>
        lowcat[<?php echo $key?>] = <?php echo $l; ?>;
        <?php    }
            }
        ?>             
        $('#lowcat_id').val(lowcat);    

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
