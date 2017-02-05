<?php
namespace Edu\Cnm\Abquery\Test;

use Edu\Cnm\Abquery\{Amenity};

// grab the project test parameters
require_once("abqueryTest.php");

// grab the class under scrutiny
require_once(dirname(__DIR__) . "/classes/autoload.php");

/**
 * Full PHPUnit test for the Amenity class
 *
 * This is a complete PHPUnit test of the Amenity class. It is complete because *ALL* mySQL/PDO enabled methods are tested for both invalid and valid inputs.
 *
 * @see Tweet
 * @author Jennifer Quay Minnich <jminnich@cnm.edu>
 **/

class AmenityTest extends AbqueryTest {
	/**
	 * name of the Amenity
	 * @var string $VALID_AMENITYNAME
	 **/
	protected $VALID_AMENITYNAME = "PHPUnit test passing";
	/**
	 * city name of the Amenity
	 * @var string $VALID_AMENITYCITYNAME
	 **/
	protected $VALID_AMENITYCITYNAME = "PHPUnit test passing";

	/**
	 * create dependent objects before running each test
	 **/
	public final function setUp() {
		// run the default setUp() method first
		parent::setUp();

		// create and insert a Profile to own the test Amenity
		$this->profile = new Profile(null, "@phpunit", "test@phpunit.de", "+12125551212");
		$this->profile->insert($this->getPDO());

		// calculate the date (just use the time the unit test was setup...)
		$this->VALID_AMENITYDATE = new \DateTime();
	}
}