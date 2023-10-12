<?php 
session_start();
if(!isset($_SESSION['admin_name'])){
    header('location:../login.php');
}
?>

<?php 
include('../connection.php');
if(isset($_POST['Up'])){
  $id = $_GET['update'];
  $pn = $_POST['pn'];
  $pd = $_POST['pd'];
  $pq = $_POST['pq'];
  $pp = $_POST['pp'];
  $ps = $_POST['ps'];

  $cid = $_POST["Pcategory"];

  $query=mysqli_query($Con,"UPDATE `products` SET `Product_Name`='$pn',`Product_Description`='$pd',`Product_Quantity`='$pq',`Product_Price`='$pp',`Product_Status`='$ps',`Category_Id`='$cid' WHERE `Product_Id` = '$id' ");

  if($query){
  echo "<script>
      alert('Product Updated Successfully')
      location.assign('products.php')
  </script>";
  }
  else{
    echo "<script>
      alert('Product Not Updated Successfully')
      location.assign('products.php')
  </script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Edit Product - Dashboard Admin Template</title>
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
                <h2 class="tm-block-title d-inline-block">Edit Product</h2>
              </div>
            </div>

            <div class="row tm-edit-product-row mb-5">
              <div class="col-xl-6 col-lg-6 col-md-12">


              <form action="" method="post" enctype="multipart/form-data" class="tm-edit-product-form">

              <?php 
                                include('../connection.php');

                                  $id = $_GET['update'];
                              
                                  $query = mysqli_query($Con,"SELECT * FROM `products` WHERE Product_Id = '$id' ");
                              
                                while($data = mysqli_fetch_array($query)){
                                ?>

  <!-- <input id="name" name="pid" type="hidden" class="form-control validate" required placeholder="Enter Product Name" value="<?php //echo $data[0] ?>"/> -->

<div class="form-group mb-3">
  <label for="name" >Product Name</label>
  <input id="name" name="pn" type="text" class="form-control validate" required placeholder="Enter Product Name" value="<?php echo $data[1] ?>"/>
</div>

<div class="form-group mb-3">
  <label for="description">Product Description</label>
  <input id="description" name="pd" type="text" class="form-control validate" required placeholder="Enter Product Description" value="<?php echo $data[2] ?>"/>
</div>

<div class="form-group mb-3">
  <label for="qty" >Product Quantity</label>
  <input id="qty" name="pq" type="number" class="form-control validate" required placeholder="Enter Product Quantity" value="<?php echo $data[3] ?>"/>
</div>

<div class="form-group mb-3">
  <label for="price" >Product Price</label>
  <input id="price" name="pp" type="text" class="form-control validate" required placeholder="Enter Product Price" value="<?php echo $data[4] ?>"/>
</div>

</div>

<div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">

<div class="form-group mb-3">
  <label for="price" >Product Status</label>
  <input id="price" name="ps" type="text" class="form-control validate" required placeholder="Enter Product Status" value="<?php echo $data[6] ?>"/>
</div>

<div class="form-group mt-3 mb-3">
   <img src="../Product Images/<?php  echo $data['Product_Img'];?>" width="120" height="120">
   <a href="change-image.php?userid=<?php echo $data['Product_Id'];?>" class="btn btn-primary btn-block text-uppercase mt-3">Change Image</a>
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

                
              </div>
<?php
}
?>
              <div class="col-12">
                <button type="submit" name="Up" class="btn btn-primary btn-block text-uppercase">Update Product</button>
              </div>
              
            </form>
            
            
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
        $("#expire_date").datepicker({
          defaultDate: "10/22/2020"
        });
      });
    </script>
  </body>
</html>
