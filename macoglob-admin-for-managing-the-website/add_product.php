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
                <h2 class="form-heading text-center text-primary">Add New Product</h2>
                <form id="productForm" action="/insert-product" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category ID</label>
                        <select type="number" class="form-control" id="category_id" name="category_id" required>
                            <option disabled selected>--select a category from below---</option>
                            <?php
                            $getCategories = "SELECT id, name FROM categories";
                            $categoryResult = mysqli_query($connection, $getCategories);
                            while ($row = mysqli_fetch_assoc($categoryResult)) {
                                echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name" maxlength="150" required>
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" maxlength="160" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price ($)</label>
                        <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Product Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        <img style="width: 25%; margin: 5px;" id="imagePreview" src="#" alt="Image Preview">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Submit Product</button>
                </form>
            </div>

            <script>
                // Image preview logic
                document.getElementById("image").addEventListener("change", function() {
                    const file = this.files[0];
                    if (file) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            const preview = document.getElementById("imagePreview");
                            preview.src = e.target.result;
                            preview.style.display = "block";
                        };

                        reader.readAsDataURL(file);
                    }
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

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>

