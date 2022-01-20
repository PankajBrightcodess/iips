<?php //echo PRE; print_r(); ?>
<!doctype html>
<html>
<head>
<title></title>
</head>
<style media="print">

	@page {
			margin:10px 10px;
			size:8.27in 11.69in ;
			height:3508 px;
			width:2480 px;
			size: auto;   auto is the initial value 
			margin:0;   this affects the margin in the printer settings 
			-webkit-print-color-adjust:exact;
	}
	@media print{
		table {page-break-inside: avoid;}
		#button{ display:none;}
	}
		
</style>	
<body>
<div class="container" style="height:10px; background-color:#FFFFFF"></div>
<div clas="container jumbotron" style="background-color:#FFFFFF;">
<div class="row">

<div class="col-md-1"></div>
&nbsp; &nbsp; &nbsp;&nbsp;<div class="col-md-3" style="float:left"><img src="<?php echo file_url();?>assets/images/icon1.png" class="img-responsive" ></div>
<div class="col-md-6"><h1>&nbsp;&nbsp;&nbsp;&nbsp;Company Name</h1>
<span style="margin-left:120px;">

</span>
Company Adress ;jffefwefwefwefwfw
 <br> 
 <span style="margin-left:120px;">
contact +91 98999999999 / 766 88888888</b>

</span>
</div>
</div><!--end of row-->
<br>
<hr style="border:solid">

<div class="col-md-12 table-responsive">
<table class="table" border="1">
<tr>
<td width="30%"><h3>Order Id:</h3><br>
<b>235434343434</b><?php //echo $result['s_name']?></td>
<td rowspan="4"><center><h2><b>Biiling Address</b></h2></center>
<br>

<b style="font-size:18px;">
<p><?php echo $cust['name']?></p> 
<p><?php echo $billing['address']?></p> 
<p><?php echo $billing['district']?></p> 
<p><?php echo $billing['state']?></p> 
<p><?php echo $billing['pincode']?></p> 

</b>
</td>
<td rowspan="4"><center><h3><b>Shipping Address</b></h3></center>
<br>
<b style="font-size:18px;">
<p><?php echo $shipping['custname']?></p> 
<p><?php echo $shipping['address']?></p> 
<p><?php echo $shipping['district']?></p> 
<p><?php echo $shipping['state']?></p> 
<p><?php echo $shipping['pincode']?></p> 
</b>

</td>
<td rowspan="4"><span><b><br></br><br>Keep this invoice <br>and manufacture<br> card for warranty purpose</b>

<br>

</td>
</tr>
<tr>
<td><b style="font-size:18px;">Order Date:<?php echo $billing['added_on'] ?></b></td>

</tr>
<tr>
<td><b style="font-size:18px;">VAT/TIN:4566464646464<?php  ?></b></td>
</tr>

</table>
<hr>

</div>
<div class="col-md-12 table-responsive">
<table class="table table-bordered">
<tr> 
	 <th>Sl.NO</th>
 	<th width="40%"  colspan="2"><center>Product Description</center></th>
 	
 	<th colspan="2">Qty</th>
 	<th colspan="2">Price</th>
  	<th colspan="2">Tax</th>
   	<th colspan="4" width="10%">Total</th>
    </tr>
    
   
    <?php $i=0;$ptotal=0;foreach($list as $rec){$i++;
	$total=0;
	?>
     <tr>
    <td><?php echo $i;?></td>
     <td  colspan="2"><?php echo $rec['p_productname'] ."<br>". $rec['p_pcode'] ."<br>". $rec['order_no']?> </td>
      <td colspan="2"><?php echo $this->amount->toDecimal($rec['p_quantity'])?></td>
       <td colspan="2"><?php echo $this->amount->toDecimal($rec['p_price'] )?></td>
        <td colspan="2"><?php $tax=0; if(! empty($rec['tax'])){echo $this->amount->toDecimal($tax=$rec['tax']);}else{echo $this->amount->toDecimal($tax=0);} ?></td>
         <td colspan="4"><?php  $total=$rec['p_price']+ $tax;echo $this->amount->toDecimal($total); ?></td>
         
         
      </tr>
       <?php $ptotal+=$total; }  ?>
      
    <tr><td width="80%" colspan="11"><b style="font-size:18px;">Total(In Words):<?php strtoupper(numberTowords($ptotal))."only";?></b></td><td width="20%" colspan=""><?php echo $this->amount->toDecimal($ptotal); ?></td></tr>
      <tr height="150px"  >
       <td width="100%" colspan="14">
       <b style="font-size:15px;">
       Terms And Condition<br>
       </b>
        <b style="font-size:15px;">
       1 Payment(s) through this Service may only be made with a Credit Card, Debit card or Net
Banking.<br>
      2.Before using this Service, it is recommended that the user shall make necessary enquiry
about the charges or fees payable against the Credit/Debit card used from Credit Card or
the Debit Card service provider i.e. the respective Bank.<br>
       3.Amount once paid will not be refunded under any circumstances<br>
    </b>
       </td>
       </tr>
       
    
</table>
</div>
</div>
<br><br>
<div id="print"> <center><button type="button" id="button" class="btn btn-danger" onClick="window.print();">print</button></center></div>
</body>
</html>
<script>

</script>
<?php
 function numberTowords($num)
{ 
$ones = array( 
1 => "One", 
2 => "Two", 
3 => "Three", 
4 => "Four", 
5 => "Five", 
6 => "Six", 
7 => "Seven", 
8 => "Eight", 
9 => "Nine", 
10 => "Ten", 
11 => "Eleven", 
12 => "Twelve", 
13 => "Thirteen", 
14 => "Fourteen", 
15 => "Fifteen", 
16 => "Sixteen", 
17 => "Seventeen", 
18 => "Eighteen", 
19 => "Nineteen" 
); 
$tens = array( 
1 => "Ten",
2 => "Twenty", 
3 => "Thirty", 
4 => "Forty", 
5 => "Fifty", 
6 => "Sixty", 
7 => "Seventy", 
8 => "Eighty", 
9 => "Ninety" 
); 
$hundreds = array( 
"Hundred", 
"Thousand", 
"Million", 
"Billion", 
"Trillion", 
"Quadrillion" 
); //limit t quadrillion 
$num = number_format($num,2,".",","); 
$num_arr = explode(".",$num); 
$wholenum = $num_arr[0]; 
$decnum = $num_arr[1]; 
$whole_arr = array_reverse(explode(",",$wholenum)); 
krsort($whole_arr); 
$rettxt = ""; 
foreach($whole_arr as $key => $i){ 
if($i < 20){ 
$rettxt .= $ones[$i]; 
}elseif($i < 100){ 
$rettxt .= $tens[substr($i,0,1)]; 
$rettxt .= " ".$ones[substr($i,1,1)]; 
}else{ 
$rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
$rettxt .= " ".$tens[substr($i,1,1)]; 
$rettxt .= " ".$ones[substr($i,2,1)]; 
} 
if($key > 0){ 
$rettxt .= " ".$hundreds[$key]." "; 
} 
} 
if($decnum > 0){ 
$rettxt .= " and "; 
if($decnum < 20){ 
$rettxt .= $ones[$decnum]; 
}elseif($decnum < 100){ 
$rettxt .= $tens[substr($decnum,0,1)]; 
$rettxt .= " ".$ones[substr($decnum,1,1)]; 
} 
} 
echo $rettxt; 
} 



?>
