<?php
	class Tyrion extends Lannister
	{
		public function __construct()
		{
			parent::__construct();
			echo "My Name is Tyrion\n";
		}
		public function getSize() {
			return "Short";
		}
	}
?>