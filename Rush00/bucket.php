<?php
header('Content-Type: text/html');
include './connect.php';
include './includes/functions.php';
if (!isset($_SESSION))
    session_start();
if (isset($_SESSION)) {
    if ($_SESSION["login"] == "Guest")
        include './includes/nav.php';
    else
        include './includes/nav_logged.php';
    if (isset($_GET) && !empty($_GET)) {
        if (isset($_GET["data-id"])) {
            $id = mysqli_real_escape_string($conn, htmlspecialchars($_GET["data-id"]));
            $arr = $_SESSION["bucket"];
            $sql = "SELECT * FROM `items` WHERE ID =" . $id;
            if (($result = mysqli_query($conn, $sql))) {
                $row = mysqli_fetch_array($result);
                if (isset($_GET["btn_add"])) {
                    array_push($arr, $row);
                }
                if (isset($_GET["btn_remove"])) {
                    $arr = array_remove($row, $arr);
                }
            }
            $_SESSION["bucket"] = $arr;
        }
    }
    // var_dump($_SESSION["bucket"]);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Basket</title>
        <meta charset="utf-8" />
        <meta name="author" description="mdilapi" />
        <link rel="stylesheet" type="text/css" href="./css/inc.css">
        <link rel="stylesheet" type="text/css" href="./css/forms.css">
    </head>
    <body>
        <?php
        echo "<div class='wrapper'>";
        echo "\t <div class= 'grid'>";
        $arr = $_SESSION["bucket"];
        foreach ($arr as $key => $value) {
            print_img($value);
        }
        echo "\t</div>";
        echo "</div>";
        ?>
        <form action="./checkout.php" method="GET">
            <input class="controls" type="submit" value="Checkout" />
        </form>
        <?php
        if (isset($_GET) && !empty($_GET)) {
            if (isset($_GET["err_msg"]))
                echo "<div class='error_msg'>" . $_GET["err_msg"] . "</div>";
        }
        ?>
    </body>
</html>
