<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {
    function __construct(){
		  parent::__construct();
      $this->load->helper('webmenu');
    }

    public function index(){
      $categorylist = $this->Master_model->getall_category_from_webdesign();     
      $cattree = array();
      if(!empty($categorylist)){
        foreach($categorylist as $maincat){
          $categoryproducts = $this->Master_model->getall_productdata(array('t1.cat_id'=>$maincat['cat_id'],'t1.parent'=>'0','t1.publish_status'=>'1'),'all','','',array('t1.id'));
          $showcategory_products = array_slice( array_reverse($categoryproducts),0,25);
          $maincat['catproducts'] = $showcategory_products;
          $subcat = $this->Master_model->getall_subcategory(array('t1.status'=>'1','t1.type'=>'simple','cat_id'=>$maincat['cat_id']),'all');
          if(!empty($categoryproducts)){ $subcatproduct = array();
            foreach($categoryproducts as $key=>$cp){
              foreach($subcat as $key2=>$sc){
                  $p_subcat = $cp['subcat_id'];
                  $p_subcat_array = json_decode($p_subcat);
                  if(in_array($sc['id'],$p_subcat_array)){
                    $subcat[$key2]['products'][]  = $cp;
                  }                    
              }
            }              
          }
          $maincat['subcat'] = $subcat;
          $cattree[] = $maincat;
        }
      }
      $data['title'] = "Home";     
      $data['categorytree'] = $cattree; 
      $this->load->view('website/top_section',$data);
      $this->load->view('website/index');
    }

    public function ajax_setlocation_session(){
      $lid = $this->input->post('locationid');
      $locationdata = $this->Master_model->getall_location(array('t1.status'=>'1','t1.id'=>$lid),'single');
      $loc_session = array('id'=>$locationdata['id'],'name'=>"$locationdata[name] -of- $locationdata[statename]");
      $this->session->set_userdata('location_session',$loc_session);
      return true;
    }

    public function filter(){

      $data['title'] = 'Products';
      $data['breadcrumb'] = array('/'=>'Home','0'=>'Filter Page');
      $this->load->view('website/top_section',$data);
      $this->load->view('website/filter');
    }

    public function category_view(){

      $slug = $this->uri->segment('2');
      $category_data = $this->Master_model->getall_category(array('status'=>'1','slug'=>$slug),'single');      
      if(empty($category_data)){
        redirect('/');
      }
      $cat_id = $category_data['id'];
      $productdata = $this->Master_model->getall_productdata(array('t1.status'=>'1','t1.publish_status'=>'1','t1.cat_id'=>$cat_id),'all','','',array('t1.id'));
      $productdata_sort = $this->product_filter(true);
      $brandlist = $this->Master_model->getall_subcategory(array('t1.cat_id'=>$cat_id,'t1.status'=>'1','t1.type'=>'brand'),'all');
      $quantitylist = $this->Master_model->getall_quantity(array('t1.cat_id'=>$cat_id,'t1.status'=>'1'),'all');  

      $data['title'] = "$category_data[name]";      
      $data['breadcrumb'] = array('/'=>'Home',"0"=>"$category_data[name]");
      $data['quantitylist'] = $quantitylist;
      $data['brandlist'] = $brandlist;
      $data['productlist'] = $productdata_sort;
      $data['category'] = $category_data;
      $this->load->view('website/top_section',$data);      
      $this->load->view('website/category_product');
    }

    public function product_filter($pagerequired=false){
      $getdata = $this->input->get();
      //print_r($getdata);
      $filterpoint = array();
      if(!empty($getdata)){
          if(!empty($getdata['catid'])){
            $filterpoint['cat_id'] = $getdata['catid'];
          }
          if(!empty($getdata['quantity'])){
            $filterpoint['quantity'] = $getdata['quantity'];
          }
          if(!empty($getdata['prod_order'])){
            $filterpoint['prod_order'] = $getdata['prod_order'];
          }
          if($getdata['discount'] != '0'){
            $filterpoint['discount'] = $getdata['discount'];
          }
          if($getdata['pricerange'] != '0'){
            $filterpoint['pricerange'] = $getdata['pricerange'];
          }    
          if(!empty($getdata['subcatid'])){
            $filterpoint['subcat_id'] = $getdata['subcatid'];
          }
          if(!empty($getdata['lowcatid'])){
            $filterpoint['lowcat_id'] = $getdata['lowcatid'];
          } 
               
      }else{          
          $slug = $this->uri->segment('2');
          $type = $this->uri->segment('1');
          if($type == 'cat'){
            $category_data = $this->Master_model->getall_category(array('status'=>'1','slug'=>$slug),'single');
            $filterpoint['cat_id'] = $category_data['id'];
          }elseif($type == 'subcat'){
            $category_data = $this->Master_model->getall_subcategory(array('t1.status'=>'1','t1.slug'=>$slug),'single');
            $filterpoint['cat_id'] = $category_data['cat_id'];
            $filterpoint['subcat_id'] = $category_data['id'];
          }elseif($type == 'lowcat'){
            $category_data = $this->Master_model->getall_lowcategory(array('t1.status'=>'1','t1.slug'=>$slug),'single');
            $filterpoint['cat_id'] = $category_data['cat_id'];
            $filterpoint['subcat_id'] = $category_data['subcat_id'];
            $filterpoint['lowcat_id'] = $category_data['id'];
          }
          
      }   
      //print_r($filterpoint);   
      $productdata = $this->Website_model->product_sort($filterpoint);
      //echo PRE;print_r($productdata);die;
      $sortproduct = $productdata;
      $implode = '';
      if(!empty($getdata)){ $i=0;
        foreach($getdata as $key=>$gdata){$i++;
          if($i == 1){
            $implode .= "?$key=$gdata";
          }else{
            $implode .= "&$key=$gdata";
          }
        }
      }  
      $counted = count($sortproduct);
      $return = array('productlist'=>$sortproduct,'urlpart'=>$implode,'counted'=>$counted);
      if($pagerequired){
        $return = array('productlist'=>$sortproduct,'urlpart'=>$implode,'counted'=>$counted);
        return $return['productlist'];
      }else{
        $this->load->view('website/subproduct_sort',$return);
      }      
    }

    public function subcategory_view(){

      $slug = $this->uri->segment('2');
      $subcategory_data = $this->Master_model->getall_subcategory(array('t1.status'=>'1','t1.slug'=>$slug),'single');
      if(empty($subcategory_data)){
        redirect('/');
      }
      $allcategory_productlist = $this->Master_model->getall_productdata(array('t1.cat_id'=>$subcategory_data['cat_id'],'t1.prodtype'=>'product','t1.publish_status'=>'1'),'all');
      $productlist = array();
      if(!empty($allcategory_productlist)){
        foreach($allcategory_productlist as $product){
          $json_array_subcat = json_decode($product['subcat_id'],true);
          if(in_array($subcategory_data['id'],$json_array_subcat)){
            $productlist[] = $product;
          }
        }
      }     
      //echo PRE;print_r($productlist);die;
      $productdata_sort = $this->product_filter(true);
      $data['title'] = "$subcategory_data[name] - $subcategory_data[catname]"; 
      $data['subcategory'] = $subcategory_data;
      $data['productlist'] =  $productdata_sort; 
      $data['breadcrumb'] = array('/'=>'Home',"cat/$subcategory_data[catslug]"=>"$subcategory_data[catname]",'0'=>"$subcategory_data[name]");

      $quantitylist = $this->Master_model->getall_quantity(array('t1.cat_id'=>$subcategory_data['cat_id'],'t1.status'=>'1'),'all');

      $data['quantitylist'] = $quantitylist; 
      $data['subcat_id'] = $subcategory_data['id'];
      //echo PRE;print_r($data);die;
      $this->load->view('website/top_section',$data);      
      $this->load->view('website/subcategory_product');

    }

    public function lowcategory_view(){

      $slug = $this->uri->segment('2');
      $lowcategory_data = $this->Master_model->getall_lowcategory(array('t1.status'=>'1','t1.slug'=>$slug),'single');  
      //echo PRE; print_r($lowcategory_data);    
      if(empty($lowcategory_data)){
        redirect('/');
      }
      $allcategory_productlist = $this->Master_model->getall_productdata(array('t1.cat_id'=>$lowcategory_data['cat_id'],'t1.prodtype'=>'product','t1.publish_status'=>'1'),'all',$lowcategory_data['subcat_id'],'',array('t1.id'));
      //print_r($allcategory_productlist);die;
      $productlist = array();
      if(!empty($allcategory_productlist)){
        foreach($allcategory_productlist as $product){
          if((!empty($product['lowcat_id'])) && ($product['lowcat_id'] != 'null')){
            $json_array_subcat = json_decode($product['lowcat_id'],true);
            if(in_array($lowcategory_data['id'],$json_array_subcat)){
              $productlist[] = $product;
            }
          }          
        }
      }     
      //echo PRE;print_r($productlist);die;
      $productdata_sort = $this->product_filter(true);
      $data['title'] = "$lowcategory_data[name] - $lowcategory_data[subcatname] - $lowcategory_data[catname]"; 
      $data['lowcategory'] = $lowcategory_data;
      $data['productlist'] =  $productdata_sort; 
      $data['breadcrumb'] = array('/'=>'Home',"cat/$lowcategory_data[catslug]"=>"$lowcategory_data[catname]","subcat/$lowcategory_data[subcatslug]"=>"$lowcategory_data[subcatname]",'0'=>"$lowcategory_data[name]");

      $quantitylist = $this->Master_model->getall_quantity(array('t1.cat_id'=>$lowcategory_data['cat_id'],'t1.status'=>'1'),'all');
      $data['quantitylist'] = $quantitylist; 
      $data['subcat_id'] = $lowcategory_data['subcat_id'];
      //echo PRE;print_r($data);die;
      $this->load->view('website/top_section',$data);      
      $this->load->view('website/lowcategory_product');
    }

    public function save_tocart(){
        // save to both from here in session and database
      $postdata = $this->input->post();
      $status = $this->Website_model->save_tocart($postdata);
      if($status){
        $this->session->set_flashdata('request_msg',"Product Added To Cart Successfully !!");
      }else{
        $this->session->set_flashdata('request_err_msg',"Please Try Again !!");
      }
      echo $status;
    }
    
    public function login(){
      $data['title'] = "Login";      
      $this->load->view('website/top_section',$data);
      $this->load->view('website/login');
    }

    public function validatelogin(){
      $data = $this->input->post();
      $status = $this->Website_model->validatelogin($data);
      if($status['status']){
        $this->Website_model->start_session($status['cdata']);
        $this->Website_model->update_loggedon($status['cdata']['id']);
        $this->Website_model->move_sessionto_cart();        
        $this->session->set_flashdata('request_msg',"$status[msg]");
      }else{
        $this->session->set_flashdata('request_err_msg',"$status[msg]");
        redirect('/login');
      }      
      redirect('/');
    }

    public function register(){
      $data['title'] = "Register";      
      $this->load->view('website/top_section',$data);
      $this->load->view('website/register');
    }

    public function saveregister(){
      $data = $this->input->post();
      $status = $this->Website_model->validatesignup($data);
      if($status['status']){
        $this->session->set_flashdata('request_msg',"$status[msg]");
      }else{
        $this->session->set_flashdata('request_err_msg',"$status[msg]");
      }      
      redirect('/register');
    }

    public function logout(){
      if($this->session->cuserid!==NULL){
        $data=array("cuserid","name","role");
        $this->session->unset_userdata($data);
      }	
      $this->session->set_flashdata('request_msg',"Logged Out Successfully !!");
      redirect('/');
    }

    public function profile(){
		$loginstatus = $this->Master_model->checkcustomer_login();
		  if($loginstatus){		  
		  $data['title'] = "Profile";
		  $data['cusdata']=$this->Website_model-> get_customerdetail();
		  //echo PRE;print_r($data);die;      
		  $this->load->view('website/top_section',$data);
		  $this->load->view('website/profile');
		  }else{
			   $this->session->set_flashdata('request_err_msg',"Please Login First !!");
			   redirect('/login');
		  }
    }
    public function cart_content(){
	  $this->load->helper('text');
      $data['title'] = "Cart";     
      $contentarray = $this->Website_model->getall_cartcontentlist();
      if(!empty($contentarray)){
        $cart_total = count($contentarray);
      }else{
        $cart_total = 0;
      }
      $data['cartcontentlist'] = $contentarray; 
      $data['cart_total'] = $cart_total;
      //echo PRE;print_r($data);
      $this->load->view('website/top_section',$data);
      $this->load->view('website/cart');
    }

    public function removeprod_cart($cartkey=NULL){
      if($cartkey != NULL){
        $status = $this->Website_model->removeprod_cart($cartkey);        
        if($status){
          $this->session->set_flashdata('request_msg',"Removed From Cart Successfully !!");
        }else{
          $this->session->set_flashdata('request_err_msg',"Please Try Again !!");
        }
        redirect($_SERVER['HTTP_REFERER']);
      }else{
        redirect($_SERVER['HTTP_REFERER']);
      }
    }

    public function cart_checkout(){
      $loginstatus = $this->Master_model->checkcustomer_login();
      if($loginstatus){
        redirect('checkout/');
      }else{
        $this->session->set_flashdata('request_err_msg',"Please Login First Before Checkout !!");
        redirect('login/');
      }
    }

    public function checkout(){
      $loginstatus = $this->Master_model->checkcustomer_login();
      if($loginstatus){
        $data['title'] = 'Checkout'; 
        $customerdata = $this->Website_model->get_customerdetail();
        $data['customerdata'] = $customerdata;
		//echo PRE;print_r($data);die;
        $contentarray = $this->Website_model->getall_cartcontentlist();
        $data['cartcontentlist'] = $contentarray;
        // $locationlist= $this->Master_model->getall_area(array('status'=>'1','parent_id'=>'0'),'all');
        // $locationoption = array();
        // $locationoption[''] = '-- Select State --';
        // if(!empty($locationlist)){
        //     foreach($locationlist as $list){
        //         $locationoption[$list['id']] = $list['name'];
        //     }
        // }
        // $data['locationoption'] = $locationoption; 
        $location=$this->session->location_session;
        $location_id = $location['id']; 
        $locationdata = $this->Master_model->getall_location(array('t1.status'=>'1','t1.id'=>$location_id),'single'); 
        $data['locationdata'] = $locationdata;       
        $data['zoneoption'] = array(''=>'-- Select Delivery Zone --');       
        $this->load->view('website/top_section',$data); 
        $this->load->view('website/checkout');
      }else{
        $this->session->set_flashdata('request_err_msg',"Please Login First Before Checkout !!");
        redirect('/');
      }     
    }

    public function getall_zoneoption(){
      $postdata = $this->input->post();
      $state_id = $postdata['state'];
      $zonelist = $this->Master_model->getall_location(array('t1.status'=>'1','t1.state_id'=>$state_id),'all');
      //$zoneoption = "<select class='form-control' name='delivery_zone' id='zone'>";
      $zoneoption = '<option value="">-- Select Delivery Zone --</option>';
        if(!empty($zonelist)){
            foreach($zonelist as $list){
              $zoneoption .= "<option value='$list[id]'>$list[name]</option>";                
            }
        }
      //$zoneoption .= '</select>';
      echo $zoneoption;         
    }

    public function placeorder(){
      $post = $this->input->post();
      
      if(empty($post['delivery_date']) || empty($post['delivery_time']) || empty($post['address']) ||
       empty($post['pincode']) || empty($post['state']) || empty($post['deliveryzone'])){
        $this->session->set_flashdata('request_err_msg',"Please Enter All The Required Feilds To Place Order");
        redirect($_SERVER['HTTP_REFERER']);
      }
      //echo PRE;print_r($post);die;
      $status = $this->Website_model->save_placeorder($post);
      if($status['status'] == true){
        $this->session->set_flashdata('request_msg',"$status[msg]");
        redirect('/makepayment');
      }else{
        $this->session->set_flashdata('request_err_msg',"$status[msg]");
        redirect($_SERVER['HTTP_REFERER']);
      }
      redirect($_SERVER['HTTP_REFERER']);
    }

    public function makepayment(){
        $loginstatus = $this->Master_model->checkcustomer_login();
        if($loginstatus){
        $data['title'] = "Make Payment";  
        $customerdata = $this->Website_model->get_customerdetail();
        $data['customerdata'] = $customerdata;      
        $order_addedon = $this->session->userdata('added_on');        
        $order_value = $this->session->userdata('order_id');
        //$order_id_array = json_decode($order_value,true);        
        $showdata = array();$total_amount = 0;$orderno = array();$show_id=0;
        if(!empty($order_value)){
          
          $orderdetails = $this->Master_model->getall_orderdata(array('t1.id'=>$order_value),'single');
          $diftime = $this->Website_model->getdifferencemin($orderdetails['added_on'],$orderdetails['cur_time']);
          $time_duration = 15-$diftime;
          $total_amount += $orderdetails['order_total'];
          $orderno[] =  $orderdetails['order_no'];
          $show_id = $orderdetails['id'];
                 
          if($time_duration <=0){$this->fail_order();} 
          $orderno = implode(' , ',$orderno); 
          $showdata['order_no'] = $orderno;
          $showdata['total_amount'] = $total_amount;
          $showdata['time_duration'] = $time_duration;
          $showdata['id'] = $show_id;

          $data['orderdetails'] = $showdata;
          //echo PRE;print_r($data);
          $this->load->view('website/top_section',$data);          
          $this->load->view('website/makepayment');
        }else{
          redirect('/');
        }        
      }else{
        redirect('/');
      }
    }

    public function update_order_curtime(){
      $orderid = $this->input->post('order');
      $result = $this->Website_model->update_order_curtime($orderid);
      echo $result;
    }

    public function success(){
      $postdata = $this->input->post();
      $paymentdetail = json_encode($postdata);
      $order_id = $this->session->userdata('order_id');
      //$order_array = json_decode($order_id,true);
      if(!empty($order_id)){
        
          $date = date('Y-m-d H:i:s');
          $insertstatus = $this->db->insert('order_payment',array('order_id'=>$order_id,'payment_id'=>$postdata['razorpay_payment_id'],'payment_details'=>$paymentdetail,'added_on'=>$date));
          if($insertstatus){
            // update paymentstatus
            $this->db->update('order',array('payment_status'=>'1'),array('id'=>$order_id));
            $this->session->unset_userdata('order_id');
            $this->session->unset_userdata('added_on');
            $this->session->set_flashdata('request_msg',"Order Placed Successfully !!");
          }else{
            $this->session->set_flashdata('request_err_msg',"Order Not Placed");
          }        
      }      
      redirect('/');
    }


    public function fail_order(){
      $order_id = $this->session->userdata('order_id');
      //$order_array = json_decode($order_id,true);
      if(!empty($order_id)){
        //foreach($order_array as $orderid){
          $this->db->update('order',array('payment_status'=>'0','status'=>'0'),array('id'=>$order_id));
        //}
      }
      $this->session->unset_userdata('order_id');
      $this->session->unset_userdata('added_on');
      $this->session->set_flashdata('request_err_msg',"Payment Window Closed");
      redirect('/');
    }

    public function search_view(){
      $getdata = $this->input->get();
      $searchdata = $this->Website_model->get_searchresult($getdata);     
      $keyword = $getdata['q'];
      //echo PRE;print_r($searchdata);   
      
      $data['title'] = "$keyword - Search Result";      
      $data['breadcrumb'] = array('/'=>'Home',"0"=>"$keyword");     
      $data['searchdata'] = $searchdata;   
      $data['keyword'] = "$keyword";  
      //echo PRE;print_r($data);die;
      $this->load->view('website/top_section',$data);      
      $this->load->view('website/search_product');
    }

    public function productDescription(){
      $data['title'] = "Product Description";      
      $this->load->view('website/top_section',$data);
      $this->load->view('website/productDescription');
    }
	public function about(){
		$data['title'] = "About Us";      
      	$this->load->view('website/top_section',$data);
      	$this->load->view('website/about');
	}
		public function contact(){
		$data['title'] = "Contact Us";      
      	$this->load->view('website/top_section',$data);
      	$this->load->view('website/contact');
	}
}