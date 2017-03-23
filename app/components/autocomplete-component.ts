import {Component, OnInit, NgZone, ElementRef, ViewChild, Input} from "@angular/core";
import { AgmCoreModule, MapsAPILoader } from 'angular2-google-maps/core';
import {LocationService} from "../services/location-service";

declare var google: any;

@Component({
	selector: "autocomplete",
	templateUrl: "./templates/autocomplete.php"
})
class AutocompleteComponent implements OnInit {
	@Input() lat : number;
	@Input() lng : number;
	@Input() zoom : number;

	@ViewChild("search")
	public searchElementRef: ElementRef;

	constructor(
		private locationService: LocationService,
		private mapsAPILoader: MapsAPILoader,
		private ngZone: NgZone
	) {}

	ngOnInit() : void {
		//load Places Autocomplete
		this.mapsAPILoader.load().then(() => {
			let autocomplete = new google.maps.places.Autocomplete(this.searchElementRef.nativeElement, {
				types: ["address"]
			});
			autocomplete.addListener("place_changed", () => {
				this.ngZone.run(() => {
					//get the place result
					let place: google.maps.places.PlaceResult = autocomplete.getPlace();

					//verify result
					if (place.geometry === undefined || place.geometry === null) {
						return;
					}

					//set latitude, longitude and zoom
					this.locationService.setCurrentPositionFromAutocomplete(place.geometry.location.lat(), place.geometry.location.lng());
					this.lat = place.geometry.location.lat();
					this.lng = place.geometry.location.lng();
					this.zoom = 12;
				});
			});
		});
	}
}