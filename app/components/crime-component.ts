import {Component, OnInit, Input} from "@angular/core";
import {CrimeService} from "../services/crime-service";
import {Crime} from "../classes/crime";
import {Observable} from "rxjs";
import "rxjs/add/observable/from";

@Component({
	selector: "crime",
	templateUrl: "./templates/crime.php"
})

export class CrimeComponent implements OnInit {

	@Input() lat : number;
	@Input() lng : number;
	crimesFiltered : Crime[] = [];
	crimeObservable : Observable<Crime> = null;

	constructor (private crimeService : CrimeService) {}

	ngOnInit() : void {
		console.log("Daniel smells " + this.lat );
		this.getAllCrimes();
	}

	getAllCrimes() : void {
		this.crimeService.getAllCrimes()
			.subscribe(crimes => {
				this.crimeObservable = Observable.from(crimes);
				this.crimesFiltered = crimes.slice(0, 75);
			});
	}
}