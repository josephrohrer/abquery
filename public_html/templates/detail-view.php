
<header class="template-header">
	<div class="col-12 text-center">
		<img src="images/logosmaller.png">
	</div>
</header>



<div class="container text-center dropdown-group">
<button (click)="value=1">Crime</button>
<button (click)="value=2">Park</button>
</div>


<hr>
<div [ngSwitch]="value">

	<div *ngSwitchCase="1"><crime></crime></div>
	<div *ngSwitchCase="2"><park></park></div>
	<div *ngSwitchDefault class="text-center">Please select crime or park</div>

</div>
