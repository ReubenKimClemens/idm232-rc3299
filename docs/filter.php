<?php
require_once '../db.php';

$search_query = $_GET["search"];

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/filter.css">
</head>
<body>
    <header>
        <div class="top-bar">
            <a href="../index.php">
                <h1>Drexel's Recipes</h1>
            </a>
            <div class="search-box">
                <form action="no-results.php">
                    <input type="text" placeholder="Search for recipes..." name="search">
                </form>
            </div>
            <a href="no-results.php">
                <img src="../media/search-icon.svg" class="icon" alt="">
            </a>
        </div>
        <hr>
    </header>
    <div class="filter-area">
        <div class="filter">
            <h2>filters</h2>
            <div class="filter-tag">
                <h1>Cook Times</h1>
                <form action="">
                    <input type="checkbox">
                    <label for="">Under 45 min</label>
                    <input type="checkbox">
                    <label for="">Under 60 min</label>
                </form>
            </div>
            <div class="filter-tag">
                <h1>Cuisine</h1>
                <form action="">
                    <input type="checkbox">
                    <label for="">Italian</label>
                    <input type="checkbox">
                    <label for="">Asian</label>
                </form>
            </div>
        </div>
        <div class="search-results">
            <h2>Search results for ...</h2>
            <h3>12 results</h3>
        </div>
        <div class="recipe-results">
            <div class="recipe">
                <img src="../media/test-img.jpg" alt="">
                <div class="text-area">
                    <h2>test recipe</h2>
                    <h3>with ...</h3>
                </div>
            </div>
            <div class="recipe">
                <img src="../media/test-img.jpg" alt="">
                <div class="text-area">
                    <h2>test recipe</h2>
                    <h3>with ...</h3>
                </div>
            </div>
            <div class="recipe">
                <img src="../media/test-img.jpg" alt="">
                <div class="text-area">
                    <h2>test recipe</h2>
                    <h3>with ...</h3>
                </div>
            </div>
            <div class="recipe">
                <img src="../media/test-img.jpg" alt="">
                <div class="text-area">
                    <h2>test recipe</h2>
                    <h3>with ...</h3>
                </div>
            </div>
            <div class="recipe">
                <img src="../media/test-img.jpg" alt="">
                <div class="text-area">
                    <h2>test recipe</h2>
                    <h3>with ...</h3>
                </div>
            </div>
            <div class="recipe">
                <img src="../media/test-img.jpg" alt="">
                <div class="text-area">
                    <h2>test recipe</h2>
                    <h3>with ...</h3>
                </div>
            </div>
            <div class="recipe">
                <img src="../media/test-img.jpg" alt="">
                <div class="text-area">
                    <h2>test recipe</h2>
                    <h3>with ...</h3>
                </div>
            </div>
            <div class="recipe">
                <img src="../media/test-img.jpg" alt="">
                <div class="text-area">
                    <h2>test recipe</h2>
                    <h3>with ...</h3>
                </div>
            </div>
            <div class="recipe">
                <img src="../media/test-img.jpg" alt="">
                <div class="text-area">
                    <h2>test recipe</h2>
                    <h3>with ...</h3>
                </div>
            </div>
            <div class="recipe">
                <img src="../media/test-img.jpg" alt="">
                <div class="text-area">
                    <h2>test recipe</h2>
                    <h3>with ...</h3>
                </div>
            </div>
            <div class="recipe">
                <img src="../media/test-img.jpg" alt="">
                <div class="text-area">
                    <h2>test recipe</h2>
                    <h3>with ...</h3>
                </div>
            </div>
            <div class="recipe">
                <img src="../media/test-img.jpg" alt="">
                <div class="text-area">
                    <h2>test recipe</h2>
                    <h3>with ...</h3>
                </div>
            </div>
        </div>
    </div>
</body>
</html>