import {Component, ElementRef, NgZone, OnInit, ViewChild, Output, Input, OnChanges} from '@angular/core';
import { FormControl } from "@angular/forms";
import { AgmCoreModule, MapsAPILoader } from 'angular2-google-maps/core';
import {Crime} from "../classes/crime";
import {Park} from "../classes/park";
import {CrimeComponent} from "./crime-component";
import {ParkComponent} from "./park-component";

declare var google: any;

@Component({
	templateUrl: "./templates/map-view.php"
})

export class MapViewComponent implements OnInit {
	@ViewChild(CrimeComponent) crimeComponent: CrimeComponent;
	@ViewChild(ParkComponent) parkComponent: ParkComponent;

	// @Input() crimesFiltered : Crime[] = [];
	// @Input() parksFiltered : Park[] = [];
	points : any[] = [];
	@Output() lat: number;
	@Output() lng: number;
	@Output() name: string;
	//public lat: number;
	//public lng: number;
	public searchControl: FormControl;
	public zoom: number;

	@ViewChild("search")
	public searchElementRef: ElementRef;

	constructor(
		private mapsAPILoader: MapsAPILoader,
		private ngZone: NgZone
	) {}

	mapCrime(crimesFiltered : Crime[]) : void {
		this.points = [];
		crimesFiltered.map(crime => this.points.push({lat: crime.crimeGeometry.lat, lng: crime.crimeGeometry.lng}));
	}

	mapPark(parksFiltered : Park[]) : void {
		this.points = [];
		parksFiltered.map(park => this.points.push({lat: park.parkGeometry.lat, lng: park.parkGeometry.lng, name:park.parkName}));
	}

	ngOnInit() {
		//set google maps defaults
		this.zoom = 16;
		this.lat = 35.105332;
		this.lng = -106.629385;

		//create search FormControl
		this.searchControl = new FormControl();

		//set current position
		this.setCurrentPosition();

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
					this.lat = place.geometry.location.lat();
					this.lng = place.geometry.location.lng();
					this.zoom = 16;
				});
			});
		});
	}

	private setCurrentPosition() {
		if ("geolocation" in navigator) {
			navigator.geolocation.getCurrentPosition((position) => {
				this.lat = position.coords.latitude;
				this.lng = position.coords.longitude;
				this.zoom = 16;
			});
		}
	}
}
