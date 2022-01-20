<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once (APPPATH . 'third_party/razorpay/Razorpay.php');
//use Razorpay\Api\Api;

class Website extends CI_Controller {
    function __construct(){
		  parent::__construct();
      $this->load->helper('webmenu');
    }
    
    public function index(){   
        //echo 'WEBSITE IS UNDER CONSTRUCTION !!';die;     
        $categorylist = $this->Master_model->getall_category(array('status'=>'1'),'all');    
        //$subcategorylist = $this->Master_model->getall_subcategory(array('t1.status'=>'1','t1.type'=>'simple'),'all');
        $cattree = array();
        if(!empty($categorylist)){
          foreach($categorylist as $maincat){
            $categoryproducts = $this->Master_model->getall_productdata(array('t1.cat_id'=>$maincat['id'],'t1.parent'=>'0','t1.publish_status'=>'1'),'all','','',array('t1.id'));
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
        //echo PRE;print_r($data);die;
        $data['title'] = "Home | IIPS";        
        $this->load->view('website/header',$data);
        $this->load->view('website/menubar');		
		    $this->load->view('website/index');        
    }

    public function filter(){
        $data['title'] = "Filter | IIPS";
        $this->load->view('website/header',$data);
        $this->load->view('website/menubar');		
		    $this->load->view('website/filter');
    }

    public function checkup_slug(){
      
    }

    public function subcategory_view(){

      $slug = $this->uri->segment('2');
      $subcategory_data = $this->Master_model->getall_subcategory(array('t1.status'=>'1','t1.slug'=>$slug),'single');
      if(empty($subcategory_data)){
        redirect('/');
      }
      $allcategory_productlist = $this->Master_model->getall_productdata(array('t1.cat_id'=>$subcategory_data['cat_id'],'t1.prodtype'=>'product','t1.parent'=>'0','t1.publish_status'=>'1'),'all','','',array('t1.id'));
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
      $productdata_sort = $this->product_sort(true);
      $data['title'] = "$subcategory_data[name] - $subcategory_data[catname]"; 
      $data['subcategory'] = $subcategory_data;
      $data['productlist'] =  $productdata_sort;//$productlist; 
      $data['breadcrumb'] = array('/'=>'Home',"cat/$subcategory_data[catslug]"=>"$subcategory_data[catname]",'0'=>"$subcategory_data[name]");

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
      //echo PRE;print_r($data);die;
      $this->load->view('website/header',$data);
      $this->load->view('website/menubar');
      $this->load->view('website/subcategory_product');
      
    }

    public function product_sort($pagerequired=false){
      $getdata = $this->input->get();
      $filterpoint = array();
      if(!empty($getdata)){
        if(!empty($getdata['size'])){
          $filterpoint['size'] = $getdata['size'];
        }
        if(!empty($getdata['flavor'])){
          $filterpoint['flavor'] = $getdata['flavor'];
        }
        if($getdata['low_high'] != 'not_checked'){
          $filterpoint['low_high'] = $getdata['low_high'];
        }
        if($getdata['high_low'] != 'not_checked'){
          $filterpoint['high_low'] = $getdata['high_low'];
        }
        if(!empty($getdata['subcatid'])){
          $filterpoint['subcatid'] = $getdata['subcatid'];
          $subcategory_data = $this->Master_model->getall_subcategory(array('t1.status'=>'1','t1.id'=>"$getdata[subcatid]",'single'));
        }
      }else{          
          $slug = $this->uri->segment('2');
          $subcategory_data = $this->Master_model->getall_subcategory(array('t1.status'=>'1','t1.slug'=>$slug),'single');
          $filterpoint['subcatid'] = $subcategory_data['id'];
      }
      $productdata = $this->Website_model->product_sort($filterpoint);
      //asort($productdata);
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
      //print_r($subcategory_data);    
      $return = array('productlist'=>$sortproduct,'urlpart'=>$implode,'subcategorydata'=>$subcategory_data);
      if($pagerequired){
        $return = array('productlist'=>$sortproduct,'urlpart'=>$implode);
        return $return['productlist'];
      }else{
        $this->load->view('website/subproduct_sort',$return);
      }      
    }

    public function category_view(){
      $slug = $this->uri->segment('2');
      $category_data = $this->Master_model->getall_category(array('status'=>'1','slug'=>$slug),'single');
      
      if(empty($category_data)){
        redirect('/');
      }
      $allcategory_subcategorylist = $this->Master_model->getall_subcategory(array('t1.status'=>'1','t1.cat_id'=>$category_data['id'],'t1.type'=>'simple'),'all');
      $data['title'] = "$category_data[name]";
      $data['subcategory_list'] = $allcategory_subcategorylist;
      $data['breadcrumb'] = array('/'=>'Home',"0"=>"$category_data[name]");
      $this->load->view('website/header',$data);
      $this->load->view('website/menubar');
      $this->load->view('website/subcategory_view');

    }

    public function product_description(){

      if(isset($_GET['subcat']) && !empty($_GET['subcat'])){
        $slug = $_GET['subcat'];
        $subcategory_data = $this->Master_model->getall_subcategory(array('t1.status'=>'1','t1.slug'=>$slug),'single');        
        if(empty($subcategory_data)){
          redirect('/');
        }
      }else{
        redirect('/');
      }
      
      $pid = $this->uri->segment('2');
      $productdata = $this->Master_model->getall_productdata(array('t1.status'=>'1','t1.publish_status'=>'1','md5(t1.id)'=>$pid),'single');
      $variantlist = $this->Master_model->getall_productvariant(array('t1.status'=>'1','t1.publish_status'=>'1','md5(t1.id)'=>$pid),'all');
      $addonslist = $this->Master_model->getall_addons_productdata(array('t1.status'=>'1','t1.publish_status'=>'1','t1.cat_id'=>$subcategory_data['cat_id']),'all');
      $relatedproduct = $this->Master_model->getall_relatedproduct(array('cat_id'=>$subcategory_data['cat_id'],'subcat_id'=>$subcategory_data['id'],'not_pid'=>$productdata['id']),array('t1.added_on','desc'),8);
      //$productoptions = $this->Master_model->getproduct_options(array('status'=>'1','publish_status'=>'1','md5(id)'=>$pid));
     
      $data['title'] = "$productdata[product_name] - $productdata[catname]";
      $data['subcategory'] = $subcategory_data;
      $data['productdata'] = $productdata;      
      $data['variantlist'] = $variantlist;
      $data['relatedlist'] = $relatedproduct;
      /*product addons list according to cat id*/      
      $data['addonslist'] = $addonslist;
      /*product flavour,shape,cream*/
      // $data['flavoroption'] = $productoptions['flavoroption'];
      // if(!empty($productoptions['shapeoption'])){
      //   if(count($productoptions['shapeoption']) > 1){
      //       $data['shapeoption'] = $productoptions['shapeoption'];
      //   }
      // }
      // if(!empty($productoptions['creamoption'])){
      //   if(count($productoptions['creamoption']) > 1){
      //       $data['creamoption'] = $productoptions['creamoption'];
      //     }
      // }
      $data['breadcrumb'] = array('/'=>'Home',"cat/$subcategory_data[catslug]"=>"$subcategory_data[catname]",
      "subcat/$subcategory_data[slug]"=>"$subcategory_data[name]","0"=>"$productdata[product_name]");
      //echo PRE;print_r($data);die;
      $this->load->view('website/header',$data);
      $this->load->view('website/menubar');
      $this->load->view('website/description');
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
          if($insertstatus['status'] == true){
            // add a popup
            $this->session->set_flashdata('redirect_onclose','');
            $this->session->set_flashdata('comeof','cart');
            $this->session->set_flashdata('addon_popup',"Added To Cart Successfully !!");
          }  
          redirect($_SERVER['HTTP_REFERER']);

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
          //var_dump($insertstatus);die;
          if($insertstatus['status'] == true){
            $this->session->set_flashdata('redirect_onclose','website/cart_checkout');
            $this->session->set_flashdata('comeof','buynow');
            $this->session->set_flashdata('addon_popup',"Successfully!!");
          }  
          redirect($_SERVER['HTTP_REFERER']);             
        }else{
          $this->session->set_flashdata('request_err_msg',"Try Again !!");
          redirect('/');
        } 
      }else{        
        $this->session->set_flashdata('request_err_msg',"Please Select Delivery Date Time !!");
        redirect($_SERVER['HTTP_REFERER']);
      }
      redirect($_SERVER['HTTP_REFERER']);         
    }

