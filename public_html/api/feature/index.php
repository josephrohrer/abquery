<?php

require_once dirname(__DIR__,3)."/php/classes/autoload.php";
require_once dirname(__DIR__,3)."/php/lib/xsrf.php";
require_once "/etc/apache2/capstone-mysql/encrypted-config.php";

use Edu\Cnm\Abquery\Feature;

/**
 * api for Feature class
 *
 * @author Abquery
 */

// Check the session status. If inactive then start the session.
if(session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}

//prepare an empty reply
$reply = new stdClass();
$reply->status = 200;
$reply->data = null;
//Here we create a new stdClass named $reply. A stdClass is basically an empty bucket that we can use to store things in.
// We will use this object named $reply to store the results of the call to our API. The status 200 line adds a state variable to $reply called status and initializes it with the integer 200 (success code). The proceeding line adds a state variable to $reply called data. This is where the result of the API call will be stored. We will also update $reply->message as we proceed through the API.

try {
	//grab the mySQL connection
	$pdo = connectToEncryptedMySQL("/etc/apache2/capstone-mysql/abquery.ini");

	//determines which HTTP method needs to be processed and stores the result in $method.
	$method = array_key_exists("HTTP_x_HTTP_METHOD", $_SERVER) ? $_SERVER["HTTP_X_HTTP_METHOD"] : $_SERVER["REQUEST_METHOD"];

	//sanitize input
	$featureParkId = filter_input(INPUT_GET, "featureParkId", FILTER_VALIDATE_INT);
	$featureAmenityId = filter_input(INPUT_GET, "featureAmenityId", FILTER_VALIDATE_INT);

	// handle GET request - if id is present, that feature is returned, otherwise all features are returned
	if($method === "GET") {
		//set XSRF cookie
		setXsrfCookie();

		//get a specific park id, amenity id, and all features and update reply
		if(empty($featureParkId) === false) {
			$feature = Feature::getFeatureByFeatureParkId($pdo, $featureParkId);
			if($feature !== null) {
				$reply->data = $feature;
			}
		} else if(empty($featureAmenityId) === false) {
			$feature = Feature::getFeatureByFeatureAmenityId($pdo, $featureAmenityId);
			if($feature !== null) {
				$reply->data = $feature;
			}
		} else {
		$feature = Feature::getAllFeatures($pdo);
		if($feature !== null) {
			$reply->data = $feature;
			}
	}

	} else {
		throw (new InvalidArgumentException("Invalid HTTP method request"));
	}

	// update reply with exception information
} catch(Exception $exception) {
	$reply->status = $exception->getCode();
	$reply->message = $exception->getMessage();
} catch(TypeError $typeError) {
	$reply->status = $typeError->getCode();
	$reply->message = $typeError->getMessage();
}

header("Content-type: application/json");
if($reply->data === null) {
	unset($reply->data);
}

// encode and return reply to front end caller
echo json_encode($reply);
