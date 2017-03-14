import {Component, OnInit} from "@angular/core";
import {ParkService} from "../services/park-service";
import {Park} from "../classes/park";
import {Observable} from "rxjs";

@Component({
	selector: "park",
	templateUrl: "./templates/park.php"
})

export class ParkComponent implements OnInit {
	parksFiltered : Park[] = [];
	parkObservable : Observable<Park> = null;

	constructor (private parkService : ParkService) {}

	ngOnInit() : void {
		this.getAllParks();
	}

	getAllParks() : void {
		this.parkService.getAllParks()
			.subscribe(parks => {
				this.parkObservable = Observable.from(parks);
				this.parksFiltered = parks.slice(0, 75);
			});
	}
}
