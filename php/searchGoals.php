<?php
$conn = new mysqli("localhost", "root", "", "ogloszenia");

if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

$sql = "SELECT * FROM posts WHERE 1=1";

if (!empty($_GET['brand'])) {
    $sql .= " AND vehicleBrands = '" . $conn->real_escape_string($_GET['brand']) . "'";
}
if (!empty($_GET['model'])) {
    $sql .= " AND carModel = '" . $conn->real_escape_string($_GET['model']) . "'";
}
if (!empty($_GET['carBody'])) {
    $sql .= " AND body_type = '" . $conn->real_escape_string($_GET['carBody']) . "'";
}
if (!empty($_GET['mincarPrice'])) {
    $sql .= " AND carPrice >= " . (int)$_GET['mincarPrice'];
}
if (!empty($_GET['maxcarPrice'])) {
    $sql .= " AND carPrice <= " . (int)$_GET['maxcarPrice'];
}
if (!empty($_GET['minproductionYear'])) {
    $sql .= " AND production_year >= " . (int)$_GET['minproductionYear'];
}
if (!empty($_GET['maxproductionYear'])) {
    $sql .= " AND production_year <= " . (int)$_GET['maxproductionYear'];
}
if (!empty($_GET['minMilage'])) {
    $sql .= " AND milage >= " . (int)$_GET['minMilage'];
}
if (!empty($_GET['maxMilage'])) {
    $sql .= " AND milage <= " . (int)$_GET['maxMilage'];
}
if (!empty($_GET['voivodeship'])) {
    $sql .= " AND voivodeship = '" . $conn->real_escape_string($_GET['voivodeship']) . "'";
}
if (!empty($_GET['city'])) {
    $sql .= " AND city = '" . $conn->real_escape_string($_GET['city']) . "'";
}
if (!empty($_GET['isDamaged'])) {
    $sql .= " AND damaged = '" . $conn->real_escape_string($_GET['isDamaged']) . "'";
}
if (!empty($_GET['gearboxType'])) {
    $sql .= " AND gearbox = '" . $conn->real_escape_string($_GET['gearboxType']) . "'";
}
if (!empty($_GET['carColor'])) {
    $sql .= " AND carColor = '" . $conn->real_escape_string($_GET['carColor']) . "'";
}

$result = $conn->query($sql);

if ($result === false) {
    die("Błąd zapytania: " . $conn->error);
}

$posts = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }
}

$conn->close();

foreach ($posts as $post): ?>
    <div class="userPosts">
        <div class="userPost d-flex">
            <div class="postImage">
                <a href="post.php?id=<?= htmlspecialchars($post['id']) ?>">
                    <img src="<?= htmlspecialchars($post['photos']) ?>" alt="User photo">
            </div>
            <div class="postDate flex-column">
                <div class="postTitle"><?= htmlspecialchars($post['title']) ?></div>
                <div class="postEnglineinfo"><?= htmlspecialchars($post['engline_power']) . ' KM • ' . htmlspecialchars($post['engine_capacity']) . 'cm3' ?></div>
                <div class="postCarinfo"><i class="fa-solid fa-road"></i><?= htmlspecialchars($post['milage']) ?> <i class="fa-solid fa-gas-pump"></i> <?= htmlspecialchars($post['fuel']) ?>
                    <i class="fa-solid fa-gears"></i><?= htmlspecialchars($post['gearbox']) ?> <i class="fa-solid fa-calendar-days"></i><?= htmlspecialchars($post['production_year']) ?>
                </div>
                <div class="postPlace"><?= htmlspecialchars($post['city']) . ' (' . htmlspecialchars($post['voivodeship']) . ')' ?></div>
                <div class="postPublished"><?= 'Opublikowano: ' . htmlspecialchars($post['created_at']) ?></div>
            </div>
            <div class="postPrice">
                <?= htmlspecialchars($post['carPrice']) ?> PLN
            </div>
        </div>
    </div>
    </a>
<?php endforeach; ?>