<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller{
	public function __construct()
	{
	parent::__construct();
	$this->load->model('Inv_model');	
	}
	
	public function add_purchase()
	{
	$data['title']="Add Purchase";
	$data['product']=$this->Inv_model->getdata('gd_product');
	$data['uom']=$this->Inv_model->getdata('gd_uoms');
	$data['gst']=$this->Inv_model->getdata('gd_inventory_gst');
	$data['supplier']=$this->Inv_model->getdata('gd_inventory_supplier');
	$result=$this->Inv_model->gettemp();
	$data['temps']=$result;
	//echo PRE;print_r($data);die;
	$this->template->load('adminpanel/inventory/','addpurchase',$data);
		
	}
	public function get_varients()
	{
		$id=$this->input->post('id');
		$run=$this->Inv_model->varients("`pid`='$id'");
		$select="<option value=''>Select Varient</option>";
	if(is_array($run))
	{
	
	foreach($run as $val)
	{
		
		$select.="<option value='".$val['id']."'>".$val['name']."</option>";
	}
	
	}
	echo $select;
		
		}
	public function getmobile()
	{
	$id=$this->input->post('supp_id');
	$run=$this->Inv_model->selectbyquery1('gd_inventory_supplier',"`id`='$id'");
	echo json_encode($run);	
	}
	
	public function tempdata(){
		$data = $this->input->post();
		$data['role'] = $this->session->userdata('role');
        $result = $this->Inv_model->inserttemp($data);
        //echo PRE;        print_r($result);die;
		$data['temps'] = $result;
		$this->load->view('adminpanel/inventory/temp_table',$data);
    }
	public function gettempdata(){
		$result =$this->Inv_model->gettemp();
		$data['role'] = $this->session->userdata('role');
		$data['temps'] = $result;
		$this->load->view('adminpanel/inventory/temp_table',$data);
    }
     public function get_pcode()
	 {
		 $id=$this->input->post('id');
		 $details=$this->Inv_model->selectbyquery1('gd_product',"`id`='$id'");
	    $pcode=$details['pcode'];
		 echo json_encode($pcode); 
		// print_r($details);die;
	}
	public function get_rate()
	{
	$pid=$this->input->post('id');
	$variant_id=$this->input->post('variant_id');
	$data=$this->Inv_model->selectbyquery1('gd_product_variant',"`pid`='$pid' AND `variant_id`='$variant_id'");
	$mrp=$data['variant_price'];
	echo $mrp;	
		
	}
	
	public function savepurchase()
	{
		$data=$this->input->post();
		unset($data['purchase'],$data['variant_id']);
	
		$role=$data['role']=$this->session->userdata('role');
		$invoice=$data['invoice'];
		$supplie_id=$data['supplier_id'];
		$details=$this->Inv_model->getdata('gd_inventory_purchasetemp');
		print_r($details);
		$insert=$this->Inv_model->insertbyarray('gd_inventory_purchase',$data);
		$purchase_id=$this->db->insert_id();
		echo $this->db->last_query();
		
		if($insert==true)
			{
			$i=0;foreach($details as $rec)
				{
				$records[$i]=array('pcode'=>$rec['pcode'],
				'product_id'=>$rec['product_id'],
				'variant_id'=>$rec['variant_id'],
				'rate'=>$rec['rate'],
				'quantity'=>$rec['quantity'],
				'role'=>$data['role'],
				'taxable'=>$rec['taxable'],
				'gst'=>$rec['gst'],
				'gstvalue'=>$rec['gstvalue'],
				'amount'=>$rec['amount'],
				'supplier_id'=>$data['supplier_id'],
				'purchase_id'=>$purchase_id);	
				$prod=$this->db->insert('gd_inventory_purchaseproducts',$records[$i]);
				
				//echo $this->db->last_query();
				$record_id[$i]=$this->db->insert_id();
				$i++;
				}
			}
		if($prod==1)
			{
			$j=0;foreach($details as $pro)
			{
				$stock[]=array('pid'=>$pro['product_id'],
				'pcode'=>$pro['pcode'],
				'quant'=>$pro['quantity'],
				'variant_id'=>$pro['variant_id'],
				'rate'=>$pro['rate'],
				'record_id'=>$record_id[$j],
				'table_name'=>'gd_inventory_purchaseproducts',
				'stock_type'=>'ADD',
				'role'=>$this->session->userdata('role'),
				'Remark'=>'Purchase',
				'made_on'=>date('Y-m-d h:i:s'));	
				$j++;
			}
			$run=$this->db->insert_batch('gd_admin_stock',$stock);	
			}
		if(($prod && $insert )&& $run  )
		{
		$this->db->delete("gd_inventory_purchasetemp","`role`='$role'");	
		//echo $this->db->last_query();die;
		$this->session->set_flashdata('msg'," Added Successfull");	
		}
		
		else{
			$this->session->set_flashdata('err_msg',"ERROR");
		}
		
				redirect('/admin/inventory/add_purchase/');
	
	}
	
	  public function deletetemp(){
		$data=$this->input->post('id');
		$del=$this->db->delete('gd_inventory_purchasetemp',"`id`='$data'");
		if($del)
		{
			echo "Deleted Successfully";
			}
			else{
				echo "Error";
				}
		//$this->load->view('adminpanel/inventory/temp_table',$data);
    }
	public function purchaselist()
	{
	$data['title']="Purchase List";
	$data['datatable']=true;
	$data['details']=$this->Inv_model->get_purchase_info();
	$this->template->load('adminpanel/inventory','purchaselist',$data);
	}
	public function delete_rec()
	{
	 $id=$this->input->post('id');
	$table=$this->input->post('table');
	$run=$this->db->delete($table,"`id`='$id'");
	if($run==true)
	{
	$run2=$this->db->delete('gd_inventory_purchaseproducts',"`purchase_id`='$id'");	
	echo "Deleted Successfully";
	}
	else{
		echo "Error";
		}	
	}
	
	public function get_product()
	{
	$data['title']="Product list";	
	 $s_id=$this->uri->segment(4);
	$data['details']=$this->Inv_model->get_purchase_product("`purchase_id`='$s_id'");
	$data['datatable']=true;
	$this->template->load('adminpanel/inventory','purproduct_lis',$data);	
	}
	
	}
?>