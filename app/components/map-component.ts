import {Component} from "@angular/core";

@Component({
	selector: "query-map",
	templateUrl: "./templates/map.php"
})

export class MapComponent {
	title: string = 'ABQuery';
	lat: number = 35.105332;
	lng: number = -106.629385;
}
