<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Messages extends MY_Controller {

    public function __construct() {
        parent::__construct();
      
         
    if (!$this->auth->logged_in()) {
         redirect('site/login');
           
        }
      }
public function load_data(){
      $this->load->library('datatables_server_side', array(
      'table' => 'messages', //name of the table to fetch data from
      'get_url' => 'messages/get_messages', //primary key field name
      'delete_url' => 'messages/delete', //primary key field name
      // 'url' => base_url('messages/get_messages'), //primary key field name
      'edit' => '', //primary key field name
      'delete' => 'true', //primary key field name
      'primary_key' => 'id', //primary key field name
      'columns' => array('id','name','email','message','created_at','action'), //zero-based array of field names. 
      'where' => array() //associative array or custom where string
    ));
       $this->datatables_server_side->process();
    
}



function index() {
        if (!$this->rbac->hasPrivilege('messages', 'can_view')) {
            access_denied();
        }
        $this->session->set_userdata('top_menu', 'other');
        $this->session->set_userdata('sub_menu', 'messages/index');
        $this->load->view('layout/header');
        $this->load->view('messages/messagesList');
        $this->load->view('layout/footer');
    }





function get_messages(){
    $id = $this->input->get('id');
    $messages =  $this->messages_model->get($id);
    echo json_encode($messages);
}

function delete(){
    $id = $this->input->get('id');
    if ($id) {
        if ($this->messages_model->remove($id)) {
            $array = array('status' => 'success', 'message' => 'تم عملية الحذف بنجاح');
        }
        else{
            $array = array('status' => 'fail', 'message' => 'لم تتم عملية الحذف ');
        }
     
    }
    else{
            $array = array('status' => 'fail', 'message' => 'خطا في البيانات المرسلة الرجاء المحاولة مرة اخرى');

    }
    echo json_encode($array);
}




}

?>
