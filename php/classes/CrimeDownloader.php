<?php
namespace Edu\Cnm\Abquery;

require_once("autoload.php");


/**
 * This class will download crime incedents data from the City of Albuquerque Database.
 *
 * @author Brett Gilbert bgilbert9@cnm.edu
 **/
class CrimeDownloader extends DataDownloader {

	/**
	 * crime: http://coagisweb.cabq.gov/arcgis/rest/services/public/APD_Incidents/MapServer/0/query?where=1%3D1&text=&objectIds=&time=&geometry=&geometryType=esriGeometryEnvelope&inSR=&spatialRel=esriSpatialRelIntersects&relationParam=&outFields=*&returnGeometry=true&maxAllowableOffset=&geometryPrecision=&outSR=4326&returnIdsOnly=false&returnCountOnly=false&orderByFields=&groupByFieldsForStatistics=&outStatistics=&returnZ=false&returnM=false&gdbVersion=&returnDistinctValues=false&f=pjson
	 **/
}



foreach($attributes as $attribute) {
	$crimeId = $attribute->OBJECTID;
	$crimeLocation = $attribute->CV_BLOCK_ADD;
	$crimeDescription = $attribute->CVINC_TYPE;
	$crimeDate = $attribute->date;


}
foreach($jsonFeatures as $crimeFeature) {
	$crimeCoordinates = $crimeFeature->geometry;
	if($crimeFeature->geometry->type === "esriGeometryPoint") {
		$coordinates = new \SplFixedArray(count($crimeCoordinates));
		foreach($crimeCoordinates as $coordinate) {
			$coordinates[$coordinates->key()] = $coordinate;
			$coordinates->next();
		}
		//FIXME: $trailGuide[$trails[$trailIndex]] = $coordinates;
		//FIXME: $trailIndex++; WTF ARE THESE???
	}
}
