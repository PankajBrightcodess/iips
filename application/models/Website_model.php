<?php
class Website_model extends CI_Model{
	
	function __construct(){
		parent::__construct(); 
		$this->db->db_debug = false;
    }

	public function product_sort($filterpoints){
        $catid = $filterpoints['cat_id'];
		$returnproduct = array(); 
		if(empty($filterpoints['prod_order'])){ $filterpoints['prod_order'] = 'low_to_high';}

		if(!empty($filterpoints['prod_order']) && $filterpoints['prod_order'] == 'low_to_high'){

			if(!empty($filterpoints['quantity'])){
				$quantity = $filterpoints['quantity'];        	
				$allproductsdata = $this->Master_model->getall_productdata(array('t1.status'=>'1','t1.publish_status'=>'1','t1.cat_id'=>$catid,'t4.variant_id'=>$quantity,'t3.status'=>'1'),'all','',array('t4.variant_offerprice','asc'));
			}else{
				$allproductsdata = $this->Master_model->getall_productdata(array('t1.status'=>'1','t1.publish_status'=>'1','t1.cat_id'=>$catid,'t3.status'=>'1'),'all','',array('t4.variant_offerprice','asc'),array('t1.id'));
			}

		}elseif(!empty($filterpoints['prod_order']) && $filterpoints['prod_order'] == 'high_to_low'){

			if(!empty($filterpoints['quantity'])){
				$quantity = $filterpoints['quantity'];        	
				$allproductsdata = $this->Master_model->getall_productdata(array('t1.status'=>'1','t1.publish_status'=>'1','t1.cat_id'=>$catid,'t4.variant_id'=>$quantity,'t3.status'=>'1'),'all','',array('t4.variant_offerprice','desc'));
			}else{
				$allproductsdata = $this->Master_model->getall_productdata(array('t1.status'=>'1','t1.publish_status'=>'1','t1.cat_id'=>$catid,'t3.status'=>'1'),'all','',array('t4.variant_offerprice','desc'),array('t1.id'));
			}

		}elseif(!empty($filterpoints['prod_order']) && $filterpoints['prod_order'] == 'alphabetical'){

			if(!empty($filterpoints['quantity'])){
				$quantity = $filterpoints['quantity'];        	
				$allproductsdata = $this->Master_model->getall_productdata(array('t1.status'=>'1','t1.publish_status'=>'1','t1.cat_id'=>$catid,'t4.variant_id'=>$quantity,'t3.status'=>'1'),'all','',array('t1.product_name','asc'));
			}else{
				$allproductsdata = $this->Master_model->getall_productdata(array('t1.status'=>'1','t1.publish_status'=>'1','t1.cat_id'=>$catid,'t3.status'=>'1'),'all','',array('t1.product_name','asc'),array('t1.id'));
			}

		}else{

			if(!empty($filterpoints['quantity'])){
				$quantity = $filterpoints['quantity'];        	
				$allproductsdata = $this->Master_model->getall_productdata(array('t1.status'=>'1','t1.publish_status'=>'1','t1.cat_id'=>$catid,'t4.variant_id'=>$quantity,'t3.status'=>'1'),'all','','');
			}else{
				$allproductsdata = $this->Master_model->getall_productdata(array('t1.status'=>'1','t1.publish_status'=>'1','t1.cat_id'=>$catid,'t3.status'=>'1'),'all','','',array('t1.id'));
			}
		}	

		$returnproduct = $allproductsdata;
		if(!empty($filterpoints['subcat_id'])){
			$subcatid = $filterpoints['subcat_id'];
			foreach($returnproduct as $key=>$proddata){
                $subcatarray = json_decode($proddata['subcat_id'],true);
                if(!in_array($subcatid,$subcatarray)){
                    unset($returnproduct[$key]);
                }
            }
		}
		if(!empty($filterpoints['lowcat_id'])){
			$lowcatid = $filterpoints['lowcat_id'];
			foreach($returnproduct as $key=>$proddata){
				if((!empty($proddata['lowcat_id'])) && ($proddata['lowcat_id'] != 'null')){
					$lowcatarray = json_decode($proddata['lowcat_id'],true);
					if(!in_array($lowcatid,$lowcatarray)){
						unset($returnproduct[$key]);
					}
				}
            }
		}
		if(!empty($filterpoints['pricerange'])){
			$pricerange = $filterpoints['pricerange'];
			$pricearray = explode('-',$pricerange);
			$p_from = $pricearray[0];
			$p_to = $pricearray[1];
			foreach($returnproduct as $key=>$proddata){	
				if("$proddata[variant_price]" > $p_to || "$proddata[variant_price]" < $p_from){
					unset($returnproduct[$key]);					
				}			
			}
		}
		if(!empty($filterpoints['discount'])){
			$discount = $filterpoints['discount'];
			$discountarray = explode('-',$discount);
			$d_from = $discountarray[0];
			$d_to = $discountarray[1];
			foreach($returnproduct as $key=>$proddata){				
				if($proddata['discount'] > $d_to || $proddata['discount'] < $d_from){
					unset($returnproduct[$key]);
				}
			}
		} 
        
        return $returnproduct;
    }
    
