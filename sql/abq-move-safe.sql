-- create the crime entity --
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
	parkLitTennisCourts      INT UNSIGNED  DEFAULT 0,
	parkAcres                DECIMAL(8, 4) DEFAULT 0.0,
	parkUnlitTennisCourts    INT UNSIGNED  DEFAULT 0,
	parkPlayAreas            INT UNSIGNED  DEFAULT 0,
	parkFullBasketballCourts INT UNSIGNED  DEFAULT 0,
	parkHalfBasketballCourts INT UNSIGNED  DEFAULT 0,
	parkSoccerFields         INT UNSIGNED  DEFAULT 0,
	parkLitSoftballFields    INT UNSIGNED  DEFAULT 0,
	parkUnlitSoftballFields  INT UNSIGNED  DEFAULT 0,
	parkYouthBallFields      INT UNSIGNED  DEFAULT 0,
	parkIndoorPools          INT UNSIGNED  DEFAULT 0,
	parkOutdoorPools         INT UNSIGNED  DEFAULT 0,
	parkHorseshoePits        INT UNSIGNED  DEFAULT 0,
	parkVolleyballCourts     INT UNSIGNED  DEFAULT 0,
	parkBackstops            INT UNSIGNED  DEFAULT 0,
	parkPicnicTables         INT UNSIGNED  DEFAULT 0,
	parkShadeStructures      INT UNSIGNED  DEFAULT 0,
	parkParkingSpaces        INT UNSIGNED  DEFAULT 0,
	parkJoggingPaths         INT UNSIGNED  DEFAULT 0,
	UNIQUE (parkObjectId),
	PRIMARY KEY (parkObjectId)
);
