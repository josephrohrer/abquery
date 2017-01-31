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
	 **/

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


