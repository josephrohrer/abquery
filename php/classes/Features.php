<?php
/**
 * Classes for the Features entity
 *
 * These are the classes for the Features entity including the accessor and mutator methods
 *
 * @author bsmtih@cnm.edu
 **/
class Features implements \JsonSerializable {
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
	 *@param int|null $newFeatureParkId id of this park feature or null if new park feature
	 *@param int|null $newFeatureValue value of this feature or null if new value
	 *@throws \InvalidArgumentException if the data is not valid format
	 *@throws \RangeException if the data is out of range value parameter
	 *@throws \TypeError if the data violates type
	 *@throws \Exception if any other exception occurs
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
		}catch (\Exception $exception) {
			//rethrow the exception to the caller
			throw(new \Exception($exception->getMessage(), 0, $exception));
		}
	}
	/**
	 * accessor method for feature amenity id
	 */
	public function getFeatureAmenityId() {
		return($this->featureAmenityId);
	}

	/**
	 *mutator method for feature amenity id
	 *
	 *@param int|null $newFeatureAmenityId new value of amenity feature id
	 *@throws \RangeException if $newFeatureAmenityId is not positive
	 *@throws \TypeError if $newFeatureAmenityId is not an integer
	 */
	public function setFeatureAmenityId(int $newFeatureAmenityId = null) {

	}
}