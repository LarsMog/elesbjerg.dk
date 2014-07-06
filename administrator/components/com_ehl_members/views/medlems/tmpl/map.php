<?php
// no direct access
defined('_JEXEC') or die;
?>



<div class="container">
    <h1>Kort</h1>
   
    
    <div class="row">
		<div id="map-canvas" class="span14" style="height:800px"></div>
    </div>
</div>

<script type="text/javascript">
	var geocoder = 0;
	var map = 0;
	var latlng = 0;
	
	function initialize() {
		geocoder = new google.maps.Geocoder();
		latlng = new google.maps.LatLng(55.400,8.800);
	    var mapOptions = {
	      center: latlng,
	      zoom: 10,
	      mapTypeId: google.maps.MapTypeId.ROADMAP
	    };
	    map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
	    <?php echo $this->markers;?>
	}

	
	google.maps.event.addDomListener(window, 'load', initialize);
</script>