<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Our Resturant</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">OUR RESTAURANT</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#chef">Chef</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#Waiter">Waiter</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/DBMSPROJECT/index.php">Homepage</a></li>
                    <span class="badge badge-secondary"><li class="nav-item"><a class="nav-link js-scroll-trigger" href="/DBMSPROJECT/login.php">Logout</a></li></span> 
                   
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container d-flex h-100 align-items-center">
            <div class="mx-auto text-center">
                <h1 class="mx-auto my-0 text-uppercase">Luxury Palace</h1>
                <h2 class="text-white-50 mx-auto mt-2 mb-5">One cannot think well, love well, sleep well, if one has not
                    dined well.</h2>
                <!-- <a class="btn btn-primary js-scroll-trigger" href="#about">Get Started</a> -->
            </div>
        </div>
    </header>
    <div class="container mx-auto my-5" id="chef">
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">S.No</th>
            <th scope="col">Name</th>
            <th scope="col">Handle </th>
            <th scope="col">Phone Number</th>
            <th scope="col">Options</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Desert</td>
            <td>98093819823</td>
            <td><button class="btn btn-dark" type="submit"><a href="">Edit</a></button></td>
          </tr>
          
        </tbody>
      </table>
    </div>
    <div class="container mx-auto my-5" id="Waiter">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">S.No</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Options</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Badhanpur</td>
                <td>9018409823</td>
                <td><button class="btn btn-dark" type="submit"><a href="">Edit</a></button></td>
              </tr>
              
            </tbody>
          </table>
        </div>
    <section class="contact-section bg-black">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Address</h4>
                            <hr class="my-4" />
                            <div class="small text-black-50">Nit Jalandhar,punjab,India</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Email</h4>
                            <hr class="my-4" />
                            <div class="small text-black-50"><a href="#!">jadoun1239@gmail.com.com</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Phone</h4>
                            <hr class="my-4" />
                            <div class="small text-black-50">+91 9819378461</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social d-flex justify-content-center">
                <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50">
        <div class="container">Copyright © All Right Reserved 2020</div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>