<?php
session_start();

$servername="localhost";
$dbname="toDO";
$username="root";
$pdo=new PDO("mysql:host=$servername;dbname=$dbname",$username);
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);



?>
