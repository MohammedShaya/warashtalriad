<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products extends MY_Controller {

    public function __construct() {
        parent::__construct();
      
         
    if (!$this->auth->logged_in()) {
         redirect('site/login');
           
        }
      }
public function load_data(){
      $this->load->library('datatables_server_side', array(
      'table' => 'products', //name of the table to fetch data from
      'get_url' => 'products/get_products', //primary key field name
      'delete_url' => 'products/delete', //primary key field name
      // 'url' => base_url('products/get_products'), //primary key field name
      'custom_select_status' => 'true', //primary key field name
      'custom_select' => 'select products.*,product_image.image, groups.name as group_id from products left join groups on   groups.id=products.group_id left join product_image on  products.id=product_image.product_id where product_image.type="primary" or product_image.type IS NULL ', //primary key field name
      'edit' => 'true', //primary key field name
      'delete' => 'true', //primary key field name
      'primary_key' => 'id', //primary key field name
      'columns' => array('id','group_id','name','description','order','is_active','image','action'), //zero-based array of field names. 
      'where' => array() //associative array or custom where string
    ));
       $this->datatables_server_side->process();
    
}



function index() {
        if (!$this->rbac->hasPrivilege('products', 'can_view')) {
            access_denied();
        }
        $data['groups']=$this->groups_model->get();
        $this->session->set_userdata('top_menu', 'setting');
        $this->session->set_userdata('sub_menu', 'products/index');
        $this->load_view('products/productsList',$data);
    }


function add()
{
    if (!$this->rbac->hasPrivilege('products', 'can_add') && !$this->rbac->hasPrivilege('products', 'can_edit')) {
            access_denied();
        }
        $apiToken = "1331838866:AAGzkUH7szxYN0nAIQVSGx0GJpsmvxrRB4w";
        $data = [
            'chat_id' => '@programmer_chanel',
            'text ' => $this->input->post('name').''.$this->input->post('description'),
        ];
    file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );
$data_image[] = array( );
    $uploaddir='./images/';
    $img_name='';
    if (!is_dir($uploaddir) && !mkdir($uploaddir)) {
       die("Error creating folder $uploaddir");
               }
   if (isset($_FILES["image_primary"]) && !empty($_FILES['image_primary']['name'])) {
       $fileInfo = pathinfo($_FILES["image_primary"]["name"]);
       $img_name =gmdate("d-m-y-H-i-s", time()+3600*7) . 'primary.' . $fileInfo['extension'];
       move_uploaded_file($_FILES["image_primary"]["tmp_name"], "./images/" . $img_name);
       $data_image[] = array(
                'image' =>  $img_name,
                'type' =>  'primary',
                'product_id' =>  'primary',
                 );
                 $data = [
                    'chat_id' => '@programmer_chanel',
                    'caption ' => 'Hello world!',
                    'photo' => $img_name,
                    'parse_mode'=>'string'
                ];
            file_get_contents("https://api.telegram.org/bot$apiToken/sendPhoto?" . http_build_query($data) );
   } 
    if (isset($_FILES["OTHER_IMAGE"]) && !empty($_FILES['OTHER_IMAGE']['name'][0])) {
      // var_dump($_FILES["OTHER_IMAGE"]);
      for ($image=0; $image < count($_FILES["OTHER_IMAGE"]['name']) ; $image++) { 
         $fileInfo = pathinfo($_FILES['OTHER_IMAGE']["name"][$image]);
       $img_name =gmdate("d-m-y-H-i-s", time()+3600*7).$image . '.' . $fileInfo['extension'];
       move_uploaded_file($_FILES['OTHER_IMAGE']["tmp_name"][$image], "./images/" . $img_name);
                 $data_image[] = array(
                'image' =>  $img_name,
                'type' =>  '',
                'product_id' =>  '',
                 );
               }  
      }
  

   
     

     $this->form_validation->set_rules('name',  $this->lang->line('name_products'), 'trim|required|xss_clean');
     $this->form_validation->set_rules('group_id',  $this->lang->line('groups'), 'trim|required|xss_clean');
     $this->form_validation->set_rules('description',  $this->lang->line('description'), 'trim|required|xss_clean');
     $this->form_validation->set_rules('order',  $this->lang->line('order'), 'trim|required|xss_clean|numeric');
    if ($this->form_validation->run() == FALSE) {
            $data = array(
                'name' => form_error('name'), 
                'is_active' => form_error('is_active'), 
                'group_id' => form_error('group_id'), 
                'description' => form_error('description'), 
                'order' => form_error('order'),
                'image_primary' => $this->upload->display_errors(),
                'image' => $this->upload->display_errors(),
            );
            $array = array('status' => 'fail', 'message' => $data);
             echo json_encode( $array );
        } else {  
           
            if ($this->input->post('id')!=null) {
               $data = array(
                'id' => $this->input->post('id'),
                'name' => $this->input->post('name'),
                'is_active' => $this->input->post('is_active'),
                'group_id' => $this->input->post('group_id'),
                'description' => $this->input->post('description'),
                'order' => $this->input->post('order'),
            );

             
            }
          else{
              $data = array(
                'name' => $this->input->post('name'),
                'is_active' => $this->input->post('is_active'),
                 'group_id' => $this->input->post('group_id'),
                'description' => $this->input->post('description'),
                'order' => $this->input->post('order'),
            );
          }

            if(!empty($this->products_model->add($data,$data_image))){
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


function add_likes(){
    $id = $this->input->get('id');
    $products =  $this->products_model->add_likes($id);
}
function get_products(){
    $id = $this->input->get('id');
    $products =  $this->products_model->get($id);
    echo json_encode($products);
}

function delete(){
    $id = $this->input->get('id');
    if ($id) {
        if ($this->products_model->remove($id)) {
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
