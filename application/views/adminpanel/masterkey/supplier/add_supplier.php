<section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                <div class="row">
                    <div class="col-md-8"><?php //echo $title?></div>
                    <div class="col-md-4"><a href="<?php  echo base_url('/admin/masterkey/supplier_list')?>" class="btn btn-primary float-right"> <i class="right fas fa-angle-left" aria-hidden="true"></i> Supplier List</a></div>
                </div>
            </div> 
            <div class="card-body">
                <form action="<?php echo base_url('admin/masterkey/add_supplier_op');?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">                        	
                    <div class="form-group row">
                        <div class="col-md-1"></div>
                        <label class="col-sm-12 col-md-2 col-form-label">Name <span class="text-danger">*</span> </label>
                        <div class="col-sm-12 col-md-8">
                            <input type="text" name="name" value="" id="name" placeholder="Supplier Name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-1"></div>
                        <label class="col-sm-12 col-md-2 col-form-label">Shop Name <span class="text-danger">*</span> </label>
                        <div class="col-sm-12 col-md-8">
                            <input type="text" name="shop_name" value="" id="shop_name" placeholder="Shop Name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-1"></div>
                        <label class="col-sm-12 col-md-2 col-form-label">Mobile <span class="text-danger">*</span> </label>
                        <div class="col-sm-12 col-md-8">
                            <input type="text" name="mobile" value="" id="mobile" placeholder="Mobile" class="form-control" maxlength="10" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-1"></div>
                        <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                        <div class="col-sm-12 col-md-8">
                            <input type="email" name="email" value="" id="email" placeholder="Email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-1"></div>
                        <label class="col-sm-12 col-md-2 col-form-label">GSTIN</label>
                        <div class="col-sm-12 col-md-8">
                            <input type="text" name="gst" value="" id="gst" placeholder="GSTIN" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-1"></div>
                        <label class="col-sm-12 col-md-2 col-form-label">Address</label>
                        <div class="col-sm-12 col-md-8">
                            <textarea name="address" cols="40" rows="3" id="address" placeholder="Address" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-sm-2">
                            <input type="submit" name="addsupplier" value="Add Supplier" class="btn btn-success btn-block btn-sm">
                        </div>
                    </div>
                </form>                   
            </div>        
</section>
   
    