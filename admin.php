<?php

require_once 'header.php';
require_once './incs/dbh.inc.php';

if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location: login.php');
    exit;
}
if (isset($_POST['submit'])) {

    $vesting_address = $_POST['vesting_address'];

    $bcs = $_POST['bcs'];

    $sql = "INSERT INTO token(vesting_address, bcs) VALUES ('$vesting_address','$bcs')";

    $result = $conn->query($sql);

    if ($result == TRUE) {

        echo "New record created successfully.";
    } else {

        echo "Error:" . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}


?>
<section class="signup">
    <h2>
        Add Token
    </h2>
    <form method="post" enctype="multipart/form-data" class="signup_form">
        
            
                <input type="text" name="vesting_address" placeholder="Enter Vesting Address" class="form-control signup_input" required>
            
                <input type="text" name="bcs" placeholder="Enter BCS Address" class="form-control signup_input" required>
            


            <button id="payment-button" name="submit" type="submit" class="white_paper signup_btn">
                <p>SUBMIT</p>
            </button>
        </div>
    </form>
</section>
<?php

include_once 'footer.php';
