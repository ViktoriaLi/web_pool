<?php
	Class Color {
		public $red = 0, $green = 0, $blue = 0;
		public static $verbose = FALSE;

		public function __construct(array $rgb)
		{
			if (array_key_exists('rgb', $rgb))
			{
				$this->red = (int)($rgb['rgb'] >> 16);
				$this->green = (int)($rgb['rgb'] & 0Xff00) >> 8;
				$this->blue = (int)($rgb['rgb'] & 0Xff);
			}
			else
			{
				if (array_key_exists('red', $rgb))
					$this->red = (int)$rgb['red'];
				if (array_key_exists('green', $rgb))
					$this->green = (int)$rgb['green'];
				if (array_key_exists('blue', $rgb))
					$this->blue = (int)$rgb['blue'];
			}
			if (Self::$verbose)
				printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->red, $this->green, $this->blue);
			return;
		}

		public function __destruct() 
		{
			if (Self::$verbose)
				printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", $this->red, $this->green, $this->blue);
			return;
		}

		public function __tostring() 
		{
			return (vsprintf("Color( red: %3d, green: %3d, blue: %3d )", array($this->red, $this->green, $this->blue)));
		}
		
		public static function doc()
		{
			print(file_get_contents('Color.doc.txt'));
		}

		function add(Color $inst2)
		{
			return (new Color(array('red' => $this->red + $inst2->red, 'green' => $this->green + $inst2->green, 'blue' => $this->blue + $inst2->blue)));
		}

		function sub(Color $inst2)
		{
			return (new Color(array('red' => $this->red - $inst2->red, 'green' => $this->green - $inst2->green, 'blue' => $this->blue - $inst2->blue)));
		}

		function mult($val)
		{
			return (new Color(array('red' => $this->red * $val, 'green' => $this->green * $val, 'blue' => $this->blue * $val)));
		}
	}
?>