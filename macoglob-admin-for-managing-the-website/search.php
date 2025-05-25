<?php
include'db_connection.php';

if(isset($_POST["search"])){
    $key = $_POST["product"];

    if (empty($key)){
        echo '';
    }
    else {

        $searchquery = "SELECT products.*, categories.name AS category FROM products JOIN categories ON products.category_id = categories.id WHERE products.name LIKE '%$key%' or products.description LIKE'%%$key%%' or products.quantity LIKE'%%$key%%'";
        $result = mysqli_query($connection, $searchquery);


        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr class='bg-light'>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['category'] . "</td>
                    <td>" . $row['description'] . "</td>
                    <td>" . $row['quantity'] . "</td>
                    <td><a href='delete_product_fromdb.php?id=" . $row['id'] . "'><button class='btn btn-outline-success'>DELETE</button></a></td>
                    <td><a href='updateproduct.php?id=" . $row['id'] . "'><button class='btn btn-outline-danger'>UPDATE</button></a></td>
                </tr>";
        }
    }

}
?>
