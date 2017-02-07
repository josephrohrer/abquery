<?php
namespace Edu\Cnm\Abquery;

require_once("autoload.php");

/**
 * Classes for the Park entity
 *
 * These are the classes for the park entity including the accessor and mutator methods
 *
 * @author Joseph Rohrer <jrohrer@cnm.edu>
 *
 **/
class Park implements \JsonSerializable {
	/**
	 * id for each park as provided by ABQ city data; this is the primary key
	 * @var int $parkId
	 **/
	private $parkId;
	/**
	 * name of each park as provided by ABQ city data
	 * @var string $parkName
	 **/
	private $parkName;
	/**
	 * spatial coordinates that are used to put a center of the park on a map
	 * @var Point $parkGeometry
	 **/
	private $parkGeometry;
	/**
	 * boolean that will determine if park area is developed or undeveloped
	 * @var boolean $parkDeveloped
	 **/
	private $parkDeveloped;

	/**
	 * constructor for the Park class
	 *
	 * @param int $newParkId
	 * @param string $newParkName
	 * @param Point $newParkGeometry
	 * @param boolean $newParkDeveloped
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 **/
	public function __construct(int $newParkId, string $newParkName, Point $newParkGeometry, tinyint $newParkDeveloped) {
		try {
			$this->setParkId($newParkId);
			$this->setParkName($newParkName);
			$this->setParkGeometry($newParkGeometry);
			$this->setParkDeveloped($newParkDeveloped);
		} catch(\InvalidArgumentException $invalidArgument) {
			throw(new \InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(\RangeException $range) {
			throw(new \RangeException($range->getMessage(), 0, $range));
		} catch(\TypeError $typeError) {
			throw(new \TypeError($typeError->getMessage(), 0, $typeError));
		} catch(\Exception $exception) {
			throw(new \Exception($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * accessor method for park id
	 *
	 * @return int value of park id
	 **/
	public function getParkId() {
		return($this->parkId);
	}


	/**
	 * mutator method for park id
	 * @param int $newParkId new value of park id
	 * @throws \RangeException if $newParkId is not positive
	 * @throws \TypeError if $newParkId is not an integer
	 **/
	public function setParkId(int $newParkId) {
		if($newParkId <= 0) {
			throw(new \RangeException("park id is not positive"));
		}

		$this->parkId = $newParkId;
	}


	/**
	 * accessor method for park name
	 *
	 * @return string value of park name
	 **/
	public function getParkName() {
		return($this->parkName);
	}

	/**
	 * mutator method for park name
	 *
	 * @param string $newParkName
	 * @throws \InvalidArgumentException if $newParkName is insecure
	 * @throws \RangeException if $newParkName is > 60 characters
	 * @throws \TypeError if $newParkName is not a string
	 **/
	public function setParkName(string $newParkName) {
		$newParkName = trim($newParkName);
		$newParkName = filter_var($newParkName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newParkName) === true) {
			throw(new \InvalidArgumentException("name content is empty or insecure"));
		}

		if(strlen($newParkName) > 60) {
			throw(new \RangeException("name content too large"));
		}

		$this->parkName = $newParkName;
	}

	/**
	 * accessor method for park geometry
	 *
	 * @return point value of park geometry
	 *
	 **/
	public function getParkGeometry() {
		return($this->parkGeometry);
	}


	/**
	 * mutator method for park geometry
	 * @param point $newParkGeometry new value of park geometry
	 * @throws error based on Point class
	 *
	 **/
	public function setParkGeometry(Point $newParkGeometry) {
		$this->parkGeometry = $newParkGeometry;
	}

	/**
	 * accessor method for park developed
	 *
	 * @return boolean for if park is developed
	 *
	 **/
	public function getParkDeveloped() {
		return($this->parkDeveloped);
	}

	/**
	 * mutator method for park developed
	 *
	 * @param tinyint $newParkDeveloped value of park developed
	 * @throws error if not 1 or 0
	 *
	 **/
	public function setParkDeveloped($newParkDeveloped) {
		if ($newParkDeveloped < 0 || $newParkDeveloped > 1)
			throw(new \RangeException("park developed must be 1 or 0"));
	}

	/**
	 * insert into MySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connnection object
	 **/
	public function insert(\PDO $pdo) {
		if($this->parkId !== null) {
			throw(new \PDOException("not a new park"));
		}
		$query = "INSERT INTO park(parkName, parkGeometry, parkDeveloped) VALUES(:parkName, :parkGeometry, :parkDeveloped)";
		$statement = $pdo->prepare($query);
		$parameters = ["parkName" => $this->parkName, "parkGeometry => $this->parkGeometry", "parkDeveloped => $this->parkDeveloped"];
		$statement->execute($parameters);
		$this->parkId = intval($pdo->lastInsertId());
	}

	/**
	 * gets the Park by parkId
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param int $parkId park id to search for
	 * @return Park|null Park found or null if not found
	 * @throws \PDOException when mySQL related errors
	 * @throws \TypeError when variables are not the correct data type
	 **/
	public static function getParkByParkId(\PDO $pdo, int $parkId) {
		if($parkId <= 0) {
			throw(new \PDOException("park id is not positive"));
		}
		$query = "SELECT parkId, parkName, parkGeometry, parkDeveloped FROM park WHERE parkId = :parkid";
		$statement = $pdo->prepare($query);
		$parameters = ["parkId" => $parkId];
		$statement->execute($parameters);

		try {
			$tweet = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$tweet = new Tweet($row["parkId"], $row["parkName"], $row["parkGeometry"], $row["parkDeveloped"]);
			}
		} catch(\Exception $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return($park);
		}
	}

/**
 * gets all parks
 *
 * @param \PDO $pdo PDO connection object
 * @return \SplFixedArray SplFixedArray of crimes found or null if not found
 * @throws \PDOException when mySQL related errors occur
 * @throws \TypeError when variables are not the correct data type
 */
public static function getAllParks(\PDO $pdo) {
	$query = "SELECT parkId, parkName, parkGeometry, parkDeveloped FROM park";
	$statement = $pdo->prepare($query);
	$statement->execute();

	$crimes = new \SplFixedArray($statement->rowCount());
	$statement->setFetchMode(\PDO::FETCH_ASSOC);
	while(($row = $statement->fetch()) !== false) {
		try {
			$park = new Park($row["parkId"], $row["parkName"], $row["cparkGeometry"], $row["parkDeveloped"]);
			$parks[$parks->key()] = $park;
			$parks->next();
		} catch(\Exception $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
	}
	return($parks);


	/**
 	* formats the state variables for JSON serialization
	 *
	 * @return array resulting state variables to serialize
 	**/
	public function jsonSerialize() {
		$fields = get_object_vars($this);
		return($fields);
	}
}