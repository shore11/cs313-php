CREATE TABLE event (
      event_id SERIAL       PRIMARY KEY
    , name     VARCHAR(100) NOT NULL
    , location VARCHAR(100) NOT NULL
    , "date"   DATE
);

INSERT INTO event (
        name
      , location
      , "date"
) VALUES (
      'Color Run'
    , 'Awesome Events Center'
    , '2018-07-05'
);

INSERT INTO event (
        name
      , location
) VALUES (
      'Turkey Trot'
    , 'Porter Park'
);

CREATE TABLE participant (
    person_id     SERIAL PRIMARY KEY
  , first_name    VARCHAR(200)  NOT NULL
  , last_name     VARCHAR(300)  NOT NULL
  , awesome_level BOOLEAN       NOT NULL
);

INSERT INTO participant (
      first_name
   ,  last_name
   ,  awesome_level
) VALUES (
  'Asa'
  ,'Skukouski'
  , TRUE
);

CREATE TABLE event_participant (
      id        SERIAL PRIMARY KEY
    , event_id  INT    REFERENCES event       NOT NULL
    , part_id   INT    REFERENCES participant NOT NULL
);


INSERT INTO event_participant (
      event_id
    , part_id
) VALUES (
      1
    , 1
);

---------------------------------------------------------
---------------------------------------------------------

CREATE TABLE ratings (
    id      SERIAL        PRIMARY KEY
  , code    VARCHAR(10)   UNIQUE NOT NULL
  , name    VARCHAR(100)
);

CREATE TABLE movies (
    id        SERIAL        PRIMARY KEY
  , title     VARCHAR(200)  NOT NULL
  , year      SMALLINT
  , rating_id INT           NOT NULL REFERENCES ratings
);

INSERT INTO ratings(code,name) VALUES
('G', 'General Audiences'),
('PG-13', 'Parents Strongly Cautioned'),
('R', 'Restricted');

INSERT INTO movies (title, year, rating_id) VALUES
('inc 2', 2018, (SELECT id from ratings WHERE code = 'G'));

SELECT * FROM movies WHERE title LIKE '%Star Wars%';

SELECT m.title, m.year, r.code -- dont need the r.code to do a where on it
FROM moives m INNER JOIN ratings r
ON m.rating_id = m.rating_id
WHERE r.code = 'PG';

-- many to many
SELECT * FROM movies m
INNER JOIN movies_actors ma ON m.id = ma.movie_id
INNER JOIN actors a ON ma.actor_id = a.id;
