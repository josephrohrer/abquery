import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import {Observable} from "rxjs/Observable";
import {BaseService} from "./base-service";
import {Crime} from "../classes/crime";

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
		return(this.http.get(this.crimeUrl + crimeLocation)
			.map(this.extractData)
			.catch(this.handleError));
	}

	getCrimeByCrimeGeometry(userLocationX: number, userLocationY: number, userDistance: number) : Observable<Crime> {
	return(this.http.get(this.crimeUrl + crimeDistance)
		.map(this.extractData)
		.catch(this.handleError));
	}

	getCrimeByCrimeDate(crimeDate: number) : Observable<Crime> {
		return(this.http.get(this.crimeUrl + crimeDate)
			.map(this.extractData)
			.catch(this.handleError));
	}
}