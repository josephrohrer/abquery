<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="images/favicon.ico">

		<title>Insert Title Here</title>

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


	<body class="sfooter">

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

			<div class="container data-drop">
				<h2>Data Type</h2>
				<p>Please choose crime or park data</p>
				<div class="dropdown">
					<button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Data Type
						<span class="caret"></span></button>
					<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
						<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Park Data</a></li>
						<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Crime Data</a></li>
					</ul>
				</div>
			</div>

			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h2>Dropdowns</h2>
						<p>The .dropdown class is used to indicate a dropdown menu.</p>
						<p>Use the .dropdown-menu class to actually build the dropdown menu.</p>
						<div class="dropdown">
							<button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
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
					<div class="col-md-6">
						<h2>Park Amenities</h2>
						<p>Please select the amenity you would like to search for</p>
						<div class="dropdown">
							<button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
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
			</div>

		</main>

		<footer class="template-footer">
			<div class="col-12 text-center">
				<p class="footer-content text-muted">Copyright &copy; ABQuery 2017 | <a href="about-view.php">About Us</a>
				</p>
			</div>
		</footer>

	</body>
</html>