<?php
require_once('connection.php');
session_start();

$sql = "SELECT categoryName FROM Category";
$result = $conn->query($sql);
$color1 = " #D4A59A";
$color2 = " #f3e9e7";
$color = $color1;

// if (isset($_POST['next'])) {
//     if($_POST['category'] != 'not selected'){
//         $_SESSION['categoryName']=$_POST['category'];
//         $sql = "SELECT categoryID FROM Category WHERE categoryName= '" . $_POST['category'] . "' ";
//         $result = $conn->query($sql);
//         $row = $result->fetch_assoc();
//         $_SESSION['categoryID'] = $row['categoryID'];
//         echo $_SESSION['categoryID'];

//         header("location:customerRequestToHire.php");
//     }
//     else{
//         header("location:customerSearchService.php?Empty= Please select option first.");
//     }

    

    
// }


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['next'])) {

        if($_POST['category'] != 'not selected'){

            $_SESSION['categoryName']=$_POST['category'];
            
            $sql = "SELECT categoryID FROM Category WHERE categoryName= '" . $_POST['category'] . "' ";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $_SESSION['categoryID'] = $row['categoryID'];
            echo $_SESSION['categoryID'];


            $sql = "SELECT personID FROM PersonInfo WHERE email= '" . $_SESSION['email'] . "' ";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $_SESSION['id'] = $row['personID'];
            echo $_SESSION['id'];

            $_SESSION['experience']= $_POST['experience'];
            $_SESSION['serviceCharges']=$_POST['serviceCharges'];


            $sql = "UPDATE ServiceProvider
            SET experience='" . $_POST['experience'] . "',
            serviceCharges='" . $_POST['serviceCharges'] . "',
            categoryID='" . $_SESSION['categoryID'] . "'
            WHERE providerID= '" . $_SESSION['id'] . "' AND categoryID = 1";

$result = $conn->query($sql);

header("location:providerSkillsAdd.php");
    
           
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

    <title>Provider Fill Info</title>
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




            <div class="col-sm-12">
                <!-- start dashboard area -->
                <section class="sign_up_user">
                    <h1 class="title">Profile Step 2</h1>
                    <h1 class="title " >Select category</h1>
                    <!-- name = "" is used for assigning the variable in which its value will be stored -->
                    <div class="container">
                        <form action="" method="POST">
                            <div class="signUpForm row">

                                <div class="formField col-lg-12">
                                    <input id="experience" class="input-text" type="text" name="experience">
                                    <label for="experience" class="label">Experience</label>
                                </div>
                              
                            
                                <div class="formField col-lg-12">
                                    <input id="serviceCharges" class="input-text" type="text" name="serviceCharges">
                                    <label for="serviceCharges" class="label">Service Charges</label>
                                </div>

                                <select name="category">
                                    <?php
                                    while ($row = $result->fetch_assoc()) {
                                        $color == $color1 ? $color = $color2 : $color = $color1;
                                        $category = $row['categoryName'];
                                        echo "<option value = '$category' style ='background:$color;'>$category</option>";
                                    }
                                    ?>
                                </select>

                                <div class="formField col-lg-12 text-center">
                                    <input type="submit" class="submit-btn" name="next" value="next">
                                </div>
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