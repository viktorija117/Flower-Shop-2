<?php
session_start();

	require_once "konekcijaSaBazom.php";
	
	$title = "cvecara";

	if (isset($_POST['ibm']) && isset($_POST['mlozinka'])) {

        $ibm = $_POST['ibm'];
		$mlozinka = $_POST['mlozinka'];
		$Vreme = date('Y/m/d H:i:s');
	
        $query = "SELECT * FROM menadzer WHERE menadzer.identifikacioniBrojMenadzera = '$ibm' and menadzer.lozinkaMenadzer = '$mlozinka'";
        $result = queryMySQL($query);

		if (empty($ibm)){
		echo"<script>alert('Obavezno unesite svoj identifikacioni broj!')</script>";
		echo "<script>location.replace('menadzerPrijava.html');</script>";
		};
		if (empty($mlozinka)){
		echo"<script>alert('Obavezno unesite svoju lozinku!')</script>";
		echo "<script>location.replace('menadzerPrijava.html');</script>";
		};
        if ($result->num_rows == 0){
        echo"<script>alert('Proverite svoj imb/lozinku')</script>";
        echo "<script>location.replace('menadzerPrijava.html');</script>";
        };
			
		if ($result->num_rows != 0) {
		
			$_SESSION['prijavljenMenadzer'] = true;
			$_SESSION['ibm'] = $ibm;
			$_SESSION['odjavaMenadzer'] = false;
                echo"<script>alert('Uspesno ste se prijavili kao menadzer čiji je ibm: $ibm')</script>";
                echo "<script>location.replace('menadzer.php');</script>";
			}
		}

		if (isset($_GET['odjavaMenadzer'])) {
			session_unset();
			session_destroy();
			echo "<script>location.replace('menadzerPrijava.html');</script>";
		}
?>