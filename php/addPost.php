<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ogloszenia";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Połączenie nie powiodło się: " . $conn->connect_error);
}

$user_id = $_SESSION["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST['title'];
    $damaged = $_POST['damaged'];
    $imported = $_POST['imported'];
    $used = $_POST['used'];
    $vin = $_POST['vin'];
    $milage = $_POST['milage'];
    $registration = $_POST['registration'];
    $date_registrationday = $_POST['date_registrationday'];
    $date_registrationmonth = $_POST['date_registrationmonth'];
    $date_registrationyear = $_POST['date_registrationyear'];
    $voivodeship = $_POST['voivodeship'];
    $city = $_POST['city'];
    $carPrice = $_POST['carPrice'];
    $country = $_POST['country'];
    $production_year = $_POST['production_year'];
    $vehicleBrands = $_POST['vehicleBrands'];
    $carModel = $_POST['carModel'];
    $fuel = $_POST['fuel'];
    $engline_power = $_POST['engline_power'];
    $engine_capacity = $_POST['engine_capacity'];
    $cumbstionOutsidecity = $_POST['cumbstionOutsidecity'];
    $cumbstionCity = $_POST['cumbstionCity'];
    $doors = $_POST['doors'];
    $gearbox = $_POST['gearbox'];
    $carVersion = $_POST['carVersion'];
    $carGeneration = $_POST['carGeneration'];
    $body_type = $_POST['body_type'];
    $carColor = $_POST['carColor'];
    $descrip = $_POST['descrip'];
    $features = isset($_POST['features']) ? implode(",", $_POST['features']) : '';
    $comfort = isset($_POST['comfort']) ? implode(",", $_POST['comfort']) : '';
    $safety = isset($_POST['safety']) ? implode(",", $_POST['safety']) : '';
    $driverAssist = isset($_POST['driverAssist']) ? implode(",", $_POST['driverAssist']) : '';
    $firsOwner = $_POST['firsOwner'];
    $accidentFree = $_POST['accidentFree'];
    $registeredPoland = $_POST['registeredPoland'];
    $aso = $_POST['aso'];
    $tuning = $_POST['tuning'];

    $photos = "";
    $target_dir = "../uploads/";

    if (!empty($_FILES['photos']['name'])) {
        $file_name = basename($_FILES['photos']['name']);
        $target_file = $target_dir . $file_name;

        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (getimagesize($_FILES['photos']['tmp_name']) === false) {
            die("Plik nie jest obrazem.");
        }

        if ($_FILES['photos']['size'] > 5000000) {
            die("Plik jest zbyt duży.");
        }

        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            die("Tylko pliki JPG, JPEG, PNG, GIF są dozwolone.");
        }

        if (move_uploaded_file($_FILES['photos']['tmp_name'], $target_file)) {
            $photos = "uploads/" . $file_name;
        } else {
            die("Błąd podczas przesyłania pliku.");
        }
    }



    $sql = "INSERT INTO posts (user_id, title, used, damaged, imported, vin, registration, milage, date_registrationday, date_registrationmonth, date_registrationyear, voivodeship, city, carPrice, country, production_year, vehicleBrands,
        carModel, fuel, engline_power, engine_capacity, cumbstionCity, cumbstionOutsidecity, doors, gearbox, carVersion, carGeneration, body_type, carColor, descrip, features, comfort, driverAssist, safety, firsOwner, 
        accidentFree, registeredPoland, aso, tuning, photos)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {

        $stmt->bind_param(
            "issssssiiiisssiiiisssiiissssssssssssssss",
            $user_id,
            $title,
            $used,
            $damaged,
            $imported,
            $vin,
            $registration,
            $milage,
            $date_registrationday,
            $date_registrationmonth,
            $date_registrationyear,
            $voivodeship,
            $city,
            $carPrice,
            $country,
            $production_year,
            $vehicleBrands,
            $carModel,
            $fuel,
            $engline_power,
            $engine_capacity,
            $cumbstionCity,
            $cumbstionOutsidecity,
            $doors,
            $gearbox,
            $carVersion,
            $carGeneration,
            $body_type,
            $carColor,
            $descrip,
            $features,
            $comfort,
            $driverAssist,
            $safety,
            $firsOwner,
            $accidentFree,
            $registeredPoland,
            $aso,
            $tuning,
            $photos
        );


        if ($stmt->execute()) {
            echo "Ogłoszenie zostało dodane!";
            header("Location: ../index.php");
            exit();
        } else {
            echo "Błąd podczas dodawania ogłoszenia: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Błąd zapytania SQL: " . $conn->error;
    }


    $conn->close();
}
