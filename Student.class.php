<?php

require_once('People.class.php');

/**
 * Student Class
 *
 */
class Student extends People
{
	private $available_genders = array('m', 'f');
	private $student_id_validation = '/^(88|99)[0-9]{5}[A-Z]{2}$/';
	
	public function setStudentID($student_id)
	{
		if( $this->isValidStudentId($student_id) )
		{
			$this->people_data['id'] = $student_id;
			
			return true;
		}
		else
		{
			throw new Exception('Invalid Student ID');
		}
	}
	
	public function setGender($gender)
	{
		$gender = strtolower($gender);
		
		if( in_array($gender, $this->available_genders) )
		{
			$this->people_data['gender'] = $gender;
			
			return true;
		}
		else
		{
			throw new Exception('Invalid Gender');
		}
	}
	
	public function isValidStudentId($student_id)
	{
		// While this isn't a bool return, preg_match will either return
		// a 0 match or 1 as it stops after it's first match. PHP is all
		// loosey goosey with types which makes this easy, but also makes
		// bad code even easier.
		return ( !preg_match($this->student_id_validation, $student_id) ) ? false : true;
	}
}
