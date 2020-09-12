<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Comments extends MY_Controller {

    public function __construct() {
        parent::__construct();
      
         
    if (!$this->auth->logged_in()) {
         redirect('site/login');
           
        }
      }
public function load_data(){
      $this->load->library('datatables_server_side', array(
      'table' => 'comments', //name of the table to fetch data from
      'get_url' => 'comments/get_comments', //primary key field name
      'delete_url' => 'comments/delete', //primary key field name
      // 'url' => base_url('comments/get_comments'), //primary key field name
      'custom_select_status' => 'true', //primary key field name
      'custom_select' => 'select comments.*, products.name as produect_id ,offers.name as offer_id from comments left join products on   products.id=comments.produect_id left join offers on  comments.offer_id=offers.id  ', //primary key field name
      'edit' => 'true', //primary key field name
      'delete' => 'true', //primary key field name
      'primary_key' => 'id', //primary key field name
      'columns' => array('id','text','email','produect_id','offer_id','is_active','action'), //zero-based array of field names. 
      'where' => array() //associative array or custom where string
    ));
       $this->datatables_server_side->process();
    
}



function index() {
        if (!$this->rbac->hasPrivilege('comments', 'can_view')) {
            access_denied();
        }
        $data['products']=$this->products_model->get();
        $data['offers']=$this->offers_model->get();
        $this->session->set_userdata('top_menu', 'other');
        $this->session->set_userdata('sub_menu', 'comments/index');
        $this->load_view('comments/commentsList',$data);
    }


function add()
{
    if (!$this->rbac->hasPrivilege('comments', 'can_add') && !$this->rbac->hasPrivilege('comments', 'can_edit')) {
            access_denied();
        }
    

     $this->form_validation->set_rules('text',  $this->lang->line('comment'), 'trim|required|xss_clean');

    if ($this->form_validation->run() == FALSE) {
            $data = array(
                'text' => form_error('text'), 
                
              
            );
            $array = array('status' => 'fail', 'message' => $data);
             echo json_encode( $array );
        } else {  
           
            if ($this->input->post('id')!=null) {
               $data = array(
                'id' => $this->input->post('id'),
                'produect_id' => $this->input->post('produect_id'),
                'is_active' =>  $this->input->post('is_active'),
                'offer_id' => $this->input->post('offer_id'),
                'text' => $this->input->post('text'),
                'email' => $this->input->post('email'),
            );

             
            }
          else{
              $data = array(
                'produect_id' => $this->input->post('produect_id'),
                'is_active' => $this->input->post('is_active'),
                'offer_id' => $this->input->post('offer_id'),
                'text' => $this->input->post('text'),
                'email' => $this->input->post('email'),
            );
          }

            if(!empty($this->comments_model->add($data))){
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


function get_comments(){
    $id = $this->input->get('id');
    $comments =  $this->comments_model->get($id);
    echo json_encode($comments);
}

function delete(){
    $id = $this->input->get('id');
    if ($id) {
        if ($this->comments_model->remove($id)) {
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