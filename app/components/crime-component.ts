import {Component, OnInit} from "@angular/core";
import {ParkService} from "../services/park-service";
import {Park} from "../classes/park";

@Component({
	templateUrl: "./templates/crime.php"
})

export class CrimeComponent implements OnInit {

	parks : Park[] = [] ;

	constructor (private crimeService : CrimeService) {}

	ngOnInit() : void {
		this.getAllCrimes();
	}

	getAllParks() : void {
		this.parkService.getAllCrimes()
			.subscribe(parks => this.crimes = parks);
	}
}