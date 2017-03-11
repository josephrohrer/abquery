<?php

require_once dirname(__DIR__,3)."/php/classes/autoload.php";
require_once dirname(__DIR__,3)."/php/lib/xsrf.php";
require_once "/etc/apache2/capstone-mysql/encrypted-config.php";

use Edu\Cnm\Abquery\{
	Park, Point
};

/**
 * api for Park class
 *
 * @author Benjamin Smith <bsmtih@cnm.edu>
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
	//grab the mySQL database connection
	$pdo = connectToEncryptedMySQL("/etc/apache2/capstone-mysql/abquery.ini");

	//determines which HTTP method needs to be processed and stores the result in $method.
	$method = array_key_exists("HTTP_x_HTTP_METHOD", $_SERVER) ? $_SERVER["HTTP_X_HTTP_METHOD"] : $_SERVER["REQUEST_METHOD"];

	//sanitize input
	$parkId = filter_input(INPUT_GET, "parkId", FILTER_VALIDATE_INT);
	$parkName = filter_input(INPUT_GET, "parkName", FILTER_SANITIZE_STRING);
	$userLocationX = filter_input(INPUT_GET, "userLocationX", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	$userLocationY = filter_input(INPUT_GET, "userLocationY", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	$userDistance = filter_input(INPUT_GET, "userDistance", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

	// handle GET request - if id is present, that park is returned, otherwise all parks are returned
	if($method === "GET") {
		//set XSRF cookie
		setXsrfCookie();

		//get all parks and update reply
		if(empty($parkId) === false) {
			$park = Park::getParkByParkId($pdo, $parkId);
			if($park !== null) {
				$reply->data = $park;
			}
		} elseif(empty($userLocationX) === false && empty($userLocationY) === false && empty($userDistance) === false) {
			$parks = Park::getParkByParkGeometry($pdo, new Point($userLocationX, $userLocationY), $userDistance)->toArray();
			if($parks !== null) {
				$reply->data = $parks;
			}
		} else {
			$park = Park::getAllParks($pdo)->toArray();
			if($park !== null) {
				$reply->data = $park;
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
