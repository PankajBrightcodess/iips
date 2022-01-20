<div class="container">
<div class="card">
  <div class="card-header bg-primary"><span style="color:#FFFFFF"><?php echo $title; ?></span> 
   <div class="pull-right">
                        <a href="<?php echo base_url('/admin/stock/stock_out');?>" class="float-right btn btn-sm btn-warning">
                        <i class=""></i> Back</a> 
                    </div>   
  </div>
  <div class="card-body">  
      <table class="display table table-bordered" style="width:100%;" id="table">
        <thead>
            <tr class="flora" style="border:2px solid black; border-color:#0E3EC1;">
            	<th >SL.No</th>
            	<th >Date</th>
                <th >Product Name</th>
                <th >Variant</th>
                <th >Product Code/th>
                <th >Person Name</th>
                <th >Quantity</th>
                <th >Remarks</th>
                <th >Stock Type</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if(is_array($product))
			{
				$i=0;
			foreach($product as $list)
			{
				++$i;
           ?>
            <tr>
            	<td><?php echo $i;?></td>
                <td><?php echo $list['made_on'];?></td>
                <td><?php $product=$this->Inv_model->selectbyquery1("gd_product","`id`='".$list['pid']."'"); echo ucfirst($product['product_name']);?></td>
                 <td><?php $products=$this->Inv_model->selectbyquery1("gd_variant","`id`='".$list['variant_id']."'"); echo $products['name'];?></td>
                  <td><?php echo $list['pcode'];?></td>
                <td><?php echo $list['stock_type'];?></td>
                <td><?php echo $this->amount->toDecimal(abs($list['quant']));?></td>
               
                <td><?php  echo  $list['remark'];?></td>
                <td><?php echo $list['stock_type'];?></td>
            </tr>
            <?php
                }
           }
            ?>
        </tbody>
    </table>
</div>
    <div class="card-footer"></div>

</div>
</div>
  <div class="container"></div> 
  <script>
    $(document).ready(function(){
        $('#table').DataTable();
    });
  </script>