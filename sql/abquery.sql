DROP TABLE IF EXISTS feature;
DROP TABLE IF EXISTS amenity;
DROP TABLE IF EXISTS park;
DROP TABLE IF EXISTS crime;

-- create the crime entity --
CREATE TABLE crime (
	crimeId          INT UNSIGNED NOT NULL,
	crimeLocation    VARCHAR(72)  NOT NULL,
	crimeGeometry    POINT        NOT NULL,
	crimeDescription VARCHAR(255) NOT NULL,
	crimeDate        DATETIME,
	UNIQUE (crimeId),
	PRIMARY KEY (crimeId)
);

-- create the park entity --
CREATE TABLE park (
	parkId        INT UNSIGNED NOT NULL,
	parkName      VARCHAR(60)  NOT NULL,
	parkGeometry  POINT        NOT NULL,
	parkDeveloped TINYINT UNSIGNED,
	UNIQUE (parkId),
	PRIMARY KEY (parkId)
);

-- creates the amenity entity --
CREATE TABLE amenity (
	amenityId       INT UNSIGNED AUTO_INCREMENT NOT NULL,
	amenityCityName VARCHAR(32)                 NOT NULL,
	amenityName     VARCHAR(32)                 NOT NULL,
	UNIQUE (amenityId),
	PRIMARY KEY (amenityId)
);

-- creates the feature entity weak entity --
CREATE TABLE feature (
	featureAmenityId INT UNSIGNED NOT NULL,
	featureParkId    INT UNSIGNED NOT NULL,
	featureValue     INT UNSIGNED,
	INDEX (featureAmenityId),
	INDEX (featureParkId),
	FOREIGN KEY (featureAmenityId) REFERENCES amenity (amenityId),
	FOREIGN KEY (featureParkId) REFERENCES park (parkId),
	PRIMARY KEY (featureAmenityId, featureParkId)
);

INSERT INTO amenity (amenityCityName, amenityName) VALUES ("LITTENNISCOURTS", "Tennis Courts - Lit");
INSERT INTO amenity (amenityCityName, amenityName) VALUES ("UNLITTENNISCOURTS", "Tennis Courts - Unlit");
INSERT INTO amenity (amenityCityName, amenityName) VALUES ("PLAYAREAS", "Play Areas");
INSERT INTO amenity (amenityCityName, amenityName) VALUES ("FULLBASKETBALLCOURTS", "Basketball Courts - Full");
INSERT INTO amenity (amenityCityName, amenityName) VALUES ("HALFBASKETBALLCOURTS", "Basketball Courts - Half");
INSERT INTO amenity (amenityCityName, amenityName) VALUES ("SOCCERFIELDS", "Soccer Fields");
INSERT INTO amenity (amenityCityName, amenityName) VALUES ("LITSOFTBALLFIELDS", "Softball Fields - Lit");
INSERT INTO amenity (amenityCityName, amenityName) VALUES ("UNLITSOFTBALLFIELDS", "Softball Fields - Unlit");
INSERT INTO amenity (amenityCityName, amenityName) VALUES ("YOUTHBALLFIELDS", "Baseball Fields - Youth");
INSERT INTO amenity (amenityCityName, amenityName) VALUES ("INDOORPOOLS", "Pools - Indoor");
INSERT INTO amenity (amenityCityName, amenityName) VALUES ("OUTDOORPOOLS", "Pools - Outdoor");
INSERT INTO amenity (amenityCityName, amenityName) VALUES ("HORSESHOEPITS", "Horseshoe Pits");
INSERT INTO amenity (amenityCityName, amenityName) VALUES ("VOLLEYBALLCOURTS", "Volleyball Courts");
INSERT INTO amenity (amenityCityName, amenityName) VALUES ("BACKSTOPS", "Baseball - Backstops");
INSERT INTO amenity (amenityCityName, amenityName) VALUES ("PICNICTABLES", "Picnic Tables");
INSERT INTO amenity (amenityCityName, amenityName) VALUES ("SHADESTRUCTURES", "Shade Structures");
INSERT INTO amenity (amenityCityName, amenityName) VALUES ("PARKINGSPACES", "Parking Spaces");
INSERT INTO amenity (amenityCityName, amenityName) VALUES ("JOGGINGPATHS", "Jogging Paths");

-- this stored procedure was written by Brett Gilbert and Ben Smtih.
-- with guidance and mathematics/statistics help from Dylan McDonald and Sprout Swap. @dylan-mcdonald

