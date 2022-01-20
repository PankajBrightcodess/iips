<?php if(!empty($breadcrumb)){?>
    <div class="row">
        <div class="col-12 col-md-10">
            <div class="MyBreadcrumbs">
                <ul>
                <?php foreach($breadcrumb as $key=>$crumb){
                if($key != '0'){?>
                    <li><a href="<?php echo base_url($key);?>"><?php echo strtoupper($crumb);?></a></li>
                <?php 
                }else{ ?>
                    <li><?php echo strtoupper($crumb);?></li>
                <?php } } ?>
                
                </ul>
            </div>
        </div>                      
    </div>
<?php } ?>