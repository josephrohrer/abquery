<?php
namespace Edu\Cnm\Abquery\Test;

use Edu\Cnm\Abquery\{Amenity};

// grab the project test parameters
require_once("AbqueryTest.php");

// grab the class under scrutiny
require_once(dirname(__DIR__) . "/autoload.php");

/**
 * Full PHPUnit test for the Amenity class
 *
 * This is a complete PHPUnit test of the Amenity class. It is complete because *ALL* mySQL/PDO enabled methods are tested for both invalid and valid inputs.
 * @see Tweet example
 * @author Jennifer Quay Minnich <jminnich@cnm.edu>
 **/

class AmenityTest extends AbqueryTest {
	/**
	 * name of the Amenity
	 * @var string $VALID_AMENITYNAME
	 **/
	protected $VALID_AMENITYNAME = "anemone";
	/**
	 * city name of the Amenity
	 * @var string $VALID_AMENITYCITYNAME
	 **/
	protected $VALID_AMENITYCITYNAME = "anemone";

	/**
	 * test inserting a valid Amenity and verify that the actual mySQL data matches
	 **/
	public function testInsertValidAmenity() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("amenity");

		// create a new Amenity and insert it into mySQL
		$amenity = new Amenity(null, $this->VALID_AMENITYNAME, $this->VALID_AMENITYCITYNAME);
		$amenity->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoAmenity = Amenity::getAmenityByAmenityId($this->getPDO(), $amenity->getAmenityId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("amenity"));
	}
	/**
	 * test inserting an Amenity that already exists
	 *
	 * @expectedException RangeException
	 **/
	public function testInsertInvalidAmenity() {
		// create an Amenity with a non null amenity id and watch it fail
		$amenity = new Amenity(AbqueryTest::INVALID_KEY, $this->VALID_AMENITYNAME, $this->VALID_AMENITYCITYNAME);
		$amenity->insert($this->getPDO());
	}
	/**
	 * test grabbing an Amenity by amenity name
	 **/
	public function testGetValidAmenityByAmenityName() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("amenity");

		// create a new Amenity and insert it into mySQL
		$amenity = new Amenity(null, $this->VALID_AMENITYNAME, $this->VALID_AMENITYCITYNAME);
		$amenity->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$results = Amenity::getAmenityByAmenityName($this->getPDO(), $amenity->getAmenityName());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("amenity"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\Abquery\\Amenity", $results);

		// grab the result from the array and validate it
		$pdoAmenity = $results[0];
		$this->assertEquals($pdoAmenity->getAmenityName(), $this->VALID_AMENITYNAME);
		$this->assertEquals($pdoAmenity->getAmenityCityName(), $this->VALID_AMENITYCITYNAME);
	}
	/**
	 * test grabbing an Amenity by a name that does not exist
	 **/
	public function testGetInvalidAmenityByAmenityName() {
		// grab an amenity by searching for a name that does not exist
		$amenity = Amenity::getAmenityByAmenityName($this->getPDO(), "you will find nothing");
		$this->assertCount(0, $amenity);
	}
	/**
	 * test grabbing all Amenities
	 **/
	public function testGetAllValidAmenities() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("amenity");

		// create a new Amenity and insert to into mySQL
		$amenity = new Amenity(null, $this->VALID_AMENITYNAME, $this->VALID_AMENITYCITYNAME);
		$amenity->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$results = Amenity::getAllAmenities($this->getPDO());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("amenity"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\Abquery\\Amenity", $results);

		// grab the result from the array and validate it
		$pdoAmenity = $results[0];
		$this->assertEquals($pdoAmenity->getAmenityName(), $this->VALID_AMENITYNAME);
		$this->assertEquals($pdoAmenity->getAmenityCityName(), $this->VALID_AMENITYCITYNAME);
	}
}