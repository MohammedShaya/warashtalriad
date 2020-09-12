<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('Enc_lib');
          // $this->load->library('rbac');
       
         if (!$this->auth->logged_in()) {
         redirect('site/login');
           
        }

    }

    function unauthorized() {
        $data = array();
        $this->load->view('layout/header', $data);
        $this->load->view('unauthorized', $data);
        $this->load->view('layout/footer', $data);
      
    }

 
    function dashboard() {
        $this->load->view('layout/header');
        $this->load->view('layout/footer');

    }
}
?>