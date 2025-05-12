<?php include 'header.php' ?>

<style>
    .form-container {
        max-width: 600px;
        margin: 40px auto;
        padding: 30px;
        background-color: #d4d1d1;
        border-radius: 16px;
        box-shadow: 0 0 20px rgba(0,0,0,0.05);
    }
    .form-heading {
        margin-bottom: 25px;
    }
</style>

<div id="page-wrapper" style="background:#e1e0e0ba;">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="container form-container">
                <h2 class="form-heading text-center text-danger">Delete Product</h2>
                <form id="deleteForm" method="POST">

                    <div class="mb-3">
                        <label for="product_id" class="form-label">Product</label>
                        <select class="form-control" id="product_id" name="product_id" required>
                            <option disabled selected>--select a product from below---</option>
                            <?php
                            $getProducts = "SELECT id, name FROM products";
                            $productResult = mysqli_query($connection, $getProducts);
                            while ($row = mysqli_fetch_assoc($productResult)) {
                                echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-danger w-100">Delete Product</button>
                </form>
            </div>

            <script src="js/jquery.js"></script>

            <script>
                $(document).ready(function () {
                    $('#deleteForm').on('submit', function (e) {
                        e.preventDefault();
                        
                        if (!confirm('Are you sure you want to delete this product?')) {
                            return;
                        }

                        const productId = $('#product_id').val();
                        
                        $.ajax({
                            url: 'delete_product_fromdb.php',
                            type: 'POST',
                            data: { product_id: productId },
                            success: function (response) {
                                alert('Product deleted successfully');
                                $('#deleteForm')[0].reset();
                                location.reload();
                            },
                            error: function (xhr, status, error) {
                                alert('Error: ' + error);
                                console.error(xhr.responseText);
                            }
                        });
                    });
                });
            </script>

        </div>
        <!-- /.row -->

    </div>
        <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>