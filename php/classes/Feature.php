<?php
namespace Edu\Cnm\Abquery;

require_once("autoload.php");

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
			//store the new park id
		}
			$this->featureParkId = $newFeatureParkId;
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
			//store the new featureValue
		}
			$this->featureValue = $newFeatureValue;
	}

	/**
	 * inserts this Feature into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function insert(\PDO $pdo) {
		//create query template
		$query = "INSERT INTO feature(featureAmenityId, featureParkId, featureValue) VALUES(:featureAmenityId, :featureParkId, :featureValue)";
		$statement = $pdo->prepare($query);
//bind the member variables to the place holders in the template
		$parameters = ["featureAmenityId" => $this->featureAmenityId, "featureParkId" => $this->featureParkId, "featureValue" => $this->featureValue];
		$statement->execute($parameters);
	}

	/**
	 * gets the feature by featureAmenityId
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param int $featureAmenityId amenity id to search by
	 * @return \SplFixedArray SplFixedArray of features found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 **/
	public static function getFeatureByFeatureAmenityId(\PDO $pdo, int $featureAmenityId) {
		// sanitize the amenity id before searching
		if($featureAmenityId <= 0) {
			throw(new \RangeException("feature amenity id must be positive"));
		}

		// create query template
		$query = "SELECT featureAmenityId, featureParkId, featureValue FROM feature WHERE featureAmenityId = :featureAmenityId";
		$statement = $pdo->prepare($query);

		// bind the feature amenity id to the place holder in the template
		$parameters = ["featureAmenityId" => $featureAmenityId];
		$statement->execute($parameters);

		// build an array of features
		$features = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$feature = new Feature($row["featureAmenityId"], $row["featureParkId"], $row["featureValue"]);
				$features[$features->key()] = $feature;
				$features->next();
			} catch(\Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return($features);
	}

	/**
	 * gets the feature by featureParkId
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param int $featureParkId amenity id to search by
	 * @return \SplFixedArray SplFixedArray of features found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 **/
	public static function getFeatureByFeatureParkId(\PDO $pdo, int $featureParkId) {
		// sanitize the park id before searching
		if($featureParkId <= 0) {
			throw(new \RangeException("feature park id must be positive"));
		}

		// create query template
		$query = "SELECT featureAmenityId, featureParkId, featureValue FROM feature WHERE featureParkId = :featureParkId";
		$statement = $pdo->prepare($query);

		// bind the feature park id to the place holder in the template
		$parameters = ["featureParkId" => $featureParkId];
		$statement->execute($parameters);

		// build an array of features
		$features = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$feature = new Feature($row["featureAmenityId"], $row["featureParkId"], $row["featureValue"]);
				$features[$features->key()] = $feature;
				$features->next();
			} catch(\Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return($features);
	}
	/**
	 * gets all features
	 *
	 * @param \PDO $pdo PDO connection object
	 * @return \SplFixedArray SplFixedArray of Features found or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 *
	 */
	public static function getALLFeatures(\PDO $pdo) {
		// create query template
		$query = "SELECT featureAmenityId, featureParkId, featureValue FROM feature";
		$statement = $pdo->prepare($query);
		$statement->execute();

		//build an array of Features
		$features = new \SplFixedArray($statement->rowCount());
		$statement-> setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$feature = new Feature($row["featureAmenityId"], $row["featureParkId"], $row["featureValue"]);
				$features[$features->key()] = $feature;
				$features->next();
			} catch(\Exception $exception) {
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return ($features);
	}
	public function jsonSerialize() {
		$fields = get_object_vars($this);
		return ($fields);
	}
}