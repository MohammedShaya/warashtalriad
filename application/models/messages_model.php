<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class messages_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }




    public function get($id=null) {
        $this->db->select()->from('messages');
        if ($id!=null) {
        $this->db->where('id',$id);
        }
        $query = $this->db->get();

        if ($id!=null) {
            return $query->row_array();
        } else {
            return $query->result_array();
          
        }
    }

       public function get_navbar() {
        $this->db->select()->from('messages');
        
        $this->db->where('is_siderbar','on');
        $query = $this->db->get();
        return $query->result_array();
          
        
    }


   public function remove($id) {
       
    $this->db->where('id',$id);
    $this->db->delete('messages');
    $query = $this->db->query('select * from messages where id= ?',[$id]);
    $data=$query->row_array();
    if ($data==null) {
       return True;
    }
    else{
    return False;
    }
}




    public function add($data) {
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('messages', $data);
            return $data['id'] ;
        } else {
            $this->db->insert('messages', $data);
            return $this->db->insert_id();
        }
    }

   



}
