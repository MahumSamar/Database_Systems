<?php

require_once('connection.php');
session_start();

// admin sign in
if (isset($_POST['adminSignIn'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        header("location:signIn.php?Empty= Please Fill in the Blanks");
    } else {
        $sql = "SELECT * FROM PersonInfo WHERE email = '" . $_POST['email'] . "' AND password = '" . $_POST['password'] . "'";

        $result = mysqli_query($conn, $sql);

        if ($row =mysqli_fetch_row($result)) {
            $_SESSION['id'] = $row[0];   
            $_SESSION['email'] = $row[1];   
            $_SESSION['firstName'] = $row[3];
            $_SESSION['lastName'] = $row[4];
            $_SESSION['cnic'] = $row[5];
            $_SESSION['phone'] = $row[6];
            $_SESSION['address'] = $row[7];
            $_SESSION['area'] = $row[8];
            $_SESSION['title'] = $row[9];



            $sql = "SELECT * FROM Administrator WHERE adminID = 1";

            $result = mysqli_query($conn, $sql);
    
            if ($row =mysqli_fetch_row($result)) {
                $_SESSION['profitPercentage'] = $row[1];   
                
            }


            
        
            header("location:adminDashboard.php");
        } else {
            header("location:signIn.php?Invalid= Please Enter Correct User Name and Password ");
        }
    }
}

// customer signin
if (isset($_POST['customerSignIn'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        header("location:signIn.php?Empty= Please Fill in the Blanks");
    } else {
        $sql = "SELECT * FROM PersonInfo WHERE email = '" . $_POST['email'] . "' AND password = '" . $_POST['password'] . "'";

        $result = mysqli_query($conn, $sql);
        
        if ($row =mysqli_fetch_row($result)) {
            $_SESSION['id'] = $row[0];   
            $_SESSION['email'] = $row[1];   
            $_SESSION['firstName'] = $row[3];
            $_SESSION['lastName'] = $row[4];
            $_SESSION['cnic'] = $row[5];
            $_SESSION['phone'] = $row[6];
            $_SESSION['address'] = $row[7];
            $_SESSION['area'] = $row[8];
            $_SESSION['title'] = $row[9];
            header("location:customerSignIn.php");
        } else {
            header("location:signIn.php?Invalid= Please Enter Correct User Name and Password ");
        }
    }
}
// service provider signin
if (isset($_POST['serviceProviderSignIn'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        header("location:signIn.php?Empty= Please Fill in the Blanks");
    } else {
        $sql = "SELECT * FROM PersonInfo WHERE email = '" . $_POST['email'] . "' AND password = '" . $_POST['password'] . "'";

        $result = mysqli_query($conn, $sql);

        if ($row =mysqli_fetch_assoc($result)) {
            $_SESSION['id'] = $row['personID'];   
            $_SESSION['email'] = $row['email'];   
            $_SESSION['firstName'] = $row['firstName'];
            $_SESSION['lastName'] = $row['lastName'];
            $_SESSION['cnic'] = $row['cnic'];
            $_SESSION['phone'] = $row['phone'];
            $_SESSION['address'] = $row['address'];
            $_SESSION['area'] = $row['area'];
            $_SESSION['title'] = $row['title'];



            $sql = "SELECT * FROM ServiceProvider WHERE providerID = '" . $_SESSION['id'] . "'";

            $result = mysqli_query($conn, $sql);
    
            if ($row =mysqli_fetch_assoc($result)) {
                $_SESSION['categoryID'] = $row['categoryID'];   
                $_SESSION['experience'] = $row['experience'];   
                $_SESSION['serviceCharges'] = $row['serviceCharges'];

                header("location:providerSignIn.php");
                
            }

            
        } else {
            header("location:signIn.php?Invalid= Please Enter Correct User Name and Password ");
        }
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

    <title>Sign In</title>
</head>

<body>
    <!-- Navbar  -->

    <!-- navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark " style="background-color:#5C2018; font-size: large;">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.html">SERVISTA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="home.php">Home</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="aboutUs.php">About Us</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <a href="signUp.php" class="btn btn-outline-light" role="button" aria-pressed="true">Sign Up</a>
                 
                </form>

            </div>
        </div>
    </nav>



    <div class="container">
        <ul class="nav nav-tabs justify-content-center nav-justified">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#admin" data-bs-toggle="tab">ADMIN</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#customer" data-bs-toggle="tab">CUSTOMER</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#serviceProvider" data-bs-toggle="tab">SERVICE PROVIDER</a>
            </li>
        </ul>
        <!-- for containing all the tabs -->
        <div class="tab-content">
            <!-- for containing the different tabs -->
            <div role="tabpanel" class="tab-pane active" id="admin">

                <section class="sign_up_user">
                    <h1 class="title">Sign In as admin</h1>

                    <div class="container">
                        <form action="" method="POST">
                            <div class="signUpForm row">

                                <?php
                                if (@$_GET['Empty'] == true) {
                                ?>
                                    <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Empty'] ?></div>
                                <?php
                                }
                                ?>


                                <?php
                                if (@$_GET['Invalid'] == true) {
                                ?>
                                    <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Invalid'] ?></div>
                                <?php
                                }
                                ?>

                                <div class="formField col-lg-12">
                                    <input id="email" class="input-text" type="email" name="email">
                                    <label for="email" class="label">email</label>
                                </div>


                                <div class="formField col-lg-12">
                                    <input id="password" class="input-text" type="password" name="password">
                                    <label for="password" class="label">Password</label>
                                </div>
                                <div class="formField col-lg-12 text-center">
                                    <input type="submit" class="submit-btn" name="adminSignIn" value="Sign In">
                                </div>
                            </div>
                        </form>

                    </div>
                </section>
            </div>

            <div role="tabpanel" class="tab-pane fade" id="customer">
                <section class="sign_up_user">
                    <h1 class="title">Sign In as customer</h1>

                    <div class="container">
                        <form action="" method="POST">
                            <div class="signUpForm row">

                                <?php
                                if (@$_GET['Empty'] == true) {
                                ?>
                                    <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Empty'] ?></div>
                                <?php
                                }
                                ?>


                                <?php
                                if (@$_GET['Invalid'] == true) {
                                ?>
                                    <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Invalid'] ?></div>
                                <?php
                                }
                                ?>

                                <div class="formField col-lg-12">
                                    <input id="email" class="input-text" type="email" name="email">
                                    <label for="email" class="label">email</label>
                                </div>


                                <div class="formField col-lg-12">
                                    <input id="password" class="input-text" type="password" name="password">
                                    <label for="password" class="label">Password</label>
                                </div>
                                <div class="formField col-lg-12 text-center">
                                    <input type="submit" class="submit-btn" name="customerSignIn" value="Sign In">
                                </div>
                            </div>
                        </form>

                    </div>
                </section>
            </div>

            <div role="tabpanel" class="tab-pane fade" id="serviceProvider">
                <section class="sign_up_user">
                    <h1 class="title">Sign in as service provider</h1>

                    <div class="container">
                        <form action="" method="POST">
                            <div class="signUpForm row">

                                <?php
                                if (@$_GET['Empty'] == true) {
                                ?>
                                    <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Empty'] ?></div>
                                <?php
                                }
                                ?>


                                <?php
                                if (@$_GET['Invalid'] == true) {
                                ?>
                                    <div class="alert-light text-danger text-center py-3"><?php echo $_GET['Invalid'] ?></div>
                                <?php
                                }
                                ?>

                                <div class="formField col-lg-12">
                                    <input id="email" class="input-text" type="email" name="email">
                                    <label for="email" class="label">email</label>
                                </div>

                                <div class="formField col-lg-12">
                                    <input id="password" class="input-text" type="password" name="password">
                                    <label for="password" class="label">Password</label>
                                </div>
                                <div class="formField col-lg-12 text-center">
                                    <input type="submit" class="submit-btn" name="serviceProviderSignIn" value="Sign In">
                                </div>
                            </div>
                        </form>
                    </div>

                </section>
            </div>
        </div>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>


</body>

</html>