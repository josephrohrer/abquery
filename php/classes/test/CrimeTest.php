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
	 * create dependant objects before running each test
	 */
	public final function setUp() {
		parent::setUp();

		$this->VALID_CRIMEGEOMETRY = new Point(-106.69703244562174, 35.10964229145246);

		$this->VALID_CRIMESUNRISEDATE = new \DateTime();
		$this->VALID_CRIMESUNRISEDATE->sub(new \DateInterval("P10D"));

		$this->VALID_CRIMEDATE = new \DateTime();

		$this->VALID_CRIMESUNSETDATE = new \DateTime();
		$this->VALID_CRIMESUNSETDATE->add(new \DateInterval("P10D"));
	}


	/**
	 * test inserting a valid Crime and verify that the actual mySQL data matches
	 **/
	public function testInsertValidCrime() {
		$numRows = $this->getConnection()->getRowCount("crime");

		$crime = new Crime($this->VALID_CRIMEID, $this->VALID_CRIMELOCATION, $this->VALID_CRIMEGEOMETRY, $this->VALID_CRIMEDESCRIPTION, $this->VALID_CRIMEDATE);

		var_dump($crime);

		$crime->insert($this->getPDO());

		$pdoCrime = Crime::getCrimeByCrimeId($this->getPDO(), $crime->getCrimeId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("crime"));
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

		$crime = new Crime($this->VALID_CRIMEID, $this->VALID_CRIMELOCATION, $this->VALID_CRIMEDESCRIPTION, $this->VALID_CRIMEGEOMETRY, $this->VALID_CRIMEDATE);
		$crime->insert($this->getPDO());

		$results = Crime::getCrimeByCrimeLocation($this->getPDO(), $crime->getCrimeLocation());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("crime"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstanceOf("Edu\\Cnm\\Abquery\\Crime", $results);

		$pdoCrime = $results[0];
		$this->assertEquals($pdoCrime->getCrimeId(), $this->VALID_CRIMEID);
		$this->assertEquals($pdoCrime->getCrimeLocation(), $this->VALID_CRIMELOCATION);
		$this->assertEquals($pdoCrime->getCrimeDescription(), $this->VALID_CRIMEDESCRIPTION);
		$this->assertEquals($pdoCrime->getcrimeGeometry(), $this->VALID_CRIMEGEOMETRY);
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
	 * test grabbing a crime by crime description
	 */
	public function testGetValidCrimeByCrimeDescription() {
		$numRows = $this->getConnection()->getRowCount("crime");

		$crime = new Crime($this->VALID_CRIMEID, $this->VALID_CRIMELOCATION, $this->VALID_CRIMEDESCRIPTION, $this->VALID_CRIMEGEOMETRY, $this->VALID_CRIMEDATE);
		$crime->insert($this->getPDO());

		$results = Crime::getCrimeByCrimeDescription($this->getPDO(), $crime->getCrimeDescription());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("crime"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstanceOf("Edu\\Cnm\\Abquery\\Crime", $results);

		$pdoCrime = $results[0];
		$this->assertEquals($pdoCrime->getCrimeId(), $this->VALID_CRIMEID);
		$this->assertEquals($pdoCrime->getCrimeLocation(), $this->VALID_CRIMELOCATION);
		$this->assertEquals($pdoCrime->getCrimeDescription(), $this->VALID_CRIMEDESCRIPTION);
		$this->assertEquals($pdoCrime->getcrimeGeometry(), $this->VALID_CRIMEGEOMETRY);
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

		$crime = new Crime($this->VALID_CRIMEID, $this->VALID_CRIMELOCATION, $this->VALID_CRIMEDESCRIPTION, $this->VALID_CRIMEGEOMETRY, $this->VALID_CRIMEDATE);
		$crime->insert($this->getPDO());

		$results = Crime::getCrimeByCrimeDate($this->getPDO(), $crime->getCrimeDate());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("crime"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstanceOf("Edu\\Cnm\\Abquery\\Crime", $results);

		$pdoCrime = $results[0];
		$this->assertEquals($pdoCrime->getCrimeId(), $this->VALID_CRIMEID);
		$this->assertEquals($pdoCrime->getCrimeLocation(), $this->VALID_CRIMELOCATION);
		$this->assertEquals($pdoCrime->getCrimeDescription(), $this->VALID_CRIMEDESCRIPTION);
		$this->assertEquals($pdoCrime->getcrimeGeometry(), $this->VALID_CRIMEGEOMETRY);
		$this->assertEquals($pdoCrime->getCrimeDate(), $this->VALID_CRIMEDATE);
	}


	/**
	 * test grabbing a crime by a date that does not exist
	 */
	public function testGetInvalidCrimeByCrimeDate() {
		$crime = Crime::getCrimeByCrimeDate($this->getPDO(), "wabba lubba dub dub, there's nothing here for crime date, Morty!");
		$this->assertCount(0, $crime);
	}


	/**
	 * test grabbing all crimes
	 **/
	public function testGetAllValidCrimes() {
		$numRows = $this->getConnection()->getRowCount("crime");

		$crime = new Crime($this->VALID_CRIMEID, $this->VALID_CRIMELOCATION, $this->VALID_CRIMEDESCRIPTION, $this->VALID_CRIMEGEOMETRY, $this->VALID_CRIMEDATE);
		$crime->insert($this->getPDO());

		$results = Crime::getAllCrimes($this->getPDO());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("crime"));
		$this->assertCount(1, $results);
		$this->assertContainsOnlyInstancesOf("Edu\\Cnm\\Abquery\\Crime", $results);

		$pdoCrime = $results[0];
		$this->assertEquals($pdoCrime->getCrimeId(), $this->VALID_CRIMEID);
		$this->assertEquals($pdoCrime->getCrimeLocation(), $this->VALID_CRIMELOCATION);
		$this->assertEquals($pdoCrime->getCrimeDescription(), $this->VALID_CRIMEDESCRIPTION);
		$this->assertEquals($pdoCrime->getcrimeGeometry(), $this->VALID_CRIMEGEOMETRY);
		$this->assertEquals($pdoCrime->getCrimeDate(), $this->VALID_CRIMEDATE);
	}
}