DROP PROCEDURE IF EXISTS getCrimesByCrimeLocation;
DELIMITER $$
CREATE PROCEDURE getCrimesByCrimeLocation(IN userLocation POINT, IN userDistance FLOAT) #does userLocation and distance need to be specified between the methods?
	BEGIN
		DECLARE varCrimeId INT UNSIGNED;
		DECLARE varCrimeLocation VARCHAR(72);
		DECLARE varCrimeGeometry POINT;
		DECLARE varCrimeDescription VARCHAR(255);
		DECLARE varCrimeDate DATETIME;
		DECLARE varCrimeDistance FLOAT;

		DECLARE done BOOLEAN DEFAULT FALSE;
		DECLARE crimeCursor CURSOR FOR
			SELECT
				crimeId,
				crimeLocation,
				crimeGeometry,
				crimeDescription,
				crimeDate
			FROM crime;
		DECLARE CONTINUE HANDLER FOR NOT FOUND
		SET done = TRUE;

		DROP TEMPORARY TABLE IF EXISTS selectedCrime;
		CREATE TEMPORARY TABLE selectedCrime (
			crimeId          INT UNSIGNED NOT NULL,
			crimeLocation    VARCHAR(72)  NOT NULL,
			crimeGeometry    POINT        NOT NULL,
			crimeDescription VARCHAR(255) NOT NULL,
			crimeDate        DATETIME,
			crimeDistance    FLOAT
		);
		OPEN crimeCursor; -- open cursor
		crimeLoop : LOOP

			FETCH crimeCursor
			INTO
				crimeId,
				crimeLocation,
				crimeGeometry,
				crimeDescription,
				crimeDate;

			SET varCrimeDistance = haversine(varCrimeDistance, userLocation);
			INSERT INTO selectedCrime (crimeId, crimeLocation, crimeGeometryX, crimeGeometryY, crimeDescription, crimeDate, crimeDistance)
			VALUES (varCrimeId, varCrimeLocation, ST_X(varCrimeGeometry), ST_Y(varCrimeGeometry), varCrimeDescription, varCrimeDate, varCrimeDistance);


			IF done
			THEN LEAVE crimeLoop; -- leaves rows
			END IF;
		END LOOP crimeLoop;
		CLOSE crimeCursor;

		SELECT
			crimeId,
			crimeLocation,
			crimeGeometryX,
			crimeGeometryY,
			crimeDescription,
			crimeDate,
			crimeDistance
		FROM selectedCrime
		WHERE crimeDistance <= userDistance
		ORDER BY crimeDistance;

	END $$
DELIMITER ;



-- Repeated for parks


DROP PROCEDURE IF EXISTS getParksByParkLocation;
DELIMITER $$
CREATE PROCEDURE getParksByParkLocation(IN userLocation POINT, IN userDistance FLOAT)
	BEGIN
		DECLARE varParkId INT UNSIGNED;
		DECLARE varParkName VARCHAR(60);
		DECLARE varParkGeometry POINT;
		DECLARE varParkDeveloped TINYINT;
		DECLARE varParkDistance FLOAT;

		DECLARE done BOOLEAN DEFAULT FALSE;
		DECLARE parkCursor CURSOR FOR
			SELECT
				parkId,
				parkName,
				parkGeometry,
				parkDeveloped
			FROM park;
		DECLARE CONTINUE HANDLER FOR NOT FOUND
		SET done = TRUE;

		DROP TEMPORARY TABLE IF EXISTS selectedPark;
		CREATE TEMPORARY TABLE selectedPark (
			parkId        INT UNSIGNED NOT NULL,
			parkName      VARCHAR(60)  NOT NULL,
			parkGeometry  POINT        NOT NULL,
			parkDeveloped TINYINT UNSIGNED,
			parkDistance  FLOAT
		);
		OPEN parkCursor; -- open cursor
		parkLoop : LOOP

			FETCH parkCursor
			INTO
				parkId,
				parkName,
				parkGeometry,
				parkDeveloped;


			SET varParkDistance = haversine(varParkDistance, userLocation);
			INSERT INTO selectedPark (parkId, parkName, parkGeometryX, parkGeometryY, parkDeveloped, parkDistance)
			VALUES(varParkId, varParkName, ST_X(varParkGeometry), ST_Y(varParkGeometry), varParkDeveloped, varParkDistance);


			IF done
			THEN LEAVE parkLoop; -- leaves rows
			END IF;
		END LOOP parkLoop;
		CLOSE parkCursor;

		SELECT
			parkId,
			parkName,
			parkGeometryX,
			parkGeometryY,
			parkDeveloped,
			parkDistance
		FROM selectedPark
		WHERE parkDistance <= userDistance
		ORDER BY parkDistance;

	END $$
DELIMITER ;