<?php
class Master_model extends CI_Model{
	
	function __construct(){
		parent::__construct(); 
		$this->db->db_debug = false;
    }

    public function save_category($data){

        $data['added_on'] = date('Y-m-d H:i:s');
        $status = $this->db->insert('category',$data);        
        if($status == true){
            return true;
        }else{
            return false;
        }
    }

    public function update_category($data){
        
        $data['added_on'] = date('Y-m-d H:i:s');
        $editid = $data['editid'];
        unset($data['editid']);        
        $status = $this->db->update('category',$data,array('id'=>$editid));
        //echo $this->db->last_query();die;        
        if($status == true){
            return true;
        }else{
            return false;
        }
    }

    public function getall_category($where=array(),$type='all'){

        $query = $this->db->get_where('category',$where);       
        if($type == 'all'){
            $return = $query->result_array();
        }else{
            $return = $query->row_array();
        }
        
        return $return;
    }

    public function save_subcategory($data){

        $data['added_on'] = date('Y-m-d H:i:s');
        $status = $this->db->insert('subcategory',$data);        
        if($status == true){
            return true;
        }else{
            return false;
        }
    }

    public function update_subcategory($data){
        $data['added_on'] = date('Y-m-d H:i:s');
        $editid = $data['editid'];
        unset($data['editid']);   
        $status = $this->db->update('subcategory',$data,array('id'=>$editid));

        if($status == true){
            return true;
        }else{
            return false;
        }
    }

    public function getall_subcategory($where=array(),$type='all'){

        $this->db->select('t1.*,t2.name as catname,t2.slug as catslug');
        $this->db->from('subcategory as t1');
        $this->db->join('category as t2','t1.cat_id = t2.id');
        $this->db->where($where);
        $query = $this->db->get();
        //echo $this->db->last_query();
        if($type == 'all'){
            $return = $query->result_array();
        }else{
            $return = $query->row_array();
        }
        return $return;
    }

    public function save_lowcategory($data){

        $data['added_on'] = date('Y-m-d H:i:s');
        $status = $this->db->insert('lowcategory',$data);        
        if($status == true){
            return true;
        }else{
            return false;
        }
    }

    public function update_lowcategory($data){
        $data['added_on'] = date('Y-m-d H:i:s');
        $editid = $data['editid'];
        unset($data['editid']);   
        $status = $this->db->update('lowcategory',$data,array('id'=>$editid));

        if($status == true){
            return true;
        }else{
            return false;
        }
    }

    public function getall_lowcategory($where=array(),$type='all'){

        $this->db->select('t1.*,t2.name as catname,t2.slug as catslug,t3.name as subcatname,t3.slug as subcatslug');
        $this->db->from('lowcategory as t1');
        $this->db->join('category as t2','t1.cat_id = t2.id');
        $this->db->join('subcategory as t3','t1.subcat_id = t3.id');
        $this->db->where($where);
        $query = $this->db->get();
        //echo $this->db->last_query();
        if($type == 'all'){
            $return = $query->result_array();
        }else{
            $return = $query->row_array();
        }
        return $return;
    }

    public function save_variant($data){
        $data['added_on'] = date('Y-m-d H:i:s');
        $status = $this->db->insert('variant',$data);        
        if($status == true){
            return true;
        }else{
            return false;
        }
    }

    public function update_variant($data){
        $editid = $data['editid'];
        unset($data['editid']);  
        $data['added_on'] = date('Y-m-d H:i:s');
        $status = $this->db->update('variant',$data,array('id'=>$editid));        
        if($status == true){
            return true;
        }else{
            return false;
        }
    }

    public function getall_quantity($where=array(),$type='all'){

        $this->db->select('t1.*,t2.name as catname');
        $this->db->from('variant as t1');
        $this->db->join('category as t2','t1.cat_id = t2.id');
        $this->db->where($where);
        $query = $this->db->get();
        //echo $this->db->last_query();
        if($type == 'all'){
            $return = $query->result_array();
        }else{
            $return = $query->row_array();
        }
        return $return;
    }

    public function getall_gstrate($where=array(),$type='all'){
        $query = $this->db->get_where('gstrate',$where);
        if($type == 'all'){
            $return = $query->result_array();
        }else{
            $return = $query->row_array();
        }
        return $return;
    } 

    public function getall_area($where=array(),$type='all'){
        $query = $this->db->get_where('area',$where);
        if($type == 'all'){
            $return = $query->result_array();
        }else{
            $return = $query->row_array();
        }
        return $return;
    }

    public function save_location($data){
        $data['added_on'] = date('Y-m-d H:i:s');
        $insertstatus = $this->db->insert('location',$data);
        if($insertstatus){
            return true;
        }else{
            return false;
        }
    }

    public function getall_location($where=array(),$type='all'){
        $this->db->select('t1.*,t2.name as statename');
        $this->db->from('location as t1');
        $this->db->join('area as t2','t1.state_id = t2.id');
        $this->db->where($where);
        $query = $this->db->get();
        if($type == 'all'){
            $return = $query->result_array();
        }else{
            $return = $query->row_array();
        }
        return $return;
    }

    public function update_location($data){
        $editid = $data['editid'];
        unset($data['editid']);  
        $data['added_on'] = date('Y-m-d H:i:s');
        $status = $this->db->update('location',$data,array('id'=>$editid));        
        if($status == true){
            return true;
        }else{
            return false;
        }
    }

    // public function saveproduct($data){
    //     //echo PRE;print_r($data);die;
    //     $variant_id = json_decode($data['variant_id'],true);
    //     $variant_price = json_decode($data['variant_price'],true);
    //     $variant_stockhold_qty = $data['variant_stockhold_qty'];
    //     $variant_stock_qty = $data['variant_stock_qty'];
    //     $prep_time = $data['prep_time'];
    //     $discount = json_decode($data['discount'],true);
    //     $cut_time = $data['cut_time'];

    //     $insertdata = $data;$parentid = 0;
    //     if(!empty($variant_id)){$i=0;
    //         foreach($variant_id as $key=>$v){$i++;
    //             if($i == 1){
    //                 $parentid = 0;
    //             }

    //             if($discount[$key] != 0){
    //                 $vprice = $variant_price[$key];
    //                 $disc_percent = $discount[$key]/100;
    //                 $disc_price = $vprice - ($vprice*$disc_percent);
    //             }else{
    //                 $disc_price = $variant_price[$key];
    //             }


    //             $insertdata['parent'] = $parentid;
    //             $pcode = 'PROD-'.random_string('numeric',8);
    //             $insertdata['variant_id'] = $v;
    //             $insertdata['variant_price'] = $variant_price[$key];
    //             if(is_array($variant_stockhold_qty)){
    //                 $insertdata['variant_stockhold_qty'] = $variant_stockhold_qty[$key];
    //             }else{
    //                 $insertdata['variant_stockhold_qty'] = $variant_stockhold_qty;
    //             }
    //             if(is_array($variant_stock_qty)){
    //                 $insertdata['variant_stock_qty'] = $variant_stock_qty[$key];
    //             }else{
    //                 $insertdata['variant_stock_qty'] = $variant_stock_qty;
    //             }                
    //             $insertdata['prep_time'] = $prep_time;
    //             $insertdata['discount'] = $discount[$key];
    //             $insertdata['variant_offerprice'] = $disc_price;
    //             $insertdata['cut_time'] = $cut_time;
    //             $insertdata['added_on'] = date('Y-m-d H:i:s');
    //             $insertdata['pcode'] = $pcode;
    //             $insertdata['path'] = $data['path'][0];
    //             $status = $this->db->insert('product',$insertdata);
    //             $insertid = $this->db->insert_id();
    //             if($parentid == 0){
    //                 $parentid = $insertid;
    //             }  
    //             //echo $this->db->last_query();die;
    //             $date = date('Y-m-d H:i:s');
    //             $stock_quant = 1;$stock_hold=0;
    //             if(is_array($variant_stock_qty)){
    //                 $stock_quant = $variant_stock_qty[$key];
    //             }else{
    //                 $stock_quant = $variant_stock_qty;
    //             }
    //             $this->db->insert('admin_stock',array('pid'=>$insertid,'pcode'=>$pcode,'quant'=>$stock_quant,'rate'=>$variant_price[$key],'record_id'=>$insertid,'table_name'=>'product','stock_type'=>'PREV','made_on'=>$date));
    //         }
    //         //echo $this->db->last_query();die;
    //         if($status == true){
    //             return true;
    //         }else{
    //             return false;
    //         }
    //     }else{
    //         return false;
    //     }

