<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header with-border">
                    <div class="card-title"><?php // echo $title ;?> </div>
                </div>
                <div class="card-body">  
                    <div class="row">
                        <div class="col-md-6">
                            <form action="<?php echo base_url('admin/masterkey/add_unit_op');?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">                        	
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="col-sm-12 col-md-2 col-form-label">Add Unit Name <span class="text-danger">*</span> </label>
                                    <div class="col-sm-12 col-md-8">
                                        <input type="text" name="unit_name"  id="unit_name" placeholder=" Enter Unit " class="form-control" required>
                                    </div>
                                </div>
                                
                            
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-sm-2">
                                        <input type="submit" name="add_unit" value="Add Units" class="btn btn-success btn-block btn-sm">
                                    </div>
                                </div>
                            </form> 
                        </div> <!--end of card body-->                 
                        <div class="col-md-6">
                            <div class="card-body">  
                                <table class="datatable table table-bordered" style="width:100%;" id="table">
                                    <thead>
                                        <tr class="bg-info"  style="border:2px solid black; border-color:#0E3EC1;" >
                                            <th >#</th>
                                            <th>Unit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(is_array($details))
                                    {
                                        $i=0;  foreach($details as $rec){++$i;
                                    
                                    ?>
                                    
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo strtoupper($rec['unit_name']);?></td>
                                            
                                            <td>
                                                <a href="<?php echo base_url('admin/masterkey/edit_uom/').$rec['id'];?>" class="btn btn-sm btn-warning" ><i class="fa fa-edit"></i> Edit</a>
                                            </td>
                                        </tr>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div> <!--end of card body-->                 
                        </div>
                    </div>      
                </div>
            </div>
        </div>
    </div>        
</section>
<script>
$(document).ready(function(e) {
    $('#table').DataTable();
});
</script>