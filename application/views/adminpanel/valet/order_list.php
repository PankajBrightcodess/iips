<div class="container">
<div class="card">
  <div class="card-header bg-primary"><span style="color:#FFFFFF"><?php echo $title; ?></span>    
  </div>
  <div class="card-body">  
      <table class="display table table-bordered" style="width:100%;" id="table">
        <thead>
            <tr class="flora" style="border:2px solid black; border-color:#0E3EC1;">
            	<th >SL.No</th>
                <th>Order No.</th>
            	<th>Date</th>
                <th>Time Slot</th>
                <th >Address</th>
                <th>Pincode</th>
                <th>Valet name</th>
                <th>Delivery rate</th>
                <th>Payment Status</th>
                <th>See Details</th>
               
            </tr>
        </thead>
        <tbody>
        <?php
		//echo PRE;print_r($product);die;
		    if(is_array($product))
			{
				$i=0;
			foreach($product as $list)
			{++$i;
           ?>
            <tr>
            	<td><?php echo $i;?></td>
                <td><?php echo $list['order_no'];?></td>
                <td><?php echo $list['delivery_date'];?></td>
                <td><?php echo $list['time_slot'];?></td>
                <td><?php echo $list['delivery_address'];?></td>
                <td><?php  echo $list['delivery_pincode'];?></td>
                <td><?php echo $list['valet'];?></td>
                <td><?php echo $list['delivery_rate'];?></td>
                <td><?php  if($list['payment_status']=='1'){ echo "Paid"; }else{ echo "DUE";}?></td>
                <td><a href="<?php echo Base_url('admin/valet/order_details/').$list['id']?>"><button class="btn btn-md btn-danger"><i class="fa fa-info"></i></button></a></td>
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