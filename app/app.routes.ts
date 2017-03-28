import {RouterModule, Routes} from "@angular/router";
import {HomeComponent} from "./components/home-component";
import {AboutComponent} from "./components/about-component";
import {NotFoundComponent} from "./components/notfound-component";
import {MapComponent} from "./components/map-component";
import {HeaderComponent} from "./components/header-component";
import {MapViewComponent} from "./components/mapview-component";
import {DetailViewComponent} from "./components/detailview-component";
import {ParkComponent} from "./components/park-component";
import {CrimeComponent} from "./components/crime-component";
import {ParkViewComponent} from "./components/parkview-component";
import {CrimeViewComponent} from "./components/crimeview-component";

export const allAppComponents = [HomeComponent, AboutComponent, MapComponent, NotFoundComponent, HeaderComponent, MapViewComponent, DetailViewComponent, ParkComponent, CrimeComponent, ParkViewComponent, CrimeViewComponent];

export const routes: Routes = [
	{path: "about", component: AboutComponent},
	{path: "crime-view", component: CrimeViewComponent},
	{path: "park-view", component: ParkViewComponent},
	{path: "", component: MapViewComponent},
	{path: "**", component: NotFoundComponent},

];

export const appRoutingProviders: any[] = [];

export const routing = RouterModule.forRoot(routes);