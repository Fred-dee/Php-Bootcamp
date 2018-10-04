<?php
header('Content-Type: image/png');
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
readfile('../img/42.png');
exit;
?>
