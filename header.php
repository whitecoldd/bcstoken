<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCS Token</title>

    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:200,200italic,300,300italic,regular,italic,600,600italic,700,700italic,900" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/admin.css">
    
</head>

<body>
    <div class="burderMenuExitBG"></div>

    <header class="header">
        <div class="header_logo">
            <a href="index.php"><img src="img/logo.svg" alt=""></a>
        </div>

        <nav class="nav">
            <ul>
                <li><a href="#" onclick="slowScroll('#about')">About BCS</a></li>
                <li><a href="#" onclick="slowScroll('#BCSToken')">Stacking</a></li>
                <li><a href="#" onclick="slowScroll('#PlayAndEarn')">Play & Earn</a></li>
                <li><a href="#" onclick="slowScroll('#statistics')">Statistics</a></li>
                <li><a href="#" onclick="slowScroll('#roadMap')">Road map</a></li>
                <?php
                if (isset($_SESSION['adminname'])) {
                    echo '<li><a href="admin.php">Admin</a></li>';
                    echo '<li><a href="incs/logout.inc.php">Log Out</a></li>';
                }
                ?>
            </ul>
        </nav>

        <div class="header_btns">
            <button class="bicas"><a href="#"><span>Bicas</span></a></button>
            <button class="white_paper"><a target="_blank" href="/documentation/BCS Token WP.pdf"><span>White Paper</span></a></button>
        </div>

        <div class="hamburger hamburger--collapse">
            <div class="hamburger-box">
                <div class="hamburger-inner"></div>
            </div>
        </div>
    </header>