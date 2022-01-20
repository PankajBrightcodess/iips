<div class="container">
<div class="card">
  <div class="card-header bg-primary"><span style="color:#FFFFFF"><?php //echo $title; ?></span>
    <div class="pull-right">
        <a href="<?php echo base_url('/admin/masterkey/supplier/');?>" class="pull-right btn btn-sm btn-warning">
        <i class="fa fa-arrow-left"></i> Back </a> 
    </div> 
  </div>
  <div class="card-body">  
      <table class="display table table-bordered" style="width:100%;" id="table">
        <thead>
            <tr class="bg-info"  style="border:2px solid black; border-color:#0E3EC1;" >
            	<th >#</th>
                <th >GST SLAB</th>
                <th >GST_RATES</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          
           
            <tr>
            	<td><?php //echo $i;?></td>
                <td><?php //echo $list['name'];?></td>
                <td><?php //echo $list['shop_name']; ?></td>
                
                <td>
                    <a href="<?php //echo base_url('inventory/supplier/editsupplier/').md5($list['id']);?>" class="btn btn-sm btn-warning" ><i class="fa fa-edit"></i> Edit</a>
                 </td>
            </tr>
            <?php
                    //}
               // }
            ?>
        </tbody>
    </table>
</div>
    <div class="card-footer"></div>


</div>
  <div class="container"></div> 
<script>
    $(document).ready(function(){
        $('#table').DataTable();
    });
</script>