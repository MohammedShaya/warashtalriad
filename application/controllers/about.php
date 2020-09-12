<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class About extends MY_Controller {

    public function __construct() {
        parent::__construct();
      
         
    if (!$this->auth->logged_in()) {
         redirect('site/login');
           
        }
      }
public function load_data(){
      $this->load->library('datatables_server_side', array(
      'table' => 'about', //name of the table to fetch data from
      'get_url' => 'about/get_about', //primary key field name
      'delete_url' => 'about/delete', //primary key field name
      // 'url' => base_url('about/get_about'), //primary key field name
      'custom_select_status' => 'true', //primary key field name
      'custom_select' => 'select * from about ', //primary key field name
      'detailes_select' => 'select * from about_point where about_id=? order by order_', //primary key field name
      'edit' => 'true', //primary key field name
      'delete' => 'true', //primary key field name
      'primary_key' => 'id', //primary key field name
      'columns' => array('id','subject','title','description','detailes','order','is_active','image','action'), //zero-based array of field names. 
      'where' => array() //associative array or custom where string
    ));
       $this->datatables_server_side->process();
    
}



function index() {
        if (!$this->rbac->hasPrivilege('about', 'can_view')) {
            access_denied();
        }
        // $data['groups']=$this->groups_model->get();
        $this->session->set_userdata('top_menu', 'setting_system');
        $this->session->set_userdata('sub_menu', 'about/index');
        $this->load_view('about/aboutList');
    }


function add()
{
    if (!$this->rbac->hasPrivilege('about', 'can_add') && !$this->rbac->hasPrivilege('about', 'can_edit')) {
            access_denied();
        }
    
$data_image[] = array( );
    $uploaddir='./images/';
    $img_name='';
  
   if (isset($_FILES["image_primary"]) && !empty($_FILES['image_primary']['name'])) {
       $fileInfo = pathinfo($_FILES["image_primary"]["name"]);
       $img_name =gmdate("d-m-y-H-i-s", time()+3600*7) . 'primary.' . $fileInfo['extension'];
       move_uploaded_file($_FILES["image_primary"]["tmp_name"], "./images/" . $img_name);
     }
     $this->form_validation->set_rules('subject',  $this->lang->line('subject'), 'trim|required|xss_clean');
     $this->form_validation->set_rules('title',  $this->lang->line('title'), 'trim|required|xss_clean');
     $this->form_validation->set_rules('order',  $this->lang->line('order'), 'trim|required|xss_clean|numeric');
    if ($this->form_validation->run() == FALSE) {
            $data = array(
                'subject'             => form_error('subject'), 
                'is_active'        => form_error('is_active'), 
                'title'         => form_error('title'), 
                'description'      => form_error('description'), 
                'order'            => form_error('order'),
                'image_primary'   => $this->upload->display_errors(),
               
            );
            $array = array('status' => 'fail', 'message' => $data);
             echo json_encode( $array );
        } else {  
         $about=$this->input->post('details');
          if (isset($about )&&!empty( $about)) {
            foreach ($about as $key => $value) {
              $order_id=$key+1;
              if (!empty($this->input->post('order_detailes')[$key])) {
                $order_id=$this->input->post('order_detailes')[$key];
              }
              $data_deltails[] = array(
                'about_id' =>'' , 
                'point' => $value, 
                'order_' => $order_id, 
              );
            }
            # code...
          }
          else{
            $data_deltails=[];
          }
           
            if ($this->input->post('id')!=null) {
               $data = array(
                'id' => $this->input->post('id'),
                'subject' => $this->input->post('subject'),
                'title' => $this->input->post('title'),
                'is_active' => $this->input->post('is_active'),

                'description' => $this->input->post('description'),
                'order' => $this->input->post('order'),
            );
               if (!empty($img_name)) {
                  # code...
                $data['image'] = $img_name;
                }

             
            }
          else{
              $data = array(
               'subject' => $this->input->post('subject'),
                'title' => $this->input->post('title'),
                'is_active' => $this->input->post('is_active'),
                'image' => $img_name,
                'description' => $this->input->post('description'),
                'order' => $this->input->post('order'),
            );
          }

            if(!empty($this->about_model->add($data,$data_deltails))){
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


function get_about(){
    $id = $this->input->get('id');
    $about =  $this->about_model->get($id);
    echo json_encode($about);
}

function delete(){
    $id = $this->input->get('id');
    if ($id) {
        if ($this->about_model->remove($id)) {
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
