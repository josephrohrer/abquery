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
	 */

	/**
	 * compare $eTag with $previousEtag if not the same, download data
	 */
	public static function compareAndDownload() {
		$crimeUrl = "http://coagisweb.cabq.gov/arcgis/rest/services/public/APD_Incidents/MapServer/0/query?where=1%3D1&text=&objectIds=&time=&geometry=&geometryType=esriGeometryEnvelope&inSR=&spatialRel=esriSpatialRelIntersects&relationParam=&outFields=*&returnGeometry=true&maxAllowableOffset=&geometryPrecision=&outSR=4326&returnIdsOnly=false&returnCountOnly=false&orderByFields=&groupByFieldsForStatistics=&outStatistics=&returnZ=false&returnM=false&gdbVersion=&returnDistinctValues=false&f=pjson";
		$crimeETag = DataDownloader::getMetaData($crimeUrl, "crime");
		if($previousETag < $crimeETag) { //FIXME: try block this shit
			$features = self::readDataJson($crimeUrl);
			$config = writeConfig("/etc/apache2/capstone-mysql/abquery.ini");
			$previousETag = json_decode($config["etags"]);
			return($previousETag);
		}
		return($features);
	}

	/**
	 * assigns data from object->features->attributes
	 */
	public static function getCrimeData() {
		foreach($features as $feature) {
			$crimeId = $feature->OBJECTID;
			$crimeLocation = $feature->CV_BLOCK_ADD;
			$crimeDescription = $feature->CVINC_TYPE;
			$crimeDate = \DateTime::createFromFormat("U", ($feature->date / 1000));
			$crimeGeometry = new Point($feature->geometry->x, $feature->geometry->y);
		}
	}
}


$crimeUrl = "http://coagisweb.cabq.gov/arcgis/rest/services/public/APD_Incidents/MapServer/0/query?where=1%3D1&text=&objectIds=&time=&geometry=&geometryType=esriGeometryEnvelope&inSR=&spatialRel=esriSpatialRelIntersects&relationParam=&outFields=*&returnGeometry=true&maxAllowableOffset=&geometryPrecision=&outSR=4326&returnIdsOnly=false&returnCountOnly=false&orderByFields=&groupByFieldsForStatistics=&outStatistics=&returnZ=false&returnM=false&gdbVersion=&returnDistinctValues=false&f=pjson";

//TODO: pull new etag (getMetaData) and compare with the one saved in ini and compare. if different, download new data (readDataJson).