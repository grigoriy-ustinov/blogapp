<?php
require_once('functions.php');
$servername = "127.0.0.1";
$username = "root";
$password = "";

try {
  $pdo = new PDO("mysql:host=$servername;dbname=blog", $username, $password);
  // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    $_SESSION['error_message'] = 'Couldn\'t connect to databse';
}