import DateTimeFormat = Intl.DateTimeFormat;
export class Crime {
	constructor(public crimeId: number, public crimeLocation: string, public crimeGeometryX: number, public crimeGeometryY: number, public crimeDescription: string, public crimeDate: number) {}
}