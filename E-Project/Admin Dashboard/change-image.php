<?php 
session_start();
if(!isset($_SESSION['admin_name'])){
    header('location:../login.php');
}
?>

<?php 
include('../connection.php');
if(isset($_POST['Up'])){
  $uid = $_GET['userid'];;
  $ppic=$_FILES["profilepic"]["name"];
   $oldppic=$_POST['oldpic'];
$oldprofilepic="../Product Images"."/".$oldppic;

// get the image extension
$extension = substr($ppic,strlen($ppic)-4,strlen($ppic));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
//rename the image file
$imgnewfile=md5($imgfile).time().$extension;
// Code for move image into directory

move_uploaded_file($_FILES["profilepic"]["tmp_name"],"../Product Images/".$imgnewfile);
 // Query for data insertion
  $query=mysqli_query($Con,"UPDATE `products` SET `Product_Img`='$imgnewfile' WHERE `Product_Id` = '$uid' ");

  if($query){
    //Old pic
    unlink($oldprofilepic);
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

                                  $uid = $_GET['userid'];
                              
                                  $query = mysqli_query($Con,"SELECT * FROM `products` WHERE Product_Id = '$uid' ");
                              
                                while($data = mysqli_fetch_array($query)){
                                ?>

  <input type="hidden" name="oldpic" class="form-control validate" value="<?php  echo $row['Product_Img'];?>" />


                <div class="form-group mt-3 mb-3">
                <img src="../Product Images/<?php echo $data['Product_Img']; ?>" width="120" height="120">
                </div>


                <div class="form-group mt-3 mb-3">
                <input type="file" class="form-control" name="profilepic"  required="true">
                </div>
                

              </div>

              <?php
}
?>
              
              <div class="col-12">
                <button type="submit" name="Up" class="btn btn-primary btn-block text-uppercase">Update Product Image</button>
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
