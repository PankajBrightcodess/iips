<div class="container">
<div class="card">
  <div class="card-header bg-primary"><span style="color:#FFFFFF"><?php echo $title; ?></span>    
  </div>
  <div class="card-body">  
      <table class="display table table-bordered" style="width:100%;" id="table">
        <thead>
            <tr class="flora" style="border:2px solid black; border-color:#0E3EC1;">
            	<th >SL.No</th>
            	<th >Order No</th>
                <th >Product Name</th>
              
                <th >Quantity(IN)</th>
            	 <th>Variant</th>
                <th >PCODE</th>
                <th >Price</th>
            </tr>
        </thead>
        <tbody>
        <?php
		
		    if(is_array($product))
			{
				$i=0;
			foreach($product as $list)
			{++$i;
           ?>
            <tr>
            	<td><?php echo $i;?></td>
                <td><?php echo $list['order_no'];?></td>
                <td><?php $product=$this->Inv_model->selectbyquery1("gd_product","`id`='".$list['pid']."'"); echo ucfirst($product['product_name']);?></td>
               
                <td><?php echo  $list['quantity'];?></td>
               <td><?php $variant=$this->Inv_model->selectbyquery1("gd_variant","`id`='".$list['variant_id']."'"); echo  $variant['name'];?></td>
                <td><?php  echo $list['pcode'];?></td>
                <td><?php echo $list['price'];?></td>
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