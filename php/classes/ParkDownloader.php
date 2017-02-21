<?php

namespace Edu\Cnm\Abquery;
require_once("autoload.php");
require_once("/etc/apache2/capstone-mysql/encrypted-config.php");

/**
 * This class will download parks data from the City of Albuquerque City Data Database.
 *
 * @author Joseph Rohrer jrohrer@cnm.edu
 *
 **/


class DataDownloader extends \DataDownloader {

	/**
	 *
	 * parks: http://coagisweb.cabq.gov/arcgis/rest/services/public/recreation/MapServer/0/query?where=1%3D1&text=&objectIds=&time=&geometry=&geometryType=esriGeometryEnvelope&inSR=&spatialRel=esriSpatialRelIntersects&relationParam=&outFields=*&returnGeometry=true&maxAllowableOffset=&geometryPrecision=&outSR=4326&returnIdsOnly=false&returnCountOnly=false&orderByFields=&groupByFieldsForStatistics=&outStatistics=&returnZ=false&returnM=false&gdbVersion=&f=pjson
	 *
	 **/

	/**
	 * foreach that pulls name and parkId from the JSON
	 */


	foreach($attributes as $attribute) {
	$parkId = $attribute->OBJECTID;
	$parkName = $attribute->PARKNAME;
	}


	/**
	 * foreach loop that will make an array of points from the JSON and send it to the euclideanMean function in the Point class
	 */

	foreach($jsonFeatures as $parkFeature) {
	$park = $crimeFeature->geometry;
	if($crimeFeature->geometry->type === "esriGeometryPoint") {
		$coordinates = new \SplFixedArray(count($parkCoordinates));
		foreach($crimeCoordinates as $coordinate) {
			$coordinates[$coordinates->key()] = $coordinate;
			$coordinates->next();
		}
	// FIXME: Put into euclideanMean

	/**
	 * foreach to pull in developed acres and put it into parkDeveloped boolean to return if YES or NO for developed
	 **/


	/**
	* foreach to take rest of park JSON and put into a features array
	/**



/**
 *
 * attributes
 * OBJECTID -> $parkId
 * PARKNAME -> $parkName
 * PARKSTATUS -> null
 * JURISDICTION -> null     Do you have to set these to null or can you skip them?!!!
 *
 *
 *
 * geometry
 * rings
 * -> create an array of points for each parkId
 * -> plug into ->
 * -> $euclideanMean
 *
 * FEATURES
 * attributes
 * $parkId ->
 *
 *
**/


foreach()


}



}

DataDownloader::readDataJson("http://coagisweb.cabq.gov/arcgis/rest/services/public/recreation/MapServer/0/query?where=1%3D1&text=&objectIds=&time=&geometry=&geometryType=esriGeometryEnvelope&inSR=&spatialRel=esriSpatialRelIntersects&relationParam=&outFields=*&returnGeometry=true&maxAllowableOffset=&geometryPrecision=&outSR=4326&returnIdsOnly=false&returnCountOnly=false&orderByFields=&groupByFieldsForStatistics=&outStatistics=&returnZ=false&returnM=false&gdbVersion=&f=pjson");




/**"OBJECTID": 276728,
    "PARKNAME": "AZTEC",
    "PARKSTATUS": "D",
    "JURISDICTION": "CITY",
    "ACRES": 5.5388133799999997,
    "DEVELOPEDACRES": 5.5,
    "LITTENNISCOURTS": 0,
    "UNLITTENNISCOURTS": 6,
    "PLAYAREAS": 2,
    "FULLBASKETBALLCOURTS": 0,
    "HALFBASKETBALLCOURTS": 0,
    "SOCCERFIELDS": 1,
    "LITSOFTBALLFIELDS": 0,
    "UNLITSOFTBALLFIELDS": 0,
    "YOUTHBALLFIELDS": 0,
    "INDOORPOOLS": 0,
    "OUTDOORPOOLS": 0,
    "HORSESHOEPITS": 0,
    "VOLLEYBALLCOURTS": 0,
    "BACKSTOPS": 0,
    "PICNICTABLES": 7,
    "SHADESTRUCTURES": 1,
    "PARKINGSPACES": 0,
    "JOGGINGPATHS": 0,

 *
"geometry": {
"rings": [
[
[
-11866750.687800001,
4173246.3906000033
],
[
-11866753.1613,
4173248.9043999985
],
[
-11866754.5711,
4173253.1036000028
],
 *
 *
 *
 *

$parkId = "";
$parkName = "";
$parkGeometryX = "";
$parkGeometryY = "";
$parkDeveloped = "";

$featureAmenityId = 1;
$featureParkId =
$featureValue =

$amenityId = 1;
$amenityCityName = "";
$amenityName = "";
 *
 *
 *
 *
 **/

