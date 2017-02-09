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

class PointTest extends AbqueryTest {
	protected $VALID_LAT = -106.69669124212061;
	protected $VALID_LONG = 35.110150828348985;
	protected $INVALID_LAT = 190.69669124212061;
	protected $INVALID_LONG = 95.110150828348985;

	/**
	 * PHPUnit test for the Euclidean center
	 * FIXME: euclidean center
	 */

	public function testValidPoint(){
			$point = new Point($this->VALID_LAT, $this->VALID_LONG);
			//use mutators to make a valid case
			$point->setLat($this->VALID_LAT);
			$point->setLong($this->VALID_LONG);
			//assert values are equal
			$this->assertEquals($point->getLat(), $this->VALID_LAT);
			$this->assertEquals($point->getLong(), $this->VALID_LONG);
		}

	/**
 	*test using valid latitude
 	*/

	public function testInvalidPointLat(){
		$point = new Point($this->INVALID_LAT, $this->VALID_LONG);
		//use mutators to make an invalid case
		$point->setLat($this->INVALID_LAT);
		$point->setLong($this->VALID_LONG);
	}
	/**
	 *test using valid longitude
	 */

	public function testInvalidPointLong(){
		$point = new Point($this->VALID_LAT, $this->INVALID_LONG);
		//use mutators to make an invalid case
		$point->setLat($this->VALID_LAT);
		$point->setLong($this->INVALID_LONG);
	}
}