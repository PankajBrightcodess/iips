<?php
class Sales extends CI_controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Sales_model');	
        checklogin();

	}
		
	public function get_order_details()
	{
		$data['title']="Orders";
		$data['datatable']=true;
		$data['orderdetails']=$this->Inv_model->getdata('order');	
		//echo PRE;print_r($data);die;
		$this->template->load('adminpanel/sales/order','detail',$data);
	}	
	public function orderdetail(){
        $id=$this->uri->segment(4);
        $data['title'] = 'Order Detail';
        $data['datatable'] = true;
        $data['breadcrumb'] = array('admin/'=>'Dashboard');
        $orderdatalist =$this->Master_model->getall_orderdata_detail(array('t1.status'=>'1','t1.delivery_status'=>'0','t1.id'=>$id),'all');
        $data['orderdatalist'] = $orderdatalist;
        $this->template->load('adminpanel/sales/order','viewall',$data);
    }
	
	public function orderdetail1(){
        $id=$this->uri->segment(4);
        $data['title'] = 'Order Detail';
        $data['datatable'] = true;
        $data['breadcrumb'] = array('admin/'=>'Dashboard');
        $list =$this->Master_model->getall_orderdata_detail(array('t1.status'=>'1','t1.delivery_status'=>'0','t1.id'=>$id),'all');
        $data['list'] = $list;
		foreach($list as $val){
		$shipping=array('address'=>$val['delivery_address'],'district'=>$val['delivery_district'],'state'=>$val['delivery_state'],'pincode'=>$val['delivery_pincode'],'custname'=>$val['custname'],'delivery_date'=>$val['delivery_date']);
		}
		$data['shipping']=$shipping;
		//print_r($shipping);
		$data['cust']=$this->Inv_model->selectbyquery1("customer_detail","`id`='$id'");
		$data['billing']=$this->Inv_model->selectbyquery1("customer_address","`cust_id`='$id'");
		//echo PRE;print_r($data);die;
       $data['title']='Waybill';
		$this->load->view('includes/top-section',$data);
		$this->load->view('includes/header',$data);
		$this->load->view('adminpanel/sales/waybill',$data);
    }
	
		
	
	}

?>