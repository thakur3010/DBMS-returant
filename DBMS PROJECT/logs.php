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
    <div class="container my-2">
    <label>Reserved Logs</label>
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Date</th>
      <th scope="col">Seat No</th>
      <th scope="col">Sitting</th>
    </tr>
  </thead>
     
  <tbody>
    <?php
      $index=1;
    while($sno=mysqli_fetch_array($retval)){
    $sql1="SELECT dt,seat_no,sitting from reservedseats where serial_no=$sno[0]";
    $result=mysqli_query($conn,$sql1);
    if(!$result){
      echo"NO LOGS TILL NOW";
    }
    else{
      while($row=mysqli_fetch_assoc($result)){
      
    echo'

    <tr>
      <th scope="row">'.$index.'</th>
      <td>'.$row['dt'].'</td>
      <td>'.$row['seat_no'].'</td>
      <td>'.$row['sitting'].'</td>
    </tr>
';
$index=$index+1;
}
    }
  }
?>
  </tbody>
</table>
<label>Order Logs</label>
    <table class="table table-hover table-dark">
  <thead>
  <tr>
      <th scope="col">S.No</th>
      <th scope="col">Date</th>
      <th scope="col">Food Items</th>
      <th scope="col">Total Cost</th>
      
    </tr>
  </thead>
  <tbody>
  <?php
   $index=1;
 
   $sql="SELECT serial_no FROM orders where sno = $SNO[0] order by serial_no desc";
   $retval = mysqli_query($conn,$sql);
   while($sno1=mysqli_fetch_array($retval)){


   $sql2="SELECT dt,qty,cost from orders where serial_no=$sno1[0]";
   $result1=mysqli_query($conn,$sql2);


   if(!$result1){
     echo"NO LOGS TILL NOW";
   }
   else{ 


     while($row1=mysqli_fetch_assoc($result1)){
  
    echo'
    <tr>
      <th scope="row">'.$index.'</th>
      <td>'.$row1['dt'].'</td>
      <td>'.$row1['qty'].'</td>
      <td>'.$row1['cost'].'</td>
    </tr>';
   $index=$index+1;
  }
      }
    }
    ?>
  </tbody>
</table>
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