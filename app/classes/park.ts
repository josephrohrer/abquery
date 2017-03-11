import {Point} from "./point";
export class Park {
	constructor(public parkId: number, public parkName: string, public parkGeometry: Point, public parkDeveloped: number) {}
}