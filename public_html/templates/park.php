<h1>Park</h1>
<ul>
	<li *ngFor="let park of parks">{{ park.parkName }} {{ park.parkId }} {{ park.parkDeveloped }}</li>
</ul>