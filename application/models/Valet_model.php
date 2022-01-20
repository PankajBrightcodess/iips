<?php
class Valet_model extends CI_model{
 
 public function get_valet()
 {
	$this->db->select('t1.*,t2.*,t3.name as loc,t4.name as desg');
	$this->db->from('gd_delivery_valet as t1');
	$this->db->join('gd_staff as t2','t1.staff_id=t2.id','left');
	$this->db->join('gd_delivery_zone as t3','t1.zone_id=t3.id');
	$this->db->join('gd_designation as t4','t2.desg_id=t4.id');
	$run=$this->db->get();
	$result=$run->result_array();
	return $result; 
	 
	}
	public function get_valet_edit($where)
 {
	$this->db->select('t1.*,t2.*,t3.name as loc,t4.name as desg');
	$this->db->from('gd_delivery_valet as t1');
	$this->db->join('gd_staff as t2','t1.staff_id=t2.id','left');
	$this->db->join('gd_delivery_zone as t3','t1.zone_id=t3.id');
	$this->db->join('gd_designation as t4','t2.desg_id=t4.id');
	$this->db->where($where);
	$run=$this->db->get();
	$result=$run->row_array();
	return $result; 
	 
	}

}

?>