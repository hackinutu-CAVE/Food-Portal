<?php
error_reporting(0);
@ob_start();
session_start();
require '/var/www/html/vendor/autoload.php';
use Auth0\SDK\Auth0;

$auth0 = new Auth0([
    'domain' => 'cave421.us.auth0.com',
    'client_id' => 'Sxs0ka70IwMzJJW74Fw3LaAFVDxP7Vbw',
    'client_secret' => '-0K2p4wvZJ7pNhZeM6cyHJXKEqoCvf5GIwccN_VPPzFyo6MlbH5Zq6uo52c22ZCn',
    'redirect_uri' => 'ngrokurl',
    'scope' => 'openid profile email',
]);

$userInfo = $auth0->getUser();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>FOOD CAVE</title>

    <!-- Add location script -->
    <script>
    var x = document.getElementById("loc");

    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
      }
    }

    function showPosition(position) {
      var lat = position.coords.latitude;
      var lng = position.coords.longitude;
      // alert(lat+","+lng);
      document.cookie = "lat = " + lat;
      document.cookie = "lng = " + lng;
    }
  </script>

    <!-- End location script -->
    <link rel="icon" type="image/png" href="images/logo.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,500|Dosis:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php">FOOD CAVE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="donate.php" class="nav-link">Donate</a></li>
          <li class="nav-item"><a href="receive.php" class="nav-link">Receive</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->
  
  <div class="block-31" style="position: relative;">
    <div class="owl-carousel loop-block-31 ">
      <div class="block-30 block-30-sm item" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center">
              <h2 class="heading">Get In Touch</h2>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row block-9">
        <div class="col-md-6 pr-md-5">
          <form action="<?php echo $_SERVER["PHP_SELF"] ?>", method="POST">
            <div class="form-group">
              <input type="text" id="Name" name="Name"  class="form-control px-3 py-3" placeholder="Your Name" required>
            </div>
            <div class="form-group">
              <input type="text" id="Email" name="Email" class="form-control px-3 py-3" placeholder="Your Email" required>
            </div>
            <!-- <div class="form-group">
              <input type="text" class="form-control px-3 py-3" placeholder="Subject">
            </div> -->
            <div class="form-group">
              <textarea name="" id="" cols="30" rows="7" id="Message" name="Message" class="form-control px-3 py-3" placeholder="Message" required></textarea>
            </div>
            <div class="form-group">
              <input type="submit" name="submit1" value="Send Message" class="btn btn-primary py-3 px-5">
            </div>
          </form>
          
          <?php

              // error_reporting(0);

              //connect to mysql server
              $host = "mysql-server";
              $user = "root";
              $pass = "root";
              $db = "food-portal";
              try {
                  $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
                  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              }
              catch(PDOException $e) {
                  echo "Connection failed: " . $e->getMessage();
              }

              $userInfo = $auth0->getUser();

              if(isset($_POST["submit1"])) {
                $name = $_POST["Name"];
                $email = $_POST["Email"];
                $message = $_POST["Message"];
                
            
                try{
                  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  $sql = "INSERT INTO `contact`(name, email, message)  VALUES ('$name', '$email', '$message')";
                  $conn->exec($sql);
                }
                catch(PDOException $e){
                  echo $e->getMessage();
                }
                $conn = null;
              }

            ?>

        </div>

        <div class="col-md-6" id="map"></div>
      </div>
    </div>
  </div>

  
  
  <footer class="footer">
    <div class="container">
      <div class="row mb-5">

        <div class="col-md-6 mb-5 mb-md-0">
          <img src="images/logo.png" alt="Image placeholder" class="img-fluid">
        </div>

        <div class="col-md-6 col-lg-6">
          <div class="block-23">
            <h3 class="heading-section">Get Connected</h3>
              <ul>
                <li><span class="icon icon-map-marker"></span><span class="text">123, Regular Address,India.</span></li>
                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+91 1234567890</span></a></li>
                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">foodcave@email.com</span></a></li>
              </ul>
            </div>
        </div>

      </div>
    </div>
  </footer>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>

  <script src="js/jquery.fancybox.min.js"></script>
  
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>
