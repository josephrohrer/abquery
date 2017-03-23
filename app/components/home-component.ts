import {Component, ElementRef, ViewChild, Output, Input} from '@angular/core';

@Component({
	templateUrl: "./templates/home.php"
})

export class HomeComponent {
	@Input() lat : number;
	@Input() lng : number;
	@Input() zoom : number;

	@Output()
	@ViewChild("search")
	public searchElementRef: ElementRef;
}
