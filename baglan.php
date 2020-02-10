<?php
ob_start();
	session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


 try{
     
$db = new PDO("mysql:host=localhost;dbname=etic;charset=utf8", "root", "");

 }

catch ( PDOException $e ){
     print $e->getMessage();
}

?>
