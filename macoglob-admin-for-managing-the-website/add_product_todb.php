<?php
require_once 'db_connection.php';
date_default_timezone_set('Asia/Dhaka');
if (!empty($_POST)) {
    $category_id = mysqli_real_escape_string($connection, $_POST['category_id']);
    $name        = mysqli_real_escape_string($connection, $_POST['name']);
    $slug        = mysqli_real_escape_string($connection, $_POST['slug']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $price       = mysqli_real_escape_string($connection, $_POST['price']);
    $quantity    = mysqli_real_escape_string($connection, $_POST['quantity']);
    $current_time = date('Y-m-d h:i:s A');

    $image_name = null;

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = "../img/product-images/";
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (in_array($extension, $allowed)) {
            $image_name = uniqid("img_", true) . '.' . $extension;
            $destination = $upload_dir . $image_name;

            if (!move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                echo "Image upload failed.";
                exit;
            }
        } else {
            echo "Invalid image file type.";
            exit;
        }
    }

    $insertQuery = "INSERT INTO products (category_id, name, slug, description, price, image, created_at, quantity) 
                    VALUES ($category_id, '$name', '$slug', '$description', $price, '$image_name', '$current_time', $quantity)";

    $stmt = mysqli_query($connection, $insertQuery);
    if ($stmt) {
        echo "New record created successfully";
    }
    else{
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($connection);
    }

}
?>
