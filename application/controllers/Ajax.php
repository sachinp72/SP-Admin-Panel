<?php

class Ajax extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model("app_model");
    $this->load->library('session');

  }

   public function index(){
      echo "This is sample message from Ajax Controller";
   }

   public function category_insert() {
   
    $data = array(
        'name' => $this->input->post('name'),   
        'status' => $this->input->post('status') 
    );

  
    $insert = $this->app_model->save_resource_data('tbl_categories', $data); 

    if ($insert) {
        $this->session->set_flashdata('success', 'Category successfully inserted.');
        $response = ['status' => 'success', 'success' => 'Category successfully inserted.'];
    } else {
        $response = ['status' => 'error', 'success' => 'Failed to insert category.'];
    }
    echo json_encode($response);
}


public function get_category($category_id) {
    $data = $this->app_model->get_category_name_by_id($category_id);
    if ($data) {
        echo json_encode($data);
    } else {
        echo json_encode(['error' => 'Category not found']);
    }
}

public function update_category() {

    $id = $this->input->post('id');
    $name = $this->input->post('name');
    $status = $this->input->post('status');

    $data = [
        'name' => $name,
        'status' => $status
    ];

   if ($id) {
        
        $result = $this->app_model->update_category($id, $data);
    } else {
        
        $result = $this->app_model->save_resource_data($data);
    }

    if ($result) {
        $this->session->set_flashdata('success', 'Category updated successfully!');
        echo json_encode(['success' => true]);
    } else {
        $this->session->set_flashdata('error', 'Failed to update category.');
        echo json_encode(['error' => 'Failed to update category.']);
    }
}


public function delete_category($category_id) {
        $result = $this->app_model->delete_category($category_id); 

        if ($result) {
           $this->session->set_flashdata('success', 'Category deleted successfully!');
            echo json_encode(['success' => true]);
        } else {
           $this->session->set_flashdata('error', 'Failed to delete category.');
            echo json_encode(['error' => 'Failed to delete category.']);
        }
    }



// Insert Brand

public function brand_insert() {
    $data = array(
        'category_id' => $this->input->post('dd_category'), // Ensure correct key
        'name' => $this->input->post('name'),
        'status' => $this->input->post('status')
    );

    $insert = $this->app_model->save_resource_data('tbl_brands', $data); 

    if ($insert) {
        $this->session->set_flashdata('message', 'Brand successfully inserted.');
        $response = ['status' => 'success', 'success' => 'Brand successfully inserted.'];
    } else {
        $response = ['status' => 'error', 'success' => 'Failed to insert Brand.'];
    }
    echo json_encode($response);
}

// get brand data

public function get_brands($id) {
    $data = $this->app_model->get_brand_name_by_id($id);
    if ($data) {
        echo json_encode($data);
    } else {
        echo json_encode(['error' => 'Brand not found']);
    }
}

//update brand

public function update_brands() {
    // Get POST data
    $id = $this->input->post('id');
    $category_id = $this->input->post('category_id');
    $name = $this->input->post('name');
    $status = $this->input->post('status');

    
    // Prepare data for updating
    $data = [
         'id' => $id,
        'category_id' => $category_id,
        'name' => $name,
        'status' => $status
    ];


       $result = $this->app_model->update_brand($id, $data);

    if ($result) {
        $this->session->set_flashdata('success', 'Brand updated successfully!');
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['error' => 'Failed to update Brand.']);
    }
}




// delete brand 

public function delete_brand($brand_id) {
        $result = $this->app_model->delete_brands($brand_id); 

        if ($result) {
           $this->session->set_flashdata('success', 'Brand deleted successfully!');
            echo json_encode(['success' => true]);
        } else {
           $this->session->set_flashdata('error', 'Failed to delete Brand.');
            echo json_encode(['error' => 'Failed to delete Brand.']);
        }
    }

      public function get_products() {
        // Fetch products from the database
        $products = $this->inventory_model->get_all_products();

        if ($products) {
            // Prepare response data
            $response = [
                'status' => 'success',
                'arr' => [
                    'data' => $products
                ]
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'No products found'
            ];
        }

        // Output the response in JSON format
        echo json_encode($response);
    }

    /**
     * Get product details (price, amount) based on product_id.
     */
    public function get_product_information() {
    // Get the product_id from POST data
    $product_id = $this->input->post('product_id');

    // Validate the product ID
    if (!$product_id) {
        echo json_encode(['status' => 'error', 'success' => 'Product ID is required']);
        return;
    }

    // Fetch product information from the database
    $product = $this->inventory_model->get_product_by_id($product_id);

    if ($product) {
        // Prepare response data
        $response = [
            'status' => 'success',
            'arr' => [
                'data' => [
                    'amount' => $product->price,  // Assuming 'price' is the field for the product's amount
                    'name' => $product->name,     // Product name
                    'quantity' => 1,              // Default quantity
                    'total_amount' => $product->price * 1  // Calculate total_amount (price * quantity)
                ]
            ]
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Product not found'
        ];
    }

    // Output the response in JSON format
    echo json_encode($response);
}



}

 ?>
