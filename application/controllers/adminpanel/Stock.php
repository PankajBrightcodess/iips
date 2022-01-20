<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller{
	public function __construct(){
	parent::__construct();
	$this->load->model('Inv_model');
	$this->load->model('Stock_model');	
	}
	
	public function add_stock(){
	$data['title']="Add Stock";
	$this->template->load('adminpanel/stock/','add_stock',$data);
		}
		
	public function stockquantity(){
		$pid=$this->input->post('product_id');
		$variant_id=$this->input->post('variant_id');
		$stock=$this->Stock_model->getstock_sum("`pid`='$pid' and `variant_id`='$variant_id'");
		print_r($stock);
	}
	public function get_unit(){
		$pid=$this->input->post('pid');
		$variant_id=$this->input->post('variant_id');
		$data=$this->Inv_model->selectbyquery1("gd_inventory_purchaseproducts","`product_id`='$pid' And `variant_id`='$variant_id'");
		echo json_encode($data);
	}
	public function stock_out(){
		$data['title']="Stock Adjust";
		$data['product']=$this->Inv_model->getdata('gd_product');
		$data['uoms']=$this->Inv_model->getdata('gd_uoms');
		$this->template->load('adminpanel/stock/','stockout',$data);
	}	
	public function insertstockout(){
	$data=$this->input->post();
	unset($data['stockout']);
	$pid=$data['product_id'];
	$array=array('pid'=>$data['product_id'], 
				 'pcode'=>$data['pcode'],
				 'rate'=>$data['rate'],
				 'quant'=>'-'.$data['quantity'],
				 'stock_type'=>'ADJ', 
				 'record_id'=>'-',
				 'table_name'=>'-',
				 'variant_id'=>$data['variant_id'], 
				 'made_on'=>date('Y-m-d h:i:s'), 
				 'remark'=>$data['remark'], 
				 'role'=>$this->session->userdata('role'),
	 			 'status'=>'0'
				 );
  	 $insert=$this->db->insert('gd_admin_stock',$array);
	 if($insert){
	   $this->session->set_flashdata('msg',"Stock Out Successfully");
	   }
	 else{
	   $this->session->set_flashdata('err_msg',"Error");
	   }
	 redirect('/admin/stock/stock_out/');	
	}
	
	public function insertstock(){
		$data=$this->input->post();
		unset($data['add_stock'],$data['date'],$data['role']);
		$pid=$data['pid'];
		$details=$this->Inv_model->selectbyquery1('gd_product',"`id`='$pid'");
	   	$data['pcode']=$details['pcode'];
		$data['record_id']='-';
		$data['table_name']='-';
		$data['stock_type']='ADD';
		$data['made_on']=date('Y-m-d h:i:s');	
		$run=$this->db->insert('gd_admin_stock',$data);
		if($run){
		$this->session->set_flashdata('msg'," Added Successfull");	
		}
		else{
		$this->session->set_flashdata('err_msg',"ERROR");
		}
		redirect('/admin/stock/add_stock/');
	
	 }
	
	  public function stock_in(){
		 $data['title']="Stock In";
		 $data['datatable']=true;
		 $products=$this->Inv_model->distinct("gd_admin_stock","pid,variant_id");
		 $product=array();
		 $array = array();
		 foreach($products as $key=>$val){
			 $product=$this->Inv_model->selectbyquery("gd_admin_stock","`pid`='".$val['pid']."' AND `variant_id`='".$val['variant_id']."' And `stock_type`='ADD'");
			foreach($product as $rec){
		 	$stock=$this->Stock_model->getstock_sum("`pid`='".$rec['pid']."' and `variant_id`='".$rec['variant_id']."'");
			$array[]=array('pid'=>$rec['pid'],
					 'pcode'=>$rec['pcode'],
					 'variant_id'=>$rec['variant_id'],
					 'rate'=>$rec['rate'],
					 'stock_type'=>$rec['stock_type'],
					 'made_on'=>$rec['made_on'],
					 'quantity'=>$stock,
					 'remark'=>$rec['remark']
					 );
				}
		 }
		 $data['product']=$array;
		// echo PRE;print_r($data);die;
		 $this->template->load('adminpanel/stock','stocklist',$data); 
		 }
		
		
		public function stockout_list(){
			$data['title']="Stock Adj List";
			$data['datatable']=true;
			$data['product']=$this->Inv_model->Selectbyquery('gd_admin_stock',"`stock_type`='ADJ'");
			$this->template->load('adminpanel/stock','stockoutlist',$data);
						} 
		 public function delete_rec(){
			 $id=$this->input->post('id');
			 $table=$this->input->post('table');
			 $del=$this->db->delete($table,"`id`='$id'");
			 if($del){
			 $del2=$this->db->delete('gd_inventory_purchaseproducts',"`purchase_id`='$id'");
			 echo"Deleted Succeessfully";
			 }
			 else{
				 echo "Error";
				 }
			 
			}
	
	}
?>