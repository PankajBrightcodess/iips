<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masterkey extends CI_Controller {
	function __construct(){
		parent::__construct();
        checklogin();

    }

    public function category(){
        
        $data['title'] = 'Main Category';
        $data['datatable'] = true;
        $data['breadcrumb'] = array('admin/'=>'Dashboard');
        $data['categorylist'] = $this->Master_model->getall_category(array('status'=>'1'),'all');
        $this->template->load('adminpanel/masterkey/category','add_view',$data);
    }
	
	public function supplier()
	{
		$data['title']="Add Supllier";
		$data['datatable']=true;
		$data['breadcrumb']=array('admin/'=>'Dashboard');
		$this->template->load('adminpanel/masterkey/supplier','add_supplier',$data);	
	}
	public function designation()
	{
		$data['title']="Add Designation";
		$data['datatable']=true;
		$data['breadcrumb']=array('admin/'=>'Dashboard');
		$data['details']=$this->Inv_model->getdata('designation');
		$this->template->load('adminpanel/masterkey/designation','add_desg',$data);	
	}
	
	public function save_desg()
	{
	$data=$this->input->post();
	unset($data['add_desg']);
	$run=$this->db->insert('designation',$data);
	if($run){
	$this->session->set_flashdata('msg',"Added Succesfully");
	}
	else
	{
	$this->session->set_flashdata('err_msg',"ERROR");
	}
	redirect('/admin/masterkey/designation/');	
	}
	public function supplier_list()
	{
	$data['title']="Supplier list";
	$data['datatable']=true;
	$data['breadcrumb']=array('admin/'=>'Dashboard/supplier');
	$data['details']=$this->Inv_model->getdata('inventory_supplier');
	$this->template->load('adminpanel/masterkey/supplier','supplier_list',$data);	
		
	}

    public function savecategory(){       
        
        $data = $this->input->post();
        unset($data['save_cat']);

        $this->load->helper('slug');
        $slug = generate_slug($data['name']);
        $data['slug'] = verify_slug('category','slug',$slug);
        $data['image_path']='';
        if(!empty($_FILES['image']['name'])){
            $upload_path='./assets/images/admin/category'; 
            $allowed_types='gif|jpg|jpeg|png'; 
            $path=upload_file("image",$upload_path,$allowed_types,time());
            if($path!=''){
                $data['image_path']=$path;
            }
        }else{
            $upload_path = FCPATH.'assets/images/blank_cat.png';
            $time = time();
            $newnamepath = "assets/images/admin/category/$time.png";
            $newpath = FCPATH."$newnamepath";
            $copied = copy($upload_path,$newpath);
            if($copied){
                $data['image_path']=$newnamepath;
            }
        }       
        // insert it in database
        $result = $this->Master_model->save_category($data);
        if($result == true){
            $this->session->set_flashdata('msg',"Category Added Succesfully!");
        }else{
            $this->session->set_flashdata('err_msg',"Please Try Again !!");
        }
        
        redirect('admin/masterkey/category');
    }

    public function editcategory(){
        $editid = $this->uri->segment('4');
        if(!empty($editid)){
            $data['title'] = 'Edit Main Category';
            $data['datatable'] = true;
            $data['breadcrumb'] = array('admin/'=>'Dashboard');
            $data['onecategory'] = $this->Master_model->getall_category(array('id'=>$editid,'status'=>'1'),'single');
            $data['categorylist'] = $this->Master_model->getall_category(array('status'=>'1'),'all');
            $data['editid'] = $editid;
            $this->template->load('adminpanel/masterkey/category','edit_view',$data);
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }       
    }

    public function updatecategory(){
        $data = $this->input->post();
        unset($data['update_cat']);

        $this->load->helper('slug');
        $slug = generate_slug($data['name']);
        $data['slug'] = verify_slug('category','slug',$slug);        
        $data['image_path']='';

        if(!empty($_FILES['image']['name'])){
            $upload_path='./assets/images/admin/category'; 
            $allowed_types='gif|jpg|jpeg|png'; 
            $path=upload_file("image",$upload_path,$allowed_types,time());
            if($path!=''){
                $data['image_path']=$path;
            }
        } 
        // insert it in database
        $result = $this->Master_model->update_category($data);
        if($result == true){
            $this->session->set_flashdata('msg',"Category updated Succesfully!");
        }else{
            $this->session->set_flashdata('err_msg',"Please Try Again !!");
        }        
        redirect('admin/masterkey/category');
    }


    public function subcategory(){
        
        $data['title'] = 'Sub Category';
        $data['datatable'] = true;
        $data['breadcrumb'] = array('admin/'=>'Dashboard');
        $categorylist= $this->Master_model->getall_category(array('status'=>'1'),'all');
        $maincatoption = array();
        $maincatoption[''] = '-- Select Main Category --';
        if(!empty($categorylist)){
            foreach($categorylist as $list){
                $maincatoption[$list['id']] = $list['name'];
            }
        }
        $data['catoption'] = $maincatoption;  
        $data['categorylist'] = $this->Master_model->getall_subcategory(array('t1.status'=>'1','t1.type'=>'simple'),'all');      
        $this->template->load('adminpanel/masterkey/subcategory','add_view',$data);
    }

    public function savesubcategory(){
        
        $data = $this->input->post();
        unset($data['save_cat']);

        $this->load->helper('slug');
        $slug = generate_slug($data['name']);
        $data['slug'] = verify_slug('subcategory','slug',$slug);
        $data['image_path']='';

        if(!empty($_FILES['image']['name'])){
            $upload_path='./assets/images/admin/subcategory'; 
            $allowed_types='gif|jpg|jpeg|png'; 
            $path=upload_file("image",$upload_path,$allowed_types,time());
            if($path!=''){
                $data['image_path']=$path;
            }
        }else{
            $upload_path = FCPATH.'assets/images/blank_cat.png';
            $time = time();
            $newnamepath = "assets/images/admin/subcategory/$time.png";
            $newpath = FCPATH."$newnamepath";
            $copied = copy($upload_path,$newpath);
            if($copied){
                $data['image_path']=$newnamepath;
            }
        }   
        $data['type'] = 'simple';
        // insert it in database
        $result = $this->Master_model->save_subcategory($data);
        if($result == true){
            $this->session->set_flashdata('msg',"Sub Category Added Succesfully!");
        }else{
            $this->session->set_flashdata('err_msg',"Please Try Again !!");
        }
        
        redirect('admin/masterkey/subcategory');
    }

    public function editsubcategory(){
        
        $editid = $this->uri->segment('4');
        if(!empty($editid)){
            $data['title'] = 'Edit Sub Category';
            $data['datatable'] = true;
            $data['breadcrumb'] = array('admin/'=>'Dashboard');
            $categorylist= $this->Master_model->getall_category(array('status'=>'1'),'all');
            $maincatoption = array();
            $maincatoption[''] = '-- Select Main Category --';
            if(!empty($categorylist)){
                foreach($categorylist as $list){
                    $maincatoption[$list['id']] = $list['name'];
                }
            }
            $data['catoption'] = $maincatoption;  
            $data['categorylist'] = $this->Master_model->getall_subcategory(array('t1.status'=>'1','t1.type'=>'simple'),'all');      
            $data['onecategory'] = $this->Master_model->getall_subcategory(array('t1.status'=>'1','t1.id'=>$editid),'single');
            $data['editid'] = $editid;
            $this->template->load('adminpanel/masterkey/subcategory','edit_view',$data);
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function updatesubcategory(){
        $data = $this->input->post();
        unset($data['update_cat']);

        $this->load->helper('slug');
        $slug = generate_slug($data['name']);
        $data['slug'] = verify_slug('subcategory','slug',$slug);

        $data['image_path']='';
        if(!empty($_FILES['image']['name'])){
            $upload_path='./assets/images/admin/subcategory'; 
            $allowed_types='gif|jpg|jpeg|png'; 
            $path=upload_file("image",$upload_path,$allowed_types,time());
            if($path!=''){
                $data['image_path']=$path;
            }
        } 
        $data['type'] = 'simple';
        // insert it in database
        $result = $this->Master_model->update_subcategory($data);
        if($result == true){
            $this->session->set_flashdata('msg',"Sub Category Updated Succesfully!");
        }else{
            $this->session->set_flashdata('err_msg',"Please Try Again !!");
        }
        
        redirect('admin/masterkey/subcategory');
    }

    public function lowcategory(){
        
        $data['title'] = 'Low Category';
        $data['datatable'] = true;
        $data['breadcrumb'] = array('admin/'=>'Dashboard');
        $categorylist= $this->Master_model->getall_category(array('status'=>'1'),'all');
        $maincatoption = array();
        $maincatoption[''] = '-- Select Main Category --';
        if(!empty($categorylist)){
            foreach($categorylist as $list){
                $maincatoption[$list['id']] = $list['name'];
            }
        }
        $data['catoption'] = $maincatoption;   
        $data['subcatoption'] = array(''=>"-- Select Sub Category --"); 
        $data['categorylist'] = $this->Master_model->getall_lowcategory(array('t1.status'=>'1'),'all');             
        $this->template->load('adminpanel/masterkey/lowcategory','add_view',$data);
    }

    public function savelowcategory(){
        
        $data = $this->input->post();
        unset($data['save_cat']);

        $this->load->helper('slug');
        $slug = generate_slug($data['name']);
        $data['slug'] = verify_slug('lowcategory','slug',$slug);
        $data['image_path']='';

        if(!empty($_FILES['image']['name'])){
            $upload_path='./assets/images/admin/lowcategory'; 
            $allowed_types='gif|jpg|jpeg|png'; 
            $path=upload_file("image",$upload_path,$allowed_types,time());
            if($path!=''){
                $data['image_path']=$path;
            }
        }else{
            $upload_path = FCPATH.'assets/images/blank_cat.png';
            $time = time();
            $newnamepath = "assets/images/admin/lowcategory/$time.png";
            $newpath = FCPATH."$newnamepath";
            $copied = copy($upload_path,$newpath);
            if($copied){
                $data['image_path']=$newnamepath;
            }
        }          
        // insert it in database
        $result = $this->Master_model->save_lowcategory($data);
        if($result == true){
            $this->session->set_flashdata('msg',"Low Category Added Succesfully!");
        }else{
            $this->session->set_flashdata('err_msg',"Please Try Again !!");
        }
        
        redirect('admin/masterkey/lowcategory');
    }

    public function editlowcategory(){
        
        $editid = $this->uri->segment('4');
        if(!empty($editid)){
            $data['title'] = 'Edit Low Category';
            $data['datatable'] = true;
            $data['breadcrumb'] = array('admin/'=>'Dashboard');
            $categorylist= $this->Master_model->getall_category(array('status'=>'1'),'all');
            $maincatoption = array();
            $maincatoption[''] = '-- Select Main Category --';
            if(!empty($categorylist)){
                foreach($categorylist as $list){
                    $maincatoption[$list['id']] = $list['name'];
                }
            }
            $data['catoption'] = $maincatoption;  
            $subcategorylist= $this->Master_model->getall_subcategory(array('t1.status'=>'1','t1.type'=>'simple'),'all');
            $subcatoption = array();
            $subcatoption[''] = '-- Select Sub Category --';
            if(!empty($subcategorylist)){
                foreach($subcategorylist as $list){
                    $subcatoption[$list['id']] = $list['name'];
                }
            }
            $data['subcatoption'] = $subcatoption; 
            $data['categorylist'] = $this->Master_model->getall_lowcategory(array('t1.status'=>'1'),'all');      
            $data['onecategory'] = $this->Master_model->getall_lowcategory(array('t1.status'=>'1','t1.id'=>$editid),'single');
            $data['editid'] = $editid;
            $this->template->load('adminpanel/masterkey/lowcategory','edit_view',$data);
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function updatelowcategory(){
        $data = $this->input->post();
        unset($data['update_cat']);

        $this->load->helper('slug');
        $slug = generate_slug($data['name']);
        $data['slug'] = verify_slug('lowcategory','slug',$slug);

        $data['image_path']='';
        if(!empty($_FILES['image']['name'])){
            $upload_path='./assets/images/admin/lowcategory'; 
            $allowed_types='gif|jpg|jpeg|png'; 
            $path=upload_file("image",$upload_path,$allowed_types,time());
            if($path!=''){
                $data['image_path']=$path;
            }
        } 
        //$data['type'] = 'simple';
        // insert it in database
        $result = $this->Master_model->update_lowcategory($data);
        //echo $this->db->last_query();die;
        if($result == true){
            $this->session->set_flashdata('msg',"Low Category Updated Succesfully!");
        }else{
            $this->session->set_flashdata('err_msg',"Please Try Again !!");
        }
        
        redirect('admin/masterkey/lowcategory');
    }

    public function brand(){
        $data['title'] = 'Brand\'s';
        $data['datatable'] = true;
        $data['breadcrumb'] = array('admin/'=>'Dashboard');
        $categorylist= $this->Master_model->getall_category(array('status'=>'1'),'all');
        $maincatoption = array();
        $maincatoption[''] = '-- Select Main Category --';
        if(!empty($categorylist)){
            foreach($categorylist as $list){
                $maincatoption[$list['id']] = $list['name'];
            }
        }
        $data['catoption'] = $maincatoption;  
        $data['categorylist'] = $this->Master_model->getall_subcategory(array('t1.status'=>'1','t1.type'=>'brand'),'all');      
        $this->template->load('adminpanel/masterkey/brand','add_view',$data);
    }

    public function editbrand(){

        $editid = $this->uri->segment('4');
        if(!empty($editid)){
            $data['title'] = 'Edit Brand';
            $data['datatable'] = true;
            $data['breadcrumb'] = array('admin/'=>'Dashboard');
            $categorylist= $this->Master_model->getall_category(array('status'=>'1'),'all');
            $maincatoption = array();
            $maincatoption[''] = '-- Select Main Category --';
            if(!empty($categorylist)){
                foreach($categorylist as $list){
                    $maincatoption[$list['id']] = $list['name'];
                }
            }
            $data['catoption'] = $maincatoption;
            $data['editid'] = $editid;
            $data['categorylist'] = $this->Master_model->getall_subcategory(array('t1.status'=>'1','t1.type'=>'brand'),'all');      
            $data['onecategory'] = $this->Master_model->getall_subcategory(array('t1.status'=>'1','t1.type'=>'brand','t1.id'=>$editid),'single');      
            $this->template->load('adminpanel/masterkey/brand','edit_view',$data);
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    } 

    public function savebrand(){
        
        $data = $this->input->post();
        unset($data['save_flavor']);

        $this->load->helper('slug');
        $slug = generate_slug($data['name']);
        $data['slug'] = verify_slug('subcategory','slug',$slug);
        $data['image_path']='';
        if(!empty($_FILES['image']['name'])){
            $upload_path='./assets/images/admin/subcategory'; 
            $allowed_types='gif|jpg|jpeg|png'; 
            $path=upload_file("image",$upload_path,$allowed_types,time().'_flavor');
            if($path!=''){
                $data['image_path']=$path;
            }
        }       
        $data['type'] = 'brand';
        // insert it in database
        $result = $this->Master_model->save_subcategory($data);            
        if($result == true){
            $this->session->set_flashdata('msg',"Brand Added Succesfully!");
        }else{
            $this->session->set_flashdata('err_msg',"Please Try Again !!");
        }
        
        redirect('admin/masterkey/brand');
    }

    public function updatebrand(){
        $data = $this->input->post();
        unset($data['save_flavor']);

        $this->load->helper('slug');
        $slug = generate_slug($data['name']);
        $data['slug'] = verify_slug('subcategory','slug',$slug);

        $data['image_path'] = '';
       if(!empty($_FILES['image']['name'])){
            $upload_path='./assets/images/admin/subcategory'; 
            $allowed_types='gif|jpg|jpeg|png'; 
            $path=upload_file("image",$upload_path,$allowed_types,time().'_flavor');
            if($path!=''){
                $data['image_path']=$path;
            }
        }       
        $data['type'] = 'brand';
        // insert it in database
        $result = $this->Master_model->update_subcategory($data);            
        if($result == true){
            $this->session->set_flashdata('msg',"Brand Updated Succesfully!");
        }else{
            $this->session->set_flashdata('err_msg',"Please Try Again !!");
        }        
        redirect('admin/masterkey/brand');
    }

    public function quantity(){

        $data['title'] = 'Variant Quantity';
        $data['datatable'] = true;
        $data['breadcrumb'] = array('admin/'=>'Dashboard');
        $categorylist= $this->Master_model->getall_category(array('status'=>'1'),'all');
        $maincatoption = array();
        $maincatoption[''] = '-- Select Main Category --';
        if(!empty($categorylist)){
            foreach($categorylist as $list){
                $maincatoption[$list['id']] = $list['name'];
            }
        }
        $data['catoption'] = $maincatoption;  
        $data['quantitylist'] = $this->Master_model->getall_quantity(array('t1.status'=>'1'),'all');      
        $this->template->load('adminpanel/masterkey/quantity','add_view',$data);
    }

    public function editquantity(){
        $editid = $this->uri->segment('4');
        if(!empty($editid)){
            $data['title'] = 'Edit Variant Quantity';
            $data['datatable'] = true;
            $data['breadcrumb'] = array('admin/'=>'Dashboard');
            $categorylist= $this->Master_model->getall_category(array('status'=>'1'),'all');
            $maincatoption = array();
            $maincatoption[''] = '-- Select Main Category --';
            if(!empty($categorylist)){
                foreach($categorylist as $list){
                    $maincatoption[$list['id']] = $list['name'];
                }
            }
            $data['catoption'] = $maincatoption;  
            $data['editid'] = $editid;
            $data['quantitylist'] = $this->Master_model->getall_quantity(array('t1.status'=>'1'),'all');      
            $data['onequantity'] = $this->Master_model->getall_quantity(array('t1.status'=>'1','t1.id'=>$editid),'single');      
            $this->template->load('adminpanel/masterkey/quantity','edit_view',$data);
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function savequantity(){
        
        $data = $this->input->post();
        unset($data['save_variant']);

        $this->load->helper('slug');
        $slug = generate_slug($data['name']);
        $data['slug'] = verify_slug('variant','slug',$slug);           
        $result = $this->Master_model->save_variant($data);  
        //echo $this->db->last_query();die;     
        if($result == true){
            $this->session->set_flashdata('msg',"Flavor Added Succesfully!");
        }else{
            $this->session->set_flashdata('err_msg',"Please Try Again !!");
        }
        
        redirect('admin/masterkey/quantity');
    }

    public function updatequantity(){

        $data = $this->input->post();
        unset($data['save_variant']);

        $this->load->helper('slug');
        $slug = generate_slug($data['name']);
        $data['slug'] = verify_slug('variant','slug',$slug);           
        $result = $this->Master_model->update_variant($data);  
        //echo $this->db->last_query();die;     
        if($result == true){
            $this->session->set_flashdata('msg',"Flavor Updated Succesfully!");
        }else{
            $this->session->set_flashdata('err_msg',"Please Try Again !!");
        }
        
        redirect('admin/masterkey/quantity');
    }

    public function eggornoegg(){
        $data['title'] = 'Egg Or No-Egg';
        $data['datatable'] = true;
        $data['breadcrumb'] = array('admin/'=>'Dashboard');
        $categorylist= $this->Master_model->getall_category(array('status'=>'1'),'all');
        $maincatoption = array();
        $maincatoption[''] = '-- Select Main Category --';
        if(!empty($categorylist)){
            foreach($categorylist as $list){
                $maincatoption[$list['id']] = $list['name'];
            }
        }
        $data['catoption'] = $maincatoption;  
        $data['categorylist'] = $this->Master_model->getall_subcategory(array('t1.status'=>'1','t1.type'=>'egger'),'all');      
        $this->template->load('adminpanel/masterkey/egg','add_view',$data);
    }

    public function edit_eggornoegg(){
        $editid = $this->uri->segment('4');
        if(!empty($editid)){
            $data['title'] = 'Edit Egg Or No-Egg';
            $data['datatable'] = true;
            $data['breadcrumb'] = array('admin/'=>'Dashboard');
            $categorylist= $this->Master_model->getall_category(array('status'=>'1'),'all');
            $maincatoption = array();
            $maincatoption[''] = '-- Select Main Category --';
            if(!empty($categorylist)){
                foreach($categorylist as $list){
                    $maincatoption[$list['id']] = $list['name'];
                }
            }
            $data['catoption'] = $maincatoption; 
            $data['editid'] = $editid; 
            $data['categorylist'] = $this->Master_model->getall_subcategory(array('t1.status'=>'1','t1.type'=>'egger'),'all');      
            $data['onecategory'] = $this->Master_model->getall_subcategory(array('t1.status'=>'1','t1.type'=>'egger','t1.id'=>$editid),'single');      
            $this->template->load('adminpanel/masterkey/egg','edit_view',$data);
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function save_egg_or_noegg(){
        
        $data = $this->input->post();
        unset($data['save_flavor']);

        $this->load->helper('slug');
        $slug = generate_slug($data['name']);
        $data['slug'] = verify_slug('subcategory','slug',$slug);

        $upload_path='./assets/images/admin/subcategory'; 
        $allowed_types='gif|jpg|jpeg|png'; 
        $path=upload_file("image",$upload_path,$allowed_types,time().'_egger');
        if($path!=''){
            $data['image_path']=$path;
            $data['type'] = 'egger';
            // insert it in database
            $result = $this->Master_model->save_subcategory($data);            
            if($result == true){
                $this->session->set_flashdata('msg',"Flavor Added Succesfully!");
            }else{
                $this->session->set_flashdata('err_msg',"Please Try Again !!");
            }
        }else{
            $this->session->set_flashdata('err_msg',"Sorry Image Not Uploaded !");
        }
        redirect('admin/masterkey/eggornoegg');
    }

    public function update_egg_or_noegg(){
        
        $data = $this->input->post();
        unset($data['save_flavor']);

        $this->load->helper('slug');
        $slug = generate_slug($data['name']);
        $data['slug'] = verify_slug('subcategory','slug',$slug);

        $upload_path='./assets/images/admin/subcategory'; 
        $allowed_types='gif|jpg|jpeg|png'; 
        $path=upload_file("image",$upload_path,$allowed_types,time().'_egger');
        if($path!=''){
            $data['image_path']=$path;
            $data['type'] = 'egger';
            // insert it in database
            $result = $this->Master_model->update_subcategory($data);            
            if($result == true){
                $this->session->set_flashdata('msg',"Flavor updated Succesfully!");
            }else{
                $this->session->set_flashdata('err_msg',"Please Try Again !!");
            }
        }else{
            $this->session->set_flashdata('err_msg',"Sorry Image Not Uploaded !");
        }
        redirect('admin/masterkey/eggornoegg');
    }

    public function location(){
        $data['title'] = 'Location';
        $data['datatable'] = true;
        $data['breadcrumb'] = array('admin/'=>'Dashboard');
        $locationlist= $this->Master_model->getall_area(array('status'=>'1','parent_id'=>'0'),'all');
        $locationoption = array();
        $locationoption[''] = '-- Select State --';
        if(!empty($locationlist)){
            foreach($locationlist as $list){
                $locationoption[$list['id']] = $list['name'];
            }
        }
        $data['locationlist'] = $this->Master_model->getall_location(array('t1.status'=>'1'),'all');
        $data['locationoption'] = $locationoption;
        $this->template->load('adminpanel/masterkey/location','add_view',$data);
    }

    public function editlocation(){
       $editid = $this->uri->segment('4');
        if(!empty($editid)){
            $data['title'] = 'Edit Location';
            $data['datatable'] = true;
            $data['breadcrumb'] = array('admin/'=>'Dashboard');
            $locationlist= $this->Master_model->getall_area(array('status'=>'1','parent_id'=>'0'),'all');
            $locationoption = array();
            $locationoption[''] = '-- Select State --';
            if(!empty($locationlist)){
                foreach($locationlist as $list){
                    $locationoption[$list['id']] = $list['name'];
                }
            }
            $data['locationoption'] = $locationoption;
            $data['editid'] = $editid; 
            $data['locationlist'] = $this->Master_model->getall_location(array('t1.status'=>'1'),'all');     
            $data['onelocation'] = $this->Master_model->getall_location(array('t1.status'=>'1','t1.id'=>$editid),'single');;      
            $this->template->load('adminpanel/masterkey/location','edit_view',$data);
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function savelocation(){
        $data = $this->input->post();
        unset($data['save_location']);        
        // insert it in database
        $result = $this->Master_model->save_location($data);            
        if($result == true){
            $this->session->set_flashdata('msg',"Location Added Succesfully!");
        }else{
            $this->session->set_flashdata('err_msg',"Please Try Again !!");
        }
        
        redirect('admin/masterkey/location');
    }

    public function updatelocation(){
        $data = $this->input->post();
        unset($data['save_location']);
        $result = $this->Master_model->update_location($data);            
        if($result == true){
            $this->session->set_flashdata('msg',"Location Updated Succesfully!");
        }else{
            $this->session->set_flashdata('err_msg',"Please Try Again !!");
        }
        
        redirect('admin/masterkey/location');    
    }

    public function shape(){
        $data['title'] = 'Shape';
        $data['datatable'] = true;
        $data['breadcrumb'] = array('admin/'=>'Dashboard');
        $categorylist= $this->Master_model->getall_category(array('status'=>'1'),'all');
        $maincatoption = array();
        $maincatoption[''] = '-- Select Main Category --';
        if(!empty($categorylist)){
            foreach($categorylist as $list){
                $maincatoption[$list['id']] = $list['name'];
            }
        }
        $data['catoption'] = $maincatoption;  
        $data['shapelist'] = $this->Master_model->getall_shape(array('t1.status'=>'1'),'all');
        $this->template->load('adminpanel/masterkey/shape','add_view',$data);
    }

    public function saveshape(){
        $data = $this->input->post();
        unset($data['save_shape']);

        $data['path'] = '';
       if(!empty($_FILES['image']['name'])){
            $upload_path='./assets/images/admin/others'; 
            $allowed_types='gif|jpg|jpeg|png'; 
            $path=upload_file("image",$upload_path,$allowed_types,time().'_other');
            if($path!=''){
                $data['path']=$path; 
            }
        }
        
        // insert it in database
        $result = $this->Master_model->save_shape($data);            
        if($result == true){
            $this->session->set_flashdata('msg',"Shape Added Succesfully!");
        }else{
            $this->session->set_flashdata('err_msg',"Please Try Again !!");
        }
        
        redirect('admin/masterkey/shape');
    }

    public function edit_shape(){
        $editid = $this->uri->segment('4');
        if(!empty($editid)){
            $data['title'] = 'Edit Shape';
            $data['datatable'] = true;
            $data['breadcrumb'] = array('admin/'=>'Dashboard');
            $categorylist= $this->Master_model->getall_category(array('status'=>'1'),'all');
            $maincatoption = array();
            $maincatoption[''] = '-- Select Main Category --';
            if(!empty($categorylist)){
                foreach($categorylist as $list){
                    $maincatoption[$list['id']] = $list['name'];
                }
            }
            $data['catoption'] = $maincatoption; 
            $data['editid'] = $editid; 
            $data['shapelist'] = $this->Master_model->getall_shape(array('t1.status'=>'1'),'all');
            $data['oneshape'] = $this->Master_model->getall_shape(array('t1.status'=>'1','t1.id'=>$editid),'single');      
            $this->template->load('adminpanel/masterkey/shape','edit_view',$data);
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function updateshape(){
        $data = $this->input->post();
        unset($data['save_shape']);
        $data['path'] = '';
       if(!empty($_FILES['image']['name'])){
            $upload_path='./assets/images/admin/others'; 
            $allowed_types='gif|jpg|jpeg|png'; 
            $path=upload_file("image",$upload_path,$allowed_types,time().'_other');
            if($path!=''){
                $data['path']=$path;   
            }
        }        
        // insert it in database
        $result = $this->Master_model->update_shape($data);            
        if($result == true){
            $this->session->set_flashdata('msg',"Shape Updated Succesfully!");
        }else{
            $this->session->set_flashdata('err_msg',"Please Try Again !!");
        }
        
        redirect('admin/masterkey/shape');
    }

    public function cream(){
        $data['title'] = 'Cream';
        $data['datatable'] = true;
        $data['breadcrumb'] = array('admin/'=>'Dashboard');
        $categorylist= $this->Master_model->getall_category(array('status'=>'1'),'all');
        $maincatoption = array();
        $maincatoption[''] = '-- Select Main Category --';
        if(!empty($categorylist)){
            foreach($categorylist as $list){
                $maincatoption[$list['id']] = $list['name'];
            }
        }
        $quantitylist= $this->Master_model->getall_quantity(array('t1.status'=>'1'),'all');
        $quantityoption = array();
        $quantityoption[''] = '-- Select Cake Size --';
        if(!empty($quantitylist)){
            foreach($quantitylist as $list){
                $quantityoption[$list['id']] = $list['name'];
            }
        }
        $data['catoption'] = $maincatoption;  
        $data['sizeoption'] = $quantityoption;  
        $data['creamlist'] = $this->Master_model->getall_cream(array('t1.status'=>'1'),'all');
        $this->template->load('adminpanel/masterkey/cream','add_view',$data);
    }

    public function savecream(){
        $data = $this->input->post();
        unset($data['save_shape']);
        //echo PRE;print_r($data);die;
       if(!empty($_FILES['image']['name'])){
            $upload_path='./assets/images/admin/others'; 
            $allowed_types='gif|jpg|jpeg|png'; 
            $path=upload_file("image",$upload_path,$allowed_types,time().'_other');
            if($path!=''){
                $data['path']=$path;   
            }
        }else{
            $data['path'] = '';
        }
        
        // insert it in database
        $result = $this->Master_model->save_cream($data);    
        //echo $this->db->last_query();die;        
        if($result == true){
            $this->session->set_flashdata('msg',"Cream Added Succesfully!");
        }else{
            $this->session->set_flashdata('err_msg',"Please Try Again !!");
        }        
        redirect('admin/masterkey/cream');
    }

    public function edit_cream(){
        $editid = $this->uri->segment('4');
        if(!empty($editid)){
            $data['title'] = 'Edit Cream';
            $data['datatable'] = true;
            $data['breadcrumb'] = array('admin/'=>'Dashboard');
            $categorylist= $this->Master_model->getall_category(array('status'=>'1'),'all');
            $maincatoption = array();
            $maincatoption[''] = '-- Select Main Category --';
            if(!empty($categorylist)){
                foreach($categorylist as $list){
                    $maincatoption[$list['id']] = $list['name'];
                }
            }
            $quantitylist= $this->Master_model->getall_quantity(array('t1.status'=>'1'),'all');
            $quantityoption = array();
            $quantityoption[''] = '-- Select Cake Size --';
            if(!empty($quantitylist)){
                foreach($quantitylist as $list){
                    $quantityoption[$list['id']] = $list['name'];
                }
            }
            $data['catoption'] = $maincatoption; 
            $data['sizeoption'] = $quantityoption;
            $data['editid'] = $editid; 
            $data['creamlist'] = $this->Master_model->getall_cream(array('t1.status'=>'1'),'all');
            $data['onecream'] = $this->Master_model->getall_cream(array('t1.status'=>'1','t1.id'=>$editid),'single');      
            $this->template->load('adminpanel/masterkey/cream','edit_view',$data);
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function updatecream(){
        $data = $this->input->post();
        unset($data['save_shape']);
        $data['path']='';
       if(!empty($_FILES['image']['name'])){
            $upload_path='./assets/images/admin/others';    
            $allowed_types='gif|jpg|jpeg|png'; 
            $path=upload_file("image",$upload_path,$allowed_types,time().'_other');
            if($path!=''){
                $data['path']=$path; 
            }
        }       
        // insert it in database
        $result = $this->Master_model->update_cream($data);            
        if($result == true){
            $this->session->set_flashdata('msg',"Cream Updated Succesfully!");
        }else{
            $this->session->set_flashdata('err_msg',"Please Try Again !!");
        }
        
        redirect('admin/masterkey/cream');
    }
	
	public function add_supplier_op()
	{
	$data=$this->input->post();
	$data['role']=$this->session->userdata('role');
	unset($data['addsupplier']);
	$insert=$this->db->insert('inventory_supplier',$data);
	if($insert)
	{
		$this->session->set_flashdata('msg',"Supplier Added Successfully");
	}
	else{
		$this->session->set_flashdata('err_msg',"ERROR");
		}
	redirect('/admin/masterkey/supplier');
	
	//echo PRE;print_r($data);die;	
	}
	
	public function edit_supplier()
	{
	$id=$this->uri->segment(4);
	$data['title']="Edit Supplier";
	$data['details']=$this->Inv_model->selectbyquery1('inventory_supplier',"`id`='$id'");
	$this->template->load('adminpanel/masterkey/supplier','edit_supplier',$data);
	//$run=$this->Inv_model->update("inventory_supplier",)		
	}
	public function update_supplier()
	{
		$data=$this->input->post();
		$id=$this->uri->segment(4);
		unset($data['update_supplier']);
		$run=$this->Inv_model->update('inventory_supplier',$data,"`id`='$id'");
		if($run)
		{
			$this->session->set_flashdata('msg',"Updated Successfully");
		}
		else{
			$this->session->set_flashdata('err_msg',"ERROR");
			}
		redirect('/admin/masterkey/supplier_list/');
		
	}

    public function delete_status(){    
       $postdata = $this->input->post();
       if(!empty($postdata)){
           $status = $this->Master_model->delete_status($postdata);
           echo $status;
       }else{
           echo false;
       }
    }

    public function addonmenu(){

        $data['title'] = 'Add On Menu';
        $data['datatable'] = true;
        $data['breadcrumb'] = array('admin/'=>'Dashboard');
        $categorylist= $this->Master_model->getall_category(array('status'=>'1'),'all');
        $maincatoption = array();
        $maincatoption[''] = '-- Select Main Category --';
        if(!empty($categorylist)){
            foreach($categorylist as $list){
                $maincatoption[$list['id']] = $list['name'];
            }
        }
        $quantitylist= $this->Master_model->getall_quantity(array('t1.status'=>'1'),'all');
        $quantityoption = array();
        $quantityoption[''] = '-- Select Cake Size --';
        if(!empty($quantitylist)){
            foreach($quantitylist as $list){
                $quantityoption[$list['id']] = $list['name'];
            }
        }
        $data['catoption'] = $maincatoption;  
        $data['sizeoption'] = $quantityoption;  
        $data['addonmenulist'] = $this->Master_model->getall_addonmenu(array('t1.status'=>'1'),'all');
        $this->template->load('adminpanel/masterkey/addonmenu','add_view',$data);
    }

    public function save_addonmenu(){
        $data = $this->input->post();
        unset($data['save_shape']);
        //echo PRE;print_r($data);die;
       if(!empty($_FILES['image']['name'])){
            $upload_path='./assets/images/admin/others'; 
            $allowed_types='gif|jpg|jpeg|png'; 
            $path=upload_file("image",$upload_path,$allowed_types,time().'_other');
            if($path!=''){
                $data['path']=$path;   
            }
        }else{
            $data['path'] = '';
        }        
        // insert it in database
        $result = $this->Master_model->save_addonmenu($data);            
        if($result == true){
            $this->session->set_flashdata('msg',"Addon Menu Added Succesfully!");
        }else{
            $this->session->set_flashdata('err_msg',"Please Try Again !!");
        }        
        redirect('admin/masterkey/addonmenu');
    }

    public function edit_addonmenu(){
        $editid = $this->uri->segment('4');
        if(!empty($editid)){
            $data['title'] = 'Edit Addon Menu';
            $data['datatable'] = true;
            $data['breadcrumb'] = array('admin/'=>'Dashboard');
            $categorylist= $this->Master_model->getall_category(array('status'=>'1'),'all');
            $maincatoption = array();
            $maincatoption[''] = '-- Select Main Category --';
            if(!empty($categorylist)){
                foreach($categorylist as $list){
                    $maincatoption[$list['id']] = $list['name'];
                }
            }
            $quantitylist= $this->Master_model->getall_quantity(array('t1.status'=>'1'),'all');
            $quantityoption = array();
            $quantityoption[''] = '-- Select Cake Size --';
            if(!empty($quantitylist)){
                foreach($quantitylist as $list){
                    $quantityoption[$list['id']] = $list['name'];
                }
            }
            $data['catoption'] = $maincatoption; 
            $data['sizeoption'] = $quantityoption;
            $data['editid'] = $editid; 
            $data['addonmenulist'] = $this->Master_model->getall_addonmenu(array('t1.status'=>'1'),'all');
            $data['oneaddonmenu'] = $this->Master_model->getall_addonmenu(array('t1.status'=>'1','t1.id'=>$editid),'single');      
            $this->template->load('adminpanel/masterkey/addonmenu','edit_view',$data);
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    
    public function update_addonmenu(){
        $data = $this->input->post();
        unset($data['save_shape']);
        $data['path']='';
       if(!empty($_FILES['image']['name'])){
            $upload_path='./assets/images/admin/others';    
            $allowed_types='gif|jpg|jpeg|png'; 
            $path=upload_file("image",$upload_path,$allowed_types,time().'_other');
            if($path!=''){
                $data['path']=$path; 
            }
        }       
        // insert it in database
        $result = $this->Master_model->update_addonmenu($data);  
        //echo $this->db->last_query();die;          
        if($result == true){
            $this->session->set_flashdata('msg',"Add On Menu Updated Succesfully!");
        }else{
            $this->session->set_flashdata('err_msg',"Please Try Again !!");
        }
        
        redirect('admin/masterkey/addonmenu');
    }
    
    public function add_gst()
	{
		$data['title']="ADD GST RATE";
		$data['datatable']=true;
		$data['details']=$this->Inv_model->getdata('inventory_gst');
		$this->template->load('adminpanel/masterkey/gst','gst_rate',$data);
	}

    public function add_uom()
	{
		$data['title']="Add Units";
		$data['datatable']=true;
		$data['details']=$this->Inv_model->getdata('uoms');
		$this->template->load('adminpanel/masterkey/uom','add_uoms',$data);		
	}

    public function add_unit_op()
	{
        $data=$this->input->post();
        $data['unit_name']=strtolower($data['unit_name']);
        unset($data['add_unit']);
        //print_r($data);
        $exist=$this->Inv_model->selectbyquery1('uoms',"`unit_name`='".$data['unit_name']."'");
        if($exist==false){
            $run=$this->db->insert('uoms',$data);
            //echo $this->db->last_query();die;
            if($run){
                $this->session->set_flashdata('msg','Added Successfully');
            }
            else{
                $this->session->set_flashdata('err_msg',"Error");
            }
        }else{
            $this->session->set_flashdata('err_msg',"Unit-".$data['unit_name']."- Already Exist");
        }
        redirect('/admin/masterkey/add_uom/');	
	}

    public function add_gst_op(){

        $data=$this->input->post();
        unset($data['add_gst']);
        $run=$this->db->insert('inventory_gst',$data);
        //echo $this->db->last_query();
        if($run){
            $this->session->set_flashdata('msg',"Added Successfully");
        }else{
            $this->session->set_flashdata('err_msg',"Error");
        }
		redirect('/admin/masterkey/add_gst/');
	}

    public function edit_uom(){
		$id=$this->uri->segment(4);
		$data['title']="Edit Units";
		$data['select']=$this->Inv_model->selectbyquery1('uoms',"`id`='$id'");
		//print_r($data);die;
		$this->template->load('adminpanel/masterkey/uom','edit_uoms',$data);
    }

    public function update_uom(){
        $id=$this->uri->segment(4);
        $data=$this->input->post();
        unset($data['update_unit']);
        $run=$this->db->update('uoms',$data,"`id`='$id'");
        if($run){
            $this->session->set_flashdata('msg','Updated Successfully');}
        else{
            $this->session->set_flashdata('err_msg',"Error");
        }
        redirect('/admin/masterkey/add_uom/');		  
    } 

	

}