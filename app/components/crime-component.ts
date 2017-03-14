import {Component, OnInit, Input, OnChanges} from "@angular/core";
import {CrimeService} from "../services/crime-service";
import {Crime} from "../classes/crime";
import {Observable} from "rxjs";
import "rxjs/add/observable/from";
import {PointDistance} from "../classes/point-distance";

@Component({
	selector: "crime",
	templateUrl: "./templates/crime.php"
})

export class CrimeComponent implements OnChanges {

	@Input() lat : number;
	@Input() lng : number;
	crimesFiltered : Crime[] = [];
	crimeObservable : Observable<Crime> = null;

	constructor (private crimeService : CrimeService) {}
	ngOnChanges() : void {
		this.getCrimeByCrimeGeometry();
	}

	getCrimeByCrimeGeometry() : void {
		let pointDistance = new PointDistance(this.lng, this.lat, 5);
		this.crimeService.getCrimeByCrimeGeometry(pointDistance)
			.subscribe(crimes => {
				this.crimeObservable = Observable.from(crimes);
				this.crimesFiltered = crimes.slice(0, 50);
			});
	}
}