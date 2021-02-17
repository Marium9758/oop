<?php

class Pen{

	private $color = 'beguni';

	function write()
	{
	 	 //$this->color; 
		return 'Pen is writing.....';
	}
}

/**
 * 
 */
class Gelpen extends Pen
{
	
	public $inc_type = 'gel';

	function open(){
		echo $this->color;
	}
}


$pen1 = new Pen;
$pen2 = new Gelpen;

$pen2->open();


