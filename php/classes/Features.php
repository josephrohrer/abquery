<?php
/**
 * Classes for the Features entity
 *
 * These are the classes for the Features entity including the accessor and mutator methods
 *
 * @author bsmtih@cnm.edu
 **/
class Features implements \JsonSerializable {
	/**
	 * @var int $featureAmenityId
	 * Foreign key for the feature to amenity relationship
	 */
	private $featureAmenityId;
	/**
	 * @var int $featureParkId
	 * Foreign key for the feature to park relationship
	 */
	private $featureParkId;
	/**
	 * @var
	 */
}