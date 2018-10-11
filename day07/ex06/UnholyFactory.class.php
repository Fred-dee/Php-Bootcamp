<?php
	class UnholyFactory
	{
		private $absorbed = array();
		public function __construct()
		{
			
		}

		function absorb($obj)
		{
			if (is_subclass_of($obj, "Fighter"))
			{
				foreach ($this->absorbed  as $key => $value) {
					if ($value->get_type() == $obj->get_type())
					{
						echo "(Factory already absorbed a fighter of type ".$obj->get_type().")".PHP_EOL;
						return ;
					}
				}
				array_push($this->absorbed, $obj);
				echo "(Factory absorbed a fighter of type ".$obj->get_type().")".PHP_EOL;
			}
			else
				echo "(Factory cant absorb this, it's not a fighter)".PHP_EOL;
				
		}
		function fabricate($type)
		{
			foreach ($this->absorbed  as $key => $value) {
				if ($value->get_type() == $type)
				{
					echo "(Factory fabricates a fighter of type ".$type.PHP_EOL;
					return ($value);
				}
			}
			echo "(Factory hasn't absorbed any fighter of type ".$type.")".PHP_EOL;
		}
	}
?>