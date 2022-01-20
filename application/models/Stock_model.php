<?php
class Stock_model extends CI_model{
	
	
	public function getstock_sum($where){
	$query="SELECT SUM(`quant`) AS total FROM `gd_admin_stock` where $where";
	$run=$this->db->query($query);
	$result=$run->row()->total;
	return $result;
		}
		
	public function get_stock_details()
	{
	$this->db->select('t1.*,t2.product_name as product_name');
	$this->db->from('gd_admin_stock as t1');
	$this->db->join('gd_addon_product as t2','t1.pid=t2.id');
	//$this->db->group_by('t1.pcode');
	$this->db->order_by('t1.rate desc');
	$result=$this->db->get();
	echo $this->db->last_query();die;
	$run=$result->result_array();
	return $run;
	}
	public function get_unique()
	{
	$query="SELECT * FROM `gd_admin_stock` WHERE `stock_type`!='NEW' ORDER BY `pid`";
	$run=$this->db->query($query);
	$result=$run->result_array();
	return $result;	
		}		
	
	public function sumbyquery($where){
	$query="SELECT SUM(`qunat`) AS total FROM `gd_admin_stock` where $where";
	//$query="SELECT `quant` FROM gd_admin_stock WHERE (`stock_type`='PREV' OR `Stock_type`='ADD') AND `pid`='$pid'";
	$run=$this->db->query($query);
	$result=$run->row()->total;
	return $result;
		}
	}
?>