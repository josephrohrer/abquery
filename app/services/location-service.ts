import {Injectable, NgZone} from "@angular/core";
import {MapsAPILoader} from "angular2-google-maps/core";
import {Observable} from "rxjs";

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

	setCurrentPositionFromGPS() : Observable<any> {
		return Observable.create((observer : any) => {

			if (window.navigator && window.navigator.geolocation) {
				window.navigator.geolocation.getCurrentPosition(
					(position) => {
						this.lat = position.coords.latitude;
						this.lng = position.coords.longitude;
						observer.next({lat: position.coords.latitude, lng: position.coords.longitude});
						observer.complete();
					},
					(error) => {
						switch (error.code) {
							case 1:
								observer.error("User clicked deny - the bastards!");
								break;
							case 2:
								observer.error("Cannot find location - can you lend me a compass?");
								break;
							case 3:
								observer.error("Timeout waiting for location - please upgrade from Sprint!");
								break;
						}
					});
			}
			else {
				observer.error("Unsupported browser - be gone Internet Explorer!");
			}

		});
	}

	getCurrentPosition() : any {
		return({lat: this.lat, lng: this.lng});
	}
}