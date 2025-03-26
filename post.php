<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sprzedawczyk</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://kit.fontawesome.com/baf9ff804b.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/post.css">

</head>

<body data-bs-spy="scroll" data-bs-target="#navId">
    <nav class="navbar navbar-expand-lg position-fixed top-0 w-100 py-3" id="navId">
        <div class="container">
            <a class="navbar-brand" href="./index.php"> sprzedawczyk<span class="blue-text">.pl</span></a>
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
        <?php include './php/loadPost.php'; ?>
        <div class="post bg-light" style="margin-top: 100px;">
            <div class="container">
                <div class="row">
                    <div class="photo">
                        <img src="<?= htmlspecialchars($image_url) ?>" class="d-block w-100" alt="Zdjęcie ogłoszenia">
                    </div>
                    <div class="seller">
                        <?php
                        echo '<div class="title">' . htmlspecialchars($title) . '</div>';
                        echo '<div class="condition">' . htmlspecialchars($used) . ' • ' .  htmlspecialchars($production_year) . '</div>';
                        echo '<div class="price">' . htmlspecialchars($carPrice) . ' <span class="currency">PLN</span>' . '</div>';

                        echo '<div class="sellerInfo py-10">';
                        echo '<div class="sellerName">' . htmlspecialchars(string: $userName) . '</div>';
                        echo '<div class="sellerNumber"><i class="fa-solid fa-phone"></i>' . htmlspecialchars($UserPhoneNumber) . '</div>';
                        echo '<div class="sellerTown">' . htmlspecialchars(string: $voivodeship) . ', ' . htmlspecialchars($city) . '</div>';
                        echo '</div>';

                        ?>
                    </div>
                </div>
                <div class="underline"></div>
                <div class="detailSection">
                    <div class="detailIcons">
                        <p><i class="fa-solid fa-road"></i> </p>
                        <p><i class="fa-solid fa-gas-pump"></i></p>
                        <p><i class="fa-solid fa-gears"></i></p>
                        <p><i class="fa-solid fa-car-side"></i></p>
                        <p><i class="fa-solid fa-toolbox"></i></p>
                        <p><i class="fa-solid fa-clock"></i></p>
                    </div>
                    <div class="detailTitle">
                        <p>Przebieg</p>
                        <p>Rodzaj paliwa</p>
                        <p>Skrzynia biegów</p>
                        <p>Typ nadwozia</p>
                        <p>Pojemność skokowa</p>
                        <p>Moc</p>
                    </div>
                    <div class="detailLabel">
                        <?php
                        echo '<p>' . htmlspecialchars($milage) . '</p>';
                        echo '<p>' . htmlspecialchars($fuel) . '</p>';
                        echo '<p>' . htmlspecialchars($gearbox) . '</p>';
                        echo '<p>' . htmlspecialchars($body_type) . '</p>';
                        echo '<p>' . htmlspecialchars($engine_capacity) . ' cm3' . '</p>';
                        echo '<p>' . htmlspecialchars($engline_power) . ' KM' . '</p>';
                        ?>
                    </div>
                </div>
                <div class="underline"></div>
                <div class="descriptionSection">
                    <div class="heading">
                        Opis
                    </div>
                    <div class="description mt-3">
                        <?php
                        echo '<p>' . htmlspecialchars($descrip) . '</p>';
                        ?>
                        <div class="postTime">
                            <?php
                            echo '<p>' . htmlspecialchars($formatted_date) . '</p>';
                            ?>
                        </div>
                    </div>
                </div>
                <div class="underline"></div>
                <div class="detailsSection">
                    <div class="heading">
                        Szczegóły
                    </div>
                    <div class="row">
                        <div class="detailName col-md-6 mt-2">
                            <p>Marka pojazdu</p>
                        </div>
                        <div class="col-md-6">
                            <?php
                            echo '<p>' . htmlspecialchars($vehicleBrands) . '</p>';
                            ?>
                        </div>
                        <div class="detailName col-md-6">
                            <p>Model pojazdu</p>
                        </div>
                        <div class="col-md-6">
                            <?php
                            echo '<p>' . htmlspecialchars($carModel) . '</p>';
                            ?>
                        </div>
                        <div class="detailName col-md-6">
                            <p>Kolor </p>
                        </div>
                        <div class="col-md-6">
                            <?php
                            echo '<p>' . htmlspecialchars($carColor) . '</p>';
                            ?>
                        </div>
                        <div class="detailName col-md-6">
                            <p>Liczba drzwi </p>
                        </div>
                        <div class="col-md-6">
                            <?php
                            echo '<p>' . htmlspecialchars($doors) . '</p>';
                            ?>
                        </div>
                        <div class="detailName col-md-6">
                            <p>Rok produkcji</p>
                        </div>
                        <div class="col-md-6">
                            <?php
                            echo '<p>' . htmlspecialchars($production_year) . '</p>';
                            ?>
                        </div>
                        <div class="detailName col-md-6">
                            <p>Generacja</p>
                        </div>
                        <div class="col-md-6">
                            <?php
                            echo '<p>' . htmlspecialchars($carVersion) . '</p>';
                            ?>
                        </div>
                        <div class="detailName col-md-6">
                            <p>VIN</p>
                        </div>
                        <div class="col-md-6">
                            <?php
                            echo '<p>' . htmlspecialchars($vin) . '</p>';
                            ?>
                        </div>
                    </div>
                    <div class="headingDetail mt-3" id="toggleDetails">
                        <i class="fa-solid fa-list-ul"></i> Specyfikacja
                    </div>
                    <div class="details_content" style="display: none;">
                        <div class="row">
                            <div class="detailName col-md-6 mt-2">
                                <p>Rodzaj paliwa</p>
                            </div>
                            <div class="col-md-6">
                                <?php
                                echo '<p>' . htmlspecialchars($fuel) . '</p>';
                                ?>
                            </div>
                            <div class="detailName col-md-6">
                                <p>Pojemność skokowa</p>
                            </div>
                            <div class="col-md-6">
                                <?php
                                echo '<p>' . htmlspecialchars($engine_capacity) . ' cm3 ' . '</p>';
                                ?>
                            </div>
                            <div class="detailName col-md-6">
                                <p>Moc </p>
                            </div>
                            <div class="col-md-6">
                                <?php
                                echo '<p>' . htmlspecialchars($engline_power) . ' KM' . '</p>';
                                ?>
                            </div>
                            <div class="detailName col-md-6">
                                <p>Typ nadwozia</p>
                            </div>
                            <div class="col-md-6">
                                <?php
                                echo '<p>' . htmlspecialchars($body_type) . '</p>';
                                ?>
                            </div>
                            <div class="detailName col-md-6">
                                <p>Skrzynia biegów</p>
                            </div>
                            <div class="col-md-6">
                                <?php
                                echo '<p>' . htmlspecialchars($gearbox) . '</p>';
                                ?>
                            </div>
                            <div class="detailName col-md-6">
                                <p>Spalanie poza miastem</p>
                            </div>
                            <div class="col-md-6">
                                <?php
                                echo '<p>' . htmlspecialchars($cumbstionOutsidecity) . ' l/100km ' . '</p>';
                                ?>
                            </div>
                            <div class="detailName col-md-6">
                                <p>Spalanie w mieście</p>
                            </div>
                            <div class="col-md-6">
                                <?php
                                echo '<p>' . htmlspecialchars($cumbstionCity) . ' l/100km' . '</p>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="headingDetail mt-3" id="toggleDetails2">
                        <i class="fa-solid fa-list-ul"></i> Stan i historia
                    </div>
                    <div class="details_content2" style="display: none;">
                        <div class="row">
                            <div class="detailName col-md-6 mt-2">
                                <p>Kraj pochodzenia</p>
                            </div>
                            <div class="col-md-6">
                                <?php
                                echo '<p>' . htmlspecialchars($country) . '</p>';
                                ?>
                            </div>
                            <div class="detailName col-md-6">
                                <p>Przebieg</p>
                            </div>
                            <div class="col-md-6">
                                <?php
                                echo '<p>' . htmlspecialchars($milage) . ' km ' . '</p>';
                                ?>
                            </div>
                            <div class="detailName col-md-6">
                                <p>Stan </p>
                            </div>
                            <div class="col-md-6">
                                <?php
                                echo '<p>' . htmlspecialchars($used) . '</p>';
                                ?>
                            </div>
                            <div class="detailName col-md-6">
                                <p>Zarejestrowany w Polsce</p>
                            </div>
                            <div class="col-md-6">
                                <?php
                                echo '<p>' . htmlspecialchars($registeredPoland) . '</p>';
                                ?>
                            </div>
                            <div class="detailName col-md-6">
                                <p>Bezwypadkowy</p>
                            </div>
                            <div class="col-md-6">
                                <?php
                                echo '<p>' . htmlspecialchars($damaged) . '</p>';
                                ?>
                            </div>
                            <div class="detailName col-md-6">
                                <p>Numer rejestracyjny</p>
                            </div>
                            <div class="col-md-6">
                                <?php
                                echo '<p>' . htmlspecialchars($registration) . '</p>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="equipment_content">
                        <div class="heading mt-4">
                            Wyposażenie
                        </div>
                        <div class="row">
                            <div class="equipmentType mt-2" id="equipmentAudioset">
                                <p> <i class="fa-solid fa-angle-down"></i> Audio i multimedia</p>
                            </div>
                            <div class="audioSet equipmentContainer d-none">
                                <?php
                                foreach ($featuresArray as $feature) {
                                    echo '<i class="fa-solid fa-check"></i>' . htmlspecialchars(trim($feature)) . '<br>';
                                }
                                ?>
                            </div>
                            <div class="equipmentType mt-2" id="equipmentComfortset">
                                <p> <i class="fa-solid fa-angle-down"></i>Komfort i dodatki</p>
                            </div>
                            <div class="comfortSet equipmentContainer d-none">
                                <?php
                                foreach ($comfortArray as $comfort) {
                                    echo '<i class="fa-solid fa-check"></i>' . htmlspecialchars(trim($comfort)) . '<br>';
                                }
                                ?>
                            </div>
                            <div class="equipmentType mt-2" id="equipmentDriverassistset">
                                <p> <i class="fa-solid fa-angle-down"></i>Systemy wspomagania kierowcy </p>
                            </div>
                            <div class="driverassistSet equipmentContainer d-none">
                                <?php
                                foreach ($driverAssistArray as $driverAssist) {
                                    echo '<i class="fa-solid fa-check"></i>' . htmlspecialchars(trim($driverAssist)) . '<br>';
                                }
                                ?>
                            </div>
                            <div class="equipmentType mt-2" id="equipmentSafetyset">
                                <p> <i class="fa-solid fa-angle-down"></i>Bezpieczeństwo</p>
                            </div>
                            <div class="safetySet equipmentContainer d-none">
                                <?php
                                foreach ($safetyArray as $safety) {
                                    echo '<i class="fa-solid fa-check"></i>' . htmlspecialchars(trim($safety)) . '<br>';
                                }
                                ?>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>


        </div>
        <footer class="bg-dark text-light py-4 mt-5 text-center">
            <p class="mb-0"> &copy; Sprzedawczyk.pl</p>
        </footer>
    </main>





    <script>
        document.getElementById('toggleDetails').addEventListener('click', function() {
            var detailsContent = document.querySelector('.details_content');
            if (detailsContent.style.display === 'none' || detailsContent.style.display === '') {
                detailsContent.style.display = 'block';
            } else {
                detailsContent.style.display = 'none';
            }
        });

        document.getElementById('toggleDetails2').addEventListener('click', function() {
            var detailsContent = document.querySelector('.details_content2');
            if (detailsContent.style.display === 'none' || detailsContent.style.display === '') {
                detailsContent.style.display = 'block';
            } else {
                detailsContent.style.display = 'none';
            }
        });

        document.getElementById('equipmentAudioset').addEventListener('click', function() {
            var detailsContent = document.querySelector('.audioSet');
            var arrowIcon = this.querySelector('i');
            if (detailsContent.classList.contains('d-none')) {
                detailsContent.classList.remove('d-none');
                arrowIcon.classList.remove('fa-angle-down');
                arrowIcon.classList.add('fa-angle-up'); 
            } else {
                detailsContent.classList.add('d-none');
                arrowIcon.classList.remove('fa-angle-up'); 
                arrowIcon.classList.add('fa-angle-down'); 
            }
        });

        document.getElementById('equipmentComfortset').addEventListener('click', function() {
            var detailsContent = document.querySelector('.comfortSet');
            var arrowIcon = this.querySelector('i');
            if (detailsContent.classList.contains('d-none')) {
                detailsContent.classList.remove('d-none');
                arrowIcon.classList.remove('fa-angle-down');
                arrowIcon.classList.add('fa-angle-up'); 
            } else {
                detailsContent.classList.add('d-none');
                arrowIcon.classList.remove('fa-angle-up'); 
                arrowIcon.classList.add('fa-angle-down'); 
            }
        });

        document.getElementById('equipmentDriverassistset').addEventListener('click', function() {
            var detailsContent = document.querySelector('.driverassistSet');
            var arrowIcon = this.querySelector('i');
            if (detailsContent.classList.contains('d-none')) {
                detailsContent.classList.remove('d-none');
                arrowIcon.classList.remove('fa-angle-down'); 
                arrowIcon.classList.add('fa-angle-up'); 
            } else {
                detailsContent.classList.add('d-none');
                arrowIcon.classList.remove('fa-angle-up');
                arrowIcon.classList.add('fa-angle-down'); 
            }
        });

        document.getElementById('equipmentSafetyset').addEventListener('click', function() {
            var detailsContent = document.querySelector('.safetySet');
            var arrowIcon = this.querySelector('i');
            if (detailsContent.classList.contains('d-none')) {
                detailsContent.classList.remove('d-none');
                arrowIcon.classList.remove('fa-angle-down'); 
                arrowIcon.classList.add('fa-angle-up'); 
            } else {
                detailsContent.classList.add('d-none');
                arrowIcon.classList.remove('fa-angle-up'); 
                arrowIcon.classList.add('fa-angle-down'); 
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>


</body>

</html>