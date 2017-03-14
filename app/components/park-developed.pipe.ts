import {Pipe, PipeTransform} from '@angular/core';


@Pipe({
	name: 'parkDeveloped'
})

export class ParkDevelopedPipe implements PipeTransform {
	transform(value: boolean) {
		return value ? 'Yes' : 'No';
	}
}