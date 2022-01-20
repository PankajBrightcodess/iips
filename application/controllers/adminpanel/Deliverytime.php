<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Deliverytime extends CI_Controller{
    function __construct(){
        parent::__construct();
        checklogin();        
    }

    public function addslot(){
        $data['title'] = 'Add Delivery Slot';
        $data['breadcrumb'] = array('admin/'=>'Dashboard');
        $data['switchery'] = true;
        $data['datatable'] = true;
        $categorylist= $this->Master_model->getall_location(array('t1.status'=>'1'),'all');
        $maincatoption = array();
        $maincatoption[''] = '-- Select Location --';
        if(!empty($categorylist)){
            foreach($categorylist as $list){
                $maincatoption[$list['id']] = $list['name'];
            }
        }
        $data['maincatoption'] = $maincatoption;        
        $data['slotlist'] = $this->Master_model->getall_slot(array('t1.status'=>'1'),'all');
        $this->template->load('adminpanel/deliverytime/slot','add_view',$data);
    }

    public function editslot(){
        $editid = $this->uri->segment('4');
        if(!empty($editid)){
            $data['title'] = 'Edit Delivery Slot';
            $data['breadcrumb'] = array('admin/'=>'Dashboard');
            $data['switchery'] = true;
            $data['datatable'] = true;
            $categorylist= $this->Master_model->getall_location(array('t1.status'=>'1'),'all');
            $maincatoption = array();
            $maincatoption[''] = '-- Select Location --';
            if(!empty($categorylist)){
                foreach($categorylist as $list){
                    $maincatoption[$list['id']] = $list['name'];
                }
            }
            $data['maincatoption'] = $maincatoption;   
            $data['editid'] = $editid;     
            $data['slotlist'] = $this->Master_model->getall_slot(array('t1.status'=>'1'),'all');
            $data['oneslot'] = $this->Master_model->getall_slot(array('t1.status'=>'1','t1.id'=>$editid),'single');
            $this->template->load('adminpanel/deliverytime/slot','edit_view',$data);
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function saveslot(){
        $data = $this->input->post();
        unset($data['save_slot']);
        $status = $this->Master_model->save_slot($data);
        if($status == true){
            $this->session->set_flashdata('msg',"Slot Added Succesfully!");
        }else{
            $this->session->set_flashdata('err_msg',"Please Try Again !!");
        }
        redirect('admin/deliverytime/addslot');
    }

    public function updateslot(){
        $data = $this->input->post();
        unset($data['save_slot']);
        $status = $this->Master_model->update_slot($data);
        if($status == true){
            $this->session->set_flashdata('msg',"Slot Updated Succesfully!");
        }else{
            $this->session->set_flashdata('err_msg',"Please Try Again !!");
        }
        redirect('admin/deliverytime/addslot');
    }

    public function publishslot(){
        $pid = $this->input->post('id');
        $status = $this->input->post('status');
        echo $this->Master_model->update_publish_slot($pid,$status);
    } 

    public function addtime(){
        $data['title'] = 'Add Delivery Time';
        $data['breadcrumb'] = array('admin/'=>'Dashboard');
        $data['switchery'] = true;
        $data['datatable'] = true;
        $categorylist= $this->Master_model->getall_location(array('t1.status'=>'1'),'all');
        $maincatoption = array();
        $maincatoption[''] = '-- Select Location --';
        if(!empty($categorylist)){
            foreach($categorylist as $list){
                $maincatoption[$list['id']] = $list['name'];
            }
        }
        $data['maincatoption'] = $maincatoption;      
        $data['slotlistarray'] = array(''=>'--Select Slot--');
        $data['deliverytimelist'] = $this->Master_model->getall_deliverytime(array('t1.status'=>'1'),'all');
        $this->template->load('adminpanel/deliverytime/time','add_view',$data);
    }

    public function edit_time(){
        $editid = $this->uri->segment('4');
        if(!empty($editid)){
            $data['title'] = 'Edit Delivery Time';
            $data['breadcrumb'] = array('admin/'=>'Dashboard');
            $data['switchery'] = true;
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
            $data['editid'] = $editid;      
            $data['slotlistarray'] = array(''=>'--Select Slot--');
            $data['deliverytimelist'] = $this->Master_model->getall_deliverytime(array('t1.status'=>'1'),'all');
            $data['onetime'] = $this->Master_model->getall_deliverytime(array('t1.status'=>'1','t1.id'=>$editid),'single');
            $this->template->load('adminpanel/deliverytime/time','edit_view',$data);
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function ajax_getslot(){
        $catid = $this->input->post('catid');
        $deliveryslot = $this->Master_model->getall_slot(array('t1.status'=>'1','t1.publish_status'=>'1','t1.location_id'=>$catid),'all');
        $slotoption = '<option value="">--Select Slot--</option>';
        if(!empty($deliveryslot)){
            foreach($deliveryslot as $list){
                $slotoption .= "<option value='".$list['id']."'>".$list['name']."</option>";
            }
        }
        $option['slot'] = $slotoption;
        echo json_encode($option);
    }

    public function savetime(){
        $data = $this->input->post();
        unset($data['save_time']);
        $status = $this->Master_model->save_deliverytime($data);
        if($status){
            $this->session->set_flashdata('msg',"Delivery Time Added Succesfully!");
        }else{
            $this->session->set_flashdata('err_msg',"Please Try Again !!");
        }
        redirect('admin/deliverytime/addtime');
    }

    public function updatetime(){
        $data = $this->input->post();
        unset($data['save_time']);
        $status = $this->Master_model->update_deliverytime($data);
        if($status){
            $this->session->set_flashdata('msg',"Delivery Time Updated Succesfully!");
        }else{
            $this->session->set_flashdata('err_msg',"Please Try Again !!");
        }
        redirect('admin/deliverytime/addtime');
    }

    public function publishtime(){
        $pid = $this->input->post('id');
        $status = $this->input->post('status');
        echo $this->Master_model->update_publish_time($pid,$status);
    }

    public function addzones(){
        $data['title'] = 'Add Delivery Zones';
        $data['breadcrumb'] = array('admin/'=>'Dashboard');
        $data['switchery'] = true;
        $data['datatable'] = true;   
             
        $data['zonelist'] = $this->Master_model->getall_zones(array('t1.status'=>'1'),'all');
        $this->template->load('adminpanel/deliverytime/zones','add_view',$data);
    }

    public function editzone(){
        $editid = $this->uri->segment('4');
        if(!empty($editid)){
            $data['title'] = 'Edit Delivery Zones';
            $data['breadcrumb'] = array('admin/'=>'Dashboard');
            $data['switchery'] = true;
            $data['datatable'] = true;   
            $data['editid']  = $editid;    
            $data['zonelist'] = $this->Master_model->getall_zones(array('t1.status'=>'1'),'all');
            $data['onezone'] = $this->Master_model->getall_zones(array('t1.id'=>$editid,'t1.status'=>'1'),'single');
            $this->template->load('adminpanel/deliverytime/zones','edit_view',$data);
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function savezone(){
        $data = $this->input->post();
        unset($data['save_zone']);
        $status = $this->Master_model->save_zone($data);
        if($status){
            $this->session->set_flashdata('msg',"Delivery Zone Added Succesfully!");
        }else{
            $this->session->set_flashdata('err_msg',"Please Try Again !!");
        }
        redirect('admin/deliverytime/addzones');
    }

    public function updatezone(){
        $data = $this->input->post();
        unset($data['save_zone']);
        $status = $this->Master_model->update_zone($data);
        if($status){
            $this->session->set_flashdata('msg',"Delivery Zone Updated Succesfully!");
        }else{
            $this->session->set_flashdata('err_msg',"Please Try Again !!");
        }
        redirect('admin/deliverytime/addzones');
    }

    public function publishzone(){
        $pid = $this->input->post('id');
        $status = $this->input->post('status');
        echo $this->Master_model->update_publish_zone($pid,$status);
    }
}