    // }
    public function saveproduct($data){
        //echo PRE;print_r($data);die;
        $variant_id = json_decode($data['variant_id'],true);
        $variant_price = json_decode($data['variant_price'],true);       
        $variant_stock_qty = json_decode($data['variant_stock_qty']);       
        $discount = json_decode($data['discount'],true);
        //$cut_time = $data['cut_time'];

        $parentid = 0;$insertdata = $data;
        if(!empty($variant_id)){$i=0;       

            unset($insertdata['discount'],$insertdata['variant_id'],$insertdata['variant_price'],$insertdata['variant_stock_qty']);
            $insertdata['parent'] = $parentid;
            $pcode = 'PROD-'.random_string('numeric',8);
            $insertdata['added_on'] = date('Y-m-d H:i:s');
            $insertdata['pcode'] = $pcode;
            $insertdata['path'] = $data['path'][0];
            $status = $this->db->insert('product',$insertdata);
            $insertid = $this->db->insert_id();

            if($status){
                foreach($variant_id as $key=>$v){$i++;        

                    $variantdata = array();
                    if($discount[$key] != 0){
                        $vprice = $variant_price[$key];
                        $disc_percent = $discount[$key]/100;
                        $disc_price = round($vprice - ($vprice*$disc_percent));
                    }else{
                        $disc_price = $variant_price[$key];
                    }
                    $variantdata['pid'] = $insertid;
                    $variantdata['variant_id'] = $v;
                    $variantdata['variant_price'] = $variant_price[$key];
                    $variantdata['variant_stock_qty'] = $variant_stock_qty[$key];
                    $variantdata['discount'] = $discount[$key];
                    $variantdata['variant_offerprice'] = $disc_price;
                    
                    $v_status = $this->db->insert('product_variant',$variantdata);                    
                    if($v_status){
                        $date = date('Y-m-d H:i:s');
                        $stock_quant = $variant_stock_qty[$key];
                        $this->db->insert('admin_stock',array('pid'=>$insertid,'pcode'=>$pcode,'variant_id'=>$v,'quant'=>$stock_quant,'rate'=>$disc_price,'record_id'=>$insertid,'table_name'=>'product','stock_type'=>'PREV','made_on'=>$date));
                    }
                }  
                if($v_status){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            return false;
        }         
    }

    // public function update_product($data){
    //     echo PRE;print_r($data);die;
    //     $updatedata = array('product_name'=>$data['product_name'],'cat_id'=>$data['cat_id']);
    //     $editids = $data['editid'];
    //     $post_subcat = $data['subcat_id'];        
    //     $post_flavor = $data['flavor_id'];
    //     $post_egger = $data['egger_id'];
    //     $post_shape = $data['shape_id'];
    //     $post_cream = $data['cream_id'];
    //     $post_addonmenu = $data['addonmenu_id'];
    //     $flavor = array();
    //     $addonmenu = array();
    //     if(!empty($data['flavor_id'])){
    //         $flavorlist = $this->Master_model->getall_subcategory(array('t1.cat_id'=>$data['cat_id'],'t1.status'=>'1','t1.type'=>'flavor'),'all');
    //         if(!empty($flavorlist)){
    //             foreach($flavorlist as $flav){
    //                 $flavor[] = $flav['id'];
    //             }
    //         }
    //         foreach($data['flavor_id'] as $key=>$flav){
    //             if(in_array('select_all',$flav)){
    //                 $flavorlist = $this->Master_model->getall_subcategory(array('t1.cat_id'=>$data['cat_id'],'t1.status'=>'1','t1.type'=>'flavor'),'all');
                    
    //                 if(!empty($flavorlist)){
    //                     foreach($flavorlist as $fv){ 
    //                         $flavor[$key][] = $fv['id'];                            
    //                     }
    //                 }
    //             }else{
    //                 $flavor[$key] = $flav;
    //             }
    //         }
    //     }
    //     if(!empty($data['addonmenu_id'])){           
    //         foreach($data['addonmenu_id'] as $key=>$addm){
    //             if(in_array('select_all',$addm)){
    //                 $addonmenulist = $this->Master_model->getall_addonmenu(array('t1.cat_id'=>$data['cat_id'],'t1.status'=>'1'),'all');
                    
    //                 if(!empty($addonmenulist)){
    //                     foreach($addonmenulist as $ad){ 
    //                         $addonmenu[$key][] = $ad['id'];                            
    //                     }
    //                 }
    //             }else{
    //                 $addonmenu[$key] = $addm;
    //             }
    //         }
    //     }
    //     $final_subcat = $this->myedit_array_merge($post_subcat,$post_flavor,$post_egger,$data['cat_id']);  
    //     echo PRE;print_r($flavor);print_r($final_subcat); die;     
    //     $subcat_id = $final_subcat;
    //     $flavor_id = $flavor;
    //     $shape_id = $post_shape;
    //     $cream_id = $post_cream;
    //     $addonmenu_id = $addonmenu;
    //     $variant_price = $data['variant_price'];
    //     $prep_time = $data['prep_time'];
    //     $discount = $data['discount'];
    //     $cut_time = $data['cut_time'];
    //     $desp = $data['desp'];
    //     if(!empty($editids)){
    //         foreach($editids as $editid){
    //             if(isset($shape_id[$editid])){
    //                 $updatedata['shape_id'] = json_encode($shape_id[$editid]);
    //             }else{
    //                 $updatedata['shape_id'] = '';
    //             }
    //             if(isset($cream_id[$editid])){
    //                 $updatedata['cream_id'] = json_encode($cream_id[$editid]);
    //             }else{
    //                 $updatedata['cream_id'] = '';
    //             }
    //             if(isset($addonmenu_id[$editid])){
    //                 $updatedata['addonmenu_id'] = json_encode($addonmenu_id[$editid]);
    //             }else{
    //                 $updatedata['addonmenu_id'] = '';
    //             }
    //             if(isset($subcat_id[$editid])){
    //                 $updatedata['subcat_id'] = json_encode($subcat_id[$editid]); 
    //             }else{
    //                 $updatedata['subcat_id'] = '';
    //             }
    //             if(isset($flavor_id[$editid])){
    //                 $updatedata['flavor_id'] = json_encode($flavor_id[$editid]); 
    //             }else{
    //                 $updatedata['flavor_id'] = '';
    //             }
    //             if(isset($variant_price[$editid][0])){
    //                 $updatedata['variant_price'] = $variant_price[$editid][0]; 
    //             }else{
    //                 $updatedata['variant_price'] = 0; 
    //             }
    //             if(isset($prep_time[$editid][0])){
    //                 $updatedata['prep_time'] = $prep_time[$editid][0]; 
    //             }else{
    //                 $updatedata['prep_time'] = 60; 
    //             }     
    //             if(isset($discount[$editid][0])){
    //                 $updatedata['discount'] = $discount[$editid][0]; 
    //             }else{
    //                 $updatedata['discount'] = 0; 
    //             }   
    //             if(isset($cut_time[$editid][0])){
    //                 $updatedata['cut_time'] = $cut_time[$editid][0]; 
    //             }  
    //             if(isset($variant_price[$editid][0]) && isset($discount[$editid][0])){
    //                 $vprice = $variant_price[$editid][0];
    //                 $dpercent = ($discount[$editid][0])/100;
    //                 $disprice = $vprice - ($vprice*$dpercent);
    //                 $updatedata['variant_offerprice'] = $disprice;
    //             }else{
    //                 $updatedata['variant_offerprice'] = 0;
    //             }      
    //             $updatedata['publish_status'] = 0;

    //             $updatestatus = $this->db->update('product',$updatedata,array('id'=>$editid,'status'=>'1'));
    //             if($updatestatus){
    //                 update stock if required
    //                 $stockupdate = array('rate'=>$variant_price[$editid][0]);
    //                 $this->db->update('admin_stock',$stockupdate,array('record_id'=>$editid,'table_name'=>'product','status'=>'1'));
    //                 then update the desp of product
    //                 $despupdate = array('desp'=>$desp[$editid]);
    //                 $this->db->update('product_detail',$despupdate,array('prod_id'=>$editid,'status'=>'1'));
    //             }                
    //         }
    //     }
    //     if($updatestatus){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }

    public function update_product($data){
        //echo PRE;print_r($data);die;
        $updatedata = array('product_name'=>$data['product_name'],'cat_id'=>$data['cat_id']);
        $editids = $data['pid'];
        $post_subcat = $data['subcat_id'];        
        $post_lowcat = $data['lowcat_id'];
        $post_egger = $data['egger_id'];
       
           
        $subcat_id =  $post_subcat;
        $lowcat_id =  $post_lowcat;     

        $variant_price = $data['variant_price'];       
        $discount = $data['discount'];       
        $variant_id = $data['variant_id'];       
        $variant_offerprice = $data['variant_offerprice'];

        $desp = $data['desp'];
        if(isset($subcat_id)){
            $updatedata['subcat_id'] = json_encode($subcat_id); 
        }else{
            $updatedata['subcat_id'] = '';
        }
        if(isset($lowcat_id)){
            $updatedata['lowcat_id'] = json_encode($lowcat_id); 
        }else{
            $updatedata['lowcat_id'] = '';
        }     
        if(isset($post_egger)){
            $updatedata['property_id'] = json_encode($post_egger); 
        }else{
            $updatedata['property_id'] = '';
        }       
        $updatedata['publish_status'] = 0;        
        if(isset($desp) && !empty($desp)){
            // update or insert desp of product
            $query = $this->db->get_where('product_detail',array('prod_id'=>$editids));
            $count = $query->num_rows();
            if($count>0){
                // update
                $date = date('Y-m-d H:i:s');
                $this->db->update('product_detail',array('desp'=>$desp,'added_on'=>$date),array('prod_id'=>$editids,'status'=>'1'));
            }else{
                // insert
                $date = date('Y-m-d H:i:s');
                $this->db->insert('product_detail',array('desp'=>$desp,'prod_id'=>$editids,'added_on'=>$date));
                //echo $this->db->last_query();die;
            }
        }  
        $update_status = $this->db->update('product',$updatedata,array('id'=>$editids));    

        if(!empty($variant_id)){ $v_updatedata = array();
            foreach($variant_id as $key=>$vid){
                $v_updatedata['variant_price'] = $variant_price[$key];
                $v_updatedata['discount'] = $discount[$key];
                if($discount[$key] != 0){
                    $vprice = $variant_price[$key];
                    $disc_percent = $discount[$key]/100;
                    $disc_price = round($vprice - ($vprice*$disc_percent));
                }else{
                    $disc_price = $variant_price[$key];
                }
                $v_updatedata['variant_offerprice'] = $disc_price;
                $update_status = $this->db->update('product_variant',$v_updatedata,array('pid'=>$editids,'variant_id'=>$vid));
               // echo $this->db->last_query();die;
            }
        }
        if($update_status){
            return true;
        }else{
            return false;
        }
        
    }

    public function getcount_product($cat_id){
        $where = array('cat_id'=>$cat_id,'status'=>'1','publish_status'=>'1');
        $query = $this->db->get_where('product',$where);
        $count = $query->num_rows();
        return $count;
    }

    public function save_availability($data){

        $prod_list = $data['prod_id'];        
        $locationid = json_encode($data['location_id']);
        if(!empty($prod_list)){
            foreach($prod_list as $prod_id){
                $query = $this->db->get_where('product_detail',array('prod_id'=>$prod_id));
                $count = $query->num_rows();
                if($count>0){
                    // update
                    $status = $this->db->update('product_detail',array('location_id'=>$locationid),array('prod_id'=>$prod_id));
                }else{
                    // insert
                    $date = date('Y-m-d H:i:s');
                    $status = $this->db->insert('product_detail',array('location_id'=>$locationid,'added_on'=>$date,'prod_id'=>$prod_id));
                }
            }
        }       
        if($status){
            return true;
        }else{
            return false;
        }

    }

    public function getall_desp($where=array(),$type='all'){
        $this->db->select('t1.*,t2.product_name');
        $this->db->from('product_detail as t1');
        $this->db->join('product as t2','t1.prod_id = t2.id');
        $this->db->where($where);
        $query = $this->db->get();
        $despdata = $query->result_array();
        if(!empty($despdata)){
            foreach($despdata as $key=>$d){
                $location = $d['location_id'];
                $locationarray = json_decode($location);
                $location_name = array();
                $location_id = array();
                if(!empty($locationarray)){
                    foreach($locationarray as $l){
                        $alllocation = $this->getall_location(array('t1.id'=>$l,'t1.status'=>'1'),'single');
                        $location_name[] = $alllocation['name'];
                        //$location_id[] = $alllocation['id'];
                    }
                    //$despdata[$key]['location_id'] = $location_id;
                    $despdata[$key]['location_name'] = $location_name;
                }
            }
        }

        if($type == 'all'){
            $return = $despdata;
        }else{
            if(isset($despdata[0])){
                return $despdata[0];
            }
        }
        return $return;
    }

    public function myedit_array_merge($subcat_array,$flavor_array,$egger_array,$cat_id){
        $return = array();
        if(!empty($subcat_array)){
            foreach($subcat_array as $key=>$sarray){
                $r[$key] = $sarray;
                if(!empty($flavor_array[$key])){
                    foreach($flavor_array[$key] as $farr){
                        if(in_array('select_all',$flavor_array[$key])){
                            $flavorlist = $this->Master_model->getall_subcategory(array('t1.cat_id'=>$cat_id,'t1.status'=>'1','t1.type'=>'flavor'),'all');
                            if(!empty($flavorlist)){
                                foreach($flavorlist as $flav){
                                    $r[$key][] = $flav['id'];
                                }
                            }
                        }else{
                            $r[$key][] = $farr;
                        }
                        
                    }                    
                }
                
                if(!empty($egger_array[$key])){
                    foreach($egger_array[$key] as $earr){
                        $r[$key][] = $earr;
                    }
                }
                $return = $r;
            }
        }
        return $return;
    }
    // public function getall_productdata($where=array(),$type='all',$filter_subcat=0,$order_by=array()){
        
    //     $this->db->select('t1.*,t2.name as catname,t3.desp');
    //     $this->db->from('product as t1');
    //     $this->db->join('category as t2','t1.cat_id = t2.id');
    //     $this->db->join('product_detail as t3','t1.id = t3.prod_id','left');
    //     if(!empty($order_by)){
    //         $this->db->order_by("$order_by[0]","$order_by[1]");
    //     }
    //     $this->db->where($where);        
    //     $query = $this->db->get();   
    //     //echo $this->db->last_query();             
    //     $prod_data = $query->result_array();
            
        
    //     if(!empty($prod_data)){
    //         foreach($prod_data as $key=>$onedata){               
    //                 $subcat = $onedata['subcat_id'];
    //                 $flavor = $onedata['flavor_id'];  
    //                 $property = $onedata['property_id'];                  
    //                 $shape = $onedata['shape_id'];                    
    //                 $cream = $onedata['cream_id'];                    
    //                 $addonmenu = $onedata['addonmenu_id'];                    
                                       
    //                 $json_array_subcat = json_decode($subcat,true);
    //                 $json_array_flavor = json_decode($flavor,true);
    //                 $json_array_property = json_decode($property,true);
    //                 $json_array_shape = json_decode($shape,true);
    //                 $json_array_cream = json_decode($cream,true);
    //                 $json_array_addonmenu = json_decode($addonmenu,true);
                    
    //             if(($filter_subcat !=0 && in_array($filter_subcat,$json_array_subcat))||($filter_subcat == 0)){
    //                 $name_subcat = array();
    //                 $subcat_slug = array();
    //                 $name_flavor = array();
    //                 $name_property = array();
    //                 $flv = array();
    //                 if(!empty($json_array_flavor)){
    //                     foreach($json_array_flavor as $flavor_list){
    //                         $list = $this->getall_subcategory(array('t1.id'=>$flavor_list,'t1.status'=>'1'),'single');
    //                         $name_flavor[] = $list['name'];
    //                         $flv[$list['id']] = array('name'=>$list['name']);
    //                     }
    //                 }
    //                 if(!empty($json_array_subcat)){
    //                     foreach($json_array_subcat as $subcat_list){
    //                         $list = $this->getall_subcategory(array('t1.id'=>$subcat_list,'t1.status'=>'1'),'single');
    //                         $name_subcat[] = $list['name'];
    //                         $subcat_slug[] = $list['slug'];
    //                     }
    //                 }
    //                 if(!empty($json_array_property)){
    //                     foreach($json_array_property as $property_list){
    //                         $list = $this->getall_subcategory(array('t1.id'=>$property_list,'t1.status'=>'1'),'single');
    //                         $name_property = array('name'=>$list['name'],'image'=>$list['image_path']);
    //                     }
    //                 }
    //                 if(!empty($json_array_shape)){
    //                     $name_shape = array();
    //                     foreach($json_array_shape as $shape_list){
    //                         $list = $this->getall_shape(array('t1.id'=>$shape_list,'t1.status'=>'1'),'single');
    //                         $name_shape[$shape_list] = array('name'=>$list['name'],'price'=>$list['price']);
    //                     }
    //                     $prod_data[$key]['shapename'] = $name_shape;  
    //                 }
    //                 if(!empty($json_array_cream)){
    //                     $name_cream = array();
    //                     foreach($json_array_cream as $cream_list){
    //                         $list = $this->getall_cream(array('t1.id'=>$cream_list,'t1.status'=>'1'),'single');
    //                         $size_price_jsonarray = json_decode($list['size_price'],true);
    //                         if(isset($size_price_jsonarray[$onedata['variant_id']])){
    //                             $price = $size_price_jsonarray[$onedata['variant_id']];
    //                             $name_cream[$cream_list] = array('name'=>$list['name'],'price'=>$price);
    //                         }else{
    //                             $name_cream[$cream_list] = array('name'=>$list['name'],'price'=>$list['price']);
    //                         }
    //                     }
    //                     $prod_data[$key]['creamname'] = $name_cream; 
    //                 }
    //                 if(!empty($json_array_addonmenu)){
    //                     $name_addonmenu = array();
    //                     foreach($json_array_addonmenu as $addon_list){
    //                         $list = $this->getall_addonmenu(array('t1.id'=>$addon_list,'t1.status'=>'1'),'single');
    //                         $size_price_jsonarray = json_decode($list['size_price'],true);
    //                         if(isset($size_price_jsonarray[$onedata['variant_id']])){
    //                             $price = $size_price_jsonarray[$onedata['variant_id']];
    //                             $name_addonmenu[$addon_list] = array('name'=>$list['name'],'image'=>$list['path'],'price'=>$price);
    //                         }else{
    //                             $name_addonmenu[$addon_list] = array('name'=>$list['name'],'image'=>$list['path'],'price'=>$list['price']);
    //                         }
    //                     }
    //                     $prod_data[$key]['addonname'] = $name_addonmenu; 
    //                 }
    //                 if(!empty($onedata['variant_id'])){
    //                     $qunatitydata = $this->getall_quantity(array('t1.id'=>$onedata['variant_id'],'t1.status'=>'1'),'single');
    //                 }
    //                 $prod_data[$key]['subcatname'] = $name_subcat;
    //                 $prod_data[$key]['subcatslug'] = $subcat_slug;
    //                 $prod_data[$key]['flavorname'] = $name_flavor;
    //                 $prod_data[$key]['propertyname'] = $name_property;
    //                 $prod_data[$key]['flvname'] = $flv;              
    //                 $prod_data[$key]['variantname'] = $qunatitydata['quant_text'];
    //             }
    //         }
    //     }
    //     if($type == 'all'){
    //         $return = $prod_data;
    //     }else{
    //         $return = $prod_data[0];
    //     }
    //     return $return;
    // }

    public function getall_productdata($where=array(),$type='all',$filter_subcat=0,$order_by=array(),$group_by=array()){
        
        $this->db->select('t1.*,t2.name as catname,t3.desp,t3.location_id,t4.variant_id,t4.discount,t4.variant_price,t4.variant_offerprice,t4.variant_stock_qty');
        $this->db->from('product as t1');
        $this->db->join('category as t2','t1.cat_id = t2.id');
        $this->db->join('product_detail as t3','t1.id = t3.prod_id','left');
        $this->db->join('product_variant as t4','t1.id = t4.pid','left');
        $this->db->where($where); 
        if(!empty($group_by)){
            $this->db->group_by($group_by);
        }
        if(!empty($order_by)){
            $this->db->order_by("$order_by[0]","$order_by[1]");
        }
              
        $query = $this->db->get();   
        //echo $this->db->last_query();die;             
        $prod_data = $query->result_array();
            
        
        if(!empty($prod_data)){
            foreach($prod_data as $key=>$onedata){               
                    $subcat = $onedata['subcat_id'];
                    $lowcat = $onedata['lowcat_id'];  
                    $property = $onedata['property_id'];                  
                    //$shape = $onedata['shape_id'];                    
                    //$cream = $onedata['cream_id'];                    
                    $addonmenu = $onedata['addonmenu_id'];                    
                                       
                    $json_array_subcat = json_decode($subcat,true);
                    //echo $filter_subcat;
                    //print_r($json_array_subcat);
                    $json_array_lowcat = json_decode($lowcat,true);
                    //$json_array_flavor = json_decode($flavor,true);
                    $json_array_property = json_decode($property,true);
                    //$json_array_shape = json_decode($shape,true);
                    //$json_array_cream = json_decode($cream,true);
                    $json_array_addonmenu = json_decode($addonmenu,true);
                    
                if(($filter_subcat !=0 && in_array($filter_subcat,$json_array_subcat))||($filter_subcat == 0)){
                    $name_subcat = array();
                    $subcat_slug = array();
                    $name_lowcat = array();
                    $lowcat_slug = array();
                    //$name_flavor = array();
                    $name_property = array();
                    //$flv = array();
                    if(!empty($json_array_lowcat)){
                        foreach($json_array_lowcat as $lowcat_list){
                            $list = $this->getall_lowcategory(array('t1.id'=>$lowcat_list,'t1.status'=>'1'),'single');
                            $name_lowcat[] = $list['name'];
                            $lowcat_slug[] = $list['slug'];
                        }
                    }
                    if(!empty($json_array_subcat)){
                        foreach($json_array_subcat as $subcat_list){
                            $list = $this->getall_subcategory(array('t1.id'=>$subcat_list,'t1.status'=>'1'),'single');
                            $name_subcat[] = $list['name'];
                            $subcat_slug[] = $list['slug'];
                        }
                    }
                    if(!empty($json_array_property)){
                        foreach($json_array_property as $property_list){
                            $list = $this->getall_subcategory(array('t1.id'=>$property_list,'t1.status'=>'1'),'single');
                            $name_property = array('name'=>$list['name'],'image'=>$list['image_path']);
                        }
                    }                    
                    if(!empty($onedata['variant_id'])){
                        $qunatitydata = $this->getall_quantity(array('t1.id'=>$onedata['variant_id'],'t1.status'=>'1'),'single');
                    }
                    $prod_data[$key]['subcatname'] = $name_subcat;
                    $prod_data[$key]['subcatslug'] = $subcat_slug;
                    $prod_data[$key]['lowcatname'] = $name_lowcat;
                    $prod_data[$key]['lowcatslug'] = $lowcat_slug;                    
                    $prod_data[$key]['propertyname'] = $name_property;                                
                    $prod_data[$key]['variantname'] = $qunatitydata['quant_text'];
                }else{
                    unset($prod_data[$key]);
                }
            }
        }
        if($type == 'all'){
            $return = $prod_data;
        }else{
            $return = $prod_data[0];
        }
        return $return;
    }

    public function update_publish_product($pid,$status){
        if($status == 'true'){
            // want to publish
           $status = $this->db->update('product',array('publish_status'=>'1'),array('id'=>$pid,'status'=>'1'));
           $this->db->update('product',array('publish_status'=>'1'),array('parent'=>$pid,'status'=>'1'));
        }else{
            // want to unpublish
            $status = $this->db->update('product',array('publish_status'=>'0'),array('id'=>$pid,'status'=>'1'));
            $this->db->update('product',array('publish_status'=>'0'),array('parent'=>$pid,'status'=>'1'));
        }
        if($status == true){
            return true;
        }else{
            return false;
        }
    }

    // public function getall_productvariant($where=array(),$type='all'){
        
    //     $variantdata = array();
    //     $productdata = $this->getall_productdata($where,'single');
    //     $variantdata[] = $productdata;
    //     //print_r($productdata);
    //     if($productdata['parent'] !=0){
    //         $query = $this->db->get_where('product',array('parent'=>$productdata['parent'],'status'=>'1'));
    //         if($query->num_rows() !=0){
    //             // more variant is present
    //             $varaintlist = $query->result_array();
    //             if(!empty($varaintlist)){
    //                 foreach($varaintlist as $varier){
    //                     if($where['md5(t1.id)'] != md5($varier['id'])){
    //                         $variantdata[] = $this->getall_productdata(array('t1.status'=>'1','t1.id'=>$varier['id']),'single');
    //                     }
    //                 }
    //             }
    //         }
    //         $variantdata[] = $this->getall_productdata(array('t1.id'=>$productdata['parent'],'t1.status'=>'1','t1.publish_status'=>'1'),'single');
    //     }else{
    //         $query = $this->db->get_where('product',array('md5(parent)'=>$where['md5(t1.id)'],'status'=>'1'));
    //         if($query->num_rows() != 0){
    //             //echo "variant is present";
    //             $varaintlist = $query->result_array();
    //             //print_r($varaintlist);
    //             if(!empty($varaintlist)){
    //                 foreach($varaintlist as $varier){
    //                     if($where['md5(t1.id)'] != md5($varier['id'])){
    //                         $variantdata[] = $this->getall_productdata(array('t1.status'=>'1','t1.id'=>$varier['id']),'single');
    //                     }
    //                 }
    //             }
    //         }
    //     }

    //     return $variantdata;
    // }

    public function getall_productvariant($where=array(),$type='all'){
        
        $variantdata = array();
        $productdata = $this->getall_productdata($where,$type);
       
        //echo PRE;print_r($productdata);
        return $productdata;
    }

    // public function getall_relatedproduct($sqlwhere=array(),$loopwhere=array(),$order=array(),$limit=4,$type='all'){
        
    //     $this->db->select('t1.*,t2.name as catname,t3.desp');
    //     $this->db->from('product as t1');
    //     $this->db->join('category as t2','t1.cat_id = t2.id');
    //     $this->db->join('product_detail as t3','t1.id = t3.prod_id','left');
    //     $this->db->order_by($order[0],$order[1]);
    //     $this->db->limit($limit);
    //     $this->db->where($sqlwhere);
    //     $query = $this->db->get();
    //     echo $this->db->last_query();
    //     if(empty($loopwhere)){
    //         if($type == 'all'){
    //             $productdata = $query->result_array();
    //         }else{
    //             $productdata = $query->row_array();
    //         }
    //     }else{
    //         $prodata = $query->result_array();            
    //         $productdata = array();
    //         foreach($prodata as $onedata){                
    //             $subcat = $onedata['subcat_id'];               
    //             $json_array_subcat = json_decode($subcat,true);
    //             if($loopwhere['subcat_id'] !=0 && in_array($loopwhere['subcat_id'],$json_array_subcat)){
    //                 $productdata[] = $onedata;
    //             }
    //         }
    //     }
    //     return $productdata;
    // }

    public function getall_relatedproduct($loopwhere=array(),$order_by,$limit=4){
        
        $catid = $loopwhere['cat_id'];
        $subcatid = $loopwhere['subcat_id'];
        $notpid = $loopwhere['not_pid'];
        $return_product = array();
        $productdata = $this->getall_productdata(array('t1.status'=>'1','t1.publish_status'=>'1','t1.cat_id'=>$catid,'t1.parent'=>'0'),'all','',$order_by,array('t1.id'));
        if(!empty($productdata)){ 
            foreach($productdata as $pdata){
                $json_array = json_decode($pdata['subcat_id']);
                if($pdata['id'] != $notpid){
                    if(in_array($subcatid,$json_array)){
                        $return_product[] = $pdata;
                    }
                }
                
            }
        }
        return $return_product;
        
    }

    public function get_productdata($where=array(),$type='all'){
        $query = $this->db->get_where('product',$where);
        if($type == 'all'){
            $return = $query->result_array();
        }else{
            $return  = $query->row_array();
        }
        return $return;
    }

    public function getproduct_options($where=array()){
        $productdata = $this->get_productdata($where,'single');
        $flavor_option_array = array(''=>'Select Flavor');
        $shape_option_array = array(''=>'Select Shape');
        $cream_option_array = array(''=>'Select Cream');
        $finalarray = array();
        if(!empty($productdata)){
            $flavor_ids = $productdata['flavor_id'];
            $shape_ids = $productdata['shape_id'];
            $cream_ids = $productdata['cream_id'];
            $flavor_json = json_decode($flavor_ids,true);
            $shape_json = json_decode($shape_ids,true);
            $cream_json = json_decode($cream_ids,true);
            if(!empty($flavor_json)){
                foreach($flavor_json as $fj){
                    $flavordata = $this->getall_subcategory(array('t1.id'=>$fj),'single');
                    $flavor_option_array[$fj] = $flavordata['name'];
                }
                $finalarray['flavoroption'] = $flavor_option_array;                
            }
            if(!empty($shape_json)){
                foreach($shape_json as $sj){
                    $shapedata = $this->getall_shape(array('t1.id'=>$sj),'single');
                    $shape_option_array[$sj] = $shapedata['name'];
                }
                $finalarray['shapeoption'] = $shape_option_array; 
            }
            if(!empty($cream_json)){
                foreach($cream_json as $cj){
                    $creamdata = $this->getall_cream(array('t1.id'=>$cj),'single');
                    $cream_option_array[$cj] = $creamdata['name'];
                }
                $finalarray['creamoption'] = $cream_option_array;
            }
        }
        return $finalarray;
    }

    public function checkcustomer_login(){
        $userid = $this->session->userdata('cuserid');
        $role = $this->session->userdata('role');
        if(!empty($userid) && !empty($role) && $role == 2){
          //echo "// customer logged in"; 
          return true;
        }else{
          //echo "// not a customer";
          return false;
        }
      }

    public function save_tocart_insession($postdata){
        
        $selected_date_time = $postdata['selected_date'];
        $datetimearray = explode(' ',$selected_date_time);
        $finaldatetime = "$datetimearray[1] $datetimearray[2] $datetimearray[3] $datetimearray[4]";        
        $selected_date = date('Y-m-d',strtotime($finaldatetime));
        
        
        $pid = $postdata['pid'];
        $delivery_date = $selected_date;
        
        $message = $postdata['message'];
        $quantity = $postdata['quantity'];
        if(!empty($postdata['addonmenu'])){
            $addonmenu = json_encode($postdata['addonmenu']);
        }else{
            $addonmenu = '';
        }
        $pincode = $postdata['pincode'];
        $addedon_date = date('Y-m-d H:i:s');

        $insertarray = array('pid'=>$pid,'ptable'=>'product','slot_id'=>$postdata['slot_id'],'slot_name'=>$postdata['selected_slot'],'delivery_rate'=>$postdata['slot_price'],
        'time_name'=>$postdata['selected_name'],'time_id'=>$postdata['selected_time'],'delivery_date'=>$delivery_date,'message'=>$message,'quantity'=>$quantity,
        'addonmenu_id'=>$addonmenu,'pincode'=>$pincode,'added_on'=>$addedon_date,'flavor_id'=>$postdata['flavor_id'],'shape_id'=>$postdata['shape_id'],'cream_id'=>$postdata['cream_id']);
        
        $cartsession = $this->session->userdata('cart_session');
        if(!empty($cartsession)){
            // already present session
            $total_in_cart = count($cartsession);
            $cartsession[] = $insertarray;
            $this->session->set_userdata('cart_session',$cartsession);
            $this->session->set_userdata('cart_addon_id',$total_in_cart);
        }else{
            // need to create new 
            $cart = array();
            $cart[] = $insertarray;
            $this->session->set_userdata('cart_session',$cart);
            $this->session->set_userdata('cart_addon_id',0);
        }
        $return = array();
        
        $final_cartsession = $this->session->userdata('cart_session');
        if(!empty($final_cartsession)){
            $return['status'] = true;
            //$return['count'] = count($final_cartsession);
        }else{
            $return['status'] = false;
            //$return['count'] = 0;
        }
        return $return;
    }

    public function save_tocart_indb($postdata){

        $selected_date_time = $postdata['selected_date'];
        $datetimearray = explode(' ',$selected_date_time);
        $finaldatetime = "$datetimearray[1] $datetimearray[2] $datetimearray[3] $datetimearray[4]";        
        $selected_date = date('Y-m-d',strtotime($finaldatetime));
        
        $return = array();
        $pid = $postdata['pid'];
        $delivery_date = $selected_date;
        
        $message = $postdata['message'];
        $quantity = $postdata['quantity'];
       if(!empty($postdata['addonmenu'])){
            $addonmenu = json_encode($postdata['addonmenu']);
        }else{
            $addonmenu = '';
        }
        $pincode = $postdata['pincode'];
        $addedon_date = date('Y-m-d H:i:s');
        $cust_id = $this->session->userdata('cuserid');

        if(!empty($postdata['shape_id'])){
            $shape_id = $postdata['shape_id'];
        }else{
            $shape_id = '';
        }
        if(!empty($postdata['cream_id'])){
            $cream_id = $postdata['cream_id'];
        }else{
            $cream_id = '';
        }
        

        $insertarray = array('pid'=>$pid,'ptable'=>'product','cust_id'=>$cust_id,'slot_id'=>$postdata['slot_id'],'slot_name'=>$postdata['selected_slot'],'delivery_rate'=>$postdata['slot_price'],
        'time_name'=>$postdata['selected_name'],'time_id'=>$postdata['selected_time'],'delivery_date'=>$delivery_date,'message'=>$message,'quantity'=>$quantity,
        'addonmenu_id'=>$addonmenu,'pincode'=>$pincode,'added_on'=>$addedon_date,'flavor_id'=>$postdata['flavor_id'],'shape_id'=>$shape_id,'cream_id'=>$cream_id);
        
        $status = $this->db->insert('cart',$insertarray);

        $insertid = $this->db->insert_id();
        $this->session->set_userdata('cart_addon_id',$insertid);
        if($status == true){
            $return['status'] = true;
        }else{
            $return['status'] = false;
        }
        return $return;
    }

    public function save_buynow_insession($postdata){

        $selected_date_time = $postdata['selected_date'];
        $datetimearray = explode(' ',$selected_date_time);
        $finaldatetime = "$datetimearray[1] $datetimearray[2] $datetimearray[3] $datetimearray[4]";        
        $selected_date = date('Y-m-d',strtotime($finaldatetime));
        
        
        $pid = $postdata['pid'];
        $delivery_date = $selected_date;
        
        $message = $postdata['message'];
        $quantity = $postdata['quantity'];
        if(!empty($postdata['addonmenu'])){
            $addonmenu = json_encode($postdata['addonmenu']);
        }else{
            $addonmenu = '';
        }
        $pincode = $postdata['pincode'];
        $addedon_date = date('Y-m-d H:i:s');
        if(!empty($postdata['shape_id'])){
            $shape_id = $postdata['shape_id'];
        }else{
            $shape_id = '';
        }
        if(!empty($postdata['cream_id'])){
            $cream_id = $postdata['cream_id'];
        }else{
            $cream_id = '';
        }

        $insertarray = array('pid'=>$pid,'ptable'=>'product','slot_id'=>$postdata['slot_id'],'slot_name'=>$postdata['selected_slot'],'delivery_rate'=>$postdata['slot_price'],
        'time_name'=>$postdata['selected_name'],'time_id'=>$postdata['selected_time'],'delivery_date'=>$delivery_date,'message'=>$message,'quantity'=>$quantity,
        'addonmenu_id'=>$addonmenu,'pincode'=>$pincode,'added_on'=>$addedon_date,'flavor_id'=>$postdata['flavor_id'],'shape_id'=>$shape_id,'cream_id'=>$cream_id);
        
        //$buynow_session = $this->session->userdata('buynow_session');
        $this->session->set_userdata('buynow_session',$insertarray);        
        
        $final_cartsession = $this->session->userdata('buynow_session');
        if(!empty($final_cartsession)){
            $return['status'] = true;            
        }else{
            $return['status'] = false;            
        }
        return $return;
    }

    public function save_buynow_indb($postdata){
        
        $selected_date_time = $postdata['selected_date'];
        $datetimearray = explode(' ',$selected_date_time);
        $finaldatetime = "$datetimearray[1] $datetimearray[2] $datetimearray[3] $datetimearray[4]";        
        $selected_date = date('Y-m-d',strtotime($finaldatetime));

        $return = array();
        $pid = $postdata['pid'];
        $delivery_date = $selected_date;
        
        $message = $postdata['message'];
        $quantity = $postdata['quantity'];
        if(!empty($postdata['addonmenu'])){
            $addonmenu = json_encode($postdata['addonmenu']);
        }else{
            $addonmenu = '';
        }
        $pincode = $postdata['pincode'];
        $addedon_date = date('Y-m-d H:i:s');
        $cust_id = $this->session->userdata('cuserid');
        if(!empty($postdata['shape_id'])){
            $shape_id = $postdata['shape_id'];
        }else{
            $shape_id = '';
        }
        if(!empty($postdata['cream_id'])){
            $cream_id = $postdata['cream_id'];
        }else{
            $cream_id = '';
        }
        
        $insertarray = array('pid'=>$pid,'ptable'=>'product','cust_id'=>$cust_id,'slot_id'=>$postdata['slot_id'],'slot_name'=>$postdata['selected_slot'],'delivery_rate'=>$postdata['slot_price'],
        'time_name'=>$postdata['selected_name'],'time_id'=>$postdata['selected_time'],'delivery_date'=>$delivery_date,'message'=>$message,'quantity'=>$quantity,
        'addonmenu_id'=>$addonmenu,'pincode'=>$pincode,'added_on'=>$addedon_date,'flavor_id'=>$postdata['flavor_id'],'shape_id'=>$shape_id,'cream_id'=>$cream_id);
        
        $status = $this->db->insert('cart',$insertarray);
        $insertid = $this->db->insert_id();
        $this->session->set_userdata('cart_addon_id',$insertid);
        if($status){
            $return['status'] = true; 
        }else{
            $return['status'] = false; 
        }
        return $return;
    }

    public function count_itemincart(){
        $status = $this->checkcustomer_login();
        $cart_count = 0;
        if($status){
            // user is login
            // count from database
            $cust_id = $this->session->userdata('cuserid');
            $query = $this->db->get_where('cart',array('cust_id'=>$cust_id,'status'=>'1'));
            $cart_count = $query->num_rows();
        }else{
            // user not logged in 
            // count from session
            $final_cartsession = $this->session->userdata('cart_session');
            if(!empty($final_cartsession)){
                $cart_count = count($final_cartsession);
            }else{
                $cart_count = 0;
            }            
        }
        return $cart_count;
    }

    public function save_addons($data){
        
        $added_on = date('Y-m-d H:i:s');
        $pcode = 'ADON-'.random_string('numeric',8);
        $data['pcode'] = $pcode;
        $data['added_on'] = $added_on;
        $return = $this->db->insert('addon_product',$data);
        if($return == true){
            // add product to cart
            $insertid = $this->db->insert_id();
            $date = date('Y-m-d H:i:s');
            $cartinsert_status = $this->db->insert('admin_stock',array('pid'=>$insertid,'pcode'=>$pcode,'quant'=>$data['stock_qty'],'rate'=>$data['price'],'record_id'=>$insertid,'table_name'=>'addon_product','stock_type'=>'PREV','made_on'=>$date));
            if($cartinsert_status){
                return true;
            }else{
                return false;
            }            
        }else{
            return false;
        }
    }

    public function update_addons($data){
        $editid = $data['editid'];
        unset($data['editid']); 
        $added_on = date('Y-m-d H:i:s');
        //$pcode = 'ADON-'.random_string('numeric',8);
        //$data['pcode'] = $pcode;
        $data['added_on'] = $added_on;
        $data['publish_status'] = 0;
        $return = $this->db->update('addon_product',$data,array('id'=>$editid));
        if($return == true){
            // add product to cart
            //$insertid = $this->db->insert_id();
            $date = date('Y-m-d H:i:s');
            $cartinsert_status = $this->db->update('admin_stock',array('quant'=>$data['stock_qty'],'rate'=>$data['price'],'stock_type'=>'PREV','made_on'=>$date),array('record_id'=>$editid,'table_name'=>'addon_product'));
            if($cartinsert_status){
                return true;
            }else{
                return false;
            }            
        }else{
            return false;
        }
    }

    public function getall_addons_productdata($where=array(),$type='all'){
        $this->db->select('t1.*,t2.name as catname');
        $this->db->from('addon_product as t1');
        $this->db->join('category as t2','t1.cat_id = t2.id');
        $this->db->where($where);  
        $query = $this->db->get(); 
        if($type == 'all'){
            $return = $query->result_array();
        }else{
            $return = $query->row_array();
        }
        return $return;
    }

    public function update_publish_addons_product($pid,$status){
        if($status == 'true'){
            // want to publish
           $status = $this->db->update('addon_product',array('publish_status'=>'1'),array('id'=>$pid,'status'=>'1'));           
        }else{
            // want to unpublish
            $status = $this->db->update('addon_product',array('publish_status'=>'0'),array('id'=>$pid,'status'=>'1'));           
        }
        if($status == true){
            return true;
        }else{
            return false;
        }
    }

    public function save_slot($data){

        $date = date('Y-m-d H:i:s');
        $data['added_on'] = $date;
        $return = $this->db->insert('delivery_slot',$data);
        if($return){
            return true;
        }else{
            return false;
        }
    }

    public function update_slot($data){
        $editid = $data['editid'];
        unset($data['editid']); 
        $date = date('Y-m-d H:i:s');
        $data['added_on'] = $date;
        $data['publish_status'] = 0;
        $return = $this->db->update('delivery_slot',$data,array('id'=>$editid));
        if($return){
            return true;
        }else{
            return false;
        } 
    }

    public function getall_slot($where=array(),$type='all'){
        $this->db->select('t1.*,t2.name as catname');
        $this->db->from('delivery_slot as t1');
        $this->db->join('location as t2','t1.location_id = t2.id');
        $this->db->where($where);  
        $query = $this->db->get(); 
        if($type == 'all'){
            $return = $query->result_array();
        }else{
            $return = $query->row_array();
        }
        return $return;
    }

    public function update_publish_slot($pid,$status){
        if($status == 'true'){
            // want to publish
           $status = $this->db->update('delivery_slot',array('publish_status'=>'1'),array('id'=>$pid,'status'=>'1'));           
        }else{
            // want to unpublish
            $status = $this->db->update('delivery_slot',array('publish_status'=>'0'),array('id'=>$pid,'status'=>'1'));           
        }
        if($status == true){
            return true;
        }else{
            return false;
        }
    }

    public function save_deliverytime($data){

        $f1 = $data['time_from']['0']; 
        $f2 = $data['time_from']['1']; 

        $t1 = $data['time_to']['0'];
        $t2 = $data['time_to']['1'];
        $time_from = "$f1:$f2";
        $time_to= "$t1:$t2";
        unset($data['time_from'],$data['time_to']);
        $data['time_from'] = $time_from;
        $data['time_to'] = $time_to;
        $data['name'] = "$time_from - $time_to";
        $date = date('Y-m-d H:i:s');
        $data['added_on'] = $date;
        $return = $this->db->insert('delivery_time',$data);
        if($return){
            return true;
        }else{
            return false;
        }
    }

    public function update_deliverytime($data){
        $editid = $data['editid'];
        unset($data['editid']);
        $f1 = $data['time_from']['0']; 
        $f2 = $data['time_from']['1']; 

        $t1 = $data['time_to']['0'];
        $t2 = $data['time_to']['1'];
        $time_from = "$f1:$f2";
        $time_to= "$t1:$t2";
        unset($data['time_from'],$data['time_to']);
        $data['time_from'] = $time_from;
        $data['time_to'] = $time_to;
        $data['name'] = "$time_from - $time_to";
        $date = date('Y-m-d H:i:s');
        $data['added_on'] = $date;
        $data['publish_status'] = 0;
        $return = $this->db->update('delivery_time',$data,array('id'=>$editid));
        if($return){
            return true;
        }else{
            return false;
        }
    }

    public function getall_deliverytime($where=array(),$type='all'){
        $this->db->select('t1.*,t2.name as catname,t3.name as slotname,t3.slot_price as slotprice,t3.slot_type as slottype');
        $this->db->from('delivery_time as t1');
        $this->db->join('location as t2','t1.location_id = t2.id');
        $this->db->join('delivery_slot as t3','t1.slot_id = t3.id');
        $this->db->where($where);  
        $query = $this->db->get(); 
        if($type == 'all'){
            $return = $query->result_array();
        }else{
            $return = $query->row_array();
        }
        return $return;
    }

    public function update_publish_time($pid,$status){
        if($status == 'true'){
            // want to publish
           $status = $this->db->update('delivery_time',array('publish_status'=>'1'),array('id'=>$pid,'status'=>'1'));           
        }else{
            // want to unpublish
            $status = $this->db->update('delivery_time',array('publish_status'=>'0'),array('id'=>$pid,'status'=>'1'));           
        }
        if($status == true){
            return true;
        }else{
            return false;
        }
    }

    public function save_productdetail($data){
        $date = date('Y-m-d H:i:s');
        $insertdata = array('added_on'=>$date);
        $desp = $data['desp'];
        $status = false;
        if(!empty($desp)){
            foreach($desp as $key=>$note){
                $insertdata['prod_id'] = $key;
                $insertdata['desp'] = $note;
                $status = $this->db->insert('product_detail',$insertdata);
            }
        }
        if($status){
            return true;
        }else{
            return false;
        }
    }

    public function check_detailpresent($prodid){
        $query = $this->db->get_where('product_detail',array('prod_id'=>$prodid,'status'=>'1'));
        if($query->num_rows() >0){
            return true;
        }else{
            return false; 
        }
    }

    public function getall_zones($where=array(),$type='all'){
        $this->db->select('t1.*');
        $this->db->from('delivery_zone as t1');        
        $this->db->where($where);  
        $query = $this->db->get(); 
        if($type == 'all'){
            $return = $query->result_array();
        }else{
            $return = $query->row_array();
        }
        return $return;
    }

    public function save_zone($data){
        $date = date('Y-m-d H:i:s');
        $data['added_on'] = $date;
        $return = $this->db->insert('delivery_zone',$data);
        if($return){
            return true;
        }else{
            return false;
        }
    }

    public function update_zone($data){
        $editid = $data['editid'];
        unset($data['editid']);
        $date = date('Y-m-d H:i:s');
        $data['added_on'] = $date;
        $data['publish_status'] = 0;
        $return = $this->db->update('delivery_zone',$data,array('id'=>$editid));
        if($return){
            return true;
        }else{
            return false;
        }
    }

    public function update_publish_zone($pid,$status){
        if($status == 'true'){
            // want to publish
           $status = $this->db->update('delivery_zone',array('publish_status'=>'1'),array('id'=>$pid,'status'=>'1'));           
        }else{
            // want to unpublish
            $status = $this->db->update('delivery_zone',array('publish_status'=>'0'),array('id'=>$pid,'status'=>'1'));           
        }
        if($status == true){
            return true;
        }else{
            return false;
        }
    }

    public function save_shape($postdata){
        $date = date('Y-m-d H:i:s');
        $postdata['added_on'] = $date;
        $return = $this->db->insert('shape',$postdata);
        if($return){
            return true;
        }else{
            return false;
        }
    }

    public function getall_shape($where=array(),$type='all'){

        $this->db->select('t1.*,t2.name as catname');
        $this->db->from('shape as t1');
        $this->db->join('category as t2','t1.cat_id = t2.id');
        $this->db->where($where);
        $query = $this->db->get();
        //echo $this->db->last_query();
        if($type == 'all'){
            $return = $query->result_array();
        }else{
            $return = $query->row_array();
        }
        return $return;
    }

    public function update_shape($postdata){
        $editid = $postdata['edit_id'];
        unset($postdata['edit_id']);
        $date = date('Y-m-d H:i:s');
        $postdata['added_on'] = $date;
        $return = $this->db->update('shape',$postdata,array('id'=>$editid));
        if($return){
            return true;
        }else{
            return false;
        }
    }

    public function save_cream($postdata){
        $date = date('Y-m-d H:i:s');
        $postdata['added_on'] = $date;
        $sizearray = $postdata['size'];
        $pricearray = $postdata['price'];
        unset($postdata['size'],$postdata['price']);
        $price_sizearray = array();
        if(!empty($sizearray)){ 
            foreach($sizearray as $key=>$sizes){
                if(!empty($pricearray[$key])){
                    $price_sizearray[$sizes] = number_format((float)$pricearray[$key],2);
                }
            }           
        }
        if(!empty($price_sizearray)){
            $jsonarray = json_encode($price_sizearray);
            $postdata['size_price'] = $jsonarray;
            //print_r($postdata);die;
            $return = $this->db->insert('cream',$postdata);
            if($return){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }       
    }

    public function getall_cream($where=array(),$type='all'){

        $this->db->select('t1.*,t2.name as catname');
        $this->db->from('cream as t1');
        $this->db->join('category as t2','t1.cat_id = t2.id');
        $this->db->where($where);
        $query = $this->db->get();
        //echo $this->db->last_query();
        if($type == 'all'){
            $return = $query->result_array();
        }else{
            $return = $query->row_array();
        }
        return $return;
    }    

    public function update_cream($postdata){
        $editid = $postdata['edit_id'];
        unset($postdata['edit_id']);
        $date = date('Y-m-d H:i:s');
        $postdata['added_on'] = $date;
        $sizearray = $postdata['size'];
        $pricearray = $postdata['price'];
        unset($postdata['size'],$postdata['price']);   
        $price_sizearray = array();     
        if(!empty($sizearray)){ 
            foreach($sizearray as $key=>$sizes){
                if(!empty($pricearray[$key])){
                    $price_sizearray[$sizes] = $pricearray[$key];
                }
            }           
        }
        if(!empty($price_sizearray)){
            $jsonarray = json_encode($price_sizearray);
            $postdata['size_price'] = $jsonarray;
            $return = $this->db->update('cream',$postdata,array('id'=>$editid));
            if($return){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function getall_addonmenu($where=array(),$type='all'){

        $this->db->select('t1.*,t2.name as catname');
        $this->db->from('addonmenu as t1');
        $this->db->join('category as t2','t1.cat_id = t2.id');
        $this->db->where($where);
        $query = $this->db->get();
        //echo $this->db->last_query();
        if($type == 'all'){
            $return = $query->result_array();
        }else{
            $return = $query->row_array();
        }
        return $return;
    }

    public function save_addonmenu($postdata){
        $date = date('Y-m-d H:i:s');
        $postdata['added_on'] = $date;
        $sizearray = $postdata['size'];
        $pricearray = $postdata['price'];
        unset($postdata['size'],$postdata['price']);
        $price_sizearray = array();
        if(!empty($sizearray)){ 
            foreach($sizearray as $key=>$sizes){
                if(!empty($pricearray[$key])){
                    $price_sizearray[$sizes] = number_format((float)$pricearray[$key],2);;
                }
            }           
        }
        if(!empty($price_sizearray)){
            $jsonarray = json_encode($price_sizearray);
            $postdata['size_price'] = $jsonarray;
            $return = $this->db->insert('addonmenu',$postdata);
            if($return){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }       
    }

    public function update_addonmenu($postdata){
        $editid = $postdata['edit_id'];
        unset($postdata['edit_id']);
        $date = date('Y-m-d H:i:s');
        $postdata['added_on'] = $date;
        $sizearray = $postdata['size'];
        $pricearray = $postdata['price'];
        unset($postdata['size'],$postdata['price']);   
        $price_sizearray = array();     
        if(!empty($sizearray)){ 
            foreach($sizearray as $key=>$sizes){
                if(!empty($pricearray[$key])){
                    $price_sizearray[$sizes] = $pricearray[$key];
                }
            }           
        }
        if(!empty($price_sizearray)){
            $jsonarray = json_encode($price_sizearray);
            $postdata['size_price'] = $jsonarray;
            $return = $this->db->update('addonmenu',$postdata,array('id'=>$editid));
            if($return){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function getall_customerdata($where=array(),$type='all'){

        $this->db->select('t1.*,t2.name,t2.email,t2.mobile_no,t2.image_path,t2.referal_code');
        $this->db->from('customer_login as t1');
        $this->db->join('customer_detail as t2','t1.detail_id = t2.id');
        $this->db->where($where);
        $query = $this->db->get();
        //echo $this->db->last_query();
        if($type == 'all'){
            $return = $query->result_array();
        }else{
            $return = $query->row_array();
        }
        return $return;
    }

    public function getall_customer_address($where=array(),$type='all'){
        $this->db->select('t1.*,t2.name');
        $this->db->from('customer_address as t1');
        $this->db->join('customer_detail as t2','t1.cust_id = t2.id');
        $this->db->where($where);
        $this->db->group_by('t1.pincode');
        //$this->db->order_by('t1.id','desc');
        $query = $this->db->get();
        //echo $this->db->last_query();
        if($type == 'all'){
            $return = $query->result_array();
        }else{
            $return = $query->row_array();
        }
        return $return;
    }

    public function getall_orderdata($where=array(),$type='all'){
        $this->db->select('t1.*,t2.name');
        $this->db->from('order as t1');
        $this->db->join('customer_detail as t2','t1.cust_id = t2.id');
        $this->db->where($where);
        $query = $this->db->get();
        //echo $this->db->last_query();
        if($type == 'all'){
            $return = $query->result_array();
        }else{
            $return = $query->row_array();
        }
        return $return;
    }

    public function getall_orderdata_detail($where=array(),$type='all'){

        $this->db->select('t1.*,t2.name as custname,t3.name as flavorname,t4.name as shapename,t5.name as creamname,t6.pid as p_pid,t6.pcode as p_pcode,t6.product_name as p_productname,t6.quantity as p_quantity,t6.price as p_price,t6.ptable as p_ptable');
        $this->db->from('order as t1');
        $this->db->join('customer_detail as t2','t1.cust_id = t2.id');
        $this->db->join('subcategory as t3','t1.flavor_id = t3.id');        
        $this->db->join('shape as t4','t1.shape_id = t4.id','left');
        $this->db->join('cream as t5','t1.cream_id = t5.id','left');
        $this->db->join('order_product as t6','t1.id = t6.order_id');          
        $this->db->where($where);
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        if($type == 'all'){
            $return = $query->result_array();
        }else{
            $return = $query->row_array();
        }
        return $return;
    } 

    public function get_product_variant_image($pid,$ptable){
        $returndata = array();
        if($ptable == 'product'){
            $productdata = $this->get_productdata(array('id'=>$pid,'status'=>'1'),'single');
            $returndata['image_path'] = $productdata['path'];
        }else{
            $productdata = $this->getall_addons_productdata(array('t1.id'=>$pid,'t1.status'=>'1'),'single');
            $returndata['image_path'] = $productdata['path'];
        }
        if(!empty($productdata['variant_id'])){
            $variantid = $productdata['variant_id'];
            $variantdata = $this->getall_quantity(array('t1.id'=>$variantid,'t1.status'=>'1'),'single');
            $returndata['quant_text'] = $variantdata['quant_text'];
            $returndata['v_name'] = $variantdata['name'];
        }
        return $returndata;
    }

    public function check_published($subcatid){
       $query =  $this->db->get_where('webcatgrid',array('subcat_id'=>$subcatid,'publish_status'=>'1'));
       //echo $this->db->last_query();
       $rows = $query->num_rows();
       if($rows >0){
        return true;
       }else{
        return false;
       }
    }

    public function update_publish_categorygrid($pid,$status){
        if($status == 'true'){
            // want to publish
            $truequery = $this->db->get_where('webcatgrid',array('subcat_id'=>$pid,'status'=>'1'));
            if($truequery->num_rows() > 0){
                $status = $this->db->update('webcatgrid',array('publish_status'=>'1'),array('subcat_id'=>$pid,'status'=>'1'));           
            }else{
                $status = $this->db->insert('webcatgrid',array('publish_status'=>'1','subcat_id'=>$pid,'status'=>'1'));
            }
        }else{
            // want to unpublish
            $truequery = $this->db->get_where('webcatgrid',array('subcat_id'=>$pid,'status'=>'1'));
            if($truequery->num_rows() > 0){
                $status = $this->db->update('webcatgrid',array('publish_status'=>'0'),array('subcat_id'=>$pid,'status'=>'1'));           
            }else{
                $status = $this->db->insert('webcatgrid',array('publish_status'=>'0','subcat_id'=>$pid,'status'=>'1'));
            }
        }
        if($status == true){
            return true;
        }else{
            return false;
        }
    }

    public function check_published_subcatproduct($subcatid){
        $query =  $this->db->get_where('websubcatproduct',array('subcat_id'=>$subcatid,'publish_status'=>'1'));
        //echo $this->db->last_query();
        $rows = $query->num_rows();
        if($rows >0){
         return true;
        }else{
         return false;
        }
    }

    public function update_publish_subcatproduct($pid,$status){
        if($status == 'true'){
            // want to publish
            $truequery = $this->db->get_where('websubcatproduct',array('subcat_id'=>$pid,'status'=>'1'));
            if($truequery->num_rows() > 0){
                $status = $this->db->update('websubcatproduct',array('publish_status'=>'1'),array('subcat_id'=>$pid,'status'=>'1'));           
            }else{
                $status = $this->db->insert('websubcatproduct',array('publish_status'=>'1','subcat_id'=>$pid,'status'=>'1'));
            }
        }else{
            // want to unpublish
            $truequery = $this->db->get_where('websubcatproduct',array('subcat_id'=>$pid,'status'=>'1'));
            if($truequery->num_rows() > 0){
                $status = $this->db->update('websubcatproduct',array('publish_status'=>'0'),array('subcat_id'=>$pid,'status'=>'1'));           
            }else{
                $status = $this->db->insert('websubcatproduct',array('publish_status'=>'0','subcat_id'=>$pid,'status'=>'1'));
            }
        }
        if($status == true){
            return true;
        }else{
            return false;
        }
    }

    public function delete_status($postdata){
        $table_name = $postdata['table'];
        $id = $postdata['id'];
        $update_status = $this->db->update("$table_name",array('status'=>'0'),array('id'=>$id));
        if($update_status){
            return true;
        }else{
            return false;
        }
    }

    public function check_catdesign($catid){
        $query =  $this->db->get_where('webcatdesign',array('cat_id'=>$catid)); 
        $rows = $query->num_rows();  
        $data = $query->row_array();       
        if($rows >0){
         return $data;
        }else{
         return false;
        }
    }

    public function update_publish_catdesign($pid,$status){
        if($status == 'true'){
            // want to publish
            $truequery = $this->db->get_where('webcatdesign',array('cat_id'=>$pid,'status'=>'1'));
            if($truequery->num_rows() > 0){
                $status = $this->db->update('webcatdesign',array('publish_status'=>'1'),array('cat_id'=>$pid,'status'=>'1'));           
            }else{
                $status = $this->db->insert('webcatdesign',array('publish_status'=>'1','cat_id'=>$pid,'status'=>'1'));
            }
        }else{
            // want to unpublish
            $truequery = $this->db->get_where('webcatdesign',array('cat_id'=>$pid,'status'=>'1'));
            if($truequery->num_rows() > 0){
                $status = $this->db->update('webcatdesign',array('publish_status'=>'0'),array('cat_id'=>$pid,'status'=>'1'));           
            }else{
                $status = $this->db->insert('webcatdesign',array('publish_status'=>'0','cat_id'=>$pid,'status'=>'1'));
            }
        }
        if($status == true){
            return true;
        }else{
            return false;
        }
    }

    public function update_catdesign_type($pid,$design_type,$subcat,$publish_status){
        if($design_type != '-'){
            $truequery = $this->db->get_where('webcatdesign',array('cat_id'=>$pid,'status'=>'1'));
            //echo $this->db->last_query();
            if($truequery->num_rows() > 0){
                // update val
                if(!empty($subcat)){
                    $subcat = json_encode($subcat);
                    $status = $this->db->update('webcatdesign',array('design_type'=>"$design_type",'publish_status'=>"$publish_status",'subcat_id'=>$subcat),array('cat_id'=>$pid,'status'=>'1')); 
                }else{
                    $status = $this->db->update('webcatdesign',array('design_type'=>"$design_type",'publish_status'=>"$publish_status",'subcat_id'=>''),array('cat_id'=>$pid,'status'=>'1')); 
                }
            }else{
                // insert val
                if(!empty($subcat)){
                    $subcat = json_encode($subcat);
                    $status = $this->db->insert('webcatdesign',array('design_type'=>"$design_type",'cat_id'=>$pid,'publish_status'=>"$publish_status",'subcat_id'=>$subcat,'status'=>'1'));
                }else{
                    $status = $this->db->insert('webcatdesign',array('design_type'=>"$design_type",'cat_id'=>$pid,'publish_status'=>"$publish_status",'status'=>'1'));
                }
            }
            //echo $this->db->last_query();
            if($status == true){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }        
    }

    public function getall_category_from_webdesign(){

        $this->db->select('t1.*,t2.name as catname,t2.slug as catslug');
        $this->db->from('webcatdesign as t1');
        $this->db->join('category as t2','t1.cat_id = t2.id');
        $this->db->where(array('t1.publish_status'=>'1','t1.status'=>'1'));
        $query = $this->db->get();
        //echo $this->db->last_query();
        $return = $query->result_array();       
        return $return;        
    }
    
}