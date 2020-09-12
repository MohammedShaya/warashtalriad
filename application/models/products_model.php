<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class products_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }



    public function get($id=null) {
        $this->db->select()->from('products');
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


   public function remove($id) {
       
    $this->remove_prodect_image($id);
    $this->db->where('id',$id);
    $this->db->delete('products');
    $query = $this->db->query('select * from products where id= ?',[$id]);
    $data=$query->row_array();
    if ($data==null) {
       return True;
    }
    else{
    return False;
    }
}
  public function get_all() {
       
    $query = $this->db->query('select name,id from groups');
    $data=$query->result_array();
    $d=[];
    foreach ($data as $key => $value) {
        # code...
    $q = $this->db->query('select count(comments.id) as sum_comment, products.* ,product_image.image  from  products left join comments on products.id=comments.produect_id left join groups on   products.group_id=groups.id left join product_image on products.id=product_image.product_id where product_image.type="primary" or product_image.type IS NULL and products.group_id=?  group by products.id  ',[$value['id']]);
    $value['produect']=$q->result_array();
    $d[]=$value;
    }
   
    return $d;
    
}
 public function get_share() {
       
    $query = $this->db->query('select products.id,products.likes,products.shows,products.name,count(comments.id) as sum_comment,comments.text, groups.name as group_name ,product_image.image from  products left join comments on products.id=comments.produect_id left join groups on   products.group_id=groups.id left join product_image on products.id=product_image.product_id where product_image.type="primary" and comments.is_active="on"   group by products.id limit 5 ');
    $data=$query->result_array();
    
    return $data;
    
}  
 public function get_last() {
       
    $query = $this->db->query('select products.*,count(comments.id) as sum_comment, groups.name as group_name ,product_image.image from  products left join comments on products.id=comments.produect_id left join groups on   products.group_id=groups.id left join product_image on products.id=product_image.product_id where product_image.type="primary" or product_image.type IS NULL and products.is_active="on"   group by products.id order by products.shows limit 5 ');
    $data=$query->result_array();
    
    return $data;
    
}  
public function get_all_with_images($id) {
       
    $query = $this->db->query('select products.*,count(comments.id) as sum_comment, groups.name as group_name  from  products left join comments on products.id=comments.produect_id left join groups on   products.group_id=groups.id  where  groups.id=? and products.is_active="on"   group by products.id 
    ORDER BY `products`.`order` ASC limit 10',[$id]);
    $data=$query->result_array();
    $d=[];
    foreach ($data as $key => $value) {
        if ($value['is_active']) {
            $q = $this->db->query('select * from product_image where product_image.product_id =?   ', [$value['id']]);
            $value['images']=$q->result_array();
            $d[$key]=$value;
        }
    }
   
    return $d;
    
} 
public function get_all_with_search($search) {
       
    $query = $this->db->query('select products.*,count(comments.id) as sum_comment, groups.name as group_name  from  products left join comments on products.id=comments.produect_id left join groups on   products.group_id=groups.id  where  groups.name like ? or products.name like ? or  products.description like  ?   and products.is_active="on"   group by products.id 
    ORDER BY `products`.`order` ASC limit 10',[
        '%'.$search.'%',
        '%'.$search.'%',
        '%'.$search.'%',
        ]);
    $data=$query->result_array();
    $d=[];
    foreach ($data as $key => $value) {
        if ($value['is_active']) {
            $q = $this->db->query('select * from product_image where product_image.product_id =?   ', [$value['id']]);
            $value['images']=$q->result_array();
            $d[$key]=$value;
        }
    }
   
    return $d;
    
} 
public function get_info($id) {
       
    $query = $this->db->query('select products.*,count(comments.id) as sum_comment, groups.name as group_name  from  products left join comments on products.id=comments.produect_id left join groups on   products.group_id=groups.id  where  products.id=? and products.is_active="on"   group by products.id 
    ORDER BY `products`.`order` ASC limit 10',[$id]);
    $data=$query->result_array();
 $d=[];
    foreach ($data as $key => $value) {
        if ($value['is_active']) {
            $q = $this->db->query('select * from product_image where product_image.product_id =?   ', [$value['id']]);
            $value['images']=$q->result_array();
            $commend = $this->db->query('select * from comments where produect_id =? and is_active="on"   ORDER BY created_at DESC  limit 10', [$value['id']]);
            $value['commends']=$commend->result_array();
            $d[$key]=$value;
        }
    }
   if($d[0]){
       return $d[0];
    }else{
        return $d;

   }
    
} 
public function get_count() {
       
    $query = $this->db->query('select groups.id,groups.name as group_name ,IFnull(count(products.id),0) as sum from groups  left join products  on  groups.id=products.group_id group by group_name ');
    $data=$query->result_array();
    
    return $data;
    
}
public function product_image() {
       
    $query = $this->db->query('select image from product_image ');
    $data=$query->result_array();
    
    return $data;
    
}


public function add_likes($id){
    if($id){
        $this->db->query('UPDATE `products` SET `likes`=likes+1 WHERE id=?',[$id]);
    }
}
public function add_shows($id){
    if($id){
        $this->db->query('UPDATE `products` SET `shows`=shows+1 WHERE id=?',[$id]);
    }
}

public function add($data,$data_image) {

            $this->db->trans_start();
         if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('products', $data);
             $product_id=$data['id'];
        } else {
            $this->db->insert('products', $data);
            $product_id= $this->db->insert_id();
           
        }
            if(isset($data_image)&& !empty($data_image[1])){
              $this->remove_prodect_image($product_id);
                 foreach ($data_image as  $value) {
                    if(!empty($value)){


                $value[ 'product_id']=$product_id;
                $this->add_prodect_image($value);
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

   

    public function add_prodect_image($data) {
        if (isset($data['id'])) {
            $this->db->where('id', $data['id']);
            $this->db->update('product_image', $data);
            return $data['id'] ;
        } else {
            $this->db->insert('product_image', $data);
            return $this->db->insert_id();
        }
    }
public function remove_prodect_image($id) {
       
    $this->db->where('product_id',$id);
    $this->db->delete('product_image');
    $query = $this->db->query('select * from products where id= ?',[$id]);
    $data=$query->row_array();
    if ($data==null) {
       return True;
    }
    else{
    return False;
    }
}

}