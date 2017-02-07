<?php
namespace Edu\Cnm\Abquery\Test;

use Edu\Cnm\Abquery\{Crime};

require_once("AbqueryTest.php");

require_once(dirname(__DIR__) . "/autoload.php");

/**
 * Full PHPUnit test for the Crime class
 *
 * This is a complete PHPUnit test of the Tweet class. It is complete because *ALL* mySQL/PDO enabled methods are tested for both invalid and valid inputs.
 *
 * @see Crime
 * @author Brett Gilbert <bgilbert9.cnm.edu>
 */
class CrimeTest extends AbqueryTest {
	/**
	 * content of crime location
	 * @var string $VALID_CRIMELOCATION
	 */
	protected $VALID_CRIMELOCATION = "GOOD NEWS EVERYONE!!! PHPUnit crime location test passing";
	/**
	 * content of the crime description
	 * @var string $VALID_CRIMEDESCRIPTION
	 */
	protected $VALID_CRIMEDESCRIPTION = "GOOD NEWS EVERYONE!!! PHPUnit crime description test passing";
	/**
	 * timestamp of the crime
	 * @var \DateTime $VALID_CRIMEDATE
	 */
	protected $VALID_CRIMEDATE = "GOOD NEWS EVERYONE!!! PHPUnit crime date test passing";


	/**
	 * test inserting a valid Amenity and verify that the actual mySQL data matches
	 **/
	public function testInsertValidCrime() {
		$numRows = $this->getConnection()->getRowCount("crime");

		$crime = new Crime(null, $this->VALID_CRIMEDESCRIPTION, $this->VALID_CRIMELOCATION, $this->VALID_CRIMEDATE);
		$crime->insert($this->getPDO());

		$pdoCrime = Crime::getCrimeByCrimeId($this->getPDO(), $crime->getCrimeId());
		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("crime"));
	}


	/**
	 * test inserting a crime that already exists
	 *
	 * @expectedException \PDOException
	 */
	public function testInsertInvalicCrime() {
		$crime = new Crime(AbqueryTest::INVALID_KEY, $this->VALID_CRIMELOCATION, $this->VALID_CRIMEDESCRIPTION, $this->VALID_CRIMEDATE);
		$crime->insert($this->getPDO());
	}


	/**
	 * test grabbing a crime by crime location
	 */









}