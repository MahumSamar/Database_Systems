<?php
require_once('connection.php');
session_start();

if (isset($_POST['accept'])) {

    $sql = "UPDATE CustomerRequest
    SET status='accepted' WHERE requestID = '" . $_POST['requestID'] . "'";

    $result = $conn->query($sql);
    if ($result) {
        header("location:providerViewRequests.php");
    }
}

if (isset($_POST['cancel'])) {

    $sql = "UPDATE CustomerRequest
    SET status='cancelled' WHERE requestID = '" . $_POST['requestID'] . "'";

    $result = $conn->query($sql);
    if ($result) {
        header("location:providerViewRequests.php");
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

    <title>Provider View Requests</title>
    <style>
        table {


            border-collapse: collapse;
            width: 100%;
            color: #5C2018;
            font-size: 15px;
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
                                    <!-- <circle cx="12" cy="12" r="10"></circle> -->
                                    <!-- <line x1="12" y1="8" x2="12" y2="16"></line>
                        <line x1="8" y1="12" x2="16" y2="12"></line> -->
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
            <div class="col-lg-10">
                <!-- start dashboard area -->
                <section class="sign_up_user">
                    <h1 class="title">Hired Services</h1>
                    <!-- name = "" is used for assigning the variable in which its value will be stored -->
                    <div class="container">
                        <form action="" method="POST">
                            <div class="signUpForm row">
                                <table>
                                    <tr>
                                        <th>Request ID</th>
                                        <th>Customer Name</th>
                                        <th>Date Hired</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Status</th>


                                    </tr>


                                    <?php
                                    $sql = "SELECT requestID, firstName, lastName, CR.dateHired, phone,email,status
                                FROM CustomerRequest CR                        
                                         INNER JOIN PersonInfo PI on CR.customerID = PI.personID
                                WHERE CR.providerID = '" . $_SESSION['id'] . "'
                                 AND (status = 'pending' || status = 'accepted' || status = 'cancelled')";
                                    $result = $conn->query($sql);
                                    // $sql="SELECT * FROM CustomerRequestHistory";
                                    // $result = $conn->query( $sql);
                                    // $stmt = $conn -> prepare($sql);
                                    if ($result) {
                                        // $stmt -> bind_param("s", $param_id);
                                        // $param_id=$_SESSION['id'];

                                        // if(){
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr><td>" . $row['requestID'] . "</td><td>" . $row['firstName'] . " " . $row['lastName']
                                                . "</td><td>" . $row['dateHired'] .  "</td><td>" . $row['phone'] .  "</td><td>" . $row['email'] .
                                                "</td><td>" . $row['status'] . "</td></tr>";
                                        }
                                        echo "<br>";
                                        echo "</table>";

                                        // }


                                    } else {
                                        echo "<br>";

                                        echo "You are not hired right now.";
                                    }




                                    ?>
                                </table>
                                <br>
                                <div class="container my-4">

                                </div>
                                <div class="formField col-lg-12">

                                    <label for="email" class="label">Request ID</label>
                                </div>

                                <?php
                                $sql = "SELECT requestID, firstName, lastName, CR.dateHired, phone,email,status
                               FROM CustomerRequest CR                        
                                        INNER JOIN PersonInfo PI on CR.customerID = PI.personID
                               WHERE CR.providerID = '" . $_SESSION['id'] . "'
                                AND (status = 'pending' || status = 'accepted' || status = 'cancelled')";
                                $result = $conn->query($sql);
                                $color1 = " #D4A59A";
                                $color2 = " #f3e9e7";
                                $color = $color1;

                                ?>

                                <select name="requestID">
                                    <?php
                                    while ($row = $result->fetch_assoc()) {
                                        $color == $color1 ? $color = $color2 : $color = $color1;
                                        $id = $row['requestID'];
                                        echo "<option value = '$id' style ='background:$color;'>$id</option>";
                                    }
                                    ?>
                                </select>

                                <div class="formField col-lg-12 text-center">
                                    <input type="submit" class="submit-btn" name="accept" value="accept">
                                </div>

                                <div class="formField col-lg-12 text-center">
                                    <input type="submit" class="submit-btn" name="cancel" value="cancel">
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