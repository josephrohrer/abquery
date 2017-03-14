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
								<label><input type="checkbox" value="">Soccer Fields</label>
							</div>
							<div class="checkbox">
								<label><input type="checkbox" value="">Softball Fields - Lit</label>
							</div>
							<div class="checkbox">
								<label><input type="checkbox" value="">Softball Fields - Unlit</label>
							</div>
							<div class="checkbox">
								<label><input type="checkbox" value="">Tennis Courts - Lit</label>
							</div>
							<div class="checkbox">
								<label><input type="checkbox" value="">Tennis Courts - Unlit</label>
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