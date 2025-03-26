<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sprzedawczyk</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <script src="https://kit.fontawesome.com/baf9ff804b.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/style.css">

</head>

<body data-bs-spy="scroll" data-bs-target="#navId">
  <nav class="navbar navbar-expand-lg position-fixed top-0 w-100 py-3" id="navId">
    <div class="container">
      <a class="navbar-brand" href="#"> sprzedawczyk<span class="blue-text">.pl</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa-solid fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto bs-white">
          <a class="nav-link" href="search.php">Znajdź auto</a>
          <a class="nav-link" href="account.php"><i class="fa-solid fa-user"></i>Twoje konto</a>
          <a class="nav-link" href="add_post.php">Dodaj ogłoszenie</a>
        </div>
      </div>
    </div>
  </nav>
  <main>
    <div class="newest bg-light" style="margin-top: 70px;">
      <div class="container">
        <h2 class="section-title">Najnowsze ogłoszenia</h2>
        <?php include './php/main.php'; ?>

        <div class="card-group">
          <?php
          echo '<div class="row">';
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $id = $row['id'];
              $photos = explode(',', $row['photos']);
              $image_url = '' . trim($photos[0]);
              $title = $row['title'];
              $carPrice = $row['carPrice'];
              $voivodeship = $row['voivodeship'];
              $city = $row['city'];
              $production_year = $row['production_year'];
              $milage = $row['milage'];
              $fuel = $row['fuel'];
              $engline_power = $row['engline_power'];
              $engine_capacity = $row['engine_capacity'];
              $created_at = $row['created_at'];
              $formatted_date = date("Y-m-d H:i:s", strtotime($created_at));
              echo '
                   <div class="col-12 col-sm-6 col-md-4 col-lg-3"> 
                      <div class="card">
                          <a href="post.php?id=' . htmlspecialchars($id) . '">
                              <img src="' . htmlspecialchars($image_url) . '" class="card-img-top img-fluid">
                              <div class="card-body">
                                  <div class="card_title">' . htmlspecialchars($title) . '</div> 
                                  <p class="card_carDate">' . htmlspecialchars($production_year) . ' • ' .  htmlspecialchars($milage) . 'km • ' . htmlspecialchars($fuel) . ' • ' .  htmlspecialchars($engline_power) . 'KM • ' .  htmlspecialchars($engine_capacity) . 'cm3' . '</p>
                                  <p class="car_price">' . htmlspecialchars($carPrice) . ' <span class="currency">PLN</span></p>
                                  <p class="card-place">' . htmlspecialchars($voivodeship) . ' , ' .  htmlspecialchars($city) . '</p>
                                  <p class="card-text"><small class="text-muted">Dodano ' . $formatted_date . '</small></p>
                              </div>
                          </a>
                      </div>
                  </div>';
            }
          }
          echo '</div>';
          $conn->close();
          ?>

        </div>
        <h2 class="section-title mt-3">Najdroższe ogłoszenia</h2>
        <?php include './php/main.php'; ?>

        <div class="card-group">
          <?php
          echo '<div class="row">';

          if ($mostExpensive->num_rows > 0) {
            while ($row = $mostExpensive->fetch_assoc()) {
              $id = $row['id'];
              $photos = explode(',', $row['photos']);
              $image_url = '' . trim($photos[0]);
              $title = $row['title'];
              $carPrice = $row['carPrice'];

              $voivodeship = $row['voivodeship'];
              $city = $row['city'];

              $production_year = $row['production_year'];
              $milage = $row['milage'];
              $fuel = $row['fuel'];
              $engline_power = $row['engline_power'];
              $engine_capacity = $row['engine_capacity'];
              $created_at = $row['created_at'];
              $formatted_date = date("Y-m-d H:i:s", strtotime($created_at));
              echo '
                   <div class="col-12 col-sm-6 col-md-4 col-lg-3"> 
                      <div class="card">
                          <a href="post.php?id=' . htmlspecialchars($id) . '">
                              <img src="' . htmlspecialchars($image_url) . '" class="card-img-top img-fluid">
                              <div class="card-body">
                                  <div class="card_title">' . htmlspecialchars($title) . '</div> 
                                  <p class="card_carDate">' . htmlspecialchars($production_year) . ' • ' .  htmlspecialchars($milage) . 'km • ' . htmlspecialchars($fuel) . ' • ' .  htmlspecialchars($engline_power) . 'KM • ' .  htmlspecialchars($engine_capacity) . 'cm3' . '</p>
                                  <p class="car_price">' . htmlspecialchars($carPrice) . ' <span class="currency">PLN</span></p>
                                  <p class="card-place">' . htmlspecialchars($voivodeship) . ' , ' .  htmlspecialchars($city) . '</p>
                                  <p class="card-text"><small class="text-muted">Dodano ' . $formatted_date . '</small></p>
                              </div>
                          </a>
                      </div>
                  </div>';
            }
          }

          echo '</div>';
          $conn->close();
          ?>

        </div>
        <h2 class="section-title mt-3">Inne ogłoszenia</h2>
        <?php include './php/main.php'; ?>
        <div class="card-group">
          <?php
          $counter = 0;
          echo '<div class="row">';
          if ($randomPosts->num_rows > 0) {
            while ($row = $randomPosts->fetch_assoc()) {
              $id = $row['id'];
              $photos = explode(',', $row['photos']);
              $image_url = '' . trim($photos[0]);
              $title = $row['title'];
              $carPrice = $row['carPrice'];
              $voivodeship = $row['voivodeship'];
              $city = $row['city'];
              $production_year = $row['production_year'];
              $milage = $row['milage'];
              $fuel = $row['fuel'];
              $engline_power = $row['engline_power'];
              $engine_capacity = $row['engine_capacity'];
              $created_at = $row['created_at'];
              $formatted_date = date("Y-m-d H:i:s", strtotime($created_at));
              echo '
                   <div class="col-12 col-sm-6 col-md-4 col-lg-3"> 
                      <div class="card">
                          <a href="post.php?id=' . htmlspecialchars($id) . '">
                              <img src="' . htmlspecialchars($image_url) . '" class="card-img-top img-fluid">
                              <div class="card-body">
                                  <div class="card_title">' . htmlspecialchars($title) . '</div> 
                                  <p class="card_carDate">' . htmlspecialchars($production_year) . ' • ' .  htmlspecialchars($milage) . 'km • ' . htmlspecialchars($fuel) . ' • ' .  htmlspecialchars($engline_power) . 'KM • ' .  htmlspecialchars($engine_capacity) . 'cm3' . '</p>
                                  <p class="car_price">' . htmlspecialchars($carPrice) . ' <span class="currency">PLN</span></p>
                                  <p class="card-place">' . htmlspecialchars($voivodeship) . ' , ' .  htmlspecialchars($city) . '</p>
                                  <p class="card-text"><small class="text-muted">Dodano ' . $formatted_date . '</small></p>
                              </div>
                          </a>
                      </div>
                  </div>';
            }
          }

          echo '</div>';
          $conn->close();
          ?>
        </div>
      </div>
    </div>
    <footer class="bg-dark text-light py-4 mt-5 text-center">
      <p class="mb-0"> &copy; Sprzedawczyk.pl</p>
    </footer>
  </main>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>


</body>

</html>