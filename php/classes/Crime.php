<?php
namespace Edu\Cnm\Abquery;

require_once("autoload.php");

/**
 * Classes for the crime entity
 *
 * These are the classes for the crime entity including the accessor and mutator methods
 *
 * @author bgilbert9@cnm.edu
 */
class Crime implements \JsonSerializable {
	use ValidateDate;
	/**
	 * id for each individual crime as provided by the city data, this is a primary key
	 * @var int $crimeId
	 */
	private $crimeId;
	/**
	 * basic block location of the crime as provided by the city data
	 * @var string &crimeLocation
	 */
	private $crimeLocation;
	/**
	 * spatial coordinates that can be used to place the crime on a map
	 * @var Point $crimeGeometry
	 */
	private $crimeGeometry;
	/**
	 * type of crime committed i.e. robbery, auto theft, etc. this ia a ghost entity
	 * @var string $crimeDescription
	 */
	private $crimeDescription;
	/**
	 * the date on which the crime was reported
	 * @var \DateTime $crimeDate
	 */
	private $crimeDate;


	/**
	 * constructor for the crime entity
	 *
	 * @param int $newCrimeId id of a specific crime
	 * @param string $newCrimeLocation block-level location that the crime was committed
	 * @param Point $newCrimeGeometry coordinates near where the crime was committed
	 * @param string $newCrimeDescription the type of crime that was committed
	 * @param \DateTime|string $newCrimeDate date on which the crime was reported
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds
	 * @throws \TypeError if data violates type hints
	 * @throws \Exception if some other exception occurs
	 */
	public function __construct(int $newCrimeId, string $newCrimeLocation, Point $newCrimeGeometry, string $newCrimeDescription, $newCrimeDate) {
		try {
			$this->setCrimeId($newCrimeId);
			$this->setCrimeLocation($newCrimeLocation);
			$this->setCrimeGeometry($newCrimeGeometry);
			$this->setCrimeDescription($newCrimeDescription);
			$this->setCrimeDate($newCrimeDate);
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
	 * accessor method for crimeId
	 *
	 * @return int value for crime id
	 */
	public function getCrimeId() {
		return ($this->crimeId);
	}


	/**
	 * mutator for crimeId
	 *
	 * @param int $newCrimeId new value of crime id
	 * @throws \RangeException if $newCrimeId is not positive
	 * @throws \TypeError if $newCrimeId is not an integer
	 */
	public function setCrimeId(int $newCrimeId) {
		if($newCrimeId <= 0) {
			throw(new \RangeException("crime id is not positive"));
		}
		$this->crimeId = $newCrimeId;
	}


	/**
	 * accessor for crimeLocation
	 *
	 * @return string value of crime location content
	 */
	public function getCrimeLocation() {
		return ($this->crimeLocation);
	}


	/**
	 * mutator method for crime location
	 *
	 * @param string $newCrimeLocation new value of crime location
	 * @throws \InvalidArgumentException if $newCrimeLocation is insecure
	 * @throws \RangeException if $newCrimeLocation is > 72 characters
	 * @throws \TypeError if $newCrimeLocation is not a string
	 */
	public function setCrimeLocation(string $newCrimeLocation) {
		$newCrimeLocation = trim($newCrimeLocation);
		$newCrimeLocation = filter_var($newCrimeLocation, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newCrimeLocation) === true) {
			throw(new \InvalidArgumentException("crime location is empty or insecure"));
		}
		if(strlen($newCrimeLocation) > 72) {
			throw(new \RangeException("crime location too large"));
		}
		$this->crimeLocation = $newCrimeLocation;
	}


	/**
	 * accessor method for crime geometry
	 *
	 * @return Point value of crime geometry
	 */
	public function getCrimeGeometry() {
		return ($this->crimeGeometry);
	}


	/**
	 * mutator method for crime geometry
	 *
	 * @param Point $newCrimeGeometry new value of crime geometry
	 * @throws \TypeError based on Point class
	 */
	public function setCrimeGeometry(Point $newCrimeGeometry) {
		$this->crimeGeometry = $newCrimeGeometry;
	}


	/**
	 * accessor method for crime description
	 *
	 * @return string value of crime description
	 */
	public function getCrimeDescription() {
		return ($this->crimeDescription);
	}


	/**
	 * mutator method for crime description
	 *
	 * @param string $newCrimeDescription new value of crime description
	 * @throws \InvalidArgumentException if $newCrimeDescription is insecure
	 * @throws \RangeException if $newCrimeDescription is > 255
	 * @throws \TypeError if $newCrimeDescription is not a string
	 */
	public function setCrimeDescription(string $newCrimeDescription) {
		$newCrimeDescription = trim($newCrimeDescription);
		$newCrimeDescription = filter_var($newCrimeDescription, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newCrimeDescription) === true) {
			throw(new \InvalidArgumentException("crime description is empty or insecure"));
		}
		if(strlen($newCrimeDescription) > 255) {
			throw(new \RangeException("crime description is too large"));
		}
		$this->crimeDescription = $newCrimeDescription;
	}


