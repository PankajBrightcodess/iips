<?php
class Payment extends CI_controller{
public function __construct(){
	parent::__construct();
	}
	
	public function pay_form()
	{
		$data['title']="Payment";
		$data['supplier']=$this->Inv_model->getdata('gd_inventory_supplier');
		//$data['details']=$this->Inv_model->getdata('gd_inventory_payment');
		$this->template->load('adminpanel/payment','payment',$data);
		
	}	
	public function paylist()
	{
		$data['title']="Paylist";
		$data['datatable']=true;
		$data['details']=$this->Inv_model->getdata('gd_inventory_payment');
		$this->template->load('adminpanel/payment','paylist',$data);
		}
	
	public function get_invoice_details()
	
	{
	$waybill=$this->input->post('waybill');
	$run=$this->Inv_model->getinvoice("t1.waybill='$waybill'");
	echo json_encode($run);	
	}
	
	public function make_payment()
	{
	$data=$this->input->post();
	unset($data['payment']);
	$run=$this->db->insert('gd_inventory_payment',$data);
	//echo $this->db->last_query();die;
	if($run)
	{
	$this->session->set_flashdata('msg',"Payemnt Successsfully");	
	}
	else{
		$this->session->set_flashdata('err_msg',"ERROR");
		}
	redirect('/admin/payment/pay_form/');
	}
	 
	 public function get_payment_table()
	 {
		$waybill=$this->input->post('waybill');
		$details=$this->Inv_model->selectbyquery('gd_inventory_payment',"`waybill`='$waybill'");
		  if(!empty($details)){ $i=0;
                                foreach($details as $list){$i++;
                            echo "<tr style='color:#fff'>";
                                echo "<td>".  $i."</td>";
                                echo "<td>" . $list['date']."</td>";
                               echo "<td>" . $list['waybill']."</td>";
                               echo "<td>" . $list['invoice']."</td>";
                               echo "<td>" . $list['type']."</td>";
                               echo "<td>" . $list['total']."</td>";
                               echo "<td>" . $list['pay']."</td>";
                               echo "<td>" .  $list['due']."</td>";
                              
                           echo" </tr>";
                             }
                            }
							else{
								echo"<tr class='bg-danger' style='color:#fff'><td>NO RECORD FOUND</td></tr>";
								}
                            
		 
		}
	
	}
?>