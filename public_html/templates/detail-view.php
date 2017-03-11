<search-header></search-header>
<!--  list of crimes ================================================= !-->

<div class="container-crime-desktop" data-spy="scroll" data-target="#myScrollspy" data-offset="20">
	<div class="col-lg-6 col-lg-6-detail-view">
		<div class="demo-card">
			<div class="card-header">
				CRIME INCIDENTS
			</div>

			<div class="card-block">
				<h4 class="card-title">Breaking and Entering</h4>
				<ul class="list-group list-group-flush">
					<li class="list-group-item">03/03/2016</li>
					<li class="list-group-item">3500 Block Rio Grande Blvd NW</li>
				</ul>
			</div>

			<div class="card-block">
				<a href="https://bootcamp-coders.cnm.edu/~jminnich/abquery/epic/test-layout/mapjs-view.php"
					class="btn btn-primary">Map</a>
			</div>
			<div class="card-footer text-muted">
				Abquery: List of Crime Incidents
			</div>
		</div><!--card-->
	</div><!--col-lg-6-->
</div><!--container-->

<!-- map ==================================================== !-->

<section class="map-section">
	<div id="map" class="container-fluid">
		<div class="col-lg-6">
			<query-map></query-map>
		</div><!--col-lg-6-->
	</div><!--container-fluid-->
</section><!--map-->