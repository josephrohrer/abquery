<?php

require_once "../classes/autoload.php";
require_once "../lib/xsrf.php";
require_once "/etc/apache2/capstone-mysql/encrypted-config.php";

use Edu\Cnm\Abquery\Crime;

/**
 * * api for Crime class
 *
 * @author jminnich@cnm.edu & Abquery
 **/

//verify the session, start if not active
if(session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}

//prepare an empty reply
$reply = new stdClass();
$reply->status = 200;
$reply->data = null;

try {
	//grab the mySQL connection
	$pdo = connectToEncryptedMySQL("/etc/apache2/capstone-mysql/abquery.ini");

	//determine which HTTP method was used
	$method = array_key_exists("HTTP_X_HTTP_METHOD", $_SERVER) ? $_SERVER["HTTP_X_HTTP_METHOD"] : $_SERVER["REQUEST_METHOD"];

	//stores the Primary Key ($crimeId) for the GET, DELETE, and PUT methods in $id. This key will come in the URL sent by the front end. If no key is present, $id will remain empty. Note that the input is filtered.
	$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

//FIXME: do we need this ?
	//Here we check and make sure that we have the Primary Key ($crimeId) for the DELETE and PUT requests. If the request is a PUT or DELETE and no key is present in $id, An Exception is thrown.id is valid for methods that require it
	if(($method === "DELETE" || $method === "PUT") && (empty($id) === true || $id < 0)) {
		throw(new InvalidArgumentException("id cannot be empty or negative", 405));
	}

	// handle GET request - if id is present, that crime is returned, otherwise all crimes are returned
	if($method === "GET") {
		//set XSRF cookie
		setXsrfCookie();

		//get a specific tweet or all tweets and update reply
		if(empty($id) === false) {
			$crime = Crime::getCrimeByCrimeId($pdo, $id);
			if($crime !== null) {
				$reply->data = $crime;
			}
		} else if(empty($crimeLocation) === false) {
			$crimes = Crime::getCrimeByCrimeLocation($pdo, $crimeLocation);
			if($crimes !== null) {
				$reply->data = $crimes;
			}
		} else if(empty($CrimeGeometry) === false) {
			$crimes = Crime::getCrimeByCrimeGeometry($pdo, $crimeGeometry);
			if($crimes !== null) {
				$reply->data = $crimes;
			}
		} else {
			$crimes = Crime::getAllCrimes($pdo);
			if($crimes !== null) {
				$reply->data = $crimes;
			}
		}