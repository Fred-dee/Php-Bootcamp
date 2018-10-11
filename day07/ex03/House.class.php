<?php
	abstract class House 
	{
		public function __construct(){}
		abstract function getHouseName();
		abstract function getHouseSeat();
		abstract function getHouseMotto();

		public function introduce()
		{
			echo "House".$this->getHouseName()." of ".$this->getHouseSeat().': "'.$this->getHouseMotto().'"'.PHP_EOL;
		}
	}
?>