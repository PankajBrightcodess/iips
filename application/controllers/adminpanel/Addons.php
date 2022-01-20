<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addons extends CI_Controller {
	function __construct(){
		parent::__construct();
        checklogin();
    }

    public function addnew(){
        $data['title'] = 'Add Addons';
        $data['breadcrumb'] = array('admin/'=>'Dashboard');        
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
        $this->template->load('adminpanel/addons/','add',$data);
    }

    public function editaddons(){
        $editid = $this->uri->segment('4');
        if(!empty($editid)){
            $data['title'] = 'Edit Addons';
            $data['breadcrumb'] = array('admin/'=>'Dashboard');        
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
            $data['editid'] = $editid;
            $data['oneproduct'] = $this->Master_model->getall_addons_productdata(array('t1.status'=>'1','t1.prodtype'=>'addons','t1.id'=>$editid),'single');
            $this->template->load('adminpanel/addons/','edit',$data);
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    

    public function save_addons(){
        
        $data = $this->input->post();      
        unset($data['addproducts']);

        $upload_path='./assets/images/admin/product'; 
        $allowed_types='gif|jpg|jpeg|png'; 
        $path=upload_file('image',$upload_path,$allowed_types,time(),3000);
        if($path!=''){
            $data['path'] = $path;
        }	
        
        $status = $this->Master_model->save_addons($data);
        //echo $this->db->last_query();die;
        if($status == true){
            $this->session->set_flashdata('msg',"Product Added Succesfully!");
        }else{
            $this->session->set_flashdata('err_msg',"Please Try Again !!");
        }
        redirect('admin/addons/addnew');
    }

    public function update_addons(){
        $data = $this->input->post();      
        unset($data['addproducts']);

        $upload_path='./assets/images/admin/product'; 
        $allowed_types='gif|jpg|jpeg|png'; 
        $path=upload_file('image',$upload_path,$allowed_types,time(),3000);
        if($path!=''){
            $data['path'] = $path;
        }	
        
        $status = $this->Master_model->update_addons($data);
        //echo $this->db->last_query();die;
        if($status == true){
            $this->session->set_flashdata('msg',"Product Updated Succesfully!");
        }else{
            $this->session->set_flashdata('err_msg',"Please Try Again !!");
        }
        redirect('admin/addons/productlist');
    }

    public function productlist(){

        $data['title'] = 'Product List';
        $data['breadcrumb'] = array('admin/'=>'Dashboard');        
        $data['datatable'] = true;
        $data['switchery'] = true;
        $data['productlist'] = $this->Master_model->getall_addons_productdata(array('t1.status'=>'1','t1.prodtype'=>'addons'),'all');
        //echo PRE;print_r($prodlist);die;
        $this->template->load('adminpanel/addons/','viewlist',$data);
    }

    public function publishproduct(){
        $pid = $this->input->post('id');
        $status = $this->input->post('status');
        echo $this->Master_model->update_publish_addons_product($pid,$status);
    }

}