	public function save_tocart($postdata){
		$location = $this->session->location_session;
		$location_id = $location['id'];
		$login_status = $this->Master_model->checkcustomer_login();
        if($login_status){
			// means add in database
			$cust_id = $this->session->cuserid;
			$date = date('Y-m-d H:i:s');
			$insertarray = array('cust_id'=>$cust_id,'pid'=>$postdata['prod'],'vid'=>$postdata['vid'],'location_id'=>$location_id,'ptable'=>'product',
			'qty'=>$postdata['qty'],'added_on'=>$date);
			$checkquery = $this->db->get_where('cart',array('cust_id'=>$cust_id,'pid'=>$postdata['prod'],'vid'=>$postdata['vid'],'location_id'=>$location_id,'ptable'=>'product',
			'status'=>'1'));
			$prevdata = $checkquery->row_array();
			$counted_data = count($prevdata);
			if($counted_data == 0){
				// direct insert
				$donestatus = $this->db->insert('cart',$insertarray);

			}else{
				//update the qty
				$update_to = $prevdata['id'];
				$prev_qty = $prevdata['qty'];
				$finalqty = $postdata['qty']+$prev_qty;
				$donestatus = $this->db->update('cart',array('qty'=>$finalqty),array('id'=>$update_to));
			} 

			if($donestatus){
				return true;
			}else{
				return false;
			}
		}else{
			// add in session
			$cartarray = array();
			if(!empty($postdata['qty'])){
				if($postdata['qty'] <= 0){
					$postdata['qty'] = 1;
				}
				$cartarray['qty'] = $postdata['qty'];
			}else{
				$cartarray['qty'] = 1;
			}
			
			if(!empty($postdata['prod']) && !empty($postdata['vid'])){
				$cartarray['prod'] = $postdata['prod'];
				$cartarray['vid'] = $postdata['vid'];
			}else{
				return false;
			}

			if(!empty($location_id)){
				$cartarray['location_id'] = $location_id;
			}else{
				return false;
			}
			$cartsession = $this->session->userdata('mycart');
			if(empty($cartsession)){
				$cartsession[] = $cartarray;
				$this->session->set_userdata('mycart',$cartsession);
			}else{
				$addedqty = false;
				foreach($cartsession as $key=>$cartsess){
					if($cartsess['prod'] == $cartarray['prod'] && $cartsess['vid'] == $cartarray['vid'] && $cartsess['location_id'] == $cartarray['location_id']){
						$cartsession[$key]['qty'] = $cartsess['qty']+$cartarray['qty'];
						$addedqty = true;
					}
				}
				if($addedqty){
					$this->session->set_userdata('mycart',$cartsession);
				}else{
					$cartsession[] = $cartarray;
					$this->session->set_userdata('mycart',$cartsession);
				}			
			}
			return true;
		}
	}

