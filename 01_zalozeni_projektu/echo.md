
# `echo`: Tečková notace v PHP

## Základní myšlenka

Nejdřív si napiš čisté HTML, jako by PHP neexistovalo. Pak nahraď části proměnnými a nakonec to rozsekni na řetězce a spoj pomocí `.`

- Každý kus textu je v `" "`  
- PHP proměnné jsou mimo uvozovky
- Spojuješ pomocí `.`

## Úplný základ

**HTML verze:**

```html
<p>Jméno: Karel</p>
```

**PHP verze:**

```php
$jmeno = "Karel";
echo "<p>Jméno: " . $jmeno . "</p>";
```

**Výraz v `echo`**

```php
$a = 5;
$b = 3;
echo "<p>Součet: " . ($a + $b) . "</p>";
```

- Závorky jsou důležité, aby se výraz nejdřív spočítal

## Generovaný seznam (`ul`/`ol`, `li`)

**HTML předloha:**

```html
<ul>
  <li>Jablko</li>
  <li>Hruška</li>
</ul>
```

**PHP:**

```php
$ovoce = ["Jablko", "Hruška", "Banán"];
echo "<ul>";
for ($i = 0; $i < count($ovoce); $i++) {
    echo "<li>" . $ovoce[$i] . "</li>";
}
echo "</ul>";
```
- Každý `<li>` je jedno `echo` &rarr; jednoduché, přehledné, žádný chaos uvozovek


## Tabulka

**HTML předloha:**

```html
<table>
  <tr>
    <td>Notebook</td>
    <td>15000</td>
  </tr>
</table>
```

**PHP:**

```php
$nazev = ["Notebook", "Myš"];
$cena = [15000, 500];

echo "<table border='1'>";

for ($i = 0; $i < count($nazev); $i++) 
{
  echo "<tr>";
    echo "<td>" . $nazev[$i] . "</td>";
    echo "<td>" . $cena[$i] . "</td>";
  echo "</tr>";
}

echo "</table>";
```
Všimni si:
- atribut `border='1'` &rarr; uvnitř HTML používám `'`
- celý řetězec je v `" "` &rarr; žádný konflikt


## Odkazy (nejčastější problém)

**HTML:**

```html
<a href="produkt.php?id=1">Detail</a>
```

**PHP:**

```php
$id = 1;

// správně
echo "<a href='produkt.php?id=" . $id . "'>Detail</a>";

//správně
echo "<a href=\"produkt.php?id=" . $id . "\">Detail</a>";

//ŠPATNĚ!!
echo "<a href="produkt.php?id=" . $id . "">Detail</a>";
```
**Vysvětlení:**

- vnější `" "`, vnitřní `' '` pro HTML atributy
- alternativně je možné vnořené uvozovky escapovat `\"`
- proměnná je mimo řetězec


## Doporučený postup
1. Napiš si HTML (bez PHP)
2. Najdi, co se má měnit (proměnné)
3. Rozděl text na části
4. Spoj pomocí `.`

Text je v uvozovkách, proměnné jsou mimo ně, spojuji tečkou.

