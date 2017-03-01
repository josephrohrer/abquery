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