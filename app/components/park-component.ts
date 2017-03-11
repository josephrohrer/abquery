import {Component, OnInit} from "@angular/core";
import {ParkService} from "../services/park-service";
import {Park} from "../classes/park";

@Component({
	templateUrl: "./templates/park.php"
})

export class ParkComponent implements OnInit {

	parks : Park[] = [] ;

	constructor (private parkService : ParkService) {}

	ngOnInit() : void {
		this.getAllParks();
	}

	getAllParks() : void {
		this.parkService.getAllParks()
			.subscribe(parks => this.parks = parks);
	}
}