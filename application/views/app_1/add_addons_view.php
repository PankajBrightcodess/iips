    <section class="FilterBar">
      <div class="container-fluid">
        <div class="row">
          <div class="col-6"><a href="<?php if(!empty($_SERVER['HTTP_REFERER'])){echo $_SERVER['HTTP_REFERER']; }else{echo base_url('/app');}?>" class="back"><i class="fas fa-arrow-left"></i></a> </div>
        </div>
      </div>
    </section>
    <section class="LogInPg">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <h3>Add on something to make it extra special!</h3><hr>           
          </div>
          <div class="col-12">
              <form action="<?php echo base_url('app/save_addons');?>" method="POST">
              <div class="row mt-3">
                <?php if(!empty($addonslist)){$i=0;
                    foreach($addonslist as $addlist){$i++;?>
            <div class="col-6 p-1 mt-2 FilterContent">
                <div class="p-1">                    
                    <div style="height:100px;overflow-y:auto">
                    <img src="<?php echo file_url($addlist['path']); ?>" class='p-1' alt="<?php echo $addlist['product_name'];?>" title='<?php echo $addlist['product_name'];?>'>
                    </div>
                    <div class="ProductInfo">
                        <h3 class='pb-1'><?php echo $addlist['product_name'];?></h3>                                              
                        <p class="price mb-0 pl-2 pb-0">
                        ₹<?php echo $this->amount->toDecimal($addlist['price']);?>
                        </p>
                    </div>
                    <div>    
                        <hr/> 
                        <input type="hidden" name='comingfrom' value='<?php echo $comeof;?>'>
                        <input type='hidden' name='url' value='<?php if(!empty($_SERVER['HTTP_REFERER'])){echo $_SERVER['HTTP_REFERER']; }else{echo base_url('/app');};?>'/>            
                        <input type='hidden' name='base_price[]' class='base_price' value='<?php echo $addlist['price'];?>'/> 
                        <input type="hidden" name="quantity[]" value="1">
                        <input type="checkbox" name='checkup[]' class="addoncheckbox" value='<?php echo $addlist['id'];?>' data-price='<?php echo $addlist['price'];?>' id="customCheck<?php echo $i;?>">
                        <br/><span class='font-responsive'>(please check to select product as addon)<span>
                    </div>
                   
                </div>
            </div>
                <?php  }
                } ?>                
              </div>
              <div class='row' style='margin-top:80px'>
                  <div class="col-3"></div>
                  <div class="col-6">
                      <div class="btn-save">
                        <button type='submit' class='btn btn-success'><i class="fas fa-plus"></i> Add Addons</button>
                      </div>
                  </div>
                  <div class="col-3"></div>
              </div>
              </form>
          </div>
        </div>
      </div>
    </section>
    
    <?php $this->load->view("app/footer"); ?>       
    <?php $this->load->view('app/main-footer-links');?>
    <script>
    
    </script> 
</body>
</html>