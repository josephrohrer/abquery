<!--  list of crimes ================================================= !-->

<div class="container-crime">

	<div class="text-center">
		<h2>CRIME INCIDENTS</h2>
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
						Type
					</a>
				</h4>
			</div>
			<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
				<div class="panel-body">
					Drop down with a list of crime types
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
					Guided up to 50 miles
				</div>
			</div>
		</div>

		<!------DATE RANGE------>
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingThree">
				<h4 class="panel-title">
					<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
						href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						Date Range
					</a>
				</h4>
			</div>
			<div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
				  aria-labelledby="headingThree">
				<div class="panel-body">
					<div class="input-group">
						<div class="input-group-btn">
							<input type="text" class="form-control input-crime" placeholder="Date">
							<input type="text" class="form-control input-crime" placeholder="Date">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!----CRIME CARD----->
	<div class="demo-card bg-light-gray">
		<div class="row">
			<div class="col-xs-8">
				<h4>AGGRAVATED ASSAULT</h4>
			</div>
			<div class="col-xs-4 crime-right">
				3.4 mi.
				<a href="#"><img src="images/mappoint.png" alt="Point"> </a>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-8">
				400 BLOCK CHACOMA PL SW
			</div>
			<div class="col-xs-4 crime-right">
				03/16/17
			</div>
		</div>
	</div><!--CRIME CARD END-->



</div><!--container-->