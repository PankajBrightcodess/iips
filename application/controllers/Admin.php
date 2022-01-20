<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
		checklogin();
		$data['title']="Dashboard | Home";	
		$customerlist = $this->Master_model->getall_customerdata(array('t1.status'=>'1','t2.block_status'=>'0'),'all');
        $orderdata = $this->Master_model->getall_orderdata(array('t1.status'=>'1','t1.delivery_status'=>'0'),'all');
        $data['usercount'] = count($customerlist);       
        $data['ordercount'] = count($orderdata); 	
		$this->template->load('adminpanel/report','dashboard',$data);
	}
	
	/********************* Admin Login Part **********************/
	public function login(){	
		loginredirect('admin');
		$this->session->unset_userdata("username");
		$data['title']="Login";
		$data['body_class']="login-page";
		$this->load->view('includes/top-section',$data);
		$this->load->view('pages/login');
	}
	
	public function forgotpassword(){
		$this->session->unset_userdata("username");
		$data['title']="Forgot Password";
		$data['body_class']="login-page";
		$this->load->view('includes/top-section',$data);
		$this->load->view('pages/forgotpassword');
	}
	
	public function enterotp(){
		if($this->session->userdata('username')===NULL){redirect('login/');}
		$data['title']="Enter OTP";
		$data['body_class']="login-page";
		$this->load->view('includes/top-section',$data);
		$this->load->view('pages/enterotp');
	}
	
	public function resetpassword(){
		if($this->session->username===NULL){redirect('login/');}
		$data['title']="Reset Password";
		$data['body_class']="login-page";
		$this->load->view('includes/top-section',$data);
		$this->load->view('pages/resetpassword');
	}
	
	public function logout(){
		if($this->session->user!==NULL){
			$data=array("user","name","role");
			$this->session->unset_userdata($data);
		}	
		redirect('adminpanel/');
	}
	
	
	public function validatelogin(){
		$data=$this->input->post();		
		unset($data['login']);
		$result=$this->Account_model->login($data);		
		if($result['verify']===true){
			$this->startsession($result);
			loginredirect('adminpanel');
		}
		else{ 
			$this->session->set_flashdata('logerr',$result['verify']);
			redirect('adminpanel/');
		}		
	}
	
	public function startsession($result){
		$data['user']=md5($result['id']);
		$data['name']=$result['name'];
		$data['role']=$result['role'];
		$this->session->set_userdata($data);
	}
	
	public function validateUser(){
		if($this->input->post('forgotpassword')!==NULL){
			$username=$this->input->post('username');
			$result=$this->Account_model->createotp($username);
			if($result['status']===true){
				$otp=$result['otp'];
				$verification_msg="$otp is your One Time Password to Reset password . This OTP is valid for 15 minutes.";
				$smsdata=array("mobile"=>$result['mobile'],"message"=>$verification_msg);
				
				//send_sms($smsdata);
				
				$this->session->set_userdata("username",$username);
				redirect('enterotp/'.$otp);
			}
			else{
				$this->session->set_flashdata("logerr","Username not valid!");
				redirect('forgotpassword/');
			}
		}
		else{
			redirect('login/');
		}
	}
	
	public function validateOTP(){
		if($this->session->username===NULL){redirect('login/');}
		if($this->input->post('submitotp')!==NULL){
			$data['otp']=$this->input->post('otp');
			$data['username']=$this->session->username;
			$result=$this->Account_model->verifyotp($data);
			if($result['verify']===true){
				redirect('resetpassword/');
			}
			else{
				$this->session->set_flashdata("logerr",$result['verify']);
				redirect('enterotp/');
			}
		}
		redirect('login/');
	}
	
	public function skipreset(){
		if($this->session->username!==NULL){
			$username=$this->session->username;
			$this->session->unset_userdata("username");
			$result=$this->Account_model->getuser(array("username"=>$username));
			$this->startsession($result);
			redirect('/');
		}
		redirect("login/");
	}
	
	public function changepassword(){
		if($this->session->username!==NULL){
			$password=$this->input->post('password');
			$username=$this->session->userdata("username");
			$where['username']=$username;
			$result=$this->Account_model->changepassword($password,$where);
		}
		redirect('login/');
	}
	public function createadmin(){
		$data['title']="Create Admin";
		$data['body_class']="login-page";
		$this->load->view('includes/top-section',$data);
		$this->load->view('pages/createadmin');
	}
	
	public function insertadmin(){
		if($this->input->post('createadmin')!==NULL){
			$data=$this->input->post();
			unset($data['createadmin']);
			$this->Account_model->createadmin($data);
		}
		redirect('login/');
	}
	/********************* Admin Login Part End **********************/
	/********************* All Data ******************************/
	public function alldata($token=''){
		$this->load->library('alldata');
		$this->alldata->viewall($token);
	}
	
	public function gettable(){
		$this->load->library('alldata');
		$this->alldata->gettable();
	}
	
	public function updatedata(){
		$this->load->library('alldata');
		$this->alldata->updatedata();
	}
	/********************* All Data End ******************************/
}
