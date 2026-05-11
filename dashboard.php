<?php
session_start();

    if(isset($_SESSION['user']) == false){  
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

<h1>Witamy w sklepie</h1>

<p>Witaj <?php echo $_SESSION['user']; ?></p>

<a href="logout.php">
<button>Wyloguj sie</button>
</a>

</div>

</body>
</html>