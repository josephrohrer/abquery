import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import {Observable} from "rxjs/Observable";
import {BaseService} from "./base-service";
import {Feature} from "../classes/feature";

@Injectable()
export class FeatureService extends BaseService {
	constructor(protected http: Http) {
		super(http);
	}

	private featureUrl = "api/feature/";

	getAllFeatures() : Observable<Feature[]> {
		return(this.http.get(this.featureUrl)
			.map(this.extractData)
			.catch(this.handleError));
	}

	getFeatureByFeatureAmenityId(featureAmenityId: number) : Observable<Feature[]> {
		return(this.http.get(this.featureUrl + "?featureAmenityId=" + featureAmenityId)
			.map(this.extractData)
			.catch(this.handleError));
	}

	getFeatureByFeatureParkId(featureParkId: number) : Observable<Feature[]> {
		return(this.http.get(this.featureUrl + "?featureParkId=" + featureParkId)
			.map(this.extractData)
			.catch(this.handleError));
	}
}