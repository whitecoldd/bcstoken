<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];    
    $psw = $_POST['psw'];    
    $cpsw = $_POST['cpsw'];
    
    require_once 'dbh.inc.php';
    require_once 'funcs.inc.php';

    if (emptyInputSignup($name, $psw, $cpsw) !== false ) {
        header('location: ../signup.php?error=emptyinput');
        exit();
    }
    if (invalidUname($name) !== false ) {
        header('location: ../signup.php?error=invaliduname');
        exit();
    }
    if (pswNoMatch($psw, $cpsw) !== false ) {
        header('location: ../signup.php?error=pswnomatch');
        exit();
    }
    if (pswShort($psw, $cpsw) !== false ) {
        header('location: ../signup.php?error=pswshort');
        exit();
    }
    if (unameExists($conn, $name) !== false ) {
        header('location: ../signup.php?error=unametaken');
        exit();
    }

    createAdmin($conn, $name, $psw);
} elseif (!isset($_POST['submit'])) {
    header('location: ../index.php');
    exit();
}

else {
    header('location: ../signup.php');
    exit();
}
