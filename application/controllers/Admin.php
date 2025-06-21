<?php

class Admin extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model("app_model");
    // Ensure that session is loaded before using it
    $this->load->library('session');
  }

  public function index() {
        if ($this->session->userdata("is_active") == 1) {
            $categories = $this->app_model->get_resource_data(tbl_categories());
      $brands = $this->app_model->get_resource_data(tbl_brands());
      $products = $this->app_model->get_resource_data(tbl_products());
      $buyers = $this->app_model->get_resource_data(tbl_buyers());

      // Prepare the data to send to the dashboard view
      $data = array(
        "page_content" => "pages/dashboard",
        "categories" => count($categories),
        "brands" => count($brands),
        "products" => count($products),
        "orders" => count($buyers)
      );
      $this->load->view("layout/main_layout", $data);
        } else {
            $this->load->view("pages/login");
        }
    }


 public function login() {
    // Get form input
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    // Validate form input
    if (empty($email) || empty($password)) {
        $this->session->set_flashdata('error', 'Email and password are required.');
        redirect('admin');
    }

    $user = $this->app_model->get_admin_by_email($email);

    if ($user && $password === $user->password){
        $this->session->set_userdata([
            'is_active' => 1,
            'email' => $email,
            'name' => $user->name,  
            'image' => $user->image 
        ]);

        redirect(base_url()); 
    } else {
   
        $this->session->set_flashdata('error', 'Invalid email or password.');
        redirect('admin'); // Redirect back to login page with error message
    }
}



  public function user_logout() {
    $this->session->sess_destroy();
    redirect('admin');
  }
}

?>
