<?php
include "db.php";

$message = "";

if(isset($_POST['register'])){

   $name = $_POST['name'];
  $email = $_POST['email'];
    $password = $_POST['password'];

   $check = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $check);
 if(mysqli_num_rows($result) > 0){

 
    }else{
       $hash = password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO users(name,email,password)
    VALUES('$name','$email','$hash')";
      if(mysqli_query($conn, $sql)){
          $message = "Konto utworzone";
      }else{
        $message = "blad";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>rejestracja</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h1>rejestracja konta w sklepie</h1>
    <p>utworz swoje konto</p>
    <form method="POST">
    <label>nazzwa</label>
    <input type="text" name="name" required>
<label>email</label>
     <input type="email" name="email" required>

<label>haslo</label>
 <input type="password" name="password" required>

 <button type="submit" name="register">zarejestruj</button>

    </form>

    <div class="bottom-text">
        Masz juz konto?
        <a href="index.php">zaloguj sie</a>
    </div>

    <div class="success">
        <?php echo $message; ?>
    </div>

</div>

</body>
</html>