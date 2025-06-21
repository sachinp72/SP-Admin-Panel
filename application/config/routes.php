<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin/validate-login'] = "admin/validate_login_details";
// routes for admin menus
$route["admin/dashboard"] = "admin/dashboard_view";
$route["admin/categories"] = "category/list_categories";
$route["admin/brands"] = "brand/list_brands";

$route["admin/products"] = "product/list_products";
$route["admin/products/(:any)"] = "product/list_products/$1";
$route["admin/product/submit-add-product"] = "product/submit_add_product";
$route["admin/product/add-product"] = "product/add_product_layout";
$route["admin/product/edit-product/(:any)"] = "product/edit_product_layout/$1";

$route["admin/orders"] = "order/list_orders";
$route["admin/orders/(:any)"] = "order/list_orders/$1";

$route["admin/order/add-order"] = "order/add_order_layout";
$route["admin/order/submit-create-order"] = "order/submit_created_order";
$route["admin/order/invoice-detail/(:any)"] = "order/invoice_detail_page_layout/$1";

$route["admin/reports"] = "report/report_dashbord";
$route["admin/profile-settings"] = "settings/profile_settings";
$route["admin/settings/profile_submit"] = "settings/save_profile_data";
$route["admin/logout"] = "admin/user_logout";

$route["admin/currency-settings"] = "settings/currency_settings";
$route["admin/settings/currency_submit"] = "settings/save_currency_settings";

$route["admin/product-image-settings"] = "settings/product_image_settings";
$route["admin/settings/save_product_image_settings"] = "settings/save_product_image_settings";

$route["admin/footer-settings"] = "settings/footer_settings";
$route["admin/settings/footer_settings_submit"] = "settings/save_footer_settings";

// handle ajax requests
$route["inventory-ajax"] = "ajax/handle_ajax_requests";
$route['inventory-ajax'] = 'inventory_ajax';
$route['inventory-ajax/get_products'] = 'inventory_ajax/get_products';
$route['inventory-ajax/get_product_information'] = 'inventory_ajax/get_product_information';

