<?php
function bucket_cost()
{	
	if (!isset($_SESSION))
		session_start();
	$sum = 0;
	if (isset($_SESSION) && !empty($_SESSION))
	{
		if (!empty($_SESSION["bucket"]))
		{	
			foreach ($_SESSION["bucket"] as $key => $value) {
				$sum = $sum + (int) preg_replace('/\D/', '',$value["quantity"]) * (int) preg_replace('/\D/', '',$value["Price"]);
			}
		}
	}
	return ($sum);
}

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
		echo "\t\t\t\t\t<input type='number' class='controls' value=1 min='1' name='quantity'/>";
		echo "\t\t\t\t\t<input type='number' style='display:none' value='".$row["ID"]."' name='data-id' />";
		echo "\t\t\t\t</div>";
		$flag = 0;
		foreach ($buck as $key => $value) {
			if($value["ID"] == $row["ID"])
			{
				echo "<input class='controls' type='submit' name='btn_remove' value='Remove From Bucket' />";
				$flag = 1;
			}
		}
		if ($flag == 0)
		{
			echo "<input class='controls' type='submit' name='btn_add' value='Add To Bucket' />";
		}
		echo "</form>";
	}
	echo "\t\t</div>";
}

function remove_bucket($element, $buck)
{
	foreach ($buck as $key => $value){
		if ($value["ID"] == $element["ID"])
		{
			$buck[$key] = NULL;
		}
	}
	$buck = array_filter($buck);
	return ($buck);
}

function array_remove($element, $array) {
	$index = array_search($element, $array);
	array_splice($array, $index, 1);
	return $array;
}

?>
