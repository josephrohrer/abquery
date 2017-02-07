<?php
namespace Edu\Cnm\Abquery\Test;

use Edu\Cnm\Abquery\Test\{Park};

// grab the project test parameters
require_once("AbqueryTest.php");

// grab the class under scrutiny
require_once(dirname(__DIR__) . "autoload.php");

/**
 * Full PHPUnit test for the Park class
 *
 * This is a complete PHPUnit test of the Park class. It is complete because *ALL* mySQL/PDO enabled methods are tested for both invalid and valid inputs.
 * @see Tweet example
 * @author Joseph Rohrer <jrohrer@cnm.edu>
 **/

class ParkTest extended AbqueryTest