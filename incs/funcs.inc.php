<?php

function emptyInputSignup($name, $psw, $cpsw)
{
    $result = true;
    if (empty($name) || empty($psw) || empty($cpsw)) {
        $result;
    } else {
        $result = false;
    }
    return $result;
}
function invalidUname($name)
{
    $result = true;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
        $result;
    } else {
        $result = false;
    }
    return $result;
}
function get_safe_value($conn,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($conn,$str);
	}
}

function pswNoMatch($psw, $cpsw)
{
    $result = true;
    if ($psw !== $cpsw) {
        $result;
    } else {
        $result = false;
    }
    return $result;
}
function pswShort($psw, $cpsw)
{
    $result = true;
    if (strlen($psw) < 8 || strlen($cpsw) < 8) {
        $result;
    } else {
        $result = false;
    }
    return $result;
}
function unameExists($conn, $name)
{
    $sql = "SELECT * FROM admin WHERE adminName = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: ../signup.php?error=alreadytaken');
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}
function createAdmin($conn, $name, $psw)
{
    $sql = "INSERT INTO admin (adminName, adminPassword) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: ../signup.php?error=stmterror');
        exit();
    }

    $hashedPsw = password_hash($psw, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ss", $name, $hashedPsw);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('location: ../signup.php?error=none');
    exit();
}

function emptyInputLogin($name, $psw)
{
    $result = true;
    if (empty($name) || empty($psw)) {
        $result;
    } else {
        $result = false;
    }
    return $result;
}
function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


function loginAdmin($conn, $name, $psw)
{
    $unameExists = unameExists($conn, $name);

    if ($unameExists === false) {
        header('location: ../signup.php?error=wronglogin');
        exit();
    }
    $pswHashed = $unameExists["adminPassword"];
    $checkPsw = password_verify($psw, $pswHashed);

    if ($checkPsw === false) {
        header('location: ../login.php?error=wronglogin');
        session_start();
        if(!isset($_SESSION['attempt'])){
			$_SESSION['attempt'] = 0;
		}

		//check if there are 3 attempts already
		if($_SESSION['attempt'] == 3){
			$_SESSION['error'] = 'Attempt limit reach';
            header('location: ../index.php');
            if(!isset($_SERVER['HTTP_REFERER'])){
                // redirect them to your desired location
                header('location: ../index.php');
                exit;
            }
		}
		else{
			//get the user with the email
			$sql = "SELECT * FROM admin WHERE adminName = '$name';";
			$query = $conn->query($sql);
			if($query->num_rows > 0){
				$query->fetch_assoc();
				//verify password
				if($checkPsw){
					//action after a successful login
					//for now just message a successful login
					$_SESSION['success'] = header('location: ../admin.php');
					//unset our attempt
					unset($_SESSION['attempt']);
				}
				else{
					$_SESSION['error'] = 'Password incorrect';
					//this is where we put our 3 attempt limit
					$_SESSION['attempt'] += 1;
					//set the time to allow login if third attempt is reach
					if($_SESSION['attempt'] == 3){
						$_SESSION['attempt_again'] = time() + 30;
						//note 5*60 = 5mins, 60*60 = 1hr, to set to 2hrs change it to 2*60*60
					}
				}
            }
        }
    } elseif ($checkPsw === true) {
        session_start();
        $_SESSION["adminid"] = $unameExists['adminId'];
        $_SESSION["adminname"] = $unameExists['adminName'];
        header('location: ../admin.php');
        exit();
    }
}
