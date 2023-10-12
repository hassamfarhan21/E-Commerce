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

          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">

            <div class="row">

              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Add Categories</h2>
              </div>

            </div>

            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">

                <form action="" method="post" enctype="multipart/form-data" class="tm-edit-product-form">

                  <div class="form-group mb-3">
                    <label for="name">Category Name</label>
                    <input id="name" name="cn" type="text" class="form-control validate" placeholder="Enter Category Name" required />
                  </div>

              </div>

              <div class="col-12">
                <button type="submit" name="ac" class="btn btn-primary btn-block text-uppercase">Add Category</button>
              </div>

            </form>

            </div>

            <?php
            include('../connection.php');
            if(isset($_POST['ac'])){
              $cn = $_POST['cn'];

              $add = mysqli_query($Con,"INSERT INTO `categories`(`Category_Id`, `Category_Name`) VALUES ('','$cn')");

              echo "<script>
                                      alert('Category Added Successfully')
                                      location.assign('products.php')
                                  </script>";
            }
            ?>
            
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