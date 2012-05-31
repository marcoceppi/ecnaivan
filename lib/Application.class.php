<?php

require_once('helper/View.class.php');

class Application
{
	public $View;
	
	public function Application()
	{
		$this->View = new View();
	}
}
