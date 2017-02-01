<?php
namespace Cnm\Edu\Abquery;

require_once("autoload.php");

/**
 * point class referenced in the park and crime entity
 *
 * this class is referenced when a point having an x and y value is necessary. The x should be considered longitude and the y latitude.
 *
 * @author Brett Gilbert <bgilbert9@cnm.edu>
 */
class Point implements \JsonSerializable {
	/**
	 * @var float $longitude
	 */
	private $longitude;
	/**
	 * @var float $latitude
	 */
	private $latitude;


	/**
	 * constructor for the point entity
	 *
	 * @param float $longitude the longitude value of the point
	 * @param float @latitude the latitude value of the point
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception
	 */
	public function __construct(float $newLatitude, float $newLongitude) {
	}


	public function jsonSerialize() {
		// TODO: Implement jsonSerialize() method.
	}
}