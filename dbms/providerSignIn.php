<?php
require_once('connection.php');
session_start();

$sql = "SELECT * FROM Area";
$result = $conn->query($sql);
$color1 = " #D4A59A";
$color2 = " #f3e9e7";
$color = $color1;


if (isset($_POST['update'])) {

    $sql = "UPDATE PersonInfo
    SET firstName='" . $_POST['firstName'] . "',
        lastName='" . $_POST['lastName'] . "',
        phone='" . $_POST['phone'] . "',
        address='" . $_POST['address'] . "',
        area='" . $_POST['area'] . "'
    WHERE personID = '" . $_SESSION['id'] . "'
      AND title = 'customer';";

    $result = $conn->query($sql);

    $sql="UPDATE ServiceProvider
SET experience='".$_POST['experience']."',
serviceCharges='".$_POST['serviceCharges']."'
WHERE providerID =  '" . $_SESSION['id'] . "' ";

$result = $conn->query($sql);

   

    $sql = "SELECT * FROM PersonInfo WHERE email = '" . $_POST['email'] . "'";

    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_row($result)) {
        $_SESSION['id'] = $row[0];
        $_SESSION['email'] = $row[1];
        $_SESSION['firstName'] = $row[3];
        $_SESSION['lastName'] = $row[4];
        $_SESSION['cnic'] = $row[5];
        $_SESSION['phone'] = $row[6];
        $_SESSION['address'] = $row[7];
        $_SESSION['area'] = $row[8];
        $_SESSION['title'] = $row[9];


 $sql = "SELECT * FROM ServiceProvider WHERE providerID = '" . $_SESSION['id'] . "'";

            $result = mysqli_query($conn, $sql);
    
            if ($row =mysqli_fetch_assoc($result)) {
                $_SESSION['categoryID'] = $row['categoryID'];   
                $_SESSION['experience'] = $row['experience'];   
                $_SESSION['serviceCharges'] = $row['serviceCharges'];

               
            }



      

        header("location:providerSignIn.php");
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link href="home.css" rel="stylesheet">
    <link href="signUp.css" rel="stylesheet">

    <title>Provider Dashboard</title>
</head>

<body>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

    <!-- <div class="container"> -->
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark " style="background-color:#5C2018; font-size: large;">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.html">SERVISTA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="aboutUs.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminDashboard.php">open admin dashboard</a>
                    </li> -->
                </ul>
                <form class="d-flex">
                    <a href="signOut.php" class="btn btn-outline-light" role="button" aria-pressed="true">Sign Out</a>
                    <!-- <a href="signIn.php" class="btn btn-outline-light" role="button" aria-pressed="true">Sign In</a> -->
                </form>

            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <!-- side menu start -->
        <div class="row">
            <!-- row start -->
            <nav id="sidebarMenu" class="col-sm-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="providerSignIn.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                Dashboard
                            </a>
                        </li>

                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>Services</span>
                            <a class="link-secondary" href="#" aria-label="Add a new report">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle">
                                    
                                </svg>
                            </a>
                        </h6>

                        <li class="nav-item">
                            <a class="nav-link" href="providerViewRequests.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                                    <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                    <polyline points="13 2 13 9 20 9"></polyline>
                                </svg>
                                View Requests
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="providerServiceServedForm.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                Service Served Form
                            </a>
                        </li>

                    </ul>


                </div>
            </nav>
            <div class="col-sm-10">
                <!-- start dashboard area -->
                <section class="sign_up_user">
                    <h1 class="title">Profile</h1>
                    <!-- name = "" is used for assigning the variable in which its value will be stored -->
                    <div class="container">
                        <form action="" method="POST">
                            <div class="signUpForm row">

                                <div class="formField col-lg-6">
                                    <input id="firstName" class="input-text" type="text" name="firstName" value="<?php
                                    echo $_SESSION['firstName']?>">
                                    <label for="firstName" class="label">First Name</label>
                                </div>
                                <div class="formField col-lg-6">
                                    <input id="lastName" class="input-text" type="text" name="lastName" value="<?php
                                    echo $_SESSION['lastName']?>">
                                    <label for="lastName" class="label">Last Name</label>
                                </div>
                                <div class="formField col-lg-6">
                                    <input id="email" class="input-text" type="email" name="email" value="<?php
                                    echo $_SESSION['email']?>" readonly>
                                    <label for="email" class="label">email</label>
                                </div>
                                
                                <div class="formField col-lg-6">
                                    <input id="cnic" class="input-text" type="text" name="cnic" readonly value="<?php
                                    echo $_SESSION['cnic']?>">
                                    <label for="cnic" class="label">CNIC</label>
                                </div>
                                <div class="formField col-lg-6">
                                    <input id="phone" class="input-text" type="text" name="phone" value="<?php
                                    echo $_SESSION['phone']?>">
                                    <label for="phone" class="label">Contact No.</label>
                                </div>
                                <div class="formField col-lg-6">
                                <select name="area">
                                        <?php

                                        $area = $_SESSION['area'];
                                        echo $area;

                                        while ($row = $result->fetch_assoc()) {
                                            $color == $color1 ? $color = $color2 : $color = $color1;
                                            $id = $row['area'];
                                            echo "<option value = '$id' style ='background:$color;'>$id</option>";
                                        }

                                        echo "<option value = ' $_SESSION[area]' selected style ='background:$color;'> $_SESSION[area]</option>";


                                        ?>
                                    </select>
                                </div>
                                <div class="formField col-lg-12">
                                    <input id="address" class="input-text" type="text" name="address" value="<?php
                                    echo $_SESSION['address']?>">
                                    <label for="address" class="label">Address</label>
                                </div>

                                <div class="formField col-lg-12">
                                    <input id="experience" class="input-text" type="text" name="experience" value="<?php
                                    echo $_SESSION['experience']?>">
                                    <label for="experience" class="label">experience</label>
                                </div>

                                <div class="formField col-lg-12">
                                    <input id="serviceCharges" class="input-text" type="text" name="serviceCharges" value="<?php
                                    echo $_SESSION['serviceCharges']?>">
                                    <label for="serviceCharges" class="label">Service Charges</label>
                                </div>


 
                                <div class="formField col-lg-12 text-center">
                            <input type="submit" class="submit-btn" name="update" value="Update">
                        </div>
                               
<!-- 
                                <div class="formField col-lg-12 text-center">
                                    <input type="submit" class="submit-btn" value="Save">
                                </div> -->
                            </div>
                        </form>
                    </div>
                </section>


            </div><!-- end dashboard area -->




        </div><!-- row end -->

    </div> <!-- container end -->



    <!-- </div> -->



</body>

</html>