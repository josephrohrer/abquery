<?php
namespace Edu\Cnm\Abquery\Test;

use Edu\Cnm\Abquery\{Crime, Point};

require_once("AbqueryTest.php");

require_once(dirname(__DIR__) . "/autoload.php");

/**
 * Full PHPUnit test for the Crime class
 *
 * This is a complete PHPUnit test of the Crime class. It is complete because *ALL* mySQL/PDO enabled methods are tested for both invalid and valid inputs.
 *
 * @see Crime
 * @author Brett Gilbert <bgilbert9.cnm.edu>
 */
class CrimeTest extends AbqueryTest {
	/**
	 * valid calue of crime id
	 * @var int $VALID_CRIMEID
	 */
	protected $VALID_CRIMEID = 42;
	/**
	 * content of crime location
	 * @var string $VALID_CRIMELOCATION
	 */
	protected $VALID_CRIMELOCATION = "crime location test passing";
	/**
	 * content of the crime geometry
	 * @var Point $VALID_CRIMEGEOMETRY
	 */
	protected $VALID_CRIMEGEOMETRY = null;
	/**
	 * content of the crime description
	 * @var string $VALID_CRIMEDESCRIPTION
	 */
	protected $VALID_CRIMEDESCRIPTION = "crime description test passing";
	/**
	 * timestamp of the crime sunrise date
	 * @var \DateTime $VALID_CRIMESUNRISEDATE
	 */
	protected $VALID_CRIMESUNRISEDATE = null;
	/**
	 * timestamp of the crime
	 * @var \DateTime $VALID_CRIMEDATE
	 */
	protected $VALID_CRIMEDATE = null;
	/**
	 * timestamp of the crime sunset date
	 * @var \DateTime $VALID_CRIMESUNSETDATE
	 */
	protected $VALID_CRIMESUNSETDATE = null;
	/**
	 * user input address
	 * @var Point $VALID_USERLOCATION
	 */
	protected $VALID_USERLOCATION = null;
	/**
	 * invalid user input address
	 * @var Point $INVALID_USERLOCATION
	 */
	protected $INVALID_CRIMEGEOMETRY = null;
	/**
	 * distance computed from user
	 * @var int distance in miles
	 */
	protected $VALID_USERDISTANCE = null;


	/**
	 * create dependant objects before running each test
	 */
	public final function setUp() {
		parent::setUp();

		$this->VALID_CRIMEGEOMETRY = new Point(-106.626815, 35.081375);
		$this->INVALID_CRIMEGEOMETRY = new Point(-105.954073, 35.690733);

		$this->VALID_CRIMESUNRISEDATE = new \DateTime();
		$this->VALID_CRIMESUNRISEDATE->sub(new \DateInterval("P10D"));

		$this->VALID_CRIMEDATE = new \DateTime();

		$this->VALID_CRIMESUNSETDATE = new \DateTime();
		$this->VALID_CRIMESUNSETDATE->add(new \DateInterval("P10D"));

		$this->VALID_USERLOCATION = new Point( -106.613138, 35.087466);
		$this->VALID_USERDISTANCE = 5;
	}


	/**
	 * test inserting a valid Crime and verify that the actual mySQL data matches
	 **/
	public function testInsertValidCrime() {
		$numRows = $this->getConnection()->getRowCount("crime");

		$crime = new Crime($this->VALID_CRIMEID, $this->VALID_CRIMELOCATION, $this->VALID_CRIMEGEOMETRY, $this->VALID_CRIMEDESCRIPTION, $this->VALID_CRIMEDATE);
		$crime->insert($this->getPDO());

		$pdoCrime = Crime::getCrimeByCrimeId($this->getPDO(), $crime->getCrimeId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("crime"));
		$this->assertEquals($pdoCrime->getCrimeLocation(), $this->VALID_CRIMELOCATION);
		$this->assertEquals($pdoCrime->getCrimeGeometry(), $this->VALID_CRIMEGEOMETRY);
		$this->assertEquals($pdoCrime->getCrimeDescription(), $this->VALID_CRIMEDESCRIPTION);
		$this->assertEquals($pdoCrime->getCrimeDate(), $this->VALID_CRIMEDATE);
	}


