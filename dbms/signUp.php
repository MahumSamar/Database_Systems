<?php
require_once('connection.php');
session_start();

$sql = "SELECT * FROM Area";
$result = $conn->query($sql);
$color1 = " #D4A59A";
$color2 = " #f3e9e7";
$color = $color1;






if ($_SERVER['REQUEST_METHOD'] == "POST") {


    // Check if email is empty
    if (empty(trim($_POST["email"]))) {
        $email_err = "Username cannot be blank";
    } else {
        $sql = "SELECT email FROM PersonInfo WHERE email = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("s", $param_email);

            // Set the value of param email
            $param_email = trim($_POST['email']);

            // Try to execute this statement
            if ($stmt->execute()) {
                $stmt->store_result();
                if ($stmt->num_rows() == 1) {
                    header("location:signUp.php?Empty=This email address is already taken.");
                } else {
                    $email = trim($_POST['email']);
                }
            } else {
                echo "Something went wrong";
            }
        }
    }

    $stmt->close();


    if ($_POST["title"] == "Customer") {
        $sql = "INSERT INTO PersonInfo (email, password, firstName, lastName, CNIC, phone, address, area,title) VALUES (?, ?, ?, ?, ?, ?, ?, ?,'customer')";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            // the ssssss here are for representing the type of the parameters passed
            $stmt->bind_param("ssssssss", $param_email, $param_password, $param_fName, $param_lName, $param_cnic, $param_phone, $param_address, $param_area);

            // Set these parameters
            $param_email = $_POST['email'];
            // $param_password = password_hash($password, PASSWORD_DEFAULT);

            $param_password = $_POST['password'];
            $param_fName = $_POST['firstName'];
            $param_lName = $_POST['lastName'];
            $param_cnic = $_POST['cnic'];
            $param_phone = $_POST['phone'];
            $param_address = $_POST['address'];
            $param_area = $_POST['area'];


            // Try to execute the query
            if ($stmt->execute()) {
                $sql="SELECT personID FROM PersonInfo WHERE email=  '" . $_POST['email'] . "'";
                $result = $conn->query($sql);
                $row =mysqli_fetch_row($result);
                    $_SESSION['id'] = $row[0];

                $_SESSION['email'] = $_POST['email'];
                // $param_password = password_hash($password, PASSWORD_DEFAULT);

                $_SESSION['firstName'] = $_POST['firstName'];
                $_SESSION['lastName'] = $_POST['lastName'];
                $_SESSION['cnic'] = $_POST['cnic'];
                $_SESSION['phone'] = $_POST['phone'];
                $_SESSION['address'] = $_POST['address'];
                $_SESSION['area'] = $_POST['area'];


                header("location: customerSignIn.php");
            } else {
                echo "Something went wrong... cannot redirect!";
            }
        }
        $stmt->close();
    }
    //  else {
    //     $sql = "INSERT INTO PersonInfo (email, password, firstName, lastName, CNIC, phone, address, area,title) VALUES (?, ?, ?, ?, ?, ?, ?, ?,'provider')";



    //     $stmt = $conn->prepare($sql);
    //     if ($stmt) {
    //         // the ssssss here are for representing the type of the parameters passed
    //         $stmt->bind_param("ssssssss", $param_email, $param_password, $param_fName, $param_lName, $param_cnic, $param_phone, $param_address, $param_area);

    //         // Set these parameters
    //         $param_email = $_POST['email'];
    //         // $param_password = password_hash($password, PASSWORD_DEFAULT);

    //         $param_password = $_POST['password'];
    //         $param_fName = $_POST['firstName'];
    //         $param_lName = $_POST['lastName'];
    //         $param_cnic = $_POST['cnic'];
    //         $param_phone = $_POST['phone'];
    //         $param_address = $_POST['address'];
    //         $param_area = $_POST['area'];


    //         // Try to execute the query
    //         if ($stmt->execute()) {


    //             $_SESSION['email'] = $_POST['email'];
    //             // $param_password = password_hash($password, PASSWORD_DEFAULT);

    //             $_SESSION['firstName'] = $_POST['firstName'];
    //             $_SESSION['lastName'] = $_POST['lastName'];
    //             $_SESSION['cnic'] = $_POST['cnic'];
    //             $_SESSION['phone'] = $_POST['phone'];
    //             $_SESSION['address'] = $_POST['address'];
    //             $_SESSION['area'] = $_POST['area'];


    //             header("location: providerInfoFill.php");
    //         } else {
    //             echo "Something went wrong... cannot redirect!";
    //         }
    //     }
    //     $stmt->close();
    // }
}
$conn->close();


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

    <title>Sign Up Customer</title>
</head>

