<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {
	function __construct(){
		parent::__construct();
        checklogin();

    }

    public function categorygrid(){
        $data['title'] = 'Category Grid';
        $data['datatable'] = true;
        $data['switchery'] = true;
        $subcategory = $this->Master_model->getall_subcategory(array('t1.status'=>'1','t1.type'=>'simple'),'all');
        $data['categorylist'] = $subcategory;
        $this->template->load('adminpanel/website/grid','add',$data);
    }

    public function publish_categorygrid(){
        $pid = $this->input->post('id');
        $status = $this->input->post('status');
        echo $this->Master_model->update_publish_categorygrid($pid,$status);
    }

    public function publish_subcatproduct(){
        $pid = $this->input->post('id');
        $status = $this->input->post('status');
        echo $this->Master_model->update_publish_subcatproduct($pid,$status);
    }

    public function categorydesign(){
        $data['title'] = 'Category Front Page Design';
        $data['datatable'] = true;
        $data['switchery'] = true;
        $data['select2'] = true;
        $category = $this->Master_model->getall_category(array('status'=>'1'),'all');
        $data['categorylist'] = $category;
        $this->template->load('adminpanel/website/frontpage','add',$data);
    }

    public function publish_catdesign(){
        $pid = $this->input->post('id');
        $status = $this->input->post('status');
        echo $this->Master_model->update_publish_catdesign($pid,$status);
    }

    public function catdesign_type(){
        $pid = $this->input->post('id');
        $design_type = $this->input->post('design_type');
        echo $this->Master_model->update_catdesign_type($pid,$design_type);
    }

    public function save_webdesign(){   
        $postdata = $this->input->post();
        //print_r($postdata);
        $pid = $this->input->post('id');
        $design_type = $this->input->post('design_type');
        $publish_status = $this->input->post('publish_status');
        $subcat = $this->input->post('subcat');
        if(!empty($subcat)){
            if($design_type == 'show_five_subcat'){
                $subcat = array_chunk($subcat,5,true);
            }
            if($design_type == 'show_four_subcat'){
                $subcat = array_chunk($subcat,4,true);
            }
            $return = $this->Master_model->update_catdesign_type($pid,$design_type,$subcat,$publish_status);
        }else{
            $return = $this->Master_model->update_catdesign_type($pid,$design_type,NULL,$publish_status);
        }
        if($return){
            $this->session->set_flashdata('msg',"Added Successfully");
        }else{
            $this->session->set_flashdata('err_msg',"Error");
        }
        redirect('admin/website/categorydesign');
    }
}