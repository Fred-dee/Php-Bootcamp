<?php
	abstract class Fighter
	{
		private $type;
		
		abstract function fight($target);
		public function __construct($type)
		{
			$this->type = $type;
		}
		public function get_type()
		{
			return $this->type;
		}
		
	}
?>