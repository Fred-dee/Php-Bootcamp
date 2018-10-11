<?php
	class Tyrion extends Lannister
	{
		public function __construct()
		{
		}

		public function sleepWith($obj)
		{
			if ($obj instanceof Cersei || $obj instanceof Jaime)
				echo "Not even if I'm drunk !".PHP_EOL;
			elseif ($obj instanceof Stark)
				echo "Lets do this".PHP_EOL;
		}
	}
?>