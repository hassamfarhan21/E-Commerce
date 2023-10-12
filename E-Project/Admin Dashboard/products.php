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
    <title>Product Page - Admin HTML Template</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">

    <!-- <style>
      .tm-content-row {
    justify-content: space-between;
    margin-left: -230px !important;
    margin-right: -230px !important;
  }
    </style> -->
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
  </head>



  <body id="reportsPage">
    <div class="" id="home">
        <?php include('Navbar.php'); ?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="text-white mt-5 mb-5">Welcome back, <b><?php 
                        if(isset($_SESSION['admin_name'])){
                            echo $_SESSION['admin_name'];
                        }
                        ?></b></p>
                </div>
            </div>
            <!-- row -->
      <div class="row mb-5">

        <div class="container-fluid">
          <div class="tm-bg-primary-dark tm-block tm-block-products mb-5">
            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>
                    <th scope="col">PRODUCT ID</th>
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">PRODUCT DESCRIPTION</th>
                    <th scope="col">PRODUCT QUANTITY</th>
                    <th scope="col">PRODUCT PRICE</th>
                    <!-- <th scope="col">PRODUCT IMAGE</th> -->
                    <th scope="col">PRODUCT STATUS</th>
                    <th scope="col">PRODUCT DATE</th>
                    <th scope="col">CATEGORY ID</th>
                    <th scope="col">PRODUCT ACTION</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                                include('../connection.php');

                                if(isset($_GET['del'])){

                                  $id = $_GET['del'];
                              
                                  $query = mysqli_query($Con,"DELETE FROM `products` WHERE Product_Id = '$id' ");
                              
                                  echo "<script>
                                      alert('Data Deleted Successfully')
                                      location.assign('products.php')
                                  </script>";
                                }

                                $FetchCategory = mysqli_query($Con,"SELECT * from products
                                INNER JOIN categories ON products.Category_Id=categories.Category_Id");
                                // COnvert Into Arrays
                                while($data = mysqli_fetch_assoc($FetchCategory)){
                                  ?>
                                  <tr>
                                    <td><?php echo $data['Product_Id'] ?></td>
                                    <td><?php echo $data['Product_Name'] ?></td>
                                    <td><?php echo $data['Product_Description'] ?></td>
                                    <td><?php echo $data['Product_Quantity'] ?></td>
                                    <td><?php echo $data['Product_Price'] ?></td>
                                    <!-- <td><?php //echo $data['Product_Img'] ?></td> -->
                                    <td><?php echo $data['Product_Status'] ?></td>
                                    <td><?php echo $data['Product_Date'] ?></td>
                                    <td><?php echo $data['Category_Id'] ?></td>
                                    <td class="">
                                      <a href="products.php?del=<?php echo $data['Product_Id']?>" class="tm-product-delete-link">
                                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                      </a>
                                      <a href="edit-product.php?update=<?php echo $data['Product_Id']?>" class="tm-product-delete-link mt-2">
                                      <i class="fas fa-edit" style="color: white;"></i>
                                      </a>
                                    </td>
                                  <?php 
                                }
                            ?>
                            </tr>
                </tbody>
              </table>
            </div>
            <!-- table container -->
            <a
              href="add-product.php"
              class="btn btn-primary btn-block text-uppercase mb-3">Add product</a>
            <!-- <button class="btn btn-primary btn-block text-uppercase">
              Delete selected products
            </button> -->
          </div>
        </div>

        <div class="container-fluid mb-5">
          <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
            <h2 class="tm-block-title">Product Categories</h2>
            <div class="tm-product-table-container">
              <table class="table tm-table-small tm-product-table">
                <tbody>
                <?php 
                                include('../connection.php');

                                if(isset($_GET['del'])){

                                  $id = $_GET['del'];
                              
                                  $query = mysqli_query($Con,"DELETE FROM `categories` WHERE Category_Id = '$id' ");
                              
                                  echo "<script>
                                      alert('Data Deleted Successfully')
                                      location.assign('products.php')
                                  </script>";
                                }

                                $FetchCategory = mysqli_query($Con,"SELECT * FROM categories");
                                // COnvert Into Arrays
                                while($data = mysqli_fetch_assoc($FetchCategory)){
                                  ?>
                                  <tr>
                                    <td class="tm-product-name"><?php echo $data['Category_Name'] ?></td>
                                    <td class="text-center">
                                      <a href="products.php?del=<?php echo $data['Category_Id']; ?>" class="tm-product-delete-link">
                                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                      </a>
                                    </td>
                                  <?php 
                                }
                            ?>
                  </tr>

                </tbody>
              </table>
            </div>
            <!-- table container -->
            <button type="submit" class="btn btn-primary btn-block text-uppercase mb-3">
            <a href="add-category.php" class="text-white">Add new category</a>  
            </button>
          </div>
        </div>
      </div>
    </div>
    <?php include('Footer.php'); ?>
</div>





    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
      $(function() {
        $(".tm-product-name").on("click", function() {
          window.location.href = "edit-product.html";
        });
      });
    </script>
  </body>
</html>