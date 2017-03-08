<section class="welcome">
	<div class="container">
		<div class="jumbotron text-center">
			<h1><i class="fa fa-microchip"></i> Welcome to ABQuery!</h1>
			<p class="lead orange">8==================D~~~~~~</p>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<h1>{{ title }}</h1>

		<!-- this creates a google map on the page with the given lat/lng from -->
		<!-- the component as the initial center of the map: -->

		<sebm-google-map [latitude]="lat" [longitude]="lng">
			<sebm-google-map-marker [latitude]="lat" [longitude]="lng"></sebm-google-map-marker>
		</sebm-google-map>
	</div>
</section>