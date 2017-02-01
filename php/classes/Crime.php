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
	 * type of crime committed i.e. robbery, auto theft, etc. this ia a ghost entity
	 * @var string $crimeDescription
	 */
	private $crimeDescription;
	/**
	 * spatial coordinates that can be used to place the crime on a map
	 * @var Point $crimeGeometry
	 */
	private $crimeGeometry;
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
	 * @param string $newCrimeDescription the type of crime that was committed
	 * @param Point $newCrimeGeometry coordinates near where the crime was committed
	 * @param \DateTime $newCrimeDate date on which the crime was reported
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds
	 * @throws \TypeError if data violates type hints
	 * @throws \Exception if some other exception occurs
	 */
	public function __construct(int $newCrimeId, string $newCrimeLocation, string $newCrimeDescription, Point $newCrimeGeometry, $newCrimeDate) {
		try {
			$this->setCrimeId($newCrimeId);
			$this->setCrimeLocation($newCrimeLocation);
			$this->setCrimeDescription($newCrimeDescription);
			$this->setCrimeGeometry($newCrimeGeometry);
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
	 * accessor method for crime description
	 *
	 * @return string value of crime description
	*/
	public function getCrimeDescription() {
		return($this->crimeDescription);
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
	 * accessor method for crime geometry
	 *
	 * @return Point value of crime geometry
	 */
	public function getCrimeGeometry() {
		return($this->crimeGeometry);
	}


	/**
	 * mutator method for crime geometry
	 *
	 * @param Point $newCrimeGemoetry new value of crime geometry
	 * @throws \TypeError based on Point class
	 */
	public function setCrimeGeometry(Point $newCrimeGeometry) {
		$this->crimeGeometry = $newCrimeGeometry;
	}


	/**
	 * accessor method for crime date
	 *
	 * @return \DateTime value for crime date
	 */
	public function getCrimeDate() {
		return($this->crimeDate);
	}


	/**
	 * mutator method for crime date
	 *
	 * @param \DateTime $newCrimeDate crime date as a DateTime object
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


	public function jsonSerialize() {
		// TODO: Implement jsonSerialize() method.
	}
}