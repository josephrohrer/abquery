<?php
namespace Edu\Cnm\Abquery\Test;

use Edu\Cnm\Abquery\Feature;

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
	 * @var string $VALID_FEATUREVALUE
	 **/
	protected $VALID_FEATUREVALUE = "You have unlocked features. Features are a park of a park that is variable and draws attraction";
	/**
	 * amenity id of the Feature
	 * @var string $VALID_FEATUREAMENITYID
	 **/
	protected $VALID_FEATUREAMENITYID = "You have unlocked features. Features are a park of a park that is variable and draws attraction";
	/**
	 * park id of the feature
	 * @var string $VALID_FEATUREPARKID
	 **/
	protected $VALID_FEATUREPARKID = "You have unlocked features. Features are a park of a park that is variable and draws attraction";

	/**
	 * test inserting a valid Feature and verify that the actual mySQL data matches
	 **/
	public function testInsertValidFeature() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("feature");

		// create a new Feature and insert it into mySQL
		$feature = new Feature(null, $this->VALID_FEATUREVALUE, $this->VALID_FEATUREAMENITYID, $this->VALID_FEATUREPARKID);
		$feature->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$pdoFeature = Feature::getFeatureByFeatureAmenityId($this->getPDO(), $feature->getFeatureAmenityId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("feature"));
	}
	/**
	 * test inserting a feature that already exists
	 *
	 * @expectedException PDOException
	 **/
	public function testInsertInvalidFeatureAmenityId() {
		// create an Feature with a non null feature amenity id and watch it fail
		$amenity = new Feature(AbqueryTest::INVALID_KEY, $this->VALID_FEATUREVALUE, $this->VALID_FEATUREAMENITYID);
		$amenity->insert($this->getPDO());
	}
	/**
	 * test grabbing a Feature by feature park id
	 **/
	public function testGetValidFeatureParkId() {
		// count the number of rows and save it for later
		$numRows = $this->getConnection()->getRowCount("feature");

		// create a new feature and insert it into mySQL
		$feature = new Feature(null, $this->VALID_FEATUREVALUE, $this->VALID_FEATUREPARKID);
		$feature->insert($this->getPDO());

		// grab the data from mySQL and enforce the fields match our expectations
		$results = Feature::getFeatureByFeatureParkId($this->getPDO(), $feature->getFeatureParkId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("feature"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\Abquery\\DataDesign\\Feature", $results);

		// grab the result from the array and validate it
		$pdoFeature = $results[0];
		$this->assertEquals($pdoFeature->getFeatureParkId(), $this->VALID_FEATUREPARKID);
		$this->assertEquals($pdoFeature->getFeatureAmenityId(), $this->VALID_FEATUREAMENITYID);
		$this->assertEquals($pdoFeature->getFeatureValue);
	}
	/**
	 * test grabbing a Feature by an id that does not exist
	 **/
	public function testGetInvalidFeatureByFeatureAmenityId() {
		// grab a feature by searching for a name that does not exist
		$feature = Feature::getFeatureByFeatureAmenityId($this->getPDO(), "you will find nothing");
		$this->assertCount(0, $feature);
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