<?php
	$dbhost = 'localhost';
	$dbname = 'cvecara';
	$dbuser = 'root';
	$dbpassword = '';	
	
	$connection = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
	if($connection->connect_error){
		die("Neuspesna konekcija: " . $connection->connect_error);
	}
	
	function queryMySQL($query) {
		global $connection;
		$result = $connection->query($query);
		if(!$result) die($connection->error);
		return $result;
	}
?>