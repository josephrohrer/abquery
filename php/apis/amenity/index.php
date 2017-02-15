<?php

require_once "../classes/autoloader.php";
require_once "../lib/xsrf.php";
require_once "/etc/apache2/capstone-mysql/encrypted-config.php";

use Edu\Cnm\Abquery;

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

	//sanitize input
	$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
	$profileId = filter_input(INPUT_GET, "profileId", FILTER_VALIDATE_INT);
	$content = filter_input(INPUT_GET, "content", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

	//make sure the id is valid for methods that require it
	if(($method === "DELETE" || $method === "PUT") && (empty($id) === true || $id < 0)) {
		throw(new InvalidArgumentException("id cannot be empty or negative", 405));
	}

// Here, we determine if the request received is a GET request
	if($method === "GET") {
		//set XSRF cookie
		setXsrfCookie("/");
		// handle GET request - if id is present, that amenity is present, that amenity is returned, otherwise all amenities are returned


		// Here, we determine if a Key was sent in the URL by checking $id. If so, we pull the requested Amenity by Amenity ID from the DataBase and store it in $amenity.
		if(empty($id) === false) {
			$amenity = Amenity::getaAmenitybyAmenityId($pdo, $id);
			if($amenity !== null) {
				$reply->data = $amenity;
				// Here, we store the retrieved Amenity in the $reply->data state variable.
			}
		}

	} else {
		$amenities = Amenity::getAllAmenities($pdo);
		if($amenities !== null) {
			$reply->data = $amenities;
		}
	}
	// If there is nothing in $id, and it is a GET request, then we simply return all amenities. We store all the amenities in the $amenities variable, and then store them in the $reply->data state variable.
}
