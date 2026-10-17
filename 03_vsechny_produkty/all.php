<?php
include "header.php";
echo "<h2>Výpis všech produktů</h2>";

//zde bude PHP kód

$sql = "SELECT kategorie, nazev, cena, pocet FROM sklad";
$vysledek = mysqli_query($db, $sql);

while($pole = mysqli_fetch_assoc($vysledek))
{
  echo $pole['kategorie'] . " - " . $pole['nazev'] . ": " . $pole['cena'] . " Kč (" . $pole['pocet'] . " ks)<br>";
}
mysqli_free_result($vysledek); //uvolnění paměti



include "footer.php";
?>
