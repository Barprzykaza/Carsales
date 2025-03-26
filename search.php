<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sprzedawczyk.pl</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://kit.fontawesome.com/baf9ff804b.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/searchGoals.css">

</head>

<body data-bs-spy="scroll" data-bs-target="#navId">
    <nav class="navbar navbar-expand-lg position-fixed top-0 w-100 py-3" id="navId">
        <div class="container">
            <a class="navbar-brand" href="index.php"> sprzedawczyk<span class="blue-text">.pl</span></a>
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
        <div class="container">
            <div class="row">
                <div class="searchFormSection d-flex flex-wrap">
                    <form id="searchForm" action="./php/searchGoals.php" method="GET" class="d-flex flex-wrap w-100">
                        <?php include './php/searchForm.php'; ?>
                        <div class="searchBrandssection col-6 col-sm-6 col-md-4 col-lg-3 col-xxl-2">
                            <select id="vehicleBrands" name="brand" class="form-select">
                                <option value="">Marka pojazdu</option>
                                <?php foreach ($brands as $brand): ?>
                                    <option value="<?= $brand ?>"><?= $brand ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="searchModelsection col-6 col-sm-6 col-md-4 col-lg-3 col-xxl-2">
                            <select id="carModels" name="model" class="form-select">
                                <option value="">Model pojazdu</option>
                                <?php foreach ($models as $model): ?>
                                    <option value="<?= $model ?>"><?= $model ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="searchCarbodyssection col-6 col-sm-6 col-md-4 col-lg-3 col-xxl-2">
                            <select id="carBodies" name="carBody" class="form-select">
                                <option value="">Typ nadwozia</option>
                                <?php foreach ($body_types as $body_type): ?>
                                    <option value="<?= $body_type ?>"><?= $body_type ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="searchIsdamagedsection col-6 col-sm-6 col-md-4 col-lg-3 col-xxl-2">
                            <select id="isDamaged" name="isDamaged" class="form-select">
                                <option value="">Stan uszkodzeń</option>
                                <option value="Tak">Uszkodzony</option>
                                <option value="Nie">Nieuszkodzony</option>
                            </select>
                        </div>
                        <div class="searchCarpricesection col-6 col-sm-6 col-md-4 col-lg-3 col-xxl-2 d-flex gap-2">
                            <input type="number" id="mincarPrice" name="mincarPrice" placeholder="Cena od" min="0" class="form-control">
                        </div>
                        <div class="searchCarpricesection col-6 col-sm-6 col-md-4 col-lg-3 col-xxl-2 d-flex gap-2">
                            <input type="number" id="maxcarPrice" name="maxcarPrice" placeholder="Cena do" min="0" class="form-control">
                        </div>
                        <div class="searchProductionyearsection col-6 col-sm-6 col-md-4 col-lg-3 col-xxl-2 d-flex gap-2">
                            <input type="number" id="minproductionYear" name="minproductionYear" placeholder="Rok od" min="1900" max="2025" class="form-control">
                        </div>
                        <div class="searchProductionyearsection col-6 col-sm-6 col-md-4 col-lg-3 col-xxl-2 d-flex gap-2">
                            <input type="number" id="maxproductionYear" name="maxproductionYear" placeholder="Rok do" min="1900" max="2025" class="form-control">
                        </div>
                        <div class="searchMilagesection col-6 col-sm-6 col-md-4 col-lg-3 col-xxl-2 d-flex gap-2">
                            <input type="number" id="minMilage" name="minMilage" placeholder="Min przebieg" class="form-control">
                        </div>
                        <div class="searchMilagesection col-6 col-sm-6 col-md-4 col-lg-3 col-xxl-2 d-flex gap-2">
                            <input type="number" id="maxMilage" name="maxMilage" placeholder="Max przebieg" class="form-control">
                        </div>
                        <div class="searchGeraboxsection col-6 col-sm-6 col-md-4 col-lg-3 col-xxl-2">
                            <select id="gearboxType" name="gearboxType" class="form-select">
                                <option value="">Skrzynia biegów</option>
                                <option value="Automatyczna">Automatyczna</option>
                                <option value="Manualna">Manualna</option>
                            </select>
                        </div>
                        <div class="searchColorsection col-6 col-sm-6 col-md-4 col-lg-3 col-xxl-2">
                            <select id="colors" name="carColor" class="form-select">
                                <option value="">Kolor</option>
                                <?php foreach ($colors as $color): ?>
                                    <option value="<?= $color ?>"><?= $color ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="searchVoivodeshipssection col-6 col-sm-6 col-md-4 col-lg-3 col-xxl-2">
                            <select id="voivodeships" name="voivodeship" class="form-select">
                                <option value="">Województwo</option>
                                <?php foreach ($voivodeships as $voivodeship): ?>
                                    <option value="<?= $voivodeship ?>"><?= $voivodeship ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="searchCitysection col-6 col-sm-6 col-md-4 col-lg-3 col-xxl-2">
                            <select id="cities" name="city" class="form-select">
                                <option value="">Miasto</option>
                                <?php foreach ($cities as $city): ?>
                                    <option value="<?= $city ?>"><?= $city ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xxl-2 d-flex">
                            <button type="submit" class="btn btn-primary">Szukaj</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="searchResults mt-4" id="searchResults">

            </div>
        </div>
    </main>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#vehicleBrands').select2({
            placeholder: "Marka pojazdu",
            allowClear: true
        });

        $('#carModels').select2({
            placeholder: "Model pojazdu",
            allowClear: true
        });

        $('select').select2({
            width: '190px'
        });

        $('#searchForm').on('submit', function(e) {
            e.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: $(this).attr('action'),
                type: 'GET',
                data: formData,
                success: function(response) {
                    $('#searchResults').html(response);
                },
                error: function(xhr, status, error) {
                    $('#searchResults').html("Wystąpił błąd podczas wyszukiwania.");
                }
            });
        });
    });
</script>
