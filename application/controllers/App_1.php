<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){

        $categorylist = $this->Master_model->getall_category(array('status'=>'1'),'all');    
        //$subcategorylist = $this->Master_model->getall_subcategory(array('t1.status'=>'1','t1.type'=>'simple'),'all');
        $cattree = array();
        if(!empty($categorylist)){
          foreach($categorylist as $maincat){
            $categoryproducts = $this->Master_model->getall_productdata(array('t1.cat_id'=>$maincat['id'],'t1.parent'=>'0','t1.publish_status'=>'1'),'all');
            $showcategory_products = array_slice( array_reverse($categoryproducts),0,25);
            $maincat['catproducts'] = $showcategory_products;
            $subcat = $this->Master_model->getall_subcategory(array('t1.status'=>'1','t1.type'=>'simple','cat_id'=>$maincat['id']),'all');
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
        $subcategory_list = $this->Master_model->getall_subcategory(array('t1.status'=>'1','t1.type !='=>'egger'),'all');
        $data['subcategory_list'] = $subcategory_list;        
        $data['categorytree'] = $cattree; 
        $this->load->view("app/header",$data);
        $this->load->view("app/side-menu");
        $this->load->view('app/index');
    }

    public function product_description(){       
      
      if(isset($_GET['subcat']) && !empty($_GET['subcat'])){
        $slug = $_GET['subcat'];
        $subcategory_data = $this->Master_model->getall_subcategory(array('t1.status'=>'1','t1.slug'=>$slug),'single');        
      }else{
          redirect('/app');
      }
      
      $pid = $this->uri->segment('2');
      $productdata = $this->Master_model->getall_productdata(array('t1.status'=>'1','t1.publish_status'=>'1','md5(t1.id)'=>$pid),'single');
      $variantlist = $this->Master_model->getall_productvariant(array('t1.status'=>'1','t1.publish_status'=>'1','md5(t1.id)'=>$pid),'all');
      $addonslist = $this->Master_model->getall_addons_productdata(array('t1.status'=>'1','t1.publish_status'=>'1','t1.cat_id'=>$subcategory_data['cat_id']),'all');
      $relatedproduct = $this->Master_model->getall_relatedproduct(array('t1.status'=>'1','t1.publish_status'=>'1','t1.parent'=>'0'),array('subcat_id'=>$subcategory_data['id']),array('t1.added_on','desc'),8);
      $productoptions = $this->Master_model->getproduct_options(array('status'=>'1','publish_status'=>'1','md5(id)'=>$pid));
     
      $data['title'] = "$productdata[product_name] - $productdata[catname]";
      $data['subcategory'] = $subcategory_data;
      $data['productdata'] = $productdata;      
      $data['variantlist'] = $variantlist;
      $data['relatedlist'] = $relatedproduct;
      /*product addons list according to cat id*/      
      $data['addonslist'] = $addonslist;
      /*product flavour,shape,cream*/
      $data['flavoroption'] = $productoptions['flavoroption'];
      if(!empty($productoptions['shapeoption'])){
        if(count($productoptions['shapeoption']) > 1){
            $data['shapeoption'] = $productoptions['shapeoption'];
        }
      }
      if(!empty($productoptions['creamoption'])){
        if(count($productoptions['creamoption']) > 1){
            $data['creamoption'] = $productoptions['creamoption'];
          }
      }  
      
      //echo PRE;print_r($data);
      $this->load->view('app/header',$data);
      $this->load->view('app/side-menu');
      $this->load->view('app/description');
    }

    public function addtocart(){

      $postdata = $this->input->post();
      //echo PRE;print_r($postdata);die;
      if(!empty($postdata['selected_date']) && !empty($postdata['selected_slot']) 
      && !empty($postdata['slot_id']) && isset($postdata['slot_price']) && 
      !empty($postdata['selected_time']) && !empty($postdata['selected_name'])){
        if(isset($postdata['AddToCart']) && !isset($postdata['BuyNOW'])){
          // add to cart
          unset($postdata['AddToCart']);
          $postdata['quantity'] = '1';
          $this->session->set_userdata('ship_charge',$postdata['slot_price']);
          $status = $this->Master_model->checkcustomer_login();
          if($status){
            // add to the database
            $insertstatus = $this->Master_model->save_tocart_indb($postdata);
          }else{
            // save to the session
            $insertstatus = $this->Master_model->save_tocart_insession($postdata);
          }
          if(isset($insertstatus['status']) && $insertstatus['status'] == true){
           
              $this->session->set_flashdata('request_msg',"Added To Cart Successfully !");              
              $this->session->set_flashdata('comeof','cart');
              // $this->session->set_flashdata('addon_popup',"Added To Cart Successfully !!");
              redirect("app/add_addons_view/$postdata[pid]");
          }else{
            $this->session->set_flashdata('request_err_msg',"Not Added To Cart !!"); 
          }            

        }elseif(!isset($postdata['AddToCart']) && isset($postdata['BuyNOW'])){
          // add to buynow
          $postdata['quantity'] = '1';
          $this->session->set_userdata('ship_charge',$postdata['slot_price']);
          $login_status = $this->Master_model->checkcustomer_login();
          if($login_status){          
            $insertstatus = $this->Master_model->save_buynow_indb($postdata);
          }else{         
            $insertstatus = $this->Master_model->save_buynow_insession($postdata);
          }    
          
          if(isset($insertstatus['status']) && $insertstatus['status'] == true){
              $this->session->set_flashdata('request_msg',"Product Sent For Checkout !!");              
              $this->session->set_flashdata('comeof','buynow');
              // $this->session->set_flashdata('addon_popup',"Successfully!!");
              redirect("app/add_addons_view/$postdata[pid]");
          }else{
            $this->session->set_flashdata('request_err_msg',"Not Added To Cart !!"); 
          }                      
        }else{
          $this->session->set_flashdata('request_err_msg',"Try Again !!");          
        } 
      }else{        
        $this->session->set_flashdata('request_err_msg',"Please Select Delivery Date Time !!");        
      }
      redirect($_SERVER['HTTP_REFERER']);   
    }

    public function add_addons_view(){
        
        $camefrom = $this->session->userdata('comeof');      
        if(!empty($camefrom)){
          $data['comeof'] = $camefrom;
        }else{
          redirect($_SERVER['HTTP_REFERER']);
        }                
        $pid = $this->uri->segment('3');
        $productdata = $this->Master_model->getall_productdata(array('t1.status'=>'1','t1.publish_status'=>'1','t1.id'=>$pid),'single');       
        $addonslist = $this->Master_model->getall_addons_productdata(array('t1.status'=>'1','t1.publish_status'=>'1','t1.cat_id'=>$productdata['cat_id']),'all');
        $data['productdata'] = $productdata;   
        $data['addonslist'] = $addonslist;   

        $this->load->view('app/header',$data);
        $this->load->view('app/side-menu');
        $this->load->view('app/add_addons_view');         
    }

    public function save_addons(){

      $post = $this->input->post();      
      if(isset($post['url'])){
        $redirecturl = $post['url'];
      }else{
        redirect($_SERVER['HTTP_REFERER']);
      }      
      unset($post['url']);      
      if(!empty($post)){
        $comingfrom = $post['comingfrom'];
        unset($post['name']);
        $status = $this->Website_model->save_addons_forcartorbuynow($post);         
        if($status){
          if($comingfrom == 'cart'){
            redirect($redirecturl);
          }elseif($comingfrom == 'buynow'){
            redirect('app/cart_checkout');
          }
        }
      }      
      redirect($redirecturl);
    }

    public function cart_checkout(){

      $loginstatus = $this->Master_model->checkcustomer_login();
      if($loginstatus){
        $data['title'] = 'Checkout'; 
        $customerdata = $this->Website_model->get_customerdetail();
        $data['customerdata'] = $customerdata;
        $contentarray = $this->Website_model->getall_cartcontentlist();
        $data['cartcontentlist'] = $contentarray;
               
        $this->load->view('app/header',$data);       
        $this->load->view('app/side-menu');
        $this->load->view('app/checkout');
      }else{
        redirect('app/login');
      }

    }

    public function login(){         
        $data['title'] = 'Customer Login';
        $this->load->view('app/header',$data);
        $this->load->view('app/side-menu');
        $this->load->view('app/login');
    }

    public function validatelogin(){
      $data = $this->input->post();    
      $status = $this->Website_model->validatelogin($data);
      if($status['status']){
        $this->Website_model->start_session($status['cdata']);
        $this->Website_model->update_loggedon($status['cdata']['id']);
        $this->Website_model->move_sessionto_cart();
        $popup = $this->Website_model->payment_due_popup();
        if($popup){
          $this->session->set_flashdata('payment_popup',"true");
        }
        $this->session->set_flashdata('request_msg',"$status[msg]");
      }else{
        $this->session->set_flashdata('request_err_msg',"$status[msg]");
      }      
      redirect('/app');      
    }

    public function register(){
        $data['title'] = 'Customer Signup';
        $this->load->view('app/header',$data);
        $this->load->view('app/side-menu');
        $this->load->view('app/register');
    }

    public function saveregister(){
       $data = $this->input->post();
        $status = $this->Website_model->validatesignup($data);
        if($status['status']){
          $this->session->set_flashdata('request_msg',"$status[msg]");
        }else{
          $this->session->set_flashdata('request_err_msg',"$status[msg]");
        }      
      redirect('app/login');
    }

    public function logout(){
      if($this->session->cuserid!==NULL){
        $data=array("cuserid","name","role");
        $this->session->unset_userdata($data);
      }	
      $this->session->set_flashdata('request_msg',"Logged Out Successfully !!");
      redirect('/app');
    }

    public function profile(){
      $loginstatus = $this->Master_model->checkcustomer_login();
      if($loginstatus){
        $data['title'] = 'Profile'; 
        $customerdata = $this->Website_model->get_customerdetail();
        $data['customerdata'] = $customerdata;              
        $this->load->view('app/header',$data);       
        $this->load->view('app/side-menu');
        $this->load->view('app/profile');
      }else{
        redirect('app/login');
      }
    }

    public function cat(){
      $slug = $this->uri->segment('3');
      $category_data = $this->Master_model->getall_category(array('status'=>'1','slug'=>$slug),'single');
      
      if(empty($category_data)){
        redirect('/app');
      }
      $allcategory_subcategorylist = $this->Master_model->getall_subcategory(array('t1.status'=>'1','t1.cat_id'=>$category_data['id'],'t1.type'=>'simple'),'all');
      $data['title'] = "$category_data[name]";
      $data['subcategory_list'] = $allcategory_subcategorylist;   
      //echo PRE;print_r($data);die;   
      $this->load->view('app/header',$data);
      $this->load->view('app/side-menu');
      $this->load->view('app/subcategory_view');
    }

    public function subcat(){

      $slug = $this->uri->segment('3');
      $subcategory_data = $this->Master_model->getall_subcategory(array('t1.status'=>'1','t1.slug'=>$slug),'single');
      if(empty($subcategory_data)){
        redirect('/app');
      }
      $allcategory_productlist = $this->Master_model->getall_productdata(array('t1.cat_id'=>$subcategory_data['cat_id'],'t1.prodtype'=>'product','t1.parent'=>'0','t1.publish_status'=>'1'),'all');
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
      //$productdata_sort = $this->product_sort(true);
      //echo PRE;print_r($productdata_sort);die;
      $data['title'] = "$subcategory_data[name] - $subcategory_data[catname]"; 
      $data['subcategory'] = $subcategory_data;
      $data['productlist'] =  $productlist;    

      $allsizes = $this->Master_model->getall_quantity(array('t1.cat_id'=>$subcategory_data['cat_id'],'t1.status'=>'1'),'all');
      $option_size = array(''=>'Size'); 
      if(!empty($allsizes)){
        foreach($allsizes as $size){
          $option_size[$size['id']] = $size['quant_text'];
        }
      }
      $data['allsize_option'] = $option_size;

      $allflavor = $this->Master_model->getall_subcategory(array('t1.status'=>'1','t1.type'=>'flavor'),'all');
      $option_flavor = array(''=>'Flavor');
      if(!empty($allflavor)){
        foreach($allflavor as $flavor){
          $option_flavor[$flavor['id']] = ucfirst($flavor['name']);
        }
      }
      $data['allflavor_option'] = $option_flavor;
      $data['subcat_id'] = $subcategory_data['id'];
      $this->load->view('app/header',$data);
      $this->load->view('app/side-menu');
      $this->load->view('app/subcategory_product');
    }

    public function categories(){

      $categorylist = $this->Master_model->getall_category(array('status'=>'1'),'all');       
      $cattree = array();
      if(!empty($categorylist)){
        foreach($categorylist as $maincat){
          $categoryproducts = $this->Master_model->getall_productdata(array('t1.cat_id'=>$maincat['id'],'t1.parent'=>'0','t1.publish_status'=>'1'),'all');
          $showcategory_products = array_slice( array_reverse($categoryproducts),0,25);
          $maincat['catproducts'] = $showcategory_products;
          $subcat = $this->Master_model->getall_subcategory(array('t1.status'=>'1','t1.type'=>'simple','cat_id'=>$maincat['id']),'all');
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

      $data['categorytree'] = $cattree; 
      $this->load->view("app/header",$data);
      $this->load->view("app/side-menu");
      $this->load->view('app/categories');
    }

    public function cart(){

      $data['title'] = "Cart | Your Bucket";
      $contentarray = $this->Website_model->getall_cartcontentlist();
      $data['cartcontentlist'] = $contentarray;
      //echo '<pre>';print_r($contentarray);echo '</pre>';
      $this->load->view('app/header',$data);
      $this->load->view('app/side-menu');
      $this->load->view('app/cartcontent');

    }

    public function placeorder(){
      $post = $this->input->post();
      //echo PRE;print_r($post);die;
      $status = $this->Website_model->save_placeorder($post);
      if($status['status'] == true){
        $this->session->set_flashdata('request_msg',"$status[msg]");
        redirect('app/makepayment');
      }else{
        $this->session->set_flashdata('request_err_msg',"$status[msg]");
        redirect($_SERVER['HTTP_REFERER']);
      }
      redirect('app/cart_checkout');
    }

    public function makepayment(){
      $loginstatus = $this->Master_model->checkcustomer_login();
      if($loginstatus){
        $data['title'] = "Make Payment";  
        $customerdata = $this->Website_model->get_customerdetail();
        $data['customerdata'] = $customerdata;      
        $order_addedon = $this->session->userdata('added_on');        
        $order_value = $this->session->userdata('order_id');
        $order_id_array = json_decode($order_value,true);        
        $showdata = array();$total_amount = 0;$orderno = array();$show_id=0;
        if(!empty($order_id_array)){
          foreach($order_id_array as $order_id){
            $orderdetails = $this->Master_model->getall_orderdata(array('t1.id'=>$order_id),'single');
            $diftime = $this->Website_model->getdifferencemin($orderdetails['added_on'],$orderdetails['cur_time']);
            $time_duration = 15-$diftime;
            $total_amount += $orderdetails['order_total'];
            $orderno[] =  $orderdetails['order_no'];
            $show_id = $orderdetails['id'];
          }        
          if($time_duration <=0){$this->fail_order();} 
          $orderno = implode(' , ',$orderno); 
          $showdata['order_no'] = $orderno;
          $showdata['total_amount'] = $total_amount;
          $showdata['time_duration'] = $time_duration;
          $showdata['id'] = $show_id;

          $data['orderdetails'] = $showdata;
          //echo PRE;print_r($data);
          $this->load->view('app/header',$data);
          $this->load->view('app/side-menu');
          $this->load->view('app/makepayment');
        }else{
          $this->session->set_flashdata('request_err_msg',"NO Order is Been Placed!!");
          redirect('/app');
        }        
      }else{
        $this->session->set_flashdata('request_err_msg',"Please Be Logged In!!");
        redirect('/app');
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
      $order_array = json_decode($order_id,true);
      if(!empty($order_array)){
        foreach($order_array as $orderid){
          $date = date('Y-m-d H:i:s');
          $insertstatus = $this->db->insert('order_payment',array('order_id'=>$orderid,'payment_id'=>$postdata['razorpay_payment_id'],'payment_details'=>$paymentdetail,'added_on'=>$date));
          if($insertstatus){
            // update paymentstatus
            $this->db->update('order',array('payment_status'=>'1'),array('id'=>$orderid));
            $this->session->unset_userdata('order_id');
            $this->session->unset_userdata('added_on');
            $this->session->set_flashdata('request_msg',"Order Placed Successfully !!");
          }else{
            $this->session->set_flashdata('request_err_msg',"Order Not Placed");
          }
        }
      }      
      redirect('/app');
    }

    public function fail_order(){
      $order_id = $this->session->userdata('order_id');
      $order_array = json_decode($order_id,true);
      if(!empty($order_array)){
        foreach($order_array as $orderid){
          $this->db->update('order',array('payment_status'=>'0','status'=>'0'),array('id'=>$orderid));
        }
      }
      $this->session->unset_userdata('order_id');
      $this->session->unset_userdata('added_on');
      $this->session->set_flashdata('request_err_msg',"Payment Window Closed");
      redirect('/app');
    }
    

   
}