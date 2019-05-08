<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //pour les erreurs a creuse 
	$count = $bdd->exec('INSERT INTO Users SET logins="maggie",mail="bonsoir"'); //grace au truc au dessus, on va nous dire ou est la couille SQL
	$res = $bdd->query('SELECT * FROM `Users`');//query renvoie un PDO statement
	$data = $res->fetchAll(PDO::FETCH_OBJ);
	var_dump($data[0]->pass);


	//echo "\n"."RES";

	$json_string = json_encode($data, JSON_PRETTY_PRINT);
	echo $json_string;


	
	
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>