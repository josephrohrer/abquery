import {NgModule, ApplicationRef} from "@angular/core";
import {BrowserModule} from "@angular/platform-browser";
import {FormsModule} from "@angular/forms";
import {HttpModule} from "@angular/http";
import {AppComponent} from "./app.component";

// for angular google maps
import {CommonModule} from "@angular/common";
import {AgmCoreModule} from "angular2-google-maps/core";

import {allAppComponents, appRoutingProviders, routing} from "./app.routes";

const moduleDeclarations = [AppComponent];

@NgModule({
	imports:      [BrowserModule, FormsModule, HttpModule, routing, CommonModule, AgmCoreModule.forRoot({apiKey: 'AIzaSyCu21jbQZ73LpaSpGsA4qrZOrASk7pzlN8'})],
	declarations: [...moduleDeclarations, ...allAppComponents],
	bootstrap:    [AppComponent],
	providers:    [appRoutingProviders]
})
export class AppModule {}