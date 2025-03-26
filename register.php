<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sprzedawczyk.pl Rejestracja</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://kit.fontawesome.com/baf9ff804b.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">

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
        <div class="login" style="margin-top: 100px;">
            <div class="container">
                <div class="row">
                    <div class="loginSection col-md-4">
                        <form action="php/user.php" method="post">
                            <h2>Logowanie</h2>
                            <input type="text" id="Userlogin" name="Userlogin" placeholder="Login" required>
                            <input type="password" id="passwordLogin" name="password" placeholder="Hasło" required>
                            <button type="submit" name="login">Zaloguj się</button>
                            <?php
                            session_start();
                            if (!empty($_SESSION['login_err'])) {
                                echo "<p style='color:red;'>" . $_SESSION['login_err'] . "</p>";
                                unset($_SESSION['login_err']);
                            }
                            ?>
                        </form>
                    </div>
                    <div class="registrationSection col-md-4">
                        <form action="php/user.php" method="post" onsubmit="return validatePasswords();">
                            <h2>Rejestracja</h2>
                            <input type="text" id="Userlogin" name="Userlogin" placeholder="Login" pattern="[A-Za-z][A-Za-z0-9]{0,19}" maxlength="20" required>
                            <input type="email" id="email" name="email" placeholder="Email" required>
                            <input type="text" id="userName" name="userName" placeholder="Imię" pattern="[A-Za-z][A-Za-z0-9]{0,19}" maxlength="20" required>
                            <input type="password" id="password" name="password" placeholder="Hasło" pattern="^(?=.*[A-Z])(?=.*[\W_]).{8,}$"
                                title="Hasło musi mieć co najmniej 8 znaków, zawierać jedną dużą literę i jeden znak specjalny " required>
                            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Powtórz hasło" required>
                            <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Numer telefonu" pattern="^\d{9}$" title="Podaj 9cyfr" required>
                            <button type="submit" name="register">Zarejestruj</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>
<script>
    function validatePasswords() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;

        if (password !== confirmPassword) {
            alert("Hasła nie są takie same. Spróbuj ponownie.");
            return false; 
        }
        return true; 
    }
</script>

</html>