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

    <script>
    	let map, infoWindow;

    	function initMap() {
    	  map = new google.maps.Map(document.getElementById("map"), {
    	    center: { lat: -34.397, lng: 150.644 },
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
    	        infoWindow.setPosition(pos);
    	        infoWindow.setContent("Your location");
    	        infoWindow.open(map);
    	        map.setCenter(pos);
    	      },
    	      () => {
    	        handleLocationError(true, infoWindow, map.getCenter());
    	      }
    	    );
    	  } else {
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
	<h3>Go to Home page :</h3>
	<input type="button" onclick="window.location='index.php'" class="Redirect" value="Home"/>
	<br><br><br>

	<!-- <div id="loc">
	  <script> getLocation();</script>
	</div> -->

	<h3>Google Maps</h3>
    <div id="map"></div>
    
</body>
</html>