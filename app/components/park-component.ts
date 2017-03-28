import {Component, OnInit, OnChanges, Output, Input, EventEmitter} from "@angular/core";
import {ParkService} from "../services/park-service";
import {Park} from "../classes/park";
import {Observable} from "rxjs";
import "rxjs/add/observable/from";
import {PointDistance} from "../classes/point-distance";
import {AmenityService} from "../services/amenity-service";
import {FeatureService} from "../services/feature-service";
import {Amenity} from "../classes/amenity";

@Component({
	selector: "park",
	templateUrl: "./templates/park.php"
})

export class ParkComponent implements OnChanges, OnInit {

	@Input() lat: number;
	@Input() lng: number;
	@Output() parksFiltered: Park[] = [];
	@Output() onFiltered = new EventEmitter<Park[]>();
	parkObservable: Observable<Park> = null;
	amenities: any[] = [];
	parkFeatures: any = {};

	constructor(private parkService: ParkService, private amenityService: AmenityService, private featureService: FeatureService) {}
	ngOnChanges(): void {
		this.getParkByParkGeometry();
	}
	ngOnInit(): void {
		this.getAllAmenities();
	}

	getParkByParkGeometry(): void {
		let pointDistance = new PointDistance(this.lng, this.lat, 5);
		this.parkService.getParkByParkGeometry(pointDistance).subscribe(parks => {
			this.parkObservable = Observable.from(parks);
			this.parksFiltered = parks.slice(0, 25);
			this.parkFeatures = {};
			for(let park of this.parksFiltered) {
				this.featureService.getFeatureByFeatureParkId(park.parkId).subscribe(features => this.parkFeatures[park.parkId] = features);
			}
			this.onFiltered.emit(this.parksFiltered);
		});
	}
	getParkAmenities(parkId: number): any[] {
		let parkAmenities: any[] = [];
		for(let feature of this.parkFeatures[parkId]) {
			let amenity = this.amenities.find(amenity => amenity.amenityId === feature.featureAmenityId);
			amenity.amenityValue = feature.featureValue;
			parkAmenities.push(amenity);
		}
		return parkAmenities;
	}

	getAllAmenities(): void {
		this.amenityService.getAllAmenities().subscribe(amenities => this.amenities = amenities);
	}
}
