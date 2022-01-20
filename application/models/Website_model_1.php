<?php
class Website_model_1 extends CI_Model{
	
	function __construct(){
		parent::__construct(); 
		$this->db->db_debug = false;
    }

    public function validatesignup($data){
        $mobileno = $data['mobileno'];
        $name = $data['first_name'].' '.$data['last_name'];
        $email = $data['email'];
        $password = $data['password'];
        $date = date('Y-m-d H:i:s');
        $refcode = random_string('alnum',8);
        $return = array();
        $query = $this->db->get_where('customer_detail',array('mobile_no'=>$mobileno,'status'=>'1','block_status'=>'0'));
        if($query->num_rows() > 0){
            // already  a customer 
            $return['status'] = false;
            $return['msg'] = 'Already a Registered Customer !!';
        }else{       
            $insertdata = array('name'=>$name,'email'=>$email,'mobile_no'=>$mobileno,'image_path'=>'/assets/images/blank.png',
            'created_on'=>$date,'referal_code'=>$refcode);
            $insertstatus = $this->db->insert('customer_detail',$insertdata);
            //echo $this->db->last_query();die;
            if($insertstatus == true){
                $insertid = $this->db->insert_id();
                $salt = random_string('alnum',6);
                $hash_password = md5($password.SITE_SALT.$salt);
                $logininsertdata = array('detail_id'=>$insertid,'username'=>$mobileno,'password'=>$hash_password,
                'salt'=>$salt,'vp'=>$password);
                $loginstatus = $this->db->insert('customer_login',$logininsertdata);
                if($loginstatus == true){
                    $this->load->helper('sms');
                    $smsarray = array('mobile'=>$mobileno,'message'=>"Hii $name,\nYour Bless Fresh Account is Created Successfully.\nYour Username is $mobileno and password is $password");
                    send_sms($smsarray);
                    $return['status'] = true;
                    $return['msg'] = 'Registration Done Successfully !!';
                }else{
                    $return['status'] = false;
                    $return['msg'] = 'Please Try Again !!';
                }
            }else{
                $return['status'] = false;
                $return['msg'] = 'Please add Your Details Carefully!!';
            }
        }

        return $return;
    }

    public function validatelogin($data){
        $username = $data['username'];
        $password = $data['password'];
        $return = array();
        $query = $this->db->get_where('customer_login',array('username'=>$username,'status'=>'1'));
        if($query->num_rows() > 0){
            if($query->num_rows() == 1){
                $logindata = $query->row_array();
                $hashpassword = md5($password.SITE_SALT.$logindata['salt']);
                if($hashpassword == $logindata['password']){
                    $return['status'] = true;
                    $return['msg'] = 'Successfully Logged In !!'; 
                    $return['cdata'] = $logindata;
                }else{
                    $return['status'] = false;
                    $return['msg'] = 'Wrong Password !!'; 
                }
            }else{  
                $return['status'] = false;
                $return['msg'] = 'Multiple registration is made !!'; 
            }
        }else{
            $return['status'] = false;
            $return['msg'] = 'Please Register First Before Logging !!'; 
        }
        return $return;
    }

    public function start_session($cdata){
        $custname = $this->db->get_where('customer_detail',array('id'=>$cdata['detail_id'],'status'=>'1'))->row()->name;
        $sessionarray = array('cuserid'=>$cdata['id'],'role'=>'2','name'=>$custname);
        $this->session->set_userdata($sessionarray);
    }
  
    public function update_loggedon($id){
        $date = date('Y-m-d H:i:s');
        $this->db->update('customer_login',array('logged_on'=>$date),array('id'=>$id));
    }

