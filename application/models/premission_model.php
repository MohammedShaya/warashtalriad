<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class premission_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

   public function getPremission($id){

$query = $this->db->query('
select permission_user.* ,permission.name , users.role ,users.is_system
from permission , permission_user , users 
where users.id= 8');
return $query->result_array();



   } 
   public function getUserPermission($id){

$query = $this->db->query('
SELECT permission.* ,permission_user.id as p_id ,users.is_system,users.role,permission_user.can_view ,permission_user.can_add,permission_user.can_edit,permission_user.can_delete 
from permission LEFT JOIN permission_user on (permission.id = permission_user.permission_id)
LEFT join users on (permission_user.user_id = users.id)
WHERE users.id=?

',$id);
return $query->result_array();



   }
   function add($data){

   	$this->db->insert('permission_user',$data);

   }


   
    

}

?>
