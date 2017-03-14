<?php

require_once dirname(__DIR__,3)."/php/classes/autoload.php";
require_once dirname(__DIR__,3)."/php/lib/xsrf.php";
require_once "/etc/apache2/capstone-mysql/encrypted-config.php";

use Edu\Cnm\Abquery\Amenity;

/**
 * * api for Amenity class
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

	//stores the Primary Key ($amenityId) for the GET, DELETE, and PUT methods in $id. This key will come in the URL sent by the front end. If no key is present, $id will remain empty. Note that the input is filtered.
	$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
	$amenityName = filter_input(INPUT_GET, "amenityName", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

// handle GET request - if id is present, that amenity is returned, otherwise all amenities are returned
	if($method === "GET") {
		//set XSRF cookie
		setXsrfCookie("/");

		//get a specific amenity or all amenities and update reply
		if(empty($id) === false) {
			$amenity = Amenity::getAmenityByAmenityId($pdo, $id);
			if($amenity !== null) {
				$reply->data = $amenity;
			}
		} else if(empty($amenityName) === false) {
			$amenity = Amenity::getAmenityByAmenityName($pdo, $amenityName)->toArray();
			if($amenity !== null) {
				$reply->data = $amenity;
			}
		} else {
			$amenity = Amenity::getAllAmenities($pdo)->toArray();
			if($amenity !== null) {
				$reply->data = $amenity;
			}
		}

	} else {
		throw (new InvalidArgumentException("Invalid HTTP Method Request"));
		// If the method request is not GET, PUT, POST, or DELETE, an exception is thrown
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