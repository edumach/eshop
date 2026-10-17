
# Projekt eshop (4)

> - **Hledání a výpis produktů** + jejich řazení podle ceny
> - Živá ukázka: [tux.panska.cz/~machac/eshop/hledani.php](https://tux.panska.cz/~machac/eshop/hledani.php)
> - Skript: `hledani.php`
---

Hledání je jednou z nejčastějších činností na webu. Uživatel zadá do formuláře hledaný výraz a odešle jej tlačítkem. Prohlížeč následně vytvoří požadavek na server, ve kterém odešle data z formuláře pomocí metody GET – tedy jako součást adresy (URL).

Server tento požadavek zpracuje pomocí PHP skriptu. Ten si z pole `$_GET` načte zadaný text a případně i další volby formuláře (v tomto případě způsob řazení). Na základě těchto hodnot sestaví SQL dotaz, který odešle databázi.

Databáze vrátí odpovídající záznamy (produkty), které splňují podmínku hledání. Pokud je zvoleno řazení, výsledky se ještě před vrácením seřadí podle ceny.

PHP skript následně tato data projde a vygeneruje z nich HTML výstup – typicky seznam položek.

Výsledná stránka, kterou server odešle zpět prohlížeči, tak obsahuje jak původní formulář, tak i výsledky hledání. Uživatel může jednoduše upravit dotaz nebo změnit řazení a celý proces se opakuje.

### 1. Zobrazení formuláře (HTML)

Po načtení stránky se uživateli zobrazí formulář. Ten obsahuje vstupní pole a tlačítko pro odeslání.

```html
<form>
  <input type="text" name="q">
  <input type="submit" value="Hledat">
</form>
```

Důležité je:

* atribut `name="q"` – podle něj později PHP pozná, jakou hodnotu načíst
* není-li uvedena metoda, použije se výchozí **GET**

---

### 2. Uživatel odešle formulář (GET požadavek)

Po kliknutí na tlačítko prohlížeč odešle data na server.

Např. uživatel zadá:

```
kalhoty
```

V adresním řádku pak vznikne:

```
...?q=kalhoty
```

---

### 3. PHP načte hodnotu z formuláře

Na serveru PHP skript zjistí, zda byl formulář odeslán, a načte hodnotu z pole `$_GET`.

```php
if (!empty($_GET['q'])) {
  $hledat = $_GET['q'];
}
```

---

### 4. Vytvoření SQL dotazu

Zadaný text se upraví pro použití v SQL (např. pomocí zástupného znaku `%` pro hledání části textu).

```php
$hledat = "%" . $hledat . "%";
$sql = "SELECT nazev, cena FROM sklad WHERE nazev LIKE '$hledat'";
```

---

### 5. Odeslání dotazu do databáze

PHP odešle SQL dotaz databázi a získá výsledek.

```php
$vysledek = mysqli_query($db, $sql);
```

---

### 6. Zpracování a výpis výsledků

Výsledky se postupně načítají a převádějí do HTML.

```php
if (mysqli_num_rows($vysledek) == 0) {
  echo "<p>Nic nenalezeno</p>";
} else {
  echo "<ul>";
  while ($pole = mysqli_fetch_assoc($vysledek)) {
    echo "<li>" . $pole['nazev'] . " - " . $pole['cena'] . " Kč</li>";
  }
  echo "</ul>";
}
```

---

## Shrnutí principu

1. Prohlížeč zobrazí formulář
2. Uživatel zadá data a odešle je
3. Data se přenesou metodou GET do PHP (`$_GET`)
4. PHP z nich sestaví SQL dotaz
5. Databáze vrátí odpovídající záznamy
6. PHP je převede na HTML a odešle zpět uživateli



