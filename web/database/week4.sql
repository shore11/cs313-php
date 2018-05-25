CREATE TABLE vendor (
    vendor_id     SERIAL        PRIMARY KEY NOT NULL
  , first_name    VARCHAR(30)   NOT NULL
  , last_name     VARCHAR(50)   NOT NULL
  , phone_number  VARCHAR(13)   NOT NULL
  , email         VARCHAR(50)   NOT NULL
);

CREATE TABLE vehicle (
    vehicle_id    SERIAL      PRIMARY KEY NOT NULL
  , make          VARCHAR(20)
  , model         VARCHAR(20)
  , year          SMALLINT
  , price         INT         NOT NULL
  , info          TEXT        NOT NULL
  , vendor_id     INT         REFERENCES vendor (vendor_id)
);

ALTER TABLE vehicle ADD COLUMN info TEXT NOT NULL;
ALTER TABLE vehicle ALTER COLUMN year TYPE SMALLINT;

CREATE TABLE location (
      location_id   SERIAL      PRIMARY KEY NOT NULL
    , state         VARCHAR(20) NOT NULL
    , city          VARCHAR(20) NOT NULL
    , vehicle_id    INT         REFERENCES vehicle (vehicle_id)
);

// add vendors
INSERT INTO vendor (first_name, last_name, phone_number, email)
VALUES ('Aaron', 'Shore', '208 432 0444', 'email@eamil.com'),
('Andrew', 'Shore', '208 432 7744', 'email1@eamil.com'),
('Travis', 'Shore', '248 422 0654', 'email2@eamil.com');

// Add a car for aaron
INSERT INTO vehicle (make, model, year, price, info, vendor_id)
VALUES('Nissan', 'Maxima', 2002, 4500, 'In great condition',
  (SELECT v.vendor_id FROM vendor v WHERE email = 'email@eamil.com'));

  // Add a car for andrew
  INSERT INTO vehicle (make, model, year, price, info, vendor_id)
  VALUES('Nissan', 'Maxima', 2002, 3500, 'In poor condition',
    (SELECT v.vendor_id FROM vendor v WHERE email = 'email1@eamil.com'));

    // Add a car for travis
    INSERT INTO vehicle (make, model, year, price, info, vendor_id)
    VALUES('Nissan', '300z', 2001, 6500, 'Super Fast car',
      (SELECT v.vendor_id FROM vendor v WHERE email = 'email2@eamil.com'));


// add locations
INSERT INTO location(state, city, vehicle_id)
VALUES('ID', 'Rexburg',(SELECT vehicle_id FROM vehicle WHERE vendor_id = 1));

INSERT INTO location(state, city, vehicle_id)
VALUES('ID', 'Rexburg',(SELECT vehicle_id FROM vehicle WHERE vendor_id = 2));

INSERT INTO location(state, city, vehicle_id)
VALUES('IL', 'Forsyth',(SELECT vehicle_id FROM vehicle WHERE vendor_id = 3));
