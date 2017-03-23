import {Component, OnInit} from "@angular/core";
import {LocationService} from "./services/location-service";

@Component({
	// Update selector with YOUR_APP_NAME-app. This needs to match the custom tag in webpack/index.php
	selector: 'abquery',

	// templateUrl path to your public_html/templates directory.
	templateUrl: './templates/abquery.php'
})

export class AppComponent implements OnInit {

	constructor(private locationService: LocationService) {}

	ngOnInit() {
		this.locationService.setCurrentPositionFromGPS();
	}
}
