<?php 
session_start();
if(!isset($_SESSION['admin_name'])){
    header('location:../login.php');
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Add Product - Dashboard HTML Template</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
  </head>

  <body>
    <?php include('Navbar.php'); ?>

    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto mb-5">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Add Products</h2>
              </div>
            </div>

            <div class="row tm-edit-product-row mb-5">
              <div class="col-xl-6 col-lg-6 col-md-12">

                <form action="" method="post" enctype="multipart/form-data" class="tm-edit-product-form">

                  <div class="form-group mb-3">
                    <label for="name" >Product Name</label>
                    <input id="name" name="pn" type="text" class="form-control validate" required placeholder="Enter Product Name"/>
                  </div>

                  <div class="form-group mb-3">
                    <label for="description">Product Description</label>
                    <input id="description" name="pd" type="text" class="form-control validate" required placeholder="Enter Product Description"/>
                  </div>

                  <div class="form-group mb-3">
                    <label for="qty" >Product Quantity</label>
                    <input id="qty" name="pq" type="number" class="form-control validate" required placeholder="Enter Product Quantity"/>
                  </div>

                  <div class="form-group mb-3">
                    <label for="price" >Product Price</label>
                    <input id="price" name="pp" type="text" class="form-control validate" required placeholder="Enter Product Price"/>
                  </div>
                  
              </div>

              <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                
              <div class="form-group mb-3">
                    <label for="price" >Product Status</label>
                    <input id="price" name="ps" type="text" class="form-control validate" required placeholder="Enter Product Status"/>
                  </div>

                  <div class="form-group mb-3">
                    <label for="category">Category</label>
                    <select class="custom-select tm-select-accounts" id="category" name="Pcategory">
                      <option selected>Select category</option>
                      <?php 
                          include "../connection.php";
                          $FetchCategory = mysqli_query($Con,"SELECT * FROM categories");
                          // COnvert Into Arrays
                          while($data = mysqli_fetch_array($FetchCategory)){
                      ?>
                            <option value="<?php echo $data['Category_Id'] ?>"><?php echo $data['Category_Name'] ?></option>
                          <?php
                          }
                          ?>
                    </select>
                  </div>

                <div class="custom-file mt-3 mb-3">
                  <input id="fileInput" type="file" name="Upi" style="display:none;" />
                  <input type="button" class="btn btn-primary btn-block mx-auto" value="UPLOAD PRODUCT IMAGE" onclick="document.getElementById('fileInput').click();"/>
                </div>
              </div>

              <div class="col-12">
                <button type="submit" name="Ap" class="btn btn-primary btn-block text-uppercase">Add Product</button>
              </div>

            </form>

            <?php
            include('../connection.php');
            if(isset($_POST['Ap'])){
              $pn = $_POST['pn'];
              $pd = $_POST['pd'];
              $pq = $_POST['pq'];
              $pp = $_POST['pp'];
              $ps = $_POST['ps'];

              $cid = $_POST["Pcategory"];

              $image = $_FILES['Upi']['name'];
              $templocation = $_FILES['Upi']['tmp_name'];
              move_uploaded_file($templocation,"../Product Images/".$image);

              $add = mysqli_query($Con,"INSERT INTO `products`(`Product_Name`, `Product_Description`, `Product_Quantity`, `Product_Price`, `Product_Img`, `Product_Status`, `Category_Id`) VALUES ('$pn','$pd','$pq','$pp','$image','$ps','$cid')");

              echo "<script>
                                      alert('Product Added Successfully')
                                      location.assign('products.php')
                                  </script>";
            }
            ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include('Footer.php'); ?>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
      $(function() {
        $("#expire_date").datepicker();
      });
    </script>
  </body>
</html>