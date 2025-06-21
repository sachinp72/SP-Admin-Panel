<?php

class Product extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("app_model");
        $this->load->library('session');
    }

    public function index() {
        echo "This is sample message from Product Controller";
    }

    public function list_products($report = "") {
        if ($this->session->userdata("is_active") == 1) {

            $rpt = 0;
            if (!empty($report)) {
                $rpt = 1;
            }

            $products = $this->app_model->get_resource_data(tbl_products());

            $data = array(
                "page_content" => "pages/list-products",
                "products" => $products,
                "product_controller" => $this,
                "report" => $rpt
            );
            $this->load->view("layout/main_layout", $data);
        } else {
            $this->load->view("pages/login");
        }
    }

    public function get_category_name($category_id) {
        return $category_info = $this->app_model->get_category_name_by_id($category_id);
    }

    public function get_brand_name($brand_id) {
        return $brand_info = $this->app_model->get_brand_name_by_id($brand_id);
    }

    public function edit_product_layout($product_id) {
        if ($this->session->userdata("is_active") == 1) {

            $categories = $this->app_model->get_resource_data(tbl_categories(), array("status" => 1));
            $brands = $this->app_model->get_resource_data(tbl_brands(), array("status" => 1));
            $product_info = $this->app_model->get_resource_data(tbl_products(), array("id" => $product_id));

            $data = array(
                "page_content" => "pages/edit-product",
                "categories" => $categories,
                "product" => $product_info[0],
                "brands" => $brands
            );
            $this->load->view("layout/main_layout", $data);
        } else {
            $this->load->view("pages/login");
        }
    }

    public function add_product_layout() {
        if ($this->session->userdata("is_active") == 1) {

            $categories = $this->app_model->get_resource_data(tbl_categories(), array("status" => 1));
            $product = $this->app_model->get_resource_data(tbl_brands(), array("status" => 1));

            $data = array(
                "page_content" => "pages/add-product",
                "categories" => $categories,
                "product" => $product
            );
            $this->load->view("layout/main_layout", $data);
        } else {
            $this->load->view("pages/login");
        }
    }

    public function submit_add_product() {
        $data = $this->input->post();

        $category_id = $data['dd_add_product_category'];
        $brand_id = $data['dd_add_product_brand'];
        $product_name = $data['txt_name'];
        $description = $data['txt_description'];
        $amount = $data['txt_amount'];
        $status = $data['dd_status'];
        $opt_type = $data['opt_type'];

        $max_size = 1024;
        $max_width = 2048;
        $max_height = 1000;
        $allowed_types = "jpg|png|jpeg|gif";

        $image_attributes = get_option_value("product_image_settings");
        if (!empty($image_attributes)) {
            $image_attributes = unserialize($image_attributes);

            $max_width = $image_attributes['width'];
            $max_height = $image_attributes['height'];
            $max_size = $image_attributes['size'];
            $allowed_types = implode("|", $image_attributes['extensions']);
        }

        // config of image upload
        $config["upload_path"] = "./assets/product-image/";
        $config["allowed_types"] = $allowed_types;
        $config["max_size"] = $max_size;
        $config["max_width"] = $max_width;
        $config["max_height"] = $max_height;

        $this->load->library("upload", $config);

        $product_image = "";

        if ($opt_type == "add") {
            // for add operation
            if (isset($_FILES['file_image']) && !empty($_FILES['file_image'])) {
                if ($this->upload->do_upload("file_image")) {
                    $file_arr =  $this->upload->data();
                    $product_image = base_url() . "assets/product-image/" . $file_arr['file_name'];
                } else {
                    $display_errors = $this->upload->display_errors();
                }
            }

            $products_arr = array(
                "name" => $product_name,
                "description" => $description,
                "brand_id" => $brand_id,
                "category_id" => $category_id,
                "amount" => $amount,
                "image" => $product_image,
                "status" => $status
            );

            if ($this->app_model->save_resource_data(tbl_products(), $products_arr)) {
                $this->session->set_flashdata("success", "Product saved successfully");
            } else {
                $this->session->set_flashdata("error", "Failed to save product");
            }

            return redirect("admin/product/add-product");
        } elseif ($opt_type == "edit") {
            // edit function
            $edit_id = $data['edit_id'];

            $product_image = "";

            if (isset($_FILES['file_image']) && !empty($_FILES['file_image'])) {
                if ($this->upload->do_upload("file_image")) {
                    $file_arr =  $this->upload->data();
                    $product_image = base_url() . "assets/product-image/" . $file_arr['file_name'];
                } else {
                    $display_errors = $this->upload->display_errors();
                }
            }

            if (!empty($product_image)) {
                $products_arr = array(
                    "name" => $product_name,
                    "description" => $description,
                    "brand_id" => $brand_id,
                    "category_id" => $category_id,
                    "amount" => $amount,
                    "image" => $product_image,
                    "status" => $status
                );
            } else {
                $products_arr = array(
                    "name" => $product_name,
                    "description" => $description,
                    "brand_id" => $brand_id,
                    "category_id" => $category_id,
                    "amount" => $amount,
                    "status" => $status
                );
            }

            if ($this->app_model->edit_resource_data(tbl_products(), $products_arr, array("id" => $edit_id))) {
                $this->session->set_flashdata("success", "Product updated successfully");
            } else {
                $this->session->set_flashdata("error", "Failed to update product");
            }

            return redirect("admin/product/edit-product/" . $edit_id);
        }
    }


    public function delete_product($product_id) {
    // Validate the product_id (e.g., ensure it's a valid integer)
    $result = $this->app_model->delete_product_detail($product_id);

    if ($result) {
        // If delete was successful, set success message
        $this->session->set_flashdata('success', 'Product deleted successfully!');
        echo json_encode(['success' => true]);
    } else {
        // If delete failed, set error message
        $this->session->set_flashdata('error', 'Failed to delete Product.');
        echo json_encode(['error' => 'Failed to delete Product.']);
    }
}


}
?>
