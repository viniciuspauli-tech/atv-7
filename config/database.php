<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "atv-7";


$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Erro ao conectar com o banco de dados: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>