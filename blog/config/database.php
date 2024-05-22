<?php
$host = 'localhost';
$username = '@';
$password = '1234';
$database = 'blogdata';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>;