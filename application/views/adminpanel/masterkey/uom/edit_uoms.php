<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header with-border bg-primary">
                    <div class="card-title"><?php // echo $title ;?> </div>
                </div><!--end of card-header-->
                <div class="card-body">          
                    <div class="col-md-6" style="float:left">
                        <form action="<?php echo base_url('admin/masterkey/update_uom/').$select['id']?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">                        	
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="col-sm-12 col-md-2 col-form-label">Add Unit Name <span class="text-danger">*</span> </label>
                                <div class="col-sm-12 col-md-8">
                                    <input type="text" name="unit_name"  id="unit_name" value=" <?php echo $select['unit_name']?>" placeholder=" Enter Unit " class="form-control" required>
                                </div>
                            </div>
                        
                    
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-sm-2">
                                    <input type="submit" name="update_unit" value="Update" class="btn btn-success btn-block btn-sm">
                                </div>
                            </div>
                        </form> 
                    </div>                 
                </div>
            </div>
        </div>
    </div>
</section>