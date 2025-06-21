<?php

class Order extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model("app_model");
    $this->load->library('session');

  }

   public function index(){
      echo "This is sample message from Order Controller";
   }

   public function list_orders($report = ""){

     if($this->session->userdata("is_active") == 1){

       $rpt = 0;
       if(!empty($report)){
         $rpt = 1;
       }

       $buyers = $this->app_model->get_resource_data(tbl_buyers());

       $data = array(
         "page_content" => "pages/list-orders",
         "buyers" => $buyers,
         "order_controller" => $this,
         "report" => $rpt
       );
       $this->load->view("layout/main_layout",$data);
     }else{
        $this->load->view("pages/login");
     }
   }

   public function invoice_detail_page_layout($buyer_id){

     if($this->session->userdata("is_active") == 1){

       $buyer = $this->app_model->get_resource_data(tbl_buyers(),array("status" => 1,"id" => $buyer_id));
       $buyer = isset($buyer[0]) ? $buyer[0] : array();
       $products = $this->app_model->get_order_products_list($buyer_id);

       $data = array(
         "page_content" => "pages/invoice-details",
         "buyer" => $buyer,
         "products" => $products
       );
       $this->load->view("layout/main_layout",$data);
     }else{
        $this->load->view("pages/login");
     }
   }


   public function delete_invoice($buyer_id) {
    // Validate the buyer_id and make sure it's a number or valid input
    $result = $this->app_model->delete_invoie_detail($buyer_id);

    if ($result) {
        // If delete was successful, set success message
        $this->session->set_flashdata('success', 'Invoice deleted successfully!');
        echo json_encode(['success' => true]);
    } else {
        // If delete failed, set error message
        $this->session->set_flashdata('error', 'Failed to delete Invoice.');
        echo json_encode(['error' => 'Failed to delete Invoice.']);
    }
}


   public function get_buyer_product_info($buyer_id){

     return $this->app_model->get_order_products($buyer_id);
   }

   public function add_order_layout(){

     if($this->session->userdata("is_active") == 1){

       $categories = $this->app_model->get_resource_data(tbl_categories(),array("status" => 1));
       $brand = $this->app_model->get_resource_data(tbl_brands(),array("status" => 1));
       $Product = $this->app_model->get_resource_data(tbl_products(),array("status" => 1));

       $data = array(
         "page_content" => "pages/add-order",
         "categories" => $categories,
         "brand" => $brand,
         "product" => $Product
      
       );
       $this->load->view("layout/main_layout",$data);
     }else{
        $this->load->view("pages/login");
     }
   }

   public function populate_brand() {
    $action = $this->input->post('action');
    //log_message('debug', 'Action received: ' . $action);

    switch ($action) {
        case 'list_order_category_brands':
            $cat_id = $this->input->post('cat_id');
 

            if (!$cat_id) {
                echo json_encode(['success' => false, 'message' => 'Category ID is missing']);
                return;
            }

            $brands = $this->app_model->get_brands_by_category($cat_id);
        

            if ($brands) {
                echo json_encode(['success' => true, 'arr' => ['data' => $brands]]);
            } else {
                echo json_encode(['success' => false, 'message' => 'No brands found']);
            }
            break;

        default:
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
            break;
    }
}

public function populate_product() {
    $action = $this->input->post('action');

    switch ($action) {
        case 'list_order_category_products':
            $cat_id = $this->input->post('cat_id');
            $brand_id = $this->input->post('brand_id');

            if (!$cat_id || !$brand_id) {
                echo json_encode(['success' => false, 'message' => 'Category ID or Brand ID is missing']);
                return;
            }

            // Fetch products based on category and brand
            $products = $this->app_model->get_products_by_category_and_brand($cat_id, $brand_id);

            if ($products) {
                echo json_encode(['success' => true, 'arr' => ['data' => $products]]);
            } else {
                echo json_encode(['success' => false, 'message' => 'No products found']);
            }
            break;

        default:
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
            break;
    }
}

public function get_product_details() {
    $action = $this->input->post('action');
    
    switch ($action) {
        case 'get_product_details':
            $product_id = $this->input->post('product_id');
            
            if (!$product_id) {
                echo json_encode(['success' => false, 'message' => 'Product ID is missing']);
                return;
            }

            // Fetch product details based on product_id
            $product = $this->app_model->get_product_details($product_id);

            if ($product) {
                echo json_encode(['success' => true, 'product' => $product]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Product not found']);
            }
            break;

        default:
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
            break;
    }
}





   public function submit_created_order(){
       //print_r($this->input->post());
       $email = $this->input->post("txt_email");
       $name = $this->input->post("txt_name");
       $mobile = $this->input->post("mobile");
       $address = $this->input->post("txt_address");
       $discount = $this->input->post("txt_discount");
       $pay_mode = $this->input->post("dd_payment_mode");
       $status = $this->input->post("dd_status");

       $products = $this->input->post("dd_order_product");
       $quantity = $this->input->post("quantity");
       $total_amount = $this->input->post("total_amount");

       $buyer_information = array(
         "name" => $name,
         "email" => $email,
         "address" => $address,
         "mobile" => $mobile,
         "discount_percentage" => $discount,
         "payment_mode" => $pay_mode,
         "status" => $status
         //"quantity" => $quantity

       );
       //$Product = $this->app_model->get_resource_data(tbl_products(),array("status" => 1));
       //$amount = $product['amount'] * $quantity;
       
       //echo json_encode(['amount' => $amount]);
       $buyer_id = $this->app_model->buyer_information_data(tbl_buyers(),$buyer_information);

       if($buyer_id > 0){

           $products_array = array();

           if(count($products) > 0){

             foreach($products as $index => $product){

               $products_array[] = array(
                 "buyer_id" => $buyer_id,
                 "product_id" => $product,
                 "quantity" => $quantity,
                 "total_amount" => $total_amount,
                 "status" => $status,
               );
             }

             if($this->app_model->save_orders(tbl_orders(),$products_array)){

               $this->session->set_flashdata("success","Order has been created");
             }else{

               $this->session->set_flashdata("error","Failed to create order");
             }

             return redirect("admin/order/add-order");
           }
       }
   }

}

 ?>
