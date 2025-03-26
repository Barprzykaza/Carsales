<?php
$conn = new mysqli("localhost", "root", "", "ogloszenia");

if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

$sql = "SELECT * FROM posts ORDER BY created_at DESC LIMIT 4";
$result = $conn->query($sql);

$img = "SELECT * FROM posts ORDER BY carPrice DESC LIMIT 4";
$mostExpensive = $conn->query($img);


$randomPost = "SELECT * FROM posts ORDER BY RAND() LIMIT 16";
$randomPosts = $conn->query($randomPost);