	/**
	 * test inserting a crime that already exists
	 *
	 * @expectedException \PDOException
	 */
	public function testInsertInvalidCrime() {
		$crime = new Crime(AbqueryTest::INVALID_KEY, $this->VALID_CRIMELOCATION, $this->VALID_CRIMEGEOMETRY, $this->VALID_CRIMEDESCRIPTION,  $this->VALID_CRIMEDATE);
		$crime->insert($this->getPDO());
	}


	/**
	 * test grabbing a crime by crime location
	 */
	public function testGetValidCrimeByCrimeLocation() {
		$numRows = $this->getConnection()->getRowCount("crime");

		$crime = new Crime($this->VALID_CRIMEID, $this->VALID_CRIMELOCATION, $this->VALID_CRIMEGEOMETRY, $this->VALID_CRIMEDESCRIPTION, $this->VALID_CRIMEDATE);
		$crime->insert($this->getPDO());

		$results = Crime::getCrimeByCrimeLocation($this->getPDO(), $crime->getCrimeLocation());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("crime"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\Abquery\\Crime", $results);

		$pdoCrime = $results[0];
		$this->assertEquals($pdoCrime->getCrimeId(), $this->VALID_CRIMEID);
		$this->assertEquals($pdoCrime->getCrimeLocation(), $this->VALID_CRIMELOCATION);
		$this->assertEquals($pdoCrime->getcrimeGeometry(), $this->VALID_CRIMEGEOMETRY);
		$this->assertEquals($pdoCrime->getCrimeDescription(), $this->VALID_CRIMEDESCRIPTION);
		$this->assertEquals($pdoCrime->getCrimeDate(), $this->VALID_CRIMEDATE);
	}


	/**
	 * test grabbing a crime by a location that does not exist
	 */
	public function testGetInvalidCrimeByCrimeLocation() {
		$crime = Crime::getCrimeByCrimeLocation($this->getPDO(), "wabba lubba dub dub, there's nothing here for crime location, Morty!");
		$this->assertCount(0, $crime);
	}


	/**
	 * test getting crime by crime geometry
	 */
	public function testGetCrimeByCrimeGeometry () {
		$numRows = $this->getConnection()->getRowCount("crime");
		$crime = new Crime($this->VALID_CRIMEID, $this->VALID_CRIMELOCATION, $this->VALID_CRIMEGEOMETRY, $this->VALID_CRIMEDESCRIPTION, $this->VALID_CRIMEDATE);
		$crime->insert($this->getPDO());
		$results = Crime::getCrimeByCrimeGeometry($this->getPDO(), $this->VALID_USERLOCATION, 5);
		foreach($results as $crime) {
			$this->assertEquals($crime->getCrimeGeometry()->getLongitude(), $this->VALID_CRIMEGEOMETRY->getLongitude(), '', 0.1);
			$this->assertEquals($crime->getCrimeGeometry()->getLatitude(), $this->VALID_CRIMEGEOMETRY->getLatitude(), '', 0.1);
		}
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("crime"));
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\Abquery\\Crime", $results);
	}


	/**
	 * test getting crimes that are too far
	 */
	public function testGetInvalidCrimeByCrimeGeometry () {
		$numRows = $this->getConnection()->getRowCount("crime");
		$crime = new Crime($this->VALID_CRIMEID, $this->VALID_CRIMELOCATION, $this->INVALID_CRIMEGEOMETRY, $this->VALID_CRIMEDESCRIPTION, $this->VALID_CRIMEDATE);
		$crime->insert($this->getPDO());
		$results = Crime::getCrimeByCrimeGeometry($this->getPDO(), $this->VALID_USERLOCATION, $this->VALID_USERDISTANCE);
		$this->assertEmpty($results);
	}


