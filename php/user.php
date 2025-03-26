<?php
session_start();

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ogloszenia";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    if (isset($_POST["Userlogin"]) && isset($_POST["email"]) && isset($_POST["password"])) {
        $Userlogin = $_POST["Userlogin"];
        $userName = $_POST["userName"];
        $email = $_POST["email"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $phoneNumber = $_POST['phoneNumber'];


        $check_username_sql = "SELECT * FROM users WHERE Userlogin = ?";
        $check_username_stmt = $conn->prepare($check_username_sql);
        $check_username_stmt->bind_param("s", $Username);
        $check_username_stmt->execute();
        $check_username_result = $check_username_stmt->get_result();
        if ($check_username_result->num_rows > 0) {
            echo "Podana nazwa użytkownika jest zajęta.";
            $check_username_stmt->close();
        } else {
            $check_username_stmt->close();

            $check_email_sql = "SELECT * FROM users WHERE email = ?";
            $check_email_stmt = $conn->prepare($check_email_sql);
            $check_email_stmt->bind_param("s", $email);
            $check_email_stmt->execute();
            $check_email_result = $check_email_stmt->get_result();
            if ($check_email_result->num_rows > 0) {
                echo "Podany adres e-mail jest zajęty.";
                $check_email_stmt->close();
            } else {
                $check_email_stmt->close();


                $check_phoneNumber_sql = "SELECT * FROM users WHERE phoneNumber = ?";
                $check_phoneNumber_stmt = $conn->prepare($check_phoneNumber_sql);
                $check_phoneNumber_stmt->bind_param("s", $phoneNumber);
                $check_phoneNumber_stmt->execute();
                $check_phoneNumber_result = $check_phoneNumber_stmt->get_result();
                if ($check_phoneNumber_result->num_rows > 0) {
                    echo "Podany numer jest zajęty.";
                    $check_phoneNumber_stmt->close();
                } else {
                    $check_phoneNumber_stmt->close();

                    $insert_user_sql = "INSERT INTO users (Userlogin, userName, email, password, phoneNumber) VALUES (?,?, ?, ?, ?)";
                    $insert_user_stmt = $conn->prepare($insert_user_sql);
                    $insert_user_stmt->bind_param("ssssi", $Userlogin, $userName, $email, $password, $phoneNumber);

                    if ($insert_user_stmt->execute()) {
                        session_start();
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $insert_user_stmt->insert_id;
                        $_SESSION["Userlogin"] = $Userlogin;
                        header("location: ../index.php");
                    } else {
                        echo "Coś poszło nie tak, spróbuj ponownie.";
                    }

                    $insert_user_stmt->close();
                }
            }
        }
    } else {
        echo "Nie wszystkie wymagane pola zostały wypełnione.";
    }
}


$login_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    if (empty(trim($_POST["Userlogin"]))) {
        $login_err = "Wprowadź login.";
    } else {
        $Userlogin = trim($_POST["Userlogin"]);
    }

    if (empty(trim($_POST["password"]))) {
        $login_err = "Wprowadź hasło.";
    } else {
        $password = trim($_POST["password"]);
    }

    if (empty($login_err)) {
        $sql = "SELECT id, Userlogin, password FROM users WHERE Userlogin = ?";

        if ($stmt = $conn->prepare($sql)) {
            $param_username = $Userlogin;

            $stmt->bind_param("s", $param_username);

            if ($stmt->execute()) {
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $stmt->bind_result($id, $Userlogin, $hashed_password);
                    if ($stmt->fetch()) {
                        if (password_verify($password, $hashed_password)) {
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["Userlogin"] = $Userlogin;

                            header("location: ../index.php");
                            exit();
                        } else {
                            $login_err = "Niepoprawne hasło.";
                        }
                    }
                } else {
                    $login_err = "Niepoprawny login.";
                }
            } else {
                echo "Coś poszło nie tak, spróbuj ponownie.";
            }
            $stmt->close();
        }
    }

    $_SESSION['login_err'] = $login_err;

    header("location: ../register.php");
    exit();
}


