<?php
	class NightsWatch
	{
		private $fighters = array();

		public function __construct(){
			$fighters = array();
		}
		public function recruit($obj)
		{
			if (class_implements($obj, "IFighter"))
			{
				array_push($this->fighters, $obj);
			}
		}
		public function fight()
		{
			foreach ($this->fighters as $key => $value) {
				$value->fight();
			}
		}
	}
?>