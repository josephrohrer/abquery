<?php

/**
 * Classes for the Park entity
 *
 * These are the classes for the park entity including the accessor and mutator methods
 *
 * @author Joseph Rohrer <jrohrer@cnm.edu>
 *
 **/
class Park implements \JsonSerializable {
	/**
	 * id for each park as provided by ABQ city data; this is the primary key
	 * @var int $parkId
	 **/
	private $parkId;
	/**
	 * name of each park as provided by ABQ city data
	 * @var string $parkName
	 **/
	private $parkName;
	/**
	 * spatial coordinates that are used to put a center of the park on a map
	 * @var point $parkGeometry
	 **/
	private $parkGeometry;
	/**
	 * boolean that will determine if park area is developed or undeveloped
	 * @var boolean $parkDeveloped
	 **/
	private $parkDeveloped;

}