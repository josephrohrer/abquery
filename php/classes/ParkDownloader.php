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
class ParkDownloader extends \DataDownloader {


	public static function compareAndContrast() {

		$parkURL = "http://coagisweb.cabq.gov/arcgis/rest/services/public/recreation/MapServer/0/query?where=1%3D1&text=&objectIds=&time=&geometry=&geometryType=esriGeometryEnvelope&inSR=&spatialRel=esriSpatialRelIntersects&relationParam=&outFields=*&returnGeometry=true&maxAllowableOffset=&geometryPrecision=&outSR=4326&returnIdsOnly=false&returnCountOnly=false&orderByFields=&groupByFieldsForStatistics=&outStatistics=&returnZ=false&returnM=false&gdbVersion=&f=pjson";

		$features = null;
		try {
			DataDownloader::getMetaData($parkURL, "park");
			$features = DataDownloader::readDataJson($parkURL);
			$parkETag = DataDownloader::getMetaData($parkURL, "park");
			$config = readConfig("/etc/apache2/capstone-mysql/abquery.ini");
			$eTags = json_decode($config["etags"]);
			$eTags->park = $parkETag;
			$config["etags"] = json_encode($eTags);
			writeConfig($config, "/etc/apache2/capstone-mysql/abquery.ini");
		} catch(\OutOfBoundsException $outOfBoundsException) {
			echo("Park Data not updated");
		}
		return ($features);
	}


	/**
	 * foreach that pulls name and parkId from the JSON
	 */
	public static function getParkData(\SplFixedArray $features) {
		foreach($features as $feature) {
			$parkId = $feature->attributes->OBJECTID;
			$parkName = $feature->attributes->PARKNAME;
		}

		/**
		 * foreach loop that will make an array of points from the JSON and send it to the euclideanMean function in the Point class
		 */

		foreach($jsonFeatures as $parkFeature) {
			$park = $parkFeature->geometry;
			$coordinates = new \SplFixedArray(count($parkCoordinates));
			foreach($parkCoordinates as $coordinate) {
				$coordinates[$coordinates->key()] = $coordinate;
				$coordinates->next();

				// FIXME: Put into euclideanMean function

				// (parkGeometryX, parkGeometryY)
			}
		}

		/**
		 * foreach to pull in developed acres and put it into parkDeveloped boolean to return if YES or NO for developed
		 *
		 **/

		//public static function parkBoolean {
		foreach($parkDevelopedAcres as $parkDevelopedAcre) {
			$parkDevelopedAcre = $feature->attributes->DEVELOPEDACRES;
			if($parkDevelopedAcres > 0) {
				$"Yes"
					}
		}


		//FIXME: if then block 1 0
		foreach($attributes as $attribute) {
			$ = $attribute->DEVELOPEDACRES;
		}

		//$parkDeveloped

		/**
		 * foreach to take rest of park JSON and put into a features array
		 *
		 * // part 0:
		 * // preload associative array to map "LITSOFTBALLFIELDS" to an actual primary key
		 * // so $allAmentities["LITSOFTBALLFIELDS"] returns the amentity object
		 * $allFlatAmentities = Amentity::getAllAmentities();
		 * $allAmentities = [];
		 * foreach($allFlatAmentities as $dylanHatesSpellingAmentities) {
		 *   $allAmentities[$dylanHatesSpellingAmentities->getAmentityCityName()] = $dylanHatesSpellingAmentities;
		 * }
		 **/


		$allFlatAmenities = Amenity::getAllAmenities($pdo); //FIXME: PDO JUNK, dont Smtih the A
		$allAmenities = [];
		foreach($allFlatAmenities as $amenity) {
			$allAmenities[$amenity->getAmentityCityName()] = $amenity;
		}

		foreach($allAmenities as $amenity) {
			if(empty($attribute->${$amenity->getCityName()}) === false) {
				$feature = new Feature(...);
				$feature->insert($pdo);
			}
		}
	}


	/**
	 *
	 * // Dylan's given function part 1: within existing loop
	 * foreach(...) {
	 *   foreach($allAmentities as $amenity) {
	 *      if(empty($attribute->${$amenity->getCityName()}) === false) {
	 *         $feature = new Feature(...);
	 *         $feature->insert($pdo);
	 *      }
	 *   }
	 * }
	 **/


}


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

/**"OBJECTID": 276728,
 * "PARKNAME": "AZTEC",
 * "PARKSTATUS": "D",
 * "JURISDICTION": "CITY",
 * "ACRES": 5.5388133799999997,
 * "DEVELOPEDACRES": 5.5, //FIXME: Boolean
 * "LITTENNISCOURTS": 0, //FIXME: Assign all this junk
 * "UNLITTENNISCOURTS": 6,
 * "PLAYAREAS": 2,
 * "FULLBASKETBALLCOURTS": 0,
 * "HALFBASKETBALLCOURTS": 0,
 * "SOCCERFIELDS": 1,
 * "LITSOFTBALLFIELDS": 0,
 * "UNLITSOFTBALLFIELDS": 0,
 * "YOUTHBALLFIELDS": 0,
 * "INDOORPOOLS": 0,
 * "OUTDOORPOOLS": 0,
 * "HORSESHOEPITS": 0,
 * "VOLLEYBALLCOURTS": 0,
 * "BACKSTOPS": 0,
 * "PICNICTABLES": 7,
 * "SHADESTRUCTURES": 1,
 * "PARKINGSPACES": 0,
 * "JOGGINGPATHS": 0,
 *
 * "geometry": { //FIXME: euclidean mean this junk
 * "rings": [
 * [
 * [
 * -11866750.687800001,
 * 4173246.3906000033
 * ],
 * [
 * -11866753.1613,
 * 4173248.9043999985
 * ],
 * [
 * -11866754.5711,
 * 4173253.1036000028
 * ],
 *
 *
 *
 *
 *
 * $parkId = "";
 * $parkName = "";
 * $parkGeometryX = "";
 * $parkGeometryY = "";
 * $parkDeveloped = "";
 *
 * $featureAmenityId = 1;
 * $featureParkId =
 * $featureValue =
 *
 * $amenityId = 1;
 * $amenityCityName = "";
 * $amenityName = "";
 *
 *
 *
 *
 **/

