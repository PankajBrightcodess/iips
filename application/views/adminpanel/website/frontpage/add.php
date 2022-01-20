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
                                        <th class="no-sort">Image</th>                                        
                                        <th class="no-sort">Select Show Design</th>
                                        <th class="no-sort">Publish Status</th>
                                        <th class="no-sort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($categorylist)){ $i=0;
                                        foreach($categorylist as $list){
                                        $products = $this->Master_model->getall_productdata(array('t1.cat_id'=>$list['id'],'t1.parent'=>'0','t1.publish_status'=>'1'),'all');
                                        $subcat = $this->Master_model->getall_subcategory(array('t1.status'=>'1','t1.type'=>'simple','cat_id'=>$list['id']),'all');
                                        $subcatoption = array(''=>'-- Select Subcategory --');
                                        foreach($subcat as $sub){
                                            $subcatoption[$sub['id']] = $sub['name'];
                                        }
                                        if(!empty($products)){ $i++;
                                            $saveddata = $this->Master_model->check_catdesign($list['id']);
                                            if($saveddata == false){
                                        ?>
                                <tr>
                                    <form action='<?php echo base_url('adminpanel/website/save_webdesign');?>' method="POST">
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $list['name'];?></td>                                    
                                    <td width='20%'><img src="<?php echo file_url($list['image_path']);?>" width='100%' alt='cat_image'/></td>                                    
                                    <td>
                                        <?php 
                                        $design = array('-'=>'-- Select Design --','showproducts'=>'Show Category Products','show_four_subcat'=>'Show Four Subcategory','show_five_subcat'=>'Show Five Subcategory'); 
                                        //$design = array('-'=>'-- Select Design --','showproducts'=>'Show Category Products'); 
                                        echo form_dropdown(array('name'=>'design_type','class'=>'form-control design_type'),$design); 
                                        echo form_hidden('id',"$list[id]"); 
                                        echo form_dropdown(array('name'=>'subcat[]','class'=>'form-control subcat_entry','multiple'=>'multiple'),$subcatoption);
                                        ?>
                                    </td>
                                    <td>
                                    <label class="switch">
                                        <input type="checkbox" class="my_checker_2 check" name='publish_status' <?php //if($designdata == false){echo '';}elseif($designdata['publish_status'] == '1'){echo 'checked';} ?>>
                                        <span class="slider round"></span>
                                    </label>
                                    </td>
                                    <td>
                                        <button class="btn btn-success">Save</button>                                        
                                    </td>
                                    </form>
                                </tr>
                                <?php }else{?>
                                <tr>
                                    <form action='<?php echo base_url('adminpanel/website/save_webdesign');?>' method="POST">
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $list['name'];?></td>                                    
                                    <td width='20%'><img src="<?php echo file_url($list['image_path']);?>" width='100%' alt='cat_image'/></td>                                    
                                    <td>
                                        <?php 
                                        $design = array('-'=>'-- Select Design --','showproducts'=>'Show Category Products','show_four_subcat'=>'Show Four Subcategory','show_five_subcat'=>'Show Five Subcategory'); 
                                        //$design = array('-'=>'-- Select Design --','showproducts'=>'Show Category Products'); 
                                        echo form_dropdown(array('name'=>'design_type','class'=>'form-control design_type'),$design,$saveddata['design_type']); 
                                        echo form_hidden('id',"$list[id]"); 
                                        if($saveddata['design_type'] != 'showproducts'){
                                            $s_subcat = json_decode($saveddata['subcat_id']);                                            
                                            echo form_dropdown(array('name'=>'subcat[]','class'=>'form-control','multiple'=>'multiple'),$subcatoption,$s_subcat[0]);
                                        }
                                        ?>
                                    </td>
                                    <td>
                                    <label class="switch">
                                        <input type="checkbox" class="my_checker_2 check" name='publish_status' <?php if($saveddata['publish_status'] == false){echo '';}elseif($saveddata['publish_status'] == '1'){echo 'checked';} ?>>
                                        <span class="slider round"></span>
                                    </label>
                                    </td>
                                    <td>
                                        <button class="btn btn-success">Save</button>                                        
                                    </td>
                                    </form>
                                </tr>
                                <?php  } } }
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

        $('.subcat_entry').select2({
            placeholder: {
                id: '', // the value of the option
                text: '-- Select Multiple Sub Category --'
            }
        });

        $('.subcat_entry').hide();
        $('.select2').hide();

        // $('.my_checker').change(function(){
        //     var pid = $(this).val();   
        //     var status = $(this).is(':checked'); 
        //     //console.log(status);
            
        //     if(status == true){
		// 		var prompt = confirm('Please Confirm Do You Really Want to Plublish Category In Grid');
		// 	}
		// 	else if(status == false){
		// 		var prompt = confirm('Please Confirm Do You Really Want to Unpublish Category In Grid');
        //     }
        //     if(prompt){
        //         $.ajax({
		// 			url:"<?php echo base_url('admin/website/publish_categorygrid');?>",
		// 			method:"POST",
		// 			data:{id:pid,status:status},
		// 			success:function(data){
		// 				location.reload();
		// 			}
		// 		});
        //     }else{
        //         if(status){
		// 			$(this).prop('checked',false);	
		// 		}else{
		// 			$(this).prop('checked',true);
		// 		}
		// 		return false;
        //     }
        // });

        $('.my_checker_2').change(function(){
              
            var status = $(this).is(':checked');                       
            if(status == true){
				var prompt = confirm('Please Confirm Do You Really Want to Publish Category');
			}else if(status == false){
				var prompt = confirm('Please Confirm Do You Really Want to Unpublish Category');
            }
                        
            if(status){
                $(this).val('1');	
            }else{
                $(this).val('0');
            }
            return false;
            
        });

        $('.design_type').change(function(){
            var design = $(this).val();
            var pid = $(this).data('pid');
            //console.log(pid);
            if(design != '-'){
                if(design != 'showproducts'){
                    $(this).closest('tr').find('.subcat_entry').show();
                    $(this).closest('tr').find('.select2').show();
                    //alert('as');
                }else{
                    $(this).closest('tr').find('.subcat_entry').hide();
                    $(this).closest('tr').find('.select2').hide();
                }
            }else{
                alert('Please Select A Proper Option !!');
                $(this).val('showproducts');
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