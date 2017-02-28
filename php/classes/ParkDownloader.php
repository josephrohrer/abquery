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
class ParkDownloader extends DataDownloader {


	public static function compareParkAndDownload() {

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

	public static function getParkData(\SplFixedArray $features) {
		foreach($features as $feature) {
			$parkId = $feature->attributes->OBJECTID;
			$parkName = $feature->attributes->PARKNAME;
		}
		foreach($features as $coordinateFeature) {
			$jsonCoordinates = $coordinateFeature->geometry->rings;
			$coordinates = new \SplFixedArray(count($jsonCoordinates));
			foreach($jsonCoordinates as $coordinate) {
				$coordinates[$coordinates->key()] = $coordinate;
				$coordinates->next();
				$parkCoordinate = new \SplFixedArray(count($coordinates));
				foreach($coordinates as $singleCoordinate) {
					$parkCoordinate = new \SplFixedArray(Point::euclideanMean($singleCoordinate));
				}
				return($parkCoordinate); //FIXME: what to return where?
			}
		}
		foreach($features as $booleanFeature) { //FIXME: where do we translate 1 = yes 0 = no
			$parkBoolean = $booleanFeature->attributes->DEVELOPEDACRES;
			$booleans = new \SplFixedArray(count($parkBoolean));
			if($parkBoolean > 0) {
				$booleans[$booleans->key()] = "Developed";
			}
			$booleans[$booleans->key()] = "Undeveloped";
			$booleans->next();
			return ($booleans);
		}
		return($features); //FIXME: what to return where?
	}

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

	public static function amenityAssign() {
		$pdo = connectToEncryptedMySQL("/etc/apache2/capstone-mysql/abquery.ini");
		$allFlatAmenities = Amenity::getAllAmenities($pdo);
		$allAmenities = [];
		foreach($allFlatAmenities as $amenity) {
			$allAmenities[$amenity->getAmentityCityName()] = $amenity;
		}

		foreach($allAmenities as $amenity) {
			if(empty($attribute->${$amenity->getCityName()}) === false) {
				$feature = new Feature(...);
				$feature->insert($pdo);
			}
			//FIXME: else here
		}
	}
}


