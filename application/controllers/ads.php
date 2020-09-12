<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ads extends MY_Controller {

    public function __construct() {
        parent::__construct();
      
         
    if (!$this->auth->logged_in()) {
         redirect('site/login');
           
        }
      }
public function load_data(){
      $this->load->library('datatables_server_side', array(
      'table' => 'ads', //name of the table to fetch data from
      'get_url' => 'ads/get_ads', //primary key field name
      'delete_url' => 'ads/delete', //primary key field name
      // 'url' => base_url('ads/get_ads'), //primary key field name
      'custom_select_status' => 'true', //primary key field name
      'custom_select' => 'select * from ads ', //primary key field name
      'edit' => 'true', //primary key field name
      'delete' => 'true', //primary key field name
      'primary_key' => 'id', //primary key field name
      'columns' => array('id','title','image','url','is_active','action'), //zero-based array of field names. 
      'where' => array() //associative array or custom where string
    ));
       $this->datatables_server_side->process();
    
}



function index() {
        if (!$this->rbac->hasPrivilege('ads', 'can_view')) {
            access_denied();
        }
        $this->session->set_userdata('top_menu', 'other');
        $this->session->set_userdata('sub_menu', 'ads/index');
        $this->load_view('ads/adsList');
    }


function add()
{
    if (!$this->rbac->hasPrivilege('ads', 'can_add') && !$this->rbac->hasPrivilege('ads', 'can_edit')) {
            access_denied();
        }
    

    $uploaddir='./images/';
    $img_name='';
    if (!is_dir($uploaddir) && !mkdir($uploaddir)) {
       die("Error creating folder $uploaddir");
               }
   if (isset($_FILES["image_primary"]) && !empty($_FILES['image_primary']['name'])) {
       $fileInfo = pathinfo($_FILES["image_primary"]["name"]);
       $img_name =gmdate("d-m-y-H-i-s", time()+3600*7) . 'primary.' . $fileInfo['extension'];
       move_uploaded_file($_FILES["image_primary"]["tmp_name"], "./images/" . $img_name);
     
   } 
  

     $this->form_validation->set_rules('title',  $this->lang->line('title'), 'trim|required|xss_clean');
     $this->form_validation->set_rules('url',  $this->lang->line('url'), 'trim|required|xss_clean');
     
    if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => form_error('url'), 
                'url' => form_error('title'), 
                'is_active' => form_error('is_active'), 
                'image_primary' => $this->upload->display_errors(),
            );
            $array = array('status' => 'fail', 'message' => $data);
             echo json_encode( $array );
        } else {  
           
            if ($this->input->post('id')!=null) {
               $data = array(
                'id' => $this->input->post('id'),
                'title' => $this->input->post('title'),
                'url' => $this->input->post('url'),
                'is_active' => $this->input->post('is_active'),
                'image' => $img_name,
            );

             
            }
          else{
              $data = array(
                'title' => $this->input->post('title'),
                'url' => $this->input->post('url'),
                'is_active' => $this->input->post('is_active'),
                'image' => $img_name,
            );
          }

            if(!empty($this->ads_model->add($data))){
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


function get_ads(){
    $id = $this->input->get('id');
    $ads =  $this->ads_model->get($id);
    echo json_encode($ads);
}

function delete(){
    $id = $this->input->get('id');
    if ($id) {
        if ($this->ads_model->remove($id)) {
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
