<form>
	<div class="form-group">
		<div class="input-group">
			<input id="searchAddress" placeholder="Enter a location" autocorrect="off" autocapitalize="off"
					 spellcheck="off" type="text" class="form-control" #search [formControl]="searchControl"/>

			<div class="input-group-btn">
				<button class="btn btn-default btn-md" type="button" routerLink="/map-view">
					<i class="glyphicon glyphicon-search"></i>
				</button>
			</div>
		</div>
	</div>
</form>

<section class="map-section">
	<div id="map" class="container-fluid">
		<sebm-google-map [latitude]="lat" [longitude]="lng" [zoom]="zoom">
			<sebm-google-map-marker *ngFor="let point of points" [latitude]="point.lat" [longitude]="point.lng" [label]="point.name"></sebm-google-map-marker>
		</sebm-google-map>
	</div>
</section>