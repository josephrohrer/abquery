<?php
namespace Edu\Cnm\Abquery;

require_once("autoload.php");
require_once("/etc/apache2/capstone-mysql/encrypted-config.php");


/**
 * This class will download crime incidents data from the City of Albuquerque Database.
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
	public static function compareCrimeAndDownload() {

		$crimeUrl = "http://coagisweb.cabq.gov/arcgis/rest/services/public/APD_Incidents/MapServer/0/query?where=1%3D1&text=&objectIds=&time=&geometry=&geometryType=esriGeometryEnvelope&inSR=&spatialRel=esriSpatialRelIntersects&relationParam=&outFields=*&returnGeometry=true&maxAllowableOffset=&geometryPrecision=&outSR=4326&returnIdsOnly=false&returnCountOnly=false&orderByFields=&groupByFieldsForStatistics=&outStatistics=&returnZ=false&returnM=false&gdbVersion=&returnDistinctValues=false&f=pjson";

		/**
		 * run getMetaData and catch exception if the data hasnt changed
		 */
		$features = null;
		try {
			DataDownloader::getMetaData($crimeUrl, "crime");
			$features = DataDownloader::readDataJson($crimeUrl);
			$crimeETag = DataDownloader::getMetaData($crimeUrl, "crime");
			$config = readConfig("/etc/apache2/capstone-mysql/abquery.ini");
			$eTags = json_decode($config["etags"]);
			$eTags->crime = $crimeETag;
			$config["etags"] = json_encode($eTags);
			writeConfig($config, "/etc/apache2/capstone-mysql/abquery.ini");
		} catch(\OutOfBoundsException $outOfBoundsException) {
			echo("no new crime data found");
		}
		return($features);
	}

	/**
	 * assigns data from object->features->attributes
	 */
	public static function getCrimeData(\SplFixedArray $features) {
		foreach($features as $feature) {
			$crimeId = $feature->attributes->OBJECTID;
			$crimeLocation = $feature->attributes->CV_BLOCK_ADD;
			$crimeDescription = $feature->attributes->CVINC_TYPE;
			$crimeDate = \DateTime::createFromFormat("U", ($feature->attributes->date / 1000));
			$crimeGeometry = new Point($feature->geometry->x, $feature->geometry->y);
		}
	}
}
try {
	$features = CrimeDownloader::compareCrimeAndDownload();
	CrimeDownloader::getCrimeData($features);
} catch(\Exception $exception) {
	echo $exception->getMessage() . PHP_EOL;
}