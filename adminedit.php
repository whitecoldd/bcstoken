<?php

require_once 'header.php';

require_once './incs/dbh.inc.php';

if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location: login.php');
    exit;
}

if (isset($_POST['update'])) {

    $vesting_address = $_POST['vesting_address'];

    $bcs = $_POST['bcs'];

    $id = $_POST['id'];

    $sql = "UPDATE `token` SET `vesting_address`='$vesting_address',`bcs`='$bcs' WHERE `id`='$id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {

        echo "Record updated successfully.";
    } else {

        echo "Error:" . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM `token` WHERE `id`='$id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            $vesting_address = $row['vesting_address'];

            $bcs = $row['bcs'];

            $id = $row['id'];
        }

?>
        <script type="text/javascript">
            var onloadCallback = function() {
                grecaptcha.render('html_element', {
                    'sitekey': '6LeUq60gAAAAAKVSujImoAt_puPSkH5XDJdJ4yyZ',
                    'callback': response
                });
                var response = grecaptcha.getResponse();

                if (response.length == 0) {
                    document.getElementById('captcha').innerHTML = "You can't leave Captcha Code empty";
                    return false;
                } else {
                    document.getElementById('captcha').innerHTML = "Captcha completed";
                    return true;
                };
            };

            function validateRecaptcha() {
                var response = grecaptcha.getResponse();
                if (response.length === 0) {
                    alert("not validated");
                    return false;
                } else {
                    alert("validated");
                    return true;
                }
            }
        </script>
        <section class="signup">
            <h2>
                Update Token
            </h2>
            <form method="post" enctype="multipart/form-data" class="signup_form" onsubmit="return validateRecaptcha();">


                <input type="text" name="vesting_address" placeholder="Enter Vesting Address" class=" signup_input" value="<?php echo $vesting_address; ?>">

                <input type="text" name="bcs" placeholder="Enter BCS Address" class=" signup_input" value="<?php echo $bcs; ?>">

                <input type="hidden" name="id" class=" signup_input" value="<?php echo $id; ?>">

                <div id="html_element"></div>

                <input value="Update" name="update" type="submit" class="white_paper signup_btn">
                </input>

                </div>
            </form>
            <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
            </script>
        </section>


<?php
    } else {

        header('Location: sale.php');
    }
}


?>
<?php

include_once 'footer.php';
