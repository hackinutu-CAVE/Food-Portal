<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Donate</title>
  </head>
  <body>
    
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>", method="POST">
    	Food name <input type="text" name="food">
    	<br><br>

    	Donor name <input type="text" name="donor">
    	<br><br>

    	Address <input type="text" name="addr">
    	<br><br>

    	<button name="submit1">Submit</button> <!-- onclick="getLocation()" -->
    </form>

    <!-- <p id="demo"></p>
    <script>
    	var x = document.getElementById("demo");

    	function getLocation() {
    		if(navigator.geolocation) {
    			navigator.geolocation.getCurrentPosition(setPosition);
    		}
    		else {
    			x.innerHTML = "Geolocation is not supported by this browser.";
    		}
    	}

    	function setPosition(position) {
    		window.location='lat='+position.coords.latitude+'&long='+position.coords.longitude;
    	}
    </script> -->

    <?php
    error_reporting(0);

    // $lat=(isset($_POST['lat']))?$_POST['lat']:'';
    // $long=(isset($_POST['long']))?$_POST['long']:'';
    // echo $lat;
    // echo $long;

  	if(isset($_POST["submit1"])) {
  		$food = $_POST["food"];
  		$donor = $_POST["donor"];
  		$addr = $_POST["addr"];
  		echo $food;
  	}

  	//connect to mysql server
  	$link = mysqli_connect("localhost","3406","root","root","food-portal");
  	?>


  	<h3>Go to Home page :</h3>
  	<input type="button" onclick="window.location='home.php'" class="Redirect" value="Home"/>

  </body>
</html>