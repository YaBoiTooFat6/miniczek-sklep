<?php

session_start();
include "db.php";

$msg = "";

if(isset($_POST['login'])){

$email = $_POST['email'];
$haslo = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";

$wynik = mysqli_query($conn,$sql);

if(mysqli_num_rows($wynik) > 0){

$dane = mysqli_fetch_assoc($wynik);

if(password_verify($haslo,$dane['password'])){

$_SESSION['user'] = $dane['name'];

header("Location: dashboard.php");

}
else{
$msg = "zle haslo";
}

}
else{
$msg = "konto nie istnieje";
}

}

?>

<!DOCTYPE html>
<html>
<head>

<title>logowanie</title>
<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h1>sklep logowanie</h1>

<p>podaj email i haslo</p>

<form method="POST">

<label>email</label>
<input type="email" name="email" required>

<label>haslo</label>
<input type="password" name="password" required>

<button type="submit" name="login">
zaloguj
</button>

</form>

<div class="bottom-text">
<a href="forgot.php">zapomniales hasla?</a>
</div>

<div class="bottom-text">
nie masz konta?
<a href="register.php">rejestracja</a>
</div>

<p class="error">
<?php echo $msg; ?>
</p>

</div>

</body>
</html>