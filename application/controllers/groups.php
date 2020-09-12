<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Groups extends MY_Controller {

    public function __construct() {
        parent::__construct();
      
         
    if (!$this->auth->logged_in()) {
         redirect('site/login');
           
        }
      }
public function load_data(){
      $this->load->library('datatables_server_side', array(
      'table' => 'groups', //name of the table to fetch data from
      'get_url' => 'groups/get_groups', //primary key field name
      'delete_url' => 'groups/delete', //primary key field name
      // 'url' => base_url('groups/get_groups'), //primary key field name
      'edit' => 'true', //primary key field name
      'delete' => 'true', //primary key field name
      'primary_key' => 'id', //primary key field name
      'columns' => array('id','name','is_siderbar','action'), //zero-based array of field names. 
      'where' => array() //associative array or custom where string
    ));
       $this->datatables_server_side->process();
    
}



function index() {
        if (!$this->rbac->hasPrivilege('groups', 'can_view')) {
            access_denied();
        }
        $this->session->set_userdata('top_menu', 'setting');
        $this->session->set_userdata('sub_menu', 'groups/index');
        $this->load->view('layout/header');
        $this->load->view('groups/groupsList');
        $this->load->view('layout/footer');
    }


function add()
{
   
    if (!$this->rbac->hasPrivilege('groups', 'can_add') && !$this->rbac->hasPrivilege('groups', 'can_edit')) {
            access_denied();
        }
     $this->form_validation->set_rules('name',  $this->lang->line('name_groups'), 'trim|required|xss_clean');
    if ($this->form_validation->run() == FALSE) {
            $data = array(
                'name' => form_error('name'), 
                'is_siderbar' => form_error('is_siderbar'), 
            );
            $array = array('status' => 'fail', 'message' => $data);
             echo json_encode( $array );
        } else {
            if ($this->input->post('id')!=null) {
               $data = array(
                'id' => $this->input->post('id'),
                'name' => $this->input->post('name'),
                'is_siderbar' => $this->input->post('is_siderbar'),
            );
            }
          else{
              $data = array(
                'name' => $this->input->post('name'),
                'is_siderbar' => $this->input->post('is_siderbar'),
            );
          }
            if(!empty($this->groups_model->add($data))){
                 if ($this->input->post('id')!=null) {
               $array = array('status' => 'success', 'message' => 'تم عملية التعديل بنجاح');
                 }
                 else{
                    
               $array = array('status' => 'success', 'message' => 'تم الاضافة بنجاح<');
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


function get_groups(){
    $id = $this->input->get('id');
    $groups =  $this->groups_model->get($id);
    echo json_encode($groups);
}

function delete(){
    $id = $this->input->get('id');
    if ($id) {
        if ($this->groups_model->remove($id)) {
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
