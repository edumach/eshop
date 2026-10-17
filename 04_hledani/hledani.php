<?php
include "header.php";
?>

<h2>Hledání produktů</h2>

<form>
  <input type="text" name="q">

  <select name="razeni">
    <option value="">-- neřadit --</option>
    <option value="cena_asc">cena ↑</option>
    <option value="cena_desc">cena ↓</option>
  </select>

  <input type="submit" value="Hledat">
  <hr>
</form>


<?php
if (!empty($_GET['q']))
{

  $hledat = $_GET['q'];
  $hledat = "%" . $hledat . "%";

  //echo $hledat;

  $sql = "SELECT nazev, cena, pocet FROM sklad WHERE nazev LIKE '$hledat'";

    // přidání řazení
    if (!empty($_GET['razeni'])) {
      if ($_GET['razeni'] == "cena_asc") {
        $sql .= " ORDER BY cena ASC";
      }
      elseif ($_GET['razeni'] == "cena_desc") {
        $sql .= " ORDER BY cena DESC";
      }
    }

  $vysledek = mysqli_query($db, $sql);


  if (mysqli_num_rows($vysledek) == 0) {
    echo "Nic nenalezeno";
  } else {
    echo "<ul>";
    while($pole = mysqli_fetch_assoc($vysledek)) {
      echo "<li>" . $pole['nazev'] . ": " . $pole['cena'] . " Kč (" . $pole['pocet'] . " ks)</li>";
    }
    echo "</ul>";
  }

  mysqli_free_result($vysledek); //uvolnění paměti
}
?>

<?php include "footer.php"; ?>
