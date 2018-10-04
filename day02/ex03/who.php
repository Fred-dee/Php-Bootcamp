#!/usr/bin/php
<?php
$var = fopen("/var/run/utmpx", "r");
$stack = array();
$stack_new = array();
while ($read = fread($var, 628))
{
  $stack = unpack("a256ut_user/a4ut_id/a32ut_line/iut_pid/iut_type/I2ut_time ", $read);
  if ($stack[ut_type] == USER_PROCESS)
		array_push($stack_new, $stack);
}
foreach ($stack_new as $pri)
   printf("%s  %s  %s\n", $pri[ut_user], $pri[ut_line], date("M  j H:i", $pri["ut_time 1"]));
?>
