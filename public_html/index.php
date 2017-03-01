<?php
if(session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<base href="<?php echo dirname($_SERVER["PHP_SELF"]) . "/"; ?>" />

		<title>ABQuery</title>
	<link href="dist/vendor.affdd2bbe1484c331d01.css" rel="stylesheet"><link href="dist/css.affdd2bbe1484c331d01.css" rel="stylesheet"><script type="text/javascript" src="dist/polyfills.affdd2bbe1484c331d01.js"></script><script type="text/javascript" src="dist/vendor.affdd2bbe1484c331d01.js"></script><script type="text/javascript" src="dist/app.affdd2bbe1484c331d01.js"></script><script type="text/javascript" src="dist/css.affdd2bbe1484c331d01.js"></script></head>
	<body>
		<!-- This custom tag much match your Angular @Component selector name in app/app.component.ts -->
		<abquery>Loading&hellip;</abquery>
	</body>
</html>