<?php

require_once('Teacher.class.php');
require_once('Student.class.php');

// php -q question1.php

$foo = new Student();
$foo->setName('John Doe');
$foo->setBirthDate('02-02-1990');
$foo->setStudentID('9912345US');
$foo->setGender('m');

$bar = new Teacher();
$bar->setName('Robert Smith');
$bar->setBirthDate('03-04-1970');
$bar->setTitle('Mr');
$bar->addClass('Physics 101');

$bar->printinfo();
$foo->printinfo();
  
