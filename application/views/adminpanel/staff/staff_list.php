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
                        <table class="table data-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="no-sort">Name</th>
                                <th>Mobile</th>
                                <th>Address</th>
                                <th>AAdhar</th>
                                <th>D.O.J</th>
                                <th>Designation</th>
                                <th>Salary</th>
                                <th>Picture</th>
                                <th>Action</th>
          
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($details)){ $i=0;
                                foreach($details as $list){$i++;?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $list['name'];?></td>
                                <td><?php echo $list['mobile'];?></td>
                                <td><?php echo $list['address'] ."-". $list['town']."-". $list['district'] ?></td>
                                <td><?php echo $list['aadhar']?></td>
                                 <td><?php echo $list['doj']?></td>
                                  <td><?php echo $list['desg']?></td>
                                   <td><?php echo $list['salary']?></td>
                               <td width='10%'><img src="<?php echo file_url($list['picture']);?>" width='100%' alt='staff_image'/></td>
                               <td align="center"><a href="<?php echo base_url('admin/staff/edit_staff/').$list['id'];?>"><span class="btn btn-sm btn-warning fa fa-info"></span></a> 
                               
                                <button type="button" class="btn btn-info btn-sm fa fa-trash del" value="<?php echo $list['id'];?>"></button></td>
                             
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
      $('body').on('click','.del',function(){
		var del=$(this).val();
		  console.log(del);
		  $.ajax({
			  method:'POST',
			  url:"<?php echo base_url('admin/staff/delete_rec')?>",
			  data:{id:del},
			  success: function(data)
			  {
				 alert(data); 
				 location.reload();
				 }
			  
			  });
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