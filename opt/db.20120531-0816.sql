
CREATE  TABLE IF NOT EXISTS `people` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NOT NULL ,
  `created` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

CREATE  TABLE IF NOT EXISTS `people_data` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `people_id` INT NOT NULL ,
  `key` VARCHAR(55) NULL ,
  `value` VARCHAR(255) NULL DEFAULT 'This may need to be a blob if the data requires it' ,
  PRIMARY KEY (`id`, `people_id`) ,
  INDEX `fk_people_data_people` (`people_id` ASC) ,
  CONSTRAINT `fk_people_data_people`
    FOREIGN KEY (`people_id` )
    REFERENCES `mydb`.`people` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE  TABLE IF NOT EXISTS `classes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `teacher_id` INT NOT NULL ,
  `name` VARCHAR(65) NOT NULL ,
  PRIMARY KEY (`id`, `teacher_id`) ,
  INDEX `fk_classes_people1` (`teacher_id` ASC) ,
  CONSTRAINT `fk_classes_people1`
    FOREIGN KEY (`teacher_id` )
    REFERENCES `mydb`.`people` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE  TABLE IF NOT EXISTS `students` (
  `student_id` INT NOT NULL ,
  `class_id` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`student_id`, `class_id`) ,
  INDEX `fk_students_people1` (`student_id` ASC) ,
  INDEX `fk_students_classes1` (`class_id` ASC) ,
  CONSTRAINT `fk_students_people1`
    FOREIGN KEY (`student_id` )
    REFERENCES `mydb`.`people` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_classes1`
    FOREIGN KEY (`class_id` )
    REFERENCES `mydb`.`classes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
