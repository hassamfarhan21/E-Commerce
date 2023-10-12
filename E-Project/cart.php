<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <?php include('Topbar.php'); ?>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <div class="nav-item dropdown">
                            <!-- <a href="#" class="nav-link" data-toggle="dropdown">Dresses <i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="" class="dropdown-item">Men's Dresses</a>
                                <a href="" class="dropdown-item">Women's Dresses</a>
                                <a href="" class="dropdown-item">Baby's Dresses</a>
                            </div> -->
                            <?php
                            include 'Connection.php';
                       $q= mysqli_query($Con,"SELECT * FROM `categories`");
                        while($data=mysqli_fetch_array($q))
                        {
                            echo '<a href="Show Products.php?id='.$data[0].'" class="dropdown-item">'.$data[1].'</a>';
                        }
                        ?>
                    </div>
                </nav>
            </div>

            <div class="col-lg-9">

            <?php include('Navbar.php'); ?>

            </div>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="index.php">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


        <!-- Php Card Coding -->

        <?php 
    if(isset($_GET['id'])){

        include 'connection.php';
        $p_id = $_GET['id'];

        $selectAllData  = mysqli_query($Con,"SELECT * FROM products WHERE Product_Id = '$p_id'");
        $data = mysqli_fetch_array($selectAllData);
        $p_name = $data[1];
        $p_price = $data[4];
        $p_img = $data[5];

        if(isset($_SESSION['cart'])){
            $myitem = array_column($_SESSION['cart'],'p_id');
            if(in_array($_GET['id'],$myitem)){
                echo "
                <script>
                    alert('Product Already Added')
                    location.assign('index.php');
                </script>
            ";
 }else{
 $count = count($_SESSION['cart']);
  $_SESSION['cart'][$count] = array('p_id'=>$p_id,'p_name'=>$p_name,'p_price'=>$p_price,'p_img'=>$p_img);
    echo "
                    <script>
                        alert('Product Added Into Cart')
                        location.assign('index.php');
                    </script>
                ";    
            }
        }else{
    $_SESSION['cart'][0] = array('p_id'=>$p_id,'p_name'=>$p_name,'p_price'=>$p_price,'p_img'=>$p_img);
            echo "
                <script>
                    alert('Product Added Into Cart')
                    location.assign('index.php');
                </script>
            ";
        }
    }

    if(isset($_POST['addToCart'])){
        if($_SESSION['cart']){

            $myitem = array_column($_SESSION['cart'],'p_id');
            if(in_array($_POST['p_id'],$myitem)){
                echo "
                <script>
                    alert('Product Already Added')
                    location.assign('index.php');
                </script>
            ";
            }else{
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('p_id'=>$_POST['p_id'],'p_name'=>$_POST['p_name'],'p_price'=>$_POST['p_price'],'p_img'=>$_POST['p_img'],'p_qty' => $_POST['qty']);
               
                  echo "
                                  <script>
                                      alert('Product Added Into Cart')
                                      location.assign('index.php');
                                  </script>
                              ";    
            }
                    
        }else{
            $_SESSION['cart'][0] = array('p_id'=>$_POST['p_id'],'p_name'=>$_POST['p_name'],'p_price'=>$_POST['p_price'],'p_img'=>$_POST['p_img'],'p_qty' => $_POST['qty']);
            
            echo "
                <script>
                    alert('Product Added Into Cart')
                    location.assign('index.php');
                </script>
            ";
        }
    }

    if(isset($_GET['remove'])){
        foreach ($_SESSION['cart'] as $key => $value) {
            if($value['p_id'] == $_GET['remove']){
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                echo "
                <script>
                alert('Product Removed Successfully')
                location.assign('cart.php');
            </script>
                ";
            }
        }
    }
    ?>


    <!-- Php Card Coding -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <!-- <th>Quantity</th>
                            <th>Total</th> -->
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                    <?php
                        $totalPrice = 0;
                            if(isset($_SESSION['cart'])){
                                foreach ($_SESSION['cart'] as $key => $value) {
                                    $totalPrice = $totalPrice + $value['p_price'];
                                ?>
                        <tr>
                            <td class="align-middle"><img src="Product Images/<?php echo $value['p_img'];?>" alt="" style="width: 50px;"></td>
                            <td class="align-middle"><?php echo $value['p_name'];?></td>
                            <!-- <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary text-center" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td> -->
                            <td class="align-middle"><?php echo $value['p_price'];?></td>
                            <td class="align-middle"><a href="?remove=<?php echo $value['p_id'];?>" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></a></td>
                        </tr>
                        <?php 
                                }
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">RS <?php echo $totalPrice; ?></h5>
                        </div>

                        <?php     
                            if(isset($_SESSION['user_name'])){
                                ?>
                        <a href="checkout.php" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
                        <?php
                        }else{
                            ?>
                            <a href="login.php" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Login First</a>
                                <?php
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->


    <!-- Footer Start -->
    <?php include('Footer.php'); ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>