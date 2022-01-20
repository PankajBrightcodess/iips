<?php
class Staff extends CI_controller{
	public function __construct()
	{
	parent::__construct();
        checklogin();

	}
	
	public function add_staff()
	{
		$data['title']="Add Staff";
		$data['desg']=$this->Inv_model->getdata('designation');
		$this->template->load('adminpanel/staff','add_staff',$data);
		
	}
	
	public function add_staff_op()
	{
	$data=$this->input->post();
	unset($data['addstaff']);
	 $upload_path='./assets/images/admin/staff'; 
     $allowed_types='gif|jpg|jpeg|png'; 
     $path=upload_file("picture",$upload_path,$allowed_types,time());
     if($path!=''){
     $data['picture']=$path;
	 }
	 //echo PRE;print_r($data);die;
	$run=$this->db->insert('staff',$data);
	if($run)
	{
		$this->session->set_flashdata('msg',"Staff Added Successfully");
	}
	else{
		$this->session->set_flashdata('err_msg',"Error");
		}
		redirect($_SERVER['HTTP_REFERER']);
	//echo PRE;print_r($data);die;	
	}
	
	public function staff_list()
	{
	$data['datatable']=true;
	$data['title']="Staff List";
	$data['details']=$this->Staff_model->staff_details();
	$this->template->load('adminpanel/staff','staff_list',$data);
	
	//echo PRE;print_r($data);die;
	}
	
	public function edit_staff()
	{
	$data['title']="Edit_Staff";
	$id=$this->uri->segment(4);
	$data['desg']=$this->Inv_model->getdata('designation');
	$data['record']=$this->Inv_model->selectbyquery1('staff',"`id`='$id'");
	$this->template->load('adminpanel/staff','edit_staff',$data);
	//echo PRE;print_r($record);die;	
	}
	public function update_staff()
	{
	$id=$this->uri->segment(4);
	$data=$this->input->post();
	unset($data['update_staff']);
	$upload_path='./assets/images/admin/staff'; 
    $allowed_types='gif|jpg|jpeg|png'; 
    $path=upload_file("picture",$upload_path,$allowed_types,time());
    if($path!=''){
    $data['picture']=$path;
	}
	$upload=$this->Inv_model->update('staff',$data,"`id`=$id");		
	if($upload==true)
	{
	$this->session->set_flashdata('msg',"Updated Successfully");	
	}
	else{
		$this->session->set_flashdata('err_msg',"ERROR");
		}
	redirect('admin/staff/staff_list/');
	}
	
	public function delete_rec()
	{
	$id=$this->input->post('id');
	$delete=$this->db->delete('staff',"`id`='$id'");
	if($delete)
	{
	echo "Deleted Successfully";	
	}	
	else{
		echo "Error";
		}
	}
	
	}
?>