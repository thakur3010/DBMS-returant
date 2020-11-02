<?php
$reason=false;
$reason1=false;
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location: login.php");
  exit;
}
include 'sign.php';
$usersname=$_SESSION['username'];
$sql1="SELECT `sno` FROM `users` WHERE `username`='$usersname'";
$result=mysqli_query($conn,$sql1);
mysqli_data_seek($result,0);
$SNO=mysqli_fetch_row($result);
$sql="SELECT serial_no FROM reservedseats where sno = $SNO[0] order by serial_no desc";
$retval = mysqli_query($conn,$sql);


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
        <a class="navbar-brand js-scroll-trigger" href="/DBMSPROJECT/order.php">DASH BOARD</a>

            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/DBMSPROJECT/logout.php">Logout</a>
                    </li>
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
    <!-- About-->

    <div class="container my-5">
        <label>Seat Reserved</label>
        <?php
    $sql="SELECT serial_no FROM reservedseats where sno = $SNO[0] order by serial_no desc";
    $retval = mysqli_query($conn,$sql);
       
       if(! $retval ) {
          // die('Could not get data: ' . mysqli_error($conn));
         $reason=true;

       }
       else{
       while($row = mysqli_fetch_array($retval)) {
        $sql1="SELECT seat_no,dt FROM reservedseats WHERE serial_no=$row[0]";
        $result=mysqli_query($conn,$sql1);
        // mysqli_data_seek($result,0);
       while( $reserved=mysqli_fetch_assoc($result) )
        {
    
    
    echo'<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">Seat No</span>
  </div>
  <input type="text" class="form-control" aria-label="Sizing example input"
  placeholder="'.$reserved['seat_no'].'" aria-describedby="inputGroup-sizing-default">
</div>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-default">Date of Reservation</span>
  </div>
  <input type="text" class="form-control" aria-label="Sizing example input" placeholder="'.$reserved['dt'].'" aria-describedby="inputGroup-sizing-default">
</div>';
break;
}
break;
}
}
if($reason) 
{
  echo"<br>NO SEATS RESERVEVD TILL NOW<br>";
}
echo"<label>Recent order</label>";
$sql="SELECT serial_no FROM orders where sno = $SNO[0] order by serial_no desc";
$retval = mysqli_query($conn,$sql);
   
   if(! $retval ) {
      die('Could not get data: ' . mysqli_error($conn));
   }  
   
   while($row = mysqli_fetch_array($retval)) {
   $sql1="SELECT c1,c2,c3,c4,c5,c6,c7,c8,c9,c10,c11,c12,qty1,qty2,qty3,qty4,qty5,qty6,qty7,qty8,qty9,qty10,qty11,qty12,cost FROM orders WHERE serial_no=$row[0]";
   $result=mysqli_query($conn,$sql1);
   // mysqli_data_seek($result,0);
  
   if(!$result){
     echo"its not functioning properly";
   }
   else{
  while( $order=mysqli_fetch_assoc($result) ){

  
  
    


    echo '
    <ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Course Item 1 '.$order['c1'].'
    <span class="badge badge-primary badge-pill">'.$order['qty1'].'</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
  Course Item 2  '.$order['c2'].'
    <span class="badge badge-primary badge-pill">'.$order['qty2'].'</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
  Course Item 3 '.$order['c3'].'
    <span class="badge badge-primary badge-pill">'.$order['qty3'].'</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Course Item 4 '.$order['c4'].'
    <span class="badge badge-primary badge-pill">'.$order['qty4'].'</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
  Course Item 5 '.$order['c5'].'
    <span class="badge badge-primary badge-pill">'.$order['qty5'].'</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
  Course Item 6 '.$order['c6'].'
    <span class="badge badge-primary badge-pill">'.$order['qty6'].'</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Course Item 7 '.$order['c7'].'
    <span class="badge badge-primary badge-pill">'.$order['qty7'].'</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
  Course Item 8 `'.$order['c8'].'
    <span class="badge badge-primary badge-pill">'.$order['qty8'].'</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
  Course Item 9 '.$order['c9'].'
    <span class="badge badge-primary badge-pill">'.$order['qty9'].'</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Course Item 10 '.$order['c10'].'
    <span class="badge badge-primary badge-pill">'.$order['qty10'].'</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
  Course Item 11 '.$order['c11'].'
    <span class="badge badge-primary badge-pill">'.$order['qty11'].'</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
  Course Item 12 '.$order['c12'].'
    <span class="badge badge-primary badge-pill">'.$order['qty12'].'</span>
  </li>
</ul>';
echo'                                                  Total cost-<label>'.$order['cost'].'</label>';
  break;
}
break;
}}
// else{
//   echo"<br> NO RECENTS ORDER <br>";
// }
?>
    </div>



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