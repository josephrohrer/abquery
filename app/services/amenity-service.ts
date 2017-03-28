import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import {Observable} from "rxjs/Observable";
import {BaseService} from "./base-service";
import {Amenity} from "../classes/amenity";

@Injectable()
export class AmenityService extends BaseService {
	constructor(protected http: Http) {
		super(http);
	}

	private amenityUrl = "api/amenity/";

	getAllAmenities() : Observable<Amenity[]> {
		return(this.http.get(this.amenityUrl)
			.map(this.extractData)
			.catch(this.handleError));
	}

	getAmenityByAmenityId(amenityId: number) : Observable<Amenity> {
		return(this.http.get(this.amenityUrl + amenityId)
			.map(this.extractData)
			.catch(this.handleError));
	}

	getAmenityByAmenityName(amenityName: string) : Observable<Amenity[]> {
		return(this.http.get(this.amenityUrl + "?amenityName=" + amenityName)
			.map(this.extractData)
			.catch(this.handleError));
	}
}