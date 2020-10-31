<?php
$showAlert=false;
$showError=false;
$exists=false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
include 'sign.php';
$username=$_POST["username"];
$password=$_POST["password"];
$cpassword=$_POST["cpassword"];

$sql1="SELECT * FROM `users` WHERE `username`='$username'";
$result1=mysqli_query($conn,$sql1);
$num=mysqli_num_rows($result1);
if($num < 1){
if($cpassword==$password){
    $sql="INSERT INTO `users` (`username`,`password`,`dt`) VALUES('$username','$password',current_timestamp())" ;
    $result=mysqli_query($conn,$sql);
    if($result){
        $showAlert=true;
    }
    
}
else{
    $showError=true;
}
}
else{
    $exists=true;
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Grayscale - Start Bootstrap Theme</title>
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
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/DBMSPROJECT/index.php">Homepage</a></li>
                    
                </ul>
            </div>
        </div>
    </nav>
    
    
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto my-5 text-center">
                    <i class="far fa-paper-plane fa-2x mb-2 my-5 text-white"></i>
                    <h2 class="text-white mb-5">Signup</h2>
                    <form class="form-inline d-flex" method="post" action="/DBMSPROJECT/signup.php">
                        <input class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" id="username" type="email" name="username"
                            placeholder="Enter email address..." />
                        <!-- <input class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" id="inputEmail" type="text" placeholder="Enter Password..." /> -->
                        <br>
                        <div class="form-group">
                            <input type="password" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0"
                                id="password" name="password" placeholder="Enter Your Password...">
                                <input type="password" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0"
                                id="cpassword" name="cpassword" placeholder="confirm password...">
                        </div>
                        <hr>
                        <button class="btn btn-primary  my-2" type="submit">Signup</button>
                       
                        <?php
    if($showAlert){
        echo'<div class="alert alert-success alert-dismissible fade show mx-3 my-1" role="alert">
        <strong>success</strong> You have signed in successfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    if($showError){
        echo'<div class="alert alert-danger alert-dismissible fade show mx-5 my-1" role="alert">
        <strong>warning</strong> password doesnot matched.
        <button type="button" class="close" data-dismiss="alert " aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';   
    }
    if($exists){
        echo'<div class="alert alert-danger alert-dismissible fade show mx-5 my-1" role="alert">
        <strong>warning</strong>  Username already exists.
        <button type="button" class="close" data-dismiss="alert " aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';   
    }
    ?>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <!-- <section class="signup-section" id="signup">
        
    </section> -->

    <!-- Signup-->
    
    <!-- Contact-->
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
        <div class="container">Copyright © Your Website 2020</div>
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