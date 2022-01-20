<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	function __construct(){
		parent::__construct();
        checklogin();

    }

    public function addnew(){
        $data['title'] = 'Add Product';
        $data['breadcrumb'] = array('admin/'=>'Dashboard');
        $data['select2'] = true;
        $data['datatable'] = true;
        $categorylist= $this->Master_model->getall_category(array('status'=>'1'),'all');
        $maincatoption = array();
        $maincatoption[''] = '-- Select Main Category --';
        if(!empty($categorylist)){
            foreach($categorylist as $list){
                $maincatoption[$list['id']] = $list['name'];
            }
        }
        $data['maincatoption'] = $maincatoption;

        // $categorylist= $this->Master_model->getall_lowcategory(array('status'=>'1'),'all');
        // $maincatoption = array();
        // $maincatoption[''] = '-- Select Low Category --';
        // if(!empty($categorylist)){
        //     foreach($categorylist as $list){
        //         $maincatoption[$list['id']] = $list['name'];
        //     }
        // }
        // $data['maincatoption'] = $maincatoption;

        $gstratelist= $this->Master_model->getall_gstrate(array('status'=>'1'),'all');
        $gstrateoption = array();
        $gstrateoption[''] = '-- Select Gst Rate --';
        if(!empty($gstratelist)){
            foreach($gstratelist as $list){
                $gstrateoption[$list['rate']] = $list['gst_name'];
            }
        }
        $data['gstrateoption'] = $gstrateoption;
        $data['subcatoption'] = array(''=>"-- Select Multiple Sub Category --");
        $data['lowcatoption'] = array(''=>"-- Select Multiple Low Category --");
        //$data['flavoroption'] = array(''=>"-- Select Multiple Flavour --");
        $data['quantityoption'] = array(''=>"-- Select Multiple Quantity Variant --");
        //$data['addonmenuoption'] = array(''=>"-- Select Multiple Add On Menu Option --");
        // $data['eggeroption'] = array(''=>"-- Select Product Property --");  ''''''hidden file''''''''
        //$data['shapeoption'] = array(''=>"-- Select Multiple Available Shapes --");
        //$data['creamoption'] = array(''=>"-- Select Multiple Available Cream --");
        $data['subcatlist'] = $this->Master_model->getall_subcategory(array('t1.status'=>'1'),'all');
        $this->template->load('adminpanel/product/','add',$data);
    }

    public function ajax_getsubcategory(){
        $catid = $this->input->post('catid');
        $subcategorylist = $this->Master_model->getall_subcategory(array('t1.cat_id'=>$catid,'t1.status'=>'1','t1.type'=>'simple'),'all');
        $option = array();        
        $subcatoption = '<option value="">-- Select Multiple Sub Category --</option>';
        if(!empty($subcategorylist)){
            foreach($subcategorylist as $list){
                $subcatoption .= "<option value='".$list['id']."'>".$list['name']."</option>";
            }
        }
        $option['subcat'] = $subcatoption;
        $lowcategorylist = $this->Master_model->getall_lowcategory(array('t1.cat_id'=>$catid,'t1.status'=>'1'),'all');        
        $lowcategoryoption = '<option value="">-- Select Multiple Low Category --</option>';        
        if(!empty($lowcategorylist)){
            foreach($lowcategorylist as $list){
                $lowcategoryoption .= "<option value='".$list['id']."'>".$list['name']."</option>";
            }
        }
        $option['lowcat'] = $lowcategoryoption;
        // $flavorlist = $this->Master_model->getall_subcategory(array('t1.cat_id'=>$catid,'t1.status'=>'1','t1.type'=>'flavor'),'all');        
        // $flavoroption = '<option value="">-- Select Multiple Flavor --</option>';
        // $flavoroption .= '<option value="select_all">Select All</option>';
        // if(!empty($flavorlist)){
        //     foreach($flavorlist as $list){
        //         $flavoroption .= "<option value='".$list['id']."'>".$list['name']."</option>";
        //     }
        // }
        // $option['flavor'] = $flavoroption;
        $quantitylist = $this->Master_model->getall_quantity(array('t1.cat_id'=>$catid,'t1.status'=>'1'),'all');
        $quantityoption = '<option value="">-- Select Multiple Quantity Variant --</option>';
        if(!empty($quantitylist)){
            foreach($quantitylist as $list){
                $quantityoption .= "<option value='".$list['id']."'>".$list['name']."</option>";
            }
        }
        $option['quantity'] = $quantityoption;

        $eggerlist = $this->Master_model->getall_subcategory(array('t1.cat_id'=>$catid,'t1.status'=>'1','t1.type'=>'egger'),'all');
        $eggeroption = '<option value="">-- Select Product Property --</option>';
        if(!empty($eggerlist)){
            foreach($eggerlist as $list){
                $eggeroption .= "<option value='".$list['id']."'>".$list['name']."</option>";
            }
        }
        $option['egger'] = $eggeroption;
        // $shapelist = $this->Master_model->getall_shape(array('t1.cat_id'=>$catid,'t1.status'=>'1'),'all');
        // $shapeoption = '<option value="">-- Select Multiple Available Shapes --</option>';
        // if(!empty($shapelist)){
        //     foreach($shapelist as $list){
        //         $shapeoption .= "<option value='".$list['id']."'>".$list['name']."</option>";
        //     }
        // }
        // $option['shape'] = $shapeoption;
        // $creamlist = $this->Master_model->getall_cream(array('t1.cat_id'=>$catid,'t1.status'=>'1'),'all');
        // $creamoption = '<option value="">-- Select Multiple Available Creams --</option>';
        // if(!empty($creamlist)){
        //     foreach($creamlist as $list){
        //         $creamoption .= "<option value='".$list['id']."'>".$list['name']."</option>";
        //     }
        // }
        // $option['cream'] = $creamoption;
        // $addonmenulist = $this->Master_model->getall_addonmenu(array('t1.cat_id'=>$catid,'t1.status'=>'1'),'all');
        // $addonmenuoption = '<option value="">-- Select Multiple Add On Menu Option --</option>';
        // $addonmenuoption .= '<option value="select_all">Select All</option>';
        // if(!empty($addonmenulist)){
        //     foreach($addonmenulist as $list){
        //         $addonmenuoption .= "<option value='".$list['id']."'>".$list['name']."</option>";
        //     }
        // }
        // $option['addonmenu'] = $addonmenuoption;
        echo json_encode($option);
    }

    public function ajax_getlowcategory(){
        $subcatid = $this->input->post('subcat');        
        $catid = $this->input->post('catid');
        $option = array();        
        $all_lowcat = $this->Master_model->getall_lowcategory(array('t1.status'=>'1','t1.cat_id'=>$catid),'all');
        $lowcatlist = array();
        if(!empty($all_lowcat)){
            foreach($all_lowcat as $lowcat){
                $scat = $lowcat['subcat_id'];
                if(in_array($scat,$subcatid)){
                    $lowcatlist[] = $lowcat;
                }
            }
        }
        $lowcatoption = '<option value="">-- Select Low Category--</option>';
        if(!empty($lowcatlist)){
            foreach($lowcatlist as $list){
                $lowcatoption .= "<option value='".$list['id']."' selected>".ucfirst($list['name'])."</option>";
            }
        }
        $option['lowcat'] = $lowcatoption;
        echo json_encode($option);
    }

    public function ajax_calvariant(){
        $variant = $this->input->post('variant');
        echo count($variant);
    }

    // public function addproducts(){
        
    //     $data = $this->input->post();      
    //     unset($data['addproducts']);
        
    //     $flavor = array();
    //     if(in_array('select_all',$data['flavor_id'])){
    //         $flavorlist = $this->Master_model->getall_subcategory(array('t1.cat_id'=>$data['cat_id'],'t1.status'=>'1','t1.type'=>'flavor'),'all');
    //         if(!empty($flavorlist)){
    //             foreach($flavorlist as $flav){
    //                 $flavor[] = $flav['id'];
    //             }
    //         }
    //     }else{
    //         $flavor = $data['flavor_id'];
    //     }        
    //     $addonmenu = array();
    //     if(in_array('select_all',$data['addonmenu_id'])){
    //         $addonmenulist = $this->Master_model->getall_addonmenu(array('t1.cat_id'=>$data['cat_id'],'t1.status'=>'1'),'all');
    //         if(!empty($addonmenulist)){
    //             foreach($addonmenulist as $addon){
    //                 $addonmenu[] = $addon['id'];
    //             }
    //         }
    //     }else{
    //         $addonmenu = $data['addonmenu_id'];
    //     }    
    //     $post_subcat = $data['subcat_id'];
    //     $post_flavor = $flavor;
    //     $post_egger = $data['egger_id'];
    //     $post_shape = $data['shape_id'];
    //     $post_cream = $data['cream_id'];
    //     $post_addon = $addonmenu;
        
    //     $finalsubcat = array_merge($post_subcat,$post_flavor,$post_egger);
       
    //     $subcat = json_encode($finalsubcat);
    //     $flavor = json_encode($post_flavor);
    //     $egger = json_encode($post_egger);
    //     $shape = json_encode($post_shape);
    //     $cream = json_encode($post_cream);
    //     $addonmenu = json_encode($post_addon);
    //     $variant_id = json_encode($data['variant_id']);
    //     $variant_price = json_encode($data['variant_price']);
    //     //$variant_stockhold_qty = json_encode($data['variant_stockhold_qty']);
    //     //$variant_stock_qty = json_encode($data['variant_stock_qty']);
    //     // as it is cake entry so no above 
    //     $variant_stock_qty = 1;
    //     $variant_stockhold_qty = 0;
    //     $prep_time = $data['prep_time'];
    //     $discount = json_encode($data['discount']);
    //     $cutoff_time = $data['cut_time'];

    //     $images = $_FILES['variant_image'];
    //     $upload_path='./assets/images/admin/product'; 
    //     $allowed_types='gif|jpg|jpeg|png'; 

    //     if(!empty($images)){
	// 		$t = array();
	// 		foreach($images['name'] as $key=>$image_name){
	// 			$_FILES['multi']['name'] =$image_name;
	// 			$_FILES['multi']['type'] =$images['type'][$key];
	// 			$_FILES['multi']['tmp_name'] =$images['tmp_name'][$key];
	// 			$_FILES['multi']['error'] =$images['error'][$key];
	// 			$_FILES['multi']['size'] =$images['size'][$key];
				
	// 			$path=upload_file('multi',$upload_path,$allowed_types,time(),3000);
	// 			if($path!=''){
	// 				$t[] = $path;
	// 			}
	// 		}			
	// 	}

    //     $insertdata = array('product_name'=>$data['product_name'],'cat_id'=>$data['cat_id'],'prep_time'=>$prep_time,
    //     'discount'=>$discount,'cut_time'=>$cutoff_time,'gst_rate'=>$data['gst_rate'],'prodtype'=>$data['prodtype'],
    //     'subcat_id'=>$subcat,'flavor_id'=>$flavor,'property_id'=>$egger,'shape_id'=>$shape,'cream_id'=>$cream,'addonmenu_id'=>$addonmenu,'variant_id'=>$variant_id,
    //     'variant_price'=>$variant_price,'variant_stockhold_qty'=>$variant_stockhold_qty,'path'=>$t,'variant_stock_qty'=>$variant_stock_qty);
        
    //     $status = $this->Master_model->saveproduct($insertdata);
    //     //echo $this->db->last_query();die;
    //     if($status == true){
    //         $this->session->set_flashdata('msg',"Product Added Succesfully!");
    //     }else{
    //         $this->session->set_flashdata('err_msg',"Please Try Again !!");
    //     }
    //     redirect('admin/product/addnew');
    // }

    public function addproducts(){

        $data = $this->input->post();      
        unset($data['addproducts']); 
        $post_subcat = $data['subcat_id'];
        if(!empty($data['lowcat_id'])){
            $post_lowcat = $data['lowcat_id']; 
        }else{
            $post_lowcat = ''; 
        }     
        $post_egger = $data['egger_id'];
        // print_r($post_egger);die;
        //$post_addon = $addonmenu;
        $finalsubcat = array_merge($post_subcat);  //,$post_egger by pankaj
        $subcat = json_encode($finalsubcat);   
        $lowcat = json_encode($post_lowcat);     
        // $egger = json_encode($post_egger);    //hide by pankaj      
        //$addonmenu = json_encode($post_addon);
        $variant_id = json_encode($data['variant_id']);
        $variant_price = json_encode($data['variant_price']);
        $variant_dicount = json_encode($data['discount']);
        //$variant_stockhold_qty = json_encode($data['variant_stockhold_qty']);
        $variant_stock_qty = json_encode($data['variant_stock_qty']);
        // as it is cake entry so no above 
        //$variant_stock_qty = 1;
        //$variant_stockhold_qty = 0;
        //$prep_time = $data['prep_time'];
        $discount = json_encode($data['discount']);
        // print_r($discount);die;
        //$cutoff_time = $data['cut_time'];

        $images = $_FILES['variant_image'];
        $upload_path='./assets/images/admin/product'; 
        $allowed_types='gif|jpg|jpeg|png'; 

        if(!empty($images)){
			$t = array();
			foreach($images['name'] as $key=>$image_name){
				$_FILES['multi']['name'] =$image_name;
				$_FILES['multi']['type'] =$images['type'][$key];
				$_FILES['multi']['tmp_name'] =$images['tmp_name'][$key];
				$_FILES['multi']['error'] =$images['error'][$key];
				$_FILES['multi']['size'] =$images['size'][$key];
				
				$path=upload_file('multi',$upload_path,$allowed_types,time(),3000);
				if($path!=''){
					$t[] = $path;
				}
			}			
		}

        $insertdata = array('product_name'=>$data['product_name'],'cat_id'=>$data['cat_id'],
        'discount'=>$discount,'gst_rate'=>$data['gst_rate'],'prodtype'=>$data['prodtype'],
        'subcat_id'=>$subcat,'lowcat_id'=>$lowcat,'variant_id'=>$variant_id,
        'variant_price'=>$variant_price,'path'=>$t,'variant_stock_qty'=>$variant_stock_qty);   //'property_id'=>$egger bt pankaj
       
        $status = $this->Master_model->saveproduct($insertdata);
        //echo $this->db->last_query();die;
        if($status == true){
            $this->session->set_flashdata('msg',"Product Added Succesfully!");
        }else{
            $this->session->set_flashdata('err_msg',"Please Try Again !!");
        }
        redirect('admin/product/addnew');
    }

    public function productlist(){

        $data['title'] = 'Product List';
        $data['breadcrumb'] = array('admin/'=>'Dashboard');        
        $data['datatable'] = true;
        $data['switchery'] = true;
        $data['productlist'] = $this->Master_model->getall_productdata(array('t1.status'=>'1','t1.prodtype'=>'product','t1.parent'=>'0'),'all','','',array('id'));
        //echo PRE;print_r($data['productlist']);die;
        $this->template->load('adminpanel/product/','viewlist',$data);
    }

    public function publishproduct(){
        $pid = $this->input->post('id');
        $status = $this->input->post('status');
        echo $this->Master_model->update_publish_product($pid,$status);
    }

    public function productdetail(){
        $pid = $this->uri->segment('4');
        if(!empty($pid)){
            $data['title'] = 'Add Product Description';
            $data['breadcrumb'] = array('admin/'=>'Dashboard');
            $data['select2'] = true;
            $data['datatable'] = true;
            $data['product'] = $this->Master_model->getall_productvariant(array('md5(t1.id)'=>md5($pid),'t1.status'=>'1'),'single');
            //print_r($data['productdata']);die;        
            $this->template->load('adminpanel/product/','add_desp',$data);
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function save_productdetail(){
        $data = $this->input->post();
        $status = $this->Master_model->save_productdetail($data);
        if($status){
            $this->session->set_flashdata('msg',"Product Description Added Succesfully!");
        }else{
            $this->session->set_flashdata('err_msg',"Please Try Again !!");
        }
        redirect('admin/product/productlist');
    }

    public function editproduct(){
        $pid = $this->uri->segment('4');
        if(!empty($pid)){
            $data['title'] = 'Edit Product';
            $data['breadcrumb'] = array('admin/'=>'Dashboard');
            $data['select2'] = true;
            $data['datatable'] = true;
            $categorylist= $this->Master_model->getall_category(array('status'=>'1'),'all');
            $maincatoption = array();
            $maincatoption[''] = '-- Select Main Category --';
            if(!empty($categorylist)){
                foreach($categorylist as $list){
                    $maincatoption[$list['id']] = $list['name'];
                }
            }
            $data['maincatoption'] = $maincatoption;
            $gstratelist= $this->Master_model->getall_gstrate(array('status'=>'1'),'all');
            $gstrateoption = array();
            $gstrateoption[''] = '-- Select Gst Rate --';
            if(!empty($gstratelist)){
                foreach($gstratelist as $list){
                    $gstrateoption[$list['rate']] = $list['gst_name'];
                }
            }
            $data['gstrateoption'] = $gstrateoption;
            $addonmenulist= $this->Master_model->getall_addonmenu(array('t1.status'=>'1'),'all');
            $addonmenuoption = array();
            $addonmenuoption[''] = '-- Select Multiple Toppings --';
            if(!empty($addonmenulist)){
                foreach($addonmenulist as $list){
                    $addonmenuoption[$list['id']] = $list['name'];
                }
            }
            $data['addonmenuoption'] = $addonmenuoption;
            $data['subcatoption'] = array(''=>"-- Select Multiple Sub Category --");
            $data['lowcatoption'] = array(''=>"-- Select Multiple Low Category --");
            //$data['flavoroption'] = array(''=>"-- Select Multiple Flavour --");
            $data['quantityoption'] = array(''=>"-- Select Multiple Quantity Variant --");
            $data['eggeroption'] = array(''=>"-- Select Product Property --");
            //$data['shapeoption'] = array(''=>"-- Select Multiple Available Shapes --");
            //$data['creamoption'] = array(''=>"-- Select Multiple Available Cream --");
            //$data['addonmenu_option'] = array(''=>"-- Select Multiple Toppings --");
            $data['subcatlist'] = $this->Master_model->getall_subcategory(array('t1.status'=>'1'),'all');
            $data['productdata'] = $this->Master_model->getall_productdata(array('md5(t1.id)'=>md5($pid),'t1.status'=>'1'),'all');     
            //echo PRE;print_r($data);die;       
            $this->template->load('adminpanel/product/','edit',$data);
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function update_product(){
        $data = $this->input->post();
        //echo PRE;print_r($data);die;
        $status = $this->Master_model->update_product($data);
        if($status){
            $this->session->set_flashdata('msg',"Product Updated Succesfully!");
        }else{
            $this->session->set_flashdata('err_msg',"Please Try Again !!");
        }
        redirect('admin/product/productlist');
    }

    public function availability(){
        $data['title'] = 'Product Availability';
        $data['breadcrumb'] = array('admin/'=>'Dashboard');
        $data['select2'] = true;
        $data['datatable'] = true;
        $locationlist = $this->Master_model->getall_location(array('t1.status'=>'1'),'all');  
        $locationoption = array();
        $locationoption[''] = '-- Select Available Location --';
        if(!empty($locationlist)){
            foreach($locationlist as $list){
                $locationoption[$list['id']] = $list['name'];
            }
        }
        $data['locationoption'] = $locationoption;
        $productlist = $this->Master_model->getall_productdata(array('t1.status'=>'1','t1.prodtype'=>'product','t1.parent'=>'0'),'all','','',array('id'));
        $productoption = array();
        $productoption[''] = '-- Select Product --';
        if(!empty($productlist)){
            foreach($productlist as $list){
                $productoption[$list['id']] = $list['product_name'];
            }
        }
        $data['productoption'] = $productoption;
        $availdata = $this->Master_model->getall_desp(array('t1.status'=>'1'),'all');
        $data['availdatalist'] = $availdata;
        $this->template->load('adminpanel/product/','add_location',$data);
    }

    public function save_availability(){
        $data = $this->input->post();
        unset($data['save_location']);
        $status = $this->Master_model->save_availability($data);
        if($status){
            $this->session->set_flashdata('msg',"Product Updated Succesfully!");
        }else{
            $this->session->set_flashdata('err_msg',"Please Try Again !!");
        }
        redirect('admin/product/availability');
    }

}