<?php
	class Lannister
	{
		public function sleepWith($opponent)
        {
            if (($this instanceof Jaime && $opponent instanceof Tyrion) ||
            	($this instanceof Tyrion && $opponent instanceof Jaime)
            	|| ($this instanceof Cersei && $opponent instanceof Tyrion) ||
            	($this instanceof Tyrion && $opponent instanceof Cersei))
                print("Not event if I'm drunk !" .PHP_EOL);
            else if (($this instanceof Sansa && $opponent instanceof Jaime) 
            	|| ($this instanceof Jaime && $opponent instanceof Sansa)
            	|| ($this instanceof Tyrion && $opponent instanceof Sansa)
            	|| ($this instanceof Sansa && $opponent instanceof Tyrion))
                print("Let's do this." .PHP_EOL);
            else if (($this instanceof Cersei && $opponent instanceof Jaime) ||
            	($this instanceof Jaime && $opponent instanceof Cersei))
                print("With pleasure, but only in a tower in Winterfell, then." .PHP_EOL);
        }
	}
?>