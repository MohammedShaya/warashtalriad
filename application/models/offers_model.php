<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class offers_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }



    public function get($id=null) {
        $this->db->select()->from('offers');
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
    public function get_offer() {
       $query = $this->db->query('select offers.*,count(comments.id) as sum_comment,offer_image.image from  offers left join comments on offers.id=comments.produect_id  left join offer_image on offers.id=offer_image.offer_id where offer_image.type="primary" or offer_image.type IS NULL and offers.is_active="on"   group by offers.id order by offers.order limit 10 ');
    $data=$query->result_array();
        return $query->result_array();
          
    }
 public function get_share() {
       
    $query = $this->db->query('select offers.id,offers.likes,offers.shows,offers.name,count(comments.id) as sum_comment,comments.text ,offer_image.image from  offers left join comments on offers.id=comments.offer_id  left join offer_image on offers.id=offer_image.offer_id where offer_image.type="primary" and comments.is_active="on"   group by offers.id limit 5 ');
    $data=$query->result_array();
    
    return $data;
    
}  

   public function remove($id) {
       
    $this->remove_offer_image($id);
    $this->db->where('id',$id);
    $this->db->delete('offers');
    $query = $this->db->query('select * from offers where id= ?',[$id]);
    $data=$query->row_array();
    if ($data==null) {
       return True;
    }
    else{
    return False;
    }
}




public function add($data,$data_image) {

            $this->db->trans_start();
         if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('offers', $data);
             $offer_id=$data['id'];
        } else {
            $this->db->insert('offers', $data);
            $offer_id= $this->db->insert_id();
           
        }
            if(isset($data_image)&& !empty($data_image[1])){
              $this->remove_offer_image($offer_id);
                 foreach ($data_image as  $value) {
                    if(!empty($value)){


                $value[ 'offer_id']=$offer_id;
                $this->add_offer_image($value);
                    }
            }
            }
             $this->db->trans_complete(); 
        if ($this->db->trans_status() === FALSE) {

            $this->db->trans_rollback();
            return FALSE;
        } else {

            $this->db->trans_commit();
            return TRUE;
        }

    
    }

   

    public function add_offer_image($data) {
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('offer_image', $data);
            return $data['id'] ;
        } else {
            $this->db->insert('offer_image', $data);
            return $this->db->insert_id();
        }
    }
public function remove_offer_image($id) {
       
    $this->db->where('offer_id',$id);
    $this->db->delete('offer_image');
    $query = $this->db->query('select * from offers where id= ?',[$id]);
    $data=$query->row_array();
    if ($data==null) {
       return True;
    }
    else{
    return False;
    }
}

}
