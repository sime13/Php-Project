<?php
$host = 'localhost';
$username = '@';
$password = '1234';
$database = 'Movie';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

