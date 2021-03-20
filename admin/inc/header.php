<?php

include("inc/cookie.php");

// content db
$db = mysqli_connect('localhost', 'root', '', 'ecommerce');

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

    <div class="all">
        <!-- ADMIN MENU START -->
        <div class="adminMenu">
            <ul>
                <li><a href="addcat.php">Add Cat</a></li>
                <li><a href="addpro.php">Add Pro</a></li>
            </ul>
        </div>
        <!-- ADMIN MENU END -->

        <br>