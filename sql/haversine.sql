-- @author Dylan McDonald
-- @see https://github.com/dylan-mcdonald/data-design/blob/master/sql/haversine.sql#L35

-- drop the procedure if already defined
DROP FUNCTION IF EXISTS haversine;

-- procedure to calculate the distance between two points
-- @param POINT $origin point of origin
-- @param POINT $destination point heading out
-- @return DECIMAL distance between the points, in kilometers
CREATE FUNCTION haversine(origin POINT, destination POINT) RETURNS FLOAT
	BEGIN
		-- first, declare all variables; I don't think you can declare later
		DECLARE radius DECIMAL(5, 1);
		DECLARE latitudeAngle1 DECIMAL(12, 9);
		DECLARE latitudeAngle2 DECIMAL(12, 9);
		DECLARE latitudePhase DECIMAL(12, 9);
		DECLARE longitudePhase DECIMAL(12, 9);
		DECLARE alpha DECIMAL(12, 9);
		DECLARE corner DECIMAL(12, 9);
		DECLARE distance DECIMAL(16, 9);

		-- assign the variables that were declared & use them
		SET radius = 3959; -- radius of the earth in miles
		SET latitudeAngle1 = RADIANS(Y(origin));
		SET latitudeAngle2 = RADIANS(Y(destination));
		SET latitudePhase = RADIANS(Y(destination) - Y(origin));
		SET longitudePhase = RADIANS(X(destination) - X(origin));

		SET alpha = SIN(latitudePhase / 2) * SIN(latitudePhase / 2)
						+ SIN(longitudePhase / 2) * SIN(longitudePhase / 2)
						  * COS(latitudeAngle1) * COS(latitudeAngle2);
		SET corner = 2 * ASIN(SQRT(alpha));
		SET distance = radius * corner;

		RETURN distance;
	END;
