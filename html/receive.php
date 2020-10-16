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
    'redirect_uri' => 'https://b34fd096e755.ngrok.io',
    'scope' => 'openid profile email',
]);

$userInfo = $auth0->getUser();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>FOOD CAVE </title>

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

  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">

  <style>
    #map {
      width: 90%;
      height: 600px;
      background-color: grey;
      margin: 5% auto;
    }
  </style>
  <style type="text/css">
    table,tr,td,th{
      text-align: center;
      border-collapse: collapse;
      font-family: ;
      border-top: 0px;
      border-left: 0px;
      border-right: 0px;
      font-size: 20px;
    }
    th{
      font-weight: 10;
    }
    td,th{
      width: 170px;
      height: 40px;
      padding: 8px;
      text-align: left;
      border-bottom: 2px solid #a0a0a0;
    }
    tr:hover {
      background-color: #f5f5f5;
    }
    th{
      background: #f7ca44; 
      color: #ffffff;
      font-weight: 500;
      text-transform: uppercase;
    }
  </style>

  <script>
    let map, infoWindow;

    function initMap() {
      map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 19.2183, lng: 72.9781 },
        zoom: 6,
      });
      infoWindow = new google.maps.InfoWindow();

      // Try HTML5 geolocation.
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          (position) => {
            const pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude,
            };
            var marker = new google.maps.Marker({position: pos, map: map});
          },
          () => {
            handleLocationError(true, infoWindow, map.getCenter());
          }
          );
      } 
      else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
      }
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
      infoWindow.setPosition(pos);
      infoWindow.setContent(
        browserHasGeolocation
        ? "Error: The Geolocation service failed."
        : "Error: Your browser doesn't support geolocation."
        );
      infoWindow.open(map);
    }
  </script>
  <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsVoY4zW3LEvh1FYV00kTm2LH71ArmzOs&callback=initMap"></script>
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
          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="donate.php" class="nav-link">Donate</a></li>
          <li class="nav-item active"><a href="receive.php" class="nav-link">Receive</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->

  <div class="block-31" style="position: relative;">
    <div class="owl-carousel loop-block-31 ">
      <div class="block-30 block-30-sm item" style="background-image: url('images/Food-Waste.png');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-7">
              <h2 class="heading">Better To Share Than To Waste</h2>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <h1 style="text-align: center; margin-top: 5%">Search location</h1>
  <div id="map"></div>


  <div class="featured-section overlay-color-2" style="background-image: url('images/bg_2.jpg');">

    <div class="container">
      <div class="row">

        <div class="col-md-6 mb-5 mb-md-0">
          <img src="images/bg_2.jpg" alt="Image placeholder" class="img-fluid">
        </div>

        <div class="col-md-6 pl-md-5">

          <div class="form-volunteer">
            <?php if(!$userInfo): ?>
              <a href="/login.php" > <h2> Click here to receive</h2></a>
              <!-- <a href="/login.php" >Log in</a> -->

              <?php else: ?>
                <h2>Details</h2>
                <form action="<?php echo $_SERVER["PHP_SELF"] ?>", method="POST">

                  <!-- Location Script -->
                  <div id="loc">
                    <script> getLocation();</script>
                  </div>

                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control py-2" id="name" placeholder="Enter your name">
                  </div>
              <!-- <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control py-2" id="email" placeholder="Enter your email">
              </div> -->
              <!-- <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control py-2" id="email" placeholder="Enter location id">
              </div> -->
              <div class="form-group">
                <input type="submit" name="submit1" class="btn btn-white px-5 py-2" value="Send">
              </div>
            </form>

          <?php endif ?>


            <?php

              error_reporting(0);

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
                $food = $_POST["food"];
                $donor = $userInfo['name'];
                $addr = $_POST["addr"];
                $lat  = $_COOKIE['lat'];
                $lng  = $_COOKIE['lng'];
            
                try{
                  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  $sql = "INSERT INTO `markers`(food_name, donor_name, address, lat, lng)  VALUES ('$food', '$donor', '$addr', '$lat', '$lng')";
                  $conn->exec($sql);
                }
                catch(PDOException $e){
                  echo $e->getMessage();
                }
                $conn = null;
              }

            ?>
            
          </div>
        </div>
        
      </div>
    </div>

  </div> <!-- .featured-donate -->

  <!-- <footer class="footer">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-6">
          <h3 class="heading-section">About Us</h3>
          <p class="lead">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
          <p class="mb-5">Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
        </div>
        <div class="col-md-6">
          <div class="block-23">
            <h3 class="heading-section">Get Connected</h3>
              <ul>
                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
              </ul>
            </div>
        </div>
        
        
      </div>
      <div class="row pt-5">
        <div class="col-md-12 text-center">
          <p>
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ion-ios-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
             </p>
        </div>
      </div>
    </div>
  </footer> -->

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
