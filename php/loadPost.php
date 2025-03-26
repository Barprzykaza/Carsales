<?php
$conn = new mysqli("localhost", "root", "", "ogloszenia");

if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM posts INNER JOIN users ON posts.user_id = users.id WHERE posts.id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $photos = explode(',', string: $row['photos']);
        $image_url = '' . trim($photos[0]);
        $title = $row['title'];
        $damaged = $row['damaged'];
        $imported = $row['imported'];
        $vin = $row['vin'];
        $registration = $row['registration'];
        $used = $row['used'];
        $carPrice = $row['carPrice'];
        $country = $row['country'];
        $voivodeship = $row['voivodeship'];
        $city = $row['city'];
        $production_year = $row['production_year'];
        $milage = $row['milage'];
        $fuel = $row['fuel'];
        $engline_power = $row['engline_power'];
        $engine_capacity = $row['engine_capacity'];
        $cumbstionOutsidecity = $row['cumbstionOutsidecity'];
        $cumbstionCity = $row['cumbstionCity'];
        $created_at = $row['created_at'];
        $gearbox = $row['gearbox'];
        $body_type = $row['body_type'];
        $vehicleBrands = $row['vehicleBrands'];
        $carModel = $row['carModel'];
        $carColor = $row['carColor'];
        $doors = $row['doors'];
        $carVersion = $row['carVersion'];
        $descrip = $row['descrip'];
        $features = $row['features'];
        $featuresArray = explode(',', $features);
        $comfort = $row['comfort'];
        $comfortArray = explode(',', $comfort);
        $driverAssist = $row['driverAssist'];
        $driverAssistArray = explode(',', $driverAssist);
        $safety = $row['safety'];
        $safetyArray = explode(',', $safety);
        $firsOwner = $row['firsOwner'];
        $accidentFree = $row['accidentFree'];
        $registeredPoland = $row['registeredPoland'];
        $aso = $row['aso'];
        $tuning = $row['tuning'];

        $userName = $row['userName'] ?? 'Brak nazwy';
        $UserPhoneNumber = $row['phoneNumber'];

        $formatted_date = date("Y-m-d H:i:s", strtotime($created_at));
    }
}
