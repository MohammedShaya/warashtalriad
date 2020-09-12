<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class comments_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }




    public function get($id=null) {
        $this->db->select()->from('comments');
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
        $this->db->select()->from('comments');
        
        $this->db->where('is_siderbar','on');
        $query = $this->db->get();
        return $query->result_array();
          
        
    }


   public function remove($id) {
       
    $this->db->where('id',$id);
    $this->db->delete('comments');
    $query = $this->db->query('select * from comments where id= ?',[$id]);
    $data=$query->row_array();
    if ($data==null) {
       return True;
    }
    else{
    return False;
    }
}


public function get_share() {
    $this->db->select('comments.text,products.name,products.id,product_image.image')->from('comments');
    $this->db->join('products','products.id=comments.produect_id');
    $this->db->join('product_image','products.id=product_image.product_id');
    $this->db->where('comments.is_active','on');
    $this->db->where('product_image.type','primary');
    $this->db->limit(10);
    $query = $this->db->get();
    return $query->result_array();
 
}


    public function add($data) {
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('comments', $data);
            return $data['id'] ;
        } else {
            $this->db->insert('comments', $data);
            return $this->db->insert_id();
        }
    }
    public function add_message($data) {
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
