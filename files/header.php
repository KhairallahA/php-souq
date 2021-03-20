<?php include("inc/function.php") ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Amazen OnLine</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    
    <!-- HEADERT START -->
        <div class="headerTop">
            <div class="logo w">
                <a href="index.php"><img src="img/logo.png" width="350px"></a>
            </div>
        </div>
    <!-- HEADERT END -->
    <!-- MENU START -->
    <div class="menuBar">
            <ul class="w">
                <li><a href="index.php">Home</a></li>
                <?php get_cat() ?>
                <div class="c"></div>
            </ul>
        </div>
    <!-- MENU END -->

    <!-- SEARCH AREA START -->
        <div class="search">
        <?php cart(); ?>
            <div class="w">
                <div class="cart r">Welcome! Sla buy : All Products : <?php total_item(); ?> ,All Price : <?php total_price(); ?>$ <a href="cart.php">Go to Cart</a></div>
                <div class="searchForm l">
                    <form action="search.php" method="GET">
                        <input type="text" name="searchArea" placeholder="Search Now">
                        <button type="submit" name="search">Search</button>
                    </form>
                </div>
                
                <div class="sochil l"></div>
                <div class="c"></div>
            </div>
        </div>
    <!-- SEARCH AREA END -->

    <br> <br>