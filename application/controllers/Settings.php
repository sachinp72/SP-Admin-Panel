<?php

class Settings extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model("app_model");
    $this->load->library('session');

  }

   public function index(){
      echo "This is sample message from Settings Controller";
   }

   public function profile_settings(){

     if($this->session->userdata("is_active") == 1){

       $data = array(
         "page_content" => "pages/profile-settings"
       );
       $this->load->view("layout/main_layout",$data);
     }else{
        $this->load->view("pages/login");
     }
   }

   public function save_profile_data(){

    $email = $this->input->post("txt_email");
    $name = $this->input->post("txt_name");
    $password = $this->input->post("txt_password");

     // config of image upload
     $config["upload_path"] = "./assets/product-image/";
     $config["allowed_types"] = "jpg|png|jpeg|gif";
     $config["max_size"] = 1024;
     $config["max_width"] = 2048;
     $config["max_height"] = 1000;

     $this->load->library("upload",$config);

     $profile_image = "";

     if(isset($_FILES['file_image']) && !empty($_FILES['file_image'])){

       if($this->upload->do_upload("file_image")){

         $file_arr =  $this->upload->data();

         $profile_image = base_url()."assets/product-image/".$file_arr['file_name'];
       }else{
         $display_errors = $this->upload->display_errors();

       }
     }

     $user_info = array(
       "name" => $name,
       "email" => $email,
       "password" =>$password,
       "image" => $profile_image,
     );

     if($this->app_model->edit_resource_data(tbl_user(),$user_info,array("email" => $this->session->userdata("email")))){

       $this->session->set_flashdata("success","Profile updated successfully, To see updated information Signout Please");
     }else{
       $this->session->set_flashdata("error","Failed to update profile");
     }

     return redirect("admin/profile-settings");
   }

   public function currency_settings(){

     if($this->session->userdata("is_active") == 1){

       $currencies = $this->app_model->get_resource_data(tbl_currencies(),array("status" => 1));

       $data = array(
         "page_content" => "pages/currency-settings",
         "currencies" => $currencies
       );
       $this->load->view("layout/main_layout",$data);
      }else{
         $this->load->view("pages/login");
      }
   }

   public function save_currency_settings(){

     $currency = $this->input->post("dd_currency");

     if(!empty($this->app_model->is_option_exists("site_currency"))){

         $this->app_model->update_option_value("site_currency",$currency);
         $this->session->set_flashdata("success","Currency Updated Successfully");
     }else{

         $this->app_model->insert_option_value("site_currency",$currency);
         $this->session->set_flashdata("success","Currency Saved Successfully");
     }

     redirect("admin/currency-settings");
   }

   public function product_image_settings(){

     if($this->session->userdata("is_active") == 1){

       $data = array(
         "page_content" => "pages/product-image-settings"
       );
       $this->load->view("layout/main_layout",$data);
      }else{
         $this->load->view("pages/login");
      }
   }

   public function save_product_image_settings(){

       $width = $this->input->post("txt_width");
       $height = $this->input->post("txt_height");
       $size = $this->input->post("txt_max_size");

       $extensions = $this->input->post("chk_ext");

       $image_settings = array(
         "width" => $width,
         "height" => $height,
         "size" => $size,
         "extensions" => $extensions
       );

       if(!empty($this->app_model->is_option_exists("product_image_settings"))){

           $this->app_model->update_option_value("product_image_settings",serialize($image_settings));
           $this->session->set_flashdata("success","Product Image Settings Updated Successfully");
       }else{

           $this->app_model->insert_option_value("product_image_settings",serialize($image_settings));
           $this->session->set_flashdata("success","Product Image Settings Saved Successfully");
       }

       redirect("admin/product-image-settings");
   }

   public function footer_settings(){

     if($this->session->userdata("is_active") == 1){

       $data = array(
         "page_content" => "pages/footer-settings"
       );
       $this->load->view("layout/main_layout",$data);
      }else{
         $this->load->view("pages/login");
      }
   }

   public function save_footer_settings(){

      $link = $this->input->post("txt_link");
      $name = $this->input->post("txt_name");

      $footer_data = array(
        "link" => $link,
        "name" => $name
      );

      if(!empty($this->app_model->is_option_exists("site_footer_setting"))){

          $this->app_model->update_option_value("site_footer_setting",serialize($footer_data));
          $this->session->set_flashdata("success","Footer Settings Updated Successfully");
      }else{

          $this->app_model->insert_option_value("site_footer_setting",serialize($footer_data));
          $this->session->set_flashdata("success","Footer Settings Saved Successfully");
      }

      redirect("admin/footer-settings");
   }

}

 ?>
