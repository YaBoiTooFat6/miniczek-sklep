<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>witamy w sklepie</h1>

    <p>
        witaj <?php echo $_SESSION['user']; ?>
    </p>

    <a href="logout.php">
        <button>wyloguj sie</button>
    </a>

</div>

</body>
</html>