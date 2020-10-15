<!DOCTYPE html>
<html>
<head>
	<title>Receive</title>

	<style>
      #map {

        width: 90%;
        height: 600px;
        background-color: grey;
        margin: 0 auto;
      }
    </style>
</head>
<body>
	<h3>Go to Home page :</h3>
	<input type="button" onclick="window.location='home.php'" class="Redirect" value="Home"/>
	<br><br><br>

	<h3>Google Maps</h3>
    <div id="map"></div>
    <script>
    	function initMap() {
    		var thane = {lat:19.2183, lng:72.9781};
    		var map = new google.maps.Map(document.getElementById('map'), {zoom:4, center:thane});
    		var marker = new google.maps.Marker({position:thane, map:map});
    	}
    </script>
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsVoY4zW3LEvh1FYV00kTm2LH71ArmzOs&callback=initMap"></script>
</body>
</html>