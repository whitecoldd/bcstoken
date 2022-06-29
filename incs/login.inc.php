<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $psw = $_POST['psw'];

    require_once 'dbh.inc.php';
    require_once 'funcs.inc.php';


    if (emptyInputLogin($name, $psw) !== false) {
        header('location: ../signup.php?error=emptyinput');
        exit();
    }

    loginAdmin($conn, $name, $psw);
    
} elseif (!isset($_POST['submit'])) {
    header('location: ../index.php');
    exit();
} else {
    header('location: ../login.php');
    exit();
}