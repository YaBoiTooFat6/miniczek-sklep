<?php

include "db.php";

$msg = "";

if(isset($_POST['reset'])){

$email = $_POST['email'];
$pass = $_POST['new_password'];

$newpass = password_hash($pass,PASSWORD_DEFAULT);

$sql = "UPDATE users SET password='$newpass' WHERE email='$email'";

$query = mysqli_query($conn,$sql);

if($query){

if(mysqli_affected_rows($conn) > 0){
$msg = "haslo zmienione";
}
else{
$msg = "nie ma takiego emaila";
}

}
else{
$msg = "blad";
}

}

?>

<!DOCTYPE html>
<html>
<head>

<title>zmiana hasla</title>
    <link rel="stylesheet" href="style.css">

</head>

    <body>

    <div class="container">

    <h1>zapomniales hasla?</h1>

    <p>zmien swoje haslo</p>

    <form method="POST">

<label>email</label>
<input type="email" name="email" required>

<label>nowe haslo</label>
<input type="password" name="new_password" required>

<button type="submit" name="reset">
    zmien haslo
</button>

</form> 

    <div class="bottom-text">
    <a href="index.php">powrot</a>
</div>

<p class="success">
<?php echo $msg; ?>
</p>

</div>

</body>
</html>