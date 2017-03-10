import {RouterModule, Routes} from "@angular/router";
import {HomeComponent} from "./components/home-component";
import {AboutComponent} from "./components/about-component";
import {NotFoundComponent} from "./components/notfound-component";
import {MapComponent} from "./components/map-component";
import {HeaderComponent} from "./components/header-component";
import {MapViewComponent} from "./components/mapview-component";
import {DetailViewComponent} from "./components/detailview-component";

export const allAppComponents = [HomeComponent, AboutComponent, MapComponent, NotFoundComponent, HeaderComponent, MapViewComponent, DetailViewComponent];

export const routes: Routes = [
	{path: "", component: HomeComponent},
	{path: "about", component: AboutComponent},
	{path: "map-view", component: MapViewComponent},
	{path: "detail-view", component: DetailViewComponent},
	{path: "**", component: NotFoundComponent}
];

export const appRoutingProviders: any[] = [];

export const routing = RouterModule.forRoot(routes);