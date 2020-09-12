<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->library('Auth');
        $this->load->library('Enc_lib');
        $this->load->config('ci-blog');
    }

   
    public function show_404() {
        $this->load->view('errors/error_message');
    }
    function login() {

        if ($this->auth->logged_in()) {
            $this->auth->is_logged_in(true);
        }

        $data = array();
        $data['title'] = 'Login';
        $data['basic_info']=$this->basic_info_model->get();
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/login',$data);
        } else {
            $result=false;
            $record = $this->user_model->getUserByEmail($this->input->post('username'));
        if($record ){
               if($this->enc_lib->encrypt($this->input->post('password'))==$record['password']){
                    $result=true;
                }
        }
    
            $login_post = array(
                'email' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
          
            if (isset($record) && $result ) {
              
                if($record['is_active']){
                  
                $basic_info=$this->basic_info_model->get(1);
                $session_data = array(
                    'id' => $record['id'],
                    'username' => $record['first_name'],
                    'father_name' => $record['father_name'],
                    'last_name' => $record['last_name'],
                    'email' => $record['email'],
                    'info' => $basic_info,
                    'date_format' => 'yyyy/mm/dd',);
                 
                $this->session->set_userdata('admin', $session_data);
             $this->user_model->setUserLog($record['id']);
           
                
              

                if (isset($_SESSION['redirect_to'])){
                   
                    redirect($_SESSION['redirect_to']);
                }
                else{
                
                    redirect('admin/dashboard');
                }
            }else{
                 $data['error_message'] = $this->lang->line('user_disable');
                    
                  $this->load->view('admin/login', $data);
            }
               
            } else {
                $data['error_message'] = $this->lang->line('user_login_error');
                $this->load->view('admin/login', $data);
            }
        }
    }

    function logout() {
        $this->auth->logout();
         redirect('/');
    
    }


 

}

?>