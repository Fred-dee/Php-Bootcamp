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
			if (!empty($arg) && isset($arg['dest']))
			{
				if (array_key_exists('orig', $arg))
				{
					$origin = $arg['orig'];
				}
				else $origin = new Vertex(array ('x' => 0, 'y' => 0, 'z' => 0, 'w' => 1));
				$this->x_mag =(double) $arg['dest']->get_x() - $origin->get_x();
				$this->y_mag =(double) $arg['dest']->get_y() - $origin->get_y();
				$this->z_mag = (double) $arg['dest']->get_z() - $origin->get_z();
				$this->w = 0;
				if (self::$verbose == true)
					echo $this." constructed\n";
			}
		}
		function __destruct()
		{
			if (self::$verbose == true)
				echo $this." constructed";
		}
		function __toString()
		{
			 return (vsprintf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )", array($this->x_mag, $this->y_mag, $this->z_mag, $this->w)));
		}
		public static function doc()
		{
			return file_get_contents("Vector.doc.txt").PHP_EOL;
		}
		public function magnitude() : float
		{
			return (sqrt(pow($this->x_mag, 2) + pow($this->y_mag, 2) + pow($this->z_mag, 2)));
		}

		public function normalize() : Vector
		{
			if ($this->magnitude() != 1)
			{
				$x = $this->x_mag / $this->magnitude();
				$y = $this->y_mag / $this->magnitude();
				$z = $this->z_mag / $this->magnitude();
				return (new Vector(array ('dest' => new Vertex(array('x' => $x, 'y' => $y ,'z' => $y)))));
			}
			return (clone $this);
		}

		public function add(Vector $rhs) : Vector
		{
			$arr = array('dest' => new Vertex(array(
			'x' => $this->x_mag + $rhs->get_xmag(),
			'y' => $this->y_mag + $rhs->get_ymag(),
			'z' => $this->z_mag + $rhs->get_zmag())));
			return (new Vector($arr));
		}
		public function sub( Vector $rhs ) : Vector
		{
			$arr = array('dest' => new Vertex(array(
			'x' => $this->x_mag - $rhs->get_xmag(),
			'y' => $this->y_mag - $rhs->get_ymag(),
			'z' => $this->z_mag - $rhs->get_zmag())));	
			return (new Vector($arr));
		}

 		public function opposite() : Vector 
 		{
			$arr = array('dest' => new Vertex(array(
			'x' => $this->x_mag * -1,
			'y' => $this->y_mag * -1,
			'z' => $this->z_mag * -1)));
			return (new Vector($arr));	
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
			$normalized_me = $this->normalize();
			$normalized_them = $rhs->normalize();

			$x = $normalized_me->get_ymag() * $normalized_them->get_zmag() -
				$normalized_me->get_zmag() * $normalized_them->get_ymag();
			$y = $normalized_me->get_zmag() * $normalized_them->get_xmag() -
				$normalized_me->get_xmag() * $normalized_them->get_zmag();
			$z = $normalized_me->get_xmag() * $normalized_them->get_ymag() -
				$normalized_me->get_ymag() * $normalized_them->get_xmag();
			$arr = array('dest' => new Vertex(array('x' => $x, 'y' => $y, 'z' => $z)));
			return (new Vector($arr));
		}

		public function get_xmag() : double 
		{
			return (double)$this->x_mag;
		}

		public function get_ymag() : double 
		{
			return (double)$this->y_mag;
		}

		public	function get_zmag() : double 
		{
			return (double)$this->z_mag;
		}

		public	function get_w() : double 
		{
			return ((double)$this->w);
		} 
	}
?>