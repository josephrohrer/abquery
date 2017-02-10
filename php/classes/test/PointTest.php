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
class PointTest extends \PHPUnit_Framework_TestCase {
	protected $VALID_LONG = -106.69669124212061;
	protected $VALID_LAT = 35.110150828348985;
	protected $INVALID_LONG = 190.69669124212061;
	protected $INVALID_LAT = 95.110150828348985;
	protected $VALID_EUCLIDEAN_POINTS = null;
	protected $INVALID_EUCLIDEAN_POINTS = null;
	protected $VALID_CENTER_POINT = null;

	/**
	 * create setUp
	 */

	public final function setUp() {
		parent::setUp();

		$this->VALID_EUCLIDEAN_POINTS = new \SplFixedArray(3);
		$this->VALID_EUCLIDEAN_POINTS[0] = new Point(50.110148212230001, 50.110148212230001);
		$this->VALID_EUCLIDEAN_POINTS[1] = new Point(25.110148212230001, 25.110148212230001);
		$this->VALID_EUCLIDEAN_POINTS[2] = new Point(25.110148212230001, 75.110148212230001);

		$this->INVALID_EUCLIDEAN_POINTS = new \SplFixedArray(0);

		// this is the valid mean to check against
		$this->VALID_CENTER_POINT = new Point(33.443481545563334, 50.110148212230001);
	}

	/**
	 * test inserting a valid point
	 **/

	public function testValidPoint() {
		$point = new Point($this->VALID_LONG, $this->VALID_LAT);
		//use mutators to make a valid case
		$point->setLatitude($this->VALID_LAT);
		$point->setLongitude($this->VALID_LONG);
		//assert values are equal
		$this->assertEquals($point->getLatitude(), $this->VALID_LAT);
		$this->assertEquals($point->getLongitude(), $this->VALID_LONG);
	}

	/**
	 *test using invalid latitude
	 *
	 * @expectedException \RangeException
	 */

	public function testInvalidPointLatitude() {
		$point = new Point($this->VALID_LONG, $this->INVALID_LAT);
		//use mutators to make an invalid case
		$point->setLatitude($this->INVALID_LAT);
		$point->setLongitude($this->VALID_LONG);
	}

	/**
	 * test using invalid longitude
	 * @expectedException \RangeException
	 */
	public function testInvalidPointLong() {
		$point = new Point($this->INVALID_LONG, $this->VALID_LAT);
		//use mutators to make an invalid case
		$point->setLatitude($this->VALID_LAT);
		$point->setLongitude($this->INVALID_LONG);
	}

	/**
	 * test using valid euclidean center
	 */
	public function testValidEuclideanMean() {

		// new instance of the point class
		$point = new Point($this->VALID_LONG, $this->VALID_LAT);
		//OR 		$point = new Point($this->VALID_EUCLIDEAN_POINTS);?

		// calc the center point from the Point class
		$testCenterPoint = $point->euclideanMean($this->VALID_EUCLIDEAN_POINTS);

		// compare the calculated point to the "mathed" point
		$this->assertEquals($testCenterPoint, $this->VALID_CENTER_POINT);

		// create new variable called $centerPoint
		// set $centerPoint to be a method call to euclideanMean(), plugging in the \SplFixedArray $VALID_EUCLIDEAN_POINTS
		// use manual math answers into assertEqua
		// then you assertEquals that YOUR $centerPoint result matches the $centerPoint result from the euclideanMean() function

	}

	/**
	 * test using invalid euclidean center
	 * @expectedException \RangeException
	 */
	public function testInvalidEuclideanMean() {
		Point::euclideanMean($this->INVALID_EUCLIDEAN_POINTS);
	}
}

