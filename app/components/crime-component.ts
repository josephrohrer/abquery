import {Component, OnInit} from "@angular/core";
import {CrimeService} from "../services/crime-service";
import {Crime} from "../classes/crime";

@Component({
	templateUrl: "./templates/crime.php"
})

export class CrimeComponent implements OnInit {

	crimes : Crime[] = [] ;

	constructor (private crimeService : CrimeService) {}

	ngOnInit() : void {
		this.getAllCrimes();
	}

	getAllCrimes() : void {
		this.crimeService.getAllCrimes()
			.subscribe(crimes => this.crimes = crimes);
	}
}