<nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="index.php" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <a href="shop.php" class="nav-item nav-link">Shop</a>
                            <!-- <a href="detail.php" class="nav-item nav-link">Shop Detail</a> -->
                            <!-- <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="cart.php" class="dropdown-item">Shopping Cart</a>
                                    <a href="checkout.php" class="dropdown-item">Checkout</a>
                                </div>
                            </div> -->
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                            <?php
                            
                            if(isset($_SESSION['user_id'])){?>
                                <a href="view_orders.php" class="nav-item nav-link">View Orders</a>
                            <?php
                            }
                            ?>
                            
                            
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            <?php
                            if(isset($_SESSION['user_name'])){
                                ?>
                                <a href="Admin Dashboard/logout.php" class="nav-item nav-link">Logout</a>
                                <?php 
                            } else{
                                ?>
                                <a href="login.php" class="nav-item nav-link">Login</a>
                                <?php 
                            }
                            ?>
                            <a href="register.php" class="nav-item nav-link">Register</a>
                        </div>
                    </div>
                </nav>