    public function move_sessionto_cart(){
        $cartsession = $this->session->userdata('cart_session');
        $buynowsession = $this->session->userdata('buynow_session');
        if(!empty($cartsession)){
            // already present session                          
            foreach($cartsession as $postdata){
                $pid = $postdata['pid'];                
                $addedon_date = date('Y-m-d H:i:s');
                $cust_id = $this->session->userdata('cuserid');
                
                $delivery_date = $postdata['delivery_date'];                    
                $message = $postdata['message'];
                $quantity = $postdata['quantity'];
                $addonmenu_id = $postdata['addonmenu_id'];
                
                $pincode = $postdata['pincode'];

                $insertarray = array('pid'=>$pid,'ptable'=>'product','cust_id'=>$cust_id,'slot_id'=>$postdata['slot_id'],'slot_name'=>$postdata['slot_name'],'delivery_rate'=>$postdata['delivery_rate'],
                'time_name'=>$postdata['time_name'],'time_id'=>$postdata['time_id'],'delivery_date'=>$delivery_date,'message'=>$message,'quantity'=>$quantity,
                'addonmenu_id'=>$addonmenu_id,'pincode'=>$pincode,'added_on'=>$addedon_date,'flavor_id'=>$postdata['flavor_id'],'shape_id'=>$postdata['shape_id'],'cream_id'=>$postdata['cream_id']);
                
                $status = $this->db->insert('cart',$insertarray);                
                $cart_insertid = $this->db->insert_id();
                $addon_insert_id = array();

                if(!empty($postdata['addons'])){
                    $addons = $postdata['addons'];
                    foreach($addons as $adds){
                        $insertarray = array('pid'=>$adds['pid'],'ptable'=>$adds['ptable'],'cust_id'=>$cust_id,'quantity'=>$adds['quantity'],'added_on'=>$addedon_date);
                        $this->db->insert('cart_addon',$insertarray); 
                        $addon_insert_id[] = $this->db->insert_id();
                    }
                    $addon_list = json_encode($addon_insert_id);
                    $this->db->update('cart',array('addons_list'=>$addon_list),array('id'=>$cart_insertid));
                }              
            }
            if($status == true){
                $this->session->unset_userdata('cart_session');
            }
            // added to cart successfully
        }
        //echo PRE;print_r($buynowsession);die;
        if(!empty($buynowsession)){
                $postdata = $buynowsession;
                $pid = $postdata['pid'];                
                $addedon_date = date('Y-m-d H:i:s');
                $cust_id = $this->session->userdata('cuserid');                
                $delivery_date = $postdata['delivery_date'];               
                $message = $postdata['message'];
                $quantity = $postdata['quantity'];
                $addonmenu_id = $postdata['addonmenu_id'];
                $pincode = $postdata['pincode'];

                $insertarray = array('pid'=>$pid,'ptable'=>'product','cust_id'=>$cust_id,'slot_id'=>$postdata['slot_id'],'slot_name'=>$postdata['slot_name'],'delivery_rate'=>$postdata['delivery_rate'],
                'time_name'=>$postdata['time_name'],'time_id'=>$postdata['time_id'],'delivery_date'=>$delivery_date,'message'=>$message,'quantity'=>$quantity,
                'addonmenu_id'=>$addonmenu_id,'pincode'=>$pincode,'added_on'=>$addedon_date,'flavor_id'=>$postdata['flavor_id'],'shape_id'=>$postdata['shape_id'],'cream_id'=>$postdata['cream_id']);
                
                $status = $this->db->insert('cart',$insertarray);  
                              
                $cart_insertid = $this->db->insert_id();
                $addon_insert_id = array();

                if(!empty($postdata['addons'])){
                    $addons = $postdata['addons'];
                    foreach($addons as $adds){
                        $insertarray = array('pid'=>$adds['pid'],'ptable'=>$adds['ptable'],'cust_id'=>$cust_id,'quantity'=>$adds['quantity'],'added_on'=>$addedon_date);
                        $status = $this->db->insert('cart_addon',$insertarray);
                        $addon_insert_id[] = $this->db->insert_id();
                    }
                    $addon_list = json_encode($addon_insert_id);
                    $this->db->update('cart',array('addons_list'=>$addon_list),array('id'=>$cart_insertid));
                }
            if($status == true){
                $this->session->unset_userdata('buynow_session');
            }
        }
    }

