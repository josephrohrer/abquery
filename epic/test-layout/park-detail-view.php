<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="images/favicon.ico">

		<title>ABQuery - Parks</title>

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

	<!--  nav & search ==================================================== !-->


	<body class="sfooter">

		<header class="template-header">
			<div class="col-12 text-center">
				<img src="images/logosmaller.png">
			</div>
		</header>

		<main class="template-main sfooter-content">

			<!--  list of crimes ================================================= !-->

			<div class="container-crime">

				<div class="text-center">
					<h2>PARKS</h2>
				</div>

				<div>
					<h4>Filters</h4>
				</div>

				<!---------TYPES------->
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title">
								<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
									aria-expanded="false" aria-controls="collapseOne">
									Amenities
								</a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body amenities-select">
								<div class="row">
									<div class="col-xs-6">
										<div class="checkbox">
											<label><input type="checkbox" value="">Developed Park</label>
										</div>
										<div class="checkbox">
											<label><input type="checkbox" value="">Baseball - Backstops</label>
										</div>
										<div class="checkbox">
											<label><input type="checkbox" value="">Baseball Fields - Youth</label>
										</div>
										<div class="checkbox">
											<label><input type="checkbox" value="">Basketball Courts - Full</label>
										</div>
										<div class="checkbox">
											<label><input type="checkbox" value="">Basketball Courts - Half</label>
										</div>
										<div class="checkbox">
											<label><input type="checkbox" value="">Horseshoe Pits</label>
										</div>
										<div class="checkbox">
											<label><input type="checkbox" value="">Jogging Paths</label>
										</div>
										<div class="checkbox">
											<label><input type="checkbox" value="">Picnic Tables</label>
										</div>

									</div>
									<div class="col-xs-6">
										<div class="checkbox">
											<label><input type="checkbox" value="">Play Areas</label>
										</div>
										<div class="checkbox">
											<label><input type="checkbox" value="">Pools - Indoor</label>
										</div>
										<div class="checkbox">
											<label><input type="checkbox" value="">Pools - Outdoor</label>
										</div>
										<div class="checkbox">
											<label><input type="checkbox" value="">Shade Structures</label>
										</div>
										<div class="checkbox">
											<label><input type="checkbox" value="">Soccer Fields </label>
										</div>
										<div class="checkbox">
											<label><input type="checkbox" value="">Softball Fields - Lit </label>
										</div>
										<div class="checkbox">
											<label><input type="checkbox" value="">Softball Fields - Unlit</label>
										</div>
										<div class="checkbox">
											<label><input type="checkbox" value="">Tennis Courts - Lit</label>
										</div>
										<div class="checkbox">
											<label><input type="checkbox" value=""> Tennis Courts - Unlit </label>
										</div>
										<div class="checkbox">
											<label><input type="checkbox" value="">Volleyball Courts</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!--------DISTANCE------>
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingTwo">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
									href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									Distance
								</a>
							</h4>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
							<div class="panel-body">
								<input id="ex19" type="text"
										 data-provide="slider"
										 data-slider-ticks="[1, 2, 3]"
										 data-slider-ticks-labels='["short", "medium", "long"]'
										 data-slider-min="1"
										 data-slider-max="3"
										 data-slider-step="1"
										 data-slider-value="3"
										 data-slider-tooltip="hide"/>
							</div>
						</div>
					</div>

				</div>

				<!----PARK CARD----->
				<div class="demo-card bg-light-gray">
					<div class="row">
						<div class="col-xs-8">
							<h4>WEST BLUFF</h4>
						</div>
						<div class="col-xs-4 park-right">
							3.4 mi.
							<a href="#"><img src="images/mappoint.png" alt="Point"> </a>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-8">
							3200 San Mateo Blvd.
						</div>
						<div class="col-xs-4 park-right">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-8 amenities-list">
							Developed: Yes<br>
							Baseball - Backstops: 1<br>
							Basketball Courts - Full: 1<br>
							Picnic Tables: 4<br>
							Shade Structures: 1<br>
						</div>
						<div class="col-xs-4 park-right">
						</div>
					</div>
				</div><!--PARK CARD END-->

				<!----PARK CARD----->
				<div class="demo-card bg-light-gray">
					<div class="row">
						<div class="col-xs-8">
							<h4>WEST BLUFF</h4>
						</div>
						<div class="col-xs-4 park-right">
							3.4 mi.
							<a href="#"><img src="images/mappoint.png" alt="Point"> </a>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-8">
							3200 San Mateo Blvd.
						</div>
						<div class="col-xs-4 park-right">
						</div>
					</div>
				</div><!--PARK CARD END-->

			</div><!--container-->

		</main>

		<footer class="template-footer">
			<div class="col-12 text-center">
				<p class="footer-content text-muted">Copyright &copy; ABQuery 2017 | <a href="about-view.php">About Us</a>
				</p>
			</div>
		</footer>

	</body>
</html>