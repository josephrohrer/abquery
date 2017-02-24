<?php

require_once dirname(__DIR__,3)."/php/classes/autoload.php";
require_once dirname(__DIR__,3)."/php/lib/xsrf.php";
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

	//stores the Primary Key ($crimeId) for the GET method in $id. This key will come in the URL sent by the front end. If no key is present, $id will remain empty. Note that the input is filtered.

	$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
	$crimeLocation = filter_input(INPUT_GET, "crimeLocation", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$crimeSunriseDate = filter_input(INPUT_GET, "crimeSunriseDate", FILTER_VALIDATE_INT);
	$crimeSunsetDate = filter_input(INPUT_GET, "crimeSunsetDate", FILTER_VALIDATE_INT);
	$crimeDescription = filter_input(INPUT_GET, "crimeDescription", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

	// handle GET request - if id is present, that crime is returned, otherwise all crimes are returned
	if($method === "GET") {
		//set XSRF cookie
		setXsrfCookie();

		//get a specific crime or all crimes and update reply
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
		} else if(empty($crimeDescription) === false) {
			$crimes = Crime::getCrimeByCrimeDescription($pdo, $crimeDescription);
			if($crimes !== null) {
				$reply->data = $crimes;
			}
		} else if(empty($crimeSunriseDate) === false && empty($crimeSunsetDate) === false) {
			$crimeSunriseDate = \DateTime::createFromFormat("U", ($crimeSunriseDate / 1000));
			$crimeSunsetDate = \DateTime::createFromFormat("U", ($crimeSunsetDate / 1000));
			$crimes = Crime::getCrimeByCrimeDate($pdo, $crimeSunriseDate, $crimeSunsetDate)->toArray();
			if($crimes !== null) {
				$reply->data = $crimes;
			}
		} else {
			$crimes = Crime::getAllCrimes($pdo);
			if($crimes !== null) {
				$reply->data = $crimes;
			}
		}

	} else {
		throw (new InvalidArgumentException("Invalid HTTP Method Request"));
		// If the method request is not GET an exception is thrown
	}

// update reply with exception information
} catch(Exception $exception) {
	$reply->status = $exception->getCode();
	$reply->message = $exception->getMessage();
	$reply->trace = $exception->getTraceAsString();
} catch(TypeError $typeError) {
	$reply->status = $typeError->getCode();
	$reply->message = $typeError->getMessage();
}
// In these lines, the Exceptions are caught and the $reply object is updated with the data from the caught exception. Note that $reply->status will be updated with the correct error code in the case of an Exception.

header("Content-type: application/json");
// sets up the response header.
if($reply->data === null) {
	unset($reply->data);
}

echo json_encode($reply);
// finally - JSON encodes the $reply object and sends it back to the front end.