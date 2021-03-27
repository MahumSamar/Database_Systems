<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link href="home.css" rel="stylesheet">
    <link href="signUp.css" rel="stylesheet">

    <title>Home</title>
</head>

<body>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
        crossorigin="anonymous"></script>

    <!-- <div class="container"> -->
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark " style="background-color:#5C2018; font-size: large;">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.html">SERVISTA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="aboutUs.php">About Us</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="https://docs.google.com/forms/d/e/1FAIpQLSeUr3MzeuTn0IfXMjRv8I2vRvHlpt_KiT2Gsd4YxlhHMwFn_w/viewform" 
                        target="_blank">Contact Us</a>
                    </li>
                    
                </ul>
                <form class="d-flex">
                    <a href="signUp.php" class="btn btn-outline-light" role="button" aria-pressed="true">Sign Up</a>
                    <a href="signIn.php" class="btn btn-outline-light" role="button" aria-pressed="true">Sign In</a>
                </form>

            </div>
        </div>
    </nav>
    <!-- Slide show -->
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"></li>
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"></li>
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="masonCrosel.jpg" class="d-block w-100 " style="max-height: 700px !important;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="font-size: 55px; "  >MASON</h5>
                    <p style="font-size: 45px; "> We have our MASONS available for all your issues. </p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="electricianCrousel.jpg" class="d-block w-100"  style="max-height: 700px !important;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="font-size: 55px; ">ELECTRICIAN</h5>
                    <p style="font-size: 45px; ">“SHOCKS AND SPARKS ARE NOT THERE TO WORRY ABOUT. ELECTRICIANS ARE THERE TO REALLY SHOCK YOU!”</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="plumberCrousel.jpg" class="d-block w-100"  style="max-height: 700px !important;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="font-size: 55px; ">PLUMBER</h5>
                    <p style="font-size: 45px; ">Plumbatic- Just One Call! And will do it all! Reach us with any of your problem and get it resolved!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="carpenterCrousel.jpg" class="d-block w-100"  style="max-height: 700px !important;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="font-size: 55px; ">CARPENTER</h5>
                    <p style="font-size: 45px; ">From Blue Prints to Closets - Tackling a wide variety of construction repairs and remodeling projects.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="interiorDesignerCrousel.jpg" class="d-block w-100"  style="max-height: 700px !important;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="font-size: 55px; ">INTERIOR DESIGNER</h5>
                    <p style="font-size: 45px; ">Live with passion, for which life has its rights!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="gardenerCrousel.jpg" class="d-block w-100"  style="max-height: 700px !important;" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 style="font-size: 55px; ">GARDENER</h5>
                    <p style="font-size: 45px; ">NATURE WEARS COLORS AND COLORS MAKE THE WORLD CAPTIVATING! BUT TO SOOTHE THE SOUL, LET US COME WITH SOME GREEN! </p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
    <!-- services info containers -->
    <div class="container containerColor1 my-4">
        <!-- <img src="https://source.unsplash.com/200x200/?electrician" class="rounded float-start" alt="..."> -->

        <!-- first service info -->
        <div class="row featurette d-flex justify-content-center align-items-center">
            <div class="col-md-7">
                <h2 class="featurette-heading">Mason: <span class="text-muted">MASONRII:</span></h2>
                <p class="lead">Have an unnailed clock ? 
Have got some unclipped equipment? 
Have got the door knob unfixed?
NO WORRIES! We have our MASONS available for such issues. Just call them and they will be there to provide their services for whatever your problem is!
Just try to reach us and Mason will get to reach you to provide each and every facility they can get to provide you with!
</p>
                
            </div>
            <div class="col-md-5">
                <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                    src="mason.jpg" alt="">

            </div>
        </div>

    </div>

    <div class="container containerColor2 my-4">
        <!-- second service info -->
        <div class="row featurette d-flex justify-content-center align-items-center">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Electrician: <span class="text-muted">Electro Serve – “SHOCKS AND SPARKS ARE NOT THERE TO WORRY ABOUT.
                 ELECTRICIANS ARE THERE TO REALLY SHOCK YOU!”</span></h2>
                <p class="lead">Based on the services provided, Electric Services provided by our electricians will suit the best depending upon the need of customer. You have to mention your problems and get our Electricians hired. Their experience will let you configure the concerned matter.
