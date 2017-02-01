<?php
/**
 * Classes for the Features entity
 *
 * These are the classes for the Features entity including the accessor and mutator methods
 *
 * @author bsmtih@cnm.edu
 **/
class Feature implements \JsonSerializable {
	/**
	 * @var int $featureAmenityId
	 * Foreign key for the feature to amenity relationship
	 */
	private $featureAmenityId;
	/**
	 * @var int $featureParkId
	 * Foreign key for the feature to park relationship
	 */
	private $featureParkId;
	/**
	 * @var int $featureValue
	 * Value for the specific feature given, representative of the number of said features available in the park.
	 */
	private $featureValue;

	/**
	 * constructor for the Feature entity
	 *
	 * @param int|null $newFeatureAmenityId id of this amenity feature or null if new amenity feature
	 * @param int|null $newFeatureParkId id of this park feature or null if new park feature
	 * @param int|null $newFeatureValue value of this feature or null if new value
	 * @throws \InvalidArgumentException if the data is not valid format
	 * @throws \RangeException if the data is out of range value parameter
	 * @throws \TypeError if the data violates type
	 * @throws \Exception if any other exception occurs
	 */

	public function __construct(int $newFeatureAmenityId = null, int $newFeatureParkId = null, int $newFeatureValue = null) {
		try {
			$this->setFeatureAmenityId($newFeatureAmenityId);
			$this->setFeatureParkId($newFeatureParkId);
			$this->setFeatureValue($newFeatureValue);
		} catch(\InvalidArgumentException $invalidArgument) {
			// rethrow the exception to the caller
			throw(new \InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
		} catch(\RangeException $rangeException) {
			// rethrow the exception to the caller
			throw(new \RangeException($rangeException->getMessage(), 0, $rangeException));
		} catch(\TypeError $typeError) {
			//rethrow the exception to the caller
			throw(new \TypeError($typeError->getMessage(), 0, $typeError));
		} catch(\Exception $exception) {
			//rethrow the exception to the caller
			throw(new \Exception($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * accessor method for feature amenity id
	 */
	public function getFeatureAmenityId() {
		return ($this->featureAmenityId);
	}

	/**
	 *mutator method for feature amenity id
	 *
	 * @param int $newFeatureAmenityId new value of amenity feature id
	 * @throws \RangeException if $newFeatureAmenityId is not positive
	 * @throws \TypeError if $newFeatureAmenityId is not an integer
	 */
	public function setFeatureAmenityId(int $newFeatureAmenityId) {
		//verify that the amenity id is positive
		if($newFeatureAmenityId <= 0) {
			throw(new \RangeException("the amenity id is not positive"));
		}
		// convert and store the amenity id
		$this->featureAmenityId = $newFeatureAmenityId;
	}
	/**
	 * accessor method for feature park id
	 */
	/**
	 * @return int
	 */
	public function getFeatureParkId() {
		return $this->featureParkId;
	}

	/**
	 * mutator method for feature park id
	 *
	 * @param int $newFeatureParkId
	 * @throws \RangeException
	 * @throws \TypeError
	 *
	 */

	public function setFeatureParkId(int $newFeatureParkId) {
		//verify that the function park id is positive
		if($newFeatureParkId <= 0) {
			throw(new \RangeException("the function park id is not positive"));
		}
	}

	/**
	 * accessor method for feature value
	 */
	public function getFeatureValue() {
		return $this->featureValue;
	}

	/**
	 * mutator method for feature value
	 *
	 * @param int $newFeatureValue
	 * @throws \RangeException
	 * @throws |TypeError
	 *
	 */
	public function setFeatureValue(int $newFeatureValue) {
		//verify that the function park id is positive
		if($newFeatureValue < 0) {
			throw(new \RangeException("the value is less than zero"));
		}
	}

	/**
	 * inserts this Feature into mySQL
	 *
	 * @param \PDO $PDO PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function insert(\PDO $PDO) {

	//create query template
$query = "INSERT INTO feature(featureAmenityId, featureParkId, featureValue) VALUES(:featureAmenityId, :featureParkId, :featureValue)";
$statement = $PDO->prepare($query);

//bind the member variables to the place holders in the template
$parameters = ["featureAmenityId" => $this->featureAmenityId, "featureParkId" => $this->featureParkId, "featureValue" => $this->featureValue];
$statement->execute($parameters);
}
		/**
		 * formats the state variables to JSON readable format.
		 *
		 * @return array making state variables to serialize.
		 */
		public function jsonSerialize() {
			$fields = get_object_vars($this);
			return($fields);
			/**
			 * inserts this Value into mySQL
			 *
			 * @param \PDO $pdo PDO connection object
			 * @throws \PDOException when mySQL related errors occur
			 * @throws \TypeError if $pdo is not a PDO connection object
			 **/

		}
}