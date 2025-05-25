<?php
include 'header.php';
?>
<script type="text/javascript" src="js/jquery.min.js"></script>
<div id="page-wrapper" style="background:#e1e0e0ba;">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="searchbar container mt-5" style="margin-top:10px;">
                <div class="navbar navbar-light bg-light col-md-8">
                    <form class="form-inline w-75">
                        <input id="searchproduct" class="form-control mr-2 flex-grow-1" type="search" placeholder="Search a product" aria-label="Search" style="width: 70%; display: inline-block;">
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function(){
                //load products
                $.ajax({
                    url:"getproducts.php",
                    type:"GET",
                    data:{
                        products: true
                    },
                    success:function(data){
                        $("#products").html(data);
                    }
                });

                $("#searchproduct").keyup(function(e){
                    let val = $("#searchproduct").val();
                    $.ajax({
                        url:"search.php",
                        type:"POST",
                        data:{
                            search: true,
                            product:val,
                        },
                        success:function(data){
                            $("#searchitems").html(data);
                        }
                    }); //search request
                });


            });//document ready
        </script>

        <!--- search result -->
        <div class="row col-md-8 m-auto container">
            <table class="table table-dark">
                <tbody id="searchitems">
                </tbody>
            </table>

            <div style="border-top: 1px solid lightcyan" class="w-100"></div>
        </div>
        <!-- /.row -->
        <!-- main content -->
        <div class="row">
            <table class="table table-dark">
                <thead>
                    <tr scope="col">
                        <td><b>#</b></td>
                        <td><b>Name</b></td>
                        <td><b>Category</b></td>
                        <td><b>Description</b></td>
                        <td><b>Quantity</b></td>
                        <td colspan="2"><b>Take Action</b></td>
                    </tr>
                </thead>
                <tbody id="products">
                </tbody>
            </table>
        </div>

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
