<?php
require_once('connection.php');
session_start();
echo $_SESSION['area'];

// echo $_SESSION['categoryName'];
if (isset($_POST['search'])) {
    $_SESSION['providerID'] = $_POST['ProviderID'];
    echo $_SESSION['providerID'];

    header("location:customerProviderInfo.php");
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

    <title>Customer View Providers</title>
    <style>
        table {


            border-collapse: collapse;
            width: 100%;
            color: #5C2018;
            font-size: 20px;
            text-align: center;

        }

        th {
            background-color: #5C2018;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #D4A59A;
        }
    </style>
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
        <!-- container start -->
        <div class="row">
            <!-- row start -->
            <nav id="sidebarMenu" class="col-sm-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="customerSignIn.php">
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
                                    <!-- <circle cx="12" cy="12" r="10"></circle> -->
                                    <!-- <line x1="12" y1="8" x2="12" y2="16"></line>
                        <line x1="8" y1="12" x2="16" y2="12"></line> -->
                                </svg>
                            </a>
                        </h6>

                        <li class="nav-item">
                            <a class="nav-link" href="customerHiredServices.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                                    <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                    <polyline points="13 2 13 9 20 9"></polyline>
                                </svg>
                                Hired Services
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="customerSearchService.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                Hire a Service
                            </a>
                        </li>



                    </ul>


                </div>
            </nav>
            <div class="col-sm-10">
                <!-- start dashboard area -->
                <section class="sign_up_user">
                    <h1 class="title">Searched Services</h1>
                    <!-- name = "" is used for assigning the variable in which its value will be stored -->
                    <div class="container">
                        <form action="" method="POST">
                            <div class="signUpForm row">
                                <table>
                                    <tr>
                                        <th>Provider ID</th>

                                        <th>Provider Name</th>
                                        <th>Experience</th>
                                        <th>Service Charges</th>



                                    </tr>


                                    <?php
                                    // to display electrician info
                                    $sql = "SELECT providerID,firstName, lastName, experience, serviceCharges
                                    FROM ServiceProvider
                                            -- INNER JOIN Category C on ServiceProvider.categoryID = C.categoryID
                                            INNER JOIN PersonInfo PI on ServiceProvider.providerID = PI.personID
                                    WHERE PI.area = '" . $_SESSION['area'] . "'
                                        
                                    AND ServiceProvider.categoryID =  '" . $_SESSION['categoryID'] . "'";

                                    $result = $conn->query($sql);

                                    if ($result) {
                                        // $stmt -> bind_param("s", $param_id);
                                        // $param_id=$_SESSION['id'];

                                        // if(){
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr><td>" . $row['providerID'] .  "</td><td>" . $row['firstName'] . " " . $row['lastName']
                                                . "</td><td>" . $row['experience'] .  "</td><td>" . $row['serviceCharges'] . "</td></tr>";
                                        }
                                        echo "<br>";
                                        echo "</table>";

                                        // }




                                    }
                                    if (mysqli_num_rows($result) == 0) {
                                        echo "<br>";

                                        echo "Selected service is not in your area.";
                                        $make = false;

                                        echo "<br>";
                                    }


                                    ?>





                                </table>

                                <div>


                                    <br>
                                    <?php
                                    // to select provider id from combo box
                                    $sql = "SELECT providerID,firstName, lastName, experience, serviceCharges
                                    FROM ServiceProvider
                                            --  INNER JOIN Category C on ServiceProvider.categoryID = C.categoryID
                                             INNER JOIN PersonInfo PI on ServiceProvider.providerID = PI.personID
                                    WHERE PI.area = '" . $_SESSION['area'] . "'
                                        
                                      AND ServiceProvider.categoryID =  '" . $_SESSION['categoryID'] . "'";
                                    $result = $conn->query($sql);
                                    $color1 = " #D4A59A";
                                    $color2 = " #f3e9e7";
                                    $color = $color1;

                                    ?>

                                    <select name="ProviderID">
                                        <?php
                                        while ($row = $result->fetch_assoc()) {
                                            $color == $color1 ? $color = $color2 : $color = $color1;
                                            $id = $row['providerID'];
                                            echo "<option value = '$id' style ='background:$color;'>$id</option>";
                                        }
                                        ?>
                                    </select>



                                    <div class="formField col-lg-12 text-center">
                                        <input type="submit" class="submit-btn" name="search" value="Search">
                                    </div>
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