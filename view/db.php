<?php
$dsn = 'mysql:host=localhost;dbname=safaa';
$username = 'root'; 
$password = '';
$options = [];

try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {
  die('Erreur: '.$e->getMessage());
}



