<?php
session_start();
 include('connection.php');
if(isset($_POST['register'])){
    
    $username = $_POST['username'];
    $useremail = $_POST['useremail'];
    $userpassword = $_POST['userpassword'];
    $userAddress = $_POST['userAddress'];
    $userphonenumber = $_POST['userphonenumber'];

    $Role = 2;

    $query = mysqli_query($Con,"INSERT INTO `users`(`User_Name`, `User_Email`, `User_Password`, `User_Address`, `User_PhoneNumber`, `User_Role`) VALUES ('$username','$useremail','$userpassword','$userAddress','$userphonenumber','$Role')");

    if($query>0){
        echo "<script>
        alert('Account Created Successfully');
        location.assign('register.php')
       </script>";
    }
    else{
        echo "<script>
        alert('not possible');
        location.assign('register.php')
       </script>";
    }
}

// Admin

if(isset($_POST['SI'])){
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];

    $fetch = mysqli_query($Con,"SELECT * FROM `admin` WHERE Admin_Email = '$mail' AND Admin_Password = '$pass'");
    $fetchUser = mysqli_query($Con,"SELECT * FROM `users` WHERE User_Email = '$mail' AND User_Password = '$pass'");

    if($a = mysqli_num_rows($fetch) > 0){

        while($b = mysqli_fetch_assoc($fetch)){
            if($b['Admin_Role'] == 1){
                session_start();
                $_SESSION['admin_name'] = $b['Admin_Name'];
                header('location:Admin Dashboard/index.php');
            }
        }
    }
    else if($a = mysqli_num_rows($fetchUser) > 0){
        
        while($b = mysqli_fetch_assoc($fetchUser)){
            if($b['User_Role'] == 2){
               
                session_start();
                $_SESSION['user_id'] = $b['User_Id'];
                $_SESSION['user_name'] = $b['User_Name'];
                
               
                header('location:index.php');
            }
            
        }
       
    }
}
?>

<!-- Search Coding -->

<?php
// Assuming you have already established a connection to the MySQL database

// Check if the search form is submitted
if (isset($_POST['search'])) {
    // Get the search term from the form input
    $searchTerm = $_POST['searchTerm'];

    // Prepare the SQL statement to search for products
    $sql = "SELECT * FROM products WHERE Product_Name LIKE '%{$searchTerm}%'";

    // Execute the SQL statement
    $result = mysqli_query($Con, $sql);

    // Check if any results were found
    if (mysqli_num_rows($result) > 0) {
        // Loop through the results and display them
        while ($row = mysqli_fetch_assoc($result)) {
            echo 
            '
            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="Product Images/<?php echo $row["Product_Img"] ?>" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3"><?php echo $row["Product_Name"] ?></h6>
                                <div class="d-flex justify-content-center">
                                    <h6><?php echo $row["Product_Price"] ?></h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                            </div>
                        </div>
                    </div>
            ';
        }
    } else {
        echo "No products found.";
    }
}


// Checkout Data

if(isset($_POST['checkout'])){
    $username = $_POST['username'];
    $useraddress = $_POST['useraddress'];
    $userphone = $_POST['userphone'];
    $userdate = $_POST['userdate'];
    $usercategory = $_POST['usercategory'];
    $userRemarks = $_POST['userRemarks'];
    $payment = $_POST['payment'];
    $u_id = $_SESSION['user_id'];
    $totalAmount = 0;


    mysqli_query($Con,"INSERT INTO ordersdetail (u_name,u_address,u_phone,date_of_birth,u_category,u_remarks, users_id)VALUES('$username','$useraddress','$userphone','$userdate','$usercategory','$userRemarks', '$u_id')");
    $last_inserted_id = mysqli_insert_id($Con);
    
    if(isset($_SESSION['user_name'])){
        foreach($_SESSION['cart'] as $key => $value){
            $totalAmount += $value['p_price'];
              mysqli_query($Con,"INSERT INTO orders(order_id,User_Id,product_id,product_name,product_price,product_qty,Order_Remarks)VALUES('$last_inserted_id','".$_SESSION['user_id']."','".$value['p_id']."','".$value['p_name']."','".$value['p_price']."',1,'Process')");
        }

        unset($_SESSION['cart']);
        echo "<script>
        alert('Order Placed Successfully')
        location.assign('checkout.php');
        </script>";
    }else{
        echo "<script>
        alert('Please Login First')
        location.assign('checkout.php');
        </script>";
    }
}
?>

