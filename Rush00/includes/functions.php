<?php
function print_img($row) {
    echo "\t\t<div class ='media'>";
    echo "\t\t\t<img class='responsive-img' id='" . $row["ID"] . "' alt = '' src='" . $row["src"] . "' />";
    if (isset($_SESSION) && !empty($_SESSION))
    {
        echo "\t\t\t<form action='./bucket.php' method='GET'>";
        $buck = $_SESSION["bucket"];
        echo "\t\t\t\t<span>Price: R".$row["Price"]."</span>";
        echo "\t\t\t\t<div class='form-group'>";
        echo "\t\t\t\t\t<div class='label'>Quantity</div>";
        echo "\t\t\t\t\t<input type='number' class='controls' min='0' name='quantity'/>";
        echo "\t\t\t\t\t<input type='number' style='display:none' value='".$row["ID"]."' name='data-id' />";
        echo "\t\t\t\t</div>";
        if (!in_array($row, $buck))
            echo "<input class='controls' type='submit' name='btn_add' value='Add To Bucket' />";
        else
            echo "<input class='controls' type='submit' name='btn_remove' value='Remove From Bucket' />";
        echo "</form>";
    }
    echo "\t\t</div>";
}

function array_remove($element, $array) {
  $index = array_search($element, $array);
  array_splice($array, $index, 1);
  return $array;
}
?>
