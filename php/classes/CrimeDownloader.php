<?php
namespace Edu\Cnm\Abquery;

require_once("autoload.php");
require_once("/etc/apache2/capstone-mysql/encrypted-config.php");


/**
 * This class will download crime incedents data from the City of Albuquerque Database.
 *
 * @author Brett Gilbert bgilbert9@cnm.edu
 **/
class CrimeDownloader extends DataDownloader {

	/**
	 * crime: http://coagisweb.cabq.gov/arcgis/rest/services/public/APD_Incidents/MapServer/0/query?where=1%3D1&text=&objectIds=&time=&geometry=&geometryType=esriGeometryEnvelope&inSR=&spatialRel=esriSpatialRelIntersects&relationParam=&outFields=*&returnGeometry=true&maxAllowableOffset=&geometryPrecision=&outSR=4326&returnIdsOnly=false&returnCountOnly=false&orderByFields=&groupByFieldsForStatistics=&outStatistics=&returnZ=false&returnM=false&gdbVersion=&returnDistinctValues=false&f=pjson
	 *
	 * assigns data from object->features->attributes
	 */

	//FIXME: give these a moethod

foreach($attributes as $attribute) {
$crimeId = $attribute->OBJECTID;
$crimeLocation = $attribute->CV_BLOCK_ADD;
$crimeDescription = $attribute->CVINC_TYPE;
$crimeDate = \DateTime::createFromFormat("U", ($attribute->date / 1000));
}

/**
 * assigns data from object->features->geometry
 */
foreach($jsonFeatures as $crimeFeature) {
	$crimeGeometry = new Point($crimeFeature->geometry->x, $crimeFeature->geometry->y);
}

}

//TODO: pull new etag (getMetaData) and compare with the one saved in ini and compare. if different, download new data (readDataJson).

