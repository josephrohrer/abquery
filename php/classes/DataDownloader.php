<?php
namespace Edu\Cnm\Abquery;

require_once("autoload.php");


/**
 * This class will download data from the City of Albuquerque City Data Database.
 *
 * @author Joseph Rohrer jrohrer@cnm.edu
 * @author Brett Gilbert bgilbert9@cnm.edu
 *
 **/
class DataDownloader {

	/**
	 * crime: http://coagisweb.cabq.gov/arcgis/rest/services/public/APD_Incidents/MapServer/0/query?where=1%3D1&text=&objectIds=&time=&geometry=&geometryType=esriGeometryEnvelope&inSR=&spatialRel=esriSpatialRelIntersects&relationParam=&outFields=*&returnGeometry=true&maxAllowableOffset=&geometryPrecision=&outSR=4326&returnIdsOnly=false&returnCountOnly=false&orderByFields=&groupByFieldsForStatistics=&outStatistics=&returnZ=false&returnM=false&gdbVersion=&returnDistinctValues=false&f=pjson
	 * parks: http://coagisweb.cabq.gov/arcgis/rest/services/public/recreation/MapServer/0/query?where=1%3D1&text=&objectIds=&time=&geometry=&geometryType=esriGeometryEnvelope&inSR=&spatialRel=esriSpatialRelIntersects&relationParam=&outFields=*&returnGeometry=true&maxAllowableOffset=&geometryPrecision=&outSR=4326&returnIdsOnly=false&returnCountOnly=false&orderByFields=&groupByFieldsForStatistics=&outStatistics=&returnZ=false&returnM=false&gdbVersion=&f=pjson
	 **/

	/**
	 * Gets the etag from a file url
	 *
	 * @param string $url to grab from
	 * @param string $whichETag which etag (park or crime) we are updating
	 * @return string $eTag to be compared to previous etag to determine last download
	 * @throws \RuntimeException if stream cant be opened.
	 **/

	public static function getMetaData(string $url, string $whichETag) {
		if($whichETag !== "crime" && $whichETag !== "park") {
			throw(new \RuntimeException("not a valid etag", 400));
		}
		$options = [];
		$options["http"] = [];
		$options["http"]["method"] = "HEAD";
		$context = stream_context_create($options);
		$fd = fopen($url, "rb", false, $context);
		$metaData = stream_get_meta_data($fd);
		if($fd === false) {
			throw(new \RuntimeException("unable to open HTTP stream"));
		}
		fclose($fd);
		$header = $metaData["wrapper_data"];
		$eTag = null;
		foreach($header as $value) {
			$explodeETag = explode(": ", $value);
			$findETag = array_search("ETag", $explodeETag);
			if($findETag !== false) {
				$eTag = $explodeETag[1];
			}
		}
		if($eTag === null) {
			throw(new \RuntimeException("etag cannot be found", 404));
		}


		$config = readConfig("/etc/apache2/capstone-mysql/abquery.ini");
		$eTags = json_decode($config["etags"]);
		$previousETag = $eTags->$whichETag;
		if($previousETag < $eTag) {
			return ($eTag);
		} else {
			return($previousETag);
		}
	}

	//TODO: save etag in ini to be used by individual dlers


	/**
	 *
	 * Decodes Json file, converts to string, sifts through the string and inserts the data into the database
	 *
	 * @param string $url
	 * @throws \PDOException PDO related errors
	 * @throws \Exception catch-all exception
	 * @return \SplFixedArray $allData
	 **/

	public static function readDataJson($url) {

		// http://php.net/manual/en/function.stream-context-create.php creates a stream for file input
		$context = stream_context_create(["http" => ["ignore_errors" => true, "method" => "GET"]]);
		try {
			// http://php.net/manual/en/function.file-get-contents.php file-get-contents returns file in string context
			if(($jsonData = file_get_contents($url, null, $context)) === false) {
				throw(new \RuntimeException("cannot connect to city server"));
			}

			//decode the Json file
			$jsonConverted = json_decode($jsonData, true);

			//format
			$jsonFeatures = $jsonConverted->features;

			// create array from converted Json file
			$attributes = new \SplFixedArray(count($jsonFeatures));

	} catch(\Exception $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($attributes);
	}
}

$meta = DataDownloader::getMetaData("http://coagisweb.cabq.gov/arcgis/rest/services/public/APD_Incidents/MapServer/0/query?where=1%3D1&text=&objectIds=&time=&geometry=&geometryType=esriGeometryEnvelope&inSR=&spatialRel=esriSpatialRelIntersects&relationParam=&outFields=*&returnGeometry=true&maxAllowableOffset=&geometryPrecision=&outSR=4326&returnIdsOnly=false&returnCountOnly=false&orderByFields=&groupByFieldsForStatistics=&outStatistics=&returnZ=false&returnM=false&gdbVersion=&returnDistinctValues=false&f=pjson");
//("http://coagisweb.cabq.gov/arcgis/rest/services/public/recreation/MapServer/0/query?where=1%3D1&text=&objectIds=&time=&geometry=&geometryType=esriGeometryEnvelope&inSR=&spatialRel=esriSpatialRelIntersects&relationParam=&outFields=*&returnGeometry=true&maxAllowableOffset=&geometryPrecision=&outSR=4326&returnIdsOnly=false&returnCountOnly=false&orderByFields=&groupByFieldsForStatistics=&outStatistics=&returnZ=false&returnM=false&gdbVersion=&f=pjson");

