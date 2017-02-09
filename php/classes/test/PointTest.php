<?php
namespace Edu\Cnm\Abquery\Test;

use Edu\Cnm\Abquery\{Point};

require_once("AbqueryTest.php");
require_once(dirname(__DIR__) . "/autoload.php");

/**
 * PHPUnit test for the Point class
 * @see \Edu\Cnm\Abquery\Point
 * @author Abquery
 **/
class PointTest extends PHPUnit_Framework_TestCase {
	protected $VALID_LAT = -106.69669124212061;
	protected $VALID_LONG = 35.110150828348985;
	protected $INVALID_LAT = 190.69669124212061;
	protected $INVALID_LONG = 95.110150828348985;
	protected $VALID_EUCLIDEAN_POINTS = null;
	protected $INVALID_EUCLIDEAN_POINTS = null;

	/**
	 * create setUp
	 */

	public final function setUp() {
		parent::setUp();

		$this->VALID_EUCLIDEAN_POINTS = new \SplFixedArray(3);
		$this->VALID_EUCLIDEAN_POINTS[0] = new Point(50.110148212230001, 50.110148212230001);
		$this->VALID_EUCLIDEAN_POINTS[1] = new Point(25.110148212230001, 25.110148212230001);
		$this->VALID_EUCLIDEAN_POINTS[2] = new Point(75.110148212230001, 25.110148212230001);

		$this->INVALID_EUCLIDEAN_POINTS = new \SplFixedArray(0);

		// this is the valid mean to check against
		$this->VALID_CENTER_POINT = new Point(50.110148212230001, 33.443481545563334);
	}

	/**
	 * test inserting a valid point
	 **/

	public function testValidPoint() {
		$point = new Point($this->VALID_LAT, $this->VALID_LONG);
		//use mutators to make a valid case
		$point->setLat($this->VALID_LAT);
		$point->setLong($this->VALID_LONG);
		//assert values are equal
		$this->assertEquals($point->getLat(), $this->VALID_LAT);
		$this->assertEquals($point->getLong(), $this->VALID_LONG);
	}

	/**
	 *test using invalid latitude
	 *
	 * @expectedException \RangeException
	 */

	public function testInvalidPointLat() {
		$point = new Point($this->INVALID_LAT, $this->VALID_LONG);
		//use mutators to make an invalid case
		$point->setLat($this->INVALID_LAT);
		$point->setLong($this->VALID_LONG);
	}

	/**
	 * test using invalid longitude
	 * @expectedException \RangeException
	 */
	public function testInvalidPointLong() {
		$point = new Point($this->VALID_LAT, $this->INVALID_LONG);
		//use mutators to make an invalid case
		$point->setLat($this->VALID_LAT);
		$point->setLong($this->INVALID_LONG);
	}

	/**
	 * test using valid euclidean center
	 */
	public function testValidEuclideanMean() {

		// new instance of the point class
		$point = new Point($this->VALID_LAT, $this->VALID_LONG);

		// calc the center point from the Point class
		$testCenterPoint = $point->euclideanMean($this->VALID_EUCLIDEAN_POINTS);
		var_dump(null);

		// compare the calculated point to the "mathed" point
		$this->assertEquals($testCenterPoint, $this->VALID_CENTER_POINT);

		// create new variable called $centerPoint
		// set $centerPoint to be a method call to euclideanMean(), plugging in the \SplFixedArray $VALID_EUCLIDEAN_POINTS
		// use manual math answers into assertEquas
		// then you assertEquals that YOUR $centerPoint result matches the $centerPoint result from the euclideanMean() function


		$point = new Point($this->VALID_EUCLIDEAN_POINTS);
		//use mutators to make a valid case

	}

	/**
	 * test using invalid euclidean center
	 * @expectedException \RangeException
	 */
	public function testInvalidEuclideanMean() {
		$point = new Point($this->INVALID_EUCLIDEAN_POINTS);
		//use mutators to make an invalid case
		$point->setCenterPoint($this->INVALID_CENTER_POINT);
	}
}

