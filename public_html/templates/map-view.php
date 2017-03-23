<header class="template-header">
	<div class="col-12 text-center">
		<img src="images/logosmaller.png">
	</div>
</header>



<div class="container-fluid" id="map-padding">
	<div class="row-fluid">
		<div class="hidden-xs col-sm-6 col-md-5 col-lg-4 detail-view" data-spy="scroll"
			  data-target="#myScrollspy" data-offset="20">

			<!--Sidebar content-->
			<div class="text-center dropdown dropdown-group detail-dropdown">
				<button (click)="value=1">Crime</button>
				<button (click)="value=2">Park</button>
			</div>


			<hr>
			<div [ngSwitch]="value">

				<div *ngSwitchCase="1"><crime [lat]="lat" [lng]="lng" (onFiltered)="mapCrime($event);"></crime></div>
				<div *ngSwitchCase="2"><park [lat]="lat" [lng]="lng" (onFiltered)="mapPark($event);"></park></div>
				<div *ngSwitchDefault><park [lat]="lat" [lng]="lng" (onFiltered)="mapPark($event);"></park></div>

			</div>

		</div>
		<div class="col-xs-12 col-sm-6 col-md-7 col-lg-8" id="map-padding">
			<!--Body content-->
			<autocomplete></autocomplete>


			<div class="button-wrap">
				<section id="button" class="park-link">
					<div class="container">
						<div class="row">
							<div class="visible-xs-block col-lg-3">
								<a routerLink="/park-view">
									<img class="img-responsive" src="images/parksearchicon.png" alt="Parks"></a>
							</div>
						</div>
					</div>
				</section>

				<section id="button" class="crime-link">
					<div class="container">
						<div class="row">
							<div class="visible-xs-block col-lg-3">
								<a routerLink="/crime-view">
									<img class="img-responsive" src="images/crimesearchicon.png" alt="Crime Incidents"></a>
							</div>
						</div>
					</div>
				</section>
			</div><!--button wrap--->
		</div>
	</div>
</div>