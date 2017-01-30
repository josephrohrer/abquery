<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>Conceptual Model</title>
	</head>
	<body>
		<h1>Conceptual Model</h1>
		<h2>Entities & Attributes</h2>
		<h3>Crime</h3>
		<ul>
			<li>crimeObjectId(Primary Key)</li>
			<li>crimeLocation</li>
			<li>crimeDescription(Ghost Entity)</li>
			<li>crimeGeometry</li>
			<li>crimeDate</li>
		</ul>
		<h3>Parks</h3>
		<ul>
			<li>parkObjectId(Primary Key)</li>
			<li>parkName</li>
			<li>parkGeometry</li>
			<li>parkDeveloped</li>
		</ul>
		<h3>Amenities</h3>
		<ul>
			<li>amenityId</li>
			<li>amenityCityName</li>
			<li>amenityName</li>
		</ul>
		<h3>Amenity Park</h3>
		<ul>
			<li>amenityParkAmenityId</li>
			<li>amenityParkParkId</li>
			<li>amenityParkValue</li>
		</ul>
		<h2>ERD</h2>
		<img src="../images/erd.jpg" alt="ERD"/>
	</body>
</html>