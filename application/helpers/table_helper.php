<?php

// functions that returns table names

if(!function_exists("tbl_brands")){

  function tbl_brands(){
    return "tbl_brands";
  }
}

if(!function_exists("get_option_value")){

  function get_option_value($option_name){

    $ci = & get_instance();
    $ci->db->select("option_value"); // $this->db->select();
    $ci->db->from(tbl_options());
    $ci->db->where("option_name", $option_name);
    $query = $ci->db->get();
    $row_value = $query->row();

    return isset($row_value->option_value) ? $row_value->option_value : "";
  }
}

if(!function_exists("tbl_buyers")){

  function tbl_buyers(){
    return "tbl_buyers";
  }
}

if(!function_exists("tbl_categories	")){

  function tbl_categories	(){
    return "tbl_categories";
  }
}

if(!function_exists("tbl_currencies")){

  function tbl_currencies(){
    return "tbl_currencies";
  }
}

if(!function_exists("tbl_options")){

  function tbl_options(){
    return "tbl_options";
  }
}

if(!function_exists("tbl_orders")){

  function tbl_orders(){
    return "tbl_orders";
  }
}

if(!function_exists("tbl_products")){

  function tbl_products(){
    return "tbl_products";
  }
}

if(!function_exists("tbl_user")){

  function tbl_user(){
    return "tbl_user";
  }
}

 ?>
