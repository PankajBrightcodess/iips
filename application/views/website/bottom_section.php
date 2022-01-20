<?php include'footer.php' ; ?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo file_url('assets/website/js/owl.carousel.min.js');?>"></script>
<script type="text/javascript" src="<?php echo file_url('assets/website/js/custom-slider.js');?>"></script>
<script>
    $('body').on('change','#location_city_once',function(){
        var locationid = $(this).val();
        $.ajax({
          type:"POST",
          url:"<?php echo base_url("website/ajax_setlocation_session"); ?>",
          data:{locationid:locationid},
          success: function(data){
              location.reload();             
           }
        });
    });
    
    setTimeout(function() {
        $('#msgpopup').click();
    },3000);      

</script>