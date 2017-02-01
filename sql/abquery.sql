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
	FOREIGN KEY (featureAmenityId) REFERENCES amenity (amenityId),
	INDEX (featureParkId),
	FOREIGN KEY (featureParkId) REFERENCES park (parkId)
);