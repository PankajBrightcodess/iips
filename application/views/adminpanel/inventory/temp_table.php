<table class="table table-bordered ">
    <thead>
        <tr class="bg-info text-center">
            <th class="table-plus" id="t-border">Sl No</th>
            <th id="t-border" style="text-align:center">Product</th>
             <th id="t-border" style="text-align:center">P-Code</th>
            <th id="t-border" style="text-align:center">Variant</th>
            <th id="t-border" style="text-align:center">Rate</th>
            <th id="t-border" style="text-align:center">GST</th>
            <th id="t-border" style="text-align:center">Quantity</th>
            <th id="t-border" style="text-align:center">Amount</th>
            <th id="t-border" class="datatable-nosort" width="5%">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
	$i=0;$total=0;
	
       if(is_array($temps)){$i=0; $total=0;
            foreach($temps as $temp){$i++;
			
        ?>
        <tr bgcolor="#FFFFFF">
            <td style="color:#000" class="table-plus"><?php echo $i; ?></td>
            <td style="color:#000" ><?php echo $temp['product_name']; ?></td>
            <td style="color:#000" ><?php echo $temp['pcode']; ?></td>
            <td style="color:#000" ><?php echo $temp['vname'] ?></td>
            <td style="color:#000" ><?php echo $temp['rate']; ?></td>
            <td style="color:#000" ><?php echo $temp['gstvalue']; ?></td>
            <td style="color:#000" ><?php echo $temp['quantity']; ?></td>
            <td style="color:#000" ><?php echo $temp['amount']; ?></td>
            <td >
                <button type="button" class="btn btn-SM btn-danger delete-temp " value="<?php echo $temp['id']; ?>"><i class="fa fa-trash"></i></button>
            </td>
        </tr>
        <?php
            $total+=$temp['amount'];
           }
        }
        ?>
        <input type="hidden" id="temp_total" value="<?php echo $total;?>">
    </tbody>
</table>
