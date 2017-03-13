<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="images/favicon.ico">
		<!--This is the google places auto complete api using the key that I (Smtih) generated-->
		<script type="text/javascript"
				  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBq3y-2qCFZqdD_fJ9grn4l61JEFwom5Y0&libraries=places"></script>

		<title>Park and Crime Desktop View</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
				integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!-- Font Awesome -->
		<link type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css"
				rel="stylesheet"/>

		<!-- Custom CSS -->
		<link rel="stylesheet" href="css/style.css" type="text/css">

		<!-- jQuery -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js" type="text/javascript"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
				  integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
				  crossorigin="anonymous"></script>

	</head>

	<!-- nav ==================================================== !-->

	<body class="sfooter">
		<header class="template-header">
			<div class="col-12 text-center">
				<img src="images/logosmaller.png">
			</div>
		</header>

		<main class="template-main sfooter-content">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="hidden-xs col-sm-6 col-md-5 col-lg-4 detail-view" data-spy="scroll" data-target="#myScrollspy" data-offset="20">

						<!--Sidebar content-->
						<div class="form-group">
							<label for="searchAddress" class="sr-only">Search an Albuqueruqe Address</label>
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

						<div class="text-center">
							<h2>PARKS</h2>
						</div>
						<h3>Filter amenities</h3><input type="checkbox" value=""> All</label>
						<div class="row">
							<div class="col-xs-6">
								<div class="checkbox">
									<label><input type="checkbox" value="">Baseball - Backstops</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" value="">Baseball Fields - Youth</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" value="">Basketball Courts - Full</label>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="checkbox">
									<label><input type="checkbox" value="">Basketball Courts - Half</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" value="">Amenity 2</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox" value="">Amenity 3</label>
								</div>
							</div>
						</div>

						<div class="demo-card">
							<div class="card-block">
								<h4 class="card-title">Malicious Mischief, Graffiti</h4>
								<ul class="list-group list-group-flush">
									<li class="list-group-item">Date: 03/01/2016</li>
									<li class="list-group-item">Address: 5300 Block San Mateo Blvd NE</li>
								</ul>
							</div>

							<div class="card-block">
								<a href="https://bootcamp-coders.cnm.edu/~jminnich/abquery/epic/test-layout/mapjs-view.php"
									class="btn btn-primary">Map</a>
							</div>

						</div><!--card-->

						<div class="demo-card">
							<div class="card-block">
								<h4 class="card-title">Malicious Mischief, Graffiti</h4>
								<ul class="list-group list-group-flush">
									<li class="list-group-item">Date: 03/01/2016</li>
									<li class="list-group-item">Address: 5300 Block San Mateo Blvd NE</li>
								</ul>
							</div>

							<div class="card-block">
								<a href="https://bootcamp-coders.cnm.edu/~jminnich/abquery/epic/test-layout/mapjs-view.php"
									class="btn btn-primary">Map</a>
							</div>

						</div><!--card-->

						<div class="demo-card">
							<div class="card-block">
								<h4 class="card-title">Malicious Mischief, Graffiti</h4>
								<ul class="list-group list-group-flush">
									<li class="list-group-item">Date: 03/01/2016</li>
									<li class="list-group-item">Address: 5300 Block San Mateo Blvd NE</li>
								</ul>
							</div>

							<div class="card-block">
								<a href="https://bootcamp-coders.cnm.edu/~jminnich/abquery/epic/test-layout/mapjs-view.php"
									class="btn btn-primary">Map</a>
							</div>

						</div><!--card-->

						<div class="demo-card">
							<div class="card-block">
								<h4 class="card-title">Malicious Mischief, Graffiti</h4>
								<ul class="list-group list-group-flush">
									<li class="list-group-item">Date: 03/01/2016</li>
									<li class="list-group-item">Address: 5300 Block San Mateo Blvd NE</li>
								</ul>
							</div>

							<div class="card-block">
								<a href="https://bootcamp-coders.cnm.edu/~jminnich/abquery/epic/test-layout/mapjs-view.php"
									class="btn btn-primary">Map</a>
							</div>

						</div><!--card-->

						<div class="demo-card">
							<div class="card-block">
								<h4 class="card-title">Malicious Mischief, Graffiti</h4>
								<ul class="list-group list-group-flush">
									<li class="list-group-item">Date: 03/01/2016</li>
									<li class="list-group-item">Address: 5300 Block San Mateo Blvd NE</li>
								</ul>
							</div>

							<div class="card-block">
								<a href="https://bootcamp-coders.cnm.edu/~jminnich/abquery/epic/test-layout/mapjs-view.php"
									class="btn btn-primary">Map</a>
							</div>

						</div><!--card-->

						<div class="demo-card">
							<div class="card-block">
								<h4 class="card-title">Malicious Mischief, Graffiti</h4>
								<ul class="list-group list-group-flush">
									<li class="list-group-item">Date: 03/01/2016</li>
									<li class="list-group-item">Address: 5300 Block San Mateo Blvd NE</li>
								</ul>
							</div>

							<div class="card-block">
								<a href="https://bootcamp-coders.cnm.edu/~jminnich/abquery/epic/test-layout/mapjs-view.php"
									class="btn btn-primary">Map</a>
							</div>

						</div><!--card-->

						<div class="demo-card">
							<div class="card-block">
								<h4 class="card-title">Malicious Mischief, Graffiti</h4>
								<ul class="list-group list-group-flush">
									<li class="list-group-item">Date: 03/01/2016</li>
									<li class="list-group-item">Address: 5300 Block San Mateo Blvd NE</li>
								</ul>
							</div>

							<div class="card-block">
								<a href="https://bootcamp-coders.cnm.edu/~jminnich/abquery/epic/test-layout/mapjs-view.php"
									class="btn btn-primary">Map</a>
							</div>

						</div><!--card-->

						<div class="demo-card">
							<div class="card-block">
								<h4 class="card-title">Malicious Mischief, Graffiti</h4>
								<ul class="list-group list-group-flush">
									<li class="list-group-item">Date: 03/01/2016</li>
									<li class="list-group-item">Address: 5300 Block San Mateo Blvd NE</li>
								</ul>
							</div>

							<div class="card-block">
								<a href="https://bootcamp-coders.cnm.edu/~jminnich/abquery/epic/test-layout/mapjs-view.php"
									class="btn btn-primary">Map</a>
							</div>

						</div><!--card-->

						<div class="demo-card">
							<div class="card-block">
								<h4 class="card-title">Malicious Mischief, Graffiti</h4>
								<ul class="list-group list-group-flush">
									<li class="list-group-item">Date: 03/01/2016</li>
									<li class="list-group-item">Address: 5300 Block San Mateo Blvd NE</li>
								</ul>
							</div>

							<div class="card-block">
								<a href="https://bootcamp-coders.cnm.edu/~jminnich/abquery/epic/test-layout/mapjs-view.php"
									class="btn btn-primary">Map</a>
							</div>

						</div><!--card-->

						<div class="demo-card">
							<div class="card-block">
								<h4 class="card-title">Malicious Mischief, Graffiti</h4>
								<ul class="list-group list-group-flush">
									<li class="list-group-item">Date: 03/01/2016</li>
									<li class="list-group-item">Address: 5300 Block San Mateo Blvd NE</li>
								</ul>
							</div>

							<div class="card-block">
								<a href="https://bootcamp-coders.cnm.edu/~jminnich/abquery/epic/test-layout/mapjs-view.php"
									class="btn btn-primary">Map</a>
							</div>

						</div><!--card-->

						<div class="demo-card">
							<div class="card-block">
								<h4 class="card-title">Malicious Mischief, Graffiti</h4>
								<ul class="list-group list-group-flush">
									<li class="list-group-item">Date: 03/01/2016</li>
									<li class="list-group-item">Address: 5300 Block San Mateo Blvd NE</li>
								</ul>
							</div>

							<div class="card-block">
								<a href="https://bootcamp-coders.cnm.edu/~jminnich/abquery/epic/test-layout/mapjs-view.php"
									class="btn btn-primary">Map</a>
							</div>

						</div><!--card-->


					</div>
					<div class="col-xs-12 col-sm-6 col-md-7 col-lg-8 red">
						<!--Body content-->

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
			</div>
		</main>

		<footer class="template-footer">
			<div class="col-12 text-center">
				<p class="footer-content text-muted">Copyright &copy; ABQuery 2017 | <a href="">About Us</a>
				</p>
			</div>
		</footer>

	</body>
</html>