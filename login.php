<?php

include_once 'header.php';

?>
<?php
if (isset($_SESSION['attempt_again'])) {
    $now = time();
    if ($now >= $_SESSION['attempt_again']) {
        unset($_SESSION['attempt']);
        unset($_SESSION['attempt_again']);
    }
} elseif (isset($_SESSION['adminname'])) {
    header('location: index.php');
}
?>


<section class="signup">
    <h2>
        Log In
    </h2>
    <form action="incs/login.inc.php" class="signup_form" method="POST">
        <input class="signup_input" type="text" name="name" placeholder="Enter Username...">
        <input class="signup_input" type="password" name="psw" placeholder="Enter Password...">
        <button class="white_paper signup_btn" type="submit" name="submit">
            <p>Log In</p>
        </button>

    <?php
    if (isset($_SESSION['error'])) {
    ?>
        <div style="margin-top:20px;">
            <?php echo $_SESSION['error']; ?>
        </div>
    <?php
    
    }
    ?>
    </form>
    <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 'emptyinput') {
            echo '<p>Fill in all fields</p>';
        } elseif ($_GET['error'] == 'wronglogin') {
            echo '<p>Invalid Credentials</p>';
        }
    }
    ?>
</section>




<?php

include_once 'footer.php';
