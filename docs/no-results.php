<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No Results</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/no-results.css">
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
    <div class="no-result-message">
        <h1>0 Results found for ____</h1>
        <h3>Please try a different search term</h3>
    </div>
</body>
</html>