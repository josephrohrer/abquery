<?php
namespace Edu\Cnm\Abquery\Test;

use Edu\Cnm\Abquery\Feature;
use Edu\Cnm\Abquery\Test\{Amenity};

// grab the project test parameters
require_once("AbqueryTest.php");

// grab the class under scrutiny
require_once(dirname(__DIR__) . "/autoload.php");

/**
 * Full PHPUnit test for the Feature class
 *
 * This is a complete PHPUnit test of the Feature class. It is complete because *ALL* mySQL/PDO enabled methods are tested for both invalid and valid inputs.
 * @see Tweet example
 * @author Benjamin Smith <bsmtih@cnm.edu>
 **/

class FeatureTest extends AbqueryTest {
	/**
	 * name of the Feature
	 * @var string $VALID_FEATURENAME
	 **/
	protected $VALID_FEATURENAME = "You have unlocked features. Features are a park of a park that is variable and draws attraction";
	/**
	 * amenity id of the Feature
	 * @var string $VALID_FEATUREAMENITYID
	 **/
	protected $VALID_FEATUREAMENITYID = "You have unlocked features. Features are a park of a park that is variable and draws attraction";

	/**
	 * test inserting a valid Feature and verify that the actual mySQL data matches
	 **/
	public function testInsertValidFeature() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("feature");

		// create a new Feature and insert it into mySQL
		$feature = new Feature(null, $this->VALID_FEATURENAME, $this->VALID_FEATUREAMENITYID);
		$feature->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoFeature = Feature::getFeatureByFeatureAmenityId($this->getPDO(), $feature->getFeatureAmenityIdId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("feature"));
	}
	/**
	 * test inserting an Amenity that already exists
	 *
	 * @expectedException PDOException
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
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\Abquery\\DataDesign\\Amenity", $results);

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
		$numRows = $this->getConnection()->getRowCount("amenities");

		// create a new Amenity and insert to into mySQL
		$amenity = new Amenity(null, $this->VALID_AMENITYNAME, $this->VALID_AMENITYCITYNAME);
		$amenity->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$results = Amenity::getAllAmenities($this->getPDO());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("amenity"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\Abquery\\DataDesign\\Amenity", $results);

		// grab the result from the array and validate it
		$pdoAmenity = $results[0];
		$this->assertEquals($pdoAmenity->getAmenityName(), $this->VALID_AMENITYNAME);
		$this->assertEquals($pdoAmenity->getAmenityCityName(), $this->VALID_AMENITYCITYNAME);
	}
}