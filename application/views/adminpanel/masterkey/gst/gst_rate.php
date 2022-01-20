<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header with-border">
                    <div class="card-title"><?php // echo $title ;?> </div>
                </div><!--end of card-header-->
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-md-6">                
                            <form action="<?php echo base_url('admin/masterkey/add_gst_op');?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">                        	
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="col-sm-12 col-md-2 col-form-label">Add Name <span class="text-danger">*</span> </label>
                                    <div class="col-sm-12 col-md-8">
                                        <input type="text" name="gst_name" value="GST-" id="gst_name" placeholder=" Gst Name " class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="col-sm-12 col-md-2 col-form-label">Add Rates(In Decimal) <span class="text-danger">*</span> </label>
                                    <div class="col-sm-12 col-md-8">
                                        <input type="text" name="rate" value="" id="grate" placeholder="Gst rate" class="form-control" required>
                                    </div>
                                </div>
                        
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-sm-2">
                                        <input type="submit" name="add_gst" value="Add Rates" class="btn btn-success btn-block btn-sm">
                                    </div>
                                </div>
                            </form> 
                        </div>
                        <div class="col-md-6">
                            <table class="datatable table table-bordered" style="width:100%;" id="table">
                                <thead>
                                    <tr class="bg-info"  style="border:2px solid black; border-color:#0E3EC1;" >
                                        <th >#</th>
                                        <th >GST SLAB</th>
                                        <th >GST_RATES</th>
                                    <!-- <th>Action</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($details)){
                                    $i=0; foreach($details as $list)
                                    {
                                    ++$i;
                                    ?>
                                
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td><?php echo $list['gst_name'];?></td>
                                        <td><?php echo $list['rate']; ?></td>
                                        
                                    <?php  /*   <td>
                                            <a href="<?php //echo base_url('inventory/supplier/editsupplier/').md5($list['id']);?>" class="btn btn-sm btn-warning" ><i class="fa fa-edit"></i> Edit</a>
                                        </td> */?>
                                    </tr>
                                    <?php
                                            }
                                    }
                                    ?>
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
       $('#table').DataTable();
    });
    </script>