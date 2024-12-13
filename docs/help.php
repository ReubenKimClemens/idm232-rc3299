<?php 
require_once '../db.php';
require_once '../functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/index.css">
    <title>Drexel's Recipes</title>
</head>
<body>
    <header>
        <div class="top-bar">
            <a href="../index.php">
                <h1>Drexel's Recipes</h1>
            </a>
            <div class="search-box">
                <form action="filter.php">
                    <input type="text" placeholder="Search for recipes..." name="search">
                </form>
            </div>
            <form action="filter.php" class="mobile-search-bar">
                    <input type="text" placeholder="Search for recipes..." name="search">
            </form>
        </div>
        <hr>
    </header>
    <a href="help.php" class="help">
        <img src="../images/help-icon.svg" class="icon" alt="">
    </a>
</body>
</html>