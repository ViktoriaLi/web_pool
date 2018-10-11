<?php
	require_once 'Color.class.php';

	Class Vertex {
		private $_color, $_x, $_y, $_z, $_w = 1.0;
		public static $verbose = FALSE;

		public function __construct(array $coords)
		{
			if (array_key_exists('x', $coords))
				$this->_x = $coords['x'];
			if (array_key_exists('y', $coords))
				$this->_y = $coords['y'];
			if (array_key_exists('z', $coords))
				$this->_z = $coords['z'];
			if (array_key_exists('w', $coords))
				$this->_w = $coords['w'];
			if (array_key_exists('color', $coords))
				$this->_color = $coords['color'];
			else
				$this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
			if (Self::$verbose)
                printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
			return;
		}

		function __destruct()
        {
            if (Self::$verbose)
                printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
        }

		function __toString()
        {
            if (Self::$verbose)
                return (vsprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) )", array($this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue)));
            return (vsprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )", array($this->_x, $this->_y, $this->_z, $this->_w)));
        }

		public static function doc()
		{
			print(file_get_contents('Vertex.doc.txt'));
		}

		public function getX()
		{
			return $this->_x;
		}

		public function setX($new_x)
		{
			$this->_x = $new_x;
		}

		public function getY()
		{
			return $this->_y;
		}

		public function setY($new_y)
		{
			$this->_y = $new_y;
		}

		public function getZ()
		{
			return $this->_z;
		}

		public function setZ($new_z)
		{
			$this->_z = $new_z;
		}

		public function getW()
		{
			return $this->_w;
		}

		public function setW($new_w)
		{
			$this->_w = $new_w;
		}

		public function getColor()
		{
			return $this->_color;
		}

		public function setColor(Color $new_color)
		{
			$this->_color = $new_color;
		}
	}
?>