	/**
	 * test grabbing a crime by crime description
	 */
	public function testGetValidCrimeByCrimeDescription() {
		$numRows = $this->getConnection()->getRowCount("crime");

		$crime = new Crime($this->VALID_CRIMEID, $this->VALID_CRIMELOCATION, $this->VALID_CRIMEGEOMETRY, $this->VALID_CRIMEDESCRIPTION, $this->VALID_CRIMEDATE);
		$crime->insert($this->getPDO());

		$results = Crime::getCrimeByCrimeDescription($this->getPDO(), $crime->getCrimeDescription());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("crime"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\Abquery\\Crime", $results);

		$pdoCrime = $results[0];
		$this->assertEquals($pdoCrime->getCrimeId(), $this->VALID_CRIMEID);
		$this->assertEquals($pdoCrime->getCrimeLocation(), $this->VALID_CRIMELOCATION);
		$this->assertEquals($pdoCrime->getcrimeGeometry(), $this->VALID_CRIMEGEOMETRY);
		$this->assertEquals($pdoCrime->getCrimeDescription(), $this->VALID_CRIMEDESCRIPTION);
		$this->assertEquals($pdoCrime->getCrimeDate(), $this->VALID_CRIMEDATE);
	}


	/**
	 * test grabbing a crime by a description that does not exist
	 */
	public function testGetInvalidCrimeByCrimeDescription() {
		$crime = Crime::getCrimeByCrimeDescription($this->getPDO(), "wabba lubba dub dub, there's nothing here for crime description, Morty!");
		$this->assertCount(0, $crime);
	}


	/**
	 * test grabbing a crime by crime date
	 */
	public function testGetValidCrimeByCrimeDate() {
		$numRows = $this->getConnection()->getRowCount("crime");

		$crime = new Crime($this->VALID_CRIMEID, $this->VALID_CRIMELOCATION, $this->VALID_CRIMEGEOMETRY, $this->VALID_CRIMEDESCRIPTION, $this->VALID_CRIMEDATE);
		$crime->insert($this->getPDO());

		$results = Crime::getCrimeByCrimeDate($this->getPDO(), $this->VALID_CRIMESUNRISEDATE, $this->VALID_CRIMESUNSETDATE);
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("crime"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\Abquery\\Crime", $results);

		$pdoCrime = $results[0];
		$this->assertEquals($pdoCrime->getCrimeId(), $this->VALID_CRIMEID);
		$this->assertEquals($pdoCrime->getCrimeLocation(), $this->VALID_CRIMELOCATION);
		$this->assertEquals($pdoCrime->getcrimeGeometry(), $this->VALID_CRIMEGEOMETRY);
		$this->assertEquals($pdoCrime->getCrimeDescription(), $this->VALID_CRIMEDESCRIPTION);
		$this->assertEquals($pdoCrime->getCrimeDate(), $this->VALID_CRIMEDATE);
	}


	/**
	 * test grabbing a crime by a date that does not exist
	 */
	public function testGetInvalidCrimeByCrimeDate() {
		$crime = Crime::getCrimeByCrimeDate($this->getPDO(), "1969-12-31 12:00:00", "1970-01-01 12:00:00");
		$this->assertCount(0, $crime);
	}


	/**
	 * test grabbing all crimes
	 **/
	public function testGetAllValidCrimes() {
		$numRows = $this->getConnection()->getRowCount("crime");

		$crime = new Crime($this->VALID_CRIMEID, $this->VALID_CRIMELOCATION, $this->VALID_CRIMEGEOMETRY, $this->VALID_CRIMEDESCRIPTION, $this->VALID_CRIMEDATE);
		$crime->insert($this->getPDO());

		$results = Crime::getAllCrimes($this->getPDO());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("crime"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\Abquery\\Crime", $results);

		$pdoCrime = $results[0];
		$this->assertEquals($pdoCrime->getCrimeId(), $this->VALID_CRIMEID);
		$this->assertEquals($pdoCrime->getCrimeLocation(), $this->VALID_CRIMELOCATION);
		$this->assertEquals($pdoCrime->getcrimeGeometry(), $this->VALID_CRIMEGEOMETRY);
		$this->assertEquals($pdoCrime->getCrimeDescription(), $this->VALID_CRIMEDESCRIPTION);
		$this->assertEquals($pdoCrime->getCrimeDate(), $this->VALID_CRIMEDATE);
	}
}