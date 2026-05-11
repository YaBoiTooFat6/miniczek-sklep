<?php
session_start();
include "db.php";

$error = "";

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);

        if(password_verify($password, $row['password'])){

            $_SESSION['user'] = $row['name'];

            header("Location: dashboard.php");
        }else{
            $error = "zle haslo";
        }

    }else{
        $error = "uzytkownik nie istnieje";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logowanie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>sklep logowanie</h1>
    <p>podaj login i haslo</p>

    <form method="POST">

        <label>email</label>
        <input type="email" name="email" required>

        <label>haslo</label>
        <input type="password" name="password" required>

        <button type="submit" name="login">Login</button>

    </form>

    <div class="bottom-text">
        <a href="forgot.php">zapomniales hasla?</a>
    </div>

    <div class="bottom-text">
        Nie masz konta?
        <a href="register.php">Zarejestruj się</a>
    </div>

    <div class="error">
        <?php echo $error; ?>
    </div>

</div>

</body>
</html>