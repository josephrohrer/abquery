<?php
//FIXME: NAMESPACE

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
	 *
	 * crime: http://coagisweb.cabq.gov/arcgis/rest/services/public/APD_Incidents/MapServer/0/query?where=1%3D1&text=&objectIds=&time=&geometry=&geometryType=esriGeometryEnvelope&inSR=&spatialRel=esriSpatialRelIntersects&relationParam=&outFields=*&returnGeometry=true&maxAllowableOffset=&geometryPrecision=&outSR=4326&returnIdsOnly=false&returnCountOnly=false&orderByFields=&groupByFieldsForStatistics=&outStatistics=&returnZ=false&returnM=false&gdbVersion=&returnDistinctValues=false&f=pjson
	 * parks: http://coagisweb.cabq.gov/arcgis/rest/services/public/recreation/MapServer/0/query?where=1%3D1&text=&objectIds=&time=&geometry=&geometryType=esriGeometryEnvelope&inSR=&spatialRel=esriSpatialRelIntersects&relationParam=&outFields=*&returnGeometry=true&maxAllowableOffset=&geometryPrecision=&outSR=4326&returnIdsOnly=false&returnCountOnly=false&orderByFields=&groupByFieldsForStatistics=&outStatistics=&returnZ=false&returnM=false&gdbVersion=&f=pjson
	 *
	 **/

	/**
	 * Gets the metadata from a file url
	 *
	 * @param string %url to grab from
	 * @return mixed stream data
	 * @throws Exception if file doesn't exist.
	 **/

	public static function getMetaData($url) {
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
		foreach($metaData["wrapper_data"] as $header){
			$explodeHeader = explode(": ", $header);
			//FIXME: IF ETAG
		}
		return($eTag);
	}


	/**
	 *
	 * Decodes Json file, converts to string, sifts through the string and inserts the data into the database
	 *
	 * @param string $url
	 * @throws PDOException PDO related errors
	 * @throws Exception catch-all exception
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
			$properties = new \SplFixedArray(count($jsonFeatures));

	} catch(\Exception $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($properties);
	}
}

// DataDownloader::readDataJson("http://coagisweb.cabq.gov/arcgis/rest/services/public/APD_Incidents/MapServer/0/query?where=1%3D1&text=&objectIds=&time=&geometry=&geometryType=esriGeometryEnvelope&inSR=&spatialRel=esriSpatialRelIntersects&relationParam=&outFields=*&returnGeometry=true&maxAllowableOffset=&geometryPrecision=&outSR=4326&returnIdsOnly=false&returnCountOnly=false&orderByFields=&groupByFieldsForStatistics=&outStatistics=&returnZ=false&returnM=false&gdbVersion=&returnDistinctValues=false&f=pjson");
$meta = DataDownloader::getMetaData("http://coagisweb.cabq.gov/arcgis/rest/services/public/recreation/MapServer/0/query?where=1%3D1&text=&objectIds=&time=&geometry=&geometryType=esriGeometryEnvelope&inSR=&spatialRel=esriSpatialRelIntersects&relationParam=&outFields=*&returnGeometry=true&maxAllowableOffset=&geometryPrecision=&outSR=4326&returnIdsOnly=false&returnCountOnly=false&orderByFields=&groupByFieldsForStatistics=&outStatistics=&returnZ=false&returnM=false&gdbVersion=&f=pjson");
var_dump($meta);