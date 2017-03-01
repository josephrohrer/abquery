<?php
require_once("/etc/apache2/data-design/encrypted-config.php");

$config = readConfig("/etc/apache2/capstone-mysql/abquery.ini");

$etags = new stdClass();
$etags->crime = 0;
$etags->park = 0;

$config["etags"] = json_encode($etags);

writeConfig($config, "/etc/apache2/capstone-mysql/abquery.ini");