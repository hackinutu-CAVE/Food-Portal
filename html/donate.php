<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Donate</title>
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
</head>
<body>

  <h3>Go to Home page :</h3>
  <input type="button" onclick="window.location='home.php'" class="Redirect" value="Home"/>
  <br><br><br>

  <form action="<?php echo $_SERVER["PHP_SELF"] ?>", method="POST">
   Food name <input type="text" name="food">
   <br><br>

   Donor name <input type="text" name="donor">
   <br><br>

   Address <input type="text" name="addr">
   <br><br>

    <div id="loc">
      <script> getLocation();</script>
      <!-- <button name="location" onclick="getLocation()">Location</button> -->
    </div>

    <button name="submit1">Submit</button>
  </form>
 

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

  if(isset($_POST["submit1"])) {
    $food = $_POST["food"];
    $donor = $_POST["donor"];
    $addr = $_POST["addr"];
    $lat  = $_COOKIE['lat'];
    $lng  = $_COOKIE['lng'];
    // echo $food."<br>";
    // echo $donor."<br>";
    // echo $addr."<br>";
    // echo $lat."<br>";
    // echo $lng."<br>";

    // $query = "insert into markers (food_name,donor_name,address,lat,lng) values (?,?,?,?,?)";
    // $stmt= $link->prepare($query);
    // $stmt->bind_param("sssdd", $food, $donor, $addr, $lat, $lng);
    // $stmt->execute();

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

</body>
</html>