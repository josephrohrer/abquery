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
		// If there is nothing in $id, and it is a GET request, then we simply return all amenities. We store all the amenities in the $amenities variable, and then store them in the $reply->data state variable.

	}
else
	if($method === "PUT") || $method === "POST") {
// this line determines if the request is a PUT or a POST request


	verifyXsrf();
	$requestContent = file_get_contents("php://input");
	// Retrieves the JSON package that the front end sent, and stores it in $requestContent. Here we are using file_get_contents("php://input") to get the request from the front end. file_get_contents() is a PHP function that reads a file into a string. The argument for the function, here, is "php://input". This is a read only stream that allows raw data to be read from the front end request which is, in this case, a JSON package.


	$requestObject = json_decode($requestContent);
	// This line then decodes the JSON package and stores that result in $requestObject.


	//Here we check to make sure that there is content for the Amenity. If $requestObject->AmenityContent is empty, an exception is thrown. The PUT method will use the new content to UPDATE an existing Amenity and the POST method will use the content to create a new Tweet.
	//if(empty($requestObject->amenityContent) === true) {
		//throw(new \InvalidArgumentException ("No amenity content", 405));
	//}

	// determines if the request is a PUT.
	// If the request is a PUT, we proceed to the next section and retrieve the Amenity that needs to be updated. The Amenity is retrieved by Amenity ID using the ID that was sent in the url and stored in $id.
	//if($method === "PUT") {
		//retrieve the tweet to update
		//$amenity = Amenity::getAmenityByAmenityId($pdo, $id);
		//if($amenity === null) {
			//throw(new RuntimeException("Amenity does not exist", 404));
		//}

		//$amenity->setamenityContent($requestObject->tweetContent);
		// stores the updated content in the retrieved Tweet object.

		//calls the Tweet objects UPDATE function and updates the DataBase
		//$tweet->update($pdo);

		// stores the "Tweet updated OK" message in the $reply->message state variable.
		//$reply->message = "Tweet updated OK";




		// If it is not a PUT request, we move to Line 87 to determine if it is a POST request.


	} else if($method === "POST")
		// If it is a POST request we continue to the proceeding lines and make sure that a Profile ID was sent with the request. A new Tweet cannot be created without the Profile ID. See the constructor in the Tweet class.
		//make sure profileId is available
		if(empty($requestObject->profileId) === true) {
			throw(new \InvalidArgumentException ("No Profile ID", 405));
		}


	// creates a new Tweet object and stores it in $tweet
	$tweet = new Tweet(null, $requestObject->profileId, $requestObject->tweetContent, null);
	// calls the INSERT method in $tweet which inserts the object into the DataBase.
	$tweet->insert($pdo);;

	// stores the "Tweet created OK" message in the $reply->message state variable.
	$reply->message = "Tweet created OK";
}
