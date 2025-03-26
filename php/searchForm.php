<?php
$conn = new mysqli("localhost", "root", "", "ogloszenia");

if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

$image_url = [];
$sql = "SELECT DISTINCT photos FROM posts";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $photos = explode(',', string: $row['photos']);
    $image_url = '.' . trim($photos[0]);
}

$brands = [];
$sql = "SELECT DISTINCT vehicleBrands FROM posts";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $brands[] = htmlspecialchars($row['vehicleBrands']);
}

$models = [];
$sql = "SELECT DISTINCT carModel FROM posts";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $models[] = htmlspecialchars($row['carModel']);
}

$body_types = [];
$sql = "SELECT DISTINCT body_type FROM posts";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $body_types[] = htmlspecialchars($row['body_type']);
}

$voivodeships = [];
$sql = "SELECT DISTINCT voivodeship FROM posts";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $voivodeships[] = htmlspecialchars($row['voivodeship']);
}

$cities = [];
$sql = "SELECT DISTINCT city FROM posts";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $cities[] = htmlspecialchars($row['city']);
}

$damaged = [];
$sql = "SELECT DISTINCT damaged FROM posts";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $damaged[] = htmlspecialchars($row['damaged']);
}

$gearbox = [];
$sql = "SELECT DISTINCT gearbox FROM posts";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $gearbox[] = htmlspecialchars($row['gearbox']);
}

$colors = [];
$sql = "SELECT DISTINCT carColor FROM posts";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $colors[] = htmlspecialchars($row['carColor']);
}
$conn->close();
