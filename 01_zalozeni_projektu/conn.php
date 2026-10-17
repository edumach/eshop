<?php
$host = 'localhost';  
$uzivatel = 'kdokoli'; 
$heslo = 'kdokoli'; 
$databaze = 'cvicne';

$db = mysqli_connect($host, $uzivatel, $heslo, $databaze);

// kontrola chyby připojení
if (mysqli_connect_errno()) {
    die("Chyba připojení k databázi: " . mysqli_connect_error());
}

mysqli_set_charset($db, "utf8mb4");
?>