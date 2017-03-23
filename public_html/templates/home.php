<div id="homebody">

	<div class="container logo-search">
		<div class="logo text-center">
			<img class="logo-resize" src="images/abqueryname.png" alt="abquery logo">
		</div>

		<autocomplete [lat]="lat" [lng]="lng" [zoom]="zoom"></autocomplete>
<!--		<form class="col-sm-8 col-sm-offset-2">-->
<!--			<div class="form-group">-->
<!--				<div class="input-group">-->
<!--					<input id="searchAddress" placeholder="Enter a location" autocorrect="off" autocapitalize="off" spellcheck="off" type="text" class="form-control" #search [formControl]="searchControl"/>-->
<!---->
<!--					<div class="input-group-btn">-->
<!--						<button class="btn btn-default btn-md" type="button" routerLink="/map-view">-->
<!--							<i class="glyphicon glyphicon-search"></i>-->
<!--						</button>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</form>-->
	</div>


	<video autoplay loop muted poster="images/screenshot.jpg" id="background">
		<source src="images/backgroundmovie.mp4" type="video/mp4">
	</video>

</div>

