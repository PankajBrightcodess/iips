<?php
class Staff_model extends CI_Model{
	
	public function staff_details()
	{
	$this->db->select('t1.*,t2.name as desg');
	$this->db->from('staff as t1');
	$this->db->join('designation as t2','t1.desg_id=t2.id','left');
	$run=$this->db->get();
	$result=$run->result_array();
	return $result;	
	}
	
	
	}
?>