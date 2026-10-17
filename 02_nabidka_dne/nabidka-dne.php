<?php
include "header.php";

echo "<h2>Doporučujeme</h2>";

$sql = "SELECT * FROM sklad ORDER BY RAND() LIMIT 1";

$vysledek = mysqli_query($db, $sql);

//$pole = mysqli_fetch_row($vysledek);
//echo $pole[0] . ": " . $pole[2] . " - " . $pole[4] . " ks";

$pole = mysqli_fetch_assoc($vysledek);
echo $pole['kategorie'] . ": <b>" . $pole['nazev'] . "</b>"; //dodržet velikost znaků názvů polí

if ($pole['akce'] == 1)
{
    echo "<p>Akční cena " . $pole['cena'] . " Kč</p>";
}
else 
{
    echo "<p>Standardní cena " . $pole['cena'] . " Kč</p>";
}

if ($pole['pocet'] < 5)
{
    echo "<p>Rychle mizí, skladem poslední " . $pole['pocet'] . " ks</p>";
}



mysqli_free_result($vysledek); //uvolnění paměti

include "footer.php";
?>
