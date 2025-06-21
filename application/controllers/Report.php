<?php

class Report extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model("app_model");
    $this->load->library('session');

  }

   public function index(){
      echo "This is sample message from Report Controller";
   }

   public function report_dashbord(){

     if($this->session->userdata("is_active") == 1){

       $products = $this->app_model->get_resource_data(tbl_products());
       $buyers = $this->app_model->get_resource_data(tbl_buyers());

       $data = array(
         "page_content" => "pages/reports-dashboard",
         "product" => count($products),
         "orders" => count($buyers)
       );
       $this->load->view("layout/main_layout",$data);
      }else{
         $this->load->view("pages/login");
      }
   }

}

 ?>
