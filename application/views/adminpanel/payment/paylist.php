<div class="container">
<div class="card">
  <div class="card-header bg-primary"><span style="color:#FFFFFF"><?php echo $title; ?></span>    
  </div>
  <div class="card-body table-responsive">  
      <table class="display table table-bordered" style="width:100%;" id="table">
        <thead>
            <tr class="flora" style="border:2px solid black; border-color:#0E3EC1;">
            	<th >SL.No</th>
            	<th >Date</th>
                <th >Waybill No</th>
                <th >Invoice No</th>
                <th>Supplier</th>
          	   <th >Mobile</th> 
                <th >Total</th>
                <th >Paid Amount</th>
                 <th >Due Amount</th>
                <th >Paid mode</th>
                 <th >Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if(is_array($details))
			{
				$i=0;
			foreach($details as $list)
			{
				$sid=$list['supplier_id'];
				++$i;
           ?>
            <tr>
            	<td><?php echo $i;?></td>
                 <td><?php echo $list['date'];?></td>
                  <td><?php echo $list['waybill'];?></td>
                   <td><?php echo $list['invoice'];?></td>
                    <td><?php $sup=$this->Inv_model->selectbyquery1("gd_inventory_supplier","`id`='".$list['supplier_id']."'"); echo $sup['name'];?></td>
                     <td><?php echo $list['s_mobile'];?></td>
                      <td><?php echo $list['total'];?></td>
                <td><?php echo $list['pay'];?></td>
                <td><?php echo $list['due'];?></td>
                <td><?php echo $list['type'];?></td>
                 <td><?php  if($list['status']==1)echo "PAID";else echo "Pending";?></td>
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