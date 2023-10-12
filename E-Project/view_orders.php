<?php
session_start();
$u_id = $_SESSION['user_id'];
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
               <div class="row mb-5">
                
                <div class="col-12 tm-block-col mb-5">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll mb-5">
                        <h2 class="tm-block-title">Orders List</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ORDER_ID</th>
                                    <th scope="col">USER NAME</th>
                                    <th scope="col">USER ADDRESS</th>
                                    <th scope="col">USER PHONE</th>
                                    <th scope="col">USER D.O.B</th>
                                    <th scope="col">USER CATEGORY</th>
                                    <th scope="col">USER REMARKS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                
                                include('connection.php');
                                $FetchCategory = mysqli_query($Con,"SELECT * from ordersdetail where users_id = '$u_id' ");
                                // COnvert Into Arrays
                                // $totalAmount = 0;
                                $Sno=1;
                                while($data = mysqli_fetch_assoc($FetchCategory)){
                                    //  $totalAmount += $data['product_price'];
                                ?>
                                <tr>
                                    <th scope="row"><b><?php echo $Sno++?></b></th>
                                    <td><b><?php echo $data['u_name'] ?></b></td>
                                    <td><b><?php echo $data['u_address'] ?></b></td>
                                    <td><b><?php echo $data['u_phone']; ?></b></td>
                                    <td><?php echo $data['date_of_birth'] ?></td>
                                    <td><?php echo $data['u_category'] ?></td>
                                    <td><?php echo $data['u_remarks'] ?></td>
                                    <?php 
                                }
                            ?>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>

        </div>
    </div>
    <!-- Navbar End -->





    

    


  



    




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