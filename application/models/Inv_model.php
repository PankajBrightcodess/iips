<?php
class Inv_model extends CI_model{
	
	public function selectbyquery($table,$where){
	  $query=$this->db->get_where($table,$where);
	 // echo $this->db->last_query();die;
	  $run=$query->result_array();
	  return $run;	
	}
   public function selectbyquery1($table,$where){
	  $query=$this->db->get_where($table,$where);
	  $run=$query->row_array();
	  //echo $this->db->last_query();
	  return $run;	
	  }
	  
	  public function getdata($table){
	  $this->db->select('*');
	  $query=$this->db->get($table);
	  $run=$query->result_array();
	  return $run;
	  }
	  
	  public function insertbyarray($table,$data){
	   $run=$this->db->insert($table,$data);
		if($run){
			  return true;
			  }
	  }
	  
		  public function inserttemp($data){			  
		  $item = $data['items'];
		  $variant_id = $data['variant_id'];
		  $role=$data['role'];
		  $rate = $data['rate'];
		  $pcode=$data['pcode'];
		  unset($data['items']);
		  unset($data['variant_id']);
		  $gst = $data['gst'];
		  $quantity = $data['quantity'];
		  $full_cost = $quantity * $rate;
		  $taxable  = $full_cost;
		  $gstvalue = $taxable*$gst;
		  $gross_amount = $taxable + $gstvalue;
		  $data['taxable'] = $taxable;
		  $data['gstvalue'] = $gstvalue;
		  $data['amount'] = $gross_amount;
		  $data['product_id'] = $item;
		  $data['variant_id'] = $variant_id;
		  $data['pcode']=$pcode;
		  $where = "(`product_id` ='$item' AND `rate` = '$rate') AND (`gst` = '$gst' AND `variant_id`='$variant_id')";
		  $where2 = array('t1.role'=>$data['role']); 
		  $query = $this->db->get_where('gd_inventory_purchasetemp',$where);
		   if($query->num_rows() == 0){
			  $status= $this->db->insert('gd_inventory_purchasetemp',$data);
			  if($status === true){
				  return $this->gettemp($where2);
			  }
			  else{  
				  return $this->db->error();
			  }
		  }
		  else{
			  $sql= "update `gd_inventory_purchasetemp` set `quantity` = `quantity` + '$quantity', `gstvalue` = `gstvalue` + '$gstvalue' , `taxable` = `taxable` +'$taxable' , `amount`= `amount` + '$gross_amount' where $where ";
			  $update = $this->db->query($sql);
			 if($update === true){
				  return $this->gettemp($where2);
			  }
			  else{
				  return $this->db->error();
			  }
		  }
	  }
	  
	   public function gettemp($where = array()){
		  $this->db->select('t1.*,t2.product_name,t3.name as vname');
		  $this->db->from('gd_inventory_purchasetemp as t1');
		  $this->db->join('gd_product as t2','t1.product_id = t2.id');
		  $this->db->join('gd_variant as t3','t1.variant_id = t3.id');
		  $this->db->where($where);
		  $query = $this->db->get();
		   $array = $query->result_array();
		  return $array;
	  }
	   public function deletetemp($data){	
		  $role = $this->session->userdata('role');
		  $insert=$this->db->delete('gd_inventory_purchasetemp',$data); 
		  if($insert){
			  $where2 = array('t1.role'=>$role); 
			  return $this->gettemp($where2);
		  }
		  else{
			   return $this->db->error();
		  }
	  }
	  
	  public function get_purchase_info()
	  {
	  $this->db->select('t1.*,t2.name as supplier,t2.shop_name as shop');
	  $this->db->from('gd_inventory_purchase as t1','left');
	  $this->db->join('gd_inventory_supplier as t2','t1.supplier_id=t2.id');	
	  $run=$this->db->get();
	 
	  $result=$run->result_array();
	  return $result;
	  }
	  
	  public function get_purchase_product($where)
	  {
	  $this->db->select('t1.*,t2.product_name as product,t3.name as vname');
	  $this->db->from('gd_inventory_purchaseproducts as t1');
	  $this->db->join('gd_product as t2','t1.product_id=t2.id');
	  $this->db->join('gd_variant as t3','t1.variant_id=t3.id');
	  $this->db->where($where);
	  $run=$this->db->get();
	  $result=$run->result_array();	
	  return $result;
	  }
	  
	  public function varients($where)
	  {
		 $this->db->select('t1.*,t2.id as t2id');
		 $this->db->from('gd_variant as t1');
		 $this->db->join('gd_product_variant as t2','t1.id=t2.variant_id');
		 $this->db->where($where);
		 $run=$this->db->get();
		// echo $this->db->last_query();die;
		 $result=$run->result_array();
		 return $result; 
		  
		 }
	  public function update($table,$data,$where)
	  {
		  $this->db->set($data);
		  $this->db->where($where);
		  $run=$this->db->update($table);
		  if($run)
		  {return true;}
	  }
	  
	  public function get_stock($table,$group)
	  {
	   $this->db->select('*');
       $this->db->from($table);
	   $this->db->group_by($group);
	   $query =$this->db->get(); 
	   $run=$query->result_array();
	}
	  
	  public function getinvoice($where)
	  {
	  $this->db->select('t1.*,t2.name as supplier,t2.id as supplier_id');
	  $this->db->from('gd_inventory_purchase as t1');
	  $this->db->join('gd_inventory_supplier as t2','t1.supplier_id=t2.id');	
	  $this->db->where($where);
	  $run=$this->db->get();
	  $result=$run->row_array();	
	  return $result;
	  }
	  public function distinct($table,$select)
	  {
	  $this->db->select($select);
	  $this->db->distinct();	
	  $this->db->from($table);
	  $run=$this->db->get();
	  $result=$run->result_array();
	  return $result;
	  }
	  
	  }
  ?>