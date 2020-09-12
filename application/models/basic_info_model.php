<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class basic_info_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }




    public function get($id=1) {
        $this->db->select()->from('basic_info');
        if ($id!=null) {
        $this->db->where('id',$id);
        }
        $query = $this->db->get();


         return $query->row_array();
       
    }


   public function remove($id) {
       
    $this->db->where('id',$id);
    $this->db->delete('basic_info');
    $query = $this->db->query('select * from basic_info where id= ?',[$id]);
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
            $this->db->update('basic_info', $data);
            return $data['id'] ;
        } else {
            $this->db->insert('basic_info', $data);
            return $this->db->insert_id();
        }
    }

   



}
