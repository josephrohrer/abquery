<main class="container">
	<h1>Park</h1>
	<div class="row">
		<ul class="col-6">
			<li *ngFor="let park of parks">{{ park.parkName }} {{ park.parkId }} {{ park.parkDeveloped }}</li>
		</ul>
		<div class="col-6">
			<sebm-google-map
				[latitude]="35.105332"
				[longitude]="-106.629385"
				[zoom]="15">
				<sebm-google-map-marker
					*ngFor="let park of parks"
					[latitude]="park.parkGeometry.lat"
					[longitude]="park.parkGeometry.lng"
					[label]="park.parkName">
				</sebm-google-map-marker>
			</sebm-google-map>
		</div>
	</div>
</main>