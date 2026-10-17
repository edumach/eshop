<?php
include "header.php";

$sql = "SELECT * FROM sklad WHERE id = 2";

$vysledek = mysqli_query($db, $sql);

$pole = mysqli_fetch_row($vysledek);
echo $pole[0] . ": " . $pole[2] . " - " . $pole[4] . " ks";

mysqli_free_result($vysledek); //uvolnění paměti

include "footer.php";
?>
