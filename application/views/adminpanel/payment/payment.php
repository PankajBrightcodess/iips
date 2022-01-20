<section class="content">
    <div class="container-fluid">
        <div class="row">
        	<div class="col-md-12">
            	<div class="card">
                	<div class="card-header with-border bg-primary">
                    	<div class="card-title"><?php echo $title?></div>
                 
                    </div>
                    <div class="card-body flora"><hr><!-- row for the top part to add button -->
    					<form action="<?php echo base_url('admin/payment/make_payment');?>" method="POST">
                        
                          <div class="row">
                          		
                          	  	<label class="col-sm-12 col-md-1 col-form-label">Date <span class="text-danger">*</span></label>
                             	<div class="col-md-3">
                                  	<div class="form-group">
                                       <input type="date" name="date" id="date" value="<?php echo date('Y-m-d') ?>"  class="form-control" required="">
                                   </div>
                                </div>
                                	<label class="col-sm-12 col-md-1 col-form-label">Waybill<span class"text-danger">*</span></label> 				  <div class="col-md-3">
                                     <div class="form-group">
                                            <input type="text" class="form-control" name="waybill" value="<?php echo "sb/".date('m')."/"?>" id="waybill" required>
                                      </div>
                                </div>
                                	<label class="col-sm-12 col-md-1 col-form-label">Invoice<span class="text-danger">*</span></label>
                             	<div class="col-md-3">
                                  	<div class="form-group">
                                       <input type="text" name="invoice" id="invoice"   class="form-control" required="">								<span id="result"></span>
                                   </div>
                                </div>
                             
                                 <div class="clearfix"></div>
                                </div>
                                <div class="row">
                                <div class="col-md-2"></div>
                                <label class="col-sm-12 col-md-1 col-form-label">Name<span class"text-danger">*</span></label>
                                <div class="col-md-3">
                                     <input type="text"  id="supplier" class="form-control" disabled>
                                      <input type="hidden"  name="supplier_id" id="supplier_id" class="form-control">
                                   
                                </div>
                                <div class="clearfix"></div>
                           </div>
                           <div class="row">
                           		<div class="col-md-2"></div>
                                <label class="col-sm-12 col-md-1 col-form-label"> Mobile <span class="text-danger">*</span></label>
                                <div class="col-md-3">
                                     <div class="form-group">
                                                <input type="text" name="s_mobile" id="mobile" class="form-control" readonly style="cursor: not-allowed;">
                                      </div>
                                </div>
                                <label class="col-sm-12 col-md-1 col-form-label"> Type </label>
                                <div class="col-md-3">
                                     <div class="form-group">
                                     	<select name="type" id="type" class="form-control" required>
                                        	<option value="">Select Payment Type</option>
                                            <option value="cash"> Cash </option>
                                            <option value="credit"> Credit </option>
                                        </select>	
                                     </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><hr></div>
                            </div>
                            <div class="row">
                            	<div class="col-md-2"></div>
                                <label class="col-sm-12 col-md-1 col-form-label"> Total Dues </label>
                                <div class="col-md-3">
                                     <div class="form-group">
                                             <input type="text" name="total" id="total"  class="form-control" readonly style="cursor: not-allowed;">
                                      </div>
                                </div>
                               <label class="col-sm-12 col-md-1 col-form-label"> Pay Dues </label>
                                <div class="col-md-3">
                                     <div class="form-group">
                                             <input type="text" name="pay" id="pay"  class="form-control" placeholder="Pay Dues Amount!" max="">
                                      </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                            	<div class="col-md-2"></div>
                                <label class="col-sm-12 col-md-1 col-form-label"> Dues </label>
                                <div class="col-md-3">
                                     <div class="form-group">
                                             <input type="text" id="due_amt"   name="due" class="form-control" readonly style="cursor: not-allowed;" >
                                      </div>
                                </div>
                                <div class="col-md-3 text-center">
                                   <input type="submit" class="btn btn-primary" name="payment" value=" Make Payment" style="font-size:16px;">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                       </form>
        			</div>
                    <div class="card-footer">
                     <div class="col-md-12 table-responsive">
                        <table class="table data-table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="no-sort">Date</th>
                                <th>Waybill</th>
                               <th>Invoice</th>
                                <th>Payment Mode</th>
                                <th>Total Amount</th>
                                <th>Paid Amount</th>
                                <th>Due Amount</th>
          
                            </tr>
                        </thead>
                         <tbody class="flora text-dark" id="mytable">
                           
                        </tbody>
                        </table>
                    
                    </div>
               	</div>
         	</div>
       	</div>
    </div>    	
</section>
    <script>
    $(document).ready(function(e) {
			
			$('#pay').keyup(function(){
			var total=$('#total').val();
			var pay=$('#pay').val();
			if(pay>total){alert("INVALID AMOUNT")}
			var due=parseInt(total)-parseInt(pay);
			$('#due_amt').val(due);			
				});
	
	$('#pay').keyup(function(){
        var total = Number($('#total').val());
        var pay = Number($('#pay').val());
        if(pay > total){
            alert("Payment cannot be more than Total !");
            return false;
        }
    });	
		
		
		
       $('#waybill').keyup(function(){
			var waybill =$(this).val();
			console.log(waybill)
			$.ajax({
				type:'post',
				url:'<?php echo base_url('admin/payment/get_invoice_details')?>',
				data:{waybill: waybill},
				dataType:'JSON',
				success:function(data)
				{
					//console.log(data);
					$('#invoice').val(data['invoice']);
					$('#mobile').val(data['mobile']);
					$('#total').val(data['total']);
					$('#due_amt').val(data['due_amt']);
					$('#supplier_id').val(data['supplier_id']);
					$('#supplier').val(data['supplier']);					
				
					//console.log(data)
				}
			})
		});
	$('#waybill').keyup(function(){
			var waybill =$(this).val();
			console.log(waybill)
			$.ajax({
				type:'post',
				url:'<?php echo base_url('admin/payment/get_payment_table')?>',
				data:{waybill: waybill},
				//dataType:'JSON',
				success:function(data)
				{
					//console.log(data);					
				$('#mytable').html(data);
					//console.log(data)
				}
			})
		});
	
    });
    
    </script>