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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sprzedawczyk</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://kit.fontawesome.com/baf9ff804b.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/userPanel.css">

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
        <?php include './php/loadUserdate.php'; ?>
        <div class="container">
            <div class="row">
                <div class="userPanels py-5">
                    <div class="userMenu">
                        <a href="#" class="menuItem" id="userpost">Moje ogłoszenia</a>
                        <a href="add_post.php" class="menuItem">Dodaj ogłoszenie</a>
                        <a href="#userConfing" class="menuItem" id="userConfing">Konfiguracja konta</a>
                        <div class="accountConfing d-none" id="accountConfing">
                            <a href="#" id="changePasswordsection" class="menuItem">Zmień hasło</a>
                            <a href="#" id="changeEmailsection" class="menuItem">Zmień email</a>
                            <a href="#" id="changeNumbersection" class="menuItem">Zmień numer</a>
                        </div>
                        <a href="./php/logout.php" class="menuItem">Wyloguj</a>

                    </div>
                </div>
                <div class="userInfo py-5">
                    <?php foreach ($posts as $post): ?>
                        <div class="userPosts d-none">
                        <a href="post.php?id=<?= htmlspecialchars($post['id']) ?>"> 
                        <div class="userPost d-flex">
                                    <div class="postImage">
                                        <img src="<?= htmlspecialchars($post['image_url']) ?>" alt="Car photo">
                                    </div>
                                    <div class="postDate flex-column">
                                        <div class="postTitle"><?= htmlspecialchars($post['title']) ?></div>
                                        <div class="postPrice"><?= htmlspecialchars($post['carPrice']) ?> PLN</div>
                                        <div class="postPublished">
                                            <span>Opublikowano: </span><?= htmlspecialchars($post['formatted_date']) ?>
                                        </div>
                                    </div>
                                    <div class="postDelete">
                                        <form action="./php/deletePost.php" method="post">
                                            <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                                            <button type="submit" class="btn btn-danger">Usuń ogłoszenie</button>
                                        </form>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                    <div class="updateProfilSection d-none" id="updatePassword">
                        <form action="php/user.php" method="post">
                            <label for="old_password">Stare hasło:</label>
                            <input type="password" id="old_password" name="old_password" placeholder="Aktualne hasło" required>
                            <label for="password">Nowe hasło:</label>
                            <input type="password" id="new_password" name="new_password" placeholder="Nowe hasło" required>
                            <label for="confirm_password">Potwierdź hasło:</label>
                            <input type="password" id="confirm_password" name="confirm_password" placeholder="Potwierdź nowe hasło" required>
                            <button type="submit" name="updatePassword">Zaktualizuj hasło</button>
                        </form>
                    </div>
                    <div class="updateProfilSection d-none" id="updateEmail">
                        <form action="php/user.php" method="post">
                            <label for="old_email">Stary adres email:</label>
                            <input type="email" id="old_email" name="old_email" placeholder="Aktualny email" required>
                            <label for="new_email">Nowy adres email:</label>
                            <input type="email" id="new_email" name="new_email" placeholder="Nowe hasło" required>
                            <label for="confirm_email">Potwierdź nowy adres email:</label>
                            <input type="email" id="confirm_email" name="confirm_email" placeholder="Potwierdź nowy email" required>
                            <button type="submit" name="updateEmail">Zaktualizuj adres e-mail</button>
                        </form>
                    </div>
                    <div class="updateProfilSection d-none" id="updatePhoneNumber">
                        <form action="php/user.php" method="post">
                            <label for="old_tel">Aktualny numer telefonu:</label>
                            <input type="tel" id="old_tel" name="old_tel" placeholder="Aktualny numer" required>
                            <label for="new_tel">Nowy numer telefonu:</label>
                            <input type="tel" id="new_tel" name="new_tel" placeholder="Nowy numer" required>
                            <label for="confirm_tel">Potwierdź nowy numer telefonu:</label>
                            <input type="tel" id="confirm_tel" name="confirm_tel" placeholder="Potwierdź nowy numer" required>
                            <button type="submit" name="updatePhoneNumber">Zaktualizuj numer</button>
                        </form>
                    </div>
                </div>


    </main>
</body>

<script src="./js/script.js"></script>
<script>
    const userpostLink = document.getElementById('userpost'); 
    const userPostsDivs = document.querySelectorAll('.userPosts'); 

    userpostLink.addEventListener('click', function(event) {
        event.preventDefault();
        userPostsDivs.forEach(post => {
            post.classList.toggle('d-none');
        });
    });

    const userConfingLink = document.getElementById('userConfing');
    const accountConfingDiv = document.getElementById('accountConfing');
    userConfingLink.addEventListener('click', function(event) {
        event.preventDefault();
        accountConfingDiv.classList.toggle('d-none');
    });

    const changePasswordsection = document.getElementById('changePasswordsection');
    const updatePasswordDiv = document.getElementById('updatePassword');
    changePasswordsection.addEventListener('click', function(event) {
        event.preventDefault();
        updatePasswordDiv.classList.toggle('d-none');
    });

    const changeEmailsection = document.getElementById('changeEmailsection');
    const updateEmailDiv = document.getElementById('updateEmail');
    changeEmailsection.addEventListener('click', function(event) {
        event.preventDefault();
        updateEmailDiv.classList.toggle('d-none');
    });

    const changeNumbersection = document.getElementById('changeNumbersection');
    const updatePhoneNumberdDiv = document.getElementById('updatePhoneNumber');
    changeNumbersection.addEventListener('click', function(event) {
        event.preventDefault();
        updatePhoneNumberdDiv.classList.toggle('d-none');
    });
</script>

</html>