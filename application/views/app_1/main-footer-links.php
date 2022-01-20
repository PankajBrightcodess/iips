<?php include_once('common_model.php');?>
<!-- <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="<?php echo file_url('assets/app/js/owl.carousel.min.js');?>"></script>
<script src="<?php echo file_url('assets/app/js/custom-slide.js'); ?>"></script>
<script src="<?php echo file_url('includes/dist/js/vanillaCalendar.js'); ?>" type="text/javascript"></script>
<script src="<?php echo file_url('assets/app/js/custom.js'); ?>"></script>
<script>
    <?php 
    $request_msg = $this->session->userdata('request_msg');
    $request_err_msg = $this->session->userdata('request_err_msg');
    if(!empty($request_msg)){?>
        $('#request_msg_popup_btn').click();
        setTimeout(function() {
		    $('#request_msg_popup .close').click();
	    },3000);
    <?php }
    if(!empty($request_err_msg)){ ?>
        $('#request_err_msg_popup_btn').click();
         setTimeout(function() {
		    $('#request_err_msg_popup .close').click();
	    },3000);
    <?php } ?>
</script>