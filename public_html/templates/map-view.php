<header class="template-header">
	<div class="col-12 text-center">
		<img src="images/logosmaller.png">
	</div>
</header>


<div class="container-fluid">
	<div class="row-fluid">
		<div class="hidden-xs col-sm-6 col-md-5 col-lg-4 detail-view" data-spy="scroll"
			  data-target="#myScrollspy" data-offset="20">

			<!--Sidebar content-->
			<div class="form-group">
				<label for="searchAddress" class="sr-only">Search an Albuquerque Address</label>
				<div class="input-group">
					<input id="searchAddress" name="searchAddress" type="text" class="form-control input-md"
							 placeholder="Enter an ABQ address"/>
					<div class="input-group-btn">
						<button class="btn btn-default btn-md" type="button">
							<i class="glyphicon glyphicon-search"></i>
						</button>
					</div>
				</div>
			</div><!--from-group-->



			<div class="dropdown dropdown-group">
				<select class="form-control" id="sel1">
					<option>Parks</option>
					<option>Crime</option>
				</select>
			</div>

		</div>
		<div class="col-xs-12 col-sm-6 col-md-7 col-lg-8">
			<!--Body content-->
			<section class="map-section">
				<div id="map" class="container-fluid">
					<query-map></query-map>
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