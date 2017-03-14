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
			<div class="text-center dropdown-group">
				<button (click)="value=1">Crime</button>
				<button (click)="value=2">Park</button>
			</div>


			<hr>
			<div [ngSwitch]="value">

				<div *ngSwitchCase="1"><crime></crime></div>
				<div *ngSwitchCase="2"><park></park></div>
				<div *ngSwitchDefault class="text-center"><park></park></div>

			</div>

		</div>
		<div class="col-xs-12 col-sm-6 col-md-7 col-lg-8" id="map-padding">
			<!--Body content-->

			<div class="form-group input-mobile">
				<div class="col-lg-12">
					<div class="input-group">
						<input id="searchAddress" placeholder="Enter a location" autocorrect="off" autocapitalize="off" spellcheck="off" type="text" class="form-control" #search [formControl]="searchControl"/>
						<div class="input-group-btn">
							<button class="btn btn-default btn-md" type="button">
								<i class="glyphicon glyphicon-search"></i>
							</button>
						</div>
					</div><!--form-group-->
				</div>
			</div>

			<section class="map-section">
				<div id="map" class="container-fluid">
					<sebm-google-map [latitude]="lat" [longitude]="lng" [zoom]="zoom">
						<sebm-google-map-marker [latitude]="lat" [longitude]="lng"></sebm-google-map-marker>
					</sebm-google-map>
				</div>
			</section>


			<div class="button-wrap">
				<section id="button" class="park-link">
					<div class="container">
						<div class="row">
							<div class="visible-xs-block col-lg-3">
								<a href="park-detail.php">
									<img class="img-responsive" src="images/parksearchicon.png" alt="Parks"></a>
							</div>
						</div>
					</div>
				</section>

				<section id="button" class="crime-link">
					<div class="container">
						<div class="row">
							<div class="visible-xs-block col-lg-3">
								<a href="crime-detail-view.php">
									<img class="img-responsive" src="images/crimesearchicon.png" alt="Crime Incidents"></a>
							</div>
						</div>
					</div>
				</section>
			</div><!--button wrap--->
		</div>
	</div>
</div>