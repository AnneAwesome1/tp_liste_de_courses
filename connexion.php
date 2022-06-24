<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'courses';


try {

     $connexion = new PDO("mysql:host=$servername;dbname=$dbname;port=3306;charset=utf8", $username, $password);
     $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){// class PDOException représente un erreur émise par PDO. PDO (PHP Data Objects)
     echo "Echec de connexion à la base de donnée : ". $e->getMessage();
}

?>