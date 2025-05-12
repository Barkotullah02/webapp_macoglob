<?php
require_once 'db_connection.php';
date_default_timezone_set('Asia/Dhaka');

if (!empty($_POST)) {
    $product_id = mysqli_real_escape_string($connection, $_POST['product_id']);
    
    $selectQuery = "SELECT image FROM products WHERE id = $product_id";
    $result = mysqli_query($connection, $selectQuery);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $image_name = $row['image'];
        $deleteQuery = "DELETE FROM products WHERE id = $product_id";
        $stmt = mysqli_query($connection, $deleteQuery);
        
        if ($stmt) {
            if ($image_name) {
                $image_path = "../img/product-images/" . $image_name;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            echo "Product deleted successfully";
        } else {
            echo "Error: " . $deleteQuery . "<br>" . mysqli_error($connection);
        }
    } else {
        echo "Error: Product not found or could not be retrieved";
    }
} else {
    echo "Error: No data received";
}
?>