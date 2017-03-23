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
		<link rel="icon" href="images/favicon.ico">
		<base href="/" />

		<title>ABQuery</title>
	<link href="dist/vendor.6afcf492f125c5cf1276.css" rel="stylesheet"><link href="dist/css.6afcf492f125c5cf1276.css" rel="stylesheet"><script type="text/javascript" src="dist/polyfills.6afcf492f125c5cf1276.js"></script><script type="text/javascript" src="dist/vendor.6afcf492f125c5cf1276.js"></script><script type="text/javascript" src="dist/app.6afcf492f125c5cf1276.js"></script><script type="text/javascript" src="dist/css.6afcf492f125c5cf1276.js"></script></head>
	<body class="sfooter">
		<!-- This custom tag much match your Angular @Component selector name in app/app.component.ts -->
		<abquery>Loading&hellip;</abquery>
	</body>
</html>