<section class="welcome">
	<div class="container">
		<div class="jumbotron text-center">
			<h1><i class="fa fa-microchip"></i> Welcome to the Angular 2 Demo!</h1>
			<p class="lead orange">This is a bare-bones Angular 2 Front End :D</p>
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