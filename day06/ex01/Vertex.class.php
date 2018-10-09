<?php
	class Vertex 
	{

		//require_once '../ex00/Color.class.php';
		private $x;
		private $y;
		private $z;
		private $w;
		private $color;
		static $verbose = false;

		function __construct($args)
		{
			if (!empty($args))
			{
				$this->x = (double)$args['x'];
				$this->y = (double)$args['y'];
				$this->z = (double)$args['z'];
				if (isset($args['w']))
					$this->w = (double)$args['w'];
				else
					$this->w = 1.0;
				if (isset(($args['color'])))
				{
					if (is_array($args['color']))
						$this->color = new Color($args['color']);
					else
						$this->color = $args['color'];
				}
				else
					$this->color = new Color (array('rgb' =>  0xffffff));
				if (self::$verbose == true)
					echo $this." constructed\n";
			}
		}
		function __destruct()
		{
			if (self::$verbose == true)
				echo $this." destructed\n";
		}
		function __toString()
		{
			$ret = "(Vertex( x: ".str_pad(number_format((double)$this->x, 2, '.', ''), 3, " ", STR_PAD_LEFT);
			$ret .= ", y: ".str_pad(number_format((double)$this->y, 2, '.', ''), 3, " ", STR_PAD_LEFT).", z: ";
			$ret .= str_pad(number_format((double)$this->z, 2, '.', ''), 3, " ", STR_PAD_LEFT);
			$ret .= ", w: ". str_pad(number_format((double)$this->w, 2, '.', ''), 3, " ", STR_PAD_LEFT).", ".$this->color." )";
			return $ret;
		}
		public static function doc()
		{
			return file_get_contents("Vertex.doc.txt").PHP_EOL;
		}
		public function get_x() : double
		{
			return $this->x;
		}
		public function get_y() : double
		{
			return $this->y;
		}
		public function get_z() : double
		{
			return $this->z;
		}
		public function get_w() : double
		{
			return $this->w;
		}
		public function get_color() : Color{
			return $this->color;
		}
		public function set_x($in)
		{
			$this->x = (double)$in;
		}
		public function set_y($in)	
		{
			$this->y = (double)$in;
		}
		public function set_z($in)
		{
			$this->z = (double)$in;
		}
		public function set_w($in)
		{
			$this->w = (double)$in;
		}
		public function set_color($arg)
		{
			if (is_array($arg))
				$this->color = new Color($arg);
			else
				$this->color = $arg;
		}
	}
?>