    public function getall_cartcontentlist($cust_id=NULL){
        $loggedin_status = $this->Master_model->checkcustomer_login();
        $cartdata = array();
        if($loggedin_status){            
            // customer logged in
            // get cart data from db
            if(empty($cust_id)){
                $cust_id = $this->session->userdata('cuserid');
            }
            $query = $this->db->get_where('cart',array('cust_id'=>$cust_id,'status'=>'1'));
            $cartdb = $query->result_array();
            if(!empty($cartdb)){
                $cart_productdata  = array();
                foreach($cartdb as $key=>$cart){   
                    $cartdata[$key] = $cart;                 
                    $cart_productdata = $this->Master_model->getall_productdata(array('t1.id'=>$cart['pid'],'t1.status'=>'1'),'single');
                    if(!empty($cart['addons_list'])){
                        $addon_data_list = array();
                        $addon_ids = json_decode($cart['addons_list'],true);
                        foreach($addon_ids as $add_key=>$addons){
                            $singleaddon = $this->db->get_where('cart_addon',array('status'=>'1','id'=>$addons))->row_array();
                            
                            $singleaddon_detail = $this->Master_model->getall_addons_productdata(array('t1.id'=>$singleaddon['pid'],'t1.status'=>'1'),'single');
                            $addon_data_list[$add_key] = $singleaddon;
                            $addon_data_list[$add_key]['detail'] = $singleaddon_detail;
                        }
                        $cartdata[$key]['addondata'] = $addon_data_list;
                    }
                    if(!empty($cart['addonmenu_id'])){
                        $addonmenu_data_list = array();
                        $addonmenu_ids = json_decode($cart['addonmenu_id'],true);
                        foreach($addonmenu_ids as $addonmenu){                           
                            $singleaddon_detail = $this->Master_model->getall_addonmenu(array('t1.id'=>$addonmenu,'t1.status'=>'1'),'single');
                            $addonmenu_data_list[] = $singleaddon_detail;                           
                        }
                        $cartdata[$key]['addonmenu_data'] = $addonmenu_data_list;
                    }
                    $cartdata[$key]['productdata'] = $cart_productdata;
                }                
            }
        }else{
            // customer not logged in
            // get cart data from session
            $cartsession = $this->session->userdata('cart_session');
            if(!empty($cartsession)){
                $cart_productdata  = array();
                foreach($cartsession as $key=>$cart){
                    $cartdata[$key] = $cart; 
                    $cart_productdata = $this->Master_model->getall_productdata(array('t1.id'=>$cart['pid'],'t1.status'=>'1'),'single');
                    if(!empty($cart['addons'])){
                        $addon_data_list = array();
                        $addon_ids = $cart['addons'];
                        foreach($addon_ids as $add_key=>$addons){              
                            
                            $singleaddon_detail = $this->Master_model->getall_addons_productdata(array('t1.id'=>$addons['pid'],'t1.status'=>'1'),'single');
                            $addon_data_list[$add_key] = $addons;
                            $addon_data_list[$add_key]['detail'] = $singleaddon_detail;
                        }
                        $cartdata[$key]['addondata'] = $addon_data_list;
                    } 
                    if(!empty($cart['addonmenu_id'])){
                        $addonmenu_data_list = array();
                        $addonmenu_ids = json_decode($cart['addonmenu_id'],true);                        
                        foreach($addonmenu_ids as $addonmenu){  
                            //print_r($addonmenu);                         
                            $singleaddon_detail = $this->Master_model->getall_addonmenu(array('t1.id'=>$addonmenu,'t1.status'=>'1'),'single');
                            $addonmenu_data_list[] = $singleaddon_detail;                           
                        }
                        $cartdata[$key]['addonmenu_data'] = $addonmenu_data_list;
                    }                   
                    $cartdata[$key]['productdata'] = $cart_productdata;
                }
            }
        }
        return $cartdata;
    }

    public function get_deliveryslot($preptime,$catid,$dateandtime){
        $convert_preptime = ceil($preptime/60);  
        $selecteddate = date('Y-m-d',strtotime($dateandtime));
        $time_at_cakeready = date('Y-m-d H:i:s',strtotime("+$convert_preptime Hours")); // if order is placed right now

        $deliverytime_list = $this->Master_model->getall_deliverytime(array('t1.status'=>'1','t1.publish_status'=>'1','t1.cat_id'=>$catid),'all');
        $deliveryslot_list = array();
        if(!empty($deliverytime_list)){
            foreach($deliverytime_list as $dlist){
                $deliverytime = "$selecteddate $dlist[time_from]";
                if(strtotime($time_at_cakeready) < strtotime($deliverytime)){
                $deliveryslot_list[$dlist['slot_id']] = array('id'=>$dlist['slot_id'],'slotname'=>$dlist['slotname'],'slottype'=>$dlist['slottype'],'slotprice'=>$dlist['slotprice']);
                }
            }
        }
        return $deliveryslot_list;
    }

