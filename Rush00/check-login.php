<?php
include_once './connect.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['log_uname'];
    $password = $_POST['log_pass'];

    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);


    if ($conn) {
        $sql = "USE rush01";
        mysqli_query($conn, $sql);
        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);
        
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        if (($result = mysqli_query($conn, $sql))) {
            $num_rows = mysqli_num_rows($result);
            if ($num_rows == 1) {
                $row = mysqli_fetch_array($conn, $result);
                $first_name = $row['first_name'];
                $_SESSION['login'] = $username;
                header('Location: ./index.php');
            } else {
                $error_msg = "Invalid login";
                session_start('./login.php');
                $_SESSION['login'] = "Guest";
                header('Location: ./login.php?err_id=1&err_msg='.$error_msg);
            }
        } else{
           header ('Location: ./login.php?err_id=1&err_msg="Error: Unable to log in. (Unknown Cause)"');
        }
    }
} else {
    die('Database access error!<br />');
}
?>