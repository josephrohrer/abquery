import {Component} from "@angular/core";

@Component({
	templateUrl: "./templates/home.php"
})

export class HomeComponent {
	title: string = 'My first angular2-google-maps project';
	lat: number = 51.678418;
	lng: number = 7.809007;
}
