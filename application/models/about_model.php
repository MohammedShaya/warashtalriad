<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class about_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }



    public function get($id=null) {
        $this->db->select()->from('about');
        if ($id!=null) {
        $this->db->where('id',$id);
        $this->db->order_by('order');
        }
        $query = $this->db->get();
       
        if ($id!=null) {
            $q = $this->db->query('select * from about_point where about_id= ? order by order_',[$id]);
            $data=$q->result_array();
            $resualt= $query->row_array();
            $resualt['points']=$data;
        } else {
            $resualt= $query->result_array();
            foreach ($resualt as $key => $value) {
                $q = $this->db->query('select * from about_point where about_id= ? order by order_',[$value['id']]);
                $data=$q->result_array();
                $value['points']=$data;
                $resualt[$key]=$value;
            }
          
        }
        
        return $resualt;
    }


   public function remove($id) {
       
    $this->remove_about_point($id);
    $this->db->where('id',$id);
    $this->db->delete('about');
    $query = $this->db->query('select * from about where id= ?',[$id]);
    $data=$query->row_array();
    if ($data==null) {
       return True;
    }
    else{
    return False;
    }
}




public function add($data,$data_point) {

            $this->db->trans_start();
         if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('about', $data);
             $about_id=$data['id'];
        } else {
            $this->db->insert('about', $data);
            $about_id= $this->db->insert_id();
           
        }
            if(isset($data_point)&& !empty($data_point)){
              $this->remove_about_point($about_id);
                 foreach ($data_point as  $value) {
                    if(!empty($value)){


                $value['about_id']=$about_id;
                $this->add_about_point($value);
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

   

    public function add_about_point($data) {
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('about_point', $data);
            return $data['id'] ;
        } else {
            $this->db->insert('about_point', $data);
            return $this->db->insert_id();
        }
    }
public function remove_about_point($id) {
       
    $this->db->where('about_id',$id);
    $this->db->delete('about_point');
    $query = $this->db->query('select * from about where id= ?',[$id]);
    $data=$query->row_array();
    if ($data==null) {
       return True;
    }
    else{
    return False;
    }
}

}
