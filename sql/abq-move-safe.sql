-- create the crime entitiy --
CREATE TABLE crime (
	crimeObjectId    INT UNSIGNED NOT NULL,
	crimeLocation    VARCHAR(72)  NOT NULL,
	crimeDescription VARCHAR(255) NOT NULL,
	crimeDate        DATETIME,
	UNIQUE (crimeObjectId),
	PRIMARY KEY (crimeObjectId)
);

-- create the parks entity --
CREATE TABLE parks (
	parkObjectId             INT UNSIGNED NOT NULL,
	parkName                 VARCHAR(60)  NOT NULL,
	parkLitTennisCourts      INT UNSIGNED,
	parkAcres                INT UNSIGNED,
	parkUnlitTennisCourts    INT UNSIGNED,
	parkPlayAreas            INT UNSIGNED,
	parkFullBasketballCourts INT UNSIGNED,
	parkHalfBasketballCourts INT UNSIGNED,
	parkHalfBasketballCourts INT UNSIGNED,
	parkSoccerFields         INT UNSIGNED,
	parkLitSoftballFields    INT UNSIGNED,
	parkUnlitSoftballFields  INT UNSIGNED,
	parkYouthBallFields      INT UNSIGNED,
	parkIndoorPools          INT UNSIGNED,
	parkOutdoorPools         INT UNSIGNED,
	parkHorseshoePits        INT UNSIGNED,
	parkVolleyballCourts     INT UNSIGNED,
	parkBackstops            INT UNSIGNED,
	parkPicnicTables         INT UNSIGNED,
	parkShadeStructures      INT UNSIGNED,
	parkParkingSpaces        INT UNSIGNED,
	parkJoggingPaths         INT UNSIGNED,
	UNIQUE (parkObjectId),
	PRIMARY KEY (parkObjectId)
);
