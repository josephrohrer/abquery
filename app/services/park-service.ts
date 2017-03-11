import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import {Observable} from "rxjs/Observable";
import {BaseService} from "./base-service";
import {Park} from "../classes/park";
import {PointDistance} from "../classes/point-distance";

@Injectable()
export class ParkService extends BaseService {
	constructor(protected http: Http) {
		super(http);
	}

	private parkUrl = "api/park/";

	getAllParks() : Observable<Park[]> {
		return(this.http.get(this.parkUrl)
			.map(this.extractData)
			.catch(this.handleError));
	}

	getParkbyParkId(parkId: number) : Observable<Park> {
		return(this.http.get(this.parkUrl + parkId)
			.map(this.extractData)
			.catch(this.handleError));
	}

	getParkByParkGeometry(pointDistance: PointDistance) : Observable<Park[]> {
		return(this.http.get(this.parkUrl + "?userLocationX=" + pointDistance.userLocationX + "&userLocationY=" + pointDistance.userLocationY + "&userDistance=" + pointDistance.userDistance)
			.map(this.extractData)
			.catch(this.handleError));
	}
}