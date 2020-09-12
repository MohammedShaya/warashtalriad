<?php
define('THEMES_DIR', 'themes');

define('BASE_URI', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));

class MY_Controller extends CI_Controller
{

    protected $langs = array();

    public function __construct()
    {

        parent::__construct();
        $this->load->library('auth');
        $this->load->library('rbac');
        $this->load->helper('directory');
        
        $language = "Arabic";
        $lang_array = array('form_validation_lang');
        $map        = directory_map(APPPATH . "./language/" . $language . "/app_files");
        foreach ($map as $lang_key => $lang_value) {
            $lang_array[] = 'app_files/' . str_replace(".php", "", $lang_value);
        }

        $this->load->language($lang_array, $language);

       
    }
    public function load_view($html='',$data='')
    {
        $this->load->view('layout/header');
        $this->load->view($html,$data);
        $this->load->view('layout/footer');
}

  public function load_view_site($html=null,$data=null)
    {
     $data['navbar']=$this->groups_model->get_navbar();
     $data['offer']=$this->offers_model->get_offer();
     $data['about']=$this->about_model->get();
     $data['produect_last']=$this->products_model->get_last();
     $data['product_image']=$this->products_model->product_image();
     $data['produect']=$this->products_model->get_all();
     $data['count']=$this->products_model->get_count();
     $data['share_command']=$this->comments_model->get_share();
     $data['ads']=$this->ads_model->get_share();
     $data['basic_info']=$this->basic_info_model->get();
     $data['social_media']=$this->social_media_model->get_all();
    
      $this->load->view('layout/site/header',$data);
      $this->load->view('layout/site/navbar');
      $this->load->view($html,$data);
      $this->load->view('layout/site/footer');
    }

}









   



