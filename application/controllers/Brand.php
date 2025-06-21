<?php

class Brand extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model("app_model");
    $this->load->library('session');

  }

   public function index(){
      echo "This is sample message from Brand Controller";
   }

   public function list_brands(){

     if($this->session->userdata("is_active") == 1){

       $brands = $this->app_model->get_resource_data(tbl_brands());
       $categories = $this->app_model->get_resource_data(tbl_categories(),array("status" => 1));

       $data = array(
         "page_content" => "pages/list-brands",
         "brands" => $brands,
         "categories" => $categories,
         "brand_controller" => $this
       );
       $this->load->view("layout/main_layout",$data);
     }
      else{
         $this->load->view("pages/login");
      }
   }

   public function get_category_name($category_id){

     return $this->app_model->get_category_name_by_id($category_id);
   }

}

 ?>
