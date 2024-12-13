<?php 
require_once 'db.php';
require_once 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Drexel's Recipes</title>
</head>
<body>
    <header>
        <div class="top-bar">
            <a href="index.php">
                <h1>Drexel's Recipes</h1>
            </a>
            <div class="search-box">
                <form action="docs/filter.php">
                    <input type="text" placeholder="Search for recipes..." name="search">
                </form>
            </div>
            <form action="docs/filter.php" class="mobile-search-bar">
                    <input type="text" placeholder="Search for recipes..." name="search">
            </form>
        </div>
        <hr>
    </header>
    <a href="docs/help.php" class="help">
        <img src="images/help-icon.svg" class="icon" alt="">
    </a>
    <div class="recipe-of-day">
        <?php
            $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);
            
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT id, title, sub_title, description, image_name FROM recipes WHERE id='32'";
            $result = $conn->query($sql);
            $recipe = $result->fetch_assoc();

            $image_path =  "images/".getFolderPath($recipe)."/".$recipe["id"]."-".$recipe["image_name"]."-hero.webp";
            echo '<img src="' .$image_path. '" alt="' .$recipe["title"]. '">';
            echo "<article>";
                
                    echo "<a href='docs/recipe.php?id=32'>";
                        echo "<h2>Recipe of the day</h2>";
                        echo "<h1>".$recipe["title"]."</h1>";
                        echo "<h3>".$recipe["sub_title"]."</h3>";
                        echo "<p>".$recipe["description"]."</p>";
                    echo "</a>";
                
            echo "</article>";
        ?>
    </div>
    <div class="dishes-section">
        <h1>Popular Dishes</h1>
        <div class="dishes-container">
            <?php
                $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $dish_list = [2, 3, 4, 5];
                foreach ($dish_list as $dish) {
                    $sql = "SELECT id, title, sub_title, cook_time, serving, image_name FROM recipes where id=$dish";
                    $result = $conn->query($sql);
                    $recipe = $result->fetch_assoc();
                    echo "<div class='dishes-card'>";
                        echo "<a href='docs/recipe.php?id=$dish'>";
                            $image_path =  "images/".getFolderPath($recipe)."/".$recipe["id"]."-".$recipe["image_name"]."-hero.webp";
                            echo '<img src="' .$image_path. '" alt="' .$recipe["title"]. '">';
                            echo "<h1>". $recipe["title"] ."</h1>";
                            echo "<h2>". $recipe["sub_title"] ."</h2>";
                            echo "<p>". $recipe["cook_time"]." min | ". $recipe["serving"]." servings</p>";
                        echo "</a>";
                    echo "</div>";
                }
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>