<div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="index.php" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold">Cosmetics & Jewellery</h1>
                </a>
            </div>

            <!-- Search Products start -->
            <div class="col-lg-6 col-6 text-left">
                <form method="post" action="search index products.php">
                    <div class="input-group">
                        <input type="text" name="searchTerm" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                            <input type="submit" name="search" value="Search" class="fa fa-search">
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Search Products end -->

            <!-- Add to cart / Wishlist start -->
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>

                <?php 
                            // $count = 0;
                            //     if(isset($_SESSION['cart'])){
                            //         foreach($_SESSION['cart'] as $key => $value){
                            //             $count = count($_SESSION['cart']);
                            //         }
                            //     }
                            ?>
                <a href="cart.php" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">
                    <?php
                                // Cart Counter 
                                $count = 0;
                                    if(isset($_SESSION['cart'])){
                                        foreach ($_SESSION['cart'] as $key => $value) {
                                           $count  = count($_SESSION['cart']);
                                        }
                                    }
                                echo $count;
                                ?>
                    </span>
                </a>
            </div>
            <!-- Add to cart / Wishlist end -->
        </div>
    </div>