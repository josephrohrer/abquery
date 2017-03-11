import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import {Observable} from "rxjs/Observable";
import {BaseService} from "./base-service";
import {Crime} from "../classes/crime";
import {PointDistance} from "../classes/point-distance";

@Injectable()
export class CrimeService extends BaseService {
	constructor(protected http: Http) {
		super(http);
	}

	private crimeUrl = "api/crime/";

	getAllCrimes() : Observable<Crime[]> {
		return(this.http.get(this.crimeUrl)
			.map(this.extractData)
			.catch(this.handleError));
	}

	getCrimeByCrimeId(crimeId: number) : Observable<Crime> {
		return(this.http.get(this.crimeUrl + crimeId)
			.map(this.extractData)
			.catch(this.handleError));
	}

	getCrimeByCrimeLocation(crimeLocation: string) : Observable<Crime> {
		return(this.http.get(this.crimeUrl + "?crimeLocation=" + crimeLocation)
			.map(this.extractData)
			.catch(this.handleError));
	}

	getCrimeByCrimeGeometry(pointDistance: PointDistance) : Observable<Crime[]> {
	return(this.http.get(this.crimeUrl + "?userLocationX=" + pointDistance.userLocationX + "&userLocationY=" + pointDistance.userLocationY + "&userDistance=" + pointDistance.userDistance)
		.map(this.extractData)
		.catch(this.handleError));
	}

	getCrimeByCrimeDate(crimeSunriseDate: Date, crimeSunsetDate: Date) : Observable<Crime[]> {
		return(this.http.get(this.crimeUrl + "?crimeSunriseDate=" + +crimeSunriseDate + "&crimeSunsetDate=" + +crimeSunsetDate)
			.map(this.extractData)
			.catch(this.handleError));
	}
}