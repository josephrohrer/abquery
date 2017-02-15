<?php


require_once(dirname(__DIR__)) . "/php/classes/test/autoload.php");


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
	 * crime: http://data.cabq.gov/publicsafety/policeincidents/policeincidentsJSON_ALL
	 * parks: http://data.cabq.gov/community/parksandrec/parks/ParksJSON_ALL
	 *
	 **/

	/**
	 * Gets the metadata from a file url
	 *
	 * @param string %url to grab from
	 * @param int $redirect whether to redirect or not
	 * @return mixed stream data
	 * @throws Exception if file doesn't exist.
	 **/

	public static function getMetaData($url, $redirect = 1) {
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
		$context = stream_context_create(array("http" => array("ignore_errors" => true, "method" => "GET")));
		try {
			// http://php.net/manual/en/function.file-get-contents.php file-get-contents returns file in string context
			if(($jsonData = file_get_contents($url, null, $context)) === false) {
				throw(new \RuntimeException("cannot connect to city server"));
			}

			//decode the Json file
			$jsonConverted = json_decode($jsonData);

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

DataDownloader::readDataJson("http://data.cabq.gov/publicsafety/policeincidents/policeincidentsJSON_ALL");
DataDownloader::readDataJson("http://data.cabq.gov/community/parksandrec/parks/ParksJSON_ALL"); // FIXME: change URLS