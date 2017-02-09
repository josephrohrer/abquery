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

}