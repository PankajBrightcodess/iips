<section class="content">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="card">
                	<div class="card-header with-border">
                    	<div class="card-title"></div>
                       
                    </div>
                    <div class="card-body">
						<form action="<?php echo base_url('admin/staff/update_staff/').$record['id']?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        	<div class="row form-group">
                                <div class="col-md-1"></div>
                                <div class="col-sm-12 col-md-6">
                                	<div class="row form-group">
                                        <label class="col-sm-12 col-md-2 col-form-label">Name <span class="text-danger">*</span></label>
                                        <div class="col-sm-12 col-md-8">
                                            <input type="text" name="name" value="<?php echo $record['name']?>" id="name" placeholder="Name" class="form-control" required="true">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-12 col-md-2 col-form-label">Father's Name <span class="text-danger">*</span></label>
                                        <div class="col-sm-12 col-md-8">
                                            <input type="text" name="father" value="<?php echo $record['father']?>" id="father" placeholder="Father's Name" class="form-control" required="true">
                                        </div>
                                        <label class="col-sm-12 col-md-2 col-form-label">Photo</label>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-12 col-md-2 col-form-label">Date of Birth</label>
                                        <div class="col-sm-12 col-md-8">
                                            <input type="date" name="dob" value="<?php echo $record['dob']?>" id="dob" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label class="col-sm-12 col-md-2 col-form-label">Gender <span class="text-danger">*</span></label>
                                        <div class="col-sm-12 col-md-8">
                                            <select name="gender" class="form-control" required>
<option value="" selected="selected">Select Gender</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">                                    
                                    <div class="col-sm-12 col-md-4">
                                        <div style="width:150px; height:180px; border:1px solid #CCCCCC;" id='imgInp'>
                                            <img src="<?php echo file_url($record['picture']);?>" alt="" id="previewHolder" height="180" width="150">
                                        </div>
                                        <input type="file" name="picture"  id="filePhoto"  onchange="readURL(this,'#blah');">
                                    </div>
                                 </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="col-sm-12 col-md-1 col-form-label">Mobile</label>
                                <div class="col-sm-12 col-md-4">
                                    <input type="number" name="mobile" value="<?php echo $record['mobile']?>"  maxlength="10" id="mobile" placeholder="Mobile" class="form-control" maxlength="10">
                                    <span id="mobile_result"></span>
                                </div>
                                <label class="col-sm-12 col-md-1 col-form-label">Email</label>
                                <div class="col-sm-12 col-md-4">
                                    <input type="email" name="email"  value="<?php echo $record['email']?>"id="email" placeholder="Email" class="form-control">
                                <span id="email_result"></span>
                                </div>
                                  
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="col-sm-12 col-md-1 col-form-label">Address</label>
                                <div class="col-sm-12 col-md-4">
                                    <textarea name="address" cols="40" rows="3" id="address" placeholder="Address" class="form-control"><?php echo $record['address']?>"</textarea>
                                </div>
                                <label class="col-sm-12 col-md-1 col-form-label">Town</label>
                                <div class="col-sm-12 col-md-4">
                                    <input type="text" name="town" value="<?php echo $record['town']?>" id="town" placeholder="Town" class="form-control">
                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="col-sm-12 col-md-1 col-form-label">District</label>
                                <div class="col-sm-12 col-md-4">
                                    <input type="text" name="district" value="<?php echo $record['district']?>" id="district" placeholder="District" class="form-control">
                                </div>
                                <label class="col-sm-12 col-md-1 col-form-label">State</label>
                                <div class="col-sm-12 col-md-4">
                                    <input type="text" name="state" value="<?php echo $record['state']?>" id="state" placeholder="State" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="col-sm-12 col-md-1 col-form-label">UID</label>
                                <div class="col-sm-12 col-md-4">
                                    <input type="number" name="aadhar" value="<?php echo $record['aadhar']?>"  maxlength="14" id="aadhar" placeholder="Aadhar/UID" class="form-control">
                                      <span id="aadhar_result"></span>
                                </div>
                                <label class="col-sm-12 col-md-1 col-form-label">Bank A/c No.</label>
                                <div class="col-sm-12 col-md-4">
                                    <input type="text" maxlength="20" name="bank_ac" value="<?php echo $record['bank_ac']?>" id="bank_ac" placeholder="Bank a/c No." class="form-control">
                                      <span id="bank_result"></span>
                                </div>
                            </div>
                            <div class="jumbotron" style="background-color:#ffffff;padding:0px 0px;">
                            	<div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <fieldset class="scheduler-border">
                                        <legend >Salary</legend>
                                           <div class="form-group row">
                               <label class="col-sm-12 col-md-2 col-form-label">Date of Joining <span class="text-danger">*</span></label>
                                        <div class="col-sm-12 col-md-4 mb-10">
                                            <input type="date" name="doj" value="<?php echo $record['doj']?>" id="doj" class="form-control" required="true">
                                        </div>
                                        <label class="col-sm-12 col-md-2 col-form-label">Designation <span class="text-danger">*</span></label>
                                        <div class="col-sm-12 col-md-4 mb-10">
                                            <select class="form-control" name="desg_id" id="desg_id">
                                            <option value="">select Designation</option>
                                           <?php foreach($desg as $list){
												 if($record['desg_id'] == $list['id']){$t = 'selected';}else{ $t ='';}
          echo "<option value='".$list['id']."'". $t." >".$list['name']."</option>";
          								 }
          													 ?>  
                                            </select>
                                        </div>
                            </div>       
                            <div class="form-group row">
                                
                           
                                       
                                       </div>
                                        <div class="form-group row">
                               
                                <label class="col-sm-12 col-md-2 col-form-label">Salary <span class="text-danger">*</span></label>
                                
                                        <div class="col-sm-12 col-md-4 mb-10">
                                            <input type="text" name="salary" value="<?php echo $record['salary']?>" placeholder="Salary" class="form-control" required="true">
                                        </div>
                                        
                                        
                            </div>              <div class="form-group row">
                                
                               
                                       
                            </div>
                            
                                        
                            
                                      
                                    
                                    </fieldset>
                                    
                                  </div>
                                <div class="col-md-1"></div>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-sm-2">
                                    <input type="submit" name="update_staff" value="Update Staff" class="btn btn-success btn-block btn-md">
                                </div>
                            </div>
                        </form>                    </div>
               	</div>
         	</div>
       	</div>
    </section> 
