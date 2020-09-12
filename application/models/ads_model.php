<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ads_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }




    public function get($id=null) {
        $this->db->select()->from('ads');
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

    public function get_share() {
        $this->db->select()->from('ads');
        $this->db->where('is_active','on');
        $query = $this->db->get();
        return $query->result_array();
    }

     


   public function remove($id) {
       
    $this->db->where('id',$id);
    $this->db->delete('ads');
    $query = $this->db->query('select * from ads where id= ?',[$id]);
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
            $this->db->update('ads', $data);
            return $data['id'] ;
        } else {
            $this->db->insert('ads', $data);
            return $this->db->insert_id();
        }
    }

   



}
