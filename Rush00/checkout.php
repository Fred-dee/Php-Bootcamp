<?php

if (!isset($_SESSION))
    session_start();
if (isset($_SESSION) && !empty($_SESSION)) {
    if ($_SESSION["login"] == "Guest")
    {
        $error_message = urlencode("Cant checkout without having first loged in. Please login");
        header('Location: ./bucket.php?err_msg='.$error_message);
    }
    $_SESSION["bucket"] = null;
}
?>