    public function get_deliverytime($preptime,$catid,$dateandtime,$slotid){
        $convert_preptime = ceil($preptime/60);  
        $selecteddate = date('Y-m-d',strtotime($dateandtime));
        $time_at_cakeready = date('Y-m-d H:i:s',strtotime("+$convert_preptime Hours"));
        $deliverytime_list = $this->Master_model->getall_deliverytime(array('t1.status'=>'1','t1.publish_status'=>'1','t1.cat_id'=>$catid,'t1.slot_id'=>$slotid),'all');
        $finaltime_list = array();
        if(!empty($deliverytime_list)){
            foreach($deliverytime_list as $dlist){
                $deliverytime = "$selecteddate $dlist[time_from]";
                if(strtotime($time_at_cakeready) < strtotime($deliverytime)){
                    $finaltime_list[] = $dlist;
                }
            }
        }
        return $finaltime_list;
    }

    public function check_pincode($pincode){

        $pincodedata = $this->Master_model->getall_zones(array('t1.pincode'=>$pincode,'t1.status'=>'1','t1.publish_status'=>'1'),'single');
        $return = array();
        if(!empty($pincodedata)){
            $return['status'] = true;
            $return['data'] = $pincodedata;
        }else{
            // not available
            $return['status'] = false;
        }
        return $return;
    }

    public function save_addons_forcartorbuynow($post){
        $comingfrom = $post['comingfrom'];
        $loggedin_status = $this->Master_model->checkcustomer_login();
        $return = false;
        if($loggedin_status){
            if($comingfrom == 'cart'){
                // cart and cust is logged in so add to the db
                $return = $this->addon_addtocartdb($post);
            }elseif($comingfrom == 'buynow'){
                // buynow and cust is logged in so add to the db
                $return = $this->addon_addtocartdb($post);
            }
        }else{
            if($comingfrom == 'cart'){
                // cart and cust is logged in so add to the session
                $return = $this->addon_addtosession($post,'cart');
            }elseif($comingfrom == 'buynow'){
                // buynow and cust is logged in so add to the session
                $return = $this->addon_addtosession($post,'buynow');
            }
        }
        return $return;
    }

    public function addon_addtocartdb($post){
        $cust_id = $this->session->userdata('cuserid');
        $addons = array();
        if(isset($post['checkup'])){
            $addons = $post['checkup'];
        }else{
            return false;
        }         
        $quantity = $post['quantity'];
        $insert_status = false;
        $addon_insert_id = array();
        if(!empty($addons)){
            foreach($addons as $key=>$adds){
                $date = date('Y-m-d H:i:s');
                $insertarray = array('pid'=>$adds,'cust_id'=>$cust_id,'quantity'=>$quantity[$key],'ptable'=>'addon_product','added_on'=>$date);
                $insert_status = $this->db->insert('cart_addon',$insertarray);
                $insertid = $this->db->insert_id();
                $addon_insert_id[] = $insertid; 
            }
        }
        $addon_json = json_encode($addon_insert_id);
        if($insert_status){
            $cartid = $this->session->userdata('cart_addon_id');
            $updatecart = $this->db->update('cart',array('addons_list'=>$addon_json),array('id'=>$cartid));
        }
        if($updatecart){
            $this->session->unset_userdata('cart_addon_id');
            return true;
        }else{
            return false;
        }
    }

    public function addon_addtosession($post,$type){
        $addons = array();
        if(isset($post['checkup'])){
            $addons = $post['checkup'];
        }else{
            return false;
        }        
        $quantity = $post['quantity'];
        $insert_status = false;
        if($type == 'cart'){
            if(!empty($addons)){
                foreach($addons as $key=>$adds){
                    $date = date('Y-m-d H:i:s');
                    $insertarray = array('pid'=>$adds,'ptable'=>'addon_product','quantity'=>$quantity[$key],'added_on'=>$date);
                    $cartsession = $this->session->userdata('cart_session');
                    if(!empty($cartsession)){
                        // already present session
                        $cartid = $this->session->userdata('cart_addon_id');
                        $cartsession[$cartid]['addons'][] = $insertarray;
                        $this->session->set_userdata('cart_session',$cartsession);
                    }
                }
            }
            $final_cartsession = $this->session->userdata('cart_session');
            if(!empty($final_cartsession)){
                $this->session->unset_userdata('cart_addon_id');
                $insert_status = true;                
            }else{
                $insert_status = false;                
            }
        }else{
            if(!empty($addons)){
                foreach($addons as $key=>$adds){
                    $date = date('Y-m-d H:i:s');
                    $insertarray = array('pid'=>$adds,'ptable'=>'addon_product','quantity'=>$quantity[$key],'added_on'=>$date);
                    $buynowsession = $this->session->userdata('buynow_session');
                    if(!empty($buynowsession)){
                        // already present session
                        $buynowsession['addons'][] = $insertarray;
                        $this->session->set_userdata('buynow_session',$buynowsession);
                    }
                }
            }
            $final_cartsession = $this->session->userdata('buynow_session');
            if(!empty($final_cartsession)){                
                $insert_status = true;                
            }else{
                $insert_status = false;                
            }
        }
        return $insert_status;
    }

