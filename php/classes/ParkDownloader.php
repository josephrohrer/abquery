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
		$pdo = connectToEncryptedMySQL("/etc/apache2/capstone-mysql/abquery.ini");
		$allFlatAmenities = Amenity::getAllAmenities($pdo);
		$allAmenities = [];
		foreach($allFlatAmenities as $amenity) {
			$allAmenities[$amenity->getAmentityCityName()] = $amenity;
		}

		foreach($features as $feature) {
			$parkId = $feature->attributes->OBJECTID;
			$parkName = $feature->attributes->PARKNAME;
			$jsonCoordinates = $feature->geometry->rings;
			$coordinates = new \SplFixedArray(count($jsonCoordinates));
			foreach($jsonCoordinates as $jsonCoordinate) {
				$coordinate = new Point($jsonCoordinate[0], $jsonCoordinate[1]);
				$coordinates[$coordinates->key()] = $coordinate;
				$coordinates->next();
			}

			$parkGeometry = Point::euclideanMean($coordinates);

			$parkDeveloped = ($feature->attributes->DEVELOPEDACRES > 0);
			$park = new Park($parkId, $parkName, $parkGeometry, $parkDeveloped);
			$park->insert($pdo);

			foreach($allAmenities as $amenity) {
				if(empty($feature->attributes->${$amenity->getCityName()}) === false) {
					$feature = new Feature($amenity->getAmenityId(), $parkId, $feature->attributes->${$amenity->getCityName()});
					$feature->insert($pdo);
				}
			}
		}
	}
}
