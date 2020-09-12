<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class social_media extends MY_Controller {

    public function __construct() {
        parent::__construct();
      
         
    if (!$this->auth->logged_in()) {
         redirect('site/login');
           
        }
      }
public function load_data(){
      $this->load->library('datatables_server_side', array(
      'table' => 'social_media', //name of the table to fetch data from
      'get_url' => 'social_media/get_social_media', //primary key field name
      'delete_url' => 'social_media/delete', //primary key field name
      // 'url' => base_url('social_media/get_social_media'), //primary key field name
      'edit' => 'true', //primary key field name
      'delete' => 'true', //primary key field name
      'primary_key' => 'id', //primary key field name
      'columns' => array('id','icon','url','alt','is_active','order','action'), //zero-based array of field names. 
      'where' => array() //associative array or custom where string
    ));
       $this->datatables_server_side->process();
    
}



function index() {
        if (!$this->rbac->hasPrivilege('social_media', 'can_view')) {
            access_denied();
        }
        $this->session->set_userdata('top_menu', 'setting_system');
        $this->session->set_userdata('sub_menu', 'social_media/index');
        $this->load->view('layout/header');
        $this->load->view('social_media/social_mediaList');
        $this->load->view('layout/footer');
    }


function add()
{
    if (!$this->rbac->hasPrivilege('social_media', 'can_add') && !$this->rbac->hasPrivilege('social_media', 'can_edit')) {
            access_denied();
        }
     $this->form_validation->set_rules('icon',  $this->lang->line('icon_social_media'), 'trim|required|xss_clean');
     $this->form_validation->set_rules('url',  $this->lang->line('url_social_media'), 'trim|required|xss_clean');
     $this->form_validation->set_rules('alt',  $this->lang->line('alt_social_media'), 'trim|required|xss_clean');
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
                'icon' => $this->input->post('icon'),
                'url' => $this->input->post('url'),
                'alt' => $this->input->post('alt'),
                'order' => $this->input->post('order'),
                'is_active' => $this->input->post('is_active'),
            );
            }
          else{
              $data = array(
                 'icon' => $this->input->post('icon'),
                'url' => $this->input->post('url'),
                'alt' => $this->input->post('alt'),
                'order' => $this->input->post('order'),
                'is_active' => $this->input->post('is_active'),
            );
          }
            if(!empty($this->social_media_model->add($data))){
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


function get_social_media(){
    $id = $this->input->get('id');
    $social_media =  $this->social_media_model->get($id);
    echo json_encode($social_media);
}

function delete(){
    $id = $this->input->get('id');
    if ($id) {
        if ($this->social_media_model->remove($id)) {
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
