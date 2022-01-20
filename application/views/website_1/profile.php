<section class="">  
    <div class="container-fluid">
    <div class="row" style='background-color:#f9eeb8;'>
        <div class="col-md-1"></div>
        <div class="col-md-10 p-3">
            <!---------------------------------- Response Msg ------------------------------------------->
            <?php 
                $popup="d-none";
                $msg=$pstatus=$picon='';
                if($this->session->flashdata('request_msg')!==NULL){
                $msg=$this->session->flashdata('request_msg');
                $pstatus="success";
                $picon="check";
                $popup="";
                }
                if($this->session->flashdata('request_err_msg')!==NULL){
                $msg=$this->session->flashdata('request_err_msg');
                $pstatus="danger";
                $picon="exclamation";
                $popup="";
                }
            ?>
            <div class="alert alert-<?php echo $pstatus ?> alert-dismissible msg-popup <?php echo $popup ?>">
            <button type="button" id='msgpopup' class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fa fa-<?php echo $picon ?>"></i>
            <?php echo $msg; ?>
            </div>
            <!---------------------------------- End Response Msg ------------------------------------------->    
            <h3>Profile</h3><hr/>   
            <div class="row">
                <div class="col-md-12 card p-3">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-12 col-md-6 text-center">
                            <p><?php //echo PRE;echo print_r($customerdata);?>
                                <img src="<?php echo file_url("$customerdata[cust_image]");?>" alt="profile_img" width='150px' height='150px' class='img-fluid rounded-circle'>
                            </p>
                            <h3><?php echo ucwords($customerdata['cust_name']);?></h3>
                            <p class='mb-0' style='font-size:14px'><?php echo $customerdata['cust_email'];?></p>
                            <p class='mb-0' style='font-size:14px'>+91 <?php echo $customerdata['cust_mobile'];?></p>
                        </div>
                        <div class="col-md-3"></div>                        
                    </div>                   
                    
                </div>
            </div>                 
        </div>
        <div class="col-md-1"></div>
    </div>
    
    </div>
</section>

    
    
    <div id="PgFooter"><?php $this->load->view('website/footer');?></div>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $('document').ready(function(){
            setTimeout(function() {
                $('#msgpopup').click();
            },5000);             
        });
    </script>

  </body>
</html>