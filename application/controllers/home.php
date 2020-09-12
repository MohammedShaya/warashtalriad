<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends  MY_Controller {
	
	
function index()
{
	$this->session->set_userdata('top_menu', 'home');
	$this->load_view_site('home/home');
}
function contact()
{	 $this->session->set_userdata('top_menu', 'contact');
	$this->load_view_site('home/contact');
}
function add_message()
{	
	if (!$this->rbac->hasPrivilege('comments', 'can_add') && !$this->rbac->hasPrivilege('comments', 'can_edit')) {
		access_denied();
	}


 $this->form_validation->set_rules('name',  $this->lang->line('name'), 'trim|required|xss_clean');
 $this->form_validation->set_rules('email',  $this->lang->line('email'), 'trim|required|xss_clean');
 $this->form_validation->set_rules('message',  $this->lang->line('message'), 'trim|required|xss_clean');

if ($this->form_validation->run() == FALSE) {
		$data = array(
			'message' => form_error('message'), 
			'name' => form_error('name'), 
			'email' => form_error('email'), 
			
		  
		);
		$array = array('status' => 'fail', 'message' => $data);
		 echo json_encode( $array );
	} else {  
	   
		if ($this->input->post('id')!=null) {
		   $data = array(
			'id' => $this->input->post('id'),
			'email' => $this->input->post('email'),
			'name' =>  $this->input->post('name'),
			'message' => $this->input->post('message'),
			
		);

		 
		}
	  else{
		  $data = array(
			'email' => $this->input->post('email'),
			'name' =>  $this->input->post('name'),
			'message' => $this->input->post('message'),
			
		);
	  }

		if(!empty($this->comments_model->add_message($data))){
			 if ($this->input->post('id')!=null) {
		   $array = array('status' => 'success', 'message' => 'تم عملية التعديل بنجاح');
			 }
			 else{
				
		   $array = array('status' => 'success', 'message' =>'شكرا لتواصلك معنا سوف يتم الرد عليك قربا ');
			 }
		 echo json_encode( $array );
		}else{
			  if ($this->input->post('id')!=null) {
		$array = array('status' => 'fail1', 'message' => 'لم تتم عملية التعديل بنجا');
			  }else{

		$array = array('status' => 'fail1', 'message' => 'لم تتم عملية الاضافة بنجاح');
			  }
		 echo json_encode( $array );
			}
}
}
function about()
{
	$this->session->set_userdata('top_menu', 'about');
	$this->load_view_site('home/about');
}
function group($id)
{	
	$this->session->set_userdata('top_menu', 'group_'.$id); 
	$data['produect_group']=$this->products_model->get_all_with_images($id);
	$this->load_view_site('home/group',$data);
}
function produect($id)
{	$item=$this->products_model->get_info($id); 
	$this->session->set_userdata('top_menu', 'group_'.$item['group_id']);
	$this->products_model->add_shows($id);
	$data['produect_info']=$item;
	$this->load_view_site('home/produect',$data);
}
function reasult()
{	
	$search=$this->input->post('search');
	$data['search']=$search;
	$data['produect_search']=$this->products_model->get_all_with_search($search);
	
	$this->load_view_site('home/search',$data);
}




}