	/**
	 * accessor method for crime date
	 *
	 * @return \DateTime|string value for crime date
	 */
	public function getCrimeDate() {
		return ($this->crimeDate);
	}


	/**
	 * mutator method for crime date
	 *
	 * @param \DateTime|string $newCrimeDate crime date as a DateTime object or string
	 * @throws \InvalidArgumentException if $newCrimeDate is not a valid object or string
	 * @throws \RangeException if $newCrimeDate is a date that does not exist
	 */
	public function setCrimeDate($newCrimeDate) {
		try {
			$newCrimeDate = self::validateDateTime($newCrimeDate);
		} catch(\InvalidArgumentException $invalidArgument) {
			throw(new \InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(\RangeException $range) {
			throw(new \RangeException($range->getMessage(), 0, $range));
		}
		$this->crimeDate = $newCrimeDate;
	}


	/**
	 * inserts this crime into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL relates errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 */
	public function insert(\PDO $pdo) {
		if($this->crimeId === null) {
			throw(new \PDOException("not a new crime"));
		}

		$query = "INSERT INTO crime(crimeId, crimeLocation, crimeGeometry, crimeDescription, crimeDate) VALUES(:crimeId, :crimeLocation, POINT(:crimeGeometryX, :crimeGeometryY), :crimeDescription, :crimeDate)";
		$statement = $pdo->prepare($query);

		$formattedDate = $this->crimeDate->format("Y-m-d H:i:s");

		$parameters = [
			"crimeId" => $this->crimeId,
			"crimeLocation" => $this->crimeLocation,
			"crimeGeometryX" => $this->crimeGeometry->getLongitude(),
			"crimeGeometryY" => $this->crimeGeometry->getLatitude(),
			"crimeDescription" => $this->crimeDescription,
			"crimeDate" => $formattedDate];
		$statement->execute($parameters);
		//$this->crimeId = intval($pdo->lastInsertId());
	}


	/**
	 * gets the crime by crime id
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param int $crimeId crime id to search by
	 * @return Crime|null Crime found or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 */
	public static function getCrimeByCrimeId(\PDO $pdo, int $crimeId) {
		if($crimeId <= 0) {
			throw(new \PDOException("crime id is not positive"));
		}

		$query = "SELECT crimeId, crimeLocation, ST_X(crimeGeometry) AS crimeGeometryX, ST_Y(crimeGeometry) AS crimeGeometryY, crimeDescription, crimeDate FROM crime WHERE crimeId = :crimeId";
		$statement = $pdo->prepare($query);

		$parameters = ["crimeId" => $crimeId];
		$statement->execute($parameters);

		try {
			$crime = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$crime = new Crime($row["crimeId"], $row["crimeLocation"], new Point($row["crimeGeometryX"],$row["crimeGeometryY"]),$row["crimeDescription"] , $row["crimeDate"]);
			}
		} catch(\Exception $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($crime);
	}


	/**
	 * gets the Crime by location
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param string $crimeLocation crime content to search for
	 * @return \SplFixedArray SplFixedArray of crimes found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 */
	public static function getCrimeByCrimeLocation(\PDO $pdo, string $crimeLocation) {
		$crimeLocation = trim($crimeLocation);
		$crimeLocation = filter_var($crimeLocation, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($crimeLocation) === true) {
			throw(new \PDOException("crime location is invalid"));
		}

		$query = "SELECT crimeId, crimeLocation, ST_X(crimeGeometry) AS crimeGeometryX, ST_Y(crimeGeometry) AS crimeGeometryY, crimeDescription, crimeDate FROM crime WHERE crimeLocation LIKE :crimeLocation";
		$statement = $pdo->prepare($query);

		$crimeLocation = "%$crimeLocation%";
		$parameters = ["crimeLocation" => $crimeLocation];
		$statement->execute($parameters);

		$crimes = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$crime = new Crime($row["crimeId"], $row["crimeLocation"], new Point($row["crimeGeometryX"],$row["crimeGeometryY"]),$row["crimeDescription"], $row["crimeDate"]);
				$crimes[$crimes->key()] = $crime;
				$crimes->next();
			} catch(\Exception $exception) {
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return ($crimes);
	}


	/**
	 * gets crime by crime geometry
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param Point $userLocation user input location to compare with Point crime geometry
	 * @param float $userDistance distance user chooses in UI to search within
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct type
	 * @returns \SplFixedArray array of crimes that are found
	 */
	public static function getCrimesByCrimeGeometry (\PDO $pdo, Point $userLocation, float $userDistance) {
		//sanitize
		if(empty($userLocation) === true) {
			throw(new \PDOException("User location is not valid"));
		}
		//create query template
		$query = "CALL getCrimesByCrimeGeometry(POINT(:userLocationX, :userLocationY), :userDistance)";
		$statement = $pdo->prepare($query);
		$parameters = ["userLocationX" => $userLocation->getLongitude(), "userLocationY" => $userLocation->getLatitude(), "userDistance" => $userDistance];
		$statement->execute($parameters);
		//create an array of crimes
		$crimes = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$crime = new Crime($row["crimeId"], $row["crimeLocation"], new Point($row["crimeGeometryX"], $row["crimeGeometryY"]), $row["crimeDescription"], $row["crimeDate"]);
				$crimes[$crimes->key()] = $crime;
				$crimes->next();
			} catch(\Exception $exception) {
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return($crimes);
	}


	/**
	 * gets crime by description
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param string $crimeDescription crime content to search for
	 * @return \SplFixedArray SplFixedArray of crimes found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 */
	public static function getCrimeByCrimeDescription(\PDO $pdo, string $crimeDescription) {
		$crimeDescription = trim($crimeDescription);
		$crimeDescription = filter_var($crimeDescription, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($crimeDescription) === true) {
			throw(new \PDOException("crime description is invalid"));
		}

		$query = "SELECT crimeId, crimeLocation, ST_X(crimeGeometry) AS crimeGeometryX, ST_Y(crimeGeometry) AS crimeGeometryY, crimeDescription, crimeDate FROM crime WHERE crimeDescription LIKE :crimeDescription";
		$statement = $pdo->prepare($query);

		$crimeDescription = "%$crimeDescription%";
		$parameters = ["crimeDescription" => $crimeDescription];
		$statement->execute($parameters);

		$crimes = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$crime = new Crime($row["crimeId"], $row["crimeLocation"], new Point($row["crimeGeometryX"],$row["crimeGeometryY"]), $row["crimeDescription"], $row["crimeDate"]);
				$crimes[$crimes->key()] = $crime;
				$crimes->next();
			} catch(\Exception $exception) {
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return ($crimes);
	}


	/**
	 * gets crime by date
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param  \DateTime|string $crimeSunriseDate crime date to search for
	 * @param  \DateTime|string $crimeSunsetDate crime date to search for
	 * @return \SplFixedArray SplFixedArray of crimes found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 */
	public static function getCrimeByCrimeDate(\PDO $pdo, $crimeSunriseDate, $crimeSunsetDate) {
		if ((empty($crimeSunriseDate) === true)  || (empty($crimeSunsetDate) === true)) {
			throw(new \InvalidArgumentException("date is empty or null"));
		}
		try {
			$crimeSunriseDate = self::validateDateTime($crimeSunriseDate);
			$crimeSunsetDate = self::validateDateTime($crimeSunsetDate);
		} catch(\InvalidArgumentException $invalidArgument) {
			throw(new \InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(\RangeException $range) {
			throw(new \RangeException($range->getMessage(), 0, $range));
		}

		$query = "SELECT crimeId, crimeLocation, ST_X(crimeGeometry) AS crimeGeometryX, ST_Y(crimeGeometry) AS crimeGeometryY, crimeDescription, crimeDate FROM crime WHERE crimeDate >= :crimeSunriseDate AND crimeDate <= :crimeSunsetDate";
		$statement = $pdo->prepare($query);

		$formattedSunriseDate = $crimeSunriseDate->format("Y-m-d H:i:s");
		$formattedSunsetDate = $crimeSunsetDate->format("Y-m-d H:i:s");
		$parameters = ["crimeSunriseDate" => $formattedSunriseDate, "crimeSunsetDate" => $formattedSunsetDate];
		$statement->execute($parameters);

		$crimes = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$crime = new Crime($row["crimeId"], $row["crimeLocation"], new Point($row["crimeGeometryX"],$row["crimeGeometryY"]), $row["crimeDescription"], $row["crimeDate"]);
				$crimes[$crimes->key()] = $crime;
				$crimes->next();
			} catch(\Exception $exception) {
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return ($crimes);
	}


	/**
	 * gets all crimes
	 *
	 * @param \PDO $pdo PDO connection object
	 * @return \SplFixedArray SplFixedArray of crimes found or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 */
	public static function getAllCrimes(\PDO $pdo) {
		$query = "SELECT crimeId, crimeLocation,  ST_X(crimeGeometry) AS crimeGeometryX, ST_Y(crimeGeometry) AS crimeGeometryY, crimeDescription, crimeDate FROM crime";
		$statement = $pdo->prepare($query);
		$statement->execute();

		$crimes = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$crime = new Crime($row["crimeId"], $row["crimeLocation"],  new Point($row["crimeGeometryX"],$row["crimeGeometryY"]),$row["crimeDescription"], $row["crimeDate"]);
				$crimes[$crimes->key()] = $crime;
				$crimes->next();
			} catch(\Exception $exception) {
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return ($crimes);
	}


	public function jsonSerialize() {
		$fields = get_object_vars($this);
		$fields["crimeDate"] = $this->crimeDate->getTimestamp() * 1000;
		return ($fields);
	}
}