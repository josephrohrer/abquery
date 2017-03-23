import {Injectable, NgZone} from "@angular/core";
import {MapsAPILoader} from "angular2-google-maps/core";

@Injectable()
export class LocationService {
	public lat: number = 35.105332;
	public lng: number = -106.629385;

	constructor(private mapsAPILoader: MapsAPILoader,
					private ngZone: NgZone) {}

	setCurrentPositionFromAutocomplete(lat : number, lng : number) : void {
		this.lat = lat;
		this.lng = lng;
	}

	setCurrentPositionFromGPS() : void {
		if ("geolocation" in navigator) {
			navigator.geolocation.getCurrentPosition((position) => {
				this.lat = position.coords.latitude;
				this.lng = position.coords.longitude;
			});
		}
	}

	getCurrentPosition() : any {
		return({lat: this.lat, lng: this.lng});
	}
}