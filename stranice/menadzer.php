<!DOCTYPE html>

<?php
session_start();
if (!isset($_SESSION['prijavljenMenadzer']) || $_SESSION['prijavljenMenadzer'] == false) {
    echo"<script>alert('Morate biti ulogovani da biste imali pristup stranici!')</script>";
	echo "<script>location.replace('menadzerPrijava.html');</script>";
}?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../slike/icon.png">
    <link rel="stylesheet" href="../css/style.css">
    <title>Menadžer</title>
</head>
<body>
    <header class="row">
        <div class="col-6">
            <img src="../slike/logo.png" alt="logo">
        </div>
        <div class="col-6">
            <ul class="skriveniMeni">
                <li style="position: left;"><a href="menadzerPrijava.php?odjavaMenadzer=true"><img src="../slike/odjaviseicon.png" alt="" class="ikonica">Odjavi se</a></li>
            </ul>
        </div>           
    </header>
    <main class="row">
    <div class="prvi" style="height: 100%;">
            <div class="col-8 prvi2">
                <div class="col-12">
                    <h1>ZAPOSLENI:</h1><br>
                        <?php
	                        require_once "konekcijaSaBazom.php";

                                $q = "SELECT * FROM radnik";
                                $result = queryMySQL($q);

        echo "<table>
        <tr>
            <th style=' font-size: 15px; border: 2px solid #b9a687; color: #000; padding: 10px 15px; border-radius: 6px; text-shadow: none;'>IBR</th>
            <th style=' font-size: 15px; border: 2px solid #b9a687; color: #000; padding: 10px 15px; border-radius: 6px; text-shadow: none;'>LOZINKA</th>
            <th style=' font-size: 15px; border: 2px solid #b9a687; color: #000; padding: 10px 15px; border-radius: 6px; text-shadow: none;'>IME I PREZIME</th>
            <th style=' font-size: 15px; border: 2px solid #b9a687; color: #000; padding: 10px 15px; border-radius: 6px; text-shadow: none;'>PLATA</th>
            <th style=' font-size: 15px; border: 2px solid #b9a687; color: #000; padding: 10px 15px; border-radius: 6px; text-shadow: none;'>POCETAK SMENE</th>
            <th style=' font-size: 15px; border: 2px solid #b9a687; color: #000; padding: 10px 15px; border-radius: 6px; text-shadow: none;'>KRAJ SMENE</th>
            <th style=' font-size: 15px; border: 2px solid #b9a687; color: #000; padding: 10px 15px; border-radius: 6px; text-shadow: none;'>OPCIJE</th>
            </tr>";


        if($result->num_rows > 0) {
                while ($red = $result->fetch_assoc()) {
                    echo "<tr>
                                <td style=' font-size: 15px; border: 2px solid #D1BFA3; color: #000; padding: 10px 15px; border-radius: 6px; text-shadow: none;'>".$red['identifikacioniBrojRadnika']. "</td>
                                <td style=' font-size: 15px; border: 2px solid #D1BFA3; color: #000; padding: 10px 15px; border-radius: 6px; text-shadow: none;'>".$red['lozinkaRadnik']."</td>
                                <td style=' font-size: 15px; border: 2px solid #D1BFA3; color: #000; padding: 10px 15px; border-radius: 6px; text-shadow: none;'>".$red['imePrezime']."</td>
                                <td style=' font-size: 15px; border: 2px solid #D1BFA3; color: #000; padding: 10px 15px; border-radius: 6px; text-shadow: none;'>".$red['plata']."</td>
                                <td style=' font-size: 15px; border: 2px solid #D1BFA3; color: #000; padding: 10px 15px; border-radius: 6px; text-shadow: none;'>".$red['pocetakSmene']. "</td>
                                <td style=' font-size: 15px; border: 2px solid #D1BFA3; color: #000; padding: 10px 15px; border-radius: 6px; text-shadow: none;'>".$red['krajSmene']. "</td>
                                <td><a style='text-decoration: none; font-size: 15px; border: 2px solid #b9a687; color: #000; padding: 10px 15px; border-radius: 6px; text-shadow: none;' href='izmeniRadnika.php?ibr=".$red['identifikacioniBrojRadnika']."&lozinka=".$red['lozinkaRadnik']."&imePrezime=".$red['imePrezime']."&plata=".$red['plata']."&pocetakSmene=".$red['pocetakSmene']."&krajSmene=".$red['krajSmene']."'>Izmeni</a></td>
                                 </tr>";                 
                }
            }
            echo "</table>";
?>
                <br>
                <a style='text-decoration: none; font-size: 15px; border: 2px solid #b9a687; color: #000; padding: 10px 15px; border-radius: 6px; text-shadow: none;' href="dodajRadnika.html" >Zaposli novog radnika</a>
                    </div>
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
    <script src="../js/ocenjivanje.js"></script>
</body>
</html>