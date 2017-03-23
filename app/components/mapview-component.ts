import {Component, OnInit, ViewChild, Output} from '@angular/core';
import {Crime} from "../classes/crime";
import {Park} from "../classes/park";
import {CrimeComponent} from "./crime-component";
import {ParkComponent} from "./park-component";
import {LocationService} from "../services/location-service";

@Component({
	templateUrl: "./templates/map-view.php"
})

export class MapViewComponent implements OnInit {
	@ViewChild(CrimeComponent) crimeComponent: CrimeComponent;
	@ViewChild(ParkComponent) parkComponent: ParkComponent;

	points : any[] = [];
	public lat: number = 0;
	public lng: number = 0;
	@Output() name: string;
	public zoom: number = 12;

	constructor(private locationService: LocationService) {}

	mapCrime(crimesFiltered : Crime[]) : void {
		this.points = [];
		this.updateLocation();
		crimesFiltered.map(crime => this.points.push({lat: crime.crimeGeometry.lat, lng: crime.crimeGeometry.lng}));
	}

	mapPark(parksFiltered : Park[]) : void {
		this.points = [];
		this.updateLocation();
		parksFiltered.map(park => this.points.push({lat: park.parkGeometry.lat, lng: park.parkGeometry.lng, name:park.parkName}));
	}

	ngOnInit() : void {
		this.locationService.setCurrentPositionFromGPS()
			.subscribe(location => {
				this.lat = location.lat;
				this.lng = location.lng;
			});
	}

	updateLocation() : void {
		let location = this.locationService.getCurrentPosition();
		this.lat = location.lat;
		this.lng = location.lng;
	}
}
