<?php

include './connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, htmlspecialchars($_POST['reg_uname']));
    $password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['reg_pass']));
    $fname = mysqli_real_escape_string($conn, htmlspecialchars($_POST['reg_fname']));
    $lname = mysqli_real_escape_string($conn, htmlspecialchars($_POST['reg_lname']));
    $email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['reg_email']));

    $sql = "USE rush01";
    if (mysqli_query($conn, $sql)) {
        $sql = "SELECT * FROM `users` WHERE username = '$username'";
        if (($result = mysqli_query($conn, $sql))) {
            $num_rows = mysqli_num_rows($result);
            if ($num_rows == 0) {
                $sql = "INSERT INTO `users` (`username`, `first_name`, `last_name`, `email`, `password`) VALUES 
                    ('$username', '$fname', '$lname', '$email', '$password')";
                if (mysqli_query($conn, $sql)) {
                    $_SESSION["login"] = $username;
                    header('Location: ./index.php');
                } else {
                    $error_msg = urlencode("Couldnt Register:" . mysqli_error($conn));
                    header('Location: ./login.php?err_id=0&err_msg=' . $error_msg);
                }
            } else {
                header('Location: ./login.php?err_id=0&err_msg="Couldnt Register: Username already exists');
            }
        } else {
            $error_msg = urlencode("Couldnt Register:" . mysqli_error($conn));
            header('Location: ./login.php?err_id=0&err_msg=' . $error_msg);
        }
    } else {
        $error_msg = urlencode("Couldnt Register:" . mysqli_error($conn));
        $error_msg = urlencode("Couldnt Register:" . mysqli_error($conn));
    }
}
?>