<script>
  $(document).ready(function(e) {   
$('#desg_id').on('change', function () {
    if(this.value === "1"){
        $("#class").show();
    } else {
        $("#class").hide();
    }
});
//$('body').on('keyup','#esi',function(e){
//	var basic_salary=parseInt($(this).val());
//	//alert(basic_salary);
//	var pf=$('#pf').val();
//	var hra=$('#hra').val();
//	var esi=$('#esi').val();
//	var gross=basic_salary+Number(hra)+Number(pf)+Number(esi);
//	alert(gross);
//	var days = parseInt(30);
//	var per_day_salary=Number(gross)/days;
//	alert(per_day_salary);die();
//	$('#per_day_salary').val(per_day_salary);
//	
//});
 
$('#basic_salary').keyup(function(e) {
        var basicsalary = $('#basic_salary').val();
		var days = '30';
		var pf=$('#pf').val();
		var hra=$('#hra').val();
		var esi=$('#esi').val();
		var perdaysalary = Number(basicsalary+pf+hra+esi)/Number(days);
		//alert(perdaysalary);
		$('#per_day_salary').val(perdaysalary);
    });
	  function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#previewHolder').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#filePhoto").change(function() {
  readURL(this);
});
  $('#mobile').keyup(function(){
   var mobile = $('#mobile').val();
   //console.log(contact)
   if(mobile != ''){
    $.ajax({
     url: "<?php echo base_url('account/validation_staff/checkvalidation/'); ?>",
     method: "POST",
     data: {mobile:mobile},
     success: function(data){
      $('#mobile_result').html(data);
     }
    });
   }
  });
  $('#email').keyup(function(){
   var email = $('#email').val();
   //console.log(email)
   if(email != ''){
    $.ajax({
     url: "<?php echo base_url('account/validation_staff/checkmail/'); ?>",
     method: "POST",
     data: {email:email},
     success: function(data){
		// console.log(data);
      $('#email_result').html(data);
	 
     }
    });
   }
  });
$('#aadhar').keyup(function(){
   var aadhar = $('#aadhar').val();
   //console.log(aadhar)
   if(aadhar != ''){
    $.ajax({
     url: "<?php echo base_url('account/validation_staff/checkaadhar/'); ?>",
     method: "POST",
     data: {aadhar:aadhar},
     success: function(data){
      $('#aadhar_result').html(data);
	 
     }
    });
   }
  });
  $('#bank_ac').keyup(function(){
   var bank_ac = $('#bank_ac').val();
   //console.log(bank_ac)
   if(bank_ac != ''){
    $.ajax({
     url: "<?php echo base_url('account/validation_staff/checkbank/'); ?>",
     method: "POST",
     data: {bank_ac:bank_ac},
     success: function(data){
      $('#bank_result').html(data);
	 
     }
    });
   }
  });
   $('#pf_ac_no').keyup(function(){
   var pf_ac_no = $('#pf_ac_no').val();
  // console.log(pf_ac_no)
   if(pf_ac_no != ''){
    $.ajax({
     url: "<?php echo base_url('account/validation_staff/checkpf/'); ?>",
     method: "POST",
     data: {pf_ac_no:pf_ac_no},
     success: function(data){
      $('#pf_result').html(data);
	 
     }
    });
   }
  });
$('#income_tax_no').keyup(function(){
   var income_tax_no = $('#income_tax_no').val();
  // console.log(pf_ac_no)
   if(income_tax_no != ''){
    $.ajax({
     url: "<?php echo base_url('account/validation_staff/checkpan/'); ?>",
     method: "POST",
     data: {income_tax_no:income_tax_no},
     success: function(data){
      $('#income_result').html(data);
	 
     }
    });
   }
  });

});
</script>