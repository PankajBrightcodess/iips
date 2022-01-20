<?php 
$request_msg = $this->session->userdata('request_msg');
$request_err_msg = $this->session->userdata('request_err_msg');
?>
<?php if(!empty($request_msg)){?>
<!-- modal of shape-->
<div class="modal fade" id="request_msg_popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style='height:inherit;'>
    <div class="modal-dialog m-0">
        <div class="modal-content bg-success text-light">
        <div class="modal-header pb-2 pt-2 close" aria-hidden="true" data-dismiss="modal" aria-label="Close" style='font-size:14px;'>     
            <p><strong><?php echo $request_msg; ?><strong></p>      
        </div>              
        </div>
    </div>
</div>
<!-- end of shape modal-->
<?php } ?>

<?php if(!empty($request_err_msg)){?>
<!-- modal of shape-->
<div class="modal fade" id="request_err_msg_popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style='height:inherit;'>
    <div class="modal-dialog m-0">
        <div class="modal-content bg-warning text-light">
        <div class="modal-header pb-2 pt-2 close" aria-hidden="true" data-dismiss="modal" aria-label="Close" style='font-size:14px'>     
            <p><strong><?php echo $request_err_msg; ?><strong></p>      
        </div>              
        </div>
    </div>
</div>
<!-- end of shape modal-->
<?php } ?>