	public function get_cartcount(){
		$login_status = $this->Master_model->checkcustomer_login();
		$cartcount = 0;
        if($login_status){
			// means get count from database
			$cust_id = $this->session->cuserid;
			$cartprod = $this->db->get_where('cart',array('status'=>'1','cust_id'=>$cust_id))->result_array();
			if(!empty($cartprod)){
				$cartcount = count($cartprod);
			}else{
				$cartcount = 0;
			}
		}else{
			// get count from session
			$cartsession = $this->session->userdata('mycart');
			if(empty($cartsession)){
				$cartcount = 0;
			}else{
				$cartcount = count($cartsession);
			}
		}
		return $cartcount;
	}

	public function getall_cartcontentlist($cust_id=NULL){
        $login_status = $this->Master_model->checkcustomer_login();
        $cartdata = array();
        if($login_status){            
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
                    $cart_productdata = $this->Master_model->getall_productdata(array('t1.id'=>$cart['pid'],'t1.status'=>'1','t4.variant_id'=>$cart['vid']),'single');
                    $cartdata[$key]['productdata'] = $cart_productdata;
                }                
            }
        }else{
            // customer not logged in
            // get cart data from session
            $cartsession = $this->session->userdata('mycart');
            if(!empty($cartsession)){
                $cart_productdata  = array();
                foreach($cartsession as $key=>$cart){
                    $cartdata[$key] = $cart; 
                    $cart_productdata = $this->Master_model->getall_productdata(array('t1.id'=>$cart['prod'],'t1.status'=>'1','t4.variant_id'=>$cart['vid']),'single');
                    $cartdata[$key]['productdata'] = $cart_productdata;
                }
            }
        }
        return $cartdata;
    }
    
	public function removeprod_cart($cartkey){
        $login_status = $this->Master_model->checkcustomer_login();
        if($login_status){
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
            $cart_session = $this->session->userdata('mycart');            
            if(isset($cart_session[$cartkey])){
                unset($cart_session[$cartkey]);
                $this->session->set_userdata('mycart',$cart_session);
                return true;
            }else{
                return false;
            }
        }
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
		$cartsession = $this->session->userdata('mycart');
        $buynowsession = $this->session->userdata('buynow');
        if(!empty($cartsession)){
            // already present session                          
            foreach($cartsession as $postdata){
                $pid = $postdata['prod'];                
                $addedon_date = date('Y-m-d H:i:s');
                $cust_id = $this->session->userdata('cuserid');             
                $quantity = $postdata['qty'];             
                $vid = $postdata['vid'];             
                $lid = $postdata['location_id'];             

                $insertarray = array('pid'=>$pid,'ptable'=>'product','cust_id'=>$cust_id,'vid'=>$vid,'location_id'=>$lid,'qty'=>$quantity,'added_on'=>$addedon_date);
                $status = $this->db->insert('cart',$insertarray);             
            }
            if($status == true){
                $this->session->unset_userdata('mycart');
            }
            // added to cart successfully
        }        
        if(!empty($buynowsession)){
			$postdata = $buynowsession;
			$pid = $postdata[0]['prod'];                
			$addedon_date = date('Y-m-d H:i:s');
			$cust_id = $this->session->userdata('cuserid');        
			$quantity = $postdata[0]['qty'];		
			$insertarray = array('pid'=>$pid,'ptable'=>'product','cust_id'=>$cust_id,'quantity'=>$quantity,'added_on'=>$addedon_date);
			$prevdata = $this->db->get_where(array('cart',array('cust_id'=>$cust_id,'pid'=>$pid,'status'=>'1')))->row_array();
			$prev_count = count($prevdata);
			if($prev_count !=0){
				// update new qty
				$prevqty = $prevdata['quantity'];
				$finalqty = $prevqty+$quantity;
				$status = $this->db->update('cart',array('quantity'=>$finalqty),array('id'=>$prevdata['id']));
			}else{
				$status = $this->db->insert('cart',$insertarray);
			}	
            if($status == true){
                $this->session->unset_userdata('buynow');
            }
        }
	}
	public function validatesignup($data){
        $mobileno = $data['mobileno'];
        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];
		$con_password = $data['con_password'];
		if($password != $con_password){
			$return['status'] = false;
            $return['msg'] = 'Please Match Password and Confirm Password !!';
			return $return;
		}
        $date = date('Y-m-d H:i:s');
        $refcode = random_string('alnum',8);
        $return = array();
        $query = $this->db->get_where('customer_detail',array('mobile_no'=>$mobileno,'status'=>'1','block_status'=>'0'));
        if($query->num_rows() > 0){
            //already  a customer 
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
	public function get_customerdetail(){
       $userid =  $this->session->userdata('cuserid');
       $this->db->select("t1.*,t2.name as cust_name,t2.mobile_no as cust_mobile,t2.email as cust_email,t2.image_path as cust_image");
       $this->db->from('customer_login as t1');
       $this->db->join('customer_detail as t2',"t1.detail_id = t2.id");
       $this->db->where(array('t1.status'=>'1','t1.id'=>$userid));
       $query = $this->db->get();
	   //echo $this->db->last_query();die;
       $custdata = $query->row_array();
		
       $query = $this->db->get_where('customer_address',array('cust_id'=>$userid,'status'=>'1'));
       $address_data = $query->result_array();
       if(!empty($address_data)){
           $custdata['addresses'] = $address_data;
       }
       return $custdata;
	}
	public function save_placeorder($postdata){		
        $return = array(); 
		$insertproduct = array();
		$insertorder = array();
        $login_status = $this->Master_model->checkcustomer_login();
        if($login_status){                  
			if(isset($postdata['address'])){
				$address = $postdata['address'];
			}else{
				$return['status'] = false;
				$return['msg'] = "Please Enter Address !!";
			}
			if(isset($postdata['pincode'])){
				$pincode = $postdata['pincode'];
			}else{
				$return['status'] = false;
				$return['msg'] = "Please Enter Pincode !!";
			}                   
			$orderno = 'ORDER-'.random_string('numeric',8);
			$cust_id = $this->session->userdata('cuserid');
			$date = date('Y-m-d H:i:s');
			$deliveryrate = 50;
			$location = $this->session->location_session;
			$location_id = $location['id'];
            $cartproduct = $this->Website_model->getall_cartcontentlist();
			if(!empty($cartproduct)){ $ordertotal = 0;
				foreach($cartproduct as $cartprod){					
					$quantity = $cartprod['qty'];
					$price = $cartprod['productdata']['variant_offerprice'];
					$subprice = $quantity*$price;
					$ordertotal += $subprice;
				}

				$orderfinal = $ordertotal+$deliveryrate;
				
				$time = date('H:i:s');

				$insertorder = array('cust_id'=>$cust_id,'location_id'=>$location_id,'order_no'=>$orderno,'delivery_rate'=>$deliveryrate,'delivery_date'=>$postdata['delivery_date'],
				'delivery_time'=>$postdata['delivery_time'],'delivery_address'=>$postdata['address'],'delivery_pincode'=>$postdata['pincode'],'delivery_zone'=>$postdata['deliveryzone'],
				'delivery_state'=>$postdata['state'],'delivery_landmark'=>$postdata['landmark'],'delivery_mobileno'=>$postdata['delivery_mobileno'],'order_total'=>$orderfinal,'delivery_status'=>'0',
				'payment_status'=>'0','cur_time'=>$time,'added_on'=>$date);

				//echo PRE;print_r($insertorder);die;
				$order_insertstatus = $this->db->insert('order',$insertorder);
				//echo $this->db->last_query();die;
				$insert_id = $this->db->insert_id();
				if($order_insertstatus){
					//insert products of order
					foreach($cartproduct as $cartprod){
						$productdata = $cartprod['productdata'];
						//print_r($productdata);
						$quantity = $cartprod['qty'];
						$insertproduct = array('order_id'=>$insert_id,'order_no'=>$orderno,'cat_id'=>$productdata['cat_id'],'variant_id'=>$productdata['variant_id'],
						'pid'=>$productdata['id'],'ptable'=>'product','pcode'=>$productdata['pcode'],'product_name'=>$productdata['product_name'],
						'quantity'=>$quantity,'price'=>$productdata['variant_offerprice'],'added_on'=>$date);
						$product_insertstatus = $this->db->insert('order_product',$insertproduct);
					}
					$payment_session = array('added_on'=>$date,'order_id'=>$insert_id);
					$this->session->set_userdata($payment_session);
					$this->db->update('cart',array('status'=>'0'),array('cust_id'=>$cust_id));
					$return['status'] = true;
					$return['msg'] = "Payment Window Started";
				}else{
					$return['status'] = false;
            		$return['msg'] = "Order Not Placed !!";
				}				
			}else{
				$return['status'] = false;
            	$return['msg'] = "Order Is Empty !!";
			}
           
        }else{
            $return['status'] = false;
            $return['msg'] = "Please Be Logged In While Placing Order !!";
        }
        return $return;
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

	public function get_searchresult($getdata){
		$return = array();
		$allprod_data = array();
		if(empty($getdata['q'])){
			$return['status'] = false;
			$return['msg'] = "Nothing Entered For search Result !!";
		}else{
			$keyword = $getdata['q'];
			// first serach according to this keyword
			$productlist = $this->search_productdata($keyword,1);
			if(empty($productlist)){				
				$productlist = $this->search_productdata($keyword,2);
				if(empty($productlist)){					
					$productlist = $this->search_productdata($keyword,3);
				}
			}
			//echo PRE;print_r($productlist);
			if(empty($productlist)){
				$return['status'] = false;
				$return['msg'] = "No Result Found !!";
			}else{
				foreach($productlist as $prod){
					$pid = $prod['id'];
					$variantdata = $this->getall_productvariant(array('t1.pid'=>$pid));
					if(!empty($variantdata)){
						foreach($variantdata as $vary){							
							$variant_id = $vary['variant_id'];
							$allprod_data[] = $this->Master_model->getall_productdata(array('t1.id'=>$pid,'t4.variant_id'=>$variant_id),'single');
						}
					}
					
				}
				$return['status'] = true;
				$return['msg'] = "Search Result For : $keyword";
				$return['productlist'] = $allprod_data;
			}
		}
		return $return;
	}

	public function search_productdata($keyword,$whole){
		if($whole == 1){
			$this->db->select('*');
			$this->db->from('product as t1');
			//$this->db->join('product_variant as t2','t1.id = t2.pid');
			$this->db->like('t1.product_name', $keyword,'both');
			$this->db->where(array('t1.status'=>'1','t1.publish_status'=>'1'));
			$query = $this->db->get();
			$products = $query->result_array();
			return $products;
		}elseif($whole == 2){
			$explode = explode(' ',$keyword);			
			if(!empty($explode)){
				$this->db->select('*');
				$this->db->from('product as t1');
				//$this->db->join('product_variant as t2','t1.id = t2.pid');
				foreach($explode as $ex){
				$this->db->like('t1.product_name', $ex,'both');
				}
				$this->db->where(array('t1.status'=>'1','t1.publish_status'=>'1'));
				$query = $this->db->get();
				$products = $query->result_array();							
			}
			return $products;
		}else{
			$explode = explode(' ',$keyword);
			$oncedata = array();
			if(!empty($explode)){
				foreach($explode as $ex){
					$this->db->select('*');
					$this->db->from('product as t1');
					//$this->db->join('product_variant as t2','t1.id = t2.pid');
					$this->db->like('t1.product_name', $ex,'both');
					$this->db->where(array('t1.status'=>'1','t1.publish_status'=>'1'));
					$query = $this->db->get();
					$products = $query->result_array();
					if(!empty($products)){
						foreach($products as $prod){
							$oncedata[$prod['id']] = $prod;
						}
					}
				}
			}
			return $oncedata;
		}
	}

	public function getall_productvariant($where=array()){

		$this->db->select('t1.*,t2.quant_text as variantname,t3.*');
		$this->db->from('product_variant as t1');
		$this->db->join('variant as t2','t1.variant_id = t2.id','left');
		$this->db->join('product as t3','t1.pid = t3.id','left');
		$this->db->where($where);
		$query = $this->db->get();
		$alldata = $query->result_array();
		return $alldata;
	}
}