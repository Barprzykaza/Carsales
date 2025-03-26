<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: register.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sprzedawczyk</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <script src="https://kit.fontawesome.com/baf9ff804b.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

  <link rel="stylesheet" href="css/style.css">

</head>

<body data-bs-spy="scroll" data-bs-target="#navId">
  <nav class="navbar navbar-expand-lg position-fixed top-0 w-100 py-3" id="navId">
    <div class="container">
      <a class="navbar-brand" href="index.php"> sprzedawczyk<span class="blue-text">.pl</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
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
    <div class="item py-5 mt-5">
      <div class="container d-flex">
        <div class="head mt-4">
          <p>Dodaj ogłoszenie</p>
          <div class="back bg-light">
            <div class="post">
              <form method="POST" action="./php/addPost.php" enctype="multipart/form-data">
                <label for="title">Tytuł ogłoszenia *</label><br>
                <input type="text" id="title" name="title" placeholder="Tyutł ogłoszenia" required minlength="10">
                <div class="damaged d-flex align-items-center">
                  <p>Stan</p>
                  <input type="radio" class="btn-check" name="used" id="usedyes" value="Używany" required>
                  <label class="btn btn-secondary" for="usedyes">Używany</label>
                  <input type="radio" class="btn-check" name="used" id="usedno" value="Nowy" required>
                  <label class="btn btn-secondary" for="usedno">Nowy</label>
                </div>
                <div class="damaged d-flex align-items-center">
                  <p>Uszkodzony</p>
                  <input type="radio" class="btn-check" name="damaged" id="Damagedyes" value="Tak" required>
                  <label class="btn btn-secondary" for="Damagedyes">Tak</label>
                  <input type="radio" class="btn-check" name="damaged" id="Damagedno" value="Nie" required>
                  <label class="btn btn-secondary" for="Damagedno">Nie</label>
                </div>
                <div class="imported d-flex align-items-center">
                  <p>Importowany</p>
                  <input type="radio" class="btn-check" name="imported" id="Importedyes" value="Tak" required>
                  <label class="btn btn-secondary" for="Importedyes">Tak</label>
                  <input type="radio" class="btn-check" name="imported" id="Importedno" value="Nie" required>
                  <label class="btn btn-secondary" for="Importedno">Nie</label>
                </div>
                <div class="informations row">
                  <div class="col-6 col-sm-6 col-md-6">
                    <label for="vin">VIN*</label><br>
                    <input type="text" id="vin" name="vin" placeholder="np. 1FTPW14V88FC2218" required minlength="17" maxlength="17" pattern="[A-HJ-NPR-Z0-9]{17}" oninput="this.value = this.value.toUpperCase();" title="VIN musi mieć dokładnie 17 znaków.">
                  </div>
                  <div class="col-6 col-sm-6 col-md-6">
                    <label for="milage">Przebieg</label><br>
                    <input type="number" id="milage" name="milage" placeholder="np. 10000 km" required min="0" step="1" required>
                  </div>
                  <div class="col-6 col-sm-6 col-md-6">
                    <label for="registration">Numer rejestracyjny pojazdu</label><br>
                    <input type="text" id="registration" name="registration" placeholder="np. LTM16631" maxlength="8" required>
                  </div>
                  <div class="col-6 col-sm-6 col-md-6">
                    <div class="date_registration">
                      <label for="date_registration">Data pierwszej rejestracji</label><br>
                      <input type="number" id="date_registrationday" name="date_registrationday" placeholder="dzień" required min="1" max="31">
                      <input type="number" id="date_registrationmonth" name="date_registrationmonth" placeholder="miesiąc" required min="1" max="12">
                      <input type="number" id="date_registrationyear" name="date_registrationyear" placeholder="rok" required min="1900" max="2025">
                    </div>
                  </div>
                  <div class="col-6 col-sm-6 col-md-6">
                    <label for="voivodeship">Województwo</label><br>
                    <select id="voivodeship" name="voivodeship" class="select2" required>
                      <option value=""></option>
                      <option value="Dolnośląskie">Dolnośląskie</option>
                      <option value="KujawskoPomorskie">Kujawsko-Pomorskie</option>
                      <option value="Lubelskie">Lubelskie</option>
                      <option value="Lubuskie">Lubuskie</option>
                      <option value="Lodzkie">Łódzkie</option>
                      <option value="Małopolskie">Małopolskie</option>
                      <option value="Mazowieckie">Mazowieckie</option>
                      <option value="Opolskie">Opolskie</option>
                      <option value="Podkarpackie">Podkarpackie</option>
                      <option value="Podlaskie">Podlaskie</option>
                      <option value="Pomorskie">Pomorskie</option>
                      <option value="Śląskie">Śląskie</option>
                      <option value="Świętokrzyskie">Świętokrzyskie</option>
                      <option value="WarminskoMazurskie">Warmińsko-Mazurskie</option>
                      <option value="Wielkopolskie">Wielkopolskie</option>
                      <option value="Zachodniopomorskie">Zachodniopomorskie</option>
                    </select>
                  </div>
                  <div class="col-6 col-sm-6 col-md-6">
                    <label for="city">Miasto</label><br>
                    <select id="city" name="city"></select>
                  </div>
                  <div class="col-6 col-sm-6 col-md-6">
                    <label for="price">Cena</label><br>
                    <input type="number" id="carPrice" name="carPrice" placeholder="13 200" required min="0" step="1">
                  </div>
                  <div class="col-6 col-sm-6 col-md-6">
                    <label for="country">Kraj Pochodzenia</label><br>
                    <input type="text" id="country" name="country" placeholder="np. Polska" required>
                  </div>
                </div>
            </div>
          </div>

          <div class="technicalData back bg-light" style="height: 730px;">
            <div class="post">
              <div class="section">
                <p>Dane techniczne</p>
              </div>
              <div class="informations row">
                <div class="col-6 col-sm-6 col-md-6">
                  <label for="production_year">Rok produkcji</label><br>
                  <input type="numeric" id="production_year" name="production_year" required min="1900" max="2025"> <br>
                </div>
                <div class="col-6 col-sm-6 col-md-6">
                  <label for="vehicleBrands">Marka pojazdu:</label>
                  <select id="vehicleBrands" name="vehicleBrands" class="select2" required>
                    <option value=""></option>
                    <option value="Audi">Audi</option>
                    <option value="BMW">BMW</option>
                    <option value="Chevrolet">Chevrolet</option>
                    <option value="Chrysler">Chrysler</option>
                    <option value="Citroen">Citroen</option>
                    <option value="Dacia">Dacia</option>
                    <option value="Fiat">Fiat</option>
                    <option value="Ford">Ford</option>
                    <option value="Honda">Honda</option>
                    <option value="Hyundai">Hyundai</option>
                    <option value="Jaguar">Jaguar</option>
                    <option value="Jeep">Jeep</option>
                    <option value="Kia">Kia</option>
                    <option value="Lexus">Lexus</option>
                    <option value="Mazda">Mazda</option>
                    <option value="Mercedes">Mercedes</option>
                    <option value="Mini">Mini</option>
                    <option value="Mitsubishi">Mitsubishi</option>
                    <option value="Nissan">Nissan</option>
                    <option value="Opel">Opel</option>
                    <option value="Peugeot">Peugeot</option>
                    <option value="Renault">Renault</option>
                    <option value="Seat">Seat</option>
                    <option value="Skoda">Skoda</option>
                    <option value="Smart">Smart</option>
                    <option value="Subaru">Subaru</option>
                    <option value="Suzuki">Suzuki</option>
                    <option value="Tesla">Tesla</option>
                    <option value="Toyota">Toyota</option>
                    <option value="Volkswagen">Volkswagen</option>
                    <option value="Volvo">Volvo</option>
                    <option value="AlfaRomeo">AlfaRomeo</option>
                    <option value="Ferrari">Ferrari</option>
                    <option value="Infiniti">Infiniti</option>
                    <option value="LandRover">LandRover</option>
                    <option value="Porsche">Porsche</option>
                    <option value="Saab">Saab</option>
                    <option value="Subaru">Subaru</option>
                  </select>
                </div>
                <div class="col-6 col-sm-6 col-md-6">
                  <label for="model">Model pojazdu</label><br>
                  <select id="carModel" name="carModel">
                  </select>
                </div>
                <div class="col-6 col-sm-6 col-md-6">
                  <label for="fuel">Rodzaj paliwa</label><br>
                  <select id="fuel" name="fuel">
                    <option value="Benzyna">Benzyna</option>
                    <option value="BenzynaLPG">Benzyna + LPG</option>
                    <option value="Diesel">Diesel</option>
                    <option value="Electric">Elektryczny</option>
                    <option value="Etanol">Etanol</option>
                    <option value="Hybrid">Hybryda</option>
                  </select>
                </div>
                <div class="col-6 col-sm-6 col-md-6">
                  <label for="engline_power">Moc</label><br>
                  <input type="number" id="engline_power" name="engline_power" placeholder="np. 150 km" required> <br>
                </div>
                <div class="col-6 col-sm-6 col-md-6">
                  <label for="engine_capacity">Pojemność skokowa</label><br>
                  <input type="number" id="engine_capacity" name="engine_capacity" placeholder="np. 1 395 cm3" required>
                </div>
                <div class="col-6 col-sm-6 col-md-6">
                  <label for="cumbstionCity">Spalanie w mieście l/100km</label><br>
                  <input type="number" id="cumbstionCity" name="cumbstionCity" placeholder="np. 19/100km" required> <br>
                </div>
                <div class="col-6 col-sm-6 col-md-6">
                  <label for="cumbstionOutsidecity">Spalanie poza miastem l/100km</label><br>
                  <input type="number" id="cumbstionOutsidecity" name="cumbstionOutsidecity" placeholder="np. 7/100km" required>
                </div>

                <div class="col-6 col-sm-6 col-md-6">
                  <label for="doors">Liczba drzwi</label><br>
                  <input type="number" id="doors" name="doors" placeholder="2-6" required min="2" max="6">
                </div>
                <div class="col-6 col-sm-6 col-md-6">
                  <label for="gearbox">Skrzynia biegów</label><br>
                  <select id="gearbox" name="gearbox">
                    <option value="Automatyczna">Automatyczna</option>
                    <option value="Manualna">Manualna</option>
                  </select>
                </div>
                <div class="col-6 col-sm-6 col-md-6">
                  <label for="carVersion">Wersja</label><br>
                  <input type="text" id="carVersion" name="carVersion" placeholder="SKYACTIV-X 2.0 M-Hybrid">
                </div>
                <div class="col-6 col-sm-6 col-md-6">
                  <label for="carGeneration">Generacja</label><br>
                  <input type="text" id="carGeneration" name="carGeneration" placeholder="np. I (2003-2009)">
                </div>
                <div class="col-6 col-sm-6 col-md-6">
                  <label for="body_type">typ nadwozia</label><br>
                  <select id="body_type" name="body_type" required>
                    <option value="sedan">Sedan</option>
                    <option value="cityCar">Auto miejskie</option>
                    <option value="coupe">Coupe</option>
                    <option value="cabriolet">Kabirolet</option>
                    <option value="compact">Kompakt</option>
                    <option value="combi">Kombi</option>
                    <option value="suv">SUV</option>
                    <option value="miniVan">Minivan</option>
                  </select>
                </div>
                <div class="col-6 col-sm-6 col-md-6">
                  <label for="carColor">Kolor nadwozia</label><br>
                  <select id="carColor" name="carColor">
                    <option value="Czarny">Czarny</option>
                    <option value="Biały">Biały</option>
                    <option value="Srebny">Srebrny</option>
                    <option value="Szary">Szary</option>
                    <option value="Niebieski">Niebieski</option>
                    <option value="Czerwony">Czerwony</option>
                    <option value="Zielony">Zielony</option>
                    <option value="Żółty">Żółty</option>
                    <option value="Pomarańczowy">Pomarańczowy</option>
                    <option value="Brązowy">Brązowy</option>
                    <option value="Różowy">Różowy</option>
                    <option value="Złoty">Złoty</option>
                    <option value="Bordowy">Bordowy</option>
                    <option value="Inny">Inny</option>
                  </select>
                </div>
              </div>


            </div>
          </div>

          <div class="back gearSection bg-light" style="height: 2800px;">
            <div class="post">
              <label for="description">Opis</label><br>
              <textarea class="description" name="descrip" placeholder="Wprowadż opis..." required></textarea>
              <div class="section">
                <p>Wyposażenie</p>
              </div>
              <div class="gearType">
                <p>Audio i multimedia</p>
              </div>
              <div class="gear d-flex align-items-center">
                <div class="row">
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="Caraudio1" name="features[]" value="Apple CarPlay">
                    <label class="btn btn-outline-primary" for="Caraudio1">Apple CarPlay</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="Caraudio2" name="features[]" value="Android Auto">
                    <label class="btn btn-outline-primary" for="Caraudio2">Android Auto</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="Caraudio3" name="features[]" value="Interfejs Bluetooth">
                    <label class="btn btn-outline-primary" for="Caraudio3">Interfejs Bluetooth</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="Caraudio4" name="features[]" value="Radio">
                    <label class="btn btn-outline-primary" for="Caraudio4">Radio</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="Caraudio5" name="features[]" value="Zestaw głośnomówiący">
                    <label class="btn btn-outline-primary" for="Caraudio5">Zestaw głośnomówiący</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="Caraudio6" name="features[]" value="Gniazdo USB">
                    <label class="btn btn-outline-primary" for="Caraudio6">Gniazdo USB</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="Caraudio7" name="features[]" value="Ładowanie bezprzewodowe">
                    <label class="btn btn-outline-primary" for="Caraudio7">Ładowanie bezprzewodowe</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="Caraudio8" name="features[]" value="System nawigacji">
                    <label class="btn btn-outline-primary" for="Caraudio8">System nawigacji</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="Caraudio9" name="features[]" value="System nagłośnienia">
                    <label class="btn btn-outline-primary" for="Caraudio9">System nagłośnienia</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="Caraudio10" name="features[]" value="Wyświetlacz typu Head-Up">
                    <label class="btn btn-outline-primary" for="Caraudio10">Wyświetlacz typu Head-Up</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="Caraudio11" name="features[]" value="Ekran dotykowy">
                    <label class="btn btn-outline-primary" for="Caraudio11">Ekran dotykowy</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="Caraudio12" name="features[]" value="Dostęp do internetu">
                    <label class="btn btn-outline-primary" for="Caraudio12">Dostęp do internetu</label><br>
                  </div>
                </div>
              </div>

              <div class="gearType">
                <p>Komfort</p>
              </div>
              <div class="gear d-flex align-items-center">
                <div class="row">
                  <div class="col-4 col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="comfort1" name="comfort[]" value="Klimatyzacja">
                    <label class="btn btn-outline-primary" for="comfort1">Klimatyzacja</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="comfort2" name="comfort[]" value="Klimatyzacja dla pasażerów z tyłu">
                    <label class="btn btn-outline-primary" for="comfort2">Klimatyzacja dla pasażerów z tyłu</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="comfort3" name="comfort[]" value="Osłona przeciwsłoneczna">
                    <label class="btn btn-outline-primary" for="comfort3">Osłona przeciwsłoneczna</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="comfort4" name="comfort[]" value="Otwierany dach">
                    <label class="btn btn-outline-primary" for="comfort4">Otwierany dach</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="comfort5" name="comfort[]" value="Elektrycznie ustawiany fotel kierowcy">
                    <label class="btn btn-outline-primary" for="comfort5">Elektrycznie ustawiany fotel kierowcy</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="comfort6" name="comfort[]" value="Elektrycznie ustawiany fotel pasażera">
                    <label class="btn btn-outline-primary" for="comfort6">Elektrycznie ustawiany fotel pasażera</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="comfort7" name="comfort[]" value="Podgrzewany fotel kierowcy">
                    <label class="btn btn-outline-primary" for="comfort7">Podgrzewany fotel kierowcy</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="comfort8" name="comfort[]" value="Podgrzewany fotel pasażera">
                    <label class="btn btn-outline-primary" for="comfort8">Podgrzewany fotel pasażera</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="comfort12" name="comfort[]" value="Fotele przednie z funkcje masażu">
                    <label class="btn btn-outline-primary" for="comfort12">Fotele przednie z funkcje masażu</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="comfort13" name="comfort[]" value="Siedzenie z pamięcią ustawienia">
                    <label class="btn btn-outline-primary" for="comfort13">Siedzenie z pamięcią ustawienia</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="comfort15" name="comfort[]" value="Ogrzewane siedzenia tylne">
                    <label class="btn btn-outline-primary" for="comfort15">Ogrzewane siedzenia tylne</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="comfort17" name="comfort[]" value="Fotele tylne z funkcje masażu">
                    <label class="btn btn-outline-primary" for="comfort17">Fotele tylne z funkcje masażu</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="comfort18" name="comfort[]" value="Podłokietniki - przód">
                    <label class="btn btn-outline-primary" for="comfort18">Podłokietniki - przód</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="comfort19" name="comfort[]" value="Podłokietniki - tył">
                    <label class="btn btn-outline-primary" for="comfort19">Podłokietniki - tył</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="comfort20" name="comfort[]" value="Kierownica skórzana">
                    <label class="btn btn-outline-primary" for="comfort20">Kierownica skórzana</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="comfort21" name="comfort[]" value="Kierownica sportowa">
                    <label class="btn btn-outline-primary" for="comfort21">Kierownica sportowa</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="comfort22" name="comfort[]" value="Kierownica ze sterowaniem radia">
                    <label class="btn btn-outline-primary" for="comfort22">Kierownica ze sterowaniem radia</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="comfort24" name="comfort[]" value="Kierownica wielofunkcyjna">
                    <label class="btn btn-outline-primary" for="comfort24">Kierownica wielofunkcyjna</label><br>
                  </div>
                </div>
              </div>

              <div class="gearType">
                <p>Systemy wspomagania kierownicy</p>
              </div>
              <div class="gear d-flex align-items-center">
                <div class="row">
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="driverAssist1" name="driverAssist[]" value="Tempomat">
                    <label class="btn btn-outline-primary" for="driverAssist1">Tempomat</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="driverAssist2" name="driverAssist[]" value="Kontrola odległości z przodu">
                    <label class="btn btn-outline-primary" for="driverAssist2">Kontrola odległości z przodu</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="driverAssist3" name="driverAssist[]" value="Kontrola odległości z tyłu">
                    <label class="btn btn-outline-primary" for="driverAssist3">Kontrola odległości z tyłu</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="driverAssist4" name="driverAssist[]" value="Asystent parkowania">
                    <label class="btn btn-outline-primary" for="driverAssist4">Asystent parkowania</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="driverAssist5" name="driverAssist[]" value="Kamera panoramiczna 360">
                    <label class="btn btn-outline-primary" for="driverAssist5">Kamera panoramiczna 360</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="driverAssist6" name="driverAssist[]" value="Kamera parkowania tył">
                    <label class="btn btn-outline-primary" for="driverAssist6">Kamera parkowania tył</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="driverAssist7" name="driverAssist[]" value="Lusterka boczne ustawiane elektrycznie">
                    <label class="btn btn-outline-primary" for="driverAssist7">Lusterka boczne ustawiane elektrycznie</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="driverAssist8" name="driverAssist[]" value="Podgrzewane lusterka boczne">
                    <label class="btn btn-outline-primary" for="driverAssist8">Podgrzewane lusterka boczne</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="driverAssist9" name="driverAssist[]" value="Lusterka boczne składane elektrycznie">
                    <label class="btn btn-outline-primary" for="driverAssist9">Lusterka boczne składane elektrycznie</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="driverAssist11" name="driverAssist[]" value="Asystent martwego pola">
                    <label class="btn btn-outline-primary" for="driverAssist11">Asystent martwego pola</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="driverAssist13" name="driverAssist[]" value="Lane assist - kontrola zmiany pasa ruchu">
                    <label class="btn btn-outline-primary" for="driverAssist13">Lane assist - kontrola zmiany pasa ruchu</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="driverAssist15" name="driverAssist[]" value="Ogranicznik prędkości">
                    <label class="btn btn-outline-primary" for="driverAssist15">Ogranicznik prędkości</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="driverAssist16" name="driverAssist[]" value="Asystent hamowania - Brake Assist">
                    <label class="btn btn-outline-primary" for="driverAssist16">Asystent hamowania - Brake Assist</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="driverAssist17" name="driverAssist[]" value="Asystent pokonywania zakrętów">
                    <label class="btn btn-outline-primary" for="driverAssist17">Asystent pokonywania zakrętów</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="driverAssist18" name="driverAssist[]" value="Kontrola trakcji">
                    <label class="btn btn-outline-primary" for="driverAssist18">Kontrola trakcji</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="driverAssist20" name="driverAssist[]" value="Hill Holder">
                    <label class="btn btn-outline-primary" for="driverAssist20">Wspomaganie ruszania pod górę- Hill Holder</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="driverAssist24" name="driverAssist[]" value="utonomiczny system kierowania">
                    <label class="btn btn-outline-primary" for="driverAssist24">Autonomiczny system kierowania</label><br>
                  </div>
                </div>
              </div>

              <div class="gearType">
                <p>Bezpieczeństwo</p>
              </div>
              <div class="gear d-flex align-items-center">
                <div class="row">
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="safety1" name="safety[]" value="ABS">
                    <label class="btn btn-outline-primary" for="safety1">ABS</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="safety2" name="safety[]" value="ESP">
                    <label class="btn btn-outline-primary" for="safety2">ESP</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="safety4" name="safety[]" value="System wspomagania hamowania">
                    <label class="btn btn-outline-primary" for="safety4">System wspomagania hamowania</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="safety7" name="safety[]" value="Aktywny asystent hamowania awaryjnego">
                    <label class="btn btn-outline-primary" for="safety7">Aktywny asystent hamowania awaryjnego</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="safety8" name="safety[]" value="System ostrzegający o możliwej kolizji">
                    <label class="btn btn-outline-primary" for="safety8">System ostrzegający o możliwej kolizji</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="safety12" name="safety[]" value="Alarm ruchu poprzecznego z tyłu pojazdu">
                    <label class="btn btn-outline-primary" for="safety12">Alarm ruchu poprzecznego z tyłu pojazdu</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="safety14" name="safety[]" value="System wykrywania zmęczenie kierowcy">
                    <label class="btn btn-outline-primary" for="safety14">System wykrywania zmęczenie kierowcy</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="safety16" name="safety[]" value="Aktywny system monitorowania kondycji kierowcy">
                    <label class="btn btn-outline-primary" for="safety16">Aktywny system monitorowania kondycji kierowcy</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="safety17" name="safety[]" value="Asystent pasa ruchu">
                    <label class="btn btn-outline-primary" for="safety17">Asystent pasa ruchu</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="safety19" name="safety[]" value="System powiadamiania o wypadku">
                    <label class="btn btn-outline-primary" for="safety19">System powiadamiania o wypadku</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="safety20" name="safety[]" value="Poduszka powietrzna kierowcy">
                    <label class="btn btn-outline-primary" for="safety20">Poduszka powietrzna kierowcy</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="safety21" name="safety[]" value="Poduszka powietrzna pasażera">
                    <label class="btn btn-outline-primary" for="safety21">Poduszka powietrzna pasażera</label><br>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3">
                    <input type="checkbox" class="btn-check" id="safety32" name="safety[]" value="isofix">
                    <label class="btn btn-outline-primary" for="safety32">Isofix (punkty mocowania fotelika dziecięcego)</label><br>
                  </div>
                </div>
              </div>
              <div class="section">
                <p>Dane techniczne</p>
              </div>
              <div class="choice d-flex align-items-center">
                <p>Pierwszy właściciel (od nowości)</p>
                <input type="radio" class="btn-check" name="firsOwner" id="firsOwneryes" value="Tak" required>
                <label class="btn btn-secondary" for="firsOwneryes">Tak</label>
                <input type="radio" class="btn-check" name="firsOwner" id="firsOwnerno" value="Nie" required>
                <label class="btn btn-secondary" for="firsOwnerno">Nie</label>
              </div>
              <div class="choice d-flex align-items-center">
                <p>Bezwypadkowy</p>
                <input type="radio" class="btn-check" name="accidentFree" id="accidentFreeyes" value="TAK" required>
                <label class="btn btn-secondary" for="accidentFreeyes">Tak</label>
                <input type="radio" class="btn-check" name="accidentFree" id="accidentFreeno" value="Nie" required>
                <label class="btn btn-secondary" for="accidentFreeno">Nie</label>
              </div>
              <div class="choice d-flex align-items-center">
                <p>Zarejestrowany w Polsce</p>
                <input type="radio" class="btn-check" name="registeredPoland" id="registeredPolandyes" value="TAK" required>
                <label class="btn btn-secondary" for="registeredPolandyes">Tak</label>
                <input type="radio" class="btn-check" name="registeredPoland" id="registeredPolandno" value="Nie" required>
                <label class="btn btn-secondary" for="registeredPolandno">Nie</label>
              </div>
              <div class="choice d-flex align-items-center">
                <p>Serwisowany w ASO</p>
                <input type="radio" class="btn-check" name="aso" id="asoyes" value="TAK" required>
                <label class="btn btn-secondary" for="asoyes">Tak</label>
                <input type="radio" class="btn-check" name="aso" id="asono" value="Nie" required>
                <label class="btn btn-secondary" for="asono">Nie</label>
              </div>
              <div class="choice d-flex align-items-center">
                <p>Tuning</p>
                <input type="radio" class="btn-check" name="tuning" id="tuningyes" value="TAK" required>
                <label class="btn btn-secondary" for="tuningyes">Tak</label>
                <input type="radio" class="btn-check" name="tuning" id="tuningno" value="Nie" required>
                <label class="btn btn-secondary" for="tuningno">Nie</label>
              </div>
              <div class="filespace">
                <label for="photos">Dodaj zdjęcia</label><br>
                <input type="file" id="photos" name="photos" accept="image/*" required>
              </div>

              <div class="submit mt-5">
                <button type="submit">Dodaj ogłoszenie</button>
              </div>

            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>
    <footer class="bg-dark text-light py-4 mt-5 text-center">
      <p class="mb-0"> &copy; Sprzedawczyk.pl</p>
    </footer>
  </main>

</body>

<script src="./js/script.js"></script>

</html>