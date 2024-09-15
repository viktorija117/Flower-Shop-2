<?php 

require_once "konekcijaSaBazom.php";

$ibr = $_GET['ibr'];
$vreme = $_GET['vreme'];
$naziv = $_GET['naziv'];
$email = $_GET['email'];

$resultp = queryMySQL("SELECT id from artikli where artikli.naziv = '$naziv'");
$rowp = mysqli_fetch_assoc($resultp);
$nazivKonacno = $rowp['id'];

$resultq = queryMySQL("SELECT id from kontakt where kontakt.Email = '$email'");
$rowq = mysqli_fetch_assoc($resultq);
$emailKonacno = $rowq['id'];


$q = queryMySQL("DELETE FROM prodaja WHERE radnik_identifikacioniBrojRadnika = '$ibr' and vreme = '$vreme' and artikli_id = '$nazivKonacno' and  kontakt_id = '$emailKonacno'");

echo "<script>alert('Uspešno otkazana porudžbina.')</script>";
echo "<script>location.replace('radnik.php');</script>";
    
?>


