<?php
include "db.php";

$message = "";

if(isset($_POST['reset'])){

    $email = $_POST['email'];
    $newPassword = $_POST['new_password'];

    $hash = password_hash($newPassword, PASSWORD_DEFAULT);

    $sql = "UPDATE users SET password='$hash' WHERE email='$email'";

    if(mysqli_query($conn, $sql)){

        if(mysqli_affected_rows($conn) > 0){
            $message = "Password changed";
        }else{
            $message = "Email not found";
        }

    }else{
        $message = "Error";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Zmiana hasla</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>zapomniales hasla?</h1>
    <p>zmine swoje haslo</p>

    <form method="POST">

        <label>email</label>
        <input type="email" name="email" required>

        <label>nowe haslo</label>
        <input type="password" name="new_password" required>

        <button type="submit" name="reset">zresetuj haslo</button>

    </form>

    <div class="bottom-text">
        <a href="index.php">powrot do logowania</a>
    </div>

    <div class="success">
        <?php echo $message; ?>
    </div>

</div>

</body>
</html>