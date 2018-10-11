<?php
	require_once 'Vertex.class.php';

	Class Vector {
		private $_x, $_y, $_z, $_w = 0.0;
		public static $verbose = FALSE;

		public function __construct(array $coords)
		{
			if (array_key_exists('dest', $coords))
			{
                if (array_key_exists('orig', $coords))
                    $orig = new Vertex(array('x' => $coords['orig']->getX(), 'y' => $coords['orig']->getY(), 'z' => $coords['orig']->getZ()));
                else
                    $orig = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0, 'w' => 1));
                $this->_x = $coords['dest']->getX() - $orig->getX();
                $this->_y = $coords['dest']->getY() - $orig->getY();
                $this->_z = $coords['dest']->getZ() - $orig->getZ();
                $this->_w = $coords['dest']->getW() - $orig->getW();
            }


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
                printf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
			return;
		}

		function __destruct()
        {
            if (Self::$verbose)
                printf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
        }

        function __toString()
        {
   	        return (vsprintf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )", array($this->_x, $this->_y, $this->_z, $this->_w)));
        }

        public static function doc()
		{
			print(file_get_contents('Vector.doc.txt'));
		}

		public function getX()
		{
			return (float)$this->_x;
		}

		public function getY()
		{
			return (float)$this->_y;
		}

		public function getZ()
		{
			return (float)$this->_z;
		}

		public function getW()
		{
			return (float)$this->_w;
		}

		public function magnitude()
		{
			return (float)sqrt(($this->_x * $this->_x + $this->_y * $this->_y + $this->_z * $this->_z));
		}

		public function normalize()
        {
            if ($this->magnitude() === 1)
                return clone $this;
            return new Vector(array('dest' => new Vertex(array('x' => $this->_x * (1 / $this->magnitude()), 'y' => $this->_y * (1 / $this->magnitude()), 'z' => $this->_z * (1 / $this->magnitude())))));
        }

        public function add(Vector $rhs)
        {
        	return new Vector(array('dest' => new Vertex(array('x' => $this->_x + $rhs->_x, 'y' => $this->_y + $rhs->_y, 'z' => $this->_z + $rhs->_z))));
        }

        public function sub(Vector $rhs)
        {
        	return new Vector(array('dest' => new Vertex(array('x' => $this->_x - $rhs->_x, 'y' => $this->_y - $rhs->_y, 'z' => $this->_z - $rhs->_z))));
        }

        public function opposite()
        {
            return new Vector(array('dest' => new Vertex(array('x' => -1 * $this->_x, 'y' => -1 * $this->_y, 'z' => -1 * $this->_z))));
        }

        public function scalarProduct($k)
        {
            return new Vector(array('dest' => new Vertex(array('x' => $this->_x * $k, 'y' => $this->_y * $k, 'z' => $this->_z * $k))));
        }

        public function dotProduct(Vector $rhs)
        {
            return (float)(($this->_x * $rhs->_x) + ($this->_y * $rhs->_y) + ($this->_z * $rhs->_z));
        }

        public function cos(Vector $rhs)
        {
            return ((($this->_x * $rhs->_x) + ($this->_y * $rhs->_y) + ($this->_z * $rhs->_z)) / sqrt((($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z)) * (($rhs->_x * $rhs->_x) + ($rhs->_y * $rhs->_y) + ($rhs->_z * $rhs->_z))));
        }

        public function crossProduct(Vector $rhs)
        {
            return new Vector(array('dest' => new Vertex(array(
                'x' => $this->_y * $rhs->getZ() - $this->_z * $rhs->getY(),
                'y' => $this->_z * $rhs->getX() - $this->_x * $rhs->getZ(),
                'z' => $this->_x * $rhs->getY() - $this->_y * $rhs->getX()
            ))));
        }
	}
?>