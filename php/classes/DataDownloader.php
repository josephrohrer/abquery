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

}