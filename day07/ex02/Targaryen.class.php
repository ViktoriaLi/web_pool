<?php
	class Targaryen
	{
		public function resistsFire()
        {
            return false;
        }

		public function getBurned()
		{
            if ($this->resistsFire())
                return "emerges maked but unharmed";
            else
            	return "burns alive";
        }
	}
?>