<?php 
	if(!defined('BASEPATH')) exit('No direct script access allowed');
	if(!function_exists('maincategory_menu')) {
  		function maincategory_menu($where=array()){
            $CI = get_instance();
			$returnmenulist = array();
			$maincategory_list = $CI->Master_model->getall_category($where);
            if(!empty($maincategory_list)){				
				foreach($maincategory_list as $key=>$catlist){
					$catid = $catlist['id'];
					$subcatlist = $CI->Master_model->getall_subcategory(array('t1.cat_id'=>$catid,'t1.status'=>'1','t1.type'=>'simple'),'all');
					//$check_prodcount = $CI->Master_model->getcount_product($catid);
					//if($check_prodcount !=0){
						$returnmenulist[$key] = $catlist;
						if(!empty($subcatlist)){
							$returnmenulist[$key]['subcat'] = $subcatlist;
							foreach($subcatlist as $skey=>$subcat){
								$lowcatlist = $CI->Master_model->getall_lowcategory(array('t1.cat_id'=>$catid,'t1.subcat_id'=>$subcat['id'],'t1.status'=>'1'));
								if(!empty($lowcatlist)){
									$returnmenulist[$key]['subcat'][$skey]['lowcat'] = $lowcatlist;
								}
							}
						}

						
					//}										
				}
				return $returnmenulist;
			}else{
				return false;
			}
		}
	}
	
?>