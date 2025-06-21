<?php

class App_model extends CI_Model{

 public function get_admin_details($email) {
    // Get the admin details by email
    $this->db->select("*");
    $this->db->from(tbl_user());  // Ensure this is the correct table name
    $this->db->where("email", $email);
    $query = $this->db->get();
    return $query->row();  // Return the first matching result
}

public function is_admin_exists($email, $password) {
    // Fetch admin data by email
    $this->db->select("*");
    $this->db->from(tbl_user());  // Ensure the correct table name
    $this->db->where("email", $email);
    $query = $this->db->get();
    $result = $query->row();

    // If user exists and password matches (verify hashed password)
    if ($result && password_verify($password, $result->password)) {
        return true;
    }
    return false;
}


  public function get_admin_by_email($email){
  $this->db->select("*");
  $this->db->from(tbl_user());
  $this->db->where("email", $email);
  $query = $this->db->get();
  return $query->row();  // Return admin data if found
}

  public function get_category_data($category_id){

    $this->db->select("*");
    $this->db->from(tbl_categories());
    $this->db->where("id",$category_id);
    $query = $this->db->get();
    return $query->row();
  }

  public function is_option_exists($option_name){

    $this->db->select("*");
    $this->db->from(tbl_options());
    $this->db->where([
      "option_name" => $option_name
    ]);
    $query = $this->db->get();
    return $query->row();
  }

  public function update_option_value($option_name, $option_value){

    $this->db->where("option_name", $option_name);
    $this->db->update(tbl_options(),array(
      "option_value" => $option_value
    ));
    return true;
  }

  public function insert_option_value($option_name, $option_value){

      $this->db->insert(tbl_options(),array(
        "option_name" => $option_name,
        "option_value" => $option_value
      ));
      return true;
  }

  public function get_resource_data($tbl_name,$conditions = array()){

    $this->db->select("*");
    $this->db->from($tbl_name);
    if(!empty($conditions)){
      $this->db->where($conditions);
    }
    $query = $this->db->get();
    return $query->result();
  }

  public function edit_resource_data($tbl_name, $data, $conditions){

    $this->db->where($conditions);
    $result = $this->db->update($tbl_name,$data);

    return true;
  }


  public function delete_resource_data($tbl_name,$conditions){

    $this->db->delete($tbl_name,$conditions);
    return true;
  }

  public function save_resource_data($tbl_name,$data = array()){

      $this->db->insert($tbl_name, $data);

      return true;
  }

  public function get_order_products_list($buyer_id){

    $this->db->select("product.name,product.amount,order.quantity,order.total_amount");
    $this->db->from(tbl_orders()." as order");
    $this->db->join(tbl_products()." as product ","product.id = order.product_id","inner");
    $this->db->where([
      "order.buyer_id" => $buyer_id
    ]);
    $query = $this->db->get();
    return $query->result();
  }

  public function get_order_products($buyer_id){

    $this->db->select("SUM(quantity) as total_products, SUM(total_amount) as total_amount");
    $this->db->from(tbl_orders());
    $this->db->where([
      "buyer_id" => $buyer_id
    ]);

    $query = $this->db->get();
    return $query->row();
  }

  public function save_orders($tbl_name,$data = array()){

      $this->db->insert_batch($tbl_name, $data);

      return true;
  }

  public function buyer_information_data($tbl_name,$data = array()){

      $this->db->insert($tbl_name, $data);

      return $insert_id = $this->db->insert_id();
  }

  public function get_brand_data($brand_id){

    $this->db->select("*");
    $this->db->from(tbl_brands());
    $this->db->where("id",$brand_id);
    $query = $this->db->get();
    return $query->row();
  }




//-----------------------------


 public function get_category_name_by_id($category_id) {
    $this->db->select("id, name, status");
    $this->db->from(tbl_categories());
    $this->db->where(["id" => $category_id]);
    $query = $this->db->get();
    return $query->row();
}

public function update_category($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update(tbl_categories(), $data);
}

public function delete_category($category_id) {
    $this->db->where('id', $category_id);
    return $this->db->delete(tbl_categories());
}

 public function get_brand_name_by_id($id) {
    $this->db->select("*");
    $this->db->from(tbl_brands());
    $this->db->where(["id" => $id]);
    $query = $this->db->get();
    return $query->row();
}

// public function update_brand($id,$data) {
//     $this->db->where('id', $id);
//     $this->db->set($data);
//     return $this->db->update(tbl_brands(), $data);
// }

public function delete_brands($brand_id) {
    $this->db->where('id', $brand_id);
    return $this->db->delete(tbl_brands());
}

    public function update_brand($id, $data) {
        // Ensure $id and $data are not empty
        if (empty($id) || empty($data)) {
            return false;
        }

        // Update the brand in the database
        $this->db->where('id', $id);
        $this->db->update('brands', $data);  // Assuming the table name is 'brands'

        // Check if the update was successful
        if ($this->db->affected_rows() > 0) {
            return true;  // Successfully updated
        } else {
            return false; // Update failed (could be due to no changes or invalid id)
        }
    }


    public function get_all_products() {
        // Assuming you have a 'products' table with columns 'id' and 'name'
        $this->db->select('id, name');
        $query = $this->db->get('products');
        
        if ($query->num_rows() > 0) {
            return $query->result();  // Returns an array of products
        }

        return false;  // No products found
    }

    /**
     * Get product by ID.
     */
    public function get_product_by_id($product_id) {
        // Assuming you have a 'products' table with columns 'id', 'name', 'price', etc.
        $this->db->select('id, name, price');
        $this->db->where('id', $product_id);
        $query = $this->db->get('tbl_products');

        if ($query->num_rows() > 0) {
            return $query->row();  // Return the product object
        }

        return false;  // Product not found
    }

    //orders

   public function get_brands_by_category($cat_id) {
    $this->db->select('id, name');  // Assuming 'id' and 'name' are the columns for brands
    $this->db->from('tbl_brands');
    $this->db->where('category_id', $cat_id);  // Ensure this is correct
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result_array();  // Return brands if found
    } else {
        return false;  // Return false if no brands found
    }
}

public function get_products_by_category_and_brand($category_id, $brand_id) {
    $this->db->select('id, name');  // Select product id and name
    $this->db->from('tbl_products');
    $this->db->where('category_id', $category_id);  // Filter by category_id
    $this->db->where('brand_id', $brand_id);  // Filter by brand_id
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->result_array();  // Return products if found
    } else {
        return false;  // No products found
    }
}

public function get_product_details($product_id) {
    $this->db->select('id, name, amount');  // Select product id, name, and price
    $this->db->from('tbl_products');
    $this->db->where('id', $product_id);  // Filter by product_id
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        return $query->row_array();  // Return product details
    } else {
        return false;  // No product found
    }
}


public function get_products_by_brand($brand_id) {
    return $this->db->get_where('products', ['brand_id' => $brand_id, 'status' => 1])->result();
}

public function delete_invoie_detail($buyer_id) {
    // Use buyer_id to delete from the buyers table
    $this->db->where('id', $buyer_id);
    return $this->db->delete(tbl_buyers()); // Ensure that 'tbl_buyers()' is the correct table name.
}

public function delete_product_detail($product_id) {
    // Use product_id to delete from the products table
    $this->db->where('id', $product_id);
    return $this->db->delete(tbl_products()); // Ensure that 'tbl_products()' is the correct table name
}



}


 ?>
