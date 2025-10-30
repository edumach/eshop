CREATE DATABASE IF NOT EXISTS eshop;

USE eshop;

DROP TABLE IF NOT EXIST sklad;

CREATE TABLE sklad (
  id int PRIMARY KEY AUTO_INCREMENT,
  kategorie VARCHAR(30),
  nazev varchar(100) NOT NULL UNIQUE,
  cena int DEFAULT 0,
  pocet int unsigned NOT NULL DEFAULT 0
);


INSERT INTO sklad (kategorie, nazev, cena, pocet) VALUES ("Tričko", "Tričko modré", 200, 6);
INSERT INTO sklad (kategorie, nazev, cena, pocet) VALUES ("Tričko", "Tričko zelené", 250, 10);

INSERT INTO sklad (kategorie, nazev, cena, pocet) VALUES
("Deštník", "Deštník velký", 300, 5),
("Deštník", "Deštník malý", 150, 2),
("Kalhoty", "Kalhoty dlouhé", 600, 7),
("Kalhoty", "Kalhoty krátké", 300, 3),
("Sukně", "Sukně barevná dlouhá", 500, 9),
("Mikina", "Mikina s kapucí", 800, 6);
