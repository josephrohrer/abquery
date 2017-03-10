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

		<!-- CSS for Map -->
		<style type="text/css">
			#map {
				height: 100vh;
				width: 50%;
				background-color: grey;

			}
		</style>

	</head>

	<!-- nav ==================================================== !-->

	<body class="sfooter">

		<header class="template-header">
			<div class="col-12 text-center">
				<img src="images/logosmaller.png">
			</div>
		</header>

		<main class="template-main sfooter-content">

			<!-- nav ==================================================== !-->

			<body class="sfooter">
				<header class="template-header navbar-fixed-top">
					<div class="col-12 text-center">
						<img src="images/logosmaller.png">
					</div>

					<div class="form-group-desktop">
						<label for="searchAddress" class="sr-only">Search an Albuqueruqe Address</label>
						<div class="input-group">
							<input id="searchAddress" name="searchAddress" type="text" class="form-control input-lg"
									 placeholder="Enter an ABQ address"/>
							<div class="input-group-btn">
								<button class="btn btn-default btn-lg" type="button">
									<i class="glyphicon glyphicon-search"></i>
								</button>
							</div>
						</div>
					</div><!--from-group-->
				</header>

				<!--  directory drop down ================================================= !-->

				<div class="container">
					<div class="row">
						<div class="col-md-12 data-drop">
							<div class="col-md-4">
								<h4>Data Type</h4>
								<p>Please choose crime or park data</p>
								<div class="dropdown">
									<button class="btn btn-default dropdown-toggle" type="button" id="menu1"
											  data-toggle="dropdown">
										Data Type
										<span class="caret"></span></button>
									<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
										<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Park Data</a></li>
										<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Crime Data</a></li>
									</ul>
								</div>
							</div><!--col-md-4-->

							<div class="col-md-4">
								<h4>Dropdowns</h4>
								<p>The .dropdown class is used to indicate a dropdown menu.</p>
								<div class="dropdown">
									<button class="btn btn-default dropdown-toggle" type="button" id="menu1"
											  data-toggle="dropdown">
										Tutorials
										<span class="caret"></span></button>
									<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
										<li role="presentation"><a role="menuitem" tabindex="-1" href="#">HTML</a></li>
										<li role="presentation"><a role="menuitem" tabindex="-1" href="#">CSS</a></li>
										<li role="presentation"><a role="menuitem" tabindex="-1" href="#">JavaScript</a></li>
										<li role="presentation" class="divider"></li>
										<li role="presentation"><a role="menuitem" tabindex="-1" href="#">About Us</a></li>
									</ul>
								</div>
							</div><!--col-md-4-->

							<div class="col-md-4">
								<h4>Park Amenities</h4>
								<p>Please select the amenity you would like to search for</p>
								<div class="dropdown">
									<button class="btn btn-default dropdown-toggle" type="button" id="menu1"
											  data-toggle="dropdown">
										Tutorials
										<span class="caret"></span></button>
									<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
										<li role="presentation"><a role="menuitem" tabindex="-1" href="#">HTML</a></li>
										<li role="presentation"><a role="menuitem" tabindex="-1" href="#">CSS</a></li>
										<li role="presentation"><a role="menuitem" tabindex="-1" href="#">JavaScript</a></li>
										<li role="presentation" class="divider"></li>
										<li role="presentation"><a role="menuitem" tabindex="-1" href="#">About Us</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div><!--col-md-4-->
				</div><!--data drop-->

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


						<div class="demo-card">
							<div class="card-header">
								CRIME INCIDENTS
							</div>

							<div class="card-block">
								<h4 class="card-title">Larceny</h4>
								<ul class="list-group list-group-flush">
									<li class="list-group-item">03/06/2016</li>
									<li class="list-group-item">8200 Block Krim Dr NE</li>
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

						<div class="demo-card">
							<div class="card-header">
								CRIME INCIDENTS
							</div>

							<div class="card-block">
								<h4 class="card-title">Malicious Mischief, Graffiti</h4>
								<ul class="list-group list-group-flush">
									<li class="list-group-item">03/01/2016</li>
									<li class="list-group-item">5300 Block San Mateo Blvd NE</li>
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

						<div class="demo-card">
							<div class="card-header">
								CRIME INCIDENTS
							</div>

							<div class="card-block">
								<h4 class="card-title">Malicious Mischief, Graffiti</h4>
								<ul class="list-group list-group-flush">
									<li class="list-group-item">03/01/2016</li>
									<li class="list-group-item">5300 Block San Mateo Blvd NE</li>
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

						<div class="demo-card">
							<div class="card-header">
								CRIME INCIDENTS
							</div>

							<div class="card-block">
								<h4 class="card-title">Malicious Mischief, Graffiti</h4>
								<ul class="list-group list-group-flush">
									<li class="list-group-item">03/01/2016</li>
									<li class="list-group-item">5300 Block San Mateo Blvd NE</li>
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
							<!-- Scripts for Google Maps Javascript -->
							<script>
								function initMap() {
									var uluru = {lat: 35.104874, lng: -106.627808};
									var map = new google.maps.Map(document.getElementById('map'), {
										zoom: 12,
										center: uluru
									});
									var marker = new google.maps.Marker({
										position: uluru,
										map: map
									});
								}
							</script>
							<script async defer
									  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCu21jbQZ73LpaSpGsA4qrZOrASk7pzlN8&callback=initMap">
							</script>
						</div><!--col-lg-6-->
					</div><!--container-fluid-->
				</section><!--map-->

		</main>

		<footer class="template-footer">
			<div class="col-12 text-center">
				<p class="footer-content text-muted">Copyright &copy; ABQuery 2017 | <a href="about-view.php">About Us</a>
				</p>
			</div>
		</footer>

	</body>
</html>