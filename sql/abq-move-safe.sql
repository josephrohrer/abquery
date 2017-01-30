-- create the crime entity --
CREATE TABLE crime (
	crimeObjectId    INT UNSIGNED NOT NULL,
	crimeLocation    VARCHAR(72)  NOT NULL,
	crimeGeometry    POINT        NOT NULL,
	crimeDescription VARCHAR(255) NOT NULL,
	crimeDate        DATETIME,
	UNIQUE (crimeObjectId),
	PRIMARY KEY (crimeObjectId)
);

-- create the park entity --
CREATE TABLE park (
	parkObjectId  INT UNSIGNED NOT NULL,
	parkName      VARCHAR(60)  NOT NULL,
	parkGeometry  POINT        NOT NULL,
	parkDeveloped BOOLEAN,
	UNIQUE (parkObjectId),
	PRIMARY KEY (parkObjectId)
);

-- creates the amenity entity --
CREATE TABLE amenity (
	amenityId       INT UNSIGNED AUTO_INCREMENT NOT NULL,
	amenityCityName VARCHAR(32)                 NOT NULL,
	amenityName     VARCHAR(32)                 NOT NULL,
	UNIQUE (amenityId),
	PRIMARY KEY (amenityId)
);

-- creates the amenityPark weak attribute --
CREATE TABLE amenityPark (
	amenityParkAmenityId    INT UNSIGNED NOT NULL,
	amenityParkParkObjectId INT UNSIGNED NOT NULL,
	amenityParkValue        INT UNSIGNED,
	INDEX (amenityParkAmenityId),
	FOREIGN KEY (amenityParkAmenityId) REFERENCES amenity (amenityId),
	INDEX (amenityParkParkObjectId),
	FOREIGN KEY (amenityParkParkObjectId) REFERENCES park (parkObjectId)
);