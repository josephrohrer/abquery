<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="images/favicon.ico">
		<title>ABQuery - Map View</title>


		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
				integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet"

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
				width: 100%;
				background-color: grey;
			}
		</style>
	</head>

	<!-- nav & search ==================================================== !-->

	<body class="sfooter">
		<header class="template-header navbar-fixed-top">
			<div class="col-12 text-center">
				<img src="images/logosmaller.png">
			</div>

				<div class="form-group">
					<label for="searchAddress" class="sr-only">Search an Albuqueruqe Address</label>
					<div class="input-group">
						<input id="searchAddress" name="searchAddress" type="text" class="form-control input-lg" placeholder="Enter an ABQ address"/>
						<div class="input-group-btn">
							<button class="btn btn-default btn-lg" type="button">
								<i class="glyphicon glyphicon-search"></i>
							</button>
						</div>
					</div>
				</div><!--from-group-->
		</header>

		<main class="template-main sfooter-content">

			<!-- map ==================================================== !-->

			<section class="map-section">
				<div id="map" class="container-fluid">
				</div>
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
			</section>

			<!-- button links ==================================================== !-->
			<div class="button-wrap">
				<section id="button" class="park-link">
					<div class="container">
						<div class="row">
							<div class="col-lg-3">
								<a href="park-detail-view.php">
									<img class="img-circle img-responsive" src="images/parksearchicon.png" alt="park button"></a>
							</div>
						</div>
					</div>
				</section>

				<section id="button" class="crime-link">
					<div class="container">
						<div class="row">
							<div class="col-lg-3">
								<a href="crime-detail-view.php">
									<img class="img-circle img-responsive" src="images/crimesearchicon.png"
										  alt="crime button"></a>
							</div>
						</div>
					</div>
				</section>
			</div><!--button wrap--->
		</main>


		<!-- footer ==================================================== !-->
		<footer class="template-footer navbar-fixed-bottom">
			<div class="col-12 text-center">
				<p class="footer-content text-muted">Copyright &copy; ABQuery 2017 | <a href="about-view.php">About Us</a>
				</p>
			</div>
		</footer>

	</body>
</html>
