<?php

include_once 'header.php';

?>
<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location: index.php');
    exit;
}
?> 
<section class="signup">
    <h2>
        Sign Up
    </h2>
    <form action="incs/signup.inc.php" class="signup_form" method="POST">
        <input class="signup_input" type="text" name="name" placeholder="Enter Userame...">
        <input class="signup_input" type="password" name="psw" placeholder="Enter Password...">
        <input class="signup_input" type="password" name="cpsw" placeholder="Confirm Password...">
        <button class="white_paper signup_btn" type="submit" name="submit">
            <p>Sign Up</p>
        </button>
    </form>
    <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 'emptyinput') {
            echo '<p>Fill in all fields</p>';
        } elseif ($_GET['error'] == 'invaliduname') {
            echo '<p>Invalid Username</p>';
        } elseif ($_GET['error'] == 'pswnomatch') {
            echo '<p>Passwords do not match</p>';
        } elseif ($_GET['error'] == 'pswshort') {
            echo '<p>Password is too short</p>';
        } elseif ($_GET['error'] == 'unametaken') {
            echo '<p>Username is already taken</p>';
        } elseif ($_GET['error'] == 'stmterror') {
            echo '<p>Try again!</p>';
        } elseif ($_GET['error'] == 'none') {
            echo '<p>You have signed up succefully!</p>';
            header('location: index.php');
            exit();
        }
    }

    ?>
</section>




<?php

include_once 'footer.php';
