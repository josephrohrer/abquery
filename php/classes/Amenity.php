<?php
namespace Edu\Cnm\Abquery;

require_once("autoload.php");

/**
 * Classes for the amenity entity
 *
 * These are the classes for the amenity entity including the accessor and mutator methods
 *
 * @author jminnich@cnm.edu
 */


class Amenity implements \JsonSerializable {
	/**
	 * id for each individual amenity as provided by the ABQ city data set: Parks, this is a primary key
	 * @var int $AmenityId
	 */
	private $amenityId;
	/**
	 * basic description of the amenity as provided by the ABQ city data set: Parks
	 * @var string &cityName
	 */
	private $amenityCityName;
	/**
	 * description of amenity as provided by ABQuery authors
	 * @var string &amenityName
	 */
	private $amenityName;

	/**
	 * constructor for this Amenity entity
	 *
	 * @param int $newAmenityId id of an amenity in ABQ city data set: Parks
	 * @param string $newAmenityCityName name of an amenity given in ABQ city data set: Parks
	 * @param string $newAmenityName name of an amenity in ABQ city data set: Parks given by ABQuery
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 **/

	public function __construct(int $newAmenityId = null, string $newAmenityCityName, string $newAmenityName) {
		try {
			$this->setAmenityId($newAmenityId);
			$this->setAmenityCityName($newAmenityCityName);
			$this->setAmenityName($newAmenityName);
		} catch(\InvalidArgumentException $invalidArgument) {
			// rethrow the exception to the caller
			throw(new \InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(\RangeException $range) {
			// rethrow the exception to the caller
			throw(new \RangeException($range->getMessage(), 0, $range));
		} catch(\TypeError $typeError) {
			// rethrow the exception to the caller
			throw(new \TypeError($typeError->getMessage(), 0, $typeError));
		} catch(\Exception $exception) {
			// rethrow the exception to the caller
			throw(new \Exception($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * accessor method for amenity id
	 *
	 * @return int|null value of amenity id
	 **/
	public function getAmenityId() {
		return ($this->amenityId);
	}

	/**
	 * mutator method for amenity id
	 *
	 * @param int|null $newAmenityId new value of amenity id
	 * @throws \RangeException if $newAmenityId is not positive
	 * @throws \TypeError if $newAmenityId is not an integer
	 **/
	public function setAmenityId(int $newAmenityId = null) {
		// base case: if the amenity id is null, this a new amenity without a mySQL assigned id
		if($newAmenityId === null) {
			$this->amenityId = null;
			return;
		}

		// verify the amenity id is positive
		if($newAmenityId <= 0) {
			throw(new \RangeException("amenity id is not positive"));
		}

		// convert and store the amenity id
		$this->amenityId = $newAmenityId;
	}

	/**
	 * accessor method for amenity city name
	 *
	 * @return string value of amenity city name
	 **/
	public function getAmenityCityName() {
		return ($this->amenityCityName);
	}

	/**
	 * mutator method for amenity city name
	 *
	 * @param string $newAmenityCityName new value of amenity city name
	 * @throws \InvalidArgumentException if $newAmenityCityName is insecure
	 * @throws \RangeException if $newAmenityCityName is > 32 characters
	 * @throws \TypeError if $newAmenityCityName is not a string
	 **/
	public function setAmenityCityName(string $newAmenityCityName) {
		// verify the name content is secure
		$newAmenityCityName = trim($newAmenityCityName);
		$newAmenityCityName = filter_var($newAmenityCityName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newAmenityCityName) === true) {
			throw(new \InvalidArgumentException("name is empty or insecure"));
		}

		// verify the amenity city name content will fit in the database
		if(strlen($newAmenityCityName) > 32) {
			throw(new \RangeException("name content too large"));
		}

		// store the amenity city name content
		$this->amenityCityName = $newAmenityCityName;
	}

	/**
	 * accessor method for amenity name
	 *
	 * @return string value of amenity name
	 **/
	public function getAmenityName() {
		return ($this->amenityName);
	}

	/**
	 * mutator method for amenity name
	 *
	 * @param string $newAmenityName new value of amenity name
	 * @throws \InvalidArgumentException if $newAmenityName is insecure
	 * @throws \RangeException if $newAmenityName is > 32 characters
	 * @throws \TypeError if $newAmenityCityName is not a string
	 **/
	public function setAmenityName(string $newAmenityName) {
		// verify the name content is secure
		$newAmenityName = trim($newAmenityName);
		$newAmenityName = filter_var($newAmenityName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newAmenityName) === true) {
			throw(new \InvalidArgumentException("name is empty or insecure"));
		}

		// verify the amenity name content will fit in the database
		if(strlen($newAmenityName) > 32) {
			throw(new \RangeException("name content too large"));
		}

		// store the amenity city name content
		$this->amenityName = $newAmenityName;
	}

	/**
	 * inserts this Amenity into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function insert(\PDO $pdo) {
		// enforce the amenityId is null (i.e., don't insert an amenity that already exists)
		if($this->amenityId !== null) {
			throw(new \PDOException("not a new amenity"));
		}

		// create query template
		$query = "INSERT INTO amenity(amenityCityName, amenityName) VALUES(:amenityCityName, :amenityName)";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holders in the template
		$parameters = ["amenityCityName" => $this->amenityCityName, "amenityName" => $this->amenityName];
		$statement->execute($parameters);

		// update the null amenityId with what mySQL just gave us
		$this->amenityId = intval($pdo->lastInsertId());
	}
	/**
	 * gets the Amenity by amenity name
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param string $amenityName name of amenities to search for
	 * @return \SplFixedArray SplFixedArray of Amenities found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 **/
	public static function getAmenityByAmenityName(\PDO $pdo, string $amenityName) {
		// sanitize the description before searching
		$amenityName = trim($amenityName);
		$amenityName = filter_var($amenityName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($amenityName) === true) {
			throw(new \PDOException("amenity name is invalid"));
		}

		// create query template
		$query = "SELECT amenityName, amenityId, amenityCityName FROM amenity WHERE amenityName LIKE :amenityName";
		$statement = $pdo->prepare($query);

		// bind the amenity name to the place holder in the template
		$amenityName = "%$amenityName%";
		$parameters = ["amenityName" => $amenityName];
		$statement->execute($parameters);

		// build an array of amenities
		$amenities = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$amenity = new Amenity($row["amenityId"], $row["amenityName"], $row["amenityCityName"]);
				$amenities[$amenities->key()] = $amenity;
				$amenities->next();
			} catch(\Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return($amenities);
	}
	/**
	 * gets the Amenity by amenity id
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param int $amenityId amenity id to search for
	 * @return Amenity|null Amenity found or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 **/
	public static function getAmenityByAmenityId(\PDO $pdo, int $amenityId) {
		// sanitize the amenityId before searching
		if($amenityId <= 0) {
			throw(new \PDOException("amenity id is not positive"));
		}

		// create query template
		$query = "SELECT amenityId, amenityCityName, amenityName FROM amenity WHERE amenityId = :amenityId";
		$statement = $pdo->prepare($query);

		// bind the amenity id to the place holder in the template
		$parameters = ["amenityId" => $amenityId];
		$statement->execute($parameters);

		// grab the amenity from mySQL
		try {
			$amenity = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$amenity = new Amenity($row["amenityId"], $row["amenityName"], $row["amenityCityName"]);
			}
		} catch(\Exception $exception) {
			// if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return($amenity);
	}
	/**
	 * gets all Amenities
	 *
	 * @param \PDO $pdo PDO connection object
	 * @return \SplFixedArray SplFixedArray of Amenities found or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 **/
	public static function getAllAmenities(\PDO $pdo) {
		// create query template
		$query = "SELECT amenityId, amenityCityName, amenityName FROM amenity";
		$statement = $pdo->prepare($query);
		$statement->execute();

		// build an array of amenities
		$amenities = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$amenity = new Amenity($row["amenityId"], $row["amenityCityName"], $row["amenityName"]);
				$amenities[$amenities->key()] = $amenity;
				$amenities->next();
			} catch(\Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return ($amenities);
	}
	/**
	 * formats the state variables for JSON serialization
	 *
	 * @return array resulting state variables to serialize
	 **/
	public function jsonSerialize() {
		$fields = get_object_vars($this);
		return ($fields);
	}

}