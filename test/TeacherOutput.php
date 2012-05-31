<?php

require_once('model/Teacher.class.php');

class TeacherOutput extends PHPUnit_Framework_TestCase
{
	/**
	 * Ideally printinfo would envoke another command, one that fetched
	 * the data and returned an array, as it's easier to compare an
	 * array than physical string output. Better to check the data than
	 * the format.
	 */
    public function testTeacherOutput()
    {
        $this->expectOutputString('<teacher>
name: Mr. Robert Smith
birthday: 03-04-1970
classes: 
   Physics 101');

		$bar = new Teacher();
		$bar->setName('Robert Smith');
		$bar->setBirthDate('03-04-1970');
		$bar->setTitle('Mr');
		$bar->addClass('Physics 101');
		
		$bar->printinfo();
    }
}
