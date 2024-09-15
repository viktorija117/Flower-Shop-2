<?php
    session_start();
    require_once "konekcijaSaBazom.php";

    function apdejtujAkoSmes($ibr, $lozinka, $imePrezime, $plata, $pocetakSmene, $krajSmene){
        if(isset($_POST['obrisi'])){

            queryMySQL("DELETE FROM prijavljivanjeRadnika WHERE radnik_identifikacioniBrojRadnika = '$ibr'");
            queryMySQL("DELETE FROM prodaja WHERE radnik_identifikacioniBrojRadnika = '$ibr'");
            
            
            queryMySQL("DELETE FROM radnik WHERE identifikacioniBrojRadnika='$ibr'");
            echo "<script>alert('Uspešno obrisan radnik!')</script>";
            echo "<script>location.replace('menadzer.php');</script>";
        }
        else if(isset($_POST['izmeni'])){
            $ibrNovo = $_POST['ibrNovo'];
            $lozinkaNovo = $_POST['lozinkaNovo'];
            $imePrezimeNovo = $_POST['imePrezimeNovo'];
            $plataNovo = $_POST['plataNovo'];
            $pocetakSmeneNovo = $_POST['pocetakSmeneNovo'];
            $krajSmeneNovo = $_POST['krajSmeneNovo'];
            $dalje = true;

            if (empty($ibrNovo) || empty($lozinkaNovo) || empty($imePrezimeNovo) || empty($plataNovo) || empty($pocetakSmeneNovo) || empty($krajSmeneNovo)) {
                echo "<script>alert('Sva polja moraju biti popunjena!')</script>";
                echo "<script>location.replace('izmeniRadnika.php?ibr=".$ibr."&lozinka=".$lozinka."&imePrezime=".$imePrezime."&plata=".$plata."&pocetakSmene=".$pocetakSmene."&krajSmene=".$krajSmene."');</script>";
                $dalje = false;
            }
            if($ibrNovo == $ibr && $lozinka == $lozinkaNovo && $imePrezime == $imePrezimeNovo && $plata == $plataNovo && $pocetakSmene == $pocetakSmeneNovo && $krajSmene == $krajSmeneNovo){
                echo "<script>alert('Niste ništa izmenili!')</script>";
                echo "<script>location.replace('izmeniRadnika.php?ibr=".$ibr."&lozinka=".$lozinka."&imePrezime=".$imePrezime."&plata=".$plata."&pocetakSmene=".$pocetakSmene."&krajSmene=".$krajSmene."');</script>";
                $dalje = false;
            }
            if($dalje){
                queryMySQL("UPDATE radnik SET identifikacioniBrojRadnika='$ibrNovo', lozinkaRadnik='$lozinkaNovo', imePrezime='$imePrezimeNovo', plata='$plata', pocetakSmene='$pocetakSmeneNovo', krajSmene='$krajSmeneNovo' WHERE identifikacioniBrojRadnika='$ibr'");
                echo "<script>alert('Uspešno ste izmenili podatke o radniku!')</script>";
                echo "<script>location.replace('menadzer.php');</script>";
            }
        }
    }
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../slike/icon.png">
    <link rel="stylesheet" href="../css/style.css">
    <title>Dodaj radnika</title>
</head>
<body>
    <header class="row">
        <div class="col-12">
            <img src="../slike/logo.png" alt="logo">
        </div>          
    </header>
    <main class="row">
        <div class="prvi">
            <div class="col-6 prvi2">
                <div class="col-12">
                    <h1>IZMENI RADNIKA:</h1>
                </div>
            </div>
        </div>
        <div class="zaFormu">
            <div class="col-8">
                <div class="col-12">
                    <?php
                        $ibr = $_GET['ibr'];
                        $lozinka = $_GET['lozinka'];
                        $imePrezime = $_GET['imePrezime'];
                        $plata = $_GET['plata'];
                        $pocetakSmene = $_GET['pocetakSmene'];
                        $krajSmene = $_GET['krajSmene'];

                        echo'<form method="post" action="'.apdejtujAkoSmes($ibr, $lozinka, $imePrezime, $plata, $pocetakSmene, $krajSmene).'">
                        <p>
                            <label for="">Identifikacioni broj radnika:</label> 
                            <input type="text" name="ibrNovo" maxlength="10" maxlength="10" value="'.$ibr.'">
                        </p>
                        <p>
                            <label>Lozinka radnika:</label>
                            <input type="password" name="lozinkaNovo" value="'.$lozinka.'">
                        </p>
                        <p>
                            <label>Ime i prezime:</label>
                            <input type="text" name="imePrezimeNovo" value="'.$imePrezime.'">
                        </p>
                        <p>
                            <label>Plata:</label>
                            <input type="text" name="plataNovo" value="'.$plata.'">
                        </p>
                        <p>
                            <label>Početak smene:</label>
                            <input type="time" name="pocetakSmeneNovo" value="'.$pocetakSmene.'">
                        </p>
                        <p>Kraj smene:</label>
                            <input type="time" name="krajSmeneNovo" value="'.$krajSmene.'">
                        </p>
                        <p>
                            <input type="submit" value="Izmeni" class="dugme" name="izmeni">
                        </p> 
                        <p>
                            <input type="submit" value="Obriši radnika iz baze" class="dugme" name="obrisi">
                        </p> 
                        <p>
                            <a href="menadzer.php"><input type="button" value="Odustani" class="dugme"></a>
                        </p> '
                    ?>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer class="row">
        <div class="col-6">
            <h5>O NAMA:</h5> <br>
            <p>U našoj ponudi je širok izbor ekskluzivnog, uvoznog svežeg rezanog i saksijskog cveća. <br>
                    Uz našu pomoć, iskustvo i ljubaznost pomoći ćemo Vam da obradujete svoje najmilije.</p> <br>
            <h5>KONTAKTIRAJTE NAS:</h5> <br>
            <ul>
                <li><a href="https://www.facebook.com/kmekalo17/"><img src="../slike/fbicon.png" alt="" class="ikonicafooter"></a></li>
                <li><a href="https://www.instagram.com/vkitanovic17/"><img src="../slike/instaicon.png" alt="" class="ikonicafooter"></a></li>
            </ul>
        </div>
        <div class="col-6">
            <img src="../slike/logo.png" alt="logo">
        </div>   
    </footer>
    <div class="miniFooter col-12">
       <p>Copyright © 2022 Cvećara CVETNO. All Rights Reserved <br> Created with love by Viktorija_Kitanović_394</p>
    </div>
    <script src="../js/validacija.js"></script>

</body>
</html>