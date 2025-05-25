<?php
include'db_connection.php';

if(isset($_GET['products'])){

        $searchquery = "SELECT products.*, categories.name AS category FROM products JOIN categories ON products.category_id = categories.id";
        $result = mysqli_query($connection, $searchquery);

        $count = 1;

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
            <td>" . $count . "</td>
            <td>" . $row['name'] . "</td>
            <td>" . $row['category'] . "</td>
            <td>" . $row['description'] . "</td>
            <td>" . $row['quantity'] . "</td>
            <td><a href='delete_product_fromdb.php?id=" . $row['id'] . "'><button class='btn btn-outline-success'>DELETE</button></a></td>
            <td><a href='updateproduct.php?id=" . $row['id'] . "'><button class='btn btn-outline-danger'>UPDATE</button></a></td>
        </tr>";
            $count++;
        }

}
?>
