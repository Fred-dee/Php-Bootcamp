<?php
	class COLOR
	{
		static $verbose = false;

		public $red;
		public $green;
		public $blue;

		function __construct($args)
		{
			if (!empty($args))
			{
				if (isset($args['rgb']))
				{
					$tmp = intval($args['rgb']);

					$this->red =  ($tmp >> (8*0)) & 0xff;
					$this->green = ($tmp >> (8*1)) & 0xff;
					$this->blue = ($tmp >> (8*2)) & 0xff;
				}
				else
				{
					$this->red = (int)$args['red'];
					$this->blue = (int)$args['blue'];
					$this->green = (int)$args['green'];
				}
				if (self::$verbose == true)
					echo $this." constructed.\n";
			}
		}

		function __destruct()
		{
			if (self::$verbose == true)
					echo $this." destructed.\n";
		}
		function __toString(): string
		{
			return "COLOR( red: ".str_pad($this->red, 3," ", STR_PAD_LEFT).", green: ".str_pad($this->green, 3, " ", STR_PAD_LEFT).", blue: ".str_pad($this->blue, 3, " ", STR_PAD_LEFT).")";
		}
		public static function doc()
		{
			return file_get_contents("Color.doc.txt").PHP_EOL;
		}
		public function add(COLOR $in) : COLOR
		{
			return new COLOR(array ("red" => $this->red + $in->red, "green" => $this->green + $in->green, "blue" => $this->blue + $in->blue));
		}
		public function sub(COLOR $in) : COLOR
		{
			return new COLOR(array ("red" => $this->red - $in->red, "green" => $this->green - $in->green, "blue" => $this->blue - $in->blue));
		}
		public function mult($f) : COLOR
		{
			return new COLOR(array ("red" => $this->red * $f, "green" => $this->green * $f, "blue" => $this->blue * $f));
		}
	}
?>