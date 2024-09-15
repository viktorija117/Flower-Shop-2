<?php

	require_once "konekcijaSaBazom.php";
	
	$title = "cvecara";


if (isset($_POST['NazivArtikla']) && isset($_POST['Email'])) {

	$ImePrezime = $_POST['ImePrezime'];
	$Email = $_POST['Email'];
	$NazivArtikla = $_POST['NazivArtikla'];
	$Poruka = $_POST['Poruka'];
	$Vreme = time();
	$format = "H:i:s";
	$VremeKonacno = date($format, $Vreme);
	/*
	$ImePrezime = 'ImePrezime';
	$Email = 'Email';
	$NaslovPoruke = 'NaslovPoruke';
	$Poruka = 'Poruka';
	*/

	$nastavi = true;

	if (empty($ImePrezime) && $nastavi == true) {
		echo "<script>alert('Obavezno unesite ime i prezime!')</script>";
		echo "<script>location.replace('kontakt.html');</script>";
		$nastavi = false;
	}
	;
	if (empty($NazivArtikla) && $nastavi == true) {
		echo "<script>alert('Obavezno unesite naslov poruke!')</script>";
		echo "<script>location.replace('kontakt.html');</script>";
		$nastavi = false;
	}
	;

	if (!filter_var($Email, FILTER_VALIDATE_EMAIL) && $nastavi == true) {
		echo "<script>alert('Morate uneti validan e-mail!')</script>";
		echo "<script>location.replace('kontakt.html');</script>";
		$nastavi = false;
	}
	;

	$query = "SELECT prodaja.* FROM kontakt INNER JOIN prodaja on kontakt.id = prodaja.kontakt_id
	WHERE kontakt.Email = '$Email' and kontakt.NazivArtikla = '$NazivArtikla'";
	$result = queryMySQL($query);


	if ($result->num_rows == 0 && $nastavi == true) {
		$insert_query = "INSERT INTO kontakt (ImePrezime, Email, NazivArtikla, Poruka, VremeSlanjaPoruke)
					VALUES (\"$ImePrezime\", \"$Email\", \"$NazivArtikla\", \"$Poruka\", \"$VremeKonacno\")";

		queryMySQL($insert_query);
		if ($nastavi) {
			echo "<script>alert('Poruka je primljena...')</script>";
			echo "<script>location.replace('kontakt.html');</script>";
		}
	} else {
		echo "<script>alert('Već postoji porudžbina ovog artikla sa mejla $Email')</script>";
		echo "<script>location.replace('kontakt.html');</script>";
	}
}
?>
