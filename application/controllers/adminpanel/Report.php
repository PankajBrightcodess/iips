<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
	function __construct(){
		parent::__construct();
        checklogin();

    }

    public function dashboard(){
        $data['title'] = 'Report';
        $data['datatable'] = true;
        $data['breadcrumb'] = array('admin/'=>'Dashboard');
        $customerlist = $this->Master_model->getall_customerdata(array('t1.status'=>'1','t2.block_status'=>'0'),'all');
        $orderdata = $this->Master_model->getall_orderdata(array('t1.status'=>'1','t1.delivery_status'=>'0'),'all');
        $data['usercount'] = count($customerlist);       
        $data['ordercount'] = count($orderdata);       
        $this->template->load('adminpanel/report/','dashboard',$data);
    }

    public function userlist(){
        $data['title'] = 'Registered Users';
        $data['datatable'] = true;
        $data['breadcrumb'] = array('admin/'=>'Dashboard');
        $data['customerlist'] = $this->Master_model->getall_customerdata(array('t1.status'=>'1','t2.block_status'=>'0'),'all');
        $this->template->load('adminpanel/report/customer','viewall',$data);
    }

    public function addresslist($id=NULL){
        if($id == NULL){
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data['title'] = 'Users Addresses';
        $data['datatable'] = true;
        $data['breadcrumb'] = array('admin/'=>'Dashboard');
        $data['addresslist'] = $this->Master_model->getall_customer_address(array('t1.cust_id'=>$id),'all');
        $this->template->load('adminpanel/report/customer','addressall',$data);
    } 

    public function orderlist(){
        $data['title'] = 'Customer Orders';
        $data['datatable'] = true;
        $data['breadcrumb'] = array('admin/'=>'Dashboard');
        $orderdata = $this->Master_model->getall_orderdata(array('t1.status'=>'1','t1.delivery_status'=>'0'),'all');
        $data['orderdatalist'] = $orderdata;
		//echo PRE;print_r($data);die;
        $this->template->load('adminpanel/report/order','viewall',$data);
    }

    public function orderdetail($id=NULL){
        if($id == NULL){
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data['title'] = 'Order Detail';
        $data['datatable'] = true;
        $data['breadcrumb'] = array('admin/'=>'Dashboard');
        //$orderdata_detail = $this->Master_model->getall_orderdata_detail(array('t1.status'=>'1','t1.delivery_status'=>'0','t1.id'=>$id),'all');
        $data['orderdetails'] =$this->db->get_where('order_product',array('order_id'=>$id,'status'=>'1'))->result_array();
        //echo PRE;print_r($data);die;
        $this->template->load('adminpanel/report/order','detail',$data);
    }
}
