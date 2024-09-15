<?php

require_once "konekcijaSaBazom.php";
require_once "menadzerPrijava.php";

if (isset($_POST['identifikacioniBrojRadnika'])) {
    $identifikacioniBrojRadnika = $_POST['identifikacioniBrojRadnika'];
    $lozinkaRadnik = $_POST['lozinkaRadnik'];
    $imePrezime = $_POST['imePrezime'];
    $plata = $_POST['plata'];
    $pocetakSmene = $_POST['pocetakSmene'];
    $krajSmene = $_POST['krajSmene'];

    if (empty($identifikacioniBrojRadnika) || empty($lozinkaRadnik) || empty($imePrezime) || empty($plata) || empty($pocetakSmene) || empty($krajSmene)) {
        echo "<script>alert('Sva polja moraju biti popunjena!')</script>";
        echo "<script>location.replace('dodajRadnika.html');</script>";
    }
    $q = "SELECT * FROM radnik WHERE identifikacioniBrojRadnika='$identifikacioniBrojRadnika'";
    $result = queryMySQL($q);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Vec postoji radnik sa ovim identifikacionim brojem!')</script>";
        echo "<script>location.replace('dodajRadnika.html');</script>";
    }
    else {
        queryMySQL("INSERT INTO radnik (identifikacioniBrojRadnika, lozinkaRadnik, imePrezime, plata, pocetakSmene, krajSmene)
        VALUES ('$identifikacioniBrojRadnika', '$lozinkaRadnik', '$imePrezime', '$plata', '$pocetakSmene', '$krajSmene')");
        echo "<script>alert('Uspesno ste zaposlili radnika!')</script>";
        echo "<script>location.replace('menadzer.php');</script>";
        }

    }
?>