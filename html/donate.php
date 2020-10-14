<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Donate</title>
    <script>
      function showPosition(){
        if(navigator.geolocation){
          navigator.geolocation.getCurrentPosition(function(position){
            var positionInfo = "Your current position is ("+"Latitude: "+position.coords.latitude+", "+"Longitude: "+position.coords.longitude+")";
            document.getElementById("result").innerHTML = positionInfo;
          });
        } 
        else{
        alert("Sorry, your browser does not support HTML5 geolocation.");
        }
      }
    </script>
  </head>
  <body>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>", method="POST">
    	Food name <input type="text" name="food">
    	<br><br>

    	Donor name <input type="text" name="donor">
    	<br><br>

    	Address <input type="text" name="addr">
    	<br><br>

      <p id="demo"></p>
    	<button name="submit1" onclick="showPosition()">Submit</button>
    </form>

    <?php
    error_reporting(0);

  	if(isset($_POST["submit1"])) {
  		$food = $_POST["food"];
  		$donor = $_POST["donor"];
  		$addr = $_POST["addr"];
  		echo $food."<br>";

      // $lat  = $_COOKIE['lat'];
      // $lng  = $_COOKIE['lng'];
      // echo $lat."<br>";
      // echo $lng."<br>";
  	}

  	//connect to mysql server
  	$link = mysqli_connect("localhost","3406","root","root","food-portal");
  	?>


  	<h3>Go to Home page :</h3>
  	<input type="button" onclick="window.location='home.php'" class="Redirect" value="Home"/>

  </body>
</html>