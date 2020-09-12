<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rbac {

    private $userRoles = array();
    protected $permissions;
    var $perm_category;

    function __construct() {

        $this->CI = & get_instance();
        $this->permissions = array();
       // $this->CI->config->load('mailsms');
        // $this->perm_category = $this->CI->config->item('perm_category');
        self::loadPermission(); //Initiate the userroles
    }

    function loadPermission() {
        $admin_session = $this->CI->session->userdata('admin');

       
     $permissions = $this->CI->premission_model->getPremission($admin_session['id']);
       
    }

  

    function hasPrivilege($UI_name= null, $permission = null) {

         $prem = trim($UI_name);
        $categ= trim($permission) ;





         $admin_session = $this->CI->session->userdata('admin');
        $permissions = $this->CI->premission_model->getUserPermission($admin_session['id']);


        if(!empty($permissions)){


            if($permissions[0]['role'] || $permissions[0]['is_system'] ){
                 return true;

            }
        foreach ($permissions as $key=>$value) {
            if ($value['name'] == $prem && isset($value[$categ]) )    {
                if($value[$categ] == 'on'){
                return true;
            }}
        }
}
        return false;
    }


    function unautherized() {
        $this->CI->load->view('layout/header');
        $this->CI->load->view('unauthorized');
        $this->CI->load->view('layout/footer');
    }

}
