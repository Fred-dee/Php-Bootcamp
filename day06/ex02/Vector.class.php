<?php
	class Vector
	{
		private $x_mag;
		private $y_mag;
		private $z_mag;
		private $w;
		static $verbose = false;

		function __construct($arg)
		{
			if (!empty($arg) && isset($arg['dest'] && $arg['dest'] instanceof Vertex))
			{
				if (isset($arg['orig']) && $arg['orig'] instanceof Vertex)
				{
					$origin = $arg['orig']l
				}
				else $origin = new Vertex(array ('x' => 0, 'y', => 0, 'z' => 0, 'w' => 1));
				$this->x_mag = $arg['dest']->get_x() - $origin->get_x();
				$this->y_mag = $arg['dest']->get_y() - $origin->get_y();
				$this->z_mag = $arg['dest']->get_z() - $origin->get_z();
				$this->w = 0;
				if (self::$verbose == true)
					echo $this." constructed";
			}
		}
		function __destruct()
		{
			if (self::$verbose == true)
				echo $this." constructed";
		}
		function __toString()
		{
			 return (vsprintf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )", array($this->x_mag, $this->y_mag, $this->z_mag, $this->w));
		}
		public static function doc()
		{
			return file_get_contents("Vector.doc.txt").PHP_EOL;
		}
		public function magnitude() : float
		{

		}

		public function normalize() : Vector
		{

		}

		public function add(Vector $rhs) : Vector
		{

		}
		public function sub( Vector $rhs ) : Vector
		{

		}

 		public function opposite() : Vector 
 		{

 		}
 		public function scalarProduct( $k ) : Vector 
 		{
 			$to = array('dest' => new Vertex (array ('x' => $this->x_mag * $k, 'y' => $this->y_mag * $k, $this->z_mag * $k)
 			));
 			return (new Vector($to));
 		}

		public	function dotProduct( Vector $rhs ) : float 
		{
			return (
				($this->z_mag * $rhs->z_mag) + ($this->y_mag * $rhs->y_mag) + ($this->x_mag * $rhs->x_mag)
			);
		}

		public function cos( Vector $rhs ) : float 
		{

		}
		public function crossProduct( Vector $rhs ) : Vector 
		{

		}

		public function get_xmag() : double 
		{
			return $this->x_mag;
		} 
		public function get_ymag() : double 
		{
			return $this->y_mag;
		} 
		public	function get_zmag() : double 
		{
			return $this->z_mag;
		} 
		public	function get_w() : double 
		{
			return ($this->w);
		} 
	}
?>