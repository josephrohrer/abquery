<?php
namespace Edu\Cnm\Abquery;

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
	 * @param float $newLongitude the longitude value of the point
	 * @param float @newLatitude the latitude value of the point
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception
	 */
	public function __construct(float $newLongitude, float $newLatitude) {
		try {
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
	 * accessor method for longitude
	 *
	 * @return float value for longitude
	 */
	public function getLongitude() {
		return($this->longitude);
	}


	/**
	 * mutator method for longitude
	 *
	 * @param float $newLongitude new value of Longitude
	 * @throws \RangeException if $newLongitude is not in the range(-180,180)
	 */
	public function setLongitude(float $newLongitude) {
		if($newLongitude < -180 || $newLongitude > 180)
			throw(new \RangeException("longitude is not within the range (-180,180)"));
		$this->longitude = $newLongitude;
	}


	/**
	 * accessor method for latitude
	 *
	 * @return float value for latitude
	 */
	public function getLatitude() {
		return($this->latitude);
	}


	/**
	 * mutator method for latitude
	 *
	 * @param float $newLatitude new value of latitude
	 * @throws \RangeException if $newLatitude is not in the range(-90,90)
	 */
	public function setLatitude(float $newLatitude) {
		if($newLatitude < -90 || $newLatitude > 90)
			throw(new \RangeException("latitude is not within the range (-90,90)"));
		$this->latitude = $newLatitude;
	}


	public static function euclideanMean(\SplFixedArray $points) {
		if(count($points) === 0) {
			throw (new \RangeException("cannot find the center of nothing"));
		}
		$centerLongitude = 0.0;
		$centerLatitude = 0.0;
		foreach($points as $point) {
			$centerLongitude = $centerLongitude + $point->getLongitude();
			$centerLatitude = $centerLatitude + $point->getLatitude();
		}
		$centerLongitude = $centerLongitude / count($points);
		$centerLatitude = $centerLatitude / count($points);

		$centerPoint = new Point ($centerLongitude, $centerLatitude);
		return($centerPoint);
	}

	public function jsonSerialize() {
		$fields = [];
		$fields["lng"] = $this->longitude;
		$fields["lat"] = $this->latitude;
		return($fields);
	}
}