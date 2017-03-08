<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="images/favicon.ico"

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

	</head>

	<!-- splash page==================================================== !-->

	<body>


		<!-- background vid -->
		<!--<div class="video-abq">
			<div id="background-video">
				<div class="embed-responsive embed-responsive-16by9">
					<video src="video/abq%20sky.mp4" type="video" autoplay muted loop <video></video>
				</div>
			</div>
		</div>-->

		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container" style="text-align: center">
				<img src="images/logosmaller.png" alt="ABQUery logo">
			</div>
		</nav>

		<!--This will be the card format for the park information hopefully-->
		<div class="container">
			<div class="col-sm-12 exit-button">
				<!--button to close the view and go back to the map-->
				<button class="park-close-button">X</button>
			</div>
			<div class="col-sm-12 park-head">
				  This will be the head where the info is on parks nearby so depending on the query and location it could
				return.
			</div>
			"There are 8 parks within 10 miles of 1234 1st street."
			<div class="col-sm-12 park-box"><!-- this will be the main div containing the other info-->
				<div class="col-sm-6 park-name">Will be the park name</div>
				<div class="col-sm-6 park-distance">Should hopefully show the park distance in the top right.</div>
				<div class="col-sm-12 park-data">Will be the park information</div>
			</div>

		</div>

		<!-- container-fluid -->


		<!-- Search bar -->

		<!-- Footer -->
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