    public function removeprod_cart($cartkey){
        $loggedin_status = $this->Master_model->checkcustomer_login();
        if($loggedin_status){
            // remove from database
            $cust_id = $this->session->userdata('cuserid');
            $query = $this->db->get_where('cart',array('cust_id'=>$cust_id,'status'=>'1'));
            $cartlist = $query->result_array();
            if(isset($cartlist[$cartkey])){
                $id = $cartlist[$cartkey]['id'];
                $updatestatus = $this->db->update('cart',array('status'=>'0'),array('id'=>$id));
                if($updatestatus){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            // remove from the session
            $cart_session = $this->session->userdata('cart_session');            
            if(isset($cart_session[$cartkey])){
                unset($cart_session[$cartkey]);
                $this->session->set_userdata('cart_session',$cart_session);
                return true;
            }else{
                return false;
            }
        }
    }

    public function get_customerdetail(){
       $userid =  $this->session->userdata('cuserid');
       $this->db->select("t1.*,t2.name as cust_name,t2.mobile_no as cust_mobile,t2.email as cust_email,t2.image_path as cust_image");
       $this->db->from('customer_login as t1');
       $this->db->join('customer_detail as t2',"t1.detail_id = t2.id");
       $this->db->where(array('t1.status'=>'1','t1.id'=>$userid));
       $query = $this->db->get();
       $custdata = $query->row_array();

       $query = $this->db->get_where('customer_address',array('cust_id'=>$userid,'status'=>'1'));
       $address_data = $query->result_array();
       if(!empty($address_data)){
           $custdata['addresses'] = $address_data;
       }
       return $custdata;
    }

    public function check_valid_deliverytime($time_id,$prep_time,$delivery_date){
       
       $final_prep_time = date('Y-m-d H:i:s',strtotime("+ $prep_time Minutes"));
       $deliverytime_data = $this->Master_model->getall_deliverytime(array('t1.id'=>$time_id,'t1.status'=>'1'),'single');
       if(!empty($deliverytime_data)){
           $time_from = "$delivery_date $deliverytime_data[time_from]";
           $final_prep = date('Y-m-d H:i:s',strtotime($final_prep_time)); 
           if(strtotime($final_prep) < strtotime($time_from)){
               return true;
           }else{
               return false;
           }
       }
    }

    public function update_address($postdata){
        $column = $postdata['column'];
        $value = $postdata['value'];
        $id = $postdata['id'];
        return $status = $this->db->update('customer_address',array("$column"=>"$value"),array('status'=>'1','id'=>$id));
    }

    public function save_placeorder($postdata){
        $return = array(); 
        $login_status = $this->Master_model->checkcustomer_login();
        if($login_status){
            $cartids_array = $postdata['cartid'];
            
            if(!empty($cartids_array)){$order_insertid_array = array();
                foreach($cartids_array as $cartid){
                    
                    if(isset($postdata['address'][$cartid])){
                        $address = $postdata['address'][$cartid];
                    }else{
                        $return['status'] = false;
                        $return['msg'] = "Please Enter Address !!";
                    }
                    if(isset($postdata['pincode'][$cartid])){
                        $pincode = $postdata['pincode'][$cartid];
                    }else{
                        $return['status'] = false;
                        $return['msg'] = "Please Enter Pincode !!";
                    }
                    if(isset($postdata['district'][$cartid])){
                        $district = $postdata['district'][$cartid];
                    }else{
                        $return['status'] = false;
                        $return['msg'] = "Please Enter District !!";
                    }
                    if(isset($postdata['state'][$cartid])){
                        $state = $postdata['state'][$cartid];
                    }else{
                        $return['status'] = false;
                        $return['msg'] = "Please Enter State !!";
                    }
                    if(isset($postdata['subtotal'][$cartid])){
                        $subtotal = $postdata['subtotal'][$cartid];
                    }else{
                        $return['status'] = false;
                        $return['msg'] = "Sorry Something Went Wrong !!";
                    }
                    $cartproduct_customerwise = $this->Website_model->getall_cartcontentlist();
                    if(!empty($cartproduct_customerwise)){ 
                        foreach($cartproduct_customerwise as $cartproduct){
                            if($cartproduct['id'] == $cartid){
                                $productdata = $cartproduct['productdata'];
                                $addondata = $cartproduct['addondata'];
                                $orderno = 'ORDER-'.random_string('numeric',8);
                                $cust_id = $this->session->userdata('cuserid');
                                $date = date('Y-m-d H:i:s');
                                if(!empty($cartproduct['message'])){
                                    $message = $cartproduct['message'];
                                }else{
                                    $message = '';
                                }
                                if(!empty($cartproduct['flavor_id'])){
                                    $flavor = $cartproduct['flavor_id'];
                                }else{
                                    $flavor = 0;
                                }
                                if(!empty($cartproduct['shape_id'])){
                                    $shape = $cartproduct['shape_id'];
                                }else{
                                    $shape = 0;
                                }
                                if(!empty($cartproduct['cream_id'])){
                                    $cream = $cartproduct['cream_id'];
                                }else{
                                    $cream = 0;
                                }
                                if(!empty($cartproduct['addonmenu_id'])){
                                    $addonmenu = $cartproduct['addonmenu_id'];
                                }else{
                                    $addonmenu = '';
                                }
                                $time = date('H:i:s'); 
                                $orderinsertdata =array('cust_id'=>$cust_id,'cart_id'=>$cartid,'order_no'=>$orderno,'msg'=>$message,'flavor_id'=>$flavor,'shape_id'=>$shape,'cream_id'=>$cream,'addonmenu_id'=>$addonmenu,
                                'delivery_rate'=>$cartproduct['delivery_rate'],'delivery_date'=>$cartproduct['delivery_date'],'time_slot'=>$cartproduct['time_name'],'delivery_address'=>$address,'delivery_pincode'=>$pincode,
                                'delivery_district'=>$district,'delivery_state'=>$state,'order_total'=>$subtotal,'delivery_status'=>'0','added_on'=>$date,'cur_time'=>$time,'status'=>'1');
                                $insert_status = $this->db->insert('order',$orderinsertdata);     
                                //$order_insertid = $this->db->insert_id();                            
                                if($insert_status){
                                    $order_insertid = $this->db->insert_id(); 
                                    $order_insertid_array[] = $order_insertid;
                                    $productinsertdata = array('order_id'=>$order_insertid,'order_no'=>$orderno,'cat_id'=>$cartproduct['productdata']['cat_id'],'pid'=>$cartproduct['productdata']['id'],
                                    'ptable'=>'product','pcode'=>$cartproduct['productdata']['pcode'],'product_name'=>$cartproduct['productdata']['product_name'],'quantity'=>$cartproduct['quantity'],
                                    'price'=>$cartproduct['productdata']['variant_offerprice'],'added_on'=>$date);
                                    $this->db->insert('order_product',$productinsertdata);
                                    if(!empty($addondata)){
                                        foreach($addondata as $addon){
                                            $addoninsertdata = array('order_id'=>$order_insertid,'order_no'=>$orderno,'cat_id'=>$addon['detail']['cat_id'],'pid'=>$addon['detail']['id'],
                                            'ptable'=>$addon['ptable'],'pcode'=>$addon['detail']['pcode'],'product_name'=>$addon['detail']['product_name'],'quantity'=>$addon['quantity'],
                                            'price'=>$addon['detail']['price'],'added_on'=>$date);
                                            $this->db->insert('order_product',$addoninsertdata);
                                        }
                                    }                                    
                                    $return['status'] = true;
                                    $return['msg'] = "Payment Window Started";
                                }else{
                                    $return['status'] = false;
                                    $return['msg'] = "Order Not Placed";
                                }                  
                                
                            }                            
                            $addressdata = array('cust_id'=>$cust_id,'address'=>$address,'pincode'=>$pincode,
                            'district'=>$district,'state'=>$state,'added_on'=>$date);
                            $this->db->insert('customer_address',$addressdata);                            
                        }
                        
                    }                    
                }
                $order_insertid_json = json_encode($order_insertid_array);
                $payment_session = array('added_on'=>$date,'order_id'=>$order_insertid_json);
                $this->session->set_userdata($payment_session);  
                $this->db->update('cart',array('status'=>'0'),array('cust_id'=>$cust_id));              
            }else{
                $return['status'] = false;
                $return['msg'] = "Your Cart Is Empty";
            }
        }else{
            $return['status'] = false;
            $return['msg'] = "Please Be Logged In While Placing Order !!";
        }
        return $return;
    }

    public function product_sort($filterpoints){
        $subcatid = $filterpoints['subcatid']; 
        $returnproduct = array();
        $subcatedata = $this->Master_model->getall_subcategory(array('t1.id'=>$subcatid),'single');
        if(isset($filterpoints['high_low'])){
            $allproductsdata = $this->Master_model->getall_productdata(array('t1.status'=>'1','t1.publish_status'=>'1','t1.cat_id'=>$subcatedata['cat_id']),'all',0,array('t1.variant_price','desc'),array('t1.id'));
        }elseif(isset($filterpoints['low_high'])){
            $allproductsdata = $this->Master_model->getall_productdata(array('t1.status'=>'1','t1.publish_status'=>'1','t1.cat_id'=>$subcatedata['cat_id']),'all',0,array('t1.variant_price','asc'),array('t1.id'));
        }else{
            $allproductsdata = $this->Master_model->getall_productdata(array('t1.status'=>'1','t1.publish_status'=>'1','t1.cat_id'=>$subcatedata['cat_id']),'all',0,'',array('t1.id'));
        }
        
        if(!empty($allproductsdata)){ 

            foreach($allproductsdata as $key=>$proddata){
                $subcatarray = json_decode($proddata['subcat_id'],true);
                if(!in_array($subcatid,$subcatarray)){
                    unset($allproductsdata[$key]);
                }
            }
            $returnproduct = $allproductsdata;

            if(isset($filterpoints['size'])){ 
                foreach($returnproduct as $key=>$proddata){
                    if($proddata['variant_id'] != $filterpoints['size']){
                        unset($returnproduct[$key]);
                    }
                }
            }
            if(isset($filterpoints['flavor'])){                
                foreach($returnproduct as $key=>$proddata){
                    $flavorarray = json_decode($proddata['flavor_id'],true);
                    if(!in_array($filterpoints['flavor'],$flavorarray)){
                        unset($returnproduct[$key]);
                    }
                }                
            }    

        }
        return $returnproduct;
    }

    public function update_order_curtime($id){
        $set = array('cur_time'=>date('H:i:s'));
        $studid = $this->session->userdata('cuserid');
        $where = array('id'=>$id,'cust_id'=>$studid);
        $status = $this->db->update('order',$set,$where);
        if($status == true){
            return true;
        }else{
            return false;
        }
    }

    public function getdifferencemin($start,$curecord){
       
        $date = date('Y-m-d');     
        $startone = strtotime("$start");
        $curone = strtotime("$date $curecord");
        $difference= $curone-$startone;
        $minutes = ceil($difference/60);
        return $minutes;
    }

    public function payment_due_popup(){
        $userid = $this->session->userdata('cuserid');
        $orderquery = $this->db->get_where('order',array('cust_id'=>$userid,'status'=>'1','payment_status'=>'0'));
        if($orderquery->num_rows() > 0){
            $orderdata = $orderquery->result_array(); 
            foreach($orderdata as $od){
                $addedon = $od['added_on'];
                //$curtime = $od['cur_time'];
                //$date = date('Y-m-d');
                $finaltime = date('Y-m-d H:i:s',strtotime($addedon.'+15 minutes'));
                $finalcurtime = date('Y-m-d H:i:s');
                if(strtotime($finaltime) > strtotime($finalcurtime)){
                    $this->session->set_userdata('order_id',$od['id']);
                }                
            }
            return true;
        }else{
            return false;
        }
    }

    public function getall_ordercontentlist(){
        
    }

}