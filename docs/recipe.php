<?php 
require_once '../db.php';

function getFolderPath($recipe) {
    $combine_titles = $recipe["title"]."_".$recipe["sub_title"];
    $has_AND_sign = strpos($combine_titles, "&");
    if ($has_AND_sign === false) {
        $no_spaces_combined_title = str_replace(" ","_", $combine_titles);
    } else {
        $refined_combined_title = str_replace(" & ","_", $combine_titles);
        $no_spaces_combined_title = str_replace(" ","_", $refined_combined_title);
        }
    $folder_name = "Recipe_".$no_spaces_combined_title;
    return $folder_name;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/recipe.css">
    <title>Recipe</title>
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
            <a href="filter.php">
                <img src="../media/search-icon.svg" class="icon" alt="">
            </a>
        </div>
        <hr>
    </header>
    <div class="recipe-section">
        <?php
            // Database connection
            $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT id, title, sub_title, protein, cook_time, serving, description, ingredients, steps, image_name FROM recipes WHERE id='1'";
            $result = $conn->query($sql);
            $recipe = $result->fetch_assoc();
            
            echo "<div class='recipe-info'>";
            
                echo "<h1>". $recipe["title"] ."</h1>";
                echo "<h2>". $recipe["sub_title"] ."</h2>";
                echo "<p>". $recipe["description"] ."</p>";
                echo "<hr>";
                echo "<div class='cooking-info'>";
                    echo "<div class='labels'";
                        echo "<p>Total Time</p>";
                        echo "<p>Servings</p>";
                        echo "<p>Protein</p>";
                    echo "</div>";
                    echo "<div class='data'";
                        echo "<p>". $recipe["cook_time"]." min"."</p>";
                        echo "<p>". $recipe["serving"]." servings"."</p>";
                        echo "<p>". $recipe["protein"]."</p>";
                    echo "</div>";
                echo "</div>";
                echo "<hr>";
                echo "<hr>";
                echo "<div class='ingredients'>";
                    echo "<h2>Ingredients</h2>";
                    echo "<ul>";
                    $ingredients = explode("\n", $recipe["ingredients"]);
                    foreach ($ingredients as $ingredient) {
                        echo "<li>". $ingredient ."</li>";
                    }
                    echo "</ul>";
                echo  "</div>";
                echo "<hr>";
            echo "</div>";
            $image_path =  "../images/".getFolderPath($recipe)."/".$recipe["id"]."-".$recipe["image_name"]."-hero.webp";
            echo '<img src="' .$image_path. '" alt="' .$recipe["title"]. '">';
        echo "</div>";
            ?>
    <?php
        echo "<div class='steps'>";
            echo "<h1>Instructions</h1>";
            
            
            echo "<hr>";
            $steps = explode("*", $recipe["steps"]);
            $step_num = 1;
            foreach ($steps as $step) {
                $stepNumber = explode("--", $step);
                $image_path =  "../images/".getFolderPath($recipe)."/".$recipe["id"]."-".$recipe["image_name"]."-step".$step_num.".webp";
                echo '<img src="' .$image_path. '" alt="' .$recipe["title"]." step ".$step_num. '">';
                echo "<h2>".$stepNumber[0]."</h2>";
                echo "<p>".$stepNumber[1]."</p>";
                $step_num ++;
            }    
        echo "<div>'";
    ?>
</body>
</html>