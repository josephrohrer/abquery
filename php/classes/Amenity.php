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