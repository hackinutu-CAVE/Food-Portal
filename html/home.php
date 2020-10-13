<!DOCTYPE html>
<html>
<head>
	<title>Home</title>

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


    <h3>Donate here :</h3>
    <input type="button" onclick="window.location='donate.php'" class="Redirect" value="Donate"/>
</body>
</html>


