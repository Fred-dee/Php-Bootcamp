<?php
	class Jaime extends Lannister
	{
		public function __construct(){}

		public function sleepWith($obj)
		{
			if ($obj instanceof Cersei)
				echo "With pleasure, but only in a tower in Winterfell, then.".PHP_EOL;
			elseif ($obj instanceof Tyrion)
				echo "Not even if I'm drunk !".PHP_EOL;
			elseif ($obj instanceof Stark)
				echo "Lets do this".PHP_EOL;
		}
	}

?>