<?php
require('util/main.php');

require('model/database.php');
require('model/product_db.php');

/*********************************************
 * Select some products
 **********************************************/

// Sample data
$cat_id = 1;

// Get the products
$products = get_products_by_category($cat_id);

/***************************************
 * Delete a product
 ****************************************/

// Sample data
$product_name = 'Fender Telecaster';

// Delete the product and display an appropriate messge
$product = get_product_by_name($product_name);
if ($product) {
    $product_id = $product['productID'];
    $row_count = delete_product($product_id);
    if ($row_count > 0) {
        $delete_message = "$row_count row  deleted.";
    } else {
        $delete_message = "No rows deleted.";
    }
} else {
    $delete_message = "That does not exist.";
}

/***************************************
 * Insert a product
 ****************************************/

// Sample data
$category_id = 1;
$code = 'tele';
$name = 'Fender Telecaster';
$description = 'NA';
$price = '949.99';

//insertion
$product_id = add_product($category_id, $code, $name, $description, $price, 0);


if ($product_id > 0) {
    $insert_message = "1 row inserted ID: $product_id";
} else {
    $insert_message = "No rows inserted.";
}
include 'home.php';
?>