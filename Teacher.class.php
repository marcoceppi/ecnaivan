<?php

require_once('People.class.php');

/**
 * Teacher Class
 *
 */
class Teacher extends People
{
	public function setTitle($title)
	{
		$this->people_data['title'] = $title;
	}
	
	public function addClass($class)
	{
		if( !array_key_exists('classes', $this->people_data) )
		{
			$this->people_data['classes'] = array();
		}
		
		$this->people_data['classes'][] = $class;
	}
	
	public function printinfo()
	{
		echo '<' . strtolower(__CLASS__) . '>' . PHP_EOL;
		
		$data = $this->people_data;
		
		echo 'name: ' . ((array_key_exists('title', $data)) ? $data['title'] . '. ' : '') . $data['name'] . PHP_EOL;
		unset($data['title'], $data['name']);
		
		foreach( $data as $key => $val )
		{
			if( is_array($val) )
			{
				echo $key . ': ' . PHP_EOL;
				foreach( $val as $multi_line_val )
				{
					echo '   ' . $multi_line_val . PHP_EOL;
				}
			}
			else
			{
				echo $key . ': ' . $val . PHP_EOL;
			}
		}
	}
}
