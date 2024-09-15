
<?php
session_start();

require_once "konekcijaSaBazom.php";

$title = "cvecara";

if (isset($_POST['ibr'])) {

        $ibr = $_POST['ibr'];
        $rlozinka = $_POST['rlozinka'];
        $Vreme = time();
        $VremeKonacno = date("H:i:s", $Vreme);

        $nastavi = true;
        $query = "SELECT * FROM radnik WHERE radnik.identifikacioniBrojRadnika = '$ibr' and radnik.lozinkaRadnik = '$rlozinka'";
        $result = queryMySQL($query);

        
        if (empty($ibr)) {
            echo "<script>alert('Obavezno unesite svoj identifikacioni broj!')</script>";
            echo "<script>location.replace('radnikPrijava.html');</script>";
            $nastavi = false;
        }
        ;
        if (empty($rlozinka)) {
            echo "<script>alert('Obavezno unesite svoju lozinku!')</script>";
            echo "<script>location.replace('radnikPrijava.html');</script>";
            $nastavi = false;
        }
        ;
        if ($result->num_rows == 0) {
            echo "<script>alert('Proverite svoj imb/lozinku')</script>";
            echo "<script>location.replace('radnikPrijava.html');</script>";
            $nastavi = false;
        }
        ;

        if ($result->num_rows != 0 && $nastavi == true) {

            $_SESSION['prijavljenRadnik'] = true;
            $_SESSION['ibr'] = $ibr;
            $_SESSION['odjava'] = false;

            $insert_query = "INSERT INTO prijavljivanjeradnika (vremePrijavljivanjaR, radnik_IdentifikacioniBrojRadnika)
            VALUES (\"$VremeKonacno\", \"$ibr\")";
            queryMySQL($insert_query);
            echo "<script>alert('Uspesno ste se prijavili kao radnik čiji je ibr: $ibr')</script>";
            echo "<script>location.replace('radnik.php');</script>";
        }
    }
    if (isset($_GET['odjavaRadnika'])) {
        session_unset();
        session_destroy();
        echo "<script>location.replace('radnikPrijava.html');</script>";
    }

?>
