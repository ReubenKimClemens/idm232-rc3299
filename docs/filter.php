<?php
require_once '../db.php';
require_once '../functions.php';

$search_query = $_GET["search"];
$search_query_refined = str_replace( array( '\'', "'", '"',
      ',' , ';', '<', '>' ), '', $search_query);
$search_words = explode(" ", $search_query_refined);

$conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$found_Recipes = [];
$sql = "SELECT id, title, sub_title FROM recipes";
$result = $conn->query($sql);
while ($recipe = $result->fetch_assoc()) {
    $match_count = 0;
    foreach ($search_words as $word) {
        if (str_contains(strtolower($recipe["title"]), strtolower($word))) {
            $match_count++;
        } else if (str_contains(strtolower($recipe["sub_title"]), strtolower($word))) {
            $match_count++;
        }
    }
    if ($match_count == count($search_words)) {
        $found_Recipes[] = $recipe["id"];
    }
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
    <?php
    if ($found_Recipes != null) {
        echo "<div class='dishes-section'>";
            if ($search_query != null) {
                echo "<h1>Found ".count($found_Recipes)." for ".$search_query."</h1>";
            } else {
                echo "<h1>All recipes</h1>";
            }
            
            echo "<div class='dishes-container'>";
                foreach ($found_Recipes as $found_recipe) {
                    $sql = "SELECT id, title, sub_title, cook_time, serving, image_name FROM recipes where id=$found_recipe";
                    $result = $conn->query($sql);
                    $recipe = $result->fetch_assoc();
                    echo "<div class='dishes-card'>";
                        echo "<a href='recipe.php?id=$found_recipe'>";
                            $image_path =  "../images/".getFolderPath($recipe)."/".$recipe["id"]."-".$recipe["image_name"]."-hero.webp";
                            echo '<img src="' .$image_path. '" alt="' .$recipe["title"]. '">';
                            echo "<h1>". $recipe["title"] ."</h1>";
                            echo "<h2>". $recipe["sub_title"] ."</h2>";
                            echo "<p>". $recipe["cook_time"]." min | ". $recipe["serving"]." servings</p>";
                        echo "</a>";
                    echo "</div>";
                }
            echo "</div>";
        echo "</div>";
    } 
    else {
        echo "<div class='no-result-message'>";
            echo "<h1>0 Results found for ".$search_query."</h1>";
            echo "<h3>Please try a different search term</h3>";
        echo "</div>";
    }
    $conn->close();
    ?>
</body>
</html>