<?php

session_start();

function connect(){
	$DB_DSN = 'mysql:host=localhost;dbname=test;charset=utf8';
	$DB_USER = 'root';
	$DB_PASS = 'root';

	try { 
	$bdd = new PDO($DB_DSN, $DB_USER, $DB_PASS);

	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //pour les erreurs a creuse 
	//$count = $bdd->exec('INSERT INTO Users SET logins="maggie",mail="bonsoir"'); //grace au truc au dessus, on va nous dire ou est la couille SQL
	//$res = $bdd->query('SELECT * FROM `Users`');//query renvoie un PDO statement
	//$data = $res->fetchAll(PDO::FETCH_OBJ);
	echo "COUCOU";
	return $bdd;
	}
	catch (PDOException $e) {
		echo 'Connection failed: ' . $e->getMessage();
	}

	//echo "\n"."RES";

// 	$json_string = json_encode($data, JSON_PRETTY_PRINT);
// 	echo $json_string;
}
?>