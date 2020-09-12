<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class user extends MY_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->library('Enc_lib');
          if (!$this->auth->logged_in()) {
         redirect('site/login');
           
        }
    }

    function index() {
        if (!$this->rbac->hasPrivilege('users_setting', 'can_view')) {
            access_denied();
        
        }
        




        $this->session->set_userdata('top_menu', 'users');
        $this->session->set_userdata('sub_menu', 'users/index');
        $data['title'] = 'users List';

        $user_list = $this->user_model->get();
        
        $data['user_list'] = $user_list;
        $this->form_validation->set_rules('first_name', $this->lang->line('first_name'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('father_name', $this->lang->line('father_name'), 'trim|required|xss_clean');
                $this->form_validation->set_rules('email', $this->lang->line('email'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', $this->lang->line('password'), 'trim|required|xss_clean|min_length[8]');




        
        $this->form_validation->set_rules('confirm_password', $this->lang->line('confirm_password'), "matches[password]");

    
        $this->form_validation->set_rules('is_active', $this->lang->line('is_active'), 'trim|required|xss_clean');
        
        if ($this->form_validation->run() == FALSE) {
        } else {
            if (!$this->rbac->hasPrivilege('users_setting', 'can_add')) {
            access_denied();
        
        }
            $data = array(
                'first_name' => $this->input->post('first_name'),
                'father_name' => $this->input->post('father_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'password' => $this->enc_lib->encrypt($this->input->post('password')),
                'is_active' => $this->input->post('is_active'),
            );
           if( $this->user_model->add($data)){
            $user_list = $this->user_model->get();
        
             $data['user_list'] = $user_list;
            

            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">'.$this->lang->line('add_user_message').'</div>');
            redirect('user/index');
        }else{
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">'.$this->lang->line('add_user_message_error').'</div>');
            redirect('user/index');

            }
        }
           $this->load->view('layout/header', $data);
            $this->load->view('users/userlist', $data);
            $this->load->view('layout/footer', $data);
    }






      function edit($id=null) {
        if (!$this->rbac->hasPrivilege('users_setting', 'can_edit')) {
            access_denied();
        }
        $this->session->set_userdata('top_menu', 'users');
        $this->session->set_userdata('sub_menu', 'users/index');
        $data['title'] = 'city List';

       $user_list = $this->user_model->get();
        
        $data['user_list1'] = $user_list;
        $data['user_list'] =  $this->user_model->get($id);

         $this->form_validation->set_rules('first_name', $this->lang->line('first_name'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('father_name', $this->lang->line('father_name'), 'trim|required|xss_clean');
                $this->form_validation->set_rules('email', $this->lang->line('email'), 'trim|required|xss_clean|valid_email');
        $this->form_validation->set_rules('is_active', $this->lang->line('password'), 'trim|required|xss_clean');




        $pass=$this->input->post('password');

        if($this->input->post('password') != null){
              $this->form_validation->set_rules('password', $this->lang->line('password'), 'trim|required|xss_clean|min_length[8]');

              $this->form_validation->set_rules('confirm_password', $this->lang->line('confirm_password'), 'trim|required|xss_clean|min_length[8]|matches[password]');
        

        }
        

        if ($this->form_validation->run() == FALSE) {
           
        } else {
        if($this->input->post('password') != null){
            $data = array(
               'id' => $this->input->post('id'),
               'first_name' => $this->input->post('first_name'),
                'father_name' => $this->input->post('father_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'is_active' => $this->input->post('is_active'),

            'password' => $this->enc_lib->encrypt($this->input->post('password'))

            );
        }else{
               $data = array(
               'id' => $this->input->post('id'),
               'first_name' => $this->input->post('first_name'),
                'father_name' => $this->input->post('father_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'is_active' => $this->input->post('is_active'),


            );

        }

            $this->user_model->add($data);
            

            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">'.$this->lang->line('update_user_message').'</div>');
            redirect('user/index');
        }
           $this->load->view('layout/header', $data);
            $this->load->view('users/userListedit', $data);
            $this->load->view('layout/footer', $data);
    }



    function delete($id) {
        if (!$this->rbac->hasPrivilege('city', 'can_delete')) {
            access_denied();
        }
      
      
       
        $this->city_model->remove($id);
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">'.$this->lang->line('delete_section').'</div>');
       
        redirect('setting/index');
    }
      function deleteUser($id) {
        if (!$this->rbac->hasPrivilege('users_setting', 'can_delete')) {
            access_denied();
        }
      $arr = array(
        'id'=>$id,
        'deleted_at'=>date('Y/m/d h:i:s A'),
        'is_active'=>0
      );
      
       
        $this->user_model->removeUser($arr);
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">'.$this->lang->line('delete_user').'</div>');
       
        redirect('user/index');
    }




    function make_active(){
         if (!$this->rbac->hasPrivilege('users_setting', 'can_edit')) {
            access_denied();
        }

         $this->form_validation->set_rules('user', $this->lang->line('email'), 'trim|required|xss_clean');
        $this->form_validation->set_rules('state', $this->lang->line('password'), 'trim|required|xss_clean');
        if($this->form_validation->run()==false){

            $array=$arrayName  = array('status' =>'fail' ,'error'=>'','message'=>'حدث خطأ لم يتم تحديث البيانات ' );
        }else{



        $user=$this->input->post('user');
        $state = $this->input->post('state');
        $this->user_model->make_active($user,$state);
            $array=$arrayName  = array('status' =>'success' ,'error'=>'','message'=>'تم التحديث بنجاح ' );
        }
        echo json_encode($array);


    }



 
   
    
function getUserPermission($id=null) {
        if (!$this->rbac->hasPrivilege('users_setting', 'can_edit')) {
            access_denied();
        }
    if($id==null){
 redirect($_SERVER['HTTP_REFERER']);
    }
        $this->session->set_userdata('top_menu', 'users');
        $this->session->set_userdata('sub_menu', 'permission/getUserPermission');


         $data['user_list'] =  $this->user_model->get($id);

       $permission_list = $this->premission_model->getUserPermission($id);
        
        $data['permission_list'] = $permission_list;
       

        

      if ($this->input->server('REQUEST_METHOD') == "POST") {

           
      $search = $this->input->post('search');
    if($search == "save"){
           



             $permission_ids = $this->input->post('permission_ids');
                
                foreach ($permission_ids as $key => $value) {
                    $this->user_model->remove($value);
                    
                  
                            $arr = array(
                                'id' => $value,
                                'user_id'=>$id,
                                'permission_id'=>$this->input->post("premission_id".$value),
                               
                                'can_view' => $this->input->post("can_view" . $value),
                                'can_add' => $this->input->post("can_add" . $value),
                                'can_edit' => $this->input->post("can_edit" . $value),
                                'can_delete' => $this->input->post("can_delete" . $value),
                                
                            );
                    $this->premission_model->add($arr);
           }
      
            

            $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">'.$this->lang->line('update_permission_message').'</div>');
            redirect('user/index');
        
}}
           $this->load->view('layout/header', $data);
            $this->load->view('permision/permission_view', $data);
            $this->load->view('layout/footer', $data);
    }
function getUSerLog() {
        if (!$this->rbac->hasPrivilege('userlog', 'can_view')) {
            access_denied();
        }
    
        $this->session->set_userdata('top_menu', 'users');
        $this->session->set_userdata('sub_menu', 'permission/getUserPermission');


         $data['user_list'] =  $this->user_model->getloguser();

      
           $this->load->view('layout/header', $data);
            $this->load->view('users/userlog', $data);
            $this->load->view('layout/footer', $data);
    }

}

?>
