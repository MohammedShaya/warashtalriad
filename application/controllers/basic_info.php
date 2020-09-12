<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class basic_info extends MY_Controller {

    public function __construct() {
        parent::__construct();
      
         
    if (!$this->auth->logged_in()) {
         redirect('site/login');
           
        }
      }




function index() {
        if (!$this->rbac->hasPrivilege('setting', 'can_view')) {
            access_denied();
        }
        $data['basic_info']=$this->basic_info_model->get();
        $this->session->set_userdata('top_menu', 'setting_system');
        $this->session->set_userdata('sub_menu', 'basic_info/index');
       $this->load_view('basic_info/basic_info',$data);
    }


function add()
{
    if (!$this->rbac->hasPrivilege('setting', 'can_add') && !$this->rbac->hasPrivilege('setting', 'can_edit')) {
            access_denied();
        }
         
     $this->form_validation->set_rules('name',  $this->lang->line('name'), 'trim|required|xss_clean');
     $this->form_validation->set_rules('url',  $this->lang->line('url'), 'trim|required|xss_clean');
     $this->form_validation->set_rules('address',  $this->lang->line('address'), 'trim|required|xss_clean');
     $this->form_validation->set_rules('phone1',  $this->lang->line('phon1'), 'trim|required|xss_clean');
     $this->form_validation->set_rules('phone2',  $this->lang->line('phone2'), 'trim|required|xss_clean');
      $this->form_validation->set_rules('email2',  $this->lang->line('email2'), 'trim|required|xss_clean');
     $this->form_validation->set_rules('email1',  $this->lang->line('email1'), 'trim|required|xss_clean');
    if ($this->form_validation->run() == FALSE) {
            $data = array(
                'name' => form_error('name'), 
                'url' => form_error('url'), 
                'address' => form_error('address'), 
                'phone1' => form_error('phone1'), 
                'phone2' => form_error('phone2'),
                 'email2' => form_error('email2'), 
                'email1' => form_error('email1'), 
            );
            $array = array('status' => 'fail', 'message' => $data);
             echo json_encode( $array );
        } else {
         
               $data = array(
                'id' => 1,
                'name' => $this->input->post('name'),
                'url' => $this->input->post('url'),
                'address' => $this->input->post('address'),
                 'phone1' => $this->input->post('phone1'),
                 'phone2' => $this->input->post('phone2'),
                 'email1' => $this->input->post('email1'),
                 'email2' => $this->input->post('email2'),
            );
                 $uploaddir='./images/';
                  $img_name='';
                  if (!is_dir($uploaddir) && !mkdir($uploaddir)) {
                     die("Error creating folder $uploaddir");
                             }
                 if (isset($_FILES["logo_image"]) && !empty($_FILES['logo_image']['name'])) {
                     $fileInfo = pathinfo($_FILES["logo_image"]["name"]);
                     $img_name =gmdate("d-m-y-H-i-s", time()+3600*7) . 'primary.' . $fileInfo['extension'];
                     move_uploaded_file($_FILES["logo_image"]["tmp_name"], "./images/" . $img_name);
                   $data['logo']=$img_name;
                 } 
            
                    if(!empty($this->basic_info_model->add($data))){
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

            $array = array('status' => 'fail1', 'message' => 'لم تتم عملية الاضافة بنجاح','url'=>'true');
                  }
             echo json_encode( $array );
                }
}




}


function get_basic_info(){
    $id = $this->input->get('id');
    $setting =  $this->basic_info_model->get($id);
    echo json_encode($setting);
}

function delete(){
    $id = $this->input->get('id');
    if ($id) {
        if ($this->basic_info_model->remove($id)) {
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
