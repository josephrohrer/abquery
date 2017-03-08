import {RouterModule, Routes} from "@angular/router";
import {HomeComponent} from "./components/home-component";
import {AboutComponent} from "./components/about-component";
import {NotFoundComponent} from "./components/notfound-component";
import {MapComponent} from "./components/map-component";

export const allAppComponents = [HomeComponent, AboutComponent, MapComponent, NotFoundComponent];

export const routes: Routes = [
	{path: "", component: HomeComponent},
	{path: "about", component: AboutComponent},
	{path: "**", component: NotFoundComponent},
	{path: "map", component: MapComponent},
];

export const appRoutingProviders: any[] = [];

export const routing = RouterModule.forRoot(routes);