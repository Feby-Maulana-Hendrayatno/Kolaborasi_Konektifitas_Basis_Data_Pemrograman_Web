<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "angkringan-family";

// Create connection
// object
$mysqli_ambil = new mysqli($servername, $username, $password, $database);

// procedural
$mysqli_conn = mysqli_connect($servername, $username, $password, $database);


// Check connection 
//object
if ($mysqli_ambil->connect_error) {
    die("Connection failed: " . $mysqli_ambil->connect_error());
}

// procedural
if (!$mysqli_conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Check connection PDO
try {
    $pdo = new PDO("mysql:host=$servername;dbname=angkringan-family", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }

