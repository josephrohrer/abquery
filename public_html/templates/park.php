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
	</div>

	<!----PARK CARD----->
	<div class="demo-card bg-light-gray" *ngFor="let park of parksFiltered">
		<div class="row">
			<div class="col-xs-8">
				<h4>{{ park.parkName }}</h4>
			</div>
			<div class="col-xs-4 park-right">
				<!-- <img src="images/mappoint.png" alt="Point"> -->
			</div>
		</div>
		<div class="row">
			<div class="col-xs-8 amenities-list">
				Developed: {{ park.parkDeveloped | parkDeveloped }}<br>
			</div>
			<div class="col-xs-4 park-right">
			</div>
		</div>
	</div><!--PARK CARD END-->


</div><!--container-->