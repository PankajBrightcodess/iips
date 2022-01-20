<?php
class Sales_model extends CI_model{
	
	  public function getall_orderdata_detail($where=array(),$type='all'){

        $this->db->select('t1.*,t2.name as custname,t3.name as flavorname,t4.name as shapename,t5.name as creamname,t6.pid as p_pid,t6.pcode as p_pcode,t6.product_name as p_productname,t6.quantity as p_quantity,t6.price as p_price,t6.ptable as p_ptable');
        $this->db->from('order as t1');
        $this->db->join('customer_detail as t2','t1.cust_id = t2.id');
        $this->db->join('subcategory as t3','t1.flavor_id = t3.id');        
        $this->db->join('shape as t4','t1.shape_id = t4.id','left');
        $this->db->join('cream as t5','t1.cream_id = t5.id','left');
        $this->db->join('order_product as t6','t1.id = t6.order_id');          
        $this->db->where($where);
        $query = $this->db->get();
        //echo $this->db->last_query();
        if($type == 'all'){
            $return = $query->result_array();
        }else{
            $return = $query->row_array();
        }
        return $return;
    } 
}
?>