    public function signup(){
        $data['title'] = 'Customer Signup';
        $this->load->view('website/header',$data);
        $this->load->view('website/menubar');
        $this->load->view('website/signup');
        
    }

    public function saveregister(){
      $data = $this->input->post();
      $status = $this->Website_model->validatesignup($data);
      if($status['status']){
        $this->session->set_flashdata('request_msg',"$status[msg]");
      }else{
        $this->session->set_flashdata('request_err_msg',"$status[msg]");
      }      
      redirect('/signup');
    }

    public function login(){
        $data['title'] = 'Customer Login';
        $this->load->view('website/header',$data);
        $this->load->view('website/menubar');
        $this->load->view('website/signin');
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
      redirect('/');
    }

    public function logout(){
      if($this->session->cuserid!==NULL){
        $data=array("cuserid","name","role");
        $this->session->unset_userdata($data);
      }	
      $this->session->set_flashdata('request_msg',"Logged Out Successfully !!");
      redirect('/');
    }

    public function cart_content(){

      $data['title'] = "Cart | Your Bucket";
      $contentarray = $this->Website_model->getall_cartcontentlist();
      $data['cartcontentlist'] = $contentarray;
      //echo '<pre>';print_r($contentarray);echo '</pre>';
      $this->load->view('website/header',$data);
      $this->load->view('website/menubar');
      $this->load->view('website/cartcontent');
    }

