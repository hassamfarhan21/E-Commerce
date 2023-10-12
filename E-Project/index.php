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
<div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">

            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
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
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="slider images/cosmetics slider.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <!-- <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Fashionable Dress</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div> -->
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="slider images/jewellery slider.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <!-- <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
    <!-- Navbar End -->



    <!-- Featured Start -->
    <div class="container-fluid pt-5">

        <h1 class="font-weight-semi-bold m-0 text-center mb-5">Our Services</h1>

        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>

    </div>
    <!-- Featured End -->


    

    <!-- Offer Start -->
    <div class="container-fluid offer pt-5">

    <h1 class="font-weight-semi-bold m-0 text-center mb-5">Discount Offers</h1>

        <div class="row px-xl-5">
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <img src="img/offer-1.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Spring Collection</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                    <img src="img/offer-2.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Winter Collection</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Our Products</span></h2>
        </div>

        <div class="container mt-5">
            <div class="row">
            <?php
            include "connection.php";
            $FetchCategory = mysqli_query($Con,"SELECT * FROM products");
                                // COnvert Into Arrays
                                while($data = mysqli_fetch_array($FetchCategory)){

                                    

                                    $Product_Name = $data['Product_Name'];
                                    $Product_Description = $data['Product_Description'];
                                    $Product_Price = $data['Product_Price'];
                                    $Product_Img = $data['Product_Img'];

                                  echo "
                                  <div class='col-lg-3 col-md-6 col-sm-12 pb-1'>
                                  <div class='card product-item border-0 mb-4'>
                                      <div class='card-header product-img position-relative overflow-hidden bg-transparent border p-0 h-25'>
                                          <img class='img-fluid w-100' src='Product Images/".$data[5]."' alt=''style='height: 250px;'>
                                      </div>
                                      <div class='card-body border-left border-right text-center p-0 pt-4 pb-3'>
                                          <h6 class='text-truncate mb-3'>".$data[1]."</h6>
                                          <div class='d-flex justify-content-center'>
                                              <h6>".$data[4]."</h6><h6 class='text-muted ml-2'><del>$123.00</del></h6>
                                          </div>
                                      </div>
                                      <div class='card-footer d-flex justify-content-between bg-light border'>
                                          <a href='detail.php?id=".$data[0]."' class='btn btn-sm text-dark p-0'><i class='fas fa-eye text-primary mr-1'></i>View Detail</a>
                                          <a href='cart.php?id=".$data[0]."' class='btn btn-sm text-dark p-0'><i class='fas fa-shopping-cart text-primary mr-1'></i>Add To Cart</a>
                                      </div>
                                  </div>
                              </div>";

                                
                            }
                                ?>
                            </div>
                        </div>
                        <center>
                        <a href="shop.php" class="btn btn-outline-primary py-md-2 px-md-3">View All Products</a>
                        </center>
    <!-- Products End -->


    <!-- Subscribe Start -->
    <div class="container-fluid bg-secondary my-5">
        <div class="row justify-content-md-center py-5 px-xl-5">
            <div class="col-md-6 col-12 py-5">
                <div class="text-center mb-2 pb-2">
                    <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Stay Updated</span></h2>
                    <p>Amet lorem at rebum amet dolores. Elitr lorem dolor sed amet diam labore at justo ipsum eirmod duo labore labore.</p>
                </div>
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-4" placeholder="Email Goes Here">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">Subscribe</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Subscribe End -->


    


    <!-- Vendor Start -->
    <div class="container-fluid py-5">

    <h1 class="font-weight-semi-bold m-0 text-center mb-5">Our Brands</h1>

        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="vendor-item border p-4">
                        <img src="Brand images/loreal.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="Brand images/nivea.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="Brand images/lux.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="Brand images/garnier.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="Brand images/bulgari.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="Brand images/gucci.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="Brand images/cartier.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="Brand images/harry winston.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->


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