<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">

		<title>ABQuery</title>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
				integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Font Awesome -->
		<link type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css"
				rel="stylesheet"/>

		<!-- Custom CSS -->
		<link rel="stylesheet" href="css/style.css" type="text/css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!-- jQuery -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js" type="text/javascript"></script>

		<!-- jQuery Form, Validate, Additional Methods -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js" type="text/javascript"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
				  integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
				  crossorigin="anonymous"></script>

		<!-- MY Custom JS -->
		<script src="js/custom.js" type="text/javascript"></script>

		<!-- CSS for Map -->
		<style type="text/css">
			#map {
				height: 800px;
				width: 100%;
				background-color: grey;
			}
		</style>

	</head>



	<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container" style="text-align: center">
				<img src="images/logosmaller.png" alt="ABQUery logo">
			</div>
		</nav>

		<!-- Header -->
		<header>
			<div class="container">

			</div>
		</header>

		<!-- Map Section -->
		<section class="map-section">
			<div id="map" class="container">
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

		<!-- Information Section -->
		<section id="information" class="information-section">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						This is where the information goes
					</div>
				</div>
			</div>
		</section>

		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<p class="text-muted">Copyright &copy; ABQuery 2017</p>
					</div>
					<div class="col-md-4">
					</div>
					<div class="col-md-4">
						<a href="about-view.php"><p class="text-muted">About Us</p></a>
					</div>
				</div>
			</div>
		</footer>


	</body>

</html>