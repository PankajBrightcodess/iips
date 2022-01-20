<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Valet extends CI_Controller{
	public function __construct(){
		parent::__construct();	
		$this->load->model('Valet_model');
	}	

	
	public function add_new(){
		$data['title']="Add Delivery Valet";
		$data['staff']=$this->Inv_model->getdata('gd_staff');
		$data['location']=$this->Inv_model->getdata('gd_delivery_zone');
		$this->template->load('adminpanel/valet','add_valet',$data);	
	}

	
	
	public function assign_order(){
		$data['title']="Assign Valet";
		$data['orders']=$this->Inv_model->selectbyquery('gd_order',"`delivery_status`='0'");
		$this->template->load('adminpanel/valet','assign_order',$data);
			
	}

	
	
	public function get_table(){
	$staff_id=$this->input->post('staff_id');
	$new=$this->Inv_model->selectbyquery1("gd_staff","`id`='$staff_id'");
	echo "
	<div class='col-md-12 table-responsive'>
		<table class='table data-table'>
		  <thead>
			 <tr>
				<th>#</th>
				<th class='no-sort'>Name</th>
				<th>Mobile</th>
				<th>Address</th>
				<th>AAdhar</th>
				<th>D.O.J</th>
				<th>Picture</th>
			</tr>
		</thead>
		<tbody>";	
			echo "<tr>";
			echo "<td>1</td>";
			echo "<td>".$new['name']."</td>";
			echo "<td>".$new['mobile']."</td>";
			echo "<td>".$new['address']."</td>";
			echo "<td>".$new['aadhar']."</td>";
			echo "<td>".$new['doj']."</td>";
			echo "<td width='10%'>"."<img src=".file_url($new['picture'])." class='img-responsive img-thumbnail'>"."<td>";			
			echo "</tr>";
	}

	
	public function get_valet_table(){
	 $order_id=$this->input->post('order_id');
	 $pro=$this->Inv_model->selectbyquery(" gd_order","`id`='$order_id'");
	 echo "
	 <div class='col-md-12 table-responsive'>
		<table class='table data-table'>
		  <thead>
			 <tr class='flora'>
				<th>#</th>
				<th>Delivery date</th>
				<th>Delivery time</th>
				<th class='no-sort'>Product</th>
				<th>Variant</th>
				<th>Qunatity</th>
				<th>Address</th>
				<th>Pincode</th>
			</tr>
		</thead>
		<tbody>";
		$i=1;foreach($pro as $new){
			echo "<tr>";
			echo "<td>".$i++."</td>";
		    echo "<td>".$new['delivery_date']."</td>";
			echo "<td>".$new['time_slot']."</td>";
			$data=$this->Inv_model->selectbyquery("gd_order_product","`order_no`='".$new['order_no']."'");
			foreach($data as $rec)
			{
			echo "<td>".$rec['product_name']."</td>";
			echo "<td>";
			$variant=$this->Inv_model->selectbyquery1("gd_variant","`id`='".$rec['variant_id']."'");
			echo $variant['name'];
			echo"</td>";
			echo "<td>".$rec['quantity']."</td>";
			}
			echo "<td>".$new['delivery_address']."</td>";
			echo "<td>".$new['delivery_pincode']."</td>";
			echo "</tr>";
			}
	}

	
	 public function get_pincode(){
		$id=$this->input->post('id');
		$data=$this->Inv_model->selectbyquery1("gd_delivery_zone","`id`='$id'");
		$pin=$data['name'];
		echo json_encode($pin);
	}
	
	
	public function get_delivery_pincode(){
		$id=$this->input->post('id');
		$data=$this->Inv_model->selectbyquery1("gd_order","`id`='$id'");
		$pin=$data['delivery_pincode'];
		echo($pin);
	}
	
	
	public function get_valets(){
		$pincode=$this->input->post('pincode');
		$data=$this->Inv_model->selectbyquery("gd_delivery_valet","`pincode`='$pincode'");
		$select="<option value=''>Select Valet</option>";
		if(is_array($data)){
		foreach($data as $val)
		{
		 $select.="<option value='".$val['id']."'>"."Valet".$val['id']."</option>";
		 }
	    }
	    echo $select;
	 }
		
	
	public function add_valet_op(){
		$data=$this->input->post();
		unset($data['add_valet']);
		$run=$this->db->insert("gd_delivery_valet",$data);
		if($run==true){
		$this->session->set_flashdata('msg',"Added Successfully");	
		}
		else{
		$this->session->set_flashdata('err_msg',"Error");
		}
		redirect('/admin/valet/add_new/');
	}	
	
	public function assign_order_list(){
		$data['title']="Order List";
		$run=$this->Inv_model->getdata("gd_order_assign");
		$array = array();
		foreach($run as $rec){
		$product=$this->Inv_model->selectbyquery1('gd_order',"`id`='".$rec['order_id']."' And `delivery_status`=1");
	  	$valet=$this->Inv_model->selectbyquery1('gd_delivery_valet',"`id`='".$rec['valet_id']."'");
		$name=$this->Inv_model->selectbyquery1('gd_staff',"`id`='".$valet['staff_id']."'");	
		$array[]=array(
					  'id'=>$product['id'],
					  'cust_id'=>$product['cust_id'],
		 			  'cart_id'=>$product['cart_id'],
					  'order_no'=>$product['order_no'],
					  'delivery_rate'=>$product['delivery_rate'],
					  'delivery_date'=>$product['delivery_date'],
					  'time_slot'=>$product['time_slot'],
					  'delivery_address'=>$product['delivery_address'],
					  'delivery_pincode'=>$product['delivery_pincode'],
					  'delivery_status'=>$product['delivery_status'],
					  'payment_status'=>$product['payment_status'],
					  'valet'=>$name['name']
					  );
		 }
		$data['product']=$array;
		$data['datatable']=true;
		$this->template->load('adminpanel/valet','order_list',$data);
			
	}
	
	public function order_details(){
		$data['title']="order Details";
		$order_id=$this->uri->segment(4);
		$data['product']=$this->Inv_model->selectbyquery('gd_order_product',"`order_id`='".$order_id."'");
		$data['datatable']=true;
		$this->template->load('adminpanel/valet','order_details',$data);
		
		
		}
	
	
	public function assign_valet_op(){
		$data=$this->input->post();
		unset($data['add_valet']);
		$run=$this->db->insert("gd_order_assign",$data);
		if($run==true){
		  $status['delivery_status']=1;
		  $run2=$this->db->update("gd_order",$status,"`id`='".$data['order_id']."'");
		  $this->session->set_flashdata('msg','Valet Assigned ');
		}
		else{
			$this->session->set_flashdata('err_msg',"Error");
		}	
		redirect('/admin/valet/assign_order');
	}

	
	public function valet_list(){
		$data['title']="Valet list";
		$data['datatable']=true;
		$data['details']=$this->Valet_model->get_valet();
		$this->template->load('adminpanel/valet','valet_list',$data);
	 }
	
	
	public function edit_valet(){
		$data['title']="Edit Valet";
		$id=$this->uri->segment(4);
		$data['staff']=$this->Inv_model->getdata('gd_staff');
		$data['loc']=$this->Inv_model->getdata('gd_delivery_zone');
		$data['record']=$this->Valet_model->get_valet_edit("`staff_id`='$id'");
		$this->template->load('adminpanel/valet','edit_valet',$data);		
	 }
	
	
	public function update_valet(){
		$id=$this->uri->segment(4);
		$data=$this->input->post();
		unset($data['update_valet']);
		$update=$this->Inv_model->update('gd_delivery_valet',$data,"`id`='$id'");
		if($update){
		$this->session->set_flashdata('msg',"Added Successfully");
		}
		else{
		$this->session->set_flashdata('err_msg',"Error");
		}
		redirect('/admin/valet/valet_list/');
	 }
	
	
	public function delete_rec(){
		$id=$this->input->post('id');
		$del=$this->db->delete('gd_delivery_valet',"`id`='$id'");
		if($del){echo"Deleted Successfully";
		}
		else{echo "Error";
		}
	}
}
?>