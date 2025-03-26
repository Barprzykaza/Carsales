<?php

$conn = new mysqli("localhost", "root", "", "ogloszenia");

if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}
$user_id = $_SESSION["id"];


$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $Userlogin = $row['Userlogin'];
    $userEmail = $row['email'];
    $userPassword = $row['password'];
    $userNumber = $row['phoneNumber'];
}



$sql = "SELECT * FROM posts WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$posts = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $photos = isset($row['photos']) ? explode(',', $row['photos']) : [];
        $image_url = '' . trim($photos[0]);
        $id = $row['id'];
        $carPrice = $row['carPrice'];
        $created_at = $row['created_at'];
        $formatted_date = date("Y-m-d H:i:s", strtotime($created_at));
        $title = $row['title'];
        $posts[] = [
            'id' => $id,
            'image_url' => $image_url,
            'title' => $title,
            'carPrice' => $carPrice,
            'formatted_date' => $formatted_date,
        ];
    }
} else {
    echo "Nie masz żadnych ogłoszeń.";
}

$stmt->close();
$conn->close();
