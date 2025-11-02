/* Pokud databáze eshop neexistuje, vytvoří ji */
CREATE DATABASE IF NOT EXISTS eshop;

/* Nastaví ji jako aktivní */
USE eshop;

/* Pokud tabulka sklad existuje, smaže ji */
DROP TABLE IF NOT EXIST sklad;

/* Vytvoří strukturu tabulky sklad */
CREATE TABLE sklad (
  id int PRIMARY KEY AUTO_INCREMENT,
  kategorie VARCHAR(30),
  nazev varchar(100) NOT NULL UNIQUE,
  cena int DEFAULT 0,
  pocet int unsigned NOT NULL DEFAULT 0
);

/* Vložení záznamů - varianta 1 */
INSERT INTO sklad (kategorie, nazev, cena, pocet) VALUES ("Tričko", "Tričko modré", 200, 6);
INSERT INTO sklad (kategorie, nazev, cena, pocet) VALUES ("Tričko", "Tričko zelené", 250, 10);

/* Vložení záznamů - varianta 2 */
INSERT INTO sklad (kategorie, nazev, cena, pocet) VALUES
("Deštník", "Deštník velký", 300, 5),
("Deštník", "Deštník malý", 150, 2),
("Kalhoty", "Kalhoty dlouhé", 600, 7),
("Kalhoty", "Kalhoty krátké", 300, 3),
("Sukně", "Sukně barevná dlouhá", 500, 9),
("Mikina", "Mikina s kapucí", 800, 6);
