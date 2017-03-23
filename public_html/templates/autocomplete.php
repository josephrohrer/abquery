<form class="col-sm-8 col-sm-offset-2">
	<div class="form-group">
		<div class="input-group">
			<input id="searchAddress" placeholder="Enter a location" autocorrect="off" autocapitalize="off"
					 spellcheck="off" type="text" class="form-control" #search [formControl]="searchControl"/>

			<div class="input-group-btn">
				<button class="btn btn-default btn-md" type="button" routerLink="/map-view">
					<i class="glyphicon glyphicon-search"></i>
				</button>
			</div>
		</div>
	</div>
</form>