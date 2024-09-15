<?php

require_once "konekcijaSaBazom.php";

session_start();

$ibr = $_SESSION['ibr'];
$id = $_GET['id'];
$ImePrezime = $_GET['ImePrezime'];

$nazivArtikla = $_GET['nazivArtikla'];
$resultp = queryMySQL("SELECT id from artikli where artikli.naziv = '$nazivArtikla'");
$rowp = mysqli_fetch_assoc($resultp);
$nazivKonacno = $rowp['id'];

$Email = $_GET['Email'];
$resultq = queryMySQL("SELECT id from kontakt where kontakt.Email = '$Email'");
$rowq = mysqli_fetch_assoc($resultq);
$emailKonacno = $rowq['id'];
$Poruka = $_GET['Poruka'];
$VremeSlanjaPoruke = $_GET['VremeSlanjaPoruke'];


    $p = "SELECT * FROM prodaja WHERE radnik_identifikacioniBrojRadnika = '$ibr' and vreme = '$VremeSlanjaPoruke' and artikli_id = '$nazivKonacno' and kontakt_id = '$emailKonacno'";
    $select = queryMySQL($p);

    if ($select->num_rows > 0) {  
        echo "<script>alert('Vec postoji pošiljka sa istim parametrima...')</script>";
        echo "<script>location.replace('radnik.php');</script>";
    }
    else {
        $q = "INSERT INTO prodaja (radnik_identifikacioniBrojRadnika, vreme, artikli_id, kontakt_id) 
        VALUES ('$ibr', '$VremeSlanjaPoruke', '$nazivKonacno', '$emailKonacno')";
        $rezultat = queryMySQL($q);
        echo "<script>alert('Uspešno poslata pošiljka!')</script>";
        echo "<script>location.replace('radnik.php');</script>";
    }
?>