    public function ajax_getdeliveryslot(){
        $datetime = $this->input->post('datetime');
        $pid = $this->input->post('pid');
        $datetimearray = explode(' ',$datetime);
        $finaldatetime = "$datetimearray[1] $datetimearray[2] $datetimearray[3] $datetimearray[4]";        
        $php_dateandtime = date('Y-m-d H:i:s',strtotime($finaldatetime));
        $productdata = $this->Master_model->get_productdata(array('id'=>$pid,'status'=>'1'),'single');
        $preptime = $productdata['prep_time'];
        $catid = $productdata['cat_id'];
        $deliveryslot_list = $this->Website_model->get_deliveryslot($preptime,$catid,$php_dateandtime);
        $radios = '';
        if(!empty($deliveryslot_list)){
          foreach($deliveryslot_list as $list){
              $radios.="<div class='abc'>
              <label><input type='radio' name='myRadios' class='myRadios' value='$list[id]' data-price='$list[slotprice]' data-text='$list[slotname] - Rs.$list[slotprice]'/>&nbsp;$list[slotname] - Rs.$list[slotprice]</label><br>
          </div>";
          }
        }else{
            echo '<p>NO Time Slot Available !!</p>';
        }
        echo $radios;
    }

    public function ajax_getdeliverytime(){
      $datetime = $this->input->post('datetime');
      $pid = $this->input->post('pid');
      $slotid = $this->input->post('slotid');
      $datetimearray = explode(' ',$datetime);
      $finaldatetime = "$datetimearray[1] $datetimearray[2] $datetimearray[3] $datetimearray[4]";        
      $php_dateandtime = date('Y-m-d H:i:s',strtotime($finaldatetime));
      $productdata = $this->Master_model->get_productdata(array('id'=>$pid,'status'=>'1'),'single');
      $preptime = $productdata['prep_time'];
      $catid = $productdata['cat_id'];
      $deliverytime_list = $this->Website_model->get_deliverytime($preptime,$catid,$php_dateandtime,$slotid);
      $radiosoption = '';
      if(!empty($deliverytime_list)){
        foreach($deliverytime_list as $tlist){
          $radiosoption.="<div class='abc'>
          <label><input type='radio' name='myRadios1' class='selectedtime' value='$tlist[id]' data-text='$tlist[name]'/> $tlist[name] hrs</label><br>
      </div>";
        }
      }else{
        echo '<p>NO Time Slot Available !!</p>';
      }
      echo $radiosoption;
    }

    public function ajax_checkpincode(){
      $pincode = $this->input->post('pincode');      
      $status = $this->Website_model->check_pincode($pincode);
      echo json_encode($status);     
      //echo $pincode;
    }

    public function ajax_getshapeprice(){
      $shape_id = $this->input->post('shape_id');
      $variantid = $this->input->post('variant_id');      
      $shapedata = $this->Master_model->getall_shape(array('t1.status'=>'1','t1.id'=>$shape_id),'single');
      $price = $shapedata['price'];
      echo $price; 
    }

    public function ajax_getcreamprice(){
      $cream_id = $this->input->post('cream_id');
      $variantid = $this->input->post('variant_id');      
      $creamdata = $this->Master_model->getall_cream(array('t1.status'=>'1','t1.id'=>$cream_id),'single');
      $size_price = $creamdata['size_price'];
      $json_array = json_decode($size_price,true);
      if(!empty($json_array[$variantid])){
        echo $json_array[$variantid];
      }else{
        echo 0;
      }
      echo 0;
    }

    public function ajax_gettoppings_price(){
      $cream_id = $this->input->post('cream_id');
      $variantid = $this->input->post('variant_id');      
      $shape_id = $this->input->post('shape_id');  
      $totalprice = 0;    
      $creamdata = $this->Master_model->getall_cream(array('t1.status'=>'1','t1.id'=>$cream_id),'single');
      $shapedata = $this->Master_model->getall_shape(array('t1.status'=>'1','t1.id'=>$shape_id),'single');
      //print_r($creamdata);
      if(!empty($creamdata)){
        $size_price = $creamdata['size_price'];
        $json_array = json_decode($size_price,true);
          if(!empty($json_array[$variantid])){
            $totalprice += $json_array[$variantid];
          }else{
            $totalprice += 0;
          }
      }
      
      if(!empty($shapedata)){
        $totalprice += $shapedata['price'];
      }     
      echo $totalprice;
    }

    public function cart_checkout(){
        // chec wheather logged in or not
        $checksession = $this->Master_model->checkcustomer_login();
        if($checksession){
          redirect('checkout/');
        }else{
          $this->session->set_flashdata('request_err_msg',"Please Login First Before Checkout !!");
          redirect('login/');
        }
        
    }

    public function save_addons(){
      $post = $this->input->post();
      //echo PRE;print_r($post);die;
      $redirectto = '/';
      if(isset($_SERVER['HTTP_REFERER'])){
        $redirectto = $_SERVER['HTTP_REFERER'];
      }

      if(!empty($post)){
        $comingfrom = $post['comingfrom'];
        unset($post['name']);
        $status = $this->Website_model->save_addons_forcartorbuynow($post);      
        if($status){
          if($comingfrom == 'cart'){
            redirect($redirectto);
          }elseif($comingfrom == 'buynow'){
            redirect('website/cart_checkout');
          }
        }
      }   
         
      redirect($redirectto);
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

    public function checkout(){
      $loginstatus = $this->Master_model->checkcustomer_login();
      if($loginstatus){
        $data['title'] = 'Checkout'; 
        $customerdata = $this->Website_model->get_customerdetail();
        $data['customerdata'] = $customerdata;
        $contentarray = $this->Website_model->getall_cartcontentlist();
        $data['cartcontentlist'] = $contentarray;
               
        $this->load->view('website/header',$data);       
        $this->load->view('website/menubar');
        $this->load->view('website/checkout');
      }else{
        redirect('/');
      }
      
    }

    public function update_address(){
      $post = $this->input->post();
      $status = $this->Website_model->update_address($post);
      echo $status;
    }

    public function placeorder(){
      $post = $this->input->post();
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
          $this->load->view('website/header',$data);
          $this->load->view('website/menubar');
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
      redirect('/');
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
      redirect('/');
    }

    public function profile(){
      $loginstatus = $this->Master_model->checkcustomer_login();
      if($loginstatus){
        $data['title'] = 'Profile'; 
        $customerdata = $this->Website_model->get_customerdetail();
        $data['customerdata'] = $customerdata;              
        $this->load->view('website/header',$data);       
        $this->load->view('website/menubar');
        $this->load->view('website/profile');
      }else{
        redirect('/');
      }
    } 

    public function myorders(){
      $loginstatus = $this->Master_model->checkcustomer_login();
      if($loginstatus){
        $data['title'] = 'Orders'; 
        $userid = $this->session->cuserid;
        $allorderdata = $this->Website_model->getall_ordercontentlist();
        echo PRE;print_r($allorderdata);die;   
        $data['cartcontentlist'] = $allorderdata;
        $this->load->view('website/header',$data);       
        $this->load->view('website/menubar');
        $this->load->view('website/orders');
      }else{
        redirect('/');
      }
    }
    
}