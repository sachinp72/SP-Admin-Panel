<?php

class Category extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model("app_model");
    $this->load->library('session');

  }

   public function index(){
      echo "This is sample message from Category Controller";
   }

   public function list_categories() {
    // Example: Retrieve categories from the model
    $categories = $this->app_model->get_resource_data(tbl_categories());

    $data = array(
        "page_content" => "pages/list-categories",
        "categories" => $categories
    );
    $this->load->view("layout/main_layout", $data);
}
}



 ?>
