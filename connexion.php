<?php
	define('HOTE', 'localhost');	
	define('BDD', 'modula');	
	define('UTIL', 'root');		 
						
	define('MDP', '');			

	try
	{
		@$pdo = new PDO('mysql:host=' . HOTE . ';dbname=' . BDD . ';charset=UTF8', UTIL,MDP);

	}
	catch (PDOException $e)
	{
		echo 'La connexion a échouée : ' . utf8_encode($e->getMessage());
		exit(1);
	}
?>