YOU’LL FIND OUR ELECTRIC SERVICES ENLIGHTENEING!
</p>
               
            </div>
            <div class="col-md-5 order-md-1">
                <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                    src="electrician.jpg" alt="">

            </div>
        </div>


    </div>

    <div class="container containerColor1 my-4">
        <!-- third service info -->
        <div class="row featurette d-flex justify-content-center align-items-center">
            <div class="col-md-7">
                <h2 class="featurette-heading">PLUMBER: <span class="text-muted">Plumbatic- Just One Call! And will do it all! Reach us with 
                any of your problem and get it resolved!</span></h2>
                <p class="lead">Plumbers services are provided with best of the efforts. We have skilled workers
                 who have hands On experience in solving the issues related to plumbing.
 From Pipe lines in the ground to water tanks at the roof top!
What would be the matter, there is no need to worry Now!  Because we are here for your ease. 
</p>
                

            </div>
            <div class="col-md-5">
                <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                    src="plumberCrosel.jpg" alt="">

            </div>
        </div>

    </div>

    <div class="container containerColor2 my-4">
        <!-- 4 service info -->
        <div class="row featurette d-flex justify-content-center align-items-center">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">CARPENTER: <span class="text-muted">From Blue Prints to Closets - Tackling a wide variety 
                of construction repairs and remodeling projects.</span></h2>
                <p class="lead">Are you tired of old things? 
Do you want to get rid of old cupboards?
Do you want to throw your antique products just due to the reason that they are old, but actually you want to keep the traditions of your ancestors with you?
DON’T WORRY!
We are here to solve your problems. We are enabling you to give new shapes to your wooden products, whether they are antique or new. We are providing carpentry services, which will let you do these things with ease. Anyone at home, whether a child or a female or some old person can easily contact us and get our carpenters hired for whatever wooden work you require.
WE ARE TARGETED AT:
Make old look new, new look better, and better look the best.
</p>
               
            </div>
            <div class="col-md-5 order-md-1">
                <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                    src="carpenter.jpg" alt="">

            </div>
        </div>


    </div>

    <div class="container containerColor1 my-4">
        <!-- 5 service info -->
        <div class="row featurette d-flex justify-content-center align-items-center">
            <div class="col-md-7">
                <h2 class="featurette-heading">INTERIOR DESIGNER: <span class="text-muted">Live with passion, for which life has its rights!</span></h2>
                <p class="lead">Home is the place for comfort, LET US MAKE IT A ZONE FULL OF FLORAL DESIGNS!
Do you want something new to make your life at home innovative, Come and Contact us! We are providing services 
according to your desires. We are aimed to provide each and every facility to our customers for whatever they want. 
Interior designs and decorations are made the best by our service providers, who remain ready to do something big and 
thus they want to make their career by bringing innovations to the lives of others.
</p>
               
            </div>
            <div class="col-md-5">
                <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                    src="designer.jpg" alt="">

            </div>
        </div>

    </div>

    <div class="container containerColor2 my-4">
        <!-- 4 service info -->
        <div class="row featurette d-flex justify-content-center align-items-center">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">GARDENER: <span class="text-muted">MAKE GREEN:
NATURE WEARS COLORS AND COLORS MAKE THE WORLD CAPTIVATING! BUT TO SOOTHE THE SOUL, LET US COME WITH SOME GREEN! 
 </span></h2>
                <p class="lead">Do you want to décor your house with nature? Do you want to add to the captivation in your locality? Do you want to fill your life with bliss for which real bliss is directly related to nature?
So, we are here to provide such a facility to you. We are giving our services to enhance the captivation in your locality by planting some more greenery. Whatever may be the concern, our gardeners will provide their services in accordance to your wishes. Gardeners are available here. Services are updated and given accordingly.

</p>
               
            </div>
            <div class="col-md-5 order-md-1">
                <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                    src="gardener.jpg" alt="">

            </div>
        </div>


    </div>

    <!-- </div> -->



</body>

</html>