<?php
header('Content-Type: text/html');
?>
<div class="navbar">
	<a href="./index.php">Home</a>
	<a href="./index.php?cat=Men">Men</a>
	<a href="./index.php?cat=Women">Women</a>
	<a href="./index.php?cat=Kids">Kids</a>
	<span class="item-right">
		<?php
			$var = bucket_cost();
			echo "<a href='./bucket.php'>Basket: R".$var."</a>"; 
		?>
	</span>
	<span class="item-right" style="right:50px;">
		<a href="./logout.php">Logout</a>
	</span>
	<span class = "item-right" >
		<a href="./profile.php">Welcome: <?php echo $_SESSION["login"]; ?></a>
	</span>

</div>

