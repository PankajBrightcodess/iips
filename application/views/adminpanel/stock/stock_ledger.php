<div class="container">
<div class="card">
  <div class="card-header bg-primary"><span style="color:#FFFFFF"><?php echo $title; ?></span>    
  </div>
  <div class="card-body">  
      <table class="display table table-bordered" style="width:100%;" id="table">
        <thead>
            <tr class="bg-info" style="border:2px solid black; border-color:#0E3EC1;">
            	<th >SL.No</th>
            	<th >Date</th>
                <th >Product Name</th>
                <th >Total Qunatity Today</th>
                <th >Consume Qunatity Today</th>
                <th >Openings</th>
              
            </tr>
        </thead>
        <tbody>
        <?php
            if(is_array($product)){$i=0; $total=0;
                foreach($product as $list){$i++;
            ?>
            <tr>
            	<td><?php echo $i;?></td>
                <td><?php echo $list['date'];?></td>
                <td><?php echo $list['productname'];?></td>
               <td>0.00</td>
               <td>0.00</td>
                <td><?php echo $this->amount->toDecimal(abs($list['quantity']));?></td>
               
                
               
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
  <div class="container"></div> 
  <script>
    $(document).ready(function(){
        $('#table').DataTable();
    });
  </script>