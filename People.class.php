<?php

/**
 * People Interface
 *
 * I don't usually create interfaces, with the exception of creating a
 * plugin infrastructure. Where there is a potential for lots of people
 * who would be contributing code and a low likelihood for code review.
 *
 */
interface person
{
	public function setName($name);
	public function setBirthDate($date);
}

/**
 * People Class
 *
 * This class is designed to track the bare minimum data that shared by
 * all people.
 */
class People implements person
{
	protected $people_data = array();
	
	public function setName($name)
	{
		$this->people_data['name'] = $name;
	}
	
	public function setBirthDate($date)
	{
		$this->people_data['birthday'] = $date;
	}
	
	public function printinfo()
	{
		echo '<' . strtolower(__CLASS__) . '>' . PHP_EOL;
		
		foreach( $this->people_data as $key => $val )
		{
			echo $key . ': ' . $val . PHP_EOL;
		}
	}
	
	public function __set($key, $value)
	{
		$set_method = "set$key";
		
		if( is_callable(array($this, $set_method)) )
		{
			$this->$set_method($value);
		}
		else
		{
			throw new Exception('Method not found');
		}
	}
}


