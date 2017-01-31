<?php
/**
 * Classes for the crime entity
 *
 * These are the classes for the crime entity including the accessor and mutator methods
 *
 * @author bgilbert9@cnm.edu
 */
class Crime implements \JsonSerializable {
	/**
	 * id for each individual crime as provided by the city data, this is a primary key
	 * @var int $crimeId
	 */
	private $crimeId;
	/**
	 * basic block location of the crime as provided by the city data
	 * @var string &crimeLocation
	 */
	private $crimeLocation;
	/**
	 * type of crime comitted i.e. robbery, auto theft, etc. this ia a ghost entity
	 * @var string $crimeDescription
	 */
	private $crimeDescription;
	/**
	 * spatial coordinates that can be used to place the crime on a map
	 * @var point $crimeGeometry
	 */
	private $crimeGeometry;
	/**
	 * the date on which the crime was reported
	 * @var datetime $crimeDate
	 */
	private $crimeDate;


	/**
	 * constructor for the crime entity
	 */


	/**
	 * accessor method for crimeId
	 */


	/**
	 * mutator for crimeId
	 */


	/**
	 * accessor for crimeLocation
	 *
	 * @return string value of crime location content
	 */
	public function getCrimeLocation() {
		return($this->crimeLocation);
	}
	/**
	 * mutator method for crime location
	 *
	 * @param string $newCrimeLocation new value of crime location
	 * @throws \InvalidArgumentException if $newCrimeLocation is insecure
	 * @throws \RangeException
	 */
}