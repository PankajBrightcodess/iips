<section class="content">
     <div class="container-fluid">
          <div class="row">
               <div class="col-md-12">
                    <div class="card">
                         <div class="card-header with-border bg-primary">
                              <div class="card-title"><?php echo ""; ?></div>
                         </div>
                         <div class="card-body flora">
                              <form action="<?php echo base_url('adminpanel/inventory/savepurchase');?>" method="POST">
                              <div class="row">
                                   <label class="col-sm-12 col-md-1 col-form-label">Date <span class="text-danger">*</span></label>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                             <input type="date" name="date" id="date" value="<?php echo date('Y-m-d')?>" max="<?php echo date('Y-m-d');?>" class="form-control" required>
                                        </div>
                                   </div>
                                   <label class="col-sm-12 col-md-1 col-form-label">Invoice </label>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                             <input type="text" name="invoice" id="invoice"  class="form-control" placeholder="Enter Invoice No!" required >
                                        </div>
                                   </div>
                                   <label class="col-sm-12 col-md-1 col-form-label">Time </label>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                             <input type="text" name="time" id="time" value="<?php echo date('H:i') ;?>" class="form-control" readonly style="cursor:not-allowed;">
                                        </div>
                                   </div>
                                   <div class="clearfix"></div>
                              </div>
                              <div class="row">
                                   <label class="col-sm-12 col-md-1 col-form-label">Supplier <span class="text-danger">*</span></label>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                             <select class="form-control" name="supplier_id" id="supplier_id" required='true'>
                                                  <option value=''> Select Supplier </option> 
                                                  <?php 
                                                  if(is_array($supplier)){
                                                       foreach($supplier as $data){
                                                  ?>
                                                  <option value="<?php echo $data['id'] ;?>"><?php echo $data['name'] ;?></option>
                                                  <?php 
                                                       }
                                                  }?>                                               
                                             </select>
                                        </div>
                                   </div>
                                   <label class="col-sm-12 col-md-1 col-form-label"> Mobile <span class="text-danger">*</span></label>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                        <input type="text" name="mobile" id="mobile" placeholder="Mobile" class="form-control" readonly style="cursor: not-allowed;">
                                        </div>
                                   </div>
                                   <label class="col-sm-12 col-md-1 col-form-label"> Way-Bill No<span class="text-danger">*</span></label>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                        <input type="text" name="waybill" value="<?php echo"bf/".date('m/d')."/".mt_rand(1000,10000).date('s'); ?>" class="form-control"  readonly>	
                                        </div>
                                   </div>
                                   <div class="clearfix"></div>
                              </div>
                              <div class="row">
                                   <div class="col-md-12"><hr></div>
                              </div>
                              <div class="row">	
                                   <div class="col-md-1"></div>
                                   <div class="col-md-2">
                                        <div class="form-group">
                                             <label for="product_id">Product(Item) <span class="text-danger">*</span></label>
                                             <select name="" id="product_id" class="form-control" > 
                                                  <option value=""> Select Product </option>  
                                                  <?php 
                                                  if(is_array($product)){
                                                       foreach($product as $data){
                                                  ?>
                                                  <option value="<?php echo $data['id'] ;?>"><?php echo $data['product_name'] ;?></option>
                                                  <?php 
                                                       }
                                                  }?>                                                 
                                             </select>
                                             <input type="hidden" id="pcode"  class="form-control">
                                        </div>
                                   </div>
                                   <div class="col-md-2">
                                        <div class="form-group">
                                             <label for="uom"> Variant <span class="text-danger">*</span> </label>
                                             <select name="variant_id" id="variant_id" class="form-control" > 
                                                  <option value=""> Select Varient </option>  
                                                                                               
                                             </select>
                                        </div>
                                   </div>
                                   <div class="col-md-2">
                                        <div class="form-group">
                                             <label for="rate"> Rate <span class="text-danger">*</span></label>
                                                  <input type="text" name="" id="rate"  max=''  class="form-control" placeholder="Enter Rate!">
                                        </div>
                                   </div>
                                   <div class="col-md-2">
                                        <div class="form-group">
                                             <label for="gst"> GST Rate(%) <span class="text-danger">*</span></label>
                                             <select id="gst" class="form-control"> 
                                                  <option value=""> Select Gst </option>  
                                                  <?php 
                                                  if(is_array($gst)){
                                                       foreach($gst as $data){
                                                  ?>
                                                  <option value="<?php echo $data['rate'] ;?>"><?php echo $data['gst_name'] ;?></option>
                                                  <?php 
                                                       }
                                                  }?>                                                 
                                             </select>    
                                        </div>
                                   </div>
                                   <div class="col-md-2">
                                        <div class="form-group">
                                             <label for="quantity"> Quantity <span class="text-danger">*</span></label>
                                                  <input type="text" name="" id="quantity"  class="form-control" placeholder="Enter Quantity!" >
                                        </div>
                                   </div>
                                   <div class="col-md-1 text-center">
                                        <div class="form-group pt-10 mt-10">
                                             <input type="button" class="btn btn-primary btn-sm" name="" id="addbutton" value="Add" style="font-size:16px;">
                                        </div>
                                   </div>
                                   <div class="clearfix"></div>
                              </div>
                              <div class="row">                                
                                   <div class="col-md-3"></div>
                                   <div class="col-md-3"></div>
                                   <div class="clearfix"></div>
                              </div>
                              <div class="row pt-2">
                                   <div class="col-md-12" id="purchase_table">
                                        <?php 
                                                  $this->load->view('adminpanel/inventory/temp_table');
                                             ?>
                                   </div>
                                   <div class="clearfix"></div>
                              </div>
                              <div class="row">
                                   <div class="col-md-12">
                                        <hr>
                                   </div>
                                   <div class="clearfix"></div>
                              </div>
                              <div class="row">
                                   <div class="col-md-3">
                                        <div class="form-group">
                                             <label for="gross_amt"> Gross Amount </label>
                                                  <input type="text" name="gross_amt" id="gross_amt"  class="form-control" readonly style="cursor: not-allowed;">
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                             <label for="round"> Round Off </label>
                                                  <input type="text" name="round" id="round"  class="form-control" readonly style="cursor: not-allowed;">
                                        </div>
                                   </div>
                                   <div class="col-md-3">
                                        <div class="form-group">
                                             <label for="total"> Total Amount </label>
                                                  <input type="text" name="total" id="total"  class="form-control" readonly style="cursor: not-allowed;">
                                        </div>
                                   </div>
                                   <div class="col-md-3 text-center pt-10 mt-10">
                                        <input type="submit" class="btn btn-primary btn-sm" name="purchase" value="Save Purchase" style="font-size:16px;">
                                   </div>
                                   <div class="clearfix"></div>
                              </div>
                         </form>
                         </div>
                    </div>
               </div>
          </div>
     </div>    
</section>
<script>
$(document).ready(function(){

     $('#supplier_id').change(function(){
          var supplier = $(this).val();
          $.ajax({
               url:"<?php echo base_url('admin/inventory/getmobile')?>",
               method:"POST",
               data:{supp_id:supplier},
			   dataType:"JSON",
               success:function(data){
				   console.log(data);
                    $('#mobile').val(data['mobile']);
               }
          });
     });
	 $('#product_id').change(function(e){
		 var product_id=$(this).val();
		 $.ajax({
			 url:"<?php echo base_url('admin/inventory/get_pcode')?>",
			 method:"POST",
			 data:{id:product_id},
			 //dataType:"JSON",
			 success: function(data)
			 { $('#pcode').val(data);
				 }
			 });
		 
		 
		 });
		  $('#product_id').change(function(e){
		 var product_id=$(this).val();
		 $.ajax({
			 url:"<?php echo base_url('admin/inventory/get_varients')?>",
			 method:"POST",
			 data:{id:product_id},
			 //dataType:"JSON",
			 success: function(data)
			 {
				
				 $('#variant_id').html(data);
				 }
			 });
		 
		 
		 });
		 $('#variant_id').change(function(e){
		 var product_id=$('#product_id').val();
		 var variant_id=$(this).val();
		 $.ajax({
			 url:"<?php echo base_url('admin/inventory/get_rate')?>",
			 method:"POST",
			 data:{id:product_id,variant_id:variant_id},
			 //dataType:"JSON",
			 success: function(data)
			 {
				
				 $('#rate').attr('max',data);
				
				 }
			 });
		 
		 
		 });
		
		$('#rate').keyup(function(){
			var rate=$(this).val();
			
			var max=$('#rate').attr("max");
			if(Number(rate)>Number(max))
			{
				alert("Rate Cannot Be Greater Than MRP"+max);
				
				}
			
			});

     $('#addbutton').click(function(){
		 var pcode=$('#pcode').val();
          var items = $('#product_id').val();
          var variant_id = $('#variant_id').val();
          var rate = $('#rate').val();
          var gst = $('#gst').val();
          var quantity = $('#quantity').val();
          
          if(items == '0' || items==''){
               alert('Please Select A Product For Purchase');
               return false;
          }
          if(variant_id == '0' || variant_id == ''){
               alert('Please Select Varient For Purchase');
          }
          if(rate =='0' || rate==''){
               alert('please Enter Rate For Purchase');
               return false;
          }
          if(gst == '0' || gst == ''){
               alert('Please Enter GST For Purchase');
               return false;
          }
          if(quantity == '0' || quantity == ''){
               alert('Please Enter Quantity For Purchase');
               return false;
          }
		 // console.log(pcode);
          $.ajax({
               url :"<?php echo base_url('admin/inventory/tempdata')?>",
               method:"POST",
               data:{items:items,quantity:quantity,rate:rate,variant_id:variant_id,gst:gst,pcode:pcode},
               success:function(data){
				    // console.log(data);
                    $('#purchase_table').html(data);
                    var ga =$('#temp_total').val();
                    $('#gross_amt').val(ga);
                  //  console.log(data);
                    resetAmount();
               resetFields();
               }
          });
     });
     resetAmount();

     /******** Rest All fields ********/
     function resetFields(){
          $('#product_id').val('').trigger("change");
          $('#variant_id').val('');
          $('#rate').val('');
          $('#quantity').val('');
          $('#gst').val('');
     }

     /******** Rest Gross Amount ********/
     function resetAmount(){
		var temp_total = parseFloat($('#temp_total').val());
		var ttl = temp_total.toFixed(2);
		$('#gross_amt').val(ttl);
		var total = Math.round(temp_total);
		var round = (total-ttl).toFixed(2);
		$('#total').val(total);
		$('#round').val(round);
     }
     /********  To delete added Purchase ********/
     $('body').on('click','.delete-temp',function(){
          var id=$(this).val();
          $.ajax({
               type:"POST",
               url:"<?php echo base_url('admin/inventory/deletetemp')?>",
               data:{id:id},
               success:function(data){
                    //$('#purchase_table').html(data);
					alert(data);
					location.reload('admin/inventory/add_purchase/');
                    resetAmount();
               }
          });
     });
});
</script>