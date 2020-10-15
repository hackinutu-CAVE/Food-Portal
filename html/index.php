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
    <title>Food CAVE</title>

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
      <a class="navbar-brand" href="index.php">Food CAVE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="donate.php" class="nav-link">Donate</a></li>
          <li class="nav-item"><a href="receive.php" class="nav-link">Receive</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
<!--          <li class="nav-item"><a href="how-it-works.html" class="nav-link">How It Works</a></li>
          <li class="nav-item"><a href="gallery.html" class="nav-link">Gallery</a></li>
          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>-->
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->

  <div class="block-31" style="position: relative;">
    <div class="owl-carousel loop-block-31 ">
      <div class="block-30 block-30-sm item" style="background-image: url('images/bg_5.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-7">
              <h2 class="heading mb-5">Hunger should kick the can!</h2>
<!--
              <h2 class="heading mb-5">Hunger's Heroes</h2>
-->
              <p style="display: inline-block;"><a href="https://www.youtube.com/watch?v=SP3QVFX3k9E"  data-fancybox class="ftco-play-video d-flex"><span class="play-icon-wrap align-self-center mr-4"><span class="ion-ios-play"></span></span> <span class="align-self-center">Watch Video</span></a></p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="site-section section-counter">
    <div class="container">
      <div class="row">
        <div class="col-md-6 pr-5">
          <div class="block-48">
              <span class="block-48-text-1">Served Over</span>
              <div class="block-48-counter ftco-number" data-number="1321901">0</div>
              <span class="block-48-text-1 mb-4 d-block">at 85+ Cities</span>
              <p class="mb-0"><a href="#" class="btn btn-white px-3 py-2">View Our Program</a></p>
            </div>
        </div>
        <div class="col-md-6 welcome-text">
          <h2 class="display-4 mb-3">What Do We Do?</h2>
          <p class="lead">Donating to the needy not just benefits the recipient, it also benefits the donor in improving the physical, psychological, emotional and spiritual well-being.</p>
          <p class="mb-4">#MakeaDifference: Feed The Poor By Donating Your Leftovers! (Yes, It's That Easy) </p>
          <p class="mb-0"><a href="#" class="btn btn-primary px-3 py-2">Learn More</a></p>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section border-top">
    <div class="container">
      <div class="row">

        <div class="col-md-4">
          <div class="media block-6">
            <div class="icon"><span class="ion-ios-bulb"></span></div>
            <div class="media-body">
              <h3 class="heading">Our Mission</h3>
              <p>Providing better health by curing hunger.</p>
              <p><a href="#" class="link-underline">Learn More</a></p>
            </div>
          </div>     
        </div>

        <div class="col-md-4">
          <div class="media block-6">
            <div class="icon"><span class="ion-ios-cash"></span></div>
            <div class="media-body">
              <h3 class="heading">Make Donations</h3>
              <p>No One Can Help Everyone, But Everyone Can Help Someone</p>
              <p><a href="#" class="link-underline">Learn More</a></p>
            </div>
          </div>  
        </div>

        <div class="col-md-4">
          <div class="media block-6">
            <div class="icon"><span class="ion-ios-contacts"></span></div>
            <div class="media-body">
              <h3 class="heading">We Need More Donors</h3>
              <p>No one has ever become poor from giving.” –Anne Frank</p>
            </div>
          </div> 
        </div>

      </div>
    </div>
  </div> <!-- .site-section -->

  <div class="site-section fund-raisers">
    <div class="container">

      <div class="row">
        <div class="col-md-6 col-lg-3 mb-5">
          <div class="person-donate text-center">
            <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid">
            <div class="donate-info">
              <h2>Jorge Smith</h2>
              <span class="time d-block mb-3">Donated Just now</span>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-5">
          <div class="person-donate text-center">
            <img src="images/person_2.jpg" alt="Image placeholder" class="img-fluid">
            <div class="donate-info">
              <h2>Christine Charles</h2>
              <span class="time d-block mb-3">Donated 1 hour ago</span>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-5">
          <div class="person-donate text-center">
            <img src="images/person_3.jpg" alt="Image placeholder" class="img-fluid">
            <div class="donate-info">
              <h2>Albert Sluyter</h2>
              <span class="time d-block mb-3">Donated 4 hours ago</span>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-5">
          <div class="person-donate text-center">
            <img src="images/person_4.jpg" alt="Image placeholder" class="img-fluid">
            <div class="donate-info">
              <h2>Andrew Holloway</h2>
              <span class="time d-block mb-3">Donated 9 hours ago</span>
            </div>
          </div>    
        </div>
      </div>
    </div>
  </div> <!-- .section -->

  <div class="featured-section overlay-color-2" style="background-image: url('images/bg_3.jpg');">
    
    <div class="container">
      <div class="row">

        <div class="col-md-6">
          <img src="images/donate_bg_7.jpg" alt="Image placeholder" class="img-fluid">
        </div>

        <div class="col-md-6 pl-md-5">
          <span class="featured-text d-block mb-3">What is No Food Waste?</span>
          <h2>No Food Waste is an edible food Recovery Project which serves the surplus excess foods from Weddings , Parties , and other events, to the hungry and deprived.</h2>
          <p class="mb-3">No Food Waste is a food recovery and food waste management network that helps connect individuals and businesses with excess food to people in need. We approach the issue of hunger with a sharing-economy model: the donation of excess food enables a vital, yet often wasted, resource to be used to its full capacity.</p>
          <span class="fund-raised d-block mb-5">We have served over 100,000+ </span>

          <p><a href="/donate.php" class="btn btn-success btn-hover-white py-3 px-5">Help Us</a></p>
        </div>
        
      </div>
    </div>

  </div> <!-- .featured-donate -->

  <div class="site-section bg-light">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-12">
          <h2>Latest News</h2>
        </div>
      </div>

      <div class="row">
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="post-entry">
            <a href="#" class="mb-3 img-wrap">
              <img src="images/img_4.jpg" alt="Image placeholder" class="img-fluid">
            </a>
            <h3><a href="#">Be A Volunteer Today</a></h3>
            <span class="date mb-4 d-block text-muted">April 02, 2020</span>
            <p>Hunger's Heros </p>
            <p><a href="#" class="link-underline">Read More</a></p>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="post-entry">
            <a href="#" class="mb-3 img-wrap">
              <img src="images/img_5.jpg" alt="Image placeholder" class="img-fluid">
            </a>
            <h3><a href="#">You May Save The Life of A Child</a></h3>
            <span class="date mb-4 d-block text-muted">July 26, 2020</span>
            <p>Small steps today lead big victories of tomorrow</p>
            <p><a href="#" class="link-underline">Read More</a></p>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
          <div class="post-entry">
            <a href="#" class="mb-3 img-wrap">
              <img src="images/img_6.jpg" alt="Image placeholder" class="img-fluid">
            </a>
            <h3><a href="#">Children That Needs Care</a></h3>
            <span class="date mb-4 d-block text-muted">August 17, 2020</span>
            <p>If you can’t feed a hundred people, then just feed one.” –Mother Theresa</p>
            <p><a href="#" class="link-underline">Read More</a></p>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- .section -->


  <div class="featured-section overlay-color-2" style="background-image: url('images/bg_2.jpg');">
    
    <div class="container">
      <div class="row">

        <div class="col-md-6 mb-5 mb-md-0">
          <img src="images/bg_2.jpg" alt="Image placeholder" class="img-fluid">
        </div>

        <div class="col-md-6 pl-md-5">

          <div class="form-volunteer">

            <h2>Be A Donor Today</h2>
            <h2>Make Someone's day</h2>

            <?php if(!$userInfo): ?>
              <!-- <h2>Random test</h2> --><br>
              <a href="/login.php" > <h1> Click here to donate</h1></a>
                  <!-- <a href="/login.php" >Log in</a> -->

            <?php else: ?>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>", method="POST">
            
              <!-- Location Script -->
              <div id="loc">
                <script> getLocation();</script>
              </div>

              <!-- <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control py-2" id="name" placeholder="Enter your Name">
              </div> -->

              <div class="form-group">
                <!-- <label for="name">Name</label> -->
                <input type="text" class="form-control py-2" name="food" id="type_fd" placeholder="Food Name">
              </div>
              
              <div class="form-group">
                <!-- <label for="name">Name</label> -->
                <input type="text" class="form-control py-2" name="addr" id="address" placeholder="Your Address">
              </div>

              <div class="form-group">
              <p><i>At what date and time food will be available:</i></p>
              <input type="date" name="hdate">
              <input type="time" name="htime">
              </div>
               
              <div class="form-group">
              <p><i>By what date and time food will expire:</i></p>
              <input type="date" name="xdate">
              <input type="time" name="xtime">
              </div>

              <!-- <div class="form-group"> -->
                <!-- <label for="name">Name</label> -->
                <!-- <input type="text" class="form-control py-2" name="expiry" id="address" placeholder="Food Expiry Time"> -->
              <!-- </div> -->
              
              <!-- <div class="form-group">
                <input type="number" class="form-control py-2" id="quantity" placeholder="Enter the Quantity / Servings">
              </div>
              &lt;!&ndash; <label for="name">Name</label> &ndash;&gt;
              <div class="form-group">
                &lt;!&ndash; <label for="name">Name</label> &ndash;&gt;
                <input type="tel" class="form-control py-2" id="number" placeholder="Enter your Number">
              </div>
              <div class="form-group">
                &lt;!&ndash; <label for="email">Email</label> &ndash;&gt;
                <input type="email" class="form-control py-2" id="email" placeholder="Enter your Email">
              </div>
              <div class="form-group">
                &lt;!&ndash; <label for="v_message">Email</label> &ndash;&gt;
                <textarea name="v_message" id="" cols="30" rows="3" class="form-control py-2" placeholder="Write your message"></textarea>
                &lt;!&ndash; <input type="text" class="form-control py-2" id="email"> &ndash;&gt;
              </div>-->
              <div class="form-group">
                <input type="submit" class="btn btn-white px-5 py-2" name="submit1">
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
                $donoremail = $userInfo['email'];
                $addr = $_POST["addr"];
                $date = $_POST["hdate"];
                $time = $_POST["htime"];
                $xdate = $_POST["xdate"];
                $xtime = $_POST["xtime"];
                $expiry = $_POST["expiry"];
                $lat  = $_COOKIE['lat'];
                $lng  = $_COOKIE['lng'];
            
                try{
                  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  $sql = "INSERT INTO `markers`(food_name, donor_name, donor_email, address, date, time, food_expiry_date, food_expiry_time, lat, lng)  VALUES ('$food', '$donor', '$donoremail', '$addr', '$date', '$time', '$xdate', '$xtime', '$lat', '$lng')";
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
<!--
    <div class="site-section fund-raisers bg-light">
      <div class="container">
        <div class="row mb-3 justify-content-center">
          <div class="col-md-8 text-center">
            <h2>Latest Fundraisers</h2>
            <p class="lead">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <p><a href="#" class="link-underline">View All Fundraisers</a></p>
          </div>
        </div>
      </div>

      <div class="container-fluid">

        &lt;!&ndash; <div class="row"> &ndash;&gt;

          <div class="col-md-12 block-11">
            <div class="nonloop-block-11 owl-carousel">

              <div class="card fundraise-item">
                <a href="#"><img class="card-img-top" src="images/img_1.jpg" alt="Image placeholder"></a>
                <div class="card-body">
                  <h3 class="card-title"><a href="#">Water Is Life. Clean Water In Urban Area</a></h3>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <span class="donation-time mb-3 d-block">Last donation 1w ago</span>
                  <div class="progress custom-progress-success">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span class="fund-raised d-block">$12,000 raised of $30,000</span>
                </div>
              </div>


              <div class="card fundraise-item">
                <a href="#"><img class="card-img-top" src="images/img_7.jpg" alt="Image placeholder"></a>
                <div class="card-body">
                  <h3 class="card-title"><a href="#">Need Shelter for Children in Africa</a></h3>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <span class="donation-time mb-3 d-block">Last donation 1w ago</span>
                  <div class="progress custom-progress-success">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span class="fund-raised d-block">$12,000 raised of $30,000</span>
                </div>
              </div>

              <div class="card fundraise-item">
                <a href="#"><img class="card-img-top" src="images/img_3.jpg" alt="Image placeholder"></a>
                <div class="card-body">
                  <h3 class="card-title"><a href="#">Children Needs Education</a></h3>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <span class="donation-time mb-3 d-block">Last donation 1w ago</span>
                  <div class="progress custom-progress-success">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span class="fund-raised d-block">$12,000 raised of $30,000</span>
                </div>
              </div>


              <div class="card fundraise-item">
                <a href="#"><img class="card-img-top" src="images/img_4.jpg" alt="Image placeholder"></a>
                <div class="card-body">
                  <h3 class="card-title"><a href="#">Refugees Needs Food</a></h3>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <span class="donation-time mb-3 d-block">Last donation 1w ago</span>
                  <div class="progress custom-progress-success">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span class="fund-raised d-block">$12,000 raised of $30,000</span>
                </div>
              </div>


              <div class="card fundraise-item">
                <a href="#"><img class="card-img-top" src="images/img_6.jpg" alt="Image placeholder"></a>
                <div class="card-body">
                  <h3 class="card-title"><a href="#">Voluteer </a></h3>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <span class="donation-time mb-3 d-block">Last donation 1w ago</span>
                  <div class="progress custom-progress-success">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span class="fund-raised d-block">$12,000 raised of $30,000</span>
                </div>
              </div>

              <div class="card fundraise-item">
                <a href="#"><img class="card-img-top" src="images/img_3.jpg" alt="Image placeholder"></a>
                <div class="card-body">
                  <h3 class="card-title"><a href="#">Children Needs Food</a></h3>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <span class="donation-time mb-3 d-block">Last donation 1w ago</span>
                  <div class="progress custom-progress-success">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span class="fund-raised d-block">$12,000 raised of $30,000</span>
                </div>
              </div>

            </div>
          </div>
        &lt;!&ndash; </div> &ndash;&gt;
      </div>
    </div> &lt;!&ndash; .section &ndash;&gt;
  -->
<!--
  <footer class="footer">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-6 col-lg-4">
          <h3 class="heading-section">About Us</h3>
          <p class="lead">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
          <p class="mb-5">Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
          <p><a href="#" class="link-underline">Read  More</a></p>
        </div>
        <div class="col-md-6 col-lg-4">
          <h3 class="heading-section">Recent Blog</h3>
          <div class="block-21 d-flex mb-4">
            <figure class="mr-3">
              <img src="images/img_1.jpg" alt="" class="img-fluid">
            </figure>
            <div class="text">
              <h3 class="heading"><a href="#">Water Is Life. Clean Water In Urban Area</a></h3>
              <div class="meta">
                <div><a href="#"><span class="icon-calendar"></span> July 29, 2018</a></div>
                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
              </div>
            </div>
          </div>

          <div class="block-21 d-flex mb-4">
            <figure class="mr-3">
              <img src="images/img_2.jpg" alt="" class="img-fluid">
            </figure>
            <div class="text">
              <h3 class="heading"><a href="#">Life Is Short So Be Kind</a></h3>
              <div class="meta">
                <div><a href="#"><span class="icon-calendar"></span> July 29, 2018</a></div>
                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
              </div>
            </div>
          </div>

          <div class="block-21 d-flex mb-4">
            <figure class="mr-3">
              <img src="images/img_4.jpg" alt="" class="img-fluid">
            </figure>
            <div class="text">
              <h3 class="heading"><a href="#">Unfortunate Children Need Your Love</a></h3>
              <div class="meta">
                <div><a href="#"><span class="icon-calendar"></span> July 29, 2018</a></div>
                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
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
            &lt;!&ndash; Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. &ndash;&gt;
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ion-ios-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            &lt;!&ndash; Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. &ndash;&gt;
            </p>

        </div>
      </div>
    </div>
  </footer>
-->