$error_message = "";

if (isset($_POST["updatePassword"])) {

    $old_password = $_POST["old_password"];
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    $user_id = $_SESSION["id"];

    $sql = "SELECT * FROM users WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if (password_verify($old_password, $row["password"])) {
                if ($new_password === $confirm_password) {
                    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

                    $update_sql = "UPDATE users SET password = ? WHERE id = ?";
                    if ($update_stmt = $conn->prepare($update_sql)) {
                        $update_stmt->bind_param("si", $hashed_password, $user_id);
                        if ($update_stmt->execute()) {
                            $error_message = "Hasło zostało zaktualizowane!";
                        } else {
                            $error_message = "Wystąpił błąd podczas aktualizacji hasła.";
                        }
                    }
                } else {
                    $error_message = "Nowe hasło i potwierdzenie hasła nie pasują do siebie.";
                }
            } else {
                $error_message = "Stare hasło jest niepoprawne.";
            }
        } else {
            $error_message = "Użytkownik nie został znaleziony.";
        }
        $stmt->close();
    }
}


if ($error_message != "") {
    echo "<script>
            alert('$error_message');
            window.location.href = '../account.php';
            </script>";
}


if (isset($_POST["updateEmail"])) {

    $old_email = $_POST["old_email"];
    $new_email = $_POST["new_email"];
    $confirm_email = $_POST["confirm_email"];

    $user_id = $_SESSION["id"];

    $sql = "SELECT * FROM users WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if ($old_email === $row["email"]) {
                if ($new_email === $confirm_email) {
                    $update_sql = "UPDATE users SET email = ? WHERE id = ?";
                    if ($update_stmt = $conn->prepare($update_sql)) {
                        $update_stmt->bind_param("si", $new_email, $user_id);
                        if ($update_stmt->execute()) {
                            $error_message = "Adres e-mail został zaktualizowany!";
                        } else {
                            $error_message = "Wystąpił błąd podczas aktualizacji adresu e-mail.";
                        }
                    }
                } else {
                    $error_message = "Nowy adres e-mail i potwierdzenie adresu e-mail nie pasują do siebie.";
                }
            } else {
                $error_message = "Stary adres e-mail jest niepoprawny.";
            }
        } else {
            $error_message = "Użytkownik nie został znaleziony.";
        }
        $stmt->close();
    }
}

if ($error_message != "") {
    echo "<script>
            alert('$error_message');
            window.location.href = '../account.php';  // Po wyświetleniu alertu wróć do strony formularza
            </script>";
}

if (isset($_POST["updatePhoneNumber"])) {

    $old_tel = $_POST["old_tel"];
    $new_tel = $_POST["new_tel"];
    $confirm_tel = $_POST["confirm_tel"];

    $user_id = $_SESSION["id"];

    $sql = "SELECT * FROM users WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if ($old_tel === $row["phoneNumber"]) {
                if ($new_tel === $confirm_tel) {
                    $update_sql = "UPDATE users SET email = ? WHERE id = ?";
                    if ($update_stmt = $conn->prepare($update_sql)) {
                        $update_stmt->bind_param("si", $new_tel, $user_id);
                        if ($update_stmt->execute()) {
                            $error_message = "Adres e-mail został zaktualizowany!";
                        } else {
                            $error_message = "Wystąpił błąd podczas aktualizacji adresu e-mail.";
                        }
                    }
                } else {
                    $error_message = "Nowy adres e-mail i potwierdzenie adresu e-mail nie pasują do siebie.";
                }
            } else {
                $error_message = "Stary adres e-mail jest niepoprawny.";
            }
        } else {
            $error_message = "Użytkownik nie został znaleziony.";
        }
        $stmt->close();
    }
}

if ($error_message != "") {
    echo "<script>
            alert('$error_message');
            window.location.href = '../account.php';  // Po wyświetleniu alertu wróć do strony formularza
            </script>";
}
$conn->close();

$conn->close();
