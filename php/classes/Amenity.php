<?php
/**
 * Classes for the amenity entity
 *
 * These are the classes for the amenity entity including the accessor and mutator methods
 *
 * @author jminnich@cnm.edu
 */


class Amenity implements \JsonSerialize {
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
		try{
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
	 * accessor method for amenityId
	 *
	 * @return int|null value of amenity id
	 **/
	public function getAmenityId() {
		return ($this->amenityId);
	}

	/**
	 * mutator for amenityId
	 * @param int|null $newAmenityId new value of amenity id
	 * @throws \RangeException if $newAmenityId is not positive
	 * @throws \TypeError if $newAmenityId is not an integer
	 **/
	public function setAmenityId(int $newAmenityId = null) {
		// base case: if the amenity id is null, this a new amenity without a mySQL assigned id
		if($newAmenityId === null) {
			$this->AmenityId = null;
			return;
		}

		// verify the amenity id is positive
		if($newAmenityId <= 0) {
			throw(new \RangeException("amenity id is not positive"));
		}

		// convert and store the tweet id
		$this->amenityId = $newAmenityId;
	}
}


