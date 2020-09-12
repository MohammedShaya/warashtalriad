<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class social_media_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }




    public function get($id=null) {
        $this->db->select()->from('social_media');
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

 public function get_all() {
        $this->db->select()->from('social_media');
        $this->db->where('is_active','on');
        $this->db->order_by('order');
        $query = $this->db->get();
        return $query->result_array();
          
    }

   public function remove($id) {
       
    $this->db->where('id',$id);
    $this->db->delete('social_media');
    $query = $this->db->query('select * from social_media where id= ?',[$id]);
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
            $this->db->update('social_media', $data);
            return $data['id'] ;
        } else {
            $this->db->insert('social_media', $data);
            return $this->db->insert_id();
        }
    }

   



}
