<?php
session_start();

$conn = new mysqli("localhost", "root", "", "ogloszenia");

if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = $_POST['post_id'];

    $user_id = $_SESSION["id"];

    $sql = "DELETE FROM posts WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $post_id, $user_id);

    if ($stmt->execute()) {
        header("Location: ../account.php");
        exit();
    } else {
        echo "Wystąpił błąd podczas usuwania ogłoszenia.";
    }

    $stmt->close();
}

$conn->close();
