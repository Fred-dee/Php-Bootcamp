#!/usr/bin/php
<?php
	echo get_current_user();
	$processUser = posix_getpwuid(posix_geteuid());
print $processUser['name'];
exec('ps aux', $output);
print_r($output);
?>