<body>

    <!-- Navigation bar -->
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
                    <!-- <a href="#" class="btn btn-outline-light" role="button" aria-pressed="true">Sign Up</a> -->
                    <a href="signIn.php" class="btn btn-outline-light" role="button" aria-pressed="true">Sign In</a>
                </form>

            </div>
        </div>
    </nav>

    <!-- for making the tabs for different sign up options -->
    <div class="container">
        <!-- <ul class="nav nav-tabs justify-content-center nav-justified">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#customer" data-bs-toggle="tab">CUSTOMER</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#serviceProvider"  data-bs-toggle="tab">SERVICE PROVIDER</a>
            </li>
        </ul> -->
        <!-- for containing all the tabs -->
        <!-- <div class="tab-content" id="spTab">
            for containing the different tabs
            <div role="tabpanel" class="tab-pane active" id="customer"> -->
        <section class="sign_up_user">
            <h1 class="title">Sign up as customer</h1>
            <!-- name = "" is used for assigning the variable in which its value will be stored -->
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

                        <div class="formField col-lg-6">
                            <input id="firstName" class="input-text" type="text" name="firstName" required>
                            <label for="firstName" class="label">First Name</label>
                        </div>
                        <div class="formField col-lg-6">
                            <input id="lastName" class="input-text" type="text" name="lastName" required>
                            <label for="lastName" class="label">Last Name</label>
                        </div>
                        <div class="formField col-lg-6">
                            <input id="email" class="input-text" type="email" name="email" required>
                            <label for="email" class="label">email</label>
                        </div>
                        <div class="formField col-lg-6">
                            <input id="password" class="input-text" type="password" name="password" required>
                            <label for="password" class="label">Password</label>
                        </div>

                        <div class="formField col-lg-6">
                            <input id="cnic" class="input-text" type="text" name="cnic" required>
                            <label for="cnic" class="label">CNIC</label>
                        </div>
                        <div class="formField col-lg-6">
                            <input id="title" class="input-text" type="text" name="title" value="Customer" readonly>
                            <label for="title" class="label">Title</label>
                        </div>
                        <div class="formField col-lg-6">
                            <input id="phone" class="input-text" type="text" name="phone" required>
                            <label for="phone" class="label">Contact No.</label>
                        </div>




                        <div class="formField col-lg-6">




                            <select name="area">
                                <?php


                                while ($row = $result->fetch_assoc()) {
                                    $color == $color1 ? $color = $color2 : $color = $color1;
                                    $id = $row['area'];
                                    echo "<option value = '$id' style ='background:$color;'>$id</option>";
                                }
                                ?>
                            </select>

                        </div>
                        <div class="formField col-lg-12">
                            <input id="address" class="input-text" type="text" name="address" required>
                            <label for="address" class="label">Address</label>
                        </div>



                        <div class="formField col-lg-12 text-center">
                            <input type="submit" class="submit-btn" name="customerSignUp" value="Sign Up">
                        </div>


                    </div>
                </form>

                <div class="container text-center">

                    <h1 class="title">not a customer</h1>
                    <a href="signUpProvider.php" style="font-size: 35px;">Sign Up As Provider</a>
                </div>
            </div>
        </section>
    </div>

    <!-- <div role="tabpanel" class="tab-pane fade" id="serviceProvider">
                <section class="sign_up_user">
                    <h1 class="title">Sign up as service provider</h1>

                    <div class="container">
                        <form action="" method="POST">
                            <div class="signUpForm row">
                                <div class="formField col-lg-6">
                                    <input id="firstName" class="input-text" type="text" name="firstName" required>
                                    <label for="firstName" class="label">First Name</label>
                                </div>
                                <div class="formField col-lg-6">
                                    <input id="lastName" class="input-text" type="text" name="lastName" required>
                                    <label for="lastName" class="label">Last Name</label>
                                </div>
                                <div class="formField col-lg-6">
                                    <input id="email" class="input-text" type="email" name="email" required>
                                    <label for="email" class="label">email</label>
                                </div>
                                <div class="formField col-lg-6">
                                    <input id="password" class="input-text" type="password" name="password" required>
                                    <label for="password" class="label">Password</label>
                                </div>

                                <div class="formField col-lg-6">
                                    <input id="cnic" class="input-text" type="text" name="cnic" required>
                                    <label for="cnic" class="label">CNIC</label>
                                </div>
                                <div class="formField col-lg-6">
                                    <input id="title" class="input-text" type="text" name="title" value="Provider" readonly>
                                    <label for="title" class="label">Title</label>
                                </div>
                                <div class="formField col-lg-6">
                                    <input id="phone" class="input-text" type="text" name="phone" required>
                                    <label for="phone" class="label">Contact No.</label>
                                </div>
                               


                                <div class="formField col-lg-6">
                                <?php


                                // $sql = "SELECT * FROM Area";
                                // $result = $conn->query($sql);
                                // $color1 = " #D4A59A";
                                // $color2 = " #f3e9e7";
                                // $color = $color1;

                                ?>



                                    <select name="area">
                                        <?php


                                        while ($row = $result->fetch_assoc()) {
                                            $color == $color1 ? $color = $color2 : $color = $color1;
                                            $id = $row['area'];
                                            echo "<option value = '$id' style ='background:$color;'>$id</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="formField col-lg-12">
                                    <input id="address" class="input-text" type="text" name="address" required>
                                    <label for="address" class="label">Address</label>
                                </div>
                                <div class="formField col-lg-12 text-center">
                                    <input type="submit" class="submit-btn" name="providerSignUp" value="Sign Up">
                                </div>
                            </div>
                        </form>

                    </div>

                </section>
            </div> -->
    <!-- </div> -->

    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>

</html>