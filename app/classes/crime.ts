import {Point} from "./point";
export class Crime {
	constructor(public crimeId: number, public crimeLocation: string, public crimeGeometry: Point, public crimeDescription: string, public crimeDate